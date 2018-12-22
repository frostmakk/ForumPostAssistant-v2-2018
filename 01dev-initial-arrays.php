<?php echo '<!-- NOTE (RussW): include '. basename(__FILE__) .' placeholder -->'; ?>

<?php


	/** DEFINE LANGUAGE STRINGS **************************************************************/
	define ( '_PHP_DISERR', 'Display PHP Errors Enabled' );
	define ( '_PHP_ERRREP', 'PHP Error Reporting Enabled' );
	define ( '_PHP_LOGERR', 'PHP Errors Being Logged To File' );
	// section titles & developer-mode array names
	define ( '_FPA_SNAP_TITLE', 'Environment Support Snapshot' );
	define ( '_FPA_INST_TITLE', 'Application Instance' );
	define ( '_FPA_SYS_TITLE', 'System Environment' );
	define ( '_FPA_PHP_TITLE', 'PHP Environment' );
	define ( '_FPA_PHPEXT_TITLE', 'PHP Extensions' );
	define ( '_FPA_PHPREQ_TITLE', 'PHP Requirements' );
	define ( '_FPA_APAMOD_TITLE', 'Apache Modules' );
	define ( '_FPA_APAREQ_TITLE', 'Apache Requirements' );
	define ( '_FPA_DB_TITLE', 'Database Instance' );
	define ( '_FPA_TABLE', 'Tables' );
	define ( '_FPA_DBTBL_TITLE', 'Table Structure' );
	define ( '_FPA_PERMCHK_TITLE', 'Permissions Checks' );
	define ( '_FPA_COREDIR_TITLE', 'Core Folders' );
	define ( '_FPA_ELEVPERM_TITLE', 'Elevated Permissions' );
	define ( '_FPA_EXTCOM_TITLE', 'Components' );
	define ( '_FPA_EXTMOD_TITLE', 'Modules' );
	define ( '_FPA_EXTPLG_TITLE', 'Plugins' );
	define ( '_FPA_EXTLIB_TITLE', 'Libraries' );
	define ( '_FPA_TMPL_TITLE', 'Templates' );
	// snapshot definitions
	define ( '_FPA_SUPPHP', 'PHP Supports');
	define ( '_FPA_SUPSQL', 'Database Supports');
	define ( '_FPA_BADPHP', 'Known Buggy PHP');
	define ( '_FPA_BADZND', 'Known Buggy Zend');
	// slow screen message
	define ( '_FPA_SLOWGENPOST', 'Generating Post Output...' );
	define ( '_FPA_SLOWRUNTEST', 'Hang on while we run some tests...' );

	// dev/diag-mode content
	define ( '_FPA_DEVMI', 'developer-mode-information' );
	define ( '_FPA_ELAPSE', 'elapse-runtime' );
	define ( '_FPA_DEVENA', 'DEVELOPER MODE is enabled' );
	define ( '_FPA_DEVDSC', 'This means that a variety of additional information will be displayed on-screen to assist with troubleshooting this script.' );
	define ( '_FPA_DIAENA', 'DIGNOSTIC MODE is enabled' );
	define ( '_FPA_DIADSC', 'This means that all php and script errors will be displayed on-screen and logged out to a file named' );
	define ( '_FPA_DIAERR', 'Last DIGNOSTIC MODE Error' );
	define ( '_FPA_SPNOTE', 'Special Note' );
	// user post form content
	define ( '_FPA_INSTRUCTIONS', 'Instructions' );
	define ( '_FPA_INS_1', 'Enter your problem description <i>(optional)</i>' );
	define ( '_FPA_INS_2', 'Enter any error messages you see <i>(optional)</i>' );
	define ( '_FPA_INS_3', 'Enter any actions taken to resolve the issue <i>(optional)</i>' );
	define ( '_FPA_INS_4', 'Select detail level options of output <i>(optional)</i>' );
	define ( '_FPA_INS_5', 'Click the <span class="normal-note">Click Here To Generate Post</span> button to build the post content' );
	define ( '_FPA_INS_6', 'Copy the contents of the <span class="ok-hilite">&nbsp;Post Detail&nbsp;</span> box and paste it into a post following the instructions below the generated text box' );
	define ( '_FPA_INS_7', ' <div align="center"><font size="2">To copy the contents of the Post Detail box:
            </font></div>
            <p align="left" />
            <div align="left"><font size="2">1.) Place the cursor in the above box of generated text.</font></div>
            <p align="left" />
            <div align="left"><font size="2">2.) Use CTRL-a to select all the text within the box.</font></div>
            <p align="left" />
            <div align="left"><font size="2">3.) Use CTRL-c to copy the generated text to the browser clipboard.</font></div>
            <p align="left" />
            <div align="left"><font size="2">4.) Use CTRL-v to paste the copied text into your forum posting at the desired spot.</font></div> 
            <p align="left" />
            <div align="left"><font size="2">5.) Disable smilies to prevent charcters being converted by the forums software.</font></div> 
            <hr>
            <div align="left"><font size="2">If your site has many extensions installed, the forum post output could excede the posting limit. </font></div>
            <div align="left"><font size="2">If this happens, use more than one post, and utilize the optional settings to divide the output.  </font></div>
            <div align="left"><font size="2">Try generating first without plugins, and next with plugins but without components and modules.   </font></div>
            <p align="left" />
            <div align="left"><font size="2">Maximum number of characters pr. post are 20.000    <button type="button" onclick="CountCharacters()">Count Characters</button></div>
            <div align="center"><font size="3"> <output id ="chcount"></output></div>');
	define ( '_FPA_POST_NOTE', 'Leave ALL fields blank/empty to simply post diagnostic information.' );
	define ( '_FPA_PROB_DSC', 'Problem Description' );
	define ( '_FPA_PROB_MSG', 'Log/Error Message' );
	define ( '_FPA_PROB_ACT', 'Actions Taken To Resolve' );
	define ( '_FPA_PROB_CRE', 'Actions To ReCreate Issue' );
	define ( '_FPA_OPT', 'Optional Settings' );
	define ( '_FPA_SHOWELV', 'Show elevated folder permissions' );
	define ( '_FPA_SHOWDBT', 'Show database table statistics' );
	define ( '_FPA_SHOWCOM', 'Show Components' );
	define ( '_FPA_SHOWMOD', 'Show Modules' );
	define ( '_FPA_SHOWPLG', 'Show Plugins' );
	define ( '_FPA_SHOWCEX', 'Show Core Extensions' );
	define ( '_FPA_INFOPRI', 'Information Privacy' );
	define ( '_FPA_STRICT', 'Strict' );
	define ( '_FPA_PRIVNON', 'None' );
	define ( '_FPA_PRIVNONNOTE', 'No elements are masked' );
	define ( '_FPA_PRIVPAR', 'Partial' );
	define ( '_FPA_PRIVPARNOTE', 'Some elements are masked' );
	define ( '_FPA_PRIVSTR', 'Strict' );
	define ( '_FPA_PRIVSTRNOTE', 'All indentifiable elements are masked' );
	define ( '_FPA_CLICK', 'Click Here To Generate Post' );
	define ( '_FPA_OUTMEM', 'Out of Memory');
	define ( '_FPA_OUTTIM', 'Execution Time-Outs' );
	define ( '_FPA_INCPOPS', 'Temporarily increase PHP Memory and Execution Time' );
	define ( '_FPA_POSTD', 'Post Detail' );

	/** common screen and post output strings ************************************************/
	define ( '_FPA_APP', 'Joomla!' );

	define ( '_FPA_PLATFORM', 'Platform' );
	define ( '_FPA_DB', 'Database');
	define ( '_FPA_SYS', 'System' );
	define ( '_FPA_SERV', 'Server' );
	define ( '_FPA_CLNT', 'Client' );
	define ( '_FPA_HNAME', 'Hostname' );
	define ( '_FPA_DISC', 'Discovery' );
	define ( '_FPA_LEGEND', 'Legends and Settings' );
	define ( '_FPA_GOOD', 'OK/GOOD' );
	define ( '_FPA_WARNINGS', 'WARNINGS' );
	define ( '_FPA_ALERTS', 'ALERTS' );
	define ( '_FPA_SITE', 'SITE' );
	define ( '_FPA_ADMIN', 'ADMIN' );
	define ( '_FPA_BY', 'by' );
	define ( '_FPA_OR', 'or' );
	define ( '_FPA_OF', 'of' );
	define ( '_FPA_TO', 'to' );
	define ( '_FPA_FOR', 'for' );
	define ( '_FPA_IS', 'is' );
	define ( '_FPA_AT', 'at' );
	define ( '_FPA_IN', 'in' );
	define ( '_FPA_BUT', 'but' );
	define ( '_FPA_LAST', 'Last' );
	define ( '_FPA_NONE', 'None' );
	define ( '_FPA_DEF', 'default' );

	define ( '_FPA_FIRST', 'First' );
	define ( '_FPA_M', 'Maybe' );
	define ( '_FPA_MDB', 'Yes - MariaDB Used' );

	define ( '_FPA_K', 'Known' );
	define ( '_FPA_E', 'Exists' );
	define ( '_FPA_JCORE', 'Core' );
	define ( '_FPA_3PD', '3rd Party' );
	define ( '_FPA_TESTP', 'tests performed' );
	define ( '_FPA_DNE', 'Does Not Exist' );
	define ( '_FPA_F', 'Found' );
	define ( '_FPA_NF', 'Not Found' );
	define ( '_FPA_OPTS', 'Options' );
	define ( '_FPA_CF', 'Config' );
	define ( '_FPA_CFG', 'Configuration' );
	define ( '_FPA_YC', 'Configured' );
	define ( '_FPA_NC', 'Not Configured' );
	define ( '_FPA_ECON', 'Connection Error' );
	define ( '_FPA_CON', 'Connect' );
	define ( '_FPA_YCON', 'Connected' );
	define ( '_FPA_CONT', 'Connection Type' );
	define ( '_FPA_NCON', 'Not Connected' );
	define ( '_FPA_SUP', 'support' );
	define ( '_FPA_YSUP', 'supported' );
	define ( '_FPA_DROOT', 'Doc Root' );
	define ( '_FPA_NSUP', 'not supported' );
	define ( '_FPA_NOA', 'Not Attempted' );
	define ( '_FPA_NER', 'No Errors Reported' );
	define ( '_FPA_ER', 'Error(s) Reported' );
	define ( '_FPA_ERR', 'error' );
	define ( '_FPA_ERRS', 'errors' );
	define ( '_FPA_YMATCH', 'Matches' );
	define ( '_FPA_NMATCH', 'Mis-Match' );
	define ( '_FPA_NACOMP', 'Appear Incomplete' );
	define ( '_FPA_YACOMP', 'Appear Complete' );
	define ( '_FPA_SEC', 'Security' );
	define ( '_FPA_FEAT', 'Features' );
	define ( '_FPA_PERF', 'Performance' );

	define ( '_FPA_CRED', 'Credentials' );
	define ( '_FPA_CREDPRES', 'Credentials Present' );
	define ( '_FPA_HOST', 'Host' );
	define ( '_FPA_TEC', 'Technology' );
	define ( '_FPA_WSVR', 'Web Server' );
	define ( '_FPA_HIDDEN', 'protected' );
	define ( '_FPA_PASS', 'Password' );
	define ( '_FPA_USER', 'Username' );
	define ( '_FPA_USR', 'User' );
	define ( '_FPA_TNAM', 'Name' );
	define ( '_FPA_TSIZ', 'Size' );
	define ( '_FPA_TENG', 'Engine' );
	define ( '_FPA_TCRE', 'Created' );
	define ( '_FPA_TUPD', 'Updated' );
	define ( '_FPA_TCKD', 'Checked' );
	define ( '_FPA_TCOL', 'Collation' );
	define ( '_FPA_CHARS', 'Character Set' );
	define ( '_FPA_TFRA', 'Fragment Size' );
	define ( '_FPA_AUTH', 'Author' );
	define ( '_FPA_ADDR', 'Address' );
	define ( '_FPA_STATUS', 'Status' );
	define ( '_FPA_TYPE', 'Type' );
	define ( '_FPA_TREC', 'Rcds' );  // Number of table records
	define ( '_FPA_TAVL', 'Avg. Length' );
	define ( '_FPA_MODE', 'Mode' );
	define ( '_FPA_WRITABLE', 'Writable' );
	define ( '_FPA_RO', 'Read-Only' );
	define ( '_FPA_FOLDER', 'Folder' );
	define ( '_FPA_FILE', 'File' );
	define ( '_FPA_OWNER', 'Owner' );
	define ( '_FPA_GROUP', 'Group' );

	define ( '_FPA_CRE', 'Created' );
	define ( '_FPA_LOCAL', 'Local' );
	define ( '_FPA_REMOTE', 'Remote' );
	define ( '_FPA_SECONDS', 'seconds' );
	define ( '_FPA_TBL', 'Table' );
	define ( '_FPA_STAT', 'Statistics' );
	define ( '_FPA_BASIC', 'Basic' );
	define ( '_FPA_DETAILED', 'Detailed' );
	define ( '_FPA_ENVIRO', 'Environment' );
	define ( '_FPA_VALID', 'Valid' );
	define ( '_FPA_NVALID', 'Not Valid' );
	define ( '_FPA_EN', 'Enabled' );
	define ( '_FPA_DI', 'Disabled' );
	define ( '_FPA_NO', 'No' );
	define ( '_FPA_STATS', 'statistics');
	define ( '_FPA_POTOI', 'Potential Ownership Issues' );
	define ( '_FPA_POTME', 'Potential Missing Extensions' );
	define ( '_FPA_POTMM', 'Potential Missing Modules' );
	define ( '_FPA_DBCONNNOTE', 'may not be an error, check with host for remote access requirements.' );
	define ( '_FPA_DBCREDINC', 'Credentials incomplete or not available');
	define ( '_FPA_MISSINGCRED', 'Missing credentials detected' );
	define ( '_FPA_NODISPLAY', 'Nothing to display.' );
	define ( '_FPA_EMPTY', 'could be empty' );
	define ( '_FPA_UINC', 'increased by user, was' );
	define ( '_PHP_VERLOW', 'PHP version too low' );
	define ( '_FPA_SHOW', 'Show' );
	define ( '_FPA_HIDE', 'Hide' );
	define ( 'act', '');
	define ( '_FPA_MVFW', 'More than one instance of version.php found!' );
	define ( '_FPA_MVFWF', 'Multiple found' );
	define ( '_FPA_DIR_UNREADABLE', 'A directory is <b>NOT READABLE</b> and cannot be checked!');
	define ( '_FPA_DI_PHP_FU', 'Disabled Functions' );        
	define ( '_FPA_FDSKSP', 'Free Disk Space' );
	define ( '_FPA_NIMPLY', 'Not implemented for' );
 	define ( '_FPA_PGSQL', 'PostgreSQL' );
 	define ( '_FPA_PMISS', 'Password missing' );
 	define ( '_FPA_DEFI', 'Defines' );    
 	define ( '_FPA_DEFIPA', 'Site and Admin config paths not equal' );
	/** END LANGUAGE STRINGS *****************************************************************/



  /* NOTE (RussW): build initial arrays
   *
   */

	$fpa['ARRNAME']         = _RES;
	$fpa['diagLOG']         = 'fpa-Diag.log';
	$snapshot['ARRNAME']        = _FPA_SNAP_TITLE;
	$instance['ARRNAME']        = _FPA_INST_TITLE;
	$system['ARRNAME']          = _FPA_SYS_TITLE;
	$phpenv['ARRNAME']          = _FPA_PHP_TITLE;
	$phpenv['phpLASTERR']       = '';
	$phpextensions['ARRNAME']   = _FPA_PHPEXT_TITLE;
	$phpreq['ARRNAME']          = _FPA_PHPREQ_TITLE;
	$phpreq['libxml']           = '';
	$phpreq['xml']              = '';
	$phpreq['zlib']             = '';
	$phpreq['zip']              = '';
	$phpreq['openssl']          = '';
	$phpreq['curl']             = '';
	$phpreq['iconv']            = '';
	$phpreq['mbstring']         = '';
	$phpreq['mysql']            = '';
	$phpreq['mysqli']           = '';
	$phpreq['pdo_mysql']        = '';
	$phpreq['mcrypt']           = '';
	$apachemodules['ARRNAME']   = _FPA_APAMOD_TITLE;
	$apachereq['ARRNAME']       = _FPA_APAREQ_TITLE;
	$apachereq['mod_rewrite']   = '';
	$apachereq['mod_expires']   = '';
	$apachereq['mod_deflate']   = '';
	$apachereq['mod_security']  = '';
	$apachereq['mod_evasive']   = '';
	$apachereq['mod_dosevasive'] = '';
	$apachereq['mod_ssl']       = '';
	$apachereq['mod_qos']       = '';
	$apachereq[' mod_userdir']  = '';
	$database['ARRNAME']        = _FPA_DB_TITLE;
	$tables['ARRNAME']          = _FPA_DBTBL_TITLE;
	$modecheck['ARRNAME']       = _FPA_PERMCHK_TITLE;
	// folders to be tested for permissions
	$folders['ARRNAME']         = _FPA_COREDIR_TITLE;
	$folders[]                  = 'images/';
	$folders[]                  = 'components/';
	$folders[]                  = 'modules/';
	$folders[]                  = 'plugins/';               // J!1.5 and above | either / or
	$folders[]                  = 'mambots/';               // J!1.0 only
	$folders[]                  = 'language/';
	$folders[]                  = 'templates/';
	$folders[]                  = 'cache/';
	$folders[]                  = 'logs/';
	$folders[]                  = 'tmp/';
	$folders[]                  = 'administrator/components/';
	$folders[]                  = 'administrator/modules/';
	$folders[]                  = 'administrator/language/';
	$folders[]                  = 'administrator/templates/';
	$folders[]                  = 'sites/';                 // nooku only?
	$folders[]                  = 'administrator/logs/';
	$elevated['ARRNAME']        = _FPA_ELEVPERM_TITLE;
	$component['ARRNAME']       = _FPA_EXTCOM_TITLE;
	$module['ARRNAME']          = _FPA_EXTMOD_TITLE;
	$plugin['ARRNAME']          = _FPA_EXTPLG_TITLE;
	$template['ARRNAME']        = _FPA_TMPL_TITLE;


?>