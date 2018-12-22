<?php echo '<!-- NOTE (RussW): include '. basename(__FILE__) .' placeholder -->'; ?>
<?php
  /* NOTE (RussW): build initial arrays
   *
   */
	/** SUPPORT SECTIONS *************************************************************/
	/** added a 2.5 section - Phil 4-20-12 *******/
	/** added a 3.1, 3.2 section - Phil 01-01-14
		Note:
		With the release of Joomla! 3.2, the CMS introduced a new feature called, Strong Passwords.
		The intent was to enhance the encryption of password hashing and storage through the use of BCrypt,
		thus increasing the security of Joomla! 3.2 user accounts. Bcrypt was not available in the early releases
		of php 5.3, and with the first releases, a bug in the algorithm surfaced. This prompted a change in the
		later php versions to fix it. The Joomla 3 series required a minimum php version of 5.3+ which unfortunately
		includes php versions without BCrypt and the buggy first release of BCrypt. The Strong Passwords feature
		has built in compatibility to determine if BCrypt was available based on a php version check of the Joomla
		installation's server. The version check is used to determine exactly what the Strong Passwords feature
		would enable, BCrypt or the next best available password hashing encryption available. Unfortunately,
		this can lead to access issues under certain circumstances.
		To reflect this issue with Joomla 3.2.0 and earlier versions of php 5.3, the FPA checks to see if
		the Joomla! version is 3.2.0 and then checks the php version on the server. If the version php version
		is less than 5.3.7 then the FPA will report that php does not support Joomla!
		PHP version of 5.3.1+ is supported by Joomla 3.2.1 due to the fix put in place in Joomla 3.2.1
		Mysql:
		On Medialayer at least, mysql 5.0.87-community will work with current versions of Joomla and has inno db enabled
		*******/
		
		/** MariaDB check. Get the Database type and look for MariaDB. All current versions of MariaDB 
			should be current with Joomla. The issue with using version numbers is mysql also uses numbers, 
			so this check differentiates between mysql and MariaDB. If there is a better idea given the 
			current FPA code feel free to submit it.  -- PhilD 03-17-17
		****/
		$input_line = @$database['dbHOSTSERV'];
		preg_match("/\b(\w*mariadb\w*)\b/i", $input_line, $output_array);
	
		
	if  (@$instance['cmsRELEASE'] >= '4.0') {
		$fpa['supportENV']['minPHP']        = '7.0.0';
		$fpa['supportENV']['minSQL']        = '5.1.0';
		$fpa['supportENV']['maxPHP']        = '7.5.0';  
		$fpa['supportENV']['maxSQL']        = '8.5.0'; 
		$fpa['supportENV']['badPHP'][0]     = '5.3.0';
		$fpa['supportENV']['badPHP'][1]     = '5.3.1';
		$fpa['supportENV']['badPHP'][2]     = '5.3.2';
		$fpa['supportENV']['badPHP'][3]     = '5.3.3';
		$fpa['supportENV']['badPHP'][4]     = '5.3.4';
		$fpa['supportENV']['badPHP'][5]     = '5.3.5';
		$fpa['supportENV']['badPHP'][6]     = '5.3.6';
		$fpa['supportENV']['badZND'][0]     = _FPA_NA;	

	} elseif  (@$instance['cmsRELEASE'] == '3.10') {
		$fpa['supportENV']['minPHP']        = '5.3.10';
		$fpa['supportENV']['minSQL']        = '5.1.0';
		$fpa['supportENV']['maxPHP']        = '7.5.0';  
		$fpa['supportENV']['maxSQL']        = '8.5.0'; 
		$fpa['supportENV']['badPHP'][0]     = '5.3.0';
		$fpa['supportENV']['badPHP'][1]     = '5.3.1';
		$fpa['supportENV']['badPHP'][2]     = '5.3.2';
		$fpa['supportENV']['badPHP'][3]     = '5.3.3';
		$fpa['supportENV']['badPHP'][4]     = '5.3.4';
		$fpa['supportENV']['badPHP'][5]     = '5.3.5';
		$fpa['supportENV']['badPHP'][6]     = '5.3.6';
		$fpa['supportENV']['badZND'][0]     = _FPA_NA;

	} elseif  (@$instance['cmsRELEASE'] == '3.9') {
		$fpa['supportENV']['minPHP']        = '5.3.10';
		$fpa['supportENV']['minSQL']        = '5.1.0';
		$fpa['supportENV']['maxPHP']        = '7.5.0';  
		$fpa['supportENV']['maxSQL']        = '8.5.0'; 
		$fpa['supportENV']['badPHP'][0]     = '5.3.0';
		$fpa['supportENV']['badPHP'][1]     = '5.3.1';
		$fpa['supportENV']['badPHP'][2]     = '5.3.2';
		$fpa['supportENV']['badPHP'][3]     = '5.3.3';
		$fpa['supportENV']['badPHP'][4]     = '5.3.4';
		$fpa['supportENV']['badPHP'][5]     = '5.3.5';
		$fpa['supportENV']['badPHP'][6]     = '5.3.6';
		$fpa['supportENV']['badZND'][0]     = _FPA_NA;	

	} elseif  (@$instance['cmsRELEASE'] > '3.7' and @$instance['cmsDEVLEVEL'] > '2') {
		$fpa['supportENV']['minPHP']        = '5.3.10';
		$fpa['supportENV']['minSQL']        = '5.1.0';
		$fpa['supportENV']['maxPHP']        = '7.5.0';  
		$fpa['supportENV']['maxSQL']        = '5.8.0'; 
		$fpa['supportENV']['badPHP'][0]     = '5.3.0';
		$fpa['supportENV']['badPHP'][1]     = '5.3.1';
		$fpa['supportENV']['badPHP'][2]     = '5.3.2';
		$fpa['supportENV']['badPHP'][3]     = '5.3.3';
		$fpa['supportENV']['badPHP'][4]     = '5.3.4';
		$fpa['supportENV']['badPHP'][5]     = '5.3.5';
		$fpa['supportENV']['badPHP'][6]     = '5.3.6';
		$fpa['supportENV']['badZND'][0]     = _FPA_NA;	

	} elseif ( @$instance['cmsRELEASE'] >= '3.5') {
		$fpa['supportENV']['minPHP']        = '5.3.10';
		$fpa['supportENV']['minSQL']        = '5.1.0';
		$fpa['supportENV']['maxPHP']        = '7.1.99';  
		$fpa['supportENV']['maxSQL']        = '5.8.0'; 
		$fpa['supportENV']['badPHP'][0]     = '5.3.0';
		$fpa['supportENV']['badPHP'][1]     = '5.3.1';
		$fpa['supportENV']['badPHP'][2]     = '5.3.2';
		$fpa['supportENV']['badPHP'][3]     = '5.3.3';
		$fpa['supportENV']['badPHP'][4]     = '5.3.4';
		$fpa['supportENV']['badPHP'][5]     = '5.3.5';
		$fpa['supportENV']['badPHP'][6]     = '5.3.6';
		$fpa['supportENV']['badZND'][0]     = _FPA_NA;

	} elseif ( @$instance['cmsRELEASE']  == '3.3' or @$instance['cmsRELEASE']  == '3.4')  {
		$fpa['supportENV']['minPHP']        = '5.3.10';
		$fpa['supportENV']['minSQL']        = '5.1.0';
		$fpa['supportENV']['maxPHP']        = '6.0.0';  
		$fpa['supportENV']['maxSQL']        = '5.8.0'; 
		$fpa['supportENV']['badPHP'][0]     = '5.3.0';
		$fpa['supportENV']['badPHP'][1]     = '5.3.1';
		$fpa['supportENV']['badPHP'][2]     = '5.3.2';
		$fpa['supportENV']['badPHP'][3]     = '5.3.3';
		$fpa['supportENV']['badPHP'][4]     = '5.3.4';
		$fpa['supportENV']['badPHP'][5]     = '5.3.5';
		$fpa['supportENV']['badPHP'][6]     = '5.3.6';
		$fpa['supportENV']['badZND'][0]     = _FPA_NA;

	} elseif ( @$instance['cmsRELEASE'] == '3.2' and @$instance['cmsDEVLEVEL'] >= 1) {
		$fpa['supportENV']['minPHP']        = '5.3.1';
		$fpa['supportENV']['minSQL']        = '5.1.0';
		$fpa['supportENV']['maxPHP']        = '6.0.0';  // latest release?
		$fpa['supportENV']['maxSQL']        = '5.8.0';  // latest release?
		$fpa['supportENV']['badPHP'][0]     = '5.3.0';
		$fpa['supportENV']['badPHP'][1]     = '5.3.1';
		$fpa['supportENV']['badPHP'][2]     = '5.3.2';
		$fpa['supportENV']['badPHP'][3]     = '5.3.3';
		$fpa['supportENV']['badPHP'][4]     = '5.3.4';
		$fpa['supportENV']['badPHP'][5]     = '5.3.5';
		$fpa['supportENV']['badPHP'][6]     = '5.3.6';
		$fpa['supportENV']['badZND'][0]     = _FPA_NA;
	} elseif ( @$instance['cmsRELEASE'] == '3.2' and @$instance['cmsDEVLEVEL'] == 0) {
		$fpa['supportENV']['minPHP']        = '5.3.7';
		$fpa['supportENV']['minSQL']        = '5.1.0';
		$fpa['supportENV']['maxPHP']        = '6.0.0';  // latest release?
		$fpa['supportENV']['maxSQL']        = '5.8.0';  // latest release?
		$fpa['supportENV']['badPHP'][0]     = '5.3.0';
		$fpa['supportENV']['badPHP'][1]     = '5.3.1';
		$fpa['supportENV']['badPHP'][2]     = '5.3.2';
		$fpa['supportENV']['badPHP'][3]     = '5.3.3';
		$fpa['supportENV']['badPHP'][4]     = '5.3.4';
		$fpa['supportENV']['badPHP'][5]     = '5.3.5';
		$fpa['supportENV']['badPHP'][6]     = '5.3.6';
		$fpa['supportENV']['badZND'][0]     = _FPA_NA;
	} elseif ( @$instance['cmsRELEASE'] == '3.1' ) {
		$fpa['supportENV']['minPHP']        = '5.3.1';
		$fpa['supportENV']['minSQL']        = '5.1.0';
		$fpa['supportENV']['maxPHP']        = '6.0.0';  // latest release?
		$fpa['supportENV']['maxSQL']        = '5.8.0';  // latest release?
		$fpa['supportENV']['badPHP'][0]     = '5.3.0';
		$fpa['supportENV']['badPHP'][1]     = '5.3.1';
		$fpa['supportENV']['badPHP'][2]     = '5.3.2';
		$fpa['supportENV']['badPHP'][3]     = '5.3.3';
		$fpa['supportENV']['badPHP'][4]     = '5.3.4';
		$fpa['supportENV']['badPHP'][5]     = '5.3.5';
		$fpa['supportENV']['badPHP'][6]     = '5.3.6';
		$fpa['supportENV']['badZND'][0]     = _FPA_NA;
	} elseif ( @$instance['cmsRELEASE'] == '3.0' ) {
		$fpa['supportENV']['minPHP']        = '5.3.1';
		$fpa['supportENV']['minSQL']        = '5.1.0';
		$fpa['supportENV']['maxPHP']        = '5.3.6';  // latest release?
		$fpa['supportENV']['maxSQL']        = '5.8.0';  // latest release?
		$fpa['supportENV']['badPHP'][0]     = '5.3.0';
		$fpa['supportENV']['badPHP'][1]     = '5.3.1';
		$fpa['supportENV']['badPHP'][2]     = '5.3.2';
		$fpa['supportENV']['badPHP'][3]     = '5.3.3';
		$fpa['supportENV']['badPHP'][4]     = '5.3.4';
		$fpa['supportENV']['badPHP'][5]     = '5.3.5';
		$fpa['supportENV']['badPHP'][6]     = '5.3.6';
		$fpa['supportENV']['badZND'][0]     = _FPA_NA;
	} elseif ( @$instance['cmsRELEASE'] == '2.5' ) {
		$fpa['supportENV']['minPHP']        = '5.2.4';
		$fpa['supportENV']['minSQL']        = '5.0.4';
		$fpa['supportENV']['maxPHP']        = '6.0.0';  // latest release?
		$fpa['supportENV']['maxSQL']        = '5.8.0';  // latest release?
		$fpa['supportENV']['badPHP'][0]     = _FPA_NA;
		$fpa['supportENV']['badZND'][0]     = _FPA_NA;

	} elseif ( @$instance['cmsRELEASE'] == '1.7' ) {
		$fpa['supportENV']['minPHP']        = '5.2.4';
		$fpa['supportENV']['minSQL']        = '5.0.4';
		$fpa['supportENV']['maxPHP']        = '6.0.0';  // latest release?
		$fpa['supportENV']['maxSQL']        = '5.8.0';  // latest release?
		$fpa['supportENV']['badPHP'][0]     = _FPA_NA;
		$fpa['supportENV']['badZND'][0]     = _FPA_NA;

	} elseif ( @$instance['cmsRELEASE'] == '1.6' ) {
		$fpa['supportENV']['minPHP']        = '5.2.4';
		$fpa['supportENV']['minSQL']        = '5.0.4';
		$fpa['supportENV']['maxPHP']        = '6.0.0';  // latest release?
		$fpa['supportENV']['maxSQL']        = '5.8.0';  // latest release?
		$fpa['supportENV']['badPHP'][0]     = _FPA_NA;
		$fpa['supportENV']['badZND'][0]     = _FPA_NA;

	} elseif ( @$instance['cmsRELEASE'] == '1.5' ) {

		if ( @$instance['cmsDEVLEVEL'] <= '14' ) {
			$fpa['supportENV']['minPHP']        = '4.3.10';
			$fpa['supportENV']['minSQL']        = '3.23.0';
			$fpa['supportENV']['maxPHP']        = '5.2.17';
			$fpa['supportENV']['maxSQL']        = '5.5.0';  // limited by ENGINE TYPE changes in 5.5 and install sql syntax

		} else {
			$fpa['supportENV']['minPHP']        = '4.3.10';
			$fpa['supportENV']['minSQL']        = '3.23.0';
			$fpa['supportENV']['maxPHP']        = '5.3.6';
			$fpa['supportENV']['maxSQL']        = '5.5.0';  // limited by ENGINE TYPE changes in 5.5 and install sql syntax

		}

		$fpa['supportENV']['badPHP'][0]     = '4.3.9';
		$fpa['supportENV']['badPHP'][1]     = '4.4.2';
		$fpa['supportENV']['badPHP'][2]     = '5.0.4';
		$fpa['supportENV']['badZND'][0]     = '2.5.10';

	} elseif ( @$instance['cmsRELEASE'] == '1.0' ) {
		$fpa['supportENV']['minPHP']        = '3.0.1';
		$fpa['supportENV']['minSQL']        = '3.0.0';
	//	$fpa['supportENV']['maxPHP']        = '4.4.9';
		$fpa['supportENV']['maxPHP']        = '5.2.17';   // changed max supported php from 4.4.9 to 5.2.17 - 03/12/17 - PD
		$fpa['supportENV']['maxSQL']        = '5.0.91';  // limited by ENGINE TYPE changes in 5.0 and install sql syntax
		$fpa['supportENV']['badPHP'][0]     = _FPA_NA;
		$fpa['supportENV']['badZND'][0]     = _FPA_NA;

	} else {
		$fpa['supportENV']['minPHP']        = _FPA_NA;
		$fpa['supportENV']['minSQL']        = _FPA_NA;
		$fpa['supportENV']['maxPHP']        = _FPA_NA;
		$fpa['supportENV']['maxSQL']        = _FPA_NA;
		$fpa['supportENV']['badPHP'][0]     = _FPA_NA;
		$fpa['supportENV']['badZND'][0]     = _FPA_NA;
	}


?>