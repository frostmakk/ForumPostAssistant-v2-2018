<?php echo '<!-- NOTE (RussW): include '. basename(__FILE__) .' placeholder -->'; ?>
<?php
  /* NOTE (RussW): build initial arrays
   *
   */
	/** DETERMINE SOME SETTINGS BEFORE FPA MIGHT PLAY WITH THEM ******************************/
	$phpenv['phpERRORDISPLAY']  = ini_get( 'display_errors' );
	$phpenv['phpERRORREPORT']   = ini_get( 'error_reporting' );
	$fpa['ORIGphpMEMLIMIT']     = ini_get( 'memory_limit' );
	$fpa['ORIGphpMAXEXECTIME']  = ini_get( 'max_execution_time' );
	$phpenv['phpERRLOGFILE']    = ini_get( 'error_log' );
	$system['sysSHORTOS']       = strtoupper( substr( PHP_OS, 0, 3 ) ); // WIN, DAR, LIN, SOL
	$system['sysSHORTWEB']      = strtoupper( substr( $_SERVER['SERVER_SOFTWARE'], 0, 3 ) ); // APA = Apache, MIC = MS IIS, LIT = LiteSpeed etc


    
	// if the user see's Out Of Memory or Execution Timer pops, double the current memory_limit and max_execution_time
	if ( @$_POST['increasePOPS'] == 1 ) {
		ini_set ( 'memory_limit', (rtrim($fpa['ORIGphpMEMLIMIT'],"M")*2)."M" );
		ini_set ( 'max_execution_time', ($fpa['ORIGphpMAXEXECTIME']*2) );
	}



	/** DETERMINE IF THERE IS A KNOWN ERROR ALREADY *******************************************
	** here we try and determine if there is an existing php error log file, if there is we
	** then look to see how old it is, if it's less than one day old, lets see if what the last
	** error this and try and auto-enter that as the problem description
	*****************************************************************************************/

	/** is there an existing php error-log file? *********************************************/
	if ( file_exists( $phpenv['phpERRLOGFILE'] ) ) {
		// when was the file last modified?
		$phpenv['phpLASTERRDATE'] = @date ("dS F Y H:i:s.", filemtime( $phpenv['phpERRLOGFILE'] ));

		// determine the number of seconds for one day
		$age = 86400;
		// $age = strtotime('tomorrow') - time();
		// get the modified time in seconds
		$file_time = filemtime( $phpenv['phpERRLOGFILE'] );
		// get the current time in seconds
		$now_time = time();

			/** if the file was modified less than one day ago, grab the last error entry
			** Changed this section to get rid of the "Strict Standards: Only variables should be passed by reference"
			** error  Phil - 9-20-12 */
		if ( $now_time - $file_time < $age ) {
			/*  !FIXME memory allocation error on large php_error file - RussW
			** replaced these two lines with code below - Phil 09-23-12
			**  $lines = file( $phpenv['phpERRLOGFILE'] );
			**  $phpenv['phpLASTERR'] = array_pop( $lines );

	*********************************************
		** Begin the fix for the memory allocation error on large php_error file
		** Solution is to read the file line by line; not reading the whole file in memory.
		** I just open a kind of a pointer to it, then seek it char by char.
		** This is a more efficient way to work with large files.   - Phil 09-23-12  */
	$line = '';

	$f = fopen(($phpenv['phpERRLOGFILE']), 'r');
	$cursor = -1;

	fseek($f, $cursor, SEEK_END);
	$char = fgetc($f);

	/**
	* Trim trailing newline chars of the file
	*/
	while ($char === "\n" || $char === "\r") {
		fseek($f, $cursor--, SEEK_END);
		$char = fgetc($f);
		}

	/**
	* Read until the start of file or first newline char
	*/
	while ($char !== false && $char !== "\n" && $char !== "\r") {
	/**
	* Prepend the new char
	*/
		$line = $char . $line;
		fseek($f, $cursor--, SEEK_END);
		$char = fgetc($f);
		}

	// echo $line;
	$phpenv['phpLASTERR'] = $line;

		}
			}
	// ************** End Fix for memory allocation error when reading php_error file
?>