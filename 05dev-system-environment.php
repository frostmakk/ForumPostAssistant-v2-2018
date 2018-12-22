<?php echo '<!-- NOTE (RussW): include '. basename(__FILE__) .' placeholder -->'; ?>
<?php
  /* NOTE (RussW): build initial arrays
   *
   */
	/** DETERMINE SYSTEM ENVIRONMENT & SETTINGS ***********************************************
	** here we try to determine the hosting enviroment and configuration
	** to try and avoid "white-screens" fpa tries to check for function availability before
	** using any function, but this does mean it has grown in size quite a bit and unfortunately
	** gets a little messy in places.
	*****************************************************************************************/

	/** what server and os is the host? ******************************************************/
	$phpenv['phpVERSION'] = phpversion();
	$system['sysPLATFUL'] = php_uname('a');
	$system['sysPLATOS'] = php_uname('s');
	$system['sysPLATREL'] = php_uname('r');
	$system['sysPLATFORM'] = php_uname('v');
	$system['sysPLATNAME'] = php_uname('n');
	$system['sysPLATTECH'] = php_uname('m');
	$system['sysSERVNAME'] = $_SERVER['SERVER_NAME'];
	$system['sysSERVIP'] = gethostbyname($_SERVER['SERVER_NAME']);
	$system['sysSERVSIG'] = $_SERVER['SERVER_SOFTWARE'];
	$system['sysENCODING'] = $_SERVER["HTTP_ACCEPT_ENCODING"];
	$system['sysCURRUSER'] = get_current_user(); // current process user

	// !TESTME for WIN IIS7?
	// $system['sysSERVIP'] =  $_SERVER['LOCAL_ADDR'];

	if ( $system['sysSHORTOS'] != 'WIN' ) {

		$system['sysEXECUSER'] = @$_ENV['USER']; // user that executed this script

			if ( !@$_ENV['USER'] ) {
				$system['sysEXECUSER'] = $system['sysCURRUSER'];
			}

		$system['sysDOCROOT'] = $_SERVER['DOCUMENT_ROOT'];

	} else {
		$localpath = getenv( 'SCRIPT_NAME' );
		$absolutepath = str_replace( '\\', '/', realpath( basename( getenv( 'SCRIPT_NAME' ) ) ) );
		$system['sysDOCROOT'] = substr( $absolutepath, 0, strpos( $absolutepath, $localpath ) );
		$system['sysEXECUSER'] = $system['sysCURRUSER']; // Windows work-around for not using EXEC User (this limits the cpability of discovering SU Environments though)
	}

	// looking for the Apache "suExec" Utility
	if ( function_exists( 'exec' ) AND $system['sysSHORTOS'] != 'WIN' ) { // find the owner of the current process running this script
		$system['sysWEBOWNER'] = exec("whoami");

	} elseif ( function_exists( 'passthru' ) AND $system['sysSHORTOS'] != 'WIN' ) {
		$system['sysWEBOWNER'] = passthru("whoami");

	} else {
		$system['sysWEBOWNER'] = _FPA_NA;  // we'll have to give up if we can't 'exec' or 'passthru' something, this occurs with Windows and some more secure environments
	}

		// find the system temp directory
	if ( version_compare( PHP_VERSION, '5.2.1', '>=' ) ) {
		$system['sysSYSTMPDIR'] = sys_get_temp_dir();
        $frmsysSYSTMPDIR = $system['sysSYSTMPDIR'];
		// is the system /tmp writable to this user?
		if ( is_writable( sys_get_temp_dir() ) ) {
			$system['sysTMPDIRWRITABLE'] = _FPA_Y;
            $frmsysTMPDIRWRITABLE = _FPA_Y_ICON;
		} else {
			$system['sysTMPDIRWRITABLE'] = _FPA_N;
            $frmsysTMPDIRWRITABLE = _FPA_N_ICON;
		}

	} else {
		$system['sysSYSTMPDIR'] = _FPA_U;
        $frmsysSYSTMPDIR = _FPA_U_ICON;
		$system['sysTMPDIRWRITABLE'] = _FPA_U;
        $frmsysTMPDIRWRITABLE = _FPA_U_ICON;
	}
?>