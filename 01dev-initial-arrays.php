<?php echo '<!-- NOTE (RussW): include '. basename(__FILE__) .' placeholder -->'; ?>

<?php


	/** DEFINE LANGUAGE STRINGS **************************************************************/



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

	// user post form content
	define ( '_FPA_PROB_DSC', 'Problem Description' );
	define ( '_FPA_PROB_MSG', 'Log/Error Message' );
	define ( '_FPA_PROB_ACT', 'Actions Taken To Resolve' );
	define ( '_FPA_INFOPRI', 'Information Privacy' );
	define ( '_FPA_STRICT', 'Strict' );
	define ( '_FPA_PRIVSTR', 'Strict' );

	/** common screen and post output strings ************************************************/
	define ( '_FPA_APP', 'Joomla!' );
	define ( '_FPA_PLATFORM', 'Platform' );
	define ( '_FPA_DB', 'Database');
	define ( '_FPA_SYS', 'System' );
	define ( '_FPA_SITE', 'SITE' );
	define ( '_FPA_ADMIN', 'ADMIN' );
	define ( '_FPA_OF', 'of' );
	define ( '_FPA_IN', 'in' );
	define ( '_FPA_BUT', 'but' );
	define ( '_FPA_LAST', 'Last' );
	define ( '_FPA_NONE', 'None' );
	define ( '_FPA_DEF', 'default' );
	define ( '_FPA_FIRST', 'First' );
	define ( '_FPA_M', 'Maybe' );
	define ( '_FPA_E', 'Exists' );
	define ( '_FPA_JCORE', 'Core' );
	define ( '_FPA_3PD', '3rd Party' );
	define ( '_FPA_TESTP', 'tests performed' );
	define ( '_FPA_DNE', 'Does Not Exist' );
	define ( '_FPA_NF', 'Not Found' );
	define ( '_FPA_OPTS', 'Options' );
	define ( '_FPA_CFG', 'Configuration' );
	define ( '_FPA_YC', 'Configured' );
	define ( '_FPA_ECON', 'Connection Error' );
	define ( '_FPA_DROOT', 'Doc Root' );
	define ( '_FPA_ER', 'Error(s) Reported' );
	define ( '_FPA_PERF', 'Performance' );
	define ( '_FPA_CREDPRES', 'Credentials Present' );
	define ( '_FPA_HOST', 'Host' );
	define ( '_FPA_TEC', 'Technology' );
	define ( '_FPA_WSVR', 'Web Server' );
	define ( '_FPA_HIDDEN', 'protected' );
	define ( '_FPA_PASS', 'Password' );
	define ( '_FPA_USER', 'Username' );
	define ( '_FPA_USR', 'User' );
	define ( '_FPA_TSIZ', 'Size' );
	define ( '_FPA_TCOL', 'Collation' );
	define ( '_FPA_CHARS', 'Character Set' );
	define ( '_FPA_WRITABLE', 'Writable' );
	define ( '_FPA_RO', 'Read-Only' );
	define ( '_FPA_OWNER', 'Owner' );
	define ( '_FPA_GROUP', 'Group' );
	define ( '_FPA_BASIC', 'Basic' );
	define ( '_FPA_DETAILED', 'Detailed' );
	define ( '_FPA_ENVIRO', 'Environment' );
	define ( '_FPA_NO', 'No' );
	define ( '_FPA_STATS', 'statistics');
	define ( '_FPA_POTOI', 'Potential Ownership Issues' );
	define ( '_FPA_POTME', 'Potential Missing Extensions' );
	define ( '_FPA_POTMM', 'Potential Missing Modules' );
	define ( '_FPA_DBCONNNOTE', 'may not be an error, check with host for remote access requirements.' );
	define ( '_FPA_DBCREDINC', 'Credentials incomplete or not available');
	define ( '_FPA_UINC', 'increased by user, was' );
	define ( '_FPA_MISSINGCRED', 'Missing credentials detected' );
	define ( '_FPA_NODISPLAY', 'Nothing to display.' );
	define ( '_FPA_MVFW', 'More than one instance of version.php found!' );
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