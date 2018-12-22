<?php echo '<!-- NOTE (RussW): include '. basename(__FILE__) .' placeholder -->'; ?>
<?php
  /* NOTE (RussW): build initial arrays
   *
   */
	/** DETERMINE PHP ENVIRONMENT & SETTINGS ***********************************************
	** here we try to determine the php enviroment and configuration
	** to try and avoid "white-screens" fpa tries to check for function availability before
	** using any function, but this does mean it has grown in size quite a bit and unfortunately
	** gets a little messy in places.
	*****************************************************************************************/

	/** general php related settings? *****************************************************/
	if ( version_compare( PHP_VERSION, '5.0', '>=' ) ) {
		$phpenv['phpSUPPORTSMYSQLI'] = _FPA_Y;

	} elseif ( version_compare( PHP_VERSION, '4.4.9', '<=' ) ) {
		$phpenv['phpSUPPORTSMYSQLI'] = _FPA_N;

	} else {
		$phpenv['phpSUPPORTSMYSQLI'] = _FPA_U;
	}

	if ( version_compare( PHP_VERSION, '7.0', '>=' ) ) {
		$phpenv['phpSUPPORTSMYSQL'] = _FPA_N;

	} elseif ( version_compare( PHP_VERSION, '5.9.9', '<=' ) ) {
		$phpenv['phpSUPPORTSMYSQL'] = _FPA_Y;

	} else {
		$phpenv['phpSUPPORTSMYSQL'] = _FPA_U;
	}

	// find the current php.ini file
	if ( version_compare( PHP_VERSION, '5.2.4', '>=' ) ) {
		$phpenv['phpINIFILE']       = php_ini_loaded_file();

	} else {
		$phpenv['phpINIFILE']       = _FPA_U;
	}

	// find the other loaded php.ini file(s)
	if (version_compare(PHP_VERSION, '4.3.0', '>=')) {
		$phpenv['phpINIOTHER']      = php_ini_scanned_files();

	} else {
		$phpenv['phpINIOTHER'] = _FPA_U;
	}

	// determine the rest of the normal PHP settings
	$phpenv['phpREGGLOBAL']         = ini_get( 'register_globals' );
	$phpenv['phpMAGICQUOTES']       = ini_get( 'magic_quotes_gpc' );
	$phpenv['phpSAFEMODE']          = ini_get( 'safe_mode' );
	$phpenv['phpMAGICQUOTES']       = ini_get( 'magic_quotes_gpc' );
	$phpenv['phpSESSIONPATH']       = session_save_path();
	$phpenv['phpOPENBASE']          = ini_get( 'open_basedir' );

		// is the session_save_path writable?
	if (is_writable( session_save_path() ) ) {
			$phpenv['phpSESSIONPATHWRITABLE'] = _FPA_Y;

		} else {
			$phpenv['phpSESSIONPATHWRITABLE'] = _FPA_N;
		}


	// input and upload related settings
	$phpenv['phpUPLOADS']           = ini_get( 'file_uploads' );
	$phpenv['phpMAXUPSIZE']         = ini_get( 'upload_max_filesize' );
	$phpenv['phpMAXPOSTSIZE']       = ini_get( 'post_max_size' );
	$phpenv['phpMAXINPUTTIME']      = ini_get( 'max_input_time' );
	$phpenv['phpMAXEXECTIME']       = ini_get( 'max_execution_time' );
	$phpenv['phpMEMLIMIT']          = ini_get( 'memory_limit' );
	$phpenv['phpDISABLED']          = ini_get( 'disable_functions' );



	// get all the PHP loaded extensions and versions
	foreach ( get_loaded_extensions() as $i => $ext ) {
		$phpextensions[$ext]    = phpversion($ext);
	}

	$phpextensions['Zend Engine'] = zend_version();

?>