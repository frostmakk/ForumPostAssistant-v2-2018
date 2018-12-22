<?php echo '<!-- NOTE (RussW): include '. basename(__FILE__) .' placeholder -->'; ?>
<?php
  /* NOTE (RussW): build initial arrays
   *
   */
	/** DETERMINE APACHE ENVIRONMENT & SETTINGS ***********************************************
	** here we try to determine the php enviroment and configuration
	** to try and avoid "white-screens" fpa tries to check for function availability before
	** using any function, but this does mean it has grown in size quite a bit and unfortunately
	** gets a little messy in places.
	*****************************************************************************************/
	/** general apache loaded modules? *******************************************************/
	if ( function_exists( 'apache_get_version' ) ) {  // for Apache module interface

		foreach ( apache_get_modules() as $i => $modules ) {
		$apachemodules[$i] = ( $modules );  // show the version of loaded extensions

		}

		// include the Apache version
		$apachemodules[] = apache_get_version();

	} else {  // for Apache cgi interface

		// !TESTME Does this work in cgi or cgi-fcgi
		/**
		* BERNARD: commented out
		* @todo: find out if this is even used on the webpage
		*/
		#print_r( get_extension_funcs( "cgi-fcgi" ) );
	}
	// !TODO see if there are IIS specific functions/modules
?>