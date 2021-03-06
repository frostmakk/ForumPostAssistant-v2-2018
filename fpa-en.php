<?php
/** NOTE (@RussW): DocBlock - summary and default FPA elements
 *  The Forum Post Assistant has been designed to assist newcomers to Joomla! and the forum to be able to discover and post relevant system, instance,
 *  php and troubleshooting information directly in to a pre-formatted forum post.
 *
 *  @version       2.0.0                                                                                                                              // TODO (@FPA): @verison, update on new releases
 *  @category      tools
 *  @package       Forum_Post_Assistant
 *  @author        RussW
 *  @author        PhilD
 *  @copyright     Copyright (C) 2011 - 2018 Forum Post Assistant Core & Development Team Members. All rights reserved.
 *  @license       GNU General Public License version 3 or later; see LICENSE
 *  @link          https://github.com/ForumPostAssistant Github Project Page
 *  @link          https://github.com/ForumPostAssistant/FPA/issues Github Issue Tracker
 *
 * @internal       Coding Style - is based on https://developer.joomla.org/coding-standards/intro.html where possible and is practical. Use of
 *                 traditional braces/curly-brackets ( if{, } else {, } // descriptive-comment ) is recommended and preferred over the textual
 *                 alternative-style ( if: else:, endif; ) to cater for multiple/cross IDE recognition.
 *                 Where it makes sense, is feasible and does not effect readability or function, lines should not exceed a notiional 150 chararcters
 *                 and inline single line comments being placed/started at the 150 character column as well.
 *                 Indentation tabs should equate to 4 spaces, with spaces being used to seperate inline for clarity.
 *                 A minimum of 2 lines & maximum of 6 lines should be used to seperate minor/major sections or code blocks for readability & clarity.
 *
 *  @internal      comment notation & change syntax
 *                 TYPE (@your-preferred-name): your comment content
 *
 *                 ( NOTE         - generic notation & information                     )
 *                 ( TODO         - a todo notice or or future addition item           )
 *                 ( BUG          - an error causing a fatal issue                     )
 *                 ( FIXME        - non-fatal item requiring problem resolution        )
 *                 ( HACK         - a work-around or hack requiring later resolution   )
 *                 ( TEST         - item requires (further) testing or is being proven )
 *                 ( DELETEME     - to be deleted prior to production                  )
 *                 ( DEPRECIATED  - an item has been replaced or will be removed soon  )
 *                 ( HIDDEN       - intentionally hidden                               )
 *                 example        - NOTE (@RussW): this is an example comment
 *
 */


/** NOTE (@RussW): Headers - set browser caching headers
 * attempt to set some headers to avoid browser caching where possible
 *
 */
 header('Cache-Control: no-store, private, no-cache, must-revalidate');                                                                               // HTTP/1.1
 header('Cache-Control: pre-check=0, post-check=0, max-age=0, max-stale = 0', false);                                                                 // HTTP/1.1
 header('Pragma: public');
 header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');                                                                                                    // some random (valid) date way in the past
 header('Expires: 0', false);
 header('Last-Modified: '.gmdate('D, d M Y H:i:s') . ' GMT');                                                                                         // automates adding todays date
 header ('Pragma: no-cache');


  /** TEST - START DELETE ME ****************************************/

  //$disabled = 'disabled';


  // TEST PARAMS

//  $latestFPAVER = strtolower('1.3.9-alpha');
//  $thisFPAVER = strtolower('1.4.0-beta');
//   $thisJVER = '3.9.1';
$disabled = '';
  /** TEST - END DELETE ME ****************************************/
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" vocab="http://schema.org/">

<?php
  /* HACK (RussW): enable FPATour
   * setup & initialise the BS Tour objects
   */
  if (@$_GET['tour'] == '1'):
    $runFPATour = '1';
  else:
    $runFPATour = '';
  endif;

  /* HACK (RussW): TESTING get the privacy settings
   *
   */
	if ( @$_POST['showProtected'] ) {
		$showProtected  = @$_POST['showProtected'];
	} else {
		$showProtected = 2; // default (limited privacy masking)
	}



    /** TODO (@ALL): VERSION CONTROL - versioning & revisioning
     * remember to update revision information
     *
     */
    define ( '_RES', 'Forum Post Assistant' );                                                                                                        // FPA resource long name
    define ( '_RES_SHORT', 'FPA' );                                                                                                                   // FPA resource short name
    define ( '_RES_VERSION', '2.0' );                                                                                                                 // major.minor revision (x.y)
    define ( '_RES_VERSION_MAINT', '0' );                                                                                                             // maintenance/patch revision (.z)
    define ( '_RES_RELEASE_TYPE', 'BS' );                                                                                                             // DEPRECIATING (@RussW): framework type (BS(Bootstrap), SA(Standalone))  Removed From Display Outputs : 27/05/2018
    define ( '_RES_RELEASE_BUILD', 'alpha' );                                                                                                         // dev status revision - dev(elopment), alpha, beta, rc, final
    define ( '_RES_NAME', 'Waikikamukau' );                                                                                                           // just a cute name for major/minor revisions (x.y) : RussW 27/05/2018
    define ( '_RES_LAST_UPDATED', '27 May 2018' );                                                                                                    // release date (dd MM yyyy)
    define ( '_RES_BRANCH', 'en-GB' );                                                                                                                // Github branch location
    define ( '_RES_LANG', 'en-GB' );                                                                                                                  // Country/Language Code


    /** NOTE (@FPA): PARENT FLAGS - Joomla!
     *
     */
    define ( '_VALID_MOS', 1 );                                                                                                                       // for J!1.0
    define ( '_JEXEC', 1 );                                                                                                                           // for J!1.5, J!1.6, J!1.7, J!2.5, J!3.0


  /** NOTE (@FPA): LANGUAGE - specific FPA definitions & constants
   *
   */
  define ( '_RES_MENU_HOME', 'Home' );                                                                                  // RussW : new 06/05/2018
  define ( '_RES_MENU_BASIC', 'Basic Discovery' );                                                                      // RussW : new 06/05/2018
  define ( '_RES_MENU_APP', 'Application Discovery' );                                                                  // RussW : new 06/05/2018
  define ( '_RES_MENU_HOST', 'Hosting Discovery' );                                                                     // RussW : new 06/05/2018
  define ( '_RES_MENU_PERM', 'Permissions Discovery' );                                                                 // RussW : new 06/05/2018
  define ( '_RES_MENU_EXT', 'Extension Discovery' );                                                                    // RussW : new 06/05/2018
  define ( '_RES_MENU_TOUR', 'FPA Tour' );                                                                              // RussW : new 06/05/2018
  define ( '_RES_FPALATEST', 'Latest (.tar.gz) Download' );
  define ( '_RES_FPALATEST2', 'Latest (.zip) Download' );
  /* DEPRECIATED (RussW): depreciated by github json array data
  define ( '_RES_FPALINK', 'https://github.com/ForumPostAssistant/FPA/tarball/en-GB/' ); // where to get the latest 'Final Releases
  define ( '_RES_FPALINK2', 'https://github.com/ForumPostAssistant/FPA/zipball/en-GB/' ); // where to get the latest 'Final Releases
  */
  define ( '_COPYRIGHT_HEADING', 'Developers & Contributors' );
  define ( '_COPYRIGHT_STMT', 'The FPA script has been developed by, and is copyright of the following contributors; Russell Winter, Phil DeGruy, Claire Mandville, Sveinung Larsen & Bernard Toplak.
                               <a class="text-primary" href="https://github.com/ForumPostAssistant" target="_blank">Visit the FPA Github Project</a>.'
         );
  define ( '_LICENSE_HEADING', 'Licensing & Disclaimer' );
  define ( '_LICENSE_FOOTER', 'script comes with ABSOLUTELY NO WARRANTY. This is free software; and covered under the <strong>GNU GPLv3 or later license</strong>.
                               You are welcome to redistribute it under certain conditions. For details read the LICENSE.txt file included in the download package with this script.
                               A copy of the license may also be obtained at <a class="text-primary" href="http://www.gnu.org/licenses/" target="_blank">http://www.gnu.org/licenses/</a>.'
         );
  define ( '_FPA_JOOMLA_DISCLAIMER', 'is not affiliated with or endorsed by The Joomla! Project™.<br />Use of the Joomla!® name, symbol, logo, and related trademarks is licensed by Open Source Matters, Inc.');



  /** NOTE (@FPA): LANGUAGE - FPA specific messages. Errors, warning & notices
   *
   */
  define ( '_RES_MESSAGE_WARNING', 'Notice' );                                                                          // RussW : new 07/05/2018
  define ( '_RES_MESSAGE_NOTFOUND', 'Not Found.' );                                                                     // RussW : new 07/05/2018
  define ( '_RES_MESSAGE_NOTCONN', 'Unable To Connect.' );                                                              // RussW : new 07/05/2018
  define ( '_RES_MESSAGE_NOTESTS', 'No FPA test routines were possible.' );                                             // RussW : new 07/05/2018
  // remove script notice content - Phil 4-17-12
  define ( '_FPA_DELNOTE_LN1', 'Security Notice' );
  define ( '_FPA_DELNOTE_LN2', 'Due to the highly sensitive nature of the information displayed by the FPA script, <b>it should be removed from the server immediately after use</b>.' );
  define ( '_FPA_DELNOTE_LN3', 'If the script is left on the site, it can be used to gather enough information to illegally access, deface or hack your site.' );
  define ( '_FPA_DELLINK', 'fpa-en.php?act=delete' );
  // J! & FPA version checking - RussW : new 12/05/2018
  define ( '_FPA_VER_CHECK_HEADING', 'Forum Post Assistant Version Check' );
  define ( '_FPA_VER_CHECK_ATLATEST', 'This FPA version is at the latest stable release.' );
  define ( '_FPA_VER_CHECK_OUTOFDATE', 'This FPA version <strong>is below the latest stable release</strong>.<br />You should consider updating your FPA script for the latest improvements.' );
  define ( '_FPA_VER_CHECK_ATDEVREL', 'This FPA version <strong>appears to be a development or pre-release version</strong>.<br />The FPA results may not be complete and you may observe some inconsistencies or minor bugs.' );
  define ( '_J_VER_CHECK_HEADING', 'Joomla! Version Check' );
  define ( '_J_VER_CHECK_ATLATEST', 'The discovered Joomla! version is at the latest stable release.' );
  define ( '_J_VER_CHECK_OUTOFDATE', 'The discovered Joomla! version <strong>is below the latest stable release</strong>.<br />You should consider updating your Joomla! installation.' );
  define ( '_J_VER_CHECK_ATDEVREL', 'The discovered Joomla! version <strong>appears to be a development or pre-release version</strong>.<br />The FPA results may not be complete if there are new features or depreciated functions.' );


  /** NOTE (@FPA): LANGUAGE - Offline Definitions & Constants
   * assume user is offline/no-internet if jQuery cannot be loaded from the CDN
   * the page #wrapper element is hidden and only display the following message
   */
  define ( '_FPA_OFFLINE', '<h4>Unable To Load Bootstrap or jQuery</h4>' );
  define ( '_FPA_OFFLINE_MESSAGE1', '<p><strong>Are you working offline or have no internet connection?</strong></p>' );
  define ( '_FPA_OFFLINE_MESSAGE2', '<p style="padding:0 5%;">From FPA v2.0, internet access is required for the FPA to function correctly due to the use of Bootstrap and jQuery. If you think this may be an intermittent problem, try reloading FPA again, confirm that your web browser is not in offline-mode and that you have an active internet connection.</p>');


  /** NOTE (@FPA): LANGUAGE - Headings/Explain/Section Description Definitions & Constants
   * fpa section headings, help/explain and sections (& sub-sections) descriptions
   *
   */
  define ( '_SETTINGS_HEADING', 'FPA Settings' );
  define ( '_SETTINGS_EXPLAIN', '<p>In order to collect relevant configuration & diagnostic information for you to generate a forum post, FPA needs to know what sort of problem you are observing and what information you wish to share in the forum. Please follow the instruction below to select the desired options and then click the <span class="label label-success">Generate Post Content</span> button.</p>
                                 <br />
                                 <ol>
                                   <li>Enter your problem description <i>(optional)</i></li>
                                   <li>Enter any error messages you see <i>(optional)</i></li>
                                   <li>Enter any actions taken to resolve the issue <i>(optional)</i></li>
                                   <li>Select detail & privacy level options of the output <i>(optional)</i></li>
                                   <li>Click the <b>Generate Post Content</b> button to build the post content</li>
                                   <li>Copy the contents of the <b>Forum Post Content</b> box (below) and paste it into a forum post</li>
                                 </ol>'
         );
  define ( '_POST_HEADING', 'Forum Post Content' );
  define ( '_POST_EXPLAIN', '<p>Once you have run the FPA script, with your chosen runtime options, your <b>Forum Post Content</b> will be displayed and you can then Copy and Paste this output in to a new post or reply in the forums to provide diagnostic and troubleshooting information when asking for assistance.</p>
                             <p>The post content will not be easily readable as it is formatted to correctly display in the forum, but all the information you can see on the FPA webpage (below) will be included.'
         );
  define ( '_SECTION_BASIC_HEADING', 'Basic Discovery' );
  define ( '_SECTION_BASIC_EXPLAIN', 'Basic hosting environment tests are run and compared to the documented installation requirements and known good configurations or known software versions that can sometimes cause problems. This information provides a quick and simple view of the generic environmental details.' );
  define ( '_SECTION_BASIC_DESCRIBE', 'The Basic Discovery section presents any initial diagnostic information that has been discovered about your hosting server, database, php environments and functions that may effect the smooth running of any installed Joomla! instance.' );
  define ( '_SECTION_BASIC_HEADING_SNAPSHOT', 'Environment Snapshot' );
  define ( '_SECTION_BASIC_DESCRIBE_SNAPSHOT', 'The snapshot provides an initial indication of how suitable your environment is for hosting Joomla!' );

  define ( '_SECTION_APPLICATION_HEADING', 'Application Discovery' );
  define ( '_SECTION_APPLICATION_EXPLAIN', 'During the Application Discovery routines, FPA attempts to detect a Joomla! installation, determine the version and collect information about how it is configured. Where possible, FPA will also try to access the Joomla! database and collect configuration, performance and schema information.' );
  define ( '_SECTION_APPLICATION_DESCRIBE', 'The Application Discovery section attempts to detect any installed Joomla! instance and confirm any relevant or related configuration and database information.' );
  define ( '_SECTION_APPLICATION_HEADING_INSTANCE', 'Installed Instance' );
  define ( '_SECTION_APPLICATION_DESCRIBE_INSTANCE', 'FPA attempts to detect a Joomla! instance and, if it is installed, determine the basic configuration parameters.' );
  define ( '_SECTION_APPLICATION_HEADING_DBCONFIG', 'Database Configuration' );
  define ( '_SECTION_APPLICATION_DESCRIBE_DBCONFIG', 'The database setup & configuration effects site presentation and performance.' );
  define ( '_SECTION_APPLICATION_HEADING_DBTABLES', 'Database Structure' );
  define ( '_SECTION_APPLICATION_DESCRIBE_DBTABLES', 'The database schema and table structure are the foundation of the website component and conent storage.' );
  define ( '_SECTION_HOSTING_HEADING', 'Hosting Discovery' );
  define ( '_SECTION_HOSTING_EXPLAIN', 'Server, hosting and software environments vary greatly. FPA attempts to discover the version, type and installed extensions or addons expected to be found on a typical hosting system.' );
  define ( '_SECTION_HOSTING_DESCRIBE', 'The hosting account or server is comprised of several different software and hardware elements. The FPA Hosting section checks for common configuration items that can effect your website.' );
  define ( '_SECTION_HOSTING_HEADING_SERVER', 'Server Configuration' );
  define ( '_SECTION_HOSTING_DESCRIBE_SERVER', 'The PHP and web-server configuration provide the foundations for a websites functionality, performance and security.' );
  define ( '_SECTION_PERMS_HEADING', 'Permissions Discovery' );
  define ( '_SECTION_PERMS_EXPLAIN', 'Permissions, sometimes also called modeset, determine who has access and how they can access any folder or file. FPA looks for acceptable or sane permissions and highlights any that may be elevated or incorrect and can potentially allow unauthorised access or cause operational problems.' );
  define ( '_SECTION_PERMS_DESCRIBE', 'FPA checks for acceptable folder and file permissions of the Joomla! Core Folders. Any incorrect or elevated permissions can be problematic and even expose the installation to being defaced, compromised or be rendered completely unusable.' );
  define ( '_SECTION_PERMS_HEADING_CORE', 'Core Folders' );
  define ( '_SECTION_PERMS_DESCRIBE_CORE', 'Correct folder permissions are essential for functionality and security of any website.' );
  define ( '_SECTION_PERMS_HEADING_ELEV', 'Elevated Permissions' );
  define ( '_SECTION_PERMS_DESCRIBE_ELEV', 'Any elevated permission may expose a website to unauthorised access or compromise.' );
  define ( '_SECTION_EXT_HEADING', 'Extension Discovery' );
  define ( '_SECTION_EXT_EXPLAIN', 'Whilst it is common to install additional extensions, they can sometimes be incompatible or cause conflicts effecting the layout and functionality of a website. Excessive use of these extensions may also cause performance issues or if not updated can expose the site to potential security risks.' );
  define ( '_SECTION_EXT_DESCRIBE', 'Components, modules, plugins and templates extend the functionality and add features to the website. FPA attempts to discover all installed extensions, even if they are disabled.' );
  define ( '_SECTION_EXT_HEADING_COM', 'Components' );
  define ( '_SECTION_EXT_DESCRIBE_COM', 'Components provide major application functionality to the website.' );
  define ( '_SECTION_EXT_HEADING_MOD', 'Modules' );
  define ( '_SECTION_EXT_DESCRIBE_MOD', 'Modules most commonly offer data presentation or manipulation functions.' );
  define ( '_SECTION_EXT_HEADING_PLG', 'Plugins' );
  define ( '_SECTION_EXT_DESCRIBE_PLG', 'Plugins deliver automated or optional functions to the site or other extensions.' );
  define ( '_SECTION_EXT_HEADING_LIB', 'Libraries' );
  define ( '_SECTION_EXT_DESCRIBE_LIB', 'Libraries add extra functionality to the site or extension.' );
  define ( '_SECTION_EXT_HEADING_TPL', 'Templates' );
  define ( '_SECTION_EXT_DESCRIBE_TPL', 'Templates are at the core of the site design and layout.' );
  define ( '_SECTION_EXT_DESCRIBE_TPL_OVR', 'Overrides allow for output customisation of extensions and are normally stored in the /html/ folder of the active template.' );
  define ( '_SECTION_LEGEND_HEADING', 'Legends & Status' );
  define ( '_SECTION_LEGEND_DESCRIBE_INFO', 'Information & Help Message/Status' );
  define ( '_SECTION_LEGEND_DESCRIBE_SUCCESS', 'Positive & Successful Message/Status' );
  define ( '_SECTION_LEGEND_DESCRIBE_WARNING', 'Highlighted & Warning Message/Status' );
  define ( '_SECTION_LEGEND_DESCRIBE_ALERT', 'Negative Or Error Message/Status' );
  define ( '_SECTION_LEGEND_DESCRIBE_UNKNOWN', 'Status Is Unknown Or Was Unretrievable' );
  define ( '_SECTION_LEGEND_DESCRIBE_PRIVACY', 'Privacy Settings Are Protecting Sensitive Data' );
  define ( '_SECTION_LEGEND_DESCRIBE_NOTE', 'Denotes An Active Or Currently Selected Item' );
  define ( '_CAPTION_PHP', 'PHP' );
  define ( '_CAPTION_DB', 'Database' );
  define ( '_CAPTION_MYSQL', 'MySQL' );
  define ( '_CAPTION_MYSQLI', 'MySQLi' );
  define ( '_CAPTION_MONGO', 'MongoDB' );
  define ( '_CAPTION_FUNC', 'Functions' );
  define ( '_CAPTION_CMS', 'CMS' );
  define ( '_CAPTION_PLATFORM', 'Platform' );
  define ( '_CAPTION_CONFIG', 'Config' );
  define ( '_CAPTION_MODESET', 'Modeset' );
  define ( '_CAPTION_OWNERSHIP', 'Ownership' );
  define ( '_CAPTION_SEFURL', 'SEF URL\'s' );
  define ( '_CAPTION_CACHE', 'Caching' );
  define ( '_CAPTION_SESSION', 'Session' );
  define ( '_CAPTION_DEBUG', 'Debugging' );
  define ( '_CAPTION_FEAT', 'Features' );
  define ( '_CAPTION_PERF', 'Performance' );
  define ( '_CAPTION_TABLES', 'Tables' );
  define ( '_CAPTION_ENV', 'Environment' );
  define ( '_CAPTION_SERVER', 'Server' );
  define ( '_CAPTION_PHP_MISSING', 'Potential Missing Extensions' );
  define ( '_CAPTION_CHECKS', 'Checks' );
  define ( '_CAPTION_SITE', 'Site' );
  define ( '_CAPTION_ADMIN', 'Administrator' );
  define ( '_CAPTION_VER', 'Version' );
  define ( '_CAPTION_API', 'API' );
  define ( '_CAPTION_SUP', 'Support' );
  define ( '_CAPTION_SUPS', 'Supports' );
  define ( '_CAPTION_CON', 'Connection' );  
  define ( '_CAPTION_TYP', 'Type' );  
  define ( '_CAPTION_DEF', 'Default' ); 
  define ( '_CAPTION_COL', 'Collation' );
  define ( '_CAPTION_BADPHP', 'Known Buggy PHP');
  define ( '_CAPTION_BADZND', 'Known Buggy Zend');



  define ( '_TABLE_PERMS_MODE', 'Mode' );
  define ( '_TABLE_PERMS_FOLDER', 'Folder' );
  define ( '_TABLE_DB_TABLE', 'Table' );
  define ( '_TABLE_DB_RCDS', 'Rcds' );
  define ( '_TABLE_DB_AVGL', 'Avg.<br />Length' );
  define ( '_TABLE_DB_FRAG', 'Frag\'mt' );
  define ( '_TABLE_DB_ENGINE', 'Engine' );
  define ( '_TABLE_DB_UPDATED', 'Updated' );
  define ( '_TABLE_DB_CHECKED', 'Checked' );
  define ( '_TABLE_COMMON_COLLATION', 'Collation' );
  define ( '_TABLE_COMMON_SIZE', 'Size' );
  define ( '_TABLE_COMMON_WRITABLE', 'Writable' );
  define ( '_TABLE_COMMON_OWNER', 'Owner' );
  define ( '_TABLE_COMMON_GROUP', 'Group' );
  define ( '_TABLE_COMMON_ENABLED', 'Enabled' );
  define ( '_TABLE_COMMON_NAME', 'Name' );
  define ( '_TABLE_COMMON_AUTHOR', 'Author' );
  define ( '_TABLE_COMMON_ADDRESS', 'Address' );
  define ( '_TABLE_COMMON_CREATED', 'Created' );
  define ( '_TABLE_COMMON_TYPE', 'Type' );
  define ( '_TABLE_COMMON_OVERRIDES', 'Overrides' );
  define ( '_GDPR_HEADING', 'EU GDPR & e-Privacy Directives' );
  define ( '_GDPR_MESSAGE', '<p>Whilst the FPA script does collect information about your website, it is not sent to, or stored in any other location by FPA.</p>
                             <p>The information that is collected by this script is solely for the purpose of assisting you in problem determination and troubleshooting,
                             it is completely your choice to post this data in any public or private online forum or community area, or to disclose this information to
                             any third-party persons, communities or companies.</p>'
         );
  define ( '_GDPR_MESSAGE_MORE', '<p><b>FPA Privacy Settings:</b> FPA provides the option for you to choose how much identifiable information is made available to any
                             reviewer of the script output, please make yourself familiar with the differences in output before disclosing the output publicly or
                             to any other third-parties.</p>
                             <p><b>Cookies & Local Storage:</b> The FPA script does not use cookies or local storage through your web-browser, however your web-browser
                             may cache the web page out, if you are concerned you may choose to delete your web-browser cache after using this script.</p>
                             <p><b>Analytics & Tracking:</b> The FPA script does not use any visitor analytics or tracking methods. However, some of the information collected
                             by FPA may disclose host or server information that could make your website and location identifiable, revealing any subsequent personal information
                             made available when viewed. If this is of concern, you may select a stricter FPA Privacy setting to minimise such information disclosures.</p>'
         );


  /** NOTE (@FPA): LANGUAGE - Output Definitions & Constants
   * fpa output language strings
   *
   */
  define ( '_FPA_VER', 'Version' );
  define ( '_FPA_VER_SHORT', 'v' ); // RussW : new v2.0.0
  define ( '_FPA_THIS', 'This' ); // RussW : new v2.0.0
  define ( '_FPA_LATEST', 'Latest' ); // RussW : new v2.0.0
  define ( '_FPA_EXPLAIN', 'Explain' ); // RussW : new v2.0.0
  define ( '_FPA_SUCCESS', 'Success' );
  define ( '_FPA_WARNING', 'Warning' );
  define ( '_FPA_ALERT', 'Alert' );
  define ( '_FPA_PROTECTED', 'protected' );
  define ( '_FPA_Y', 'Yes' );
  define ( '_FPA_N', 'No' );
  define ( '_FPA_U', 'Unknown' );
  define ( '_FPA_NA', 'N/A' );
  define ( '_FPA_A', 'Active' ); // RussW : (active/current/selected) new v2.0.0
  define ( '_FPA_INSTANCE', 'Instance' );
  define ( '_FPA_Y_ICON', '<i class="glyphicon glyphicon-ok-sign"></i>' ); // RussW : (yes/good/positive) new v2.0.0
  define ( '_FPA_N_ICON', '<i class="glyphicon glyphicon-remove-sign"></i>' ); // RussW : (no/error/negative) new v2.0.0
  define ( '_FPA_U_ICON', '<i class="glyphicon glyphicon-question-sign"></i>' ); // RussW : (unknown) new v2.0.0
  define ( '_FPA_A_ICON', '<i class="glyphicon glyphicon-star"></i>' ); // RussW : (active/current/selected) new v2.0.0
  define ( '_FPA_EXPLAIN_ICON', '<i class="glyphicon glyphicon-info-sign"></i>' ); // RussW : (explain/info/help) new v2.0.0
  define ( '_FPA_WARNING_ICON', '<i class="glyphicon glyphicon-alert"></i>' ); // RussW : (explain/info/help) new v2.0.0
  define ( '_FPA_ALERT_ICON', '<i class="glyphicon glyphicon-remove-sign"></i>' ); // RussW : (explain/info/help) new v2.0.0
  define ( '_FPA_PROTECTED_ICON', '<i class="glyphicon glyphicon-ban-circle"></i>' ); // RussW : (explain/info/help) new v2.0.0
  define ( '_FPA_NOTE_ICON', '<i class="glyphicon glyphicon-asterisk text-warning"></i>' ); // RussW : (explain/info/help) new v2.0.0
  define ( '_FPA_OPTIONAL_TOOLTIP', 'This section <b>is optional</b> by default in the post output' ); // RussW : (explain/info/help) new v2.0.0
  define ( '_FPA_DELETE', 'Delete' );
  define ( '_FPA_PRIVACY', 'Privacy' );
  define ( '_FPA_PRIVACY_NONE', 'None' );
  define ( '_FPA_PRIVACY_PARTIAL', 'Partial' );
  define ( '_FPA_PRIVACY_STRICT', 'Strict' );
  define ( '_FPA_TOOLBAR_FORUM', 'Forum' );
  define ( '_FPA_TOOLBAR_DOCS', 'Docs' );
  define ( '_FPA_TOOLBAR_DOCS_LINK', 'https://github.com/ForumPostAssistant/FPA/tree/en-GB/Documentation' );
  define ( '_FPA_TOOLBAR_DOWNLOAD', 'Download' );
  define ( '_FPA_TOOLBAR_DOWNLOAD_LINK', 'https://github.com/ForumPostAssistant/FPA/releases' );


  /* NOTE (@FPA): LANGUAGE - FPA Tour Definitions & Constants
   * only load these if the tour is selected for minor memory and time savings
   * IMPORTANT : if tour description is to be split over multiple lines, the use of "line continuation" ("\") is required
   * or jQuery will error and the tour fails
   */
  if ($runFPATour == '1') {
    define ( '_TOUR_STEP00_TITLE', 'User Toolbar' );
    define ( '_TOUR_STEP00_DESC', '<p>The FPA User Toolbar provides instant access to the <b>Sidebar Menu</b> toggle button <button type="button" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-transfer"></i></button> to improve data visibility on smaller screens.</p>\
                                   <p>You are also reminded of the currently selected <span class="text-warning">Information Privacy</span> setting and the <span class="text-danger">Security</span> implications of FPA, plus given the option to <span class="text-danger">Delete FPA</span> <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove-circle"></i></button> after use.</p>\
                                   <p>On larger screens, FPA also offers direct links to useful Joomla! and FPA locations on the right-hand side.</p>'
           );
    define ( '_TOUR_STEP05_TITLE', 'Sidebar Menu' );
    define ( '_TOUR_STEP05_DESC', '<p>The FPA <b>Sidebar Menu</b> provides scrolling access to each of the FPA Report Sections.</p>\
                                   <p>The Sidebar Menu may be reduced in width on larger screens and displayed on small smaller screens with the toggle button <button type="button" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-transfer"></i></button> found on the User Toolbar.</p>\
                                   <p>The final menu link provides the option to <span class="text-danger">Delete FPA</span> <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove-circle"></i></button> after use.</p>'
           );
    define ( '_TOUR_STEP10_TITLE', 'Information Footer' );
    define ( '_TOUR_STEP10_DESC', '<p>The FPA <b>Information Footer</b> provides access to the licensing and project contributors information, plus quick access to the latest download versions of FPA.</p>\
                                   <p>You are also reminded of the <span class="text-danger">Security</span> implications of the FPA and provided with a <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove-circle"></i></button> <span class="text-danger">Delete FPA</span> link.</p>');
    define ( '_TOUR_STEP15_TITLE', 'Explain (Help) Buttons' );
    define ( '_TOUR_STEP15_DESC', '<p>The FPA offers inline <span class="text-info">help</span> where possible, clicking on any <button type="button" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-info-sign"></i> Explain</button> button will display context-sensitive information relating to the adjacent item.</p>');
    define ( '_TOUR_STEP16_TITLE', 'Dashboard Sections' );
    define ( '_TOUR_STEP16_DESC', '<p>The various FPA <b>Dashboard Sections</b> present relevant information about your installation & instance that may assist in understanding and troubleshooting a large numbers of issues & problems.</p>');
    define ( '_TOUR_STEP17_TITLE', 'Legend & Status Descriptions' );
    define ( '_TOUR_STEP17_DESC', '<p>The FPA offers inline <span class="text-info">help</span> where possible, clicking on any <button type="button" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-info-sign"></i> Explain</button> button will display contextual information relating to the adjacent item.</p>');
    define ( '_TOUR_STEP20_TITLE', 'FPA Settings' );
    define ( '_TOUR_STEP20_DESC', '<p>The FPA offers inline <span class="text-info">help</span> where possible, clicking on any <button type="button" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-info-sign"></i> Explain</button> button will display contextual information relating to the adjacent item.</p>');
    define ( '_TOUR_STEP25_TITLE', 'Generate Post Content' );
    define ( '_TOUR_STEP25_DESC', '<p>The FPA offers inline <span class="text-info">help</span> where possible, clicking on any <button type="button" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-info-sign"></i> Explain</button> button will display contextual information relating to the adjacent item.</p>');
    define ( '_TOUR_STEP30_TITLE', 'Forum Post Content' );
    define ( '_TOUR_STEP30_DESC', '<p>The FPA offers inline <span class="text-info">help</span> where possible, clicking on any <button type="button" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-info-sign"></i> Explain</button> button will display contextual information relating to the adjacent item.</p>');
    define ( '_TOUR_END_TITLE', 'Forum Post Assistant' );
    define ( '_TOUR_END_DESC', '<p>Thank you for using the FPA, hopefully it will assist you in solving your issue or successfully receive support from within the Joomla! forums.</p>\
                                <p class="small">The Forum Post Assistant has been developed by, and is copyright of; Russell Winter, Phil DeGruy, Claire Mandville, Bernard Toplak, Sveinung Larsen</p>'
           );
  } // endif $runFPATour
?>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- NOTE (@RussW): attempt to reduce the chance of indexing, archiving or caching through robots meta, if left on server -->
        <meta name="robots" content="noindex, nofollow, noodp, nocache, noarchive" />

        <title><?php echo _RES .' : '. _FPA_VER_SHORT .''. _RES_VERSION .'.'. _RES_VERSION_MAINT .' '. _RES_RELEASE_BUILD .' '. _RES_LANG; ?></title>


        <!-- NOTE (@RussW): attempt to pre-fetch DNS for CDNs & APIs -->
        <link rel="dns-prefetch" href="//code.jquery.com">
        <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
        <link rel="dns-prefetch" href="//maxcdn.bootstrapcdn.com">
        <link rel="dns-prefetch" href="//api.github.com">
        <link rel="dns-prefetch" href="//update.joomla.org">
        <!-- only when needed
        <link rel="dns-prefetch" href="//vel.joomla.org">
        -->


        <?php
        /** NOTE (@RussW): attempt to find and display a favicon
         *
         */
        $faviconPath = '';
        if (file_exists('./administrator/templates/bluestork/favicon.ico')) {                                                                         // J!1.5 location
            $faviconPath = './administrator/templates/bluestork/favicon.ico';

        } elseif (file_exists('./administrator/templates/isis/favicon.ico')) {                                                                        // J!2.0 & J!3.0 location
            $faviconPath = './administrator/templates/isis/favicon.ico';

        } elseif (file_exists('./administrator/templates/atum/favicon.ico')) {                                                                        // J!4.0 location
            $faviconPath = './administrator/templates/atum/favicon.ico';

        } // endif file_exists $faviconPath
        ?>
        <?php if ($faviconPath) { ?>

        <link rel="shortcut icon" href="<?php echo $faviconPath; ?>">

        <?php } // endif $faviconPath ?>


        <!-- NOTE (@FPA): include pace from CDN (include JS high in head to ensure as accurate as possible progress bar timing) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js" integrity="sha256-EPrkNjGEmCWyazb3A/Epj+W7Qm2pB9vnfXw+X6LImPM=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/orange/pace-theme-flash.min.css" integrity="sha256-RGBBrgymw4elQrpU8GjEkOCxf5vE5ZvpAGnhNpDONPk=" crossorigin="anonymous">

        <!-- NOTE (@FPA): include "notify" from CDN, for pop-up alerts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.min.css" integrity="sha256-xs2k744k81ISIOyl14txiKpaRncakLx29JiAve4063w=" crossorigin="anonymous">

        <!-- NOTE (@FPA): grab normalise from CDN, set resets -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css" integrity="sha256-oSrCnRYXvHG31SBifqP2PM1uje7SJUyX0nTwO2RJV54=" crossorigin="anonymous">

        <!-- NOTE (@FPA): grab Bootstrap from CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <?php if ($runFPATour == '1') { ?>
            <!-- NOTE (@FPA): grab Bootstrap Tour from CDN, if selected -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.11.0/css/bootstrap-tour.min.css" integrity="sha256-r7R5NjcsiLK3ubv/Ee7yBl5n9zV+xoj1K6kzJ4E9jBU=" crossorigin="anonymous">
        <?php } // endif $runFPATour ?>



        <!-- TODO (@FPA): include CSS and remove external file -->
        <link rel="stylesheet" href="fpa-style.css">
        <!-- NOTE (FPA): CSS - Custom Styling -->
        <style></style>



      <?php include_once '01dev-initial-arrays.php'; ?>
      <?php include_once '02dev-initial-settings.php'; ?>
      <?php include_once '03dev-initial-versioning.php'; ?>
      <?php include_once '04dev-initial-configuration.php'; ?>
      <?php include_once '05dev-system-environment.php'; ?>
      <?php include_once '06dev-php-environment.php'; ?>
      <?php include_once '07dev-suexec-routines.php'; ?>
      <?php include_once '08dev-webserver-environment.php'; ?>
      <?php include_once '09dev-permissions-checks.php'; ?>
      <?php include_once '10dev-database-environment.php'; ?>
      <?php include_once '11dev-joomla-extensions.php'; ?>
      <?php include_once '12dev-supported-versions.php'; ?>
      <?php include_once '00dev-new-test-functions.php'; ?>
      <?php include_once '14dev-form-routines.php'; ?>


    </head>
    <body data-spy="scroll" data-target="#navbar-sidebar">


        <?php
        /* NOTE (RussW): WRAPPER - Page & Content
         * ALL: full-width
         * display = flex, align-items = stretch
         */
        ?>
        <div id="wrapper" class="wrapper">

        <?php
        /* NOTE (@RussW): Sidebar - navigation
         * shortcut links to sections
         *
         */
        ?>
        <nav id="sidebar" class="bg-primary hidden-print">
          <div id="navbar-sidebar" class="sidebar-affix">

            <div class="sidebar-header">
              <h4 class="text-center margin-remove-bottom">

                <?php
                  /* NOTE (@RussW): attempt to find and display a joomla logo
                   *
                   */
                  $logoPath = '';
                  if (file_exists( './administrator/templates/bluestork/images/logo.png' )) {                           // J!1.5
                    $logoPath = './administrator/templates/bluestork/images/logo.png';

                  } elseif (file_exists( './administrator/templates/isis/images/logo.png' )) {                          // J!2.4 & J!3.0
                    $logoPath = './administrator/templates/isis/images/logo.png';

                  } elseif (file_exists( './administrator/templates/atum/images/logo.svg' )) {                          // J!4.0
                    $logoPath = './administrator/templates/atum/images/logo.svg';

                  }  // endif file_exists $logoPath;
                ?>
                <?php if ($logoPath) { ?>
                  <img src="<?php echo $logoPath; ?>" width="175" height="35" alt="<?php echo _RES; ?>" />
                <?php } // endif $logoPath ?>

                <?php echo _RES; ?>

              </h4>

              <strong class="sidebar-fpa-small"><?php echo _RES_SHORT; ?></strong>

              <div class="text-center small"><?php echo _FPA_VER_SHORT .''. _RES_VERSION .'.'. _RES_VERSION_MAINT .' '. _RES_RELEASE_BUILD; ?></div>

            </div><!--/.sidebar-header-->


            <ul class="nav nav-pills nav-stacked components tourStep05" >

              <li class="active">
                <a href="#fpa-home">
                  <i class="glyphicon glyphicon-home"></i>
                  <?php echo _RES_MENU_HOME; ?>
                </a>
              </li>

              <li>
                <a href="#basic-discovery-section">
                  <i class="glyphicon glyphicon-dashboard"></i>
                  <?php echo _RES_MENU_BASIC; ?>
                </a>
              </li>

              <li>
                <a href="#application-discovery-section">
                  <i class="glyphicon glyphicon-cog"></i>
                  <?php echo _RES_MENU_APP; ?>
                </a>
              </li>

              <li>
                <a href="#host-discovery-section">
                  <i class="glyphicon glyphicon-equalizer"></i>
                  <?php echo _RES_MENU_HOST; ?>
                </a>
              </li>

              <li>
                <a href="#perms-discovery-section">
                  <i class="glyphicon glyphicon-list-alt"></i>
                  <?php echo _RES_MENU_PERM; ?>
                </a>
              </li>

              <li>
                <a href="#extension-discovery-section">
                  <i class="glyphicon glyphicon-th"></i>
                  <?php echo _RES_MENU_EXT; ?>
                </a>
              </li>

              <li class="visible-sm visible-md visible-lg">
                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?tour=1">
                  <i class="glyphicon glyphicon-blackboard"></i>
                  <?php echo _RES_MENU_TOUR; ?>
                </a>
              </li>

              <li>
                 <a href="<?php echo _FPA_DELLINK; ?>" class="btn-danger">
                  <i class="glyphicon glyphicon-remove-circle"></i> <?php echo _FPA_DELETE .' '. _RES_SHORT; ?>
                </a>
              </li>

            </ul>

          </div><!--/.sidebar-affix-->
        </nav><!--/#sidebar-->






            <?php
            /* NOTE (RussW): PAGE - Container
             *
             */
            ?>
            <div id="fpa-home" class="page">


<div class="notifications top-right" style="position:fixed;right:10px;top:10px;"></div>


          <?php
            /** NOTE (@RussW): TOOLBAR - Navigation & Notification
             * collapse/in sidebar button, privacy & security notices, delete button, offsite links
             *
             */
          ?>
          <nav class="navbar navbar-default hidden-print tourStep00">

            <div class="container-fluid">

              <div id="header-fixed" class="navbar-header">

                <div class="btn-toolbar navbar-left">

                  <div class="btn-group" role="group">
                    <button type="button" id="sidebarCollapseButton" class="btn btn-primary navbar-btn">
                      <i class="glyphicon glyphicon-transfer"></i>
                    </button>
                  </div>

                  <div class="btn-group" role="group">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary navbar-btn" onclick="printFPA()">
                      <i class="glyphicon glyphicon-print"></i>
                    </button>
                  </div>

                  <div class="btn-group hidden-xs" role="group">
                    <a id="toolbarShowPrivacy" tabindex="2" class="btn btn-primary navbar-btn" role="button" style="min-width:125px;">
                      <?php echo _FPA_PRIVACY .' : Checking...'; ?>
                    </a>
                  </div>

                  <div class="btn-group" role="group">
                    <a tabindex="2" class="btn btn-danger navbar-btn" role="button" data-toggle="popover" title="<span class='text-danger'><i class='glyphicon glyphicon-warning-sign'></i> <?php echo _FPA_DELNOTE_LN1; ?></span>" data-content="<span class='text-danger'><p><?php echo _FPA_DELNOTE_LN2; ?></p><p><?php echo _FPA_DELNOTE_LN3; ?></p></span>">
                      <i class="glyphicon glyphicon-warning-sign"></i>
                    </a>
                  </div>

                  <div class="btn-group" role="group">
                    <a href="<?php echo _FPA_DELLINK; ?>" class="btn btn-danger navbar-btn" role="button">
                      <i class="glyphicon glyphicon-remove-circle"></i> <?php echo _FPA_DELETE .' '. _RES_SHORT; ?>
                    </a>
                  </div>

                </div><!--/.navbar-left-->

              </div><!--/.navbar-header-->


              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">
                  <li><a href="https://www.joomla.org/" target="_blank" class="btn btn-default btn-xs navbar-btn hidden-sm" role="button"><span class="text-primary"><i class="glyphicon glyphicon-home"></i> Joomla!</span></a></li>
                  <li><a href="https://forum.joomla.org/" target="_blank" class="btn btn-default btn-xs navbar-btn hidden-sm" role="button"><span class="text-primary"><i class="glyphicon glyphicon-comment"></i> <?php echo _FPA_TOOLBAR_FORUM; ?></span></a></li>
                  <li><a href="<?php echo _FPA_TOOLBAR_DOCS_LINK; ?>" target="_blank" class="btn btn-default btn-xs navbar-btn" role="button"><span class="text-primary"><i class="glyphicon glyphicon-book"></i> <?php echo _FPA_TOOLBAR_DOCS; ?></span></a></li>
                  <li><a href="<?php echo _FPA_TOOLBAR_DOWNLOAD_LINK; ?>" target="_blank" class="btn btn-default btn-xs navbar-btn hidden-sm" role="button"><span class="text-primary"><i class="glyphicon glyphicon-download-alt"></i> <?php echo _FPA_TOOLBAR_DOWNLOAD .' '. _RES_SHORT; ?></span></a></li>
                </ul><!--/.navbar-right-->

              </div><!--/.navbar-collapse-->

            </div><!--/.container-fluid-->


          </nav><!--/.navbar-default-->






          <?php
            /* NOTE (RussW): START -  FPA Settings & Post Output
             * accordion - settings & output panels
             *
             */
          ?>
          <div id="settings-section" class="hidden-print">

            <div class="container-fluid">


              <?php
                /* HACK (RussW): FPA Version Check
                 *
                 */
              ?>
<div class="row">
  <div class="col-xs-4">

      <?php if (@$_POST['noPOST'] == '1'): ?>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="btn btn-default btn-xs hidden-print"><span class="glyphicon glyphicon-circle-arrow-left"></span> Show Post Options</a>
      <?php else: ?>
        <form method="post">
          <input type="hidden" name="noPOST" value="1" />
          <button type="submit" name="showReportOnly" class="btn btn-default btn-xs hidden-print"><span class="glyphicon glyphicon-list-alt"></span> Show Report Only</button>
        </form>
      <?php endif; ?>

  </div>
  <div class="col-xs-8">

      <?php        
        if ($fpaVersionCheck):
          echo $fpaVersionCheck;
        endif;
      ?>
  </div>
  <div class="col-xs-12">


      <?php //if ($fpaVersionCheckStatus != 'warning'): ?>
        <div class="collapse" id="collapsefpaVersion">
          <div class="text-center alert alert-<?php echo $fpaVersionCheckStatus; ?>" role="alert">
      <?php //else: ?>
      <!--
        <div class="text-center alert alert-<?php echo $fpaVersionCheckStatus; ?> alert-dismissible margin-top-sm" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      -->
      <?php //endif; ?>

        <h4><?php echo _FPA_EXPLAIN_ICON .' '. _FPA_VER_CHECK_HEADING; ?></h4>
        <?php echo $fpaVersionCheckMessage; ?>
        <ul class="list-inline text-center margin-top-sm clearfix">
          <li class="col-xs-6 col-sm-3 col-sm-offset-3"><?php echo _FPA_THIS .' '. _FPA_VER; ?> <span class="label label-<?php echo $fpaVersionCheckStatus; ?> center-block"><strong><?php echo _FPA_VER_SHORT .''. $thisFPAVER; ?></strong></span></li>
          <li class="col-xs-6 col-sm-3"><?php echo _FPA_LATEST .' '. _FPA_VER; ?> <span class="label label-primary center-block"><strong><?php echo _FPA_VER_SHORT .''. $latestFPAVER; ?></strong></span></li>
        </ul>
      </div><!--/.alert-->
      <?php //if ($fpaVersionCheckStatus != 'warning'): ?>
    </div><!--/.collapse-->
      <?php //endif; ?>
  </div>
</div><!--/.row-->





<?php
  /* NOTE (RussW): START (TABS TESTING) -  FPA Settings & Post Output
   * tabs - settings & output panels
   *
   */
?>
<form method="post" name="postDetails" id="postDetails" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="form-horizontal">


<div class="margin-bottom-lg">


  <!-- Nav tabs -->
  <ul id="user-options-panel" class="nav nav-pills nav-justified" role="tablist">

    <li id="default-tab-panel" role="presentation" class="active">
      <a id="default-tab" class="lead" href="#default" aria-controls="default" role="tab" data-toggle="pill">
        <span class="badge text-uppercase">Step 1</span><br />Start Here
      </a>
    </li>

    <li id="settings-tab-panel" role="presentation" class="">
      <a id="settings-tab" class="lead" href="#settings" aria-controls="settings" role="tab" data-toggle="pill">
        <span class="badge text-uppercase">Step 2</span><br />Runtime Options
      </a>
    </li>

    <li id="output-tab-panel" role="presentation" class="disabled">
      <a id="output-tab" class="lead" href="#output" aria-controls="output" role="tab" data-toggle="pill">
        <span class="badge text-uppercase">Step 3</span><br />Post Content
      </a>
    </li>

  </ul><!--/#fpa-user-option-panel-->


  <!-- Tab panes -->
  <div class="tab-content border-bottom" style="min-height:440px;">


    <div class="text-right margin-top-sm">
      <button class="btn btn-info btn-xs /*pull-right*/ clearfix" type="button" data-toggle="collapse" data-target="#collapseExplainSettings" aria-expanded="false" aria-controls="collapseExplainSettings">
        <i class="glyphicon glyphicon-info-sign"></i><span class="hidden-xs">&nbsp;<?php echo _FPA_EXPLAIN; ?></span>
      </button>
    </div>

    <div class="collapse /*container-fluid*/ margin-top-sm clearfix" id="collapseExplainSettings">
      <div class="alert alert-info" role="alert">
        <h4><i class="glyphicon glyphicon-info-sign"></i> <?php echo _SETTINGS_HEADING ;?></h4>

        <?php echo _SETTINGS_EXPLAIN ;?>

      </div>
    </div>


    <div role="tabpanel" class="tab-pane fade in active" id="default">

      <div class="row">
        <div class="col-sm-6 user-options-step1-description">


                                <fieldset id="optionalInformation" class="padding-remove-top" <?php echo @$disabled; ?>>
                                  <legend class="1margin-remove margin-bottom-sm">Optional Information:</legend>

                                    <?php
                                      /* NOTE (RussW): START -  Optional Information
                                       *
                                       */
                                    ?>
                                    <p class="help-block small line-height-normal margin-remove-top" style="1min-height:35px;">
                                      <i class="glyphicon glyphicon-info-sign"></i>&nbsp;
                                    <?php if ( !empty(@$disabled) ): ?>
                                      Options Are Disabled. Check the <span class="label label-warning">Snapshot Dashboard</span> for more information.
                                    <?php else: ?>
                                      To assist with troubleshooting, you may also add additional (optional) trouble-shooting information to your forum post if desired. <em>Leave empty to ignore</em>.
                                    <?php endif; ?>
                                    </p>

                                    <ul class="list-group margin-bottom-sm">

                                      <li class="list-group-item">
                                        <div class="form-group margin-remove">
                                          <label for="probDSC" class="col-sm-12 col-lg-5 control-label padding-remove line-height-normal">Problem Description</label>
                                          <div class="col-sm-12 col-lg-7 padding-remove-left padding-remove-right">
                                            <input type="text" class="form-control input-sm" id="probDSC" name="probDSC" placeholder="Problem Description">
                                          </div>
                                        </div>
                                      </li>

                                      <li class="list-group-item">
                                        <div class="form-group margin-remove">
                                          <label for="probMSG1" class="col-sm-12 col-lg-5 control-label padding-remove line-height-normal">Log/Error Message</label>
                                          <div class="col-sm-12 col-lg-7 padding-remove-left padding-remove-right">
                                            <input type="text" class="form-control input-sm" id="probMSG1" name="probMSG1" placeholder="Log/Error Message" />
                                          </div>
                                        </div>
                                      </li>

                                      <li class="list-group-item">
                                        <div class="form-group has-error margin-remove">
                                          <label for="probMSG2" class="col-sm-12 col-lg-5 control-label padding-remove line-height-normal">Last Reported Error</label>
                                          <div class="col-sm-12 col-lg-7 padding-remove-left padding-remove-right">
                                          <?php if ( isset($phpenv['phpLASTERR']) ): ?>
                                            <input type="text" class="form-control input-sm text-danger" id="probMSG2" name="probMSG2" value="<?php echo $phpenv['phpLASTERR']; ?>" placeholder="Last Reported Error" aria-describedby="lastErrorHelp" />
                                            <span id="lastErrorHelp" class="help-block line-height-normal small"><i class="glyphicon glyphicon-info-sign"></i> auto-completed from your php error log</span>
                                          <?php else: ?>
                                            <input type="text" class="form-control input-sm" id="probMSG2" name="probMSG2" placeholder="Last Reported Error" />
                                          <?php endif; ?>
                                          </div>
                                        </div>
                                      </li>

                                      <li class="list-group-item">
                                        <div class="form-group margin-remove">
                                          <label for="probACT" class="col-sm-12 col-lg-5 control-label padding-remove line-height-normal">Actions Taken To Resolve?</label>
                                          <div class="col-sm-12 col-lg-7 padding-remove-left padding-remove-right">
                                            <textarea class="form-control input-sm" id="probACT" name="probACT" rows="2" placeholder="Action Taken To Resolve?"></textarea>
                                          </div>
                                        </div>
                                      </li>

                                    </ul>


  <div class="text-right">
                                          <input id="fpaReset" type="reset" class="btn btn-default btn-block btn-sm" name="reset" />
  </div>

                                </fieldset>


        </div><!--/.user-options-step1-description-->



        <div class="col-sm-6 user-options-step1-instructions">

                                <fieldset id="optionalInformation" class="padding-remove-top" <?php echo @$disabled; ?>>
                                  <legend class="1margin-remove margin-bottom-sm">Instructions:</legend>

                                      <p class="bg-muted padding-lg">
                                        There will be some instructions here. Short and to the point with an "Explain" for more help. There will be some instructions here.  Short and to the point with an "Explain" for more help.
                                      </p>

<!--
                                      <p class="">
                                        After selecting your preferred runtime options and information privacy level, click the <strong>Generate Post Content!</strong> button to re-run FPA and build your post content.
                                      </p>
-->

                                      <div class="row user-options-inner">

                                        <div class="col-sm-12 text-center">


                                          <p class="help-block small line-height-normal margin-top-lg" style="1min-height:35px;">
                                            <i class="glyphicon glyphicon-info-sign"></i>&nbsp;
                                            To assist with troubleshooting, you may also choose what information is included in the forum post content, or you may continue with the default selections.
                                          </p>

                                          <?php
                                            /* NOTE (@RussW): Fixed/Pre-Configured Reports
                                             * provide pre-determined runtime option report selection
                                             *
                                             */
                                          ?>
                                          <div class="row fixed-reports">
                                            <div class="col-xs-12 col-lg-6 margin-bottom-sm">

                                              <div class="dropdown" style="width:100%;">
                                                <button class="btn btn-primary btn-block dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                  Pre~Configured Reports
                                                  <span class="glyphicon glyphicon-chevron-down" style="top:3px;left:3px;"></span>
                                                </button>

                                                <ul class="dropdown-menu" style="min-width: 276px;">
                                                  <!--
                                                  <li><a id="selectBasicReport" class="line-height-normal" href="#" style="white-space:normal;">White Screen Or Fatal/500 Error<span class="small text-muted">My site only shows a white-screen or has an "Error 500" or PHP "Fatal Error" message.</span></a></li>
                                                  <li role="separator" class="divider" style="margin:3px 0;"></li>
                                                  -->
                                                  <li><a id="selectDBReport" class="line-height-normal" href="javascript:void(0);" style="white-space:normal;"><i class="glyphicon glyphicon-cog text-info"></i>&nbsp; Database Audit<span class="small text-muted">Sites that may be slow to load, timeout on load or show unexpected characters in some places.</span></a></li>
                                                  <li role="separator" class="divider" style="margin:3px 0;"></li>
                                                  <li><a id="selectFSReport" class="line-height-normal" href="javascript:void(0);" style="white-space:normal;"><i class="glyphicon glyphicon-list-alt text-info"></i>&nbsp; File System Audit<span class="small text-muted">Sites that may be observing permissions issues, such as being unable to upload or install items.</span></a></li>
                                                  <li role="separator" class="divider" style="margin:3px 0;"></li>
                                                  <li><a id="selectEXReport" class="line-height-normal" href="javascript:void(0);" style="white-space:normal;"><i class="glyphicon glyphicon-th text-info"></i>&nbsp; Extension Audit<span class="small text-muted">Sites that may be observing 3rd-Party extension functionality issues, such as white screens, 404 or 500 Errors or crashes when accessing extensions.</span></a></li>
                                                  <li role="separator" class="divider" style="margin:3px 0;"></li>
                                                  <li><a id="selectVEReport" class="line-height-normal" href="javascript:void(0);" style="white-space:normal;"><i class="glyphicon glyphicon-screenshot text-danger"></i>&nbsp; Vulnerable Extension Audit<span class="small text-muted">Check installed 3rd-Party extensions against the Vulnerable Extension List.</span></a></li>
                                                  <!--
                                                  <li><a class="line-height-normal" href="#" style="white-space:normal;">Can't Login, Upload Or Install Extensions<span class="small text-muted">Users or Admins can't login or I can't upload anything or install extensions.</span></a></li>
                                                  <li role="separator" class="divider" style="margin:3px 0;"></li>
                                                  <li><a class="line-height-normal" href="#" style="white-space:normal;">I've Been Hacked!<span class="small text-muted">My site has been hacked, defaced, sending spam, redirecting visitors or doing unexpected things.</span></a></li>
                                                  -->
                                                </ul>

                                             </div><!-- /.dropdown -->

                                            </div>
                                            <div class="col-xs-12 col-lg-6 margin-bottom-sm">

                                              <a class="btn btn-primary btn-block" onclick="$('#settings-tab').tab('show');">Select Runtime Options <span class="glyphicon glyphicon-chevron-right"></span></a>

                                            </div>

                                          </div><!-- /.row -->

<!-- NOTE (@RussW): previous goto Runtime Options button
                                          <a class="btn btn-primary btn-sm btn-block" onclick="$('#settings-tab').tab('show');">Select Runtime Options <span class="glyphicon glyphicon-chevron-right"></span></a>
-->

                                          <p class="padding-remove margin-sm">OR</p>

                                          <input type="hidden" name="doIT" value="1">
                                          <input type="submit" class="btn btn-success btn-block btn-lg" name="submit" value="Generate Post Content!" />

                                          <div class="clearfix"></div>

                                          <div class="checkbox">
                                            <label>
                                              <input type="checkbox" name="increasePOPS" value="1" aria-describedby="increasePOPSHelp">
                                              PHP "Out of Memory" or "Execution Time-Outs" errors?
                                              <span id="increasePOPSHelp" class="help-block small line-height-normal margin-remove-top"><i class="glyphicon glyphicon-info-sign"></i> temporarily increase PHP memory and execution time</span>
                                            </label>
                                          </div><!--/.checkbox-->

                                        </div>

                                      </div><!--./row.user-options-inner-->

                                </fieldset>

        </div><!--/.user-options-step1-instructions-->


      </div><!--/.row-->


    </div><!--/#default .tab-pane-->




    <div role="tabpanel" class="tab-pane fade" id="settings">


      <div class="row">
        <div class="col-sm-6 user-options-step2-runtime">


                                <fieldset id="runtimeOptions" class="padding-remove-top" <?php echo $disabled; ?>>

                                  <legend class="1margin-remove margin-bottom-sm">Runtime Options:</legend>

                                  <div class="row">
                                    <div class="col-sm-12 col-md-12">


                                      <?php
                                        /* NOTE (RussW): START -  Optional Settings
                                         * custon checkbox material buttons
                                         * added libraries (RussW : 06/05/2018)
                                         *
                                         */
                                      ?>
                                      <p class="help-block small line-height-normal margin-remove-top" style="1min-height:35px;">
                                        <i class="glyphicon glyphicon-info-sign"></i>&nbsp;
                                      <?php if ( !empty($disabled) ): ?>
                                        Options Are Disabled. Check the <span class="label label-warning">Snapshot Dashboard</span> for more information.
                                      <?php else: ?>
                                        Determine what information is included in your forum post, modify the default selections to suit your problem and privacy requirements.
                                      <?php endif; ?>
                                      </p>


                                      <ul class="list-group runtime-options">

                                        <li class="list-group-item">
                                          <div class="row-fluid clearfix">
                                            <div class="col-xs-9 col-sm-9 text-truncate padding-remove text-left">
                                              Show Elevated Permissions
                                            </div>
                                            <div class="col-xs-3 col-sm-3 material-switch padding-remove text-right">
                                              <input id="someSwitchOptionSuccess1" name="showElevated" type="checkbox" checked />
                                              <label for="someSwitchOptionSuccess1" class="label-success text-left"></label>
                                            </div>
                                          </div>
                                        </li>

                                        <li class="list-group-item">
                                          <div class="row-fluid clearfix">
                                            <div class="col-xs-9 col-sm-9 text-truncate padding-remove text-left">
                                              Show dataBase Statistics
                                            </div>
                                            <div class="col-xs-3 col-sm-3 material-switch padding-remove text-right">
                                              <input id="someSwitchOptionSuccess2" name="showTables" type="checkbox" checked />
                                              <label for="someSwitchOptionSuccess2" class="label-success text-left"></label>
                                            </div>
                                          </div>
                                        </li>

                                        <li class="list-group-item">
                                          <div class="row-fluid clearfix">
                                            <div class="col-xs-9 col-sm-9 text-truncate padding-remove text-left">
                                              Show Components
                                            </div>
                                            <div class="col-xs-3 col-sm-3 material-switch padding-remove text-right">
                                              <input id="someSwitchOptionSuccess3" name="showComponents" type="checkbox" checked />
                                              <label for="someSwitchOptionSuccess3" class="label-success text-left"></label>
                                            </div>
                                          </div>
                                        </li>

                                        <li class="list-group-item">
                                          <div class="row-fluid clearfix">
                                            <div class="col-xs-9 col-sm-9 text-truncate padding-remove text-left">
                                              Show Modules
                                            </div>
                                            <div class="col-xs-3 col-sm-3 material-switch padding-remove text-right">
                                              <input id="someSwitchOptionSuccess4" name="showModules" type="checkbox" checked />
                                              <label for="someSwitchOptionSuccess4" class="label-success text-left"></label>
                                            </div>
                                          </div>
                                        </li>

                                        <li class="list-group-item">
                                          <div class="row-fluid clearfix">
                                            <div class="col-xs-9 col-sm-9 text-truncate padding-remove text-left">
                                              Show Plugins
                                            </div>
                                            <div class="col-xs-3 col-sm-3 material-switch padding-remove text-right">
                                              <input id="someSwitchOptionSuccess5" name="showPlugins" type="checkbox" checked />
                                              <label for="someSwitchOptionSuccess5" class="label-success text-left"></label>
                                            </div>
                                          </div>
                                        </li>

                                        <li class="list-group-item">
                                          <div class="row-fluid clearfix">
                                            <div class="col-xs-9 col-sm-9 text-truncate padding-remove text-left">
                                              Show Libraries
                                            </div>
                                            <div class="col-xs-3 col-sm-3 material-switch padding-remove text-right text-mute">
                                              <input id="someSwitchOptionSuccess6" name="showLibraries" type="checkbox" checked />
                                              <label for="someSwitchOptionSuccess6" class="label-success text-left"></label>
                                            </div>
                                          </div>
                                        </li>

                                        <li class="list-group-item">
                                          <div class="row-fluid clearfix">
                                            <div class="col-xs-9 col-sm-9 text-truncate padding-remove text-left">
                                              <em> - Include Core Extensions?</em>
                                            </div>
                                            <div class="col-xs-3 col-sm-3 material-switch padding-remove text-right">
                                              <input id="someSwitchOptionSuccess7" name="showCoreEx" type="checkbox" checked />
                                              <label for="someSwitchOptionSuccess7" class="label-success text-left"></label>
                                            </div>
                                          </div>
                                        </li>

                                      </ul>

                                    </div>

                                  </div><!--/.row-->

                                </fieldset>


        </div><!--/.user-options-step2-runtime-->
        <div class="col-sm-6 user-options-step2-instructions">



                                <fieldset id="optionalInformation" class="padding-remove-top" <?php echo @$disabled; ?>>
                                  <legend class="1margin-remove margin-bottom-sm">Instructions:</legend>

                                      <p class="bg-muted padding-lg">
                                        There will be some instructions here. Short and to the point with an "Explain" for more help. There will be some instructions here.  Short and to the point with an "Explain" for more help.
                                      </p>

<!--
                                      <p class="">
                                        After selecting your preferred runtime options and information privacy level, click the <strong>Generate Post Content!</strong> button to re-run FPA and build your post content.
                                      </p>
-->

                                      <div class="row user-options-inner">

                                        <div class="col-sm-12 text-center">


                              <?php
                                /* NOTE (RussW): START -  Information Privacy/Protection
                                 * custon radio buttons
                                 */
                              ?>
                              <div class="text-center margin-top-lg">

                                <h5>Information Privacy Settings</h5>

							<?php
								if ( $showProtected >= 3 OR  @$_POST['showProtected'] >= 3 ) {
									$selectshowProtected_1 = '';
									$selectshowProtected_2 = '';
									$selectshowProtected_3 = 'CHECKED';
								} elseif ( $showProtected == 2 OR @$_POST['showProtected'] == 2 ) {
									$selectshowProtected_1 = '';
									$selectshowProtected_2 = 'CHECKED';
									$selectshowProtected_3 = '';
								} elseif ( $showProtected == 1 OR @$_POST['showProtected'] == 1 ) {
									$selectshowProtected_1 = 'CHECKED';
									$selectshowProtected_2 = '';
									$selectshowProtected_3 = '';
								} elseif ( $showProtected == 2 ) {
									$selectshowProtected_1 = '';
									$selectshowProtected_2 = 'CHECKED';
									$selectshowProtected_3 = '';
								} else {
									$selectshowProtected_1 = '';
									$selectshowProtected_2 = 'CHECKED';
									$selectshowProtected_3 = '';
								}
							?>

                                <div class="btn-group btn-group-radio information-privacy-options">

                                  <input type="radio" name="showProtected" id="showProtectedNone" class="radio-button" value="1" <?php echo $selectshowProtected_1; ?> />
                                  <label id="labelProtectedNone" class="btn btn-default col-xs-12 col-sm-4" for="showProtectedNone">None</label>
                                  <!--
                                  <label class="btn btn-danger col-xs-12 col-sm-4" for="showProtectedNone">None</label>
                                  -->

                                  <input type="radio" name="showProtected" id="showProtectedDefault" class="radio-button" value="2" <?php echo $selectshowProtected_2; ?> />
                                  <label id="labelProtectedDefault" class="btn btn-default col-xs-12 col-sm-4" for="showProtectedDefault">Partial</label>
                                  <!--
                                  <label class="btn btn-warning col-xs-12 col-sm-4" for="showProtectedDefault">Partial</label>
                                  -->

                                  <input type="radio" name="showProtected" id="showProtectedStrict" class="radio-button" value="3" <?php echo $selectshowProtected_3; ?> />
                                  <label id="labelProtectedStrict" class="btn btn-default col-xs-12 col-sm-4" for="showProtectedStrict">Strict</label>
                                  <!--
                                  <label class="btn btn-success col-xs-12 col-sm-4" for="showProtectedStrict">Strict</label>
                                  -->

                                </div><!--/.information-privacy-options-->

                                <p class="help-block small line-height-normal margin-remove-bottom">
                                  <i class="glyphicon glyphicon-info-sign"></i>&nbsp;
                                <?php if ( !empty($disabled) ): ?>
                                  Options Are Disabled. Check the <span class="label label-warning">Snapshot Dashboard</span> for more information.
                                <?php else: ?>
                                  Select how much site identifiable information FPA will collect and display (Partial = Default)
                                <?php endif; ?>
                                </p>

                              </div>


                                          <p class="padding-remove margin-lg">AND</p>

                                          <input type="hidden" name="doIT" value="1">
                                          <input type="submit" class="btn btn-success btn-block btn-lg" name="submit" value="Generate Post Content!" />
                                          <div class="clearfix"></div>

                                          <div class="checkbox">
                                            <label>
                                              <input type="checkbox" name="increasePOPS" value="1" aria-describedby="increasePOPSHelp">
                                              PHP "Out of Memory" or "Execution Time-Outs" errors?
                                              <span id="increasePOPSHelp" class="help-block small line-height-normal margin-remove-top"><i class="glyphicon glyphicon-info-sign"></i> temporarily increase PHP memory and execution time</span>
                                            </label>
                                          </div><!--/.checkbox-->

                                        </div>

                                      </div><!--./row.user-options-inner-->

                                </fieldset>




        </div><!--/.user-options-step2-instructions-->
      </div>


    </div><!--/#settings .tab-pane-->




    <div role="tabpanel" class="tab-pane fade" id="output">

<!--
                                <fieldset id="optionalInformation" class="padding-remove-top" <?php echo @$disabled; ?>>
                                  <legend class="1margin-remove margin-bottom-sm">Instructions:</legend>

                                      <p class="bg-muted padding-lg">
                                        There will be some instructions here. Short and to the point with an "Explain" for more help. There will be some instructions here.  Short and to the point with an "Explain" for more help.
                                      </p>
-->

<?php
  /* HACK (@RussW): testing new tabbed large post output option
   *
   */
?>
<?php include_once ( '13test-postoutput-management.php' ); ?>


<!-- NOTE (@RussW): old 20k post textbox-->
<!--
                         <textarea class="form-control" rows="15" name="postOUTPUT" id="postOUTPUT" placeholder="Forum Post Content">
                        dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only<br />dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only

                        dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only<br />dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only

                        dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only<br />dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only
                        </textarea>

                        <button id="btnCopyToClipboard" class="btn btn-success btn-lg btn-block"><i class="glyphicon glyphicon-copy"></i> Copy Post Content To Clipboard</button>


                        <p class="small text-muted margin-top-sm margin-remove-bottom">
                          <i class="glyphicon glyphicon-info-sign"></i>&nbsp;
                          In the event that the "Copy Post Content To Clipboard" button does not work, <strong>click inside the yellow textarea</strong>, then <strong>press CTRL-a (or Command-a)</strong> to select all the textarea content, <strong>press CTRL-c (Command-c)</strong> to copy the content and then use <strong>CRTL-v (Command-v)</strong> to paste the copied content in to your forum post.
                        </p>
-->

                        <!-- TODO (RussW): determine how to split the content in to two textarea's if exceeds 20k characters-->
<!--
                        <br />
                        <div class="alert alert-danger">
                        Post Length: <span id="counter" class="badge"></span>
                        <br /><i>TODO: now we know the content length, we need to figure out a way of dynamically splitting large posts(over 20k) in to two textarea's</i>
                        </div>

                                </fieldset>
-->

    </div><!--/#output .tab-pane-->

  </div><!--/.tab-content-->

</div>
</form>






            <?php
            /* NOTE (RussW): START - Content Container
             * FPA web & print content
             */
            ?>
            <div id="content">


                <?php
                /* NOTE (RussW): SECTION - Basic Discovery
                 * generic top-level environment information
                 *
                 */
                ?>
            <section id="basic-discovery-section" class="container-fluid">


              <div class="page-header">

                <h2>
                  <button class="btn btn-info btn-xs pull-right clearfix hidden-print tourExplainBasic" type="button" data-toggle="collapse" data-target="#collapseExplainBasic" aria-expanded="false" aria-controls="collapseExplainBasic">
                    <i class="glyphicon glyphicon-info-sign"></i><span class="hidden-xs">&nbsp;<?php echo _FPA_EXPLAIN; ?></span>
                  </button>
                  <i class="glyphicon glyphicon-dashboard"></i> <?php echo _SECTION_BASIC_HEADING; ?>
                </h2>

                <p class="lead"><?php echo _SECTION_BASIC_DESCRIBE; ?></p>

                <div class="collapse clearfix" id="collapseExplainBasic">
                  <div class="alert alert-info" role="alert">
                    <h4><i class="glyphicon glyphicon-info-sign"></i> <?php echo _SECTION_BASIC_HEADING; ?></h4>
                    <p><?php echo _SECTION_BASIC_EXPLAIN; ?></p>
                  </div>
                </div><!--/#collapseExplainBasic-->

              </div><!--/.page-header-->


              <?php
                /* NOTE (RussW): SUB-SECTION - Environment Snapshot
                 * basic environment information
                 *
                 */
              ?>
              <div id="basic-discovery-container" class="row">

                <div class="col-xs-12 col-md-3 col-lg-3 subsection-heading">
                  <h3 class="margin-remove text-muted"><?php echo _SECTION_BASIC_HEADING_SNAPSHOT; ?></h3>

                  <p class="text-muted"><?php echo _SECTION_BASIC_DESCRIBE_SNAPSHOT; ?></p>


                  <?php
                    /* TODO (RussW): HEALTH PROGRESS-BAR - decide if a progress bar is useful here
                     *
                     */
                  ?>
                  <?php
                     $snapshotIndicator                  = '95';  // testing health value
                     // $snapshot[element]Width Totals must equal 100
                     // modify these values to vary the width of each health progress category, a value of "0" (zero) is acceptable to ignore/hide a category
                     $snapshotDangerLimitWidth           = '20';
                     $snapshotWarningLimitWidth          = '25';
                     $snapshotDefaultLimitWidth          = '30';
                     $snapshotSuccessLimitWidth          = '25';
                     // the following values calculate health variable boundaries for each category, based on the $snapshot[element]Width values above
                     $snapshotDangerBoundary             = $snapshotDangerLimitWidth;                                                            // less than
                     $snapshotWarningBoundary            = $snapshotDangerLimitWidth + $snapshotWarningLimitWidth;                               // less than
                     $snapshotDefaultBoundary            = $snapshotDangerLimitWidth + $snapshotWarningLimitWidth + $snapshotDefaultLimitWidth;  // equal/less than
                     $snapshotSuccessBoundary            = $snapshotDefaultBoundary;                                                             // greater than

                     if ($snapshotIndicator > '100'):
                       $snapshotDangerDisplayIndicator   = 'show';
                       $snapshotDangerLimitWidth         = '100';
                       $snapshotDangerDisplay            = 'progress-bar-striped active show';
                       $snapshotDangerWidth              = $snapshotIndicator;
                       $snapshotIndicator                = 'Something Went Wrong<br />Calculated Over 100';

                     elseif ($snapshotIndicator <= $snapshotDangerBoundary):
                       $snapshotDangerDisplayIndicator   = 'show';
                       $snapshotDangerDisplay            = 'progress-bar-striped active show';
                       $snapshotDangerWidth              = $snapshotIndicator;
                       $snapshotWarningDisplay           = 'hidden';
                       $snapshotDefaultDisplay           = 'hidden';
                       $snapshotSuccessDisplay           = 'hidden';

                     elseif ($snapshotIndicator <= $snapshotWarningBoundary):
                       $snapshotDangerDisplayIndicator   = 'hidden';
                       $snapshotDangerDisplay            = 'show';
                       $snapshotDangerWidth              = $snapshotDangerLimitWidth;
                       $snapshotWarningDisplayIndicator  = 'show';
                       $snapshotWarningDisplay           = 'progress-bar-striped active show';
                       $snapshotWarningWidth             = ($snapshotIndicator - $snapshotDangerLimitWidth);
                       $snapshotDefaultDisplay           = 'hidden';
                       $snapshotSuccessDisplay           = 'hidden';

                     elseif ($snapshotIndicator <= $snapshotDefaultBoundary):
                       $snapshotDangerDisplayIndicator   = 'hidden';
                       $snapshotDangerDisplay            = 'show';
                       $snapshotDangerWidth              = $snapshotDangerLimitWidth;
                       $snapshotWarningDisplayIndicator  = 'hidden';
                       $snapshotWarningDisplay           = 'show';
                       $snapshotWarningWidth             = $snapshotWarningLimitWidth;
                       $snapshotDefaultDisplayIndicator  = 'show';
                       $snapshotDefaultDisplay           = 'show';
                       $snapshotDefaultWidth             = ($snapshotIndicator - ($snapshotDangerLimitWidth + $snapshotWarningLimitWidth));
                       $snapshotSuccessDisplay           = 'hidden';

                     elseif ($snapshotIndicator > $snapshotSuccessBoundary):
                       $snapshotDangerDisplayIndicator   = 'hidden';
                       $snapshotDangerDisplay            = 'show';
                       $snapshotDangerWidth              = $snapshotDangerLimitWidth;
                       $snapshotWarningDisplayIndicator  = 'hidden';
                       $snapshotWarningDisplay           = 'show';
                       $snapshotWarningWidth             = $snapshotWarningLimitWidth;
                       $snapshotDefaultDisplayIndicator  = 'hidden';
                       $snapshotDefaultDisplay           = 'show';
                       $snapshotDefaultWidth             = $snapshotDefaultLimitWidth;
                       $snapshotSuccessDisplayIndicator  = 'show';
                       $snapshotSuccessDisplay           = 'show';
                       $snapshotSuccessWidth             = ($snapshotIndicator - ($snapshotDangerLimitWidth + $snapshotWarningLimitWidth + $snapshotDefaultLimitWidth));
                     endif;
                  ?>
                  <div class="progress margin-top-lg margin-bottom-lg hidden-print" data-toggle="tooltip" title="<?php echo $snapshotIndicator; ?>%">
                    <div class="progress-bar progress-bar-danger <?php echo $snapshotDangerDisplay; ?>" role="progressbar" style="width:<?php echo $snapshotDangerWidth; ?>%;min-width:1em;">
                      <span class="small <?php echo $snapshotDangerDisplayIndicator; ?>"><?php echo _FPA_N_ICON; ?></span>
                    </div>
                    <div class="progress-bar progress-bar-warning <?php echo $snapshotWarningDisplay; ?>" role="progressbar" style="width:<?php echo $snapshotWarningWidth; ?>%;min-width:1em;">
                      <span class="small <?php echo $snapshotWarningDisplayIndicator; ?>"><?php echo _FPA_U_ICON; ?></span>
                    </div>
                    <div class="progress-bar progress-bar-default <?php echo $snapshotDefaultDisplay; ?>" role="progressbar" style="width:<?php echo $snapshotDefaultWidth; ?>%;min-width:1em;">
                      <span class="small <?php echo $snapshotDefaultDisplayIndicator; ?>"><?php echo _FPA_U_ICON; ?></span>
                    </div>
                    <div class="progress-bar progress-bar-success <?php echo $snapshotSuccessDisplay; ?>" role="progressbar" style="width:<?php echo $snapshotSuccessWidth; ?>%;min-width:1em;">
                      <span class="small <?php echo $snapshotSuccessDisplayIndicator; ?>"><?php echo _FPA_Y_ICON; ?></span>
                    </div>
                  </div>


                </div><!--/.subsection-heading-->
                <div class="col-xs-12 col-md-9 col-lg-9 subsection-content">

                  <div class="row content-container">
                    <div class="col-xs-12 col-md-4 content-item">

                      <div class="panel panel-default item" style="min-height:159px;">

                        <table class="table table-condensed table-striped" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase"><?php echo _CAPTION_PHP; ?></caption>
                          <colgroup>
                            <col class="col-xs-7 border-right">
                            <col>
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <tbody>
                            <tr>
                              <td class="small text-truncate"><?php echo _CAPTION_PHP . ' ' . _CAPTION_VER; ?></td>
                              <td class="text-center"><strong><?php echo _FPA_VER_SHORT; ?><?php echo PHP_VERSION; ?></strong></td>         
                            </tr>
                            <tr>
                              <td class="small text-truncate"><?php echo _CAPTION_PHP . ' ' . _CAPTION_API; ?></td>
                              <td class="text-center"><?php echo  $phpenv['phpAPI']; ?></td>             
                            </tr>
                            <tr>
                              <td class="small text-truncate"><?php echo _CAPTION_MYSQL . ' ' . _CAPTION_SUP; ?></td>
                              <td class="text-center text-<?php echo $stylesuppmysql;?>"><?php echo $suppmysql; ?></td>            
                            </tr>
                            <tr>
                              <td class="small text-truncate"><?php echo _CAPTION_MYSQLI . ' ' . _CAPTION_SUP; ?></td>
                              <td class="text-center text-<?php echo $stylesuppmysqli;?>"><?php echo $suppmysqli; ?></td>
                            </tr>
                          </tbody>
                        </table>

                      </div><!--/.panel, item-->

                    </div><!--/.content-item-->
                    <div class="col-xs-12 col-md-4 content-item">

                      <div class="panel panel-default item" style="min-height:159px;">

                        <table class="table table-condensed table-striped" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase"><?php echo _CAPTION_DB; ?></caption>
                          <colgroup>
                            <col class="col-xs-7 border-right">
                            <col>
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <tbody>
                            <tr>
                              <td class="small text-truncate"><?php echo _CAPTION_DB . ' ' . _CAPTION_VER; ?></td>
                              <td class="text-center"><strong><?php echo _FPA_VER_SHORT; ?><?php echo $database['dbHOSTSERV']; ?></strong></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate"><?php echo _CAPTION_CON . ' ' . _CAPTION_TYP; ?></td>
                              <td class="text-center"><?php echo $instance['configDBTYPE']; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate"><?php echo _CAPTION_DEF . ' ' . _CAPTION_COL; ?></td>
                              <td class="text-center"><?php echo $database['dbCOLLATION']; ?></td>                               
                            </tr>
                            <tr>
                              <td class="small text-truncate"><?php echo _CAPTION_MYSQLI . ' ' . _CAPTION_SUP; ?></td>
                              <td class="text-center text-success"><?php echo _FPA_Y_ICON; ?></td>
                            </tr>
                          </tbody>
                        </table>

                      </div><!--/.panel, item-->

                    </div><!--/.content-item-->
                    <div class="col-xs-12 col-md-4 content-item">

                      <div class="panel panel-default item" style="min-height:159px;">

                        <table class="table table-condensed table-striped" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase"><?php echo _CAPTION_FUNC; ?></caption>
                          <colgroup>
                            <col class="col-xs-7 border-right">
                            <col>
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <tbody>
                            <tr>
                              <td class="small text-truncate"><?php echo _CAPTION_PHP . ' ' . _CAPTION_SUPS . ' J! ' . $instance['cmsRELEASE'] . '.' . $instance['cmsDEVLEVEL']; ?></td>                      
                              <td class="text-center text-success"><?php echo $frmphpSUP4J; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate"><?php echo _CAPTION_DB . ' ' . _CAPTION_SUPS . ' J! ' . $instance['cmsRELEASE'] . '.' . $instance['cmsDEVLEVEL']; ?></td>
                              <td class="text-center text-success"><?php echo $frmDbSUP4J; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate"><?php echo _CAPTION_BADPHP; ?></td>
                              <td class="text-center"><?php echo $snapshot['buggyPHP']; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate"><?php echo _CAPTION_BADZND; ?></td>
                              <td class="text-center"><?php echo $snapshot['buggyZEND']; ?></td>
                            </tr>
                          </tbody>
                        </table>

                      </div><!--/.panel, item-->

                    </div><!--/.content-item-->
                  </div><!--/.content-container-->


                </div><!--/.subsection-content-->

              </div><!--/#basic-discovery-container-->
              <div class="line"></div>


            </section><!--/#basic-discovery-->






            <?php
              /* NOTE (RussW): SECTION - Application Discovery
               * basic application discovery & configuration
               *
               */
            ?>
            <section id="application-discovery-section" class="container-fluid">


              <div class="page-header">

                <h2>
                  <button class="btn btn-info btn-xs pull-right clearfix hidden-print" type="button" data-toggle="collapse" data-target="#collapseExplainApplication" aria-expanded="false" aria-controls="collapseExplainApplication">
                    <i class="glyphicon glyphicon-info-sign"></i><span class="hidden-xs">&nbsp;<?php echo _FPA_EXPLAIN; ?></span>
                  </button>
                  <i class="glyphicon glyphicon-cog"></i> <?php echo _SECTION_APPLICATION_HEADING; ?>
                </h2>

                <p class="lead"><?php echo _SECTION_APPLICATION_DESCRIBE; ?></p>

                <div class="collapse clearfix" id="collapseExplainApplication">
                  <div class="alert alert-info" role="alert">
                    <h4><i class="glyphicon glyphicon-info-sign"></i> <?php echo _SECTION_APPLICATION_HEADING; ?></h4>
                    <p><?php echo _SECTION_APPLICATION_EXPLAIN; ?></p>
                  </div>
                </div><!--/#collapseExplainApplication-->

              </div><!--/.page-header-->


              <?php
                /* NOTE (RussW): SUB-SECTION - Instance Discovery
                 * discovered instance information
                 *
                 */
              ?>
              <div id="instance-discovery-container" class="row margin-bottom-lg">

                <div class="col-xs-12 col-md-3 col-lg-3 subsection-heading">

                  <h3 class="margin-remove text-muted"> <?php echo _SECTION_APPLICATION_HEADING_INSTANCE; ?></h3>
                  <p class="text-muted"><?php echo _SECTION_APPLICATION_DESCRIBE_INSTANCE; ?></p>

                </div><!--/.subsection-heading-->
                <div class="col-xs-12 col-md-9 col-lg-9 subsection-content">


                  <div class="row content-container">
                    <div class="col-xs-12 col-md-12 content-item">

                      <div class="row clearfix">

                        <!-- TODO (RussW): instance messages -->
                        <div class="col-xs-12">


                        
                           <!-- TODO (RussW): config not found -->
                          <?php
                          if ($instance['instanceCONFIGURED'] == _FPA_N){
                            echo '<div class="alert alert-warning text-center text-capitalize">';
                            echo '<h4 class="margin-remove-top">' . _FPA_WARNING_ICON . '<br />'. _RES .' '. _RES_MESSAGE_WARNING . '</h4>';
                            echo  _FPA_INSTANCE .' '. _RES_MESSAGE_NOTFOUND .' '. _RES_MESSAGE_NOTESTS;
                            echo '</div>';
                          }
                           ?>
                        <!-- END: config not found -->
                        


                        <!-- HACK (RussW): version check if Joomla! found -->
                        <?php
                          if ($joomlaVersionCheck):
                            echo $joomlaVersionCheck;
                          endif;
                        ?>
                        <!-- END: version check -->

                        </div>
                        <!-- END: messages -->


                        <div class="col-xs-12 col-sm-6">

                          <div class="panel panel-default item" style="min-height:129px;">

                            <table class="table table-condensed table-striped" style="table-layout:fixed;">
                              <caption class="text-center text-uppercase"><?php echo _CAPTION_CMS; ?></caption>
                              <colgroup>
                                <col class="col-xs-7 border-right">
                                <col class="">
                              </colgroup><!--/required to fix column sizing & employ text-truncate-->
                              <tbody>
                                <tr>
                                  <td class="small">Found</td>
                                  <td class="text-center text-<?php echo $styleinstancefound;?>"><?php echo $fieldinstancefound; ?></td>
                                </tr>
                                <tr>
                                  <td class="small">Version</td>
                                  <td class="text-center"><strong><?php echo $instance['cmsRELEASE'].'.'.$instance['cmsDEVLEVEL']; ?></strong></td>
                                </tr>
                                <tr>
                                  <td class="small">Build</td>
                                  <td class="text-center bg-<?php echo $styledevstatus;?> text-<?php echo $styledevstatus;?>"><?php echo $instance['cmsDEVSTATUS']; ?></td>
                                </tr>
                              </tbody>
                            </table>

                          </div><!--/.panel, .item-->

                        </div>
                        <div class="col-xs-12 col-sm-6">

                          <div class="panel panel-default item" style="min-height:129px;">

                            <table class="table table-condensed table-striped" style="table-layout:fixed;">
                              <caption class="text-center text-uppercase"><?php echo _CAPTION_PLATFORM; ?></caption>
                              <colgroup>
                                <col class="col-xs-7 border-right">
                                <col class="">
                              </colgroup><!--/required to fix column sizing & employ text-truncate-->
                              <tbody>
                                <tr>
                                  <td class="small">Found</td>
                                  <td class="text-center text-<?php echo $stylepltffound;?>"><?php echo $fieldpltffound; ?></td>
                                </tr>
                                <tr>
                                  <td class="small">Version</td>
                                  <td class="text-center"><strong><?php echo $frmpltfrelease.'.'.$frmpltfdevlevel; ?></strong></td>
                                </tr>
                                <tr>
                                  <td class="small">Build</td>
                                  <td class="text-center bg-<?php echo $stylepltfdevstatus;?> text-<?php echo $stylepltfdevstatus;?> col-xs-4"><?php echo $frmpltfdevstatus; ?></td>
                                </tr>
                              </tbody>
                            </table>

                          </div><!--/.panel, .item-->

                        </div>
                        <div class="col-xs-12 col-sm-6 col-lg-4">

                          <div class="panel panel-default item" style="min-height:129px;">

                            <table class="table table-condensed table-striped" style="table-layout:fixed;">
                              <caption class="text-center text-uppercase"><?php echo _CAPTION_CONFIG; ?></caption>
                              <colgroup>
                                <col class="col-xs-7 border-right">
                                <col>
                              </colgroup><!--/required to fix column sizing & employ text-truncate-->
                              <tbody>
                                <tr>
                                  <td class="small text-truncate">Exists</td>
                                  <td class="text-center"><?php echo $isconfig; ?></td>
                                </tr>
                                <tr>
                                  <td class="small text-truncate">Valid</td>
                                  <td class="text-center"><?php echo $isconfigvalid; ?></td>
                                </tr>
                                <tr>
                                  <td class="small text-truncate">Matches CMS</td>
                                  <td class="text-center"><?php echo $configmatches; ?></td>
                                </tr>
                              </tbody>
                            </table>

                          </div><!--/.panel, .item-->

                        </div>
                        <div class="col-xs-12 col-sm-6 col-lg-4">

                          <div class="panel panel-default item" style="min-height:129px;">

                            <table class="table table-condensed table-striped" style="table-layout:fixed;">
                              <caption class="text-center text-uppercase"><?php echo _CAPTION_CONFIG .' '. _CAPTION_MODESET; ?></caption>
                              <colgroup>
                                <col class="col-xs-7 border-right">
                                <col>
                              </colgroup><!--/required to fix column sizing & employ text-truncate-->
                              <tbody>
                                <tr>
                                  <td class="small text-truncate">Permissions</td>
                                  <td class="text-center">
                                  
                                    <?php echo substr( sprintf('%o', fileperms( $instance['configPATH'] ) ),-3, 3 ); ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td class="small text-truncate">Transposition</td>
                                  <td class="text-center">
                                    <?php
                                      $testPERMS = fileperms( $instance['configPATH'] );
                                      switch ($testPERMS & 0xF000) {
                                          case 0xC000: // socket
                                              $info = 's ';
                                              break;
                                          case 0xA000: // symbolic link
                                              $info = 'l ';
                                              break;
                                          case 0x8000: // regular
                                              $info = 'r ';
                                              break;
                                          case 0x6000: // block special
                                              $info = 'b ';
                                              break;
                                          case 0x4000: // directory
                                              $info = 'd ';
                                              break;
                                          case 0x2000: // character special
                                              $info = 'c ';
                                              break;
                                          case 0x1000: // FIFO pipe
                                              $info = 'p ';
                                              break;
                                          default: // unknown
                                              $info = 'u ';
                                      }

                                      // Owner
                                      $info .= (($testPERMS & 0x0100) ? 'r' : '-');
                                      $info .= (($testPERMS & 0x0080) ? 'w' : '-');
                                      $info .= (($testPERMS & 0x0040) ?
                                                  (($testPERMS & 0x0800) ? 's' : 'x' ) :
                                                  (($testPERMS & 0x0800) ? 'S' : '-'));
                                      $info .= '&nbsp;';

                                      // Group
                                      $info .= (($testPERMS & 0x0020) ? 'r' : '-');
                                      $info .= (($testPERMS & 0x0010) ? 'w' : '-');
                                      $info .= (($testPERMS & 0x0008) ?
                                                  (($testPERMS & 0x0400) ? 's' : 'x' ) :
                                                  (($testPERMS & 0x0400) ? 'S' : '-'));
                                      $info .= '&nbsp;';

                                      // World
                                      $info .= (($testPERMS & 0x0004) ? 'r' : '-');
                                      $info .= (($testPERMS & 0x0002) ? 'w' : '-');
                                      $info .= (($testPERMS & 0x0001) ?
                                                  (($testPERMS & 0x0200) ? 't' : 'x' ) :
                                                  (($testPERMS & 0x0200) ? 'T' : '-'));

                                      echo $info;
                                    ?>
                                  </td>
                                </tr>

                                <tr>
                                  <td class="small text-truncate">Effective Mode</td>
                                  <td class="text-center">
                                    <?php
                                    if (is_writable($instance['configPATH'])) {
                                        echo 'writable';
                                    } else {
                                        echo 'read only';
                                    }
                                    ?>
                                  </td>
                                </tr>
                              </tbody>
                            </table>

                          </div><!--/.panel, .item-->

                        </div>
                        <div class="col-xs-12 col-sm-6 col-lg-4">

                          <div class="panel panel-default item" style="min-height:129px;">

                            <table class="table table-condensed table-striped" style="table-layout:fixed;">
                              <caption class="text-center text-uppercase"><?php echo _CAPTION_CONFIG .' '. _CAPTION_OWNERSHIP; ?></caption>
                              <colgroup>
                                <col class="col-xs-7 border-right">
                                <col>
                              </colgroup><!--/required to fix column sizing & employ text-truncate-->
                              <tbody>
                                <tr>
                                  <td class="small text-truncate">Owner</td>
                                  <td class="text-center"><?php echo $instance['configOWNER']['name']; ?></td>           
                                </tr>                                
                                  <td class="small text-truncate">Group</td>        
                                  <td class="text-center"><?php echo $instance['configGROUP']['name']; ?></td>
                                </tr>
                                <tr>
                                  <td class="small text-truncate">Some</td>
                                  <td class="text-center">Text</td>
                                </tr>                          
                              </tbody>
                            </table>

                          </div><!--/.panel, .item-->

                        </div>
                        <div class="col-xs-12 col-sm-6 col-lg-4">

                          <div class="panel panel-default item" style="min-height:129px;">

                            <table class="table table-condensed table-striped" style="table-layout:fixed;">
                              <caption class="text-center text-uppercase"><?php echo _CAPTION_SITE .' '. _CAPTION_CONFIG; ?></caption>
                              <colgroup>
                                <col class="col-xs-7 border-right">
                                <col>
                              </colgroup><!--/required to fix column sizing & employ text-truncate-->
                              <tbody>
                                <tr>
                                  <td class="small text-truncate">Online</td>
                                  <td class="text-center"><?php echo $siteonline; ?></td>
                                </tr>
                                <tr>
                                  <td class="small text-truncate">Force SSL</td>
                                  <td class="text-center"><?php echo $instance['configSSL']; ?></td>
                                </tr>
                                <tr>
                                  <td class="small text-truncate">Root Override</td>
                                  <td class="text-center"><?php echo $frmdefinesEXIST; ?></td>
                                </tr>
                              </tbody>
                            </table>

                          </div><!--/.panel, .item-->

                        </div>
                        <div class="col-xs-12 col-sm-6 col-lg-4">

                          <div class="panel panel-default item" style="min-height:129px;">

                            <table class="table table-condensed table-striped" style="table-layout:fixed;">
                              <caption class="text-center text-uppercase"><?php echo _CAPTION_SEFURL; ?></caption>
                              <colgroup>
                                <col class="col-xs-7 border-right">
                                <col>
                              </colgroup><!--/required to fix column sizing & employ text-truncate-->
                              <tbody>
                                <tr>
                                  <td class="small text-truncate">Enabled</td>
                                  <td class="text-center"><?php echo $instance['configSEF']; ?></td>
                                </tr>
                                <tr>
                                  <td class="small text-truncate">Suffix</td>
                                  <td class="text-center"><?php echo $instance['configSEFSUFFIX']; ?></td>
                                </tr>
                                <tr>
                                  <td class="small text-truncate">ReWrite</td>
                                  <td class="text-center"><?php echo $instance['configSEFRWRITE']; ?></td>
                                </tr>
                              </tbody>
                            </table>

                          </div><!--/.panel, .item-->

                        </div>
                        <div class="col-xs-12 col-sm-6 col-lg-4">

                          <div class="panel panel-default item" style="min-height:129px;">

                            <table class="table table-condensed table-striped" style="table-layout:fixed;">
                              <caption class="text-center text-uppercase"><?php echo _CAPTION_CACHE; ?></caption>
                              <colgroup>
                                <col class="col-xs-7 border-right">
                                <col>
                              </colgroup><!--/required to fix column sizing & employ text-truncate-->
                              <tbody>
                                <tr>
                                  <td class="small text-truncate">System Cache</td>        
                                  <td class="text-center"><?php echo   $instance['configCACHING']; ?></td>
                                </tr>
                                <tr>
                                  <td class="small text-truncate">Cache Handler</td>
                                  <td class="text-center"><?php echo  $instance['configCACHEHANDLER']; ?></td>                          
                                </tr>
                                <tr>
                                  <td class="small text-truncate">Platform Specific</td>                       
                                  <td class="text-center"><?php echo $instance['configCACHEPLFPFX']; ?></td>
                                </tr>
                              </tbody>
                            </table>

                          </div><!--/.panel, .item-->

                        </div>
                        <div class="col-xs-12 col-sm-6 col-lg-4">

                          <div class="panel panel-default item" style="min-height:129px;">

                            <table class="table table-condensed table-striped" style="table-layout:fixed;">
                              <caption class="text-center text-uppercase"><?php echo _CAPTION_SESSION; ?></caption>
                              <colgroup>
                                <col class="col-xs-7 border-right">
                                <col>
                              </colgroup><!--/required to fix column sizing & employ text-truncate-->
                              <tbody>
                                <tr>
                                  <td class="small text-truncate">Handler</td>
                                  <td class="text-center"><?php echo $instance['configSESSHAND']; ?></td>
                                </tr>
                                <tr>
                                  <td class="small text-truncate">Lifetime</td>
                                  <td class="text-center"><?php echo $instance['configLIFETIME']; ?></td>
                                </tr>
                                <tr>
                                  <td class="small text-truncate">Shared</td>
                                  <td class="text-center"><?php echo $instance['configSHASESS']; ?></td>
                                </tr>
                              </tbody>
                            </table>

                          </div><!--/.panel, .item-->

                        </div>
                        <div class="col-xs-12 col-sm-6 col-lg-4">

                          <div class="panel panel-default item" style="min-height:129px;">

                            <table class="table table-condensed table-striped" style="table-layout:fixed;">
                              <caption class="text-center text-uppercase"><?php echo _CAPTION_DEBUG; ?></caption>
                              <colgroup>
                                <col class="col-xs-7 border-right">
                                <col>
                              </colgroup><!--/required to fix column sizing & employ text-truncate-->
                              <tbody>
                                <tr>
                                  <td class="small text-truncate">Error Reporting</td>
                                  <td class="text-center"><?php echo $instance['configERRORREP']; ?></td>
                                </tr>
                                <tr class="border-top">
                                  <td class="small text-truncate">Site Debug</td>
                                  <td class="text-center"><?php echo $instance['configSITEDEBUG']; ?></td>
                                </tr>
                                <tr>
                                  <td class="small text-truncate">Lang Debug</td>
                                  <td class="text-center"><?php echo $instance['configLANGDEBUG']; ?></td>
                                </tr>
                              </tbody>
                            </table>

                          </div><!--/.panel, .item-->

                        </div>
                        <div class="col-xs-12 col-sm-6 col-lg-4">

                          <div class="panel panel-default item" style="min-height:129px;">

                            <table class="table table-condensed table-striped" style="table-layout:fixed;">
                              <caption class="text-center text-uppercase"><?php echo _CAPTION_FEAT; ?></caption>
                              <colgroup>
                                <col class="col-xs-7 border-right">
                                <col>
                              </colgroup><!--/required to fix column sizing & employ text-truncate-->
                              <tbody>
                                <tr>
                                  <td class="small text-truncate">GZip Enabled</td>
                                  <td class="text-center"><?php echo $instance['configGZIP']; ?></td>
                                </tr>
                                <tr class="border-top">
                                  <td class="small text-truncate">FTP Enabled</td>
                                  <td class="text-center"><?php echo $instance['configFTP']; ?></td>
                                </tr>
                                <tr>
                                  <td class="small text-truncate">Unicode Aliases</td>
                                  <td class="text-center"><?php echo $instance['configUNICODE']; ?></td>
                                </tr>
                              </tbody>
                            </table>

                          </div><!--/.panel, .item-->

                        </div>
                      </div>



                    </div><!--/.content-item-->
                  </div><!--/.content-container-->


                </div><!--/.subsection-content-->

              </div><!--/#instance-discovery-container-->






              <?php
                /* NOTE (RussW): SUB-SECTION - DataBase Discovery
                 * discovered database information
                 *
                 */
              ?>
              <div id="database-discovery-container" class="row margin-bottom-lg">

                <div class="col-xs-12 col-md-3 col-lg-3 subsection-heading">

                  <h3 class="margin-remove text-muted"> <?php echo _SECTION_APPLICATION_HEADING_DBCONFIG; ?></h3>
                  <p class="text-muted"><?php echo _SECTION_APPLICATION_DESCRIBE_DBCONFIG; ?></p>

                </div><!--/.subsection-heading-->
                <div class="col-xs-12 col-md-9 col-lg-9 subsection-content">


                  <div class="row content-container">

                    <!-- TODO (RussW): config not found -->


                    <?php
                    if ( @!$dBconn ) {
                        echo '<div class="col-xs-12">';
                        echo '<div class="alert alert-warning text-center text-capitalize">';
                        echo '<h4 class="margin-remove-top">' . _FPA_WARNING_ICON .'<br />'. _RES .' '. _RES_MESSAGE_WARNING . '</h4>';
                        echo _RES_MESSAGE_NOTCONN .' '. _RES_MESSAGE_NOTESTS;
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>

                    <!-- END: config not found -->


                                                                                                                                           



                    <div class="col-xs-12 col-lg-6 content-item">

                      <div class="panel panel-default item" style="min-height:347px;">

                        <table class="table table-condensed table-striped" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase"><strong>(+DBType)</strong> <?php echo _CAPTION_DB; ?></caption>
                          <colgroup>
                            <col class="col-xs-5 bg-muted border-right">
                            <col>
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <tbody>
                            <tr>
                              <td class="small text-truncate" rowspan="2">(+DBType) Version</td>
                              <td class="">
                                Server: <?php echo _FPA_VER_SHORT; ?><?php echo $database['dbHOSTSERV']; ?><br />
                              </td>
                            </tr>
                            <tr>
                              <td class="">
                                Client: <?php echo _FPA_VER_SHORT; ?><?php echo  $database['dbHOSTCLIENT']; ?>                                   
                              </td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">Database Hostname</td>
                              <td class=""><?php echo  $instance['configDBHOST']; ?></td>                               
                            </tr>
                            <tr>
                              <td class="small text-truncate">Connection Type</td>
                              <td class=""><?php echo $database['dbHOSTINFO']; ?></td>       
                            </tr>
                            <tr>
                              <td class="small text-truncate">PHP Support</td>
                              <td class=""><?php echo _FPA_A_ICON; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">Connected</td>
                              <td class=""><?php echo $fieldconnected; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">(+DBType) Character Set</td>
                              <td class=""><?php echo $database['dbCHARSET']; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">Default Character Set</td>
                              <td class=""><?php echo $database['dbHOSTDEFCHSET']; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">Database Collation</td>
                              <td class=""><?php echo $database['dbCOLLATION']; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">Database Size</td>
                              <td class=""><?php echo $database['dbSIZE']; ?></td>                               
                            </tr>
                          </tbody>
                        </table>

                      </div><!--/.panel, item-->

                    </div><!--/.content-item-->
                    <div class="col-xs-12 col-lg-6 content-item">

                      <div class="panel panel-default item" style="min-height:347px;">

                        <table class="table table-condensed table-striped" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase"><strong>(+DBType)</strong> <?php echo _CAPTION_PERF; ?></caption>
                          <colgroup>
                            <col class="col-xs-5 bg-muted border-right">
                            <col>
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <tbody>


<?php
			if ( $database['dbDOCHECKS'] == _FPA_Y AND @$database['dbERROR'] == _FPA_N AND $instance['configDBTYPE'] <> 'postgresql' AND $instance['configDBTYPE'] <> 'pgsql' ) {

				$pieces = explode(": ", $database['dbHOSTSTATS'][0] );
                            echo '<tr>';
                              echo '<td class="small text-truncate">' . $pieces[0] . '</td>';
                              echo '<td class="">' . $pieces[1] . ' seconds.</td>';
                            echo '</tr>';

				$pieces = explode(": ", $database['dbHOSTSTATS'][1] );
                            echo '<tr>';
                              echo '<td class="small text-truncate">' . $pieces[0] . '</td>';
                              echo '<td class="">' . $pieces[1] . '</td>';
                            echo '</tr>';

				$pieces = explode(": ", $database['dbHOSTSTATS'][2] );
                            echo '<tr>';
                              echo '<td class="small text-truncate">' . $pieces[0] . '</td>';
                              echo '<td class="">' . $pieces[1] . '</td>';
                            echo '</tr>';

				$pieces = explode(": ", $database['dbHOSTSTATS'][3] );
                            echo '<tr>';
                              echo '<td class="small text-truncate">' . $pieces[0] . '</td>';
                              echo '<td class="">' . $pieces[1] . '</td>';
                            echo '</tr>';

				$pieces = explode(": ", $database['dbHOSTSTATS'][4] );
                            echo '<tr>';
                              echo '<td class="small text-truncate">' . $pieces[0] . '</td>';
                              echo '<td class="">' . $pieces[1] . '</td>';
                            echo '</tr>';

				$pieces = explode(": ", $database['dbHOSTSTATS'][5] );
                            echo '<tr>';
                              echo '<td class="small text-truncate">' . $pieces[0] . '</td>';
                              echo '<td class="">' . $pieces[1] . '</td>';
                            echo '</tr>';

				$pieces = explode(": ", $database['dbHOSTSTATS'][6] );
                            echo '<tr>';
                              echo '<td class="small text-truncate">' . $pieces[0] . '</td>';
                              echo '<td class="">' . $pieces[1] . '</td>';
                            echo '</tr>';

				$pieces = explode(": ", $database['dbHOSTSTATS'][7] );
                            echo '<tr>';
                              echo '<td class="small text-truncate">' . $pieces[0] . '</td>';
                              echo '<td class="">' . $pieces[1] . '</td>';
                            echo '</tr>';

                            echo '<tr class="border-bottom">';
                              echo '<td class="small text-truncate"> No. Of Tables </td>';
                              echo '<td class="">' . $database['dbTABLECOUNT'] . '</td>';
                            echo '</tr>';  

			} else { // an instance wasn't found in the initial checks
				if ($instance['configDBTYPE'] == 'postgresql' or $instance['configDBTYPE'] == 'pgsql'){
                            echo '<tr>';
                              echo '<td class="small text-truncate">' . _FPA_N_ICON . '</td>';
                              echo '<td class="">' . _FPA_NIMPLY . ' ' . _FPA_PGSQL . '</td>';
                            echo '</tr>';
				} else {
                            echo '<tr>';
                              echo '<td class="small text-truncate">' . _FPA_N_ICON . '</td>';
                              echo '<td class="">' . _FPA_NO .' '. _FPA_PERF .' '. _FPA_TESTP . '</td>';
                            echo '</tr>';
			}
			}

?>


                          </tbody>
                        </table>

                      </div><!--/.panel, item-->

                    </div><!--/.content-item-->
                  </div><!--/.content-container-->


                </div><!--/.subsection-content-->

              </div><!--/#performance-discovery-container-->






              <?php
                /* NOTE (RussW): SUB-SECTION  - DataBase Table Structure (optional)
                 * discovered database table structure
                 *
                 */
              ?>
              <div id="dbtable-discovery-container" class="row margin-bottom-lg">

                <div class="col-xs-12 col-md-3 col-lg-3 subsection-heading">

                  <h3 class="margin-remove text-muted"><span class="small text-warning pull-right" data-toggle="tooltip" title="<?php echo _FPA_OPTIONAL_TOOLTIP; ?>"><?php echo _FPA_NOTE_ICON; ?></span> <?php echo _SECTION_APPLICATION_HEADING_DBTABLES; ?></h3>
                  <p class="text-muted"><?php echo _SECTION_APPLICATION_DESCRIBE_DBTABLES; ?></p>

                </div><!--/.subsection-heading-->
                <div class="col-xs-12 col-md-9 col-lg-9 subsection-content">


                  <div class="row content-container">
                    <div class="col-xs-12 content-item">

                      <div class="panel panel-default item">

                        <table class="table table-condensed" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase"><strong>(+DBType)</strong> <?php echo _CAPTION_TABLES; ?></caption>
                          <colgroup>
                            <col class="col-xs-3 bg-muted border-right">
                            <col class=" border-right">
                            <col class=" border-right">
                            <col class="hidden-xs hidden-sm border-right">
                            <col class="hidden-xs hidden-sm border-right">
                            <col class="hidden-xs border-right">
                            <col class=" border-right">
                            <col class="hidden-xs hidden-sm hidden-md border-right">
<!-- HACK (RussW): Proposed removal
                            <col class="hidden-xs hidden-sm hidden-md border-right">
                            <col class="hidden-xs hidden-sm hidden-md">
-->
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <thead>
                            <tr class="">
                              <th class=""><?php echo _TABLE_DB_TABLE; ?></th>
                              <th class="text-center"><?php echo _TABLE_COMMON_SIZE; ?></th>
                              <th class="text-center"><?php echo _TABLE_DB_RCDS; ?></th>
                              <th class="text-center hidden-xs hidden-sm"><?php echo _TABLE_DB_AVGL; ?></th>
                              <th class="text-center hidden-xs hidden-sm"><?php echo _TABLE_DB_FRAG .'<br />'. _TABLE_COMMON_SIZE; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_DB_ENGINE; ?></th>
                              <th class="text-center text-truncate"><?php echo _TABLE_COMMON_COLLATION; ?></th>
                              <th class="text-center text-truncate hidden-xs hidden-sm hidden-md"><?php echo _TABLE_COMMON_CREATED; ?></th>
<!-- HACK (RussW): Proposed removal
                              <th class="text-center text-truncate hidden-xs hidden-sm hidden-md"><?php echo _TABLE_DB_UPDATED; ?></th>
                              <th class="text-center text-truncate hidden-xs hidden-sm hidden-md"><?php echo _TABLE_DB_CHECKED; ?></th>
-->
                            </tr>
                          </thead>

<!-- HACK (RussW): TESTING DB Privacy-->
<?php
  if ( $showProtected >= 3 OR  @$_POST['showProtected'] >= 3 ) {
    $demoProtected = '1';
  } else {
    $demoProtected = '0';
  }
?>
                          <tbody>

                          <?php
                            foreach ( $tables as $i => $show ) {
                              if ( $show != $tables['ARRNAME'] ) {
                                echo '<tr class="">';
                                echo '<td class="small text-truncate">' . $show['TABLE'] . '</td>';
                                echo '<td class="small text-center">' . $show['SIZE'] . '</td>';
                                echo '<td class="small text-center text-truncate">' . $show['RECORDS'] . '</td>';
                                echo '<td class="small text-center text-truncate hidden-xs hidden-sm">' . $show['AVGLEN'] . '</td>';
                                echo '<td class="small text-center text-truncate hidden-xs hidden-sm">' . $show['FRAGSIZE'] . '</td>';
                                echo '<td class="small text-center hidden-xs">' . $show['ENGINE'] . '</td>';
                                echo '<td class="small text-center text-truncate">' . $show['COLLATION'] . '</td>';
                                $pieces = explode( " ", $show['CREATED'] );
                                echo '<td class="small text-center text-truncate hidden-xs hidden-sm hidden-md">' . $pieces['0'] . '</td>';
                                echo '</tr>';
                              }
                            }
                           ?>

                          </tbody>
                        </table>

                      </div><!--/.panel, item-->

                    </div><!--/.content-item-->
                  </div><!--/.content-container-->


                </div><!--/.subsection-content-->

              </div><!--/#dbtable-discovery-container-->
              <div class="line"></div>


            </section><!--/#application-discovery-->






            <?php
              /* NOTE (RussW): SECTION - Host Discovery
               * generic host environment information
               *
               */
            ?>
            <section id="host-discovery-section" class="container-fluid">


              <div class="page-header">

                <h2>
                  <button class="btn btn-info btn-xs pull-right clearfix hidden-print" type="button" data-toggle="collapse" data-target="#collapseExplainHost" aria-expanded="false" aria-controls="collapseExplainHost">
                    <i class="glyphicon glyphicon-info-sign"></i><span class="hidden-xs">&nbsp;<?php echo _FPA_EXPLAIN; ?></span>
                  </button>
                  <i class="glyphicon glyphicon-equalizer"></i> <?php echo _SECTION_HOSTING_HEADING; ?>
                </h2>

                <p class="lead"><?php echo _SECTION_HOSTING_DESCRIBE; ?></p>

                <div class="collapse clearfix" id="collapseExplainHost">
                  <div class="alert alert-info" role="alert">
                    <h4><i class="glyphicon glyphicon-info-sign"></i> <?php echo _SECTION_HOSTING_HEADING; ?></h4>
                    <p><?php echo _SECTION_HOSTING_EXPLAIN; ?></p>
                  </div>
                </div><!--/#collapseExplainHost-->

              </div><!--/.page-header-->






              <?php
                /* NOTE (RussW): SUB-SECTION - Server discovery
                 * php environement information
                 *
                 */
              ?>
              <div id="host-discovery-container" class="row margin-top-lg margin-bottom-lg">

                <div class="col-xs-12 col-md-3 col-lg-3 subsection-heading">

                  <h3 class="margin-remove text-muted"><?php echo _SECTION_HOSTING_HEADING_SERVER; ?></h3>
                  <p class="text-muted"><?php echo _SECTION_HOSTING_DESCRIBE_SERVER; ?></p>

                </div><!--/.subsection-heading-->
                <div class="col-xs-12 col-md-9 col-lg-9 subsection-content">


                  <div class="row content-container">
                    <div class="col-xs-12 col-lg-6 content-item">

                      <div class="panel panel-default item" style="min-height:595px;">

                        <table class="table table-condensed table-striped" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase"><?php echo _CAPTION_SERVER .' '. _CAPTION_ENV; ?></caption>
                          <colgroup>
                            <col class="col-xs-5 bg-muted border-right">
                            <col class="">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <tbody>
                            <tr>
                              <td class="small text-truncate">Platform</td>
                              <td class=""><?php echo $system['sysPLATOS'] ; ?></td>                              
                            </tr>
                            <tr>
                              <td class="small text-truncate">Kernel Version</td>                         
                              <td class=""><?php echo $system['sysPLATREL']; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">Technology</td>
                              <td class=""><?php echo  $system['sysPLATTECH']; ?></td>                             
                            </tr>
                            <tr>
                              <td class="small text-truncate">Hostname</td>
                              <td class=""><?php echo  $instance['configDBHOST']; ?></td>                                      
                            </tr>
                            <tr>
                              <td class="small text-truncate">Total Disk Space</td>
                              <td class=""><?php echo  $total_space; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">Free Disk Space</td>
                              <td class=""><?php echo  $system['sysFREESPACE']; ?></td>                                       
                            </tr>
                            <tr>
                              <td class="small text-truncate">Server Name</td>
                              <td class=""><?php echo  $system['sysSERVNAME']; ?></td>                                     
                            </tr>
                            <tr>
                              <td class="small text-truncate">Server IP</td>    
                              <td class=""><?php echo  $system['sysSERVIP']; ?></td>                                                  
                            </tr>
                            <tr>
                              <td class="small text-truncate">Server Signature</td>
                              <td class=""><?php echo  $system['sysSERVSIG']; ?></td>                                         
                            </tr>
                            <tr>
                              <td class="small text-truncate">Server Encoding</td>
                              <td class=""><?php echo  $system['sysENCODING']; ?></td>                                                 
                            </tr>
                            <tr>
                              <td class="small text-truncate">Executing User</td>         
                              <td class=""><?php echo  $system['sysEXECUSER']; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">Server User</td>               
                              <td class=""><?php echo  $system['sysCURRUSER']; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">Document Root</td>
                              <td class=""><?php echo $system['sysDOCROOT']; ?></td>                          
                            </tr>
                            <tr>
                              <td class="small text-truncate">Server Temp Folder</td>        
                              <td class=""><?php echo $frmsysSYSTMPDIR; ?></td>
                            </tr>
                            <tr class="border-bottom">
                              <td class="small text-truncate">Server Temp Writable</td>
                              <td class=""><?php echo $frmsysTMPDIRWRITABLE; ?></td>
                            </tr>
                          </tbody>
                        </table>

                      </div><!--/.panel, item-->

                    </div><!--/.content-item-->
                    <div class="col-xs-12 col-lg-6 content-item">

                      <div class="panel panel-default item" style="min-height:595px;">

                        <table class="table table-condensed table-striped" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase"><?php echo _CAPTION_PHP .' '. _CAPTION_ENV; ?></caption>
                          <colgroup>
                            <col class="col-xs-5 bg-muted border-right">
                            <col class="">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <tbody>
                            <tr>
                              <td class="small text-truncate">PHP Version</td>
                              <td class=""><?php echo _FPA_VER_SHORT; ?><?php echo  PHP_VERSION; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">PHP API</td>
                              <td class=""><?php echo  $phpenv['phpAPI']; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">Display Errors</td>
                              <td class=""><?php echo $frmerrorrep; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">Error Reporting Level</td>
                              <td class=""><?php echo $phpenv['phpERRORREPORT']; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">MySQLi Support</td>
                              <td class=""><?php echo $suppmysqli; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">Magic Quotes</td>
                              <td class=""><?php echo $frmmagic; ?></td>                      
                            </tr>
                            <tr>
                              <td class="small text-truncate">Safe Mode</td>
                              <td class=""><?php echo $frmsafemod; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">Memory Limit</td>
                              <td <?php echo $frmMEMLIMIT; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">Uploads Enabled</td>
                              <td class=""><?php echo $frmfupl ; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">Max. Upload Size</td>
                              <td class=""><?php echo $phpenv['phpMAXUPSIZE']; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">Max. Post Size</td>
                              <td class=""><?php echo $phpenv['phpMAXPOSTSIZE']; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">Max. Input Time</td>
                              <td class=""><?php echo $phpenv['phpMAXINPUTTIME'] . ' seconds'; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">Max. Execution Time</td>
                              <td <?php echo $frmMAXEXECTIME . ' seconds'; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">Register Globals</td>
                              <td class=""><?php echo $phpenv['phpREGGLOBAL']; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">Open Base Path</td>
                              <td class=""><?php echo $phpenv['phpOPENBASE']; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">Session Path</td>
                              <td class=""><?php echo $phpenv['phpSESSIONPATH']; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">Session Path Writable</td>
                              <td class="text-success"><?php echo $frmiswrtbl; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">INI File Path</td>
                              <td class=""><?php echo $phpenv['phpINIFILE']; ?></td>                 
                            </tr>
                          </tbody>
                        </table>

                      </div><!--/.panel, item-->

                    </div><!--/.content-item-->
                    <div class="col-xs-12 content-item">

                      <div class="panel panel-default item">

                        <table class="table table-condensed" style="table-layout:fixed;">
                          <colgroup>
                            <col class="col-xs-5 col-lg-4 bg-muted border-right">
                            <col class="">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <tbody>
                            <tr>
                              <td class="small text-truncate">Switch User / Ownership Configuration</td>
                              <td class="">
                                <div class="row-fluid padding-top-sm">
                                  <div class="col-xs-12 col-sm-6">
                                    <div class="margin-bottom-sm padding-lg border-all text-center line-height-normal" style="min-height:77px;">
                                      <span class=" center-block margin-bottom-sm">SUExec</span>
                                      <span class="center-block lead margin-remove text-success"><?php echo $phpenv['phpAPACHESUEXEC']; ?></span>
                                    </div>
                                  </div>
                                  <div class="col-xs-12 col-sm-6">
                                    <div class="margin-bottom-sm padding-lg border-all text-center line-height-normal" style="min-height:77px;">
                                      <span class=" center-block margin-bottom-sm">PHP SUExec</span>
                                      <span class="center-block lead margin-remove text-success"><?php echo $phpenv['phpPHPSUEXEC']; ?></span>
                                    </div>
                                  </div>
                                  <div class="col-xs-12 col-sm-6">
                                    <div class="margin-bottom-sm padding-lg border-all text-center line-height-normal" style="min-height:77px;">
                                      <span class=" center-block margin-bottom-sm">Custom SU</span>
                                      <span class="center-block"><?php echo $phpenv['phpCUSTOMSU']; ?></span>
                                    </div>
                                  </div>
                                  <div class="col-xs-12 col-sm-6">
                                    <div class="margin-bottom-sm padding-lg border-all text-center line-height-normal" style="min-height:77px;">
                                      <span class=" center-block margin-bottom-sm">Ownership Problems</span>
                                      <span class="center-block"><?php echo $phpenv['phpOWNERPROB']; ?></span>
                                    </div>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">Last Known PHP Error</td>
                              <td class="small padding-lg bg-warning text-warning">
                               <?php echo  $phpenv['phpLASTERR']; ?>                            
                              </td>
                            </tr>
                          </tbody>
                        </table>

                      </div><!--/.panel, item-->

                    </div><!--/.content-item-->


                    <div class="clearfix"></div><!--/responsive-column-reset-->

                    <div class="col-xs-12 content-item">

                      <div class="panel panel-default item">

                        <table class="table table-condensed" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase"><?php echo _CAPTION_PHP .' '. _SECTION_EXT_HEADING; ?> </caption>
                          <colgroup>
                            <col>
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <tbody>
                            <tr>
                              <td class="padding-top-lg">
                                <div class="row-fluid small text-lowercase">
                                  
                                <?php
                                foreach ( $phpextensions as $key => $show ) {
                                    if ( $show != $phpextensions['ARRNAME'] ) {
                                        if ( $key == 'exif' ) {
                                            $pieces = explode( " $", $show );
                                            $show = $pieces[0];
                                        }
                                        if ( $key == 'libxml' OR $key == 'xml' OR $key == 'zip' OR $key == 'openssl' OR $key == 'zlib' OR $key == 'curl' OR $key == 'iconv' OR $key == 'mbstring' OR $key == 'mysql' OR $key == 'mysqli' OR $key == 'pdo_mysql' OR $key == 'mcrypt' OR $key == 'suhosin' OR $key == 'cgi' OR $key == 'cgi-fcgi' ) {
                                            $phpextstyle = 'bg-success text-success';
                                        } else {
                                            $phpextstyle = 'bg-muted';
                                        }
                                        echo '<div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">';
                                        echo '<div class="border-all margin-bottom-sm padding-sm text-center ' .  $phpextstyle . '">' . $key . '<br />' . $show  . '</div>';
                                        echo '</div>';
                                    } // endif !arrname
                                    // look for recommended extensions that aren't installed
                                    if ( !in_array( $key, $phpreq ) ) {
                                        unset ( $phpreq[$key] );
                                    }
                                } // end foreach

                                ?>
                                  </div>                                 
                                </div>
                              </td>
                            </tr>                                                      

 
                            <?php 
                                if ( version_compare( $instance['cmsRELEASE'], '3.8', '>=') OR version_compare( $phpenv['phpVERSION'], '7.2.0', '>=' ))   {
                                    unset($phpreq['mcrypt']);   
                                }

                                if (version_compare( $phpenv['phpVERSION'], '7.0.0', '>=' ))   {
                                    unset($phpreq['mysql']);   
                                }    
 
                                if ( $phpreq ) {
                                    echo '<tr>';
                                    echo '<td>';
                                    echo '<div class="row-fluid small">';
                                    echo '<div class="col-xs-12">';
                                    echo '<h5>' . _CAPTION_PHP_MISSING . '</h5>';
                                    echo '</div>';
                                    foreach ( $phpreq as $missingkey => $missing ) {                                                            
                                        echo '<div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">';
                                        echo '<div class="border-all margin-bottom-sm padding-sm text-center bg-warning text-warning">' . $missingkey . '</div>';
                                        echo '</div>';
                                    }
                                    echo '</div>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            ?>
 

                            <?php
                                if ( $phpenv['phpDISABLED'] ) {
                                    echo '<tr>';
                                    echo '<td>';
                                    echo '<div class="row-fluid small">';
                                    echo '<div class="col-xs-12">';
                                    echo '<h5>' . _FPA_DI_PHP_FU . '</h5>';
                                    $disabledfunctions = explode(",",$phpenv['phpDISABLED']);
                                    $arrlength = count($disabledfunctions);
                                    for($x = 0; $x < $arrlength; $x++) {
                                        echo '<div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">';
                                        echo '<div class="border-all margin-bottom-sm padding-sm text-center bg-muted">' . $disabledfunctions[$x] . '</div>';
                                        echo '</div>';
                                    }
                                }
                            ?>
                        </div>                                 
                    </div>
                </td>
            </tr>     
        </tbody>
    </table>

    </div><!--/.panel, item-->

    </div><!--/.content-item-->
    </div><!--/.content-container-->


    </div><!--/.subsection-content-->

    </div><!--/#host-discovery-container-->
    <div class="line"></div>


    </section><!--/#host-discovery-->






            <?php
              /* NOTE (RussW): SECTION - Permissions Discovery
               * permissions checks
               * hidden columns added for mobile views (RussW 24/04/2018)
               *
               */
            ?>
            <section id="perms-discovery-section" class="container-fluid">


              <div class="page-header">

                <h2>
                  <button class="btn btn-info btn-xs pull-right clearfix hidden-print" type="button" data-toggle="collapse" data-target="#collapseExplainPerms" aria-expanded="false" aria-controls="collapseExplainPerms">
                    <i class="glyphicon glyphicon-info-sign"></i><span class="hidden-xs">&nbsp;<?php echo _FPA_EXPLAIN; ?></span>
                  </button>
                  <i class="glyphicon glyphicon-list-alt"></i> <?php echo _SECTION_PERMS_HEADING; ?>
                </h2>

                <p class="lead"><?php echo _SECTION_PERMS_DESCRIBE; ?></p>

                <div class="collapse clearfix" id="collapseExplainPerms">
                  <div class="alert alert-info" role="alert">
                    <h4><i class="glyphicon glyphicon-info-sign"></i> <?php echo _SECTION_PERMS_HEADING; ?></h4>
                    <p><?php echo _SECTION_PERMS_EXPLAIN; ?></p>
                  </div>
                </div><!--/#collapseExplainPerms-->

              </div><!--/.page-header-->







              <?php
                /* NOTE (RussW): SUB-SECTION - Core permisisons discovery
                 * core folder/file permisisons information
                 * hidden columns added for mobile views (RussW 24/04/2018)
                 *
                 */
              ?>
              <div id="perms-discovery-container" class="row margin-top-lg margin-bottom-lg">

                <div class="col-xs-12 col-md-3 col-lg-3 subsection-heading">

                  <h3 class="margin-remove text-muted"><?php echo _SECTION_PERMS_HEADING_CORE; ?></h3>
                  <p class="text-muted"><?php echo _SECTION_PERMS_DESCRIBE_CORE; ?></p>

                </div><!--/.subsection-heading-->
                <div class="col-xs-12 col-md-9 col-lg-9 subsection-content">


                  <div class="row content-container">

                    <!-- TODO (RussW): config not found -->
                          <?php
                          if ($instance['instanceCONFIGURED'] == _FPA_N){
                            echo '<div class="alert alert-warning text-center text-capitalize">';
                            echo '<h4 class="margin-remove-top">' . _FPA_WARNING_ICON . '<br />'. _RES .' '. _RES_MESSAGE_WARNING . '</h4>';
                            echo  _FPA_INSTANCE .' '. _RES_MESSAGE_NOTFOUND .' '. _RES_MESSAGE_NOTESTS;
                            echo '</div>';
                          }
                           ?>
                    <!-- END: config not found -->

                    <div class="col-xs-12 content-item">

                      <div class="panel panel-default item">  
                        <table id="core-permissions-table" class="table table-condensed" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase"><?php echo _SECTION_PERMS_HEADING_CORE .' '. _SECTION_PERMS_HEADING; ?></caption>
                          <colgroup>
                            <col class="border-right">
                            <col class="border-right">
                            <col class="col-xs-7 bg-muted border-right">
                            <col class="hidden-xs border-right">
                            <col class="hidden-xs hidden-sm">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <thead>
                            <tr class="">
                              <th class="text-center"><?php echo _TABLE_PERMS_MODE; ?></th>
                              <th class="text-center"><?php echo _TABLE_COMMON_WRITABLE; ?></th>
                              <th class=""><?php echo _TABLE_PERMS_FOLDER; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_OWNER; ?></th>
                              <th class="text-center hidden-xs hidden-sm"><?php echo _TABLE_COMMON_GROUP; ?></th>
                            </tr>
                          </thead>
                          <tbody>



<?php                           
	if ( $instance['instanceFOUND'] == _FPA_Y ) {

		foreach ( $folders as $i => $show ) {

			if ( $show != 'Core Folders' ) {

				// looking for --7 or -7- or -77 (default folder permissions are usually 755)
				if ( substr( $modecheck[$show]['mode'],1 ,1 ) == '7' OR substr( $modecheck[$show]['mode'],2 ,1 ) == '7' ) {
					$frmPermStyle = 'bg-danger text-danger';
				} elseif ( $modecheck[$show]['mode'] == '755' ) {
					$frmPermStyle = '';
				} else if ( substr( $modecheck[$show]['mode'],0 ,1 ) <= '5' AND $modecheck[$show]['mode'] != '---' ) {
					$frmPermStyle = 'bg-warning text-warning';
				} else if ( $modecheck[$show]['group']['name'] == _FPA_N ) {
					$frmPermStyle = 'bg-warning text-warning';
				} else {
					$frmPermStyle = '';
				}

				// is the folder writable?
				if ( ( $modecheck[$show]['writable'] != _FPA_Y ) ) {
					$writeClass = _FPA_N_ICON;
				} elseif ( ( $modecheck[$show]['writable'] == _FPA_Y ) AND ( substr( $modecheck[$show]['mode'],0 ,1 ) == '7' ) ) {
					$writeClass = _FPA_Y_ICON;
				} elseif ( $modecheck[$show]['writable'] == _FPA_N ) {
					$writeClass = _FPA_N_ICON;
				}

				// is the 'executing' owner the same as the folder owner? and is the users groupID the same as the folders groupID?
				if ( ( $modecheck[$show]['owner']['name'] != $system['sysEXECUSER'] ) AND ( $modecheck[$show]['group']['name'] != _FPA_DNE ) ) {
					$userClass = 'warn-text';
					$groupClass = 'normal';
				} elseif ( isset( $modecheck[$show]['group']['gid'] ) AND isset( $modecheck[$show]['owner']['gid'] ) ) {

					if ( $modecheck[$show]['group']['gid'] != $modecheck[$show]['owner']['gid'] ) {
						$userClass = 'normal';
						$groupClass = 'warn-text';
					}

				} elseif ( $modecheck[$show]['group']['name'] == _FPA_DNE ) {
					$modeClass = 'warn-text';
					$alertClass = 'warn-text';
					//$writeClass = 'warn-text';
					$userClass = 'warn-text';
					$groupClass = 'warn-text';
				}
				    echo '<tr class="' . $frmPermStyle . '">';
				    echo '<td class="small text-center">' . $modecheck[$show]['mode'] . '</td>';
 				    echo '<td class="small text-center">' . $writeClass . '</td>';
				    echo '<td class="small text-truncate">' . $show . '</td>';
				    echo '<td class="small text-truncate text-center hidden-xs">' . $modecheck[$show]['owner']['name'] . '</td>';
				    echo '<td class="small text-truncate text-center hidden-xs hidden-sm">' . $modecheck[$show]['group']['name'] . '</td>';
				    echo '</tr>';                  
			}
		}
	}
?>

                          </tbody>
                        </table>


<!-- HACK (RussW): TESTING export Table to CSV -->
<div class="text-right">
  <button class="hidden-print btn btn-default btn-xs" onclick="exportTableToCSV('core-permissions-<?php echo date('dmY'); ?>.csv', 'core-permissions-table')">
    .csv Export <span class="glyphicon glyphicon-export text-success"></span>
  </button>
</div>


                      </div><!--/.panel, item-->


                    </div><!--/.content-item-->
                  </div><!--/.content-container-->


                </div><!--/.subsection-content-->

              </div><!--/#perms-discovery-container-->






              <?php
                /* NOTE (RussW): SUB-SECTION - Elevated Permissions (optional)
                 * elevated permisisons discovery
                 * hidden columns added for mobile views (RussW 24/04/2018)
                 *
                 */
              ?>
              <div id="eperms-discovery-container" class="row margin-top-lg margin-bottom-lg">

                <div class="col-xs-12 col-md-3 col-lg-3 subsection-heading">

                  <h3 class="margin-remove text-muted"><span class="small text-warning pull-right" data-toggle="tooltip" title="<?php echo _FPA_OPTIONAL_TOOLTIP; ?>"><?php echo _FPA_NOTE_ICON; ?></span> <?php echo _SECTION_PERMS_HEADING_ELEV; ?></h3>
                  <p class="text-muted"><?php echo _SECTION_PERMS_DESCRIBE_ELEV; ?></p>

                </div><!--/.subsection-heading-->
                <div class="col-xs-12 col-md-9 col-lg-9 subsection-content">


                  <div class="row content-container">
                    <div class="col-xs-12 content-item">

                      <div class="panel panel-default item">

                        <table id="elevated-permissions-table" class="table table-condensed" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase"><?php echo _SECTION_PERMS_HEADING_ELEV .' '. _CAPTION_CHECKS; ?></caption>
                          <colgroup>
                            <col class="border-right">
                            <col class="border-right">
                            <col class="col-xs-7 bg-muted border-right">
                            <col class="hidden-xs border-right">
                            <col class="hidden-xs hidden-sm">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <thead>
                            <tr class="">
                              <th class="text-center"><?php echo _TABLE_PERMS_MODE; ?></th>
                              <th class="text-center"><?php echo _TABLE_COMMON_WRITABLE; ?></th>
                              <th class=""><?php echo _TABLE_PERMS_FOLDER; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_OWNER; ?></th>
                              <th class="text-center hidden-xs hidden-sm"><?php echo _TABLE_COMMON_GROUP; ?></th>
                            </tr>
                          </thead>
                          <tbody>


<?php
	/** display the folders with elevated permissions ************************************/                                           

		// only do mode/permissions checks if an instance was found in the intial checks
		if ( $instance['instanceFOUND'] == _FPA_Y ) {

			foreach ( $elevated as $key => $show ) {

				if ( $show != $elevated['ARRNAME'] ) {

					// looking for --7 or -7- or -77 (default folder permissions are usually 755)
					if ( substr( $show['mode'],1 ,1 ) == '7' OR substr( $show['mode'],2 ,1 ) == '7' ) {
						$frmPermStyle = 'bg-danger text-danger';
					} else {
						$frmPermStyle = '';
					}

					// is the folder writable?
					if ( ( $show['writable'] == _FPA_Y ) ) {
						$writeClass = _FPA_Y_ICON;
					} else {
						$writeClass = _FPA_N_ICON;
					}
					   echo '<tr class="' . $frmPermStyle . '">';
					   echo '<td class="small text-center">' . $show['mode'] . '</td>';
					   echo '<td class="small text-center">' . $writeClass . '</td>';
					   echo '<td class="small text-truncate">' . $key . '/</td>';
					   echo '<td class="small text-truncate text-center hidden-xs">'.'</td>';
					   echo '<td class="small text-truncate text-center hidden-xs hidden-sm">'.'</td>';
					   echo '</tr>';
				} // endif ARRNAME                                                                                                                                    
			} // end for each
		}
?>




                          </tbody>
                        </table>


<!-- HACK (RussW): TESTING export Table to CSV -->
<div class="text-right">
  <button class="hidden-print btn btn-default btn-xs" onclick="exportTableToCSV('elevated-permissions-<?php echo date('dmY'); ?>.csv', 'elevated-permissions-table')">
    .csv Export <span class="glyphicon glyphicon-export text-success"></span>
  </button>
</div>

                      </div><!--/.panel, item-->

                    </div><!--/.content-item-->
                  </div><!--/.content-container-->


                </div><!--/.subsection-content-->

              </div><!--/#eperms-discovery-container-->
              <div class="line"></div>


            </section><!--/#perms-discovery-->






            <?php
              /* NOTE (RussW): SECTION - Extension Discovery
               * installed extension discovery
               *
               */
            ?>
            <section id="extension-discovery-section" class="container-fluid">


              <div class="page-header">

<!-- HACK (RussW): TESTING Run VEL Check Option -->
<form method="post" name="checkVEL" id="checkVEL" action="#extension-discovery-section" class="">

                <h2>
  <div class="btn-group pull-right">
  <button type="submit" class="btn btn-warning btn-xs hidden-xs hidden-print" name="submitVEL"><span class="glyphicon glyphicon-screenshot"></span> VEL Check</button>

                  <button class="btn btn-info btn-xs hidden-print" type="button" data-toggle="collapse" data-target="#collapseExplainExt" aria-expanded="false" aria-controls="collapseExplainExt">
                    <i class="glyphicon glyphicon-info-sign"></i><span class="hidden-xs">&nbsp;<?php echo _FPA_EXPLAIN; ?></span>
                  </button>
  </div>
                  <i class="glyphicon glyphicon-th"></i> <?php echo _SECTION_EXT_HEADING; ?>
                </h2>

  <input type="hidden" name="runVEL" value="1" />
</form>


                <p class="lead"><?php echo _SECTION_EXT_DESCRIBE; ?></p>


                <div class="collapse clearfix" id="collapseExplainExt">
                  <div class="alert alert-info" role="alert">
                    <h4><i class="glyphicon glyphicon-info-sign"></i> <?php echo _SECTION_EXT_HEADING; ?></h4>
                    <p><?php echo _SECTION_EXT_EXPLAIN; ?></p>
                  </div>
                </div><!--/#collapseExplainExt-->

              </div><!--/.page-header-->






              <?php
                /* NOTE (RussW): SUB-SECTION  - Component Discovery
                 * installed component information
                 * hidden columns added for mobile views (RussW 24/04/2018)
                 * top margin added to administrator table (RussW 24/04/2018)
                 *
                 */
              ?>
              <div id="component-discovery-container" class="row margin-bottom-lg">

                <div class="col-xs-12 col-md-3 col-lg-3 subsection-heading">

                  <h3 class="margin-remove text-muted"><span class="small text-warning pull-right" data-toggle="tooltip" title="<?php echo _FPA_OPTIONAL_TOOLTIP; ?>"><?php echo _FPA_NOTE_ICON; ?></span> <?php echo _SECTION_EXT_HEADING_COM; ?></h3>
                  <p class="text-muted"><?php echo _SECTION_EXT_DESCRIBE_COM; ?></p>

                </div><!--/.subsection-heading-->
                <div class="col-xs-12 col-md-9 col-lg-9 subsection-content">


                  <div class="row content-container">

                    <!-- TODO (RussW): config not found -->
                          <?php
                          if ($instance['instanceCONFIGURED'] == _FPA_N){
                            echo '<div class="alert alert-warning text-center text-capitalize">';
                            echo '<h4 class="margin-remove-top">' . _FPA_WARNING_ICON . '<br />'. _RES .' '. _RES_MESSAGE_WARNING . '</h4>';
                            echo  _FPA_INSTANCE .' '. _RES_MESSAGE_NOTFOUND .' '. _RES_MESSAGE_NOTESTS;
                            echo '</div>';
                          }
                           ?>
                    <!-- END: config not found -->


                    <div class="col-xs-12 content-item">

                      <div class="panel panel-default item">

                        <table id="site-components-table" class="table table-condensed" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase"><?php echo _SECTION_EXT_HEADING_COM .' :: '. _CAPTION_SITE; ?></caption>
                          <colgroup>
                            <col class="col-xs-1 col-sm-2 border-right">
                            <col class="col-xs-8 col-sm-3 bg-muted border-right">
                            <col class="border-right">
                            <col class="hidden-xs border-right">
                            <col class="hidden-xs hidden-sm border-right">
                            <col class="hidden-xs border-right">
                            <col class="hidden-xs">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <thead>
                            <tr class="">
                              <th class="text-center text-truncate"><?php echo _TABLE_COMMON_ENABLED; ?></th>
                              <th class=""><?php echo _TABLE_COMMON_NAME; ?></th>
                              <th class="text-center"><?php echo _FPA_VER; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_AUTHOR; ?></th>
                              <th class="text-center hidden-xs hidden-sm"><?php echo _TABLE_COMMON_ADDRESS; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_CREATED; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_TYPE; ?></th>
                            </tr>
                          </thead>
                          <tbody>


<?php
	// Components
		if ( $instance['instanceFOUND'] == _FPA_N ) { // an instance wasn't found in the initial checks, so no folders to check

		} else {
		// Site components 
          if (isset ($component['SITE'])) {
			foreach ( $component['SITE'] as $key => $show ) {
				if (isset($exset[0]['name'])) { 
					$extarrkey = recursive_array_search($show['name'], $exset);
                    if ($extarrkey  !== False) {
					$extenabled = $exset[$extarrkey]['enabled'];
				} else { $extenabled = '' ;}
				} else { $extenabled = '' ;}

					switch ($extenabled) {
					    case '1':
        					$frmextenabled = _FPA_Y_ICON;
					        break;
					    case '0':
        					$frmextenabled = _FPA_N_ICON;
					        break;
					    default:
        					$frmextenabled = _FPA_U_ICON;
					}
					   echo '<tr class="">';
					   echo '<td class=" lead text-center  text-unknown">' . $frmextenabled . '</td>';
					   echo '<td class="small text-truncate">' . $show['name'] . '</td>';
					   echo '<td class="small text-center">' . $show['version'] . '</td>';
					   echo '<td class="small text-center text-truncate hidden-xs">' . $show['author'] . '</td>';
					   echo '<td class="small text-center text-truncate hidden-xs hidden-sm">' . $show['authorUrl'] . '</td>';
					   echo '<td class="small text-center text-truncate hidden-xs">' . $show['creationDate'] . '</td>';
					   echo '<td class="small text-center hidden-xs">' . $show['type'] . '</td>';
					   echo '</tr>';
			}       
          }
        }
?>

                          </tbody>
                        </table>




<!-- HACK (RussW): TESTING export Table to CSV -->
<div class="text-right">
  <button class="hidden-print btn btn-default btn-xs" onclick="exportTableToCSV('site-components-<?php echo date('dmY'); ?>.csv', 'site-components-table')">
    .csv Export <span class="glyphicon glyphicon-export text-success"></span>
  </button>
</div>

                      </div><!--/.panel, item-->

                      <div class="panel panel-default item">

                        <table id="admin-components-table" class="table table-condensed" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase"><?php echo _SECTION_EXT_HEADING_COM .' :: '. _CAPTION_ADMIN; ?></caption>
                          <colgroup>
                            <col class="col-xs-1 col-sm-2 border-right">
                            <col class="col-xs-8 col-sm-3 bg-muted border-right">
                            <col class="border-right">
                            <col class="hidden-xs border-right">
                            <col class="hidden-xs hidden-sm border-right">
                            <col class="hidden-xs border-right">
                            <col class="hidden-xs">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <thead>
                            <tr class="">
                              <th class="text-center text-truncate"><?php echo _TABLE_COMMON_ENABLED; ?></th>
                              <th class=""><?php echo _TABLE_COMMON_NAME; ?></th>
                              <th class="text-center"><?php echo _FPA_VER; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_AUTHOR; ?></th>
                              <th class="text-center hidden-xs hidden-sm"><?php echo _TABLE_COMMON_ADDRESS; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_CREATED; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_TYPE; ?></th>
                            </tr>
                          </thead>
                          <tbody>
 
<?php
	if ( $instance['instanceFOUND'] == _FPA_N ) { // an instance wasn't found in the initial checks, so no folders to check
		} else {
		// Admin components
        if (isset ($component['ADMIN'])){
			foreach ( $component['ADMIN'] as $key => $show ) {
				if (isset($exset[0]['name'])) { 
					$extarrkey = recursive_array_search($show['name'], $exset);
                    if ($extarrkey  !== False) {
					$extenabled = $exset[$extarrkey]['enabled'];
				} else { $extenabled = '' ;}
				} else { $extenabled = '' ;}

					switch ($extenabled) {
					    case '1':
        					$frmextenabled = _FPA_Y_ICON;
					        break;
					    case '0':
        					$frmextenabled = _FPA_N_ICON;
					        break;
					    default:
        					$frmextenabled = _FPA_U_ICON;
					}
					   echo '<tr class="">';
					   echo '<td class="lead text-center text-unknown">' . $frmextenabled . '</td>';
					   echo '<td class="small text-truncate">' . $show['name'] . '</td>';
					   echo '<td class="small text-center">' . $show['version'] . '</td>';
					   echo '<td class="small text-center text-truncate hidden-xs">' . $show['author'] . '</td>';
					   echo '<td class="small text-center text-truncate hidden-xs hidden-sm">' . $show['authorUrl'] . '</td>';
					   echo '<td class="small text-center text-truncate hidden-xs">' . $show['creationDate'] . '</td>';
					   echo '<td class="small text-center hidden-xs">' . $show['type'] . '</td>';
					   echo '</tr>';
			}
        }
	}
?>
 

                          </tbody>
                        </table>


<!-- HACK (RussW): TESTING export Table to CSV -->
<div class="text-right">
  <button class="hidden-print btn btn-default btn-xs" onclick="exportTableToCSV('admin-components-<?php echo date('dmY'); ?>.csv', 'admin-components-table')">
    .csv Export <span class="glyphicon glyphicon-export text-success"></span>
  </button>
</div>


                      </div><!--/.panel, item-->

                    </div><!--/.content-item-->
                  </div><!--/.content-container-->


                </div><!--/.subsection-content-->

              </div><!--/#component-discovery-container-->






              <?php
                /* NOTE (RussW): SUB-SECTION  - Module Discovery
                 * installed module discovery
                 * hidden columns added for mobile views (RussW 24/04/2018)
                 * top margin added to administrator table (RussW 24/04/2018)
                 *
                 */
              ?>
              <div id="module-discovery-container" class="row margin-bottom-lg">

                <div class="col-xs-12 col-md-3 col-lg-3 subsection-heading">

                  <h3 class="margin-remove text-muted"><span class="small text-warning pull-right" data-toggle="tooltip" title="<?php echo _FPA_OPTIONAL_TOOLTIP; ?>"><?php echo _FPA_NOTE_ICON; ?></span> <?php echo _SECTION_EXT_HEADING_MOD; ?></h3>
                  <p class="text-muted"><?php echo _SECTION_EXT_DESCRIBE_MOD; ?></p>

                </div><!--/.subsection-heading-->
                <div class="col-xs-12 col-md-9 col-lg-9 subsection-content">


                  <div class="row content-container">
                    <div class="col-xs-12 content-item">

                      <div class="panel panel-default item">

                        <table id="site-modules-table" class="table table-condensed" style="table-layout:fixed;">
                              <caption class="text-center text-uppercase"><?php echo _SECTION_EXT_HEADING_MOD .' :: '. _CAPTION_SITE; ?></caption>
                          <colgroup>
                            <col class="col-xs-1 col-sm-2 border-right">
                            <col class="col-xs-8 col-sm-3 bg-muted border-right">
                            <col class="border-right">
                            <col class="hidden-xs border-right">
                            <col class="hidden-xs hidden-sm border-right">
                            <col class="hidden-xs border-right">
                            <col class="hidden-xs">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                              <thead>
                                <tr class="">
                              <th class="text-center text-truncate"><?php echo _TABLE_COMMON_ENABLED; ?></th>
                              <th class=""><?php echo _TABLE_COMMON_NAME; ?></th>
                              <th class="text-center"><?php echo _FPA_VER; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_AUTHOR; ?></th>
                              <th class="text-center hidden-xs hidden-sm"><?php echo _TABLE_COMMON_ADDRESS; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_CREATED; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_TYPE; ?></th>
                                </tr>
                              </thead>
                              <tbody>


<?php
	// Modules
	if ( $instance['instanceFOUND'] == _FPA_N ) { // an instance wasn't found in the initial checks, so no folders to check
		} else {
		// Site modules 
        if (isset ($module['SITE'])) {
			foreach ( $module['SITE'] as $key => $show ) {
				if (isset($exset[0]['name'])) { 
					$extarrkey = recursive_array_search($show['name'], $exset);
                    if ($extarrkey  !== False) {
					$extenabled = $exset[$extarrkey]['enabled'];
				} else { $extenabled = '' ;}
				} else { $extenabled = '' ;}

					switch ($extenabled) {
					    case '1':
        					$frmextenabled = _FPA_Y_ICON;
					        break;
					    case '0':
        					$frmextenabled = _FPA_N_ICON;
					        break;
					    default:
        					$frmextenabled = _FPA_U_ICON;
					}
					   echo '<tr class="">';
					   echo '<td class="lead text-center text-unknown">' . $frmextenabled . '</td>';
					   echo '<td class="small text-truncate">' . $show['name'] . '</td>';
					   echo '<td class="small text-center">' . $show['version'] . '</td>';
					   echo '<td class="small text-center text-truncate hidden-xs">' . $show['author'] . '</td>';
					   echo '<td class="small text-center text-truncate hidden-xs hidden-sm">' . $show['authorUrl'] . '</td>';
					   echo '<td class="small text-center text-truncate hidden-xs">' . $show['creationDate'] . '</td>';
					   echo '<td class="small text-center hidden-xs">' . $show['type'] . '</td>';
					   echo '</tr>';
			}       
        }
	}
?>


                              </tbody>
                            </table>


<!-- HACK (RussW): TESTING export Table to CSV -->
<div class="text-right">
  <button class="hidden-print btn btn-default btn-xs" onclick="exportTableToCSV('site-modules-<?php echo date('dmY'); ?>.csv', 'site-modules-table')">
    .csv Export <span class="glyphicon glyphicon-export text-success"></span>
  </button>
</div>


                      </div><!--/.panel, item-->

                      <div class="panel panel-default item">

                        <table id="admin-modules-table" class="table table-condensed" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase"><?php echo _SECTION_EXT_HEADING_MOD .' :: '. _CAPTION_ADMIN; ?></caption>
                          <colgroup>
                            <col class="col-xs-1 col-sm-2 border-right">
                            <col class="col-xs-8 col-sm-3 bg-muted border-right">
                            <col class="border-right">
                            <col class="hidden-xs border-right">
                            <col class="hidden-xs hidden-sm border-right">
                            <col class="hidden-xs border-right">
                            <col class="hidden-xs">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <thead>
                            <tr class="">
                              <th class="text-center text-truncate"><?php echo _TABLE_COMMON_ENABLED; ?></th>
                              <th class=""><?php echo _TABLE_COMMON_NAME; ?></th>
                              <th class="text-center"><?php echo _FPA_VER; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_AUTHOR; ?></th>
                              <th class="text-center hidden-xs hidden-sm"><?php echo _TABLE_COMMON_ADDRESS; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_CREATED; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_TYPE; ?></th>
                            </tr>
                          </thead>
                              <tbody>

<?php
	if ( $instance['instanceFOUND'] == _FPA_N ) { // an instance wasn't found in the initial checks, so no folders to check
		} else {
		// Admin modules
        if (isset ($module['ADMIN'])) {
			foreach ( $module['ADMIN'] as $key => $show ) {
				if (isset($exset[0]['name'])) { 
					$extarrkey = recursive_array_search($show['name'], $exset);
                    if ($extarrkey  !== False) {
					$extenabled = $exset[$extarrkey]['enabled'];
				} else { $extenabled = '' ;}
				} else { $extenabled = '' ;}

					switch ($extenabled) {
					    case '1':
        					$frmextenabled = _FPA_Y_ICON;
					        break;
					    case '0':
        					$frmextenabled = _FPA_N_ICON;
					        break;
					    default:
        					$frmextenabled = _FPA_U_ICON;
					}
					   echo '<tr class="">';
					   echo '<td class="lead text-center text-unknown">' . $frmextenabled . '</td>';
					   echo '<td class="small text-truncate">' . $show['name'] . '</td>';
					   echo '<td class="small text-center">' . $show['version'] . '</td>';
					   echo '<td class="small text-center text-truncate hidden-xs">' . $show['author'] . '</td>';
					   echo '<td class="small text-center text-truncate hidden-xs hidden-sm">' . $show['authorUrl'] . '</td>';
					   echo '<td class="small text-center text-truncate hidden-xs">' . $show['creationDate'] . '</td>';
					   echo '<td class="small text-center hidden-xs">' . $show['type'] . '</td>';
					   echo '</tr>';
			}
        }
	}
?>


                              </tbody>
                            </table>


<!-- HACK (RussW): TESTING export Table to CSV -->
<div class="text-right">
  <button class="hidden-print btn btn-default btn-xs" onclick="exportTableToCSV('admin-modules-<?php echo date('dmY'); ?>.csv', 'admin-modules-table')">
    .csv Export <span class="glyphicon glyphicon-export text-success"></span>
  </button>
</div>


                      </div><!--/.panel, item-->

                    </div><!--/.content-item-->
                  </div><!--/.content-container-->


                </div><!--/.subsection-content-->

              </div><!--/#module-discovery-container-->






              <?php
                /* NOTE (RussW): SUB-SECTION  - Plugin Discovery
                 * installed plugin discovery
                 * hidden columns added for mobile views (RussW 24/04/2018)
                 * top margin added to administrator table (RussW 24/04/2018)
                 *
                 */
              ?>
              <div id="plugin-discovery-container" class="row margin-bottom-lg">

                <div class="col-xs-12 col-md-3 col-lg-3 subsection-heading">

                  <h3 class="margin-remove text-muted"><span class="small text-warning pull-right" data-toggle="tooltip" title="<?php echo _FPA_OPTIONAL_TOOLTIP; ?>"><?php echo _FPA_NOTE_ICON; ?></span> <?php echo _SECTION_EXT_HEADING_PLG; ?></h3>
                  <p class="text-muted"><?php echo _SECTION_EXT_DESCRIBE_PLG; ?></p>

                </div><!--/.subsection-heading-->
                <div class="col-xs-12 col-md-9 col-lg-9 subsection-content">


                  <div class="row content-container">
                    <div class="col-xs-12 content-item">

                      <div class="panel panel-default item">

                        <table id="site-plugins-table" class="table table-condensed" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase"><?php echo _SECTION_EXT_HEADING_PLG .' :: '. _CAPTION_SITE; ?></caption>
                          <colgroup>
                            <col class="col-xs-1 col-sm-2 border-right">
                            <col class="col-xs-8 col-sm-3 bg-muted border-right">
                            <col class="border-right">
                            <col class="hidden-xs border-right">
                            <col class="hidden-xs hidden-sm border-right">
                            <col class="hidden-xs border-right">
                            <col class="hidden-xs">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <thead>
                            <tr class="">
                              <th class="text-center text-truncate"><?php echo _TABLE_COMMON_ENABLED; ?></th>
                              <th class=""><?php echo _TABLE_COMMON_NAME; ?></th>
                              <th class="text-center"><?php echo _FPA_VER; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_AUTHOR; ?></th>
                              <th class="text-center hidden-xs hidden-sm"><?php echo _TABLE_COMMON_ADDRESS; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_CREATED; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_TYPE; ?></th>
                            </tr>
                          </thead>
                              <tbody>
<?php
	// Plugins
	if ( $instance['instanceFOUND'] == _FPA_N ) { // an instance wasn't found in the initial checks, so no folders to check

		} else {
		// Site plugins 
        if (isset ($plugin['SITE'] )) {
			foreach ( $plugin['SITE'] as $key => $show ) {
				if (isset($exset[0]['name'])) { 
					$extarrkey = recursive_array_search($show['name'], $exset);
                    if ($extarrkey  !== False) {
					$extenabled = $exset[$extarrkey]['enabled'];
				} else { $extenabled = '' ;}
				} else { $extenabled = '' ;}

					switch ($extenabled) {
					    case '1':
        					$frmextenabled = _FPA_Y_ICON;
					        break;
					    case '0':
        					$frmextenabled = _FPA_N_ICON;
					        break;
					    default:
        					$frmextenabled = _FPA_U_ICON;
					}
					   echo '<tr class="">';
					   echo '<td class="lead text-center text-unknown">' . $frmextenabled . '</td>';
					   echo '<td class="small text-truncate">' . $show['name'] . '</td>';
					   echo '<td class="small text-center">' . $show['version'] . '</td>';
					   echo '<td class="small text-center text-truncate hidden-xs">' . $show['author'] . '</td>';
					   echo '<td class="small text-center text-truncate hidden-xs hidden-sm">' . $show['authorUrl'] . '</td>';
					   echo '<td class="small text-center text-truncate hidden-xs">' . $show['creationDate'] . '</td>';
					   echo '<td class="small text-center hidden-xs">' . $show['type'] . '</td>';
					   echo '</tr>';
			}       
        }
	}
?>


                              </tbody>
                            </table>


<!-- HACK (RussW): TESTING export Table to CSV -->
<div class="text-right">
  <button class="hidden-print btn btn-default btn-xs" onclick="exportTableToCSV('site-plugins-<?php echo date('dmY'); ?>.csv', 'site-plugins-table')">
    .csv Export <span class="glyphicon glyphicon-export text-success"></span>
  </button>
</div>


                      </div><!--/.panel, item-->

                      <div class="panel panel-default item">

                        <table id="admin-plugins-table" class="table table-condensed" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase"><?php echo _SECTION_EXT_HEADING_PLG .' :: '. _CAPTION_ADMIN; ?></caption>
                          <colgroup>
                            <col class="col-xs-1 col-sm-2 border-right">
                            <col class="col-xs-8 col-sm-3 bg-muted border-right">
                            <col class="border-right">
                            <col class="hidden-xs border-right">
                            <col class="hidden-xs hidden-sm border-right">
                            <col class="hidden-xs border-right">
                            <col class="hidden-xs">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <thead>
                            <tr class="">
                              <th class="text-center text-truncate"><?php echo _TABLE_COMMON_ENABLED; ?></th>
                              <th class=""><?php echo _TABLE_COMMON_NAME; ?></th>
                              <th class="text-center"><?php echo _FPA_VER; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_AUTHOR; ?></th>
                              <th class="text-center hidden-xs hidden-sm"><?php echo _TABLE_COMMON_ADDRESS; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_CREATED; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_TYPE; ?></th>
                            </tr>
                          </thead>
                              <tbody>

<?php
	if ( $instance['instanceFOUND'] == _FPA_N ) { // an instance wasn't found in the initial checks, so no folders to check
		} else {
		// Admin plugin
	   if ( isset ($plugin['ADMIN'])) {
			foreach ( $plugin['ADMIN'] as $key => $show ) {
				if (isset($exset[0]['name'])) { 
					$extarrkey = recursive_array_search($show['name'], $exset);
                    if ($extarrkey  !== False) {
					$extenabled = $exset[$extarrkey]['enabled'];
				} else { $extenabled = '' ;}
				} else { $extenabled = '' ;}

					switch ($extenabled) {
					    case '1':
        					$frmextenabled = _FPA_Y_ICON;
					        break;
					    case '0':
        					$frmextenabled = _FPA_N_ICON;
					        break;
					    default:
        					$frmextenabled = _FPA_U_ICON;
					}
					   echo '<tr class="">';
					   echo '<td class="lead text-center text-unknown">' . $frmextenabled . '</td>';
					   echo '<td class="small text-truncate">' . $show['name'] . '</td>';
					   echo '<td class="small text-center">' . $show['version'] . '</td>';
					   echo '<td class="small text-center text-truncate hidden-xs">' . $show['author'] . '</td>';
					   echo '<td class="small text-center text-truncate hidden-xs hidden-sm">' . $show['authorUrl'] . '</td>';
					   echo '<td class="small text-center text-truncate hidden-xs">' . $show['creationDate'] . '</td>';
					   echo '<td class="small text-center hidden-xs">' . $show['type'] . '</td>';
					   echo '</tr>';
			}
	   }
	}
?>


                              </tbody>
                            </table>


<!-- HACK (RussW): TESTING export Table to CSV -->
<div class="text-right">
  <button class="hidden-print btn btn-default btn-xs" onclick="exportTableToCSV('admin-plugins-<?php echo date('dmY'); ?>.csv', 'admin-plugins-table')">
    .csv Export <span class="glyphicon glyphicon-export text-success"></span>
  </button>
</div>


                      </div><!--/.panel, item-->

                    </div><!--/.content-item-->
                  </div><!--/.content-container-->


                </div><!--/.subsection-content-->

              </div><!--/#plugin-discovery-container-->






             <?php
                /* NOTE (RussW): SUB-SECTION  - Library Discovery
                 * installed library discovery (RussW : 06/05/2018)
                 *
                 */
              ?>
              <div id="library-discovery-container" class="row margin-bottom-lg">

                <div class="col-xs-12 col-md-3 col-lg-3 subsection-heading">

                  <h3 class="margin-remove text-muted"><span class="small text-warning pull-right" data-toggle="tooltip" title="<?php echo _FPA_OPTIONAL_TOOLTIP; ?>"><?php echo _FPA_NOTE_ICON; ?></span> <?php echo _SECTION_EXT_HEADING_LIB; ?></h3>
                  <p class="text-muted"><?php echo _SECTION_EXT_DESCRIBE_LIB; ?></p>

                </div><!--/.subsection-heading-->
                <div class="col-xs-12 col-md-9 col-lg-9 subsection-content">


                  <div class="row content-container">
                    <div class="col-xs-12 content-item">

                      <div class="panel panel-default item">

                        <table id="site-libraries-table" class="table table-condensed" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase"><?php echo _SECTION_EXT_HEADING_LIB .' :: '. _CAPTION_SITE; ?></caption>
                          <colgroup>
                            <col class="col-xs-1 col-sm-2 border-right">
                            <col class="col-xs-8 col-sm-3 bg-muted border-right">
                            <col class="border-right">
                            <col class="hidden-xs border-right">
                            <col class="hidden-xs hidden-sm border-right">
                            <col class="hidden-xs border-right">
                            <col class="hidden-xs">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <thead>
                            <tr class="">
                              <th class="text-center text-truncate"><?php echo _TABLE_COMMON_ENABLED; ?></th>
                              <th class=""><?php echo _TABLE_COMMON_NAME; ?></th>
                              <th class="text-center"><?php echo _FPA_VER; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_AUTHOR; ?></th>
                              <th class="text-center hidden-xs hidden-sm"><?php echo _TABLE_COMMON_ADDRESS; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_CREATED; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_TYPE; ?></th>
                            </tr>
                          </thead>
                              <tbody>

<?php
	// Libraries
	if ( $instance['instanceFOUND'] == _FPA_N ) { // an instance wasn't found in the initial checks, so no folders to check
		} else {
		// Site libraries 
        if (isset ($library['SITE'] )) {
			foreach ( $library['SITE'] as $key => $show ) {
				if (isset($exset[0]['name'])) { 
					$extarrkey = recursive_array_search($show['name'], $exset);
                    if ($extarrkey  !== False) {
					$extenabled = $exset[$extarrkey]['enabled'];
				} else { $extenabled = '' ;}
				} else { $extenabled = '' ;}

					switch ($extenabled) {
					    case '1':
        					$frmextenabled = _FPA_Y_ICON;
					        break;
					    case '0':
        					$frmextenabled = _FPA_N_ICON;
					        break;
					    default:
        					$frmextenabled = _FPA_U_ICON;
					}
					   echo '<tr class="">';
					   echo '<td class="lead text-center text-unknown">' . $frmextenabled . '</td>';
					   echo '<td class="small text-truncate">' . $show['name'] . '</td>';
					   echo '<td class="small text-center">' . $show['version'] . '</td>';
					   echo '<td class="small text-center text-truncate hidden-xs">' . $show['author'] . '</td>';
					   echo '<td class="small text-center text-truncate hidden-xs hidden-sm">' . $show['authorUrl'] . '</td>';
					   echo '<td class="small text-center text-truncate hidden-xs">' . $show['creationDate'] . '</td>';
					   echo '<td class="small text-center hidden-xs">' . $show['type'] . '</td>';
					   echo '</tr>';
			}       
        }
	}
?>



                              </tbody>
                            </table>


<!-- HACK (RussW): TESTING export Table to CSV -->
<div class="text-right">
  <button class="hidden-print btn btn-default btn-xs" onclick="exportTableToCSV('site-libraries-<?php echo date('dmY'); ?>.csv', 'site-libraries-table')">
    .csv Export <span class="glyphicon glyphicon-export text-success"></span>
  </button>
</div>


                      </div><!--/.panel, item-->

                      <div class="panel panel-default item">

                        <table id="admin-libraries-table" class="table table-condensed" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase"><?php echo _SECTION_EXT_HEADING_LIB .' :: '. _CAPTION_ADMIN; ?></caption>
                          <colgroup>
                            <col class="col-xs-1 col-sm-2 border-right">
                            <col class="col-xs-8 col-sm-3 bg-muted border-right">
                            <col class="border-right">
                            <col class="hidden-xs border-right">
                            <col class="hidden-xs hidden-sm border-right">
                            <col class="hidden-xs border-right">
                            <col class="hidden-xs">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <thead>
                            <tr class="">
                              <th class="text-center text-truncate"><?php echo _TABLE_COMMON_ENABLED; ?></th>
                              <th class=""><?php echo _TABLE_COMMON_NAME; ?></th>
                              <th class="text-center"><?php echo _FPA_VER; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_AUTHOR; ?></th>
                              <th class="text-center hidden-xs hidden-sm"><?php echo _TABLE_COMMON_ADDRESS; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_CREATED; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_TYPE; ?></th>
                            </tr>
                          </thead>
                              <tbody>
<?php
	if ( $instance['instanceFOUND'] == _FPA_N ) { // an instance wasn't found in the initial checks, so no folders to check
		} else {
		// Admin libraries
	   if ( isset ($library['ADMIN'])) {
			foreach ( $library['ADMIN'] as $key => $show ) {
				if (isset($exset[0]['name'])) { 
					$extarrkey = recursive_array_search($show['name'], $exset);
                    if ($extarrkey  !== False) {
					$extenabled = $exset[$extarrkey]['enabled'];
				} else { $extenabled = '' ;}
				} else { $extenabled = '' ;}

					switch ($extenabled) {
					    case '1':
        					$frmextenabled = _FPA_Y_ICON;
					        break;
					    case '0':
        					$frmextenabled = _FPA_N_ICON;
					        break;
					    default:
        					$frmextenabled = _FPA_U_ICON;
					}
					   echo '<tr class="">';
					   echo '<td class="lead text-center text-unknown">' . $frmextenabled . '</td>';
					   echo '<td class="small text-truncate">' . $show['name'] . '</td>';
					   echo '<td class="small text-center">' . $show['version'] . '</td>';
					   echo '<td class="small text-center text-truncate hidden-xs">' . $show['author'] . '</td>';
					   echo '<td class="small text-center text-truncate hidden-xs hidden-sm">' . $show['authorUrl'] . '</td>';
					   echo '<td class="small text-center text-truncate hidden-xs">' . $show['creationDate'] . '</td>';
					   echo '<td class="small text-center hidden-xs">' . $show['type'] . '</td>';
					   echo '</tr>';
			}
	   }
	}
?>


                              </tbody>
                            </table>


<!-- HACK (RussW): TESTING export Table to CSV -->
<div class="text-right">
  <button class="hidden-print btn btn-default btn-xs" onclick="exportTableToCSV('admin-libraries-<?php echo date('dmY'); ?>.csv', 'admin-libraries-table')">
    .csv Export <span class="glyphicon glyphicon-export text-success"></span>
  </button>
</div>


                      </div><!--/.panel, item-->

                    </div><!--/.content-item-->
                  </div><!--/.content-container-->


                </div><!--/.subsection-content-->

              </div><!--/#library-discovery-container-->





              <?php
                /* NOTE (RussW): SUB-SECTION  - Template Discovery
                 * installed template discovery
                 * hidden columns added for mobile views (RussW 24/04/2018)
                 * top margin added to administrator table (RussW 24/04/2018)
                 *
                 */
              ?>
              <div id="template-discovery-container" class="row margin-bottom-lg">

                <div class="col-xs-12 col-md-3 col-lg-3 subsection-heading">

                  <h3 class="margin-remove text-muted"><?php echo _SECTION_EXT_HEADING_TPL; ?></h3>
                  <p class="text-muted"><?php echo _SECTION_EXT_DESCRIBE_TPL; ?></p>
                  <p class="text-muted"><?php echo _SECTION_EXT_DESCRIBE_TPL_OVR; ?></p>

                </div><!--/.subsection-heading-->
                <div class="col-xs-12 col-md-9 col-lg-9 subsection-content">


                  <div class="row content-container">
                    <div class="col-xs-12 content-item">

                      <div class="panel panel-default item">

                        <table id="site-templates-table" class="table table-condensed" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase"><?php echo _SECTION_EXT_HEADING_TPL .' :: '. _CAPTION_SITE; ?></caption>
                          <colgroup>
                            <col class="col-xs-1 col-sm-2 border-right">
                            <col class="col-xs-8 col-sm-3 bg-muted border-right">
                            <col class="border-right">
                            <col class="hidden-xs border-right">
                            <col class="hidden-xs hidden-sm border-right">
                            <col class="hidden-xs border-right">
                            <col class="hidden-xs">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <thead>
                            <tr class="">
                              <th class="text-center text-truncate"><?php echo _TABLE_COMMON_ENABLED; ?></th>
                              <th class=""><?php echo _TABLE_COMMON_NAME; ?></th>
                              <th class="text-center"><?php echo _FPA_VER; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_AUTHOR; ?></th>
                              <th class="text-center hidden-xs hidden-sm"><?php echo _TABLE_COMMON_ADDRESS; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_CREATED; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_TYPE; ?></th>
                            </tr>
                          </thead>
                              <tbody>

 <?php
	// Templates	
	if ( $instance['instanceFOUND'] == _FPA_N ) { // an instance wasn't found in the initial checks, so no folders to check
		} else {
		// Site templates 
        if (isset ($template['SITE'] )) {
			foreach ( $template['SITE'] as $key => $show ) {
				if (isset($exset[0]['name'])) { 
					$extarrkey = recursive_array_search($show['name'], $exset);
                    if ($extarrkey  !== False) {
					$extenabled = $exset[$extarrkey]['enabled'];
				} else { $extenabled = '' ;}
				} else { $extenabled = '' ;}
				switch ($extenabled) {
					case '1':
        				$frmextenabled = _FPA_Y_ICON;
					    break;
					case '0':
        				$frmextenabled = _FPA_N_ICON;
					    break;
					default:
        				$frmextenabled = _FPA_U_ICON;
				}

				if (isset($tmpldef[0]['template'])) { 
				    $extarrkey = recursive_array_search($show['name'], $tmpldef);
                    if ($extarrkey  !== False) {
				    $deftempl = $tmpldef[$extarrkey]['home'];    
				} else { $deftempl = '' ;}
				} else { $deftempl = '' ;}
				if ($deftempl == 1 ){                    
                    $frmextenabled = _FPA_A_ICON;
                    $frmclass = 'bg-success';
				} else {
				    $frmclass = '';
				}           

				echo '<tr class="' . $frmclass . '">';
				echo '<td class="lead text-center text-unknown">' . $frmextenabled . '</td>';
				echo '<td class="small text-truncate">' . $show['name'] . '</td>';
				echo '<td class="small text-center">' . $show['version'] . '</td>';
				echo '<td class="small text-center text-truncate hidden-xs">' . $show['author'] . '</td>';
				echo '<td class="small text-center text-truncate hidden-xs hidden-sm">' . $show['authorUrl'] . '</td>';
				echo '<td class="small text-center text-truncate hidden-xs">' . $show['creationDate'] . '</td>';
				echo '<td class="small text-center hidden-xs">' . $show['type'] . '</td>';
				echo '</tr>';                                
			}
        }
	}			
?>
 
                              </tbody>
                            </table>


<!-- HACK (RussW): TESTING export Table to CSV -->
<div class="text-right">
  <button class="hidden-print btn btn-default btn-xs" onclick="exportTableToCSV('site-templates-<?php echo date('dmY'); ?>.csv', 'site-templates-table')">
    .csv Export <span class="glyphicon glyphicon-export text-success"></span>
  </button>
</div>


                      </div><!--/.panel, item-->

                      <div class="panel panel-default item">

                        <table id="admin-templates-table" class="table table-condensed" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase"><?php echo _SECTION_EXT_HEADING_TPL .' :: '. _CAPTION_ADMIN; ?></caption>
                          <colgroup>
                            <col class="col-xs-1 col-sm-2 border-right">
                            <col class="col-xs-8 col-sm-3 bg-muted border-right">
                            <col class="border-right">
                            <col class="hidden-xs border-right">
                            <col class="hidden-xs hidden-sm border-right">
                            <col class="hidden-xs border-right">
                            <col class="hidden-xs">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <thead>
                            <tr class="">
                              <th class="text-center text-truncate"><?php echo _TABLE_COMMON_ENABLED; ?></th>
                              <th class=""><?php echo _TABLE_COMMON_NAME; ?></th>
                              <th class="text-center"><?php echo _FPA_VER; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_AUTHOR; ?></th>
                              <th class="text-center hidden-xs hidden-sm"><?php echo _TABLE_COMMON_ADDRESS; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_CREATED; ?></th>
                              <th class="text-center hidden-xs"><?php echo _TABLE_COMMON_TYPE; ?></th>
                            </tr>
                          </thead>
                              <tbody>

<?php
	
	if ( $instance['instanceFOUND'] == _FPA_N ) { // an instance wasn't found in the initial checks, so no folders to check
		} else {
		// Admin templates 
        if (isset ($template['ADMIN'] )) {
			foreach ( $template['ADMIN'] as $key => $show ) {
				if (isset($exset[0]['name'])) { 
					$extarrkey = recursive_array_search($show['name'], $exset);
                    if ($extarrkey  !== False) {
					$extenabled = $exset[$extarrkey]['enabled'];
				} else { $extenabled = '' ;}
				} else { $extenabled = '' ;}
				switch ($extenabled) {
					case '1':
        				$frmextenabled = _FPA_Y_ICON;
					    break;
					case '0':
        				$frmextenabled = _FPA_N_ICON;
					    break;
					default:
        				$frmextenabled = _FPA_U_ICON;
				}

				if (isset($tmpldef[0]['template'])) { 
				    $extarrkey = recursive_array_search($show['name'], $tmpldef);
                    if ($extarrkey  !== False) {
				    $deftempl = $tmpldef[$extarrkey]['home'];    
				} else { $deftempl = '' ;}   
				} else { $deftempl = '' ;}

				if ($deftempl == 1 ){                    
                    $frmextenabled = _FPA_A_ICON;
                    $frmclass = 'bg-success';
				} else {
                     $frmclass = '';
				}           
				echo '<tr class="' . $frmclass . '">';
				echo '<td class="lead text-center text-unknown">' . $frmextenabled . '</td>';
				echo '<td class="small text-truncate">' . $show['name'] . '</td>';
				echo '<td class="small text-center">' . $show['version'] . '</td>';
				echo '<td class="small text-center text-truncate hidden-xs">' . $show['author'] . '</td>';
				echo '<td class="small text-center text-truncate hidden-xs hidden-sm">' . $show['authorUrl'] . '</td>';
				echo '<td class="small text-center text-truncate hidden-xs">' . $show['creationDate'] . '</td>';
				echo '<td class="small text-center hidden-xs">' . $show['type'] . '</td>';
				echo '</tr>';                               
			}
        }
	}
?>
 
                              </tbody>
                            </table>


<!-- HACK (RussW): TESTING export Table to CSV -->
<div class="text-right">
  <button class="hidden-print btn btn-default btn-xs" onclick="exportTableToCSV('admin-templates-<?php echo date('dmY'); ?>.csv', 'admin-templates-table')">
    .csv Export <span class="glyphicon glyphicon-export text-success"></span>
  </button>
</div>


                      </div><!--/.panel, item-->

                    </div><!--/.content-item-->
                  </div><!--/.content-container-->


                </div><!--/.subsection-content-->

              </div><!--/#template-discovery-container-->
              <div class="line"></div>


            </section><!--/#extension-discovery-->






            <?php
              /* NOTE (RussW): Legends, Contributors, Copyright & Licensing
               * fpa legends, descriptions and copyright display
               *
               */
            ?>
            <div id="legend-section" class="container-fluid">

              <div class="row">

                <div class="col-xs-12 col-md-6">

                  <div class="panel panel-default tourStep17">
                    <div class="panel-heading"><?php echo _SECTION_LEGEND_HEADING; ?></div>

                    <table class="table">
                      <tbody>
                        <tr class="bg-info text-info">
                          <td class="text-center"><span class="label label-info"><?php echo _FPA_EXPLAIN_ICON; ?></span></td>
                          <td><span class="label label-info center-block"><?php echo _FPA_EXPLAIN_ICON; ?> <?php echo _FPA_EXPLAIN; ?></span></td>
                          <td class="1line-height-normal"><?php echo _SECTION_LEGEND_DESCRIBE_INFO; ?></td>
                        </tr>
                        <tr class="bg-success text-success">
                          <td class="text-center"><span class="label label-success"><?php echo _FPA_Y_ICON; ?></span></td>
                          <td><span class="label label-success center-block"><?php echo _FPA_Y_ICON; ?> <?php echo _FPA_SUCCESS; ?></span></td>
                          <td class="line-height-normal"><?php echo _SECTION_LEGEND_DESCRIBE_SUCCESS; ?></td>
                        </tr>
                        <tr class="bg-warning text-warning">
                          <td class="text-center"><span class="label label-warning"><?php echo _FPA_WARNING_ICON; ?></span></td>
                          <td><span class="label label-warning center-block"><?php echo _FPA_WARNING_ICON; ?> <?php echo _FPA_WARNING; ?></span></td>
                          <td class="line-height-normal"><?php echo _SECTION_LEGEND_DESCRIBE_WARNING; ?></td>
                        </tr>
                        <tr class="bg-danger text-danger">
                          <td class="text-center"><span class="label label-danger"><?php echo _FPA_WARNING_ICON; ?></span></td>
                          <td><span class="label label-danger center-block"><?php echo _FPA_WARNING_ICON; ?> <?php echo _FPA_ALERT; ?></span></td>
                          <td class="line-height-normal"><?php echo _SECTION_LEGEND_DESCRIBE_ALERT; ?></td>
                        </tr>
                        <tr class="text-primary">
                          <td class="text-center"><span class="label label-primary"><?php echo _FPA_U_ICON; ?></span></td>
                          <td><span class="label label-primary center-block"><?php echo _FPA_U_ICON; ?> <?php echo _FPA_U; ?></span></td>
                          <td class="line-height-normal"><?php echo _SECTION_LEGEND_DESCRIBE_UNKNOWN; ?></td>
                        </tr>
                        <tr class="bg-protected text-protected">
                          <td class="text-center"><span class="label label-protected"><?php echo _FPA_PROTECTED_ICON; ?></span></td>
                          <td><span class="label label-protected center-block"><?php echo _FPA_PROTECTED; ?></span></td>
                          <td class="line-height-normal"><?php echo _SECTION_LEGEND_DESCRIBE_PRIVACY; ?></td>
                        </tr>
                        <tr class="text-success">
                          <td class="text-center"><?php echo _FPA_A_ICON; ?></td>
                          <td><span class="label label-default"><?php echo _FPA_A_ICON; ?></span></td>
                          <td class="line-height-normal"><?php echo _SECTION_LEGEND_DESCRIBE_NOTE; ?></td>
                        </tr>
                      </tbody>
                    </table>

                  </div><!--/.panel-->

                </div><!--/left-column-->
                <div class="col-xs-12 col-md-6">


                  <div class="alert alert-danger margin-bottom-sm">

                    <?php
                      /* NOTE (RussW): Security Warning
                       *
                       */
                    ?>
                    <div class="row">
                      <div class="col-sm-12 col-md-8 text-center">
                        <h6 class="margin-remove-top text-uppercase"><?php echo _FPA_DELNOTE_LN1; ?></h6>
                        <p class="small line-height-normal text-justify"><?php echo _FPA_DELNOTE_LN2; ?> <?php echo _FPA_DELNOTE_LN3; ?></p>
                      </div>
                      <div class="col-sm-12 col-md-4 text-center hidden-print">

                        <a href="<?php echo _FPA_DELLINK; ?>" class="btn btn-danger btn-block margin-top-sm" role="button">
                          <i class="glyphicon glyphicon-remove-circle lead margin-remove"></i>
                          <div class="small"><?php echo _FPA_DELETE .' '. _RES_SHORT; ?></div>
                        </a>

                      </div>
                    </div><!--/security-notice-->

                  </div>
                  <div class="clearfix"></div>


                  <div class="padding-lg text-justify small bg-muted tourStepEnd">
                    <h6 class="margin-remove text-center"><?php echo _COPYRIGHT_HEADING; ?></h6>
                    <p class="text-muted"><?php echo _COPYRIGHT_STMT; ?></p>

                    <h6 class="margin-remove text-center"><?php echo _LICENSE_HEADING; ?></h6>
                    <p class="text-muted">
                      <?php echo _RES .' '. _FPA_VER_SHORT .''. _RES_VERSION .'.'. _RES_VERSION_MAINT .' '. _RES_RELEASE_BUILD .' '. _LICENSE_FOOTER; ?>
                    </p>

                  </div>

                </div><!--/right-column-->

                <div class="clearfix"></div>

                <div class="col-xs-12 clearfix margin-top-lg">

                  <?php
                    /* NOTE (RussW): GDPR & e-Privacy
                     * added GDPR & e-Privacy statement (RussW 05/05/2018)
                     *
                     */
                  ?>
                  <div id="gdpr-information" class="alert alert-info small">

                    <h5 class="margin-remove-top">
                      <button class="btn btn-info btn-xs pull-right clearfix hidden-print" type="button" data-toggle="collapse" data-target="#collapseGDPRExtended" aria-expanded="false" aria-controls="collapseGDPRExtended">
                        <i class="glyphicon glyphicon-info-sign"></i><span class="hidden-xs">&nbsp;<?php echo _FPA_EXPLAIN; ?></span>
                      </button>
                      <?php echo _FPA_EXPLAIN_ICON .' '. _GDPR_HEADING; ?>
                    </h5>

                    <?php echo _GDPR_MESSAGE; ?>

                    <div class="collapse clearfix margin-top-sm" id="collapseGDPRExtended">
                      <?php echo _GDPR_MESSAGE_MORE; ?>
                    </div>

                  </div>

                </div><!--/GDPR full-width-column-->

              </div><!--/.row-->



            </div><!--/#legends-section-->

            <p class="text-muted text-center margin-top-lg small">
              <?php echo _RES .' '. _FPA_VER_SHORT .''. _RES_VERSION .'.'. _RES_VERSION_MAINT .' [<span class="text-info">'. _RES_NAME .'</span>] '. _RES_RELEASE_BUILD; ?> 2011-<?php echo date('Y'); ?><sup>&copy;</sup>
            </p>
            <p class="text-muted text-center small border-top padding-top-sm" style="margin:0px 12%;">
              <em><?php echo _RES .' ('. _RES_SHORT .') '. _FPA_JOOMLA_DISCLAIMER; ?></em>
            </p>

                </div><!--/#content-->

            </div><!--/.page-->

        </div><!--/.wrapper-->



        <?php
        /* NOTE (@RussW): Footer - external links & notices
         * download links, delete fpa & copyright
         *
         */
        ?>
        <footer id="copyright" class="navbar-fixed-bottom bg-muted hidden-print tourStep10">
            <div class="container-fluid">
                <div class="btn-toolbar">

                    <div class="btn-group btn-group-xs text-success download-info hidden-xs">
                        <a href="<?php echo 'https://github.com/ForumPostAssistant/FPA/zipball/en-GB/'; ?>" tabindex="3" class="" role="button">
                            <i class="glyphicon glyphicon-download-alt"></i> <?php echo _RES_FPALATEST2; ?>
                        </a>
                    </div>

                    <div class="btn-group btn-group-xs text-success download-info hidden-xs">
                        <a href="<?php echo 'https://github.com/ForumPostAssistant/FPA/tarball/en-GB/'; ?>" tabindex="3" class="" role="button">
                            <i class="glyphicon glyphicon-download-alt"></i> <?php echo _RES_FPALATEST; ?>
                        </a>
                    </div>

                    <div class="btn-group btn-group-xs text-danger security-info">
                        <a tabindex="2" class="" role="button" data-toggle="popover" title="<span class='text-danger'><i class='glyphicon glyphicon-warning-sign'></i> <?php echo _FPA_DELNOTE_LN1; ?></span>" data-content="<span class='text-danger'><p><?php echo _FPA_DELNOTE_LN2; ?></p><p><?php echo _FPA_DELNOTE_LN3; ?></p></span>">
                            <i class="glyphicon glyphicon-warning-sign"></i> <?php echo _FPA_DELNOTE_LN1; ?>
                        </a>
                    </div>

                    <div class="btn-group btn-group-xs text-danger delete-fpa">
                        <a href="fpa-en.php?act=delete" tabindex="3" class="" role="button">
                            <i class="glyphicon glyphicon-remove-circle"></i> <?php echo _FPA_DELETE .' '. _RES_SHORT; ?>
                        </a>
                    </div>

                    <div class="btn-group btn-group-xs text-primary copyright">
                        <?php echo _RES .' ('. _FPA_VER_SHORT .''. _RES_VERSION .'.'. _RES_VERSION_MAINT .' '. _RES_RELEASE_BUILD; ?>) 2011-<?php echo date('Y'); ?><sup>&copy;</sup>
                    </div>

                </div>
            </div>
        </footer><!-- /#copyright footer -->


        <?php
        /* NOTE (@RussW): back-to-top link
         *
         */
        ?>
        <a id="back-to-top" class="btn btn-primary btn-sm back-to-top" role="button" href="#home-section">
            <span class="glyphicon glyphicon-chevron-up"></span>
        </a>


        <?php
        /* NOTE (@RussW): CDN JS Includes - required BS/jQuery
         * initialisation & configuration of js/jquery objects used in fpa
         *
         */
        ?>
        <!-- include jQuery from CDN -->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

        <!-- include Bootstrap from CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <!-- NOTE (@FPA): include "notify" from CDN, for pop-up alerts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.min.js" integrity="sha256-x9MuLegVJYbuND9ufn0Ji5PAoT0FKFt8S5PBPWyuROM=" crossorigin="anonymous"></script>

        <?php
        /* NOTE (RussW): Bootstrap CDN Link
         * only load if FPATour is clicked
         *
         */
        ?>
        <?php if ($runFPATour == '1'): ?>
          <!-- include Bootstrap Tour from CDN -->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.11.0/js/bootstrap-tour.min.js" integrity="sha256-AFoIN2Z5u5QDw8n9X0FoP/p1ZhE1xDnsgHlCMWE0yYQ=" crossorigin="anonymous"></script>
        <?php endif; ?>




        <?php
        /* NOTE (@RussW): Scripts - using offline?
         * if jQuery or Bootstrap is not loaded, assume we're offline and show a message
         *
         */
        ?>
        <script>
          if ( (typeof jQuery == 'undefined') || (typeof($.fn.popover) == 'undefined') ) {
            var d = document.getElementById('wrapper');
            var f = document.getElementById('copyright');
              d.className += " hidepage";
              f.className += " hidepage";

              document.write ('<h2 style="text-align:center;margin-top:10%;font-family:sans-serif,arial;"><?php echo _RES; ?><br /><?php echo _FPA_VER_SHORT .''. _RES_VERSION; ?></h2>');
              document.write ('<div class="border-all bg-muted padding-lg" style="font-family:sans-serif,arial;text-align:center;margin:25px 10vw;">');
              document.write ('<?php echo _FPA_OFFLINE; ?>');
              document.write ('<?php echo _FPA_OFFLINE_MESSAGE1; ?>');
              document.write ('<?php echo _FPA_OFFLINE_MESSAGE2; ?>');
              document.write ('</div>');
          };
        </script>





      <?php
        /* NOTE (RussW): SCRIPTS - Custom JS & jQuery
         * initialisation & configuration of js/jquery objects used in fpa
         *
         */
      ?>
      <script>
        $(document).ready(function () {


            <?php
            /** NOTE (RussW): SCRIPT - growl style messaging for version checks and instance not found error
             *
             */
            ?>
            <?php if ($fpaVersionCheckStatus != 'success'): ?>
            $('.top-right').notify({
                type: '<?php echo $fpaVersionCheckStatus; ?>',
                message: { html: '<h4 class="margin-remove"><?php echo _FPA_EXPLAIN_ICON .' '. _FPA_VER_CHECK_HEADING; ?></h4><?php echo $fpaVersionCheckMessage; ?>' },
                <?php if ($fpaVersionCheckStatus == 'warning'): ?>
                    fadeOut: { enabled: false }
                <?php else: ?>
                    fadeOut: { enabled: true, delay: 6000 }
                <?php endif; ?>
              }).show();
            <?php endif; ?>

            <?php if ($joomlaVersionCheckStatus != 'success'): ?>
            $('.top-right').notify({
                type: '<?php echo $joomlaVersionCheckStatus; ?>',
                message: { html: '<h4 class="margin-remove"><?php echo _FPA_EXPLAIN_ICON .' '. _J_VER_CHECK_HEADING; ?></h4><?php echo $joomlaVersionCheckMessage; ?>' },
                <?php if ($joomlaVersionCheckStatus == 'warning'): ?>
                    fadeOut: { enabled: false }
                <?php else: ?>
                    fadeOut: { enabled: true, delay: 6000 }
                <?php endif; ?>
              }).show();
            <?php endif; ?>


<?php
  /* HACK (RussW): TESTSCRIPT - change Runtime Options based on selected Pre-Defined Report
   *
   */
?>
/**
  $('#selectBasicReport').click(function() {
    $('#fpaReset').trigger('click');
    $('#someSwitchOptionSuccess1').attr('checked', true),
    $('#someSwitchOptionSuccess2').attr('checked', false),
    $('#someSwitchOptionSuccess3').attr('checked', false),
    $('#someSwitchOptionSuccess4').attr('checked', true),
    $('#someSwitchOptionSuccess5').attr('checked', false),
    $('#someSwitchOptionSuccess6').attr('checked', false),
    $('#someSwitchOptionSuccess7').attr('checked', false);
  });
**/
$('#selectDBReport').click(function() {
  $('#fpaReset').trigger('click');
  $('#someSwitchOptionSuccess1').attr('checked', false),
  $('#someSwitchOptionSuccess2').attr('checked', true),
  $('#someSwitchOptionSuccess3').attr('checked', false),
  $('#someSwitchOptionSuccess4').attr('checked', false),
  $('#someSwitchOptionSuccess5').attr('checked', false),
  $('#someSwitchOptionSuccess6').attr('checked', false),
  $('#someSwitchOptionSuccess7').attr('checked', false);
  $('#showProtectedDefault').trigger('click');
});

$('#selectFSReport').click(function() {
  $('#fpaReset').trigger('click');
  $('#someSwitchOptionSuccess1').attr('checked', true),
  $('#someSwitchOptionSuccess2').attr('checked', false),
  $('#someSwitchOptionSuccess3').attr('checked', false),
  $('#someSwitchOptionSuccess4').attr('checked', false),
  $('#someSwitchOptionSuccess5').attr('checked', false),
  $('#someSwitchOptionSuccess6').attr('checked', false),
  $('#someSwitchOptionSuccess7').attr('checked', false);
  $('#showProtectedDefault').trigger('click');
});

$('#selectEXReport').click(function() {
  $('#fpaReset').trigger('click');
  $('#someSwitchOptionSuccess1').attr('checked', false),
  $('#someSwitchOptionSuccess2').attr('checked', false),
  $('#someSwitchOptionSuccess3').attr('checked', true),
  $('#someSwitchOptionSuccess4').attr('checked', true),
  $('#someSwitchOptionSuccess5').attr('checked', true),
  $('#someSwitchOptionSuccess6').attr('checked', true),
  $('#someSwitchOptionSuccess7').attr('checked', false);
  $('#showProtectedDefault').trigger('click');
});

$('#selectVEReport').click(function() {
  $('#fpaReset').trigger('click');
  $('#someSwitchOptionSuccess1').attr('checked', false),
  $('#someSwitchOptionSuccess2').attr('checked', false),
  $('#someSwitchOptionSuccess3').attr('checked', true),
  $('#someSwitchOptionSuccess4').attr('checked', true),
  $('#someSwitchOptionSuccess5').attr('checked', true),
  $('#someSwitchOptionSuccess6').attr('checked', true),
  $('#someSwitchOptionSuccess7').attr('checked', false);
  $('#showProtectedDefault').trigger('click');
});

$('#fpaReset').click(function() {
  $('#someSwitchOptionSuccess1').attr('checked', false),
  $('#someSwitchOptionSuccess2').attr('checked', false),
  $('#someSwitchOptionSuccess3').attr('checked', false),
  $('#someSwitchOptionSuccess4').attr('checked', false),
  $('#someSwitchOptionSuccess5').attr('checked', false),
  $('#someSwitchOptionSuccess6').attr('checked', false),
  $('#someSwitchOptionSuccess7').attr('checked', false);
  $('#showProtectedDefault').trigger('click');
});




          <?php
            /* HACK (RussW): TESTSCRIPT - Temporary options on page load doIT/Generate button clicked
             *
             */
            ?>
          	<?php if ( @$_POST['doIT'] == '1' ): ?>
              $('#output-tab-panel').removeClass('disabled');
              $('#output-tab').tab('show');
            <?php else: ?>
              $('#output-tab-panel').addClass('disabled');
              $('#output-tab').click(function(event){return false;});
            <?php endif; ?>


          <?php
            /* HACK (RussW): TESTSCRIPT - new option to only show the FPA Report, not use the Post Generation options
             *
             */
            ?>
          	<?php if ( @$_POST['noPOST'] == '1' ): ?>
              $('#postDetails').addClass('hidden');
            <?php else: ?>
              $('#postDetails').removeClass('hidden');
            <?php endif; ?>



          <?php
            /* NOTE (RussW): SCRIPT - Sidebar Toggle Action
             *
             */
          ?>
          $('#sidebarCollapseButton').on('click', function () {
            $('#sidebar').toggleClass('active');
            $('.page .navbar').toggleClass('expand');
          });


          <?php
            /* NOTE (RussW): SCRIPT - SmoothScroll Simulatation/Animation With BS Sidebar/Scrollspy
             *
             */
          ?>
          $("#navbar-sidebar ul li a[href^='#']").on('click', function(e) {
            e.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
              scrollTop: $(hash).offset().top
              }, 500, function(){
              // window.location.hash = hash;
            });
          });


          <?php
            /* NOTE (RussW): SCRIPT - change toolbar privacy button on page load or privacy radio change
             *
             */
          ?>
          var i = $('input[name=showProtected]:checked').val();
            if (i == '1') {
//              $('#toolbarShowPrivacy').removeClass('btn-default');
//              $('#toolbarShowPrivacy').removeClass('btn-success');
//              $('#toolbarShowPrivacy').removeClass('btn-warning');
//              $('#toolbarShowPrivacy').addClass('btn-danger');
              $('#labelProtectedNone').removeClass('btn-default');
              $('#labelProtectedNone').addClass('btn-primary');
              $("#toolbarShowPrivacy").text('Privacy : None');

            } else if (i == '2') {
//              $('#toolbarShowPrivacy').removeClass('btn-default');
//              $('#toolbarShowPrivacy').removeClass('btn-success');
//              $('#toolbarShowPrivacy').removeClass('btn-danger');
//              $('#toolbarShowPrivacy').addClass('btn-warning');
              $('#labelProtectedDefault').removeClass('btn-default');
              $('#labelProtectedDefault').addClass('btn-primary');
              $("#toolbarShowPrivacy").text('Privacy : Partial');

            } else if (i == '3') {
//              $('#toolbarShowPrivacy').removeClass('btn-default');
//              $('#toolbarShowPrivacy').removeClass('btn-danger');
//              $('#toolbarShowPrivacy').removeClass('btn-warning');
//              $('#toolbarShowPrivacy').addClass('btn-success');
              $('#labelProtectedStrict').removeClass('btn-default');
              $('#labelProtectedStrict').addClass('btn-primary');
              $("#toolbarShowPrivacy").text('Privacy : Strict');

            }

          $('input[name=showProtected]:radio').click(function(ev) {
            if (ev.currentTarget.value == '1') {
//              $('#toolbarShowPrivacy').removeClass('btn-default');
//              $('#toolbarShowPrivacy').removeClass('btn-success');
//              $('#toolbarShowPrivacy').removeClass('btn-warning');
//              $('#toolbarShowPrivacy').addClass('btn-danger');
              $('#labelProtectedNone').removeClass('btn-default');
              $('#labelProtectedNone').addClass('btn-primary');
              $('#labelProtectedDefault').removeClass('btn-primary');
              $('#labelProtectedDefault').addClass('btn-default');
              $('#labelProtectedStrict').removeClass('btn-primary');
              $('#labelProtectedStrict').addClass('btn-default');
              $("#toolbarShowPrivacy").text('Privacy : None');

            } else if (ev.currentTarget.value == '2') {
//              $('#toolbarShowPrivacy').removeClass('btn-default');
//              $('#toolbarShowPrivacy').removeClass('btn-success');
//              $('#toolbarShowPrivacy').removeClass('btn-danger');
//              $('#toolbarShowPrivacy').addClass('btn-warning');
              $('#labelProtectedNone').removeClass('btn-primary');
              $('#labelProtectedNone').addClass('btn-default');
              $('#labelProtectedDefault').removeClass('btn-default');
              $('#labelProtectedDefault').addClass('btn-primary');
              $('#labelProtectedStrict').removeClass('btn-primary');
              $('#labelProtectedStrict').addClass('btn-default');

              $("#toolbarShowPrivacy").text('Privacy : Partial');

            } else if (ev.currentTarget.value == '3') {
//              $('#toolbarShowPrivacy').removeClass('btn-default');
//              $('#toolbarShowPrivacy').removeClass('btn-danger');
//              $('#toolbarShowPrivacy').removeClass('btn-warning');
//              $('#toolbarShowPrivacy').addClass('btn-success');
              $('#labelProtectedNone').removeClass('btn-primary');
              $('#labelProtectedNone').addClass('btn-default');
              $('#labelProtectedDefault').removeClass('btn-primary');
              $('#labelProtectedDefault').addClass('btn-default');
              $('#labelProtectedStrict').removeClass('btn-default');
              $('#labelProtectedStrict').addClass('btn-primary');

              $("#toolbarShowPrivacy").text('Privacy : Strict');

            }
          });


          <?php
            /* NOTE (RussW): SCRIPT - BS Popover Objects
             *
             */
          ?>
          $('.navbar-header [data-toggle="popover"]').popover({
            html: true,
            placement: "bottom",
            trigger: "hover focus",
            container: ".navbar-header"
          });

          $('footer [data-toggle="popover"]').popover({
            html: true,
            placement: "top",
            trigger: "hover focus",
            container: "footer"
          });


          <?php
            /* NOTE (RussW): SCRIPT - BS Tooltip Objects
             *
             */
          ?>
          $('[data-toggle="tooltip"]').tooltip({
            html: true,
            placement: "bottom",
            trigger: "hover focus"
          });


          <?php
            /* NOTE (RussW): SCRIPT - Count The #postOUTPUT textarea Contents (characters)
             *
             */
          ?>
          function count_it() {
              document.getElementById('counter').innerHTML = document.getElementById('postOUTPUT').value.length;
          }
          count_it();


          <?php
            /* NOTE (RussW): SCRIPT - Copy Button, #postOUTPUT textarea to clipboard
             *
             */
          ?>
          function copyToClipboard(text) {
            var textArea = document.createElement( "textarea" );
            textArea.value = text;
            document.body.appendChild( textArea );
            textArea.select();
            try {
              var successful = document.execCommand( 'copy' );
              var msg = successful ? 'successful' : 'unsuccessful';
              console.log('Copying text command was ' + msg);
            } catch (err) {
              console.log('Oops, unable to copy');
            }
            document.body.removeChild( textArea );
          }

          $('#btnCopyToClipboard').click( function() {
            var clipboardText = "";
              clipboardText = $('#postOUTPUT').val();
                copyToClipboard( clipboardText );
                alert( "Forum Post Content Copied To Clipboard. You Can Now Paste This In To Your Post" );
          });




          <?php
            /* NOTE (RussW): SCRIPT - Back-To-Top Object
             *
             */
          ?>
          $(window).scroll(function () {
            if ($(this).scrollTop() > 600) {
              $('#back-to-top').fadeIn();
            } else {
              $('#back-to-top').fadeOut();
            }
          });
          $('#back-to-top').click(function () {
            $('body,html').animate({
              scrollTop: 0
            }, 500);
            return false;
          });

        });



          <?php
            /* HACK (RussW): TESTSCRIPT - HTML Table Export to CSV
             *
             */
          ?>
function downloadCSV(csv, filename, tablename) {
    var csvFile;
    var downloadLink;

    // CSV file
    csvFile = new Blob([csv], {type: "text/csv"});

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;


    // Create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Hide download link
    downloadLink.style.display = "none";

    // Add the link to DOM
    document.body.appendChild(downloadLink);

    // Click download link
    downloadLink.click();
}


function exportTableToCSV(filename, tablename) {
    var csv = [];
    var rows = document.querySelectorAll("table#"+tablename+" tr");

    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll("td, th");

        for (var j = 0; j < cols.length; j++)
            row.push(cols[j].innerText);

        csv.push(row.join(","));
    }

    // Download CSV file
    downloadCSV(csv.join("\n"), filename);
}


        <?php
          /* NOTE (RussW): SCRIPT - Print Button (#content only)
           *
           */
        ?>
        function printFPA() {
          window.print();
        }
      </script>


      <?php
        /* NOTE (RussW): SCRIPT - Configure & Initialise The FPA Tour
         * only set if "tour = 1", to save a little memory and standard load time
         * configuration information at bootstraptour.com
         */
      ?>
      <?php if ($runFPATour == '1'): ?>
        <script>
          var tour = new Tour({                                                                                         // configure tour
            name:           'fpaTour',                                                                                  // generic name, if multiple tours, not really required, but keep changing if caching becomes an issue on edits, but with no local storage shouldn't happen
            template:       '<div class="popover tour">\
                               <div class="arrow"></div>\
                               <h3 class="popover-title"><i class="glyphicon glyphicon-blackboard"></i> </h3>\
                               <div class="popover-content"></div>\
                               <div class="panel-footer padding-remove">\
                                 <div class="popover-navigation">\
                                   <button class="btn btn-default btn-sm" data-role="prev">« Prev</button>\
                                   <button class="btn btn-default btn-sm" data-role="next">Next »</button>\
                                   <button class="btn btn-default btn-sm" data-role="end">End tour</button>\
                                 </div>\
                               </div>\
                             </div>\
                            ',                                                                                          // customise the template to better suit FPA
            smartPlacement: true,                                                                                       // trys to guess best popup placement, unless explicity stated in step
            storage:        false,                                                                                      // no state-save, forces the tour to run from start everytime and avoids EU/EC GDPR/Cookie/local data storage issues
            debug:          true,                                                                                       // shows status output in console
            animation:      true,                                                                                       // fade-in/out and smoothscroll
            onEnd:          function (tour) {
                              document.location.href = '<?php echo $_SERVER['PHP_SELF']; ?>';
                            },
            steps: [
            {
              // User Toolbar
              element:      '.tourStep00',
              title:        '<?php echo _TOUR_STEP00_TITLE; ?>',
              content:      '<?php echo _TOUR_STEP00_DESC; ?>',
              placement:    'auto bottom'
            },
            {
              // Sidebar Menu
              element:      '.tourStep05',
              title:        '<?php echo _TOUR_STEP05_TITLE; ?>',
              content:      '<?php echo _TOUR_STEP05_DESC; ?>',
              placement:    'auto right',
              autoscroll:   false
            },
            {
              // Information Footer
              element:      '.tourStep10',
              title:        '<?php echo _TOUR_STEP10_TITLE; ?>',
              content:      '<?php echo _TOUR_STEP10_DESC; ?>',
              placement:    'auto top'
            },
            {
              // Explain (Help) Buttons
              element:      '.tourExplainBasic',
              title:        '<?php echo _TOUR_STEP15_TITLE; ?>',
              content:      '<?php echo _TOUR_STEP15_DESC; ?>',
              placement:    'auto left',
              onShown:      function (tour) {
                              $('#collapseExplainBasic').toggleClass('in');
                            },
              onHide:       function (tour) {
                              $('#collapseExplainBasic').toggleClass('in');
                            }
            },
            {
              // section information - snapshot section
              element:      '.tourStep16',
              title:        '<?php echo _TOUR_STEP16_TITLE; ?>',
              content:      '<?php echo _TOUR_STEP16_DESC; ?>',
              placement:    'auto top',
            },
            {
              // legend & status information
              element:      '.tourStep17',
              title:        '<?php echo _TOUR_STEP17_TITLE; ?>',
              content:      '<?php echo _TOUR_STEP17_DESC; ?>',
              placement:    'auto top',
            },
            {
              // accordion - settings
              element:      '#default-tab',
              title:        '<?php echo _TOUR_STEP20_TITLE; ?>',
              content:      '<?php echo _TOUR_STEP20_DESC; ?>',
              onShown:      function (tour) {
                              $('#collapseOne').toggleClass('in');
                            }
            },
            {
              // accordion - settings : generate post
              element:      '#settings-tab',
              title:        '<?php echo _TOUR_STEP25_TITLE; ?>',
              content:      '<?php echo _TOUR_STEP25_DESC; ?>',
              placement:    'left',
              autoscroll:   true,
              onHide:       function (tour) {
                              $('#collapseOne').toggleClass('in');
                            }
            },
            {
              // accordion - post content
              element:      '#output-tab',
              title:        '<?php echo _TOUR_STEP30_TITLE; ?>',
              content:      '<?php echo _TOUR_STEP30_DESC; ?>',
              placement:    'left',
              onShown:      function (tour) {
                              $('#collapseTwo').toggleClass('in');
                            },
              onHide:       function (tour) {
                              $('#collapseTwo').toggleClass('in');
                            },
//              },
//              {
              // accordion - post content
//                element:      '#endTour',
//                title:        '<?php //echo _TOUR_END_TITLE; ?>',
//                content:      '<?php //echo _TOUR_END_DESC .''. _RES .' ('. _FPA_VER_SHORT .''. _RES_VERSION .'.'. _RES_VERSION_MAINT .'-'. _RES_RELEASE_BUILD .')'; ?> <sup>&copy;</sup>2011-<?php echo date('Y'); ?>',
//                backdrop:     true,
//                orphan:       true
            }
          ]});

          tour.init();                                                                                                  // initialize the tour
          tour.start();                                                                                                 // actually start the tour
        </script>
      <?php endif; ?>


    </body>
</html>