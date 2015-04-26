<?php
	$GLOBALS[ "CurrentPage" ] = "";
	$URI = explode( "/", $_SERVER[ 'REQUEST_URI' ] );
	UNSET( $URI[0] );
	if( file_exists( $URI[ 1 ] . "/" . $URI[ 2 ] . ".php" ) ){
		$GLOBALS[ "CurrentPage" ] = $URI[ 2 ];
	}else{
		if( $URI[ 1 ] == "" ){
			$GLOBALS[ "CurrentPage" ] = "home";
		}else{
			$GLOBALS[ "CurrentPage" ] = "404";
		}
	}	
?>
<?php include( 'header.php' ); ?>
<?php
	if( file_exists( $URI[ 1 ] . "/" . $URI[ 2 ] . ".php" ) ){
		include( $URI[ 1 ] . "/" . $URI[ 2 ] . ".php" );
	}else{
		if( $URI[ 1 ] == "" ){
			include( "pages/home.php" );
		}else{
			include( "pages/404.php" );
		}
	}
?>
<?php include( 'footer.php' ); ?>