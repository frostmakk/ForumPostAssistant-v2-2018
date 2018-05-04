<?php
  /** TESTING ONLY - DELETE ME ****************************************/
//  error_reporting(0);
  //$disabled = 'disabled';
  /** TESTING ONLY - DELETE ME ****************************************/
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" vocab="http://schema.org/">
<?php
  /* NOTE (RussW): enable FPATour
   * setup & initialise the BS Tour objects
   */
  if (@$_GET['tour'] == '1'):
    $runFPATour = '1';
  else:
    $runFPATour = '';
  endif;

  /**
   **  @package Forum Post Assistant / Bug Report Assistant
   **  @version 2.0.0
   **  @last updated 22/04/2018
   **  @release Beta
   **  @date 24/06/2011
   **  @author RussW
   **  @author PhilD
   **
   **/


  /*
   * comment notation & change syntax
   * TYPE (Your-Preferred-Name): your comment content
   *
   * NOTE     - generic notation & information
   * TODO     - a todo notice or addition item
   * FIXME    - item requiring problem resolution
   * HACK     - work-around requiring later resolution
   * example  - NOTE (RussW): this is an example comment
   *
   * for edit changelog see https://github.com/ForumPostAssistant/FPA/pulls?q=is%3Apr+is%3Aclosed
   */


  /* TODO (ALL): VERSION CONTROL : FPA Versioning & Revisioning
   * remember to update revision information
   */
  define ( '_RES', 'Forum Post Assistant' );         // FPA resource long name
  define ( '_RES_SHORT', 'FPA' );                    // FPA resource short name
  define ( '_RES_VERSION', '2.0' );                  // major revision (x.y)
  define ( '_RES_VERSION_MAINT', '0' );              // maintenance/patch revision (.z)
  define ( '_RES_RELEASE_TYPE', 'BS' );              // framework type ( BS(Bootstrap), SA(Standalone) )
  define ( '_RES_RELEASE_BUILD', 'Alpha' );          // dev status revision ( A(lpha), B(eta), RC, F(inal) )
  define ( '_RES_LAST_UPDATED', '22/04/2018' );      // release date (dd/mm/yyyy)
  define ( '_RES_BRANCH', 'en-GB' );                 // Github branch location
  define ( '_RES_LANG', 'en-GB' );                   // Country/Language Code


  /* NOTE (FPA): PARENT FLAGS - Joomla!
   *
   */
  define ( '_VALID_MOS', 1 );                        // for J!1.0
  define ( '_JEXEC', 1 );                            // for J!1.5, J!1.6, J!1.7, J!2.5, J!3.0



  /* NOTE (FPA): LANGUAGE - FPA Specific Definitions & Constants
   *
   */
  define ( '_RES_FPALINK', 'https://github.com/ForumPostAssistant/FPA/tarball/en-GB/' ); // where to get the latest 'Final Releases'
  define ( '_RES_FPALATEST', 'Get the latest tar.gz release of the ' );
  define ( '_RES_FPALINK2', 'https://github.com/ForumPostAssistant/FPA/zipball/en-GB/' ); // where to get the latest 'Final Releases'
  define ( '_RES_FPALATEST2', 'Get the latest zip release of the ' );

  define ( '_COPYRIGHT_STMT', ' Copyright (C) 2011, 2012,2013,2014,2015,2016,2017,2018 Russell Winter, Phil DeGruy, Bernard Toplak, Claire Mandville,Sveinung Larsen &nbsp;' );

  define ( '_LICENSE_LINK', '<a href="http://www.gnu.org/licenses/" target="_blank">http://www.gnu.org/licenses/</a>' ); // link to GPL license

  define ( '_LICENSE_FOOTER', ' The FPA comes with ABSOLUTELY NO WARRANTY. &nbsp; This is free software,
  and covered under the GNU GPLv3 or later license. You are welcome to redistribute it under certain conditions.
  For details read the LICENSE.txt file included in the download package with this script.
  A copy of the license may also be obtained at ' );

  // remove script notice content - Phil 4-17-12
  define ( '_FPA_DELNOTE_LN1', '<h3><p /><font color="Red" size="2">** SECURITY NOTICE **</font color></size></h3><p /><font size="1">Due to the highly sensitive nature of the information displayed by the FPA script,<p /> it should be removed from the server immediately after use.</font>' );
  define ( '_FPA_DELNOTE_LN2', '<p /><font size="1">  If the script is left on the site, it can be used to gather enough information to hack your site.</font>' );
  define ( '_FPA_DELNOTE_LN3', '<p /><font color="Red" size="3" ;">After use, <a href="fpa-en.php?act=delete">Click Here</a>  to delete this script.</font>' );



  /* NOTE (FPA): LANGUAGE - Offline Definitions & Constants
   * assume user is offline/no-internet if jQuery cannot be loaded from the CDN
   * the page #wrapper element is hidden and only display the following message
   */
  define ( '_FPA_OFFLINE', '<h4>Unable To Load Bootstrap or jQuery</h4>' );
  define ( '_FPA_OFFLINE_MESSAGE', '<p><strong>Are you working offline or have no internet connection?</strong><br />\
                                    <p style="padding:0 5%;">From FPA v2.0, internet access is required for the FPA to function correctly due to the use of Bootstrap and jQuery. \
                                    If you think this may be an intermittent problem, try reloading FPA again, confirm that your web browser is not in offline-mode and that you have an active internet connection.</p>'
         );



  /* NOTE (FPA): LANGUAGE - Headings/Explain/Section Description Definitions & Constants
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

  define ( '_BASIC_HEADING', 'Basic Discovery' );
  define ( '_BASIC_EXPLAIN', 'Basic hosting environment tests are run and compared to the documented installation requirements and known good configurations or known software versions that can sometimes cause problems. This information provides a quick and simple view of the generic environmental details.' );
  define ( '_BASIC_DESCRIBE', 'The Basic Discovery section presents any initial diagnostic information that has been discovered about your hosting server, database, php environments and functions that may effect the smooth running of any installed Joomla! instance.' );
  define ( '_BASIC_HEADING_SNAPSHOT', 'Environment Snapshot' );
  define ( '_BASIC_DESCRIBE_SNAPSHOT', 'The snapshot provides an initial indication of how suitable your environment is for hosting Joomla!' );


  define ( '_EXPLAIN_APP', 'Explain application' );
  define ( '_DESCRIBE_APP', 'Describe application' );
  define ( '_DESCRIBE_APP_INSTANCE', 'Describe app instance' );
  define ( '_DESCRIBE_APP_DBCONFIG', 'Describe app database configuration' );
  define ( '_DESCRIBE_APP_DBSTRUCTURE', 'Describe app database structure' );
  define ( '_EXPLAIN_HOST', 'Explain hosting' );
  define ( '_DESCRIBE_HOST', 'Describe hosting' );
  define ( '_DESCRIBE_HOST_SERVER', 'Describe hosting server' );
  define ( '_EXPLAIN_PERMS', 'Explain permissions' );
  define ( '_DESCRIBE_PERMS', 'Describe permissions' );
  define ( '_DESCRIBE_PERMS_CORE', 'Describe core permissions' );
  define ( '_DESCRIBE_PERMS_ELEV', 'Describe elevated permissions' );
  define ( '_DESCRIBE_EXT', 'Describe extensions' );
  define ( '_DESCRIBE_EXT_COM', 'Describe components' );
  define ( '_DESCRIBE_EXT_MOD', 'Describe modules' );
  define ( '_DESCRIBE_EXT_PLU', 'Describe plugins' );
  define ( '_DESCRIBE_EXT_TPL', 'Describe templates' );
  define ( '_DESCRIBE_LEGEND_INFO', 'Information & Help Message/Status' );
  define ( '_DESCRIBE_LEGEND_SUCCESS', 'Positive & Successful Message/Status' );
  define ( '_DESCRIBE_LEGEND_WARNING', 'Highlighted & Warning Message/Status' );
  define ( '_DESCRIBE_LEGEND_ALERT', 'Negative Or Error Message/Status' );
  define ( '_DESCRIBE_LEGEND_PRIVACY', 'Privacy Settings Are Protecting Sensitive Data' );


  /* NOTE (FPA): LANGUAGE - Output Definitions & Constants
   * fpa output language strings
   *
   */


  if ($runFPATour == '1'):
  /* NOTE (FPA): LANGUAGE - FPA Tour Definitions & Constants
   *
   */
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
  endif;

  /* generic language constants */
  define ( '_FPA_VER', 'Version' );
  define ( '_FPA_VER_SHORT', 'v' ); // RussW : new v2.0.0
  define ( '_FPA_EXPLAIN', 'Explain' ); // RussW : new v2.0.0

  define ( '_FPA_Y', 'Yes' );
  define ( '_FPA_N', 'No' );
  define ( '_FPA_U', 'Unknown' );
  define ( '_FPA_Y_ICON', '<i class="glyphicon glyphicon-ok-sign"></i>' ); // RussW : (yes/good/positive) new v2.0.0
  define ( '_FPA_N_ICON', '<i class="glyphicon glyphicon-remove-sign"></i>' ); // RussW : (no/error/negative) new v2.0.0
  define ( '_FPA_U_ICON', '<i class="glyphicon glyphicon-question-sign"></i>' ); // RussW : (unknown) new v2.0.0
  define ( '_FPA_A_ICON', '<i class="glyphicon glyphicon-star"></i>' ); // RussW : (active/current/selected) new v2.0.0

  /* end fpa language definitions & constants */
?>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title><?php echo _RES .' : '. _FPA_VER_SHORT .''. _RES_VERSION .'.'. _RES_VERSION_MAINT .' ['. _RES_RELEASE_TYPE .'] '. _RES_RELEASE_BUILD .' '. _RES_LANG; ?></title>

        <?php
          // attempt to find and display a favicon
          $faviconPath = '';
          if (file_exists('./administrator/templates/bluestork/favicon.ico')):
            $faviconPath = './administrator/templates/bluestork/favicon.ico';
          elseif (file_exists('./administrator/templates/isis/favicon.ico')):
            $faviconPath = './administrator/templates/isis/favicon.ico';
          elseif (file_exists('./administrator/templates/atum/favicon.ico')):
            $faviconPath = './administrator/templates/atum/favicon.ico';
          endif;
        ?>
        <?php if ($faviconPath): ?>
          <link rel="shortcut icon" href="<?php echo $faviconPath; ?>" />
        <?php endif; ?>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <?php if ($runFPATour == '1'): ?>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.11.0/css/bootstrap-tour.min.css" integrity="sha256-r7R5NjcsiLK3ubv/Ee7yBl5n9zV+xoj1K6kzJ4E9jBU=" crossorigin="anonymous" />
        <?php endif; ?>

        <!-- TODO (RussW): include CSS and remove external file -->
        <link rel="stylesheet" href="fpa-style.css">
        <!-- NOTE (FPA): CSS - Custom Styling -->
        <style>

        </style>

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
          /* NOTE (RussW): SIDEBAR - Navigation
           * LG: 250px wide (fixed)
           * MD: 80px wide (collapsed, scrolling)
           * shortcut links to sections
           */
        ?>
        <nav id="sidebar" class="bg-primary hidden-print">
          <div id="navbar-sidebar" class="sidebar-affix">

            <div class="sidebar-header">
              <h4 class="text-center margin-remove-bottom">
                <?php
                  // attempt to find and display a joomla logo
                  $logoPath = '';
                  if (file_exists('./administrator/templates/bluestork/images/logo.png')):
                    $logoPath = './administrator/templates/bluestork/images/logo.png';
                    elseif (file_exists('./administrator/templates/isis/images/logo.png')):
                    $logoPath = './administrator/templates/isis/images/logo.png';
                    elseif (file_exists('./administrator/templates/atum/images/logo.svg')):
                    $logoPath = './administrator/templates/atum/images/logo.svg';
                    endif;
                ?>
                <?php if ($logoPath): ?>
                  <img src="<?php echo $logoPath; ?>" width="175" height="35" alt="<?php echo _RES; ?>" />
                <?php endif; ?>

                <?php echo _RES; ?>
              </h4>
              <strong style="border:2px solid #fff;padding:8px;border-radius:50%;width:58px;height:58px;line-height:1.8;">
                <?php echo _RES_SHORT; ?>
              </strong>

              <div class="text-center small">
                <?php echo _FPA_VER_SHORT .''. _RES_VERSION .'.'. _RES_VERSION_MAINT .' ['. _RES_RELEASE_TYPE .'] '. _RES_RELEASE_BUILD; ?>
              </div>

            </div><!--/.sidebar-header-->

            <ul class="nav nav-pills nav-stacked components tourStep05" >

              <li class="active">
                <a href="#fpa-home">
                  <i class="glyphicon glyphicon-home"></i>
                  Home
                </a>
              </li>

              <li>
                <a href="#basic-discovery-section">
                  <i class="glyphicon glyphicon-dashboard"></i>
                  Basic Discovery
                </a>
              </li>

              <li>
                <a href="#application-discovery-section">
                  <i class="glyphicon glyphicon-cog"></i>
                  Application Discovery
                </a>
              </li>

              <li>
                <a href="#host-discovery-section">
                  <i class="glyphicon glyphicon-equalizer"></i>
                  Hosting Discovery
                </a>
              </li>

              <li>
                <a href="#perms-discovery-section">
                  <i class="glyphicon glyphicon-list-alt"></i>
                  Permissions Discovery
                </a>
              </li>

              <li>
                <a href="#extension-discovery-section">
                  <i class="glyphicon glyphicon-th"></i>
                  Extension Discovery
                </a>
              </li>

              <li class="visible-sm visible-md visible-lg">
                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?tour=1">
                  <i class="glyphicon glyphicon-blackboard"></i>
                  FPA Tour
                </a>
              </li>

              <li>
                 <a href="fpa-en.php?act=delete" class="btn-danger">
                  <i class="glyphicon glyphicon-remove-circle"></i> Delete FPA
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


          <?php
            /* NOTE (RussW): TOOLBAR - Navigation & Notification
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
                    <a tabindex="2" class="btn btn-warning navbar-btn" role="button" data-toggle="popover" title="<span class='text-privacy'><i class='glyphicon glyphicon-warning-sign'></i> Information Privacy Setting</span>" data-content="<span class='text-privacy'>Due to the highly sensitive nature of the information displayed by the FPA script, please ensure that you have configured your desired &quot;<b>Information Privacy</b>&quot; level before sharing this information publicly or submiting your post to the Joomla! Forum.</span>">
                      Privacy : Partial
                    </a>
                  </div>

                  <div class="btn-group" role="group">
                    <a tabindex="2" class="btn btn-danger navbar-btn" role="button" data-toggle="popover" title="<span class='text-danger'><i class='glyphicon glyphicon-warning-sign'></i> Important Security Notice</span>" data-content="<span class='text-danger'>Due to the highly sensitive nature of the information displayed by the FPA script, <b>it should be removed from the server immediately after use</b>. If the script is left on the site, it can be used to gather enough information to illegally access, deface or hack your site.</span>">
                      <i class="glyphicon glyphicon-info-sign"></i>
                    </a>
                  </div>

                  <div class="btn-group" role="group">
                    <a href="fpa-en.php?act=delete" class="btn btn-danger navbar-btn" role="button">
                      <i class="glyphicon glyphicon-remove-circle"></i> Delete FPA
                    </a>
                  </div>

                </div><!--/.navbar-left-->

              </div><!--/.navbar-header-->


              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">
                  <li><a href="https://www.joomla.org/" target="_blank" class="btn btn-default btn-xs navbar-btn hidden-sm" role="button"><span class="text-primary"><i class="glyphicon glyphicon-home"></i> Joomla!</span></a></li>
                  <li><a href="https://forum.joomla.org/" target="_blank" class="btn btn-default btn-xs navbar-btn hidden-sm" role="button"><span class="text-primary"><i class="glyphicon glyphicon-comment"></i> Forum</span></a></li>
                  <li><a href="https://github.com/ForumPostAssistant/FPA/tree/en-GB/Documentation" target="_blank" class="btn btn-default btn-xs navbar-btn" role="button"><span class="text-primary"><i class="glyphicon glyphicon-book"></i> FPA Docs</span></a></li>
                  <li><a href="https://github.com/ForumPostAssistant/FPA/releases" target="_blank" class="btn btn-default btn-xs navbar-btn hidden-sm" role="button"><span class="text-primary"><i class="glyphicon glyphicon-download-alt"></i> Download</span></a></li>
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

              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                <div class="panel panel-default">

                  <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title tourStep20">
                      <button class="btn btn-info btn-xs pull-right clearfix" type="button" data-toggle="collapse" data-target="#collapseExplainSettings" aria-expanded="false" aria-controls="collapseExplainSettings">
                        <i class="glyphicon glyphicon-info-sign"></i><span class="hidden-xs">&nbsp;<?php echo _FPA_EXPLAIN; ?></span>
                      </button>
                      <a class="collapsed fpa-settings" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <?php echo _SETTINGS_HEADING ;?>
                      </a>
                    </h4>
                  </div>


                  <?php
                    /* NOTE (RussW): START -  FPA Settings Accordion
                     * settings & options form
                     *
                     */
                  ?>
                  <div id="collapseOne" class="panel-collapse collapse /*in*/" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">

                      <form method="post" name="postDetails" id="postDetails" class="form-horizontal">

                        <div class="row-fluid">

                          <div class="col-sm-12 col-lg-6">
                            <div class="1bg-muted" style="1min-height:350px;">

                                <fieldset id="runtimeOptions" class="padding-remove" <?php echo $disabled; ?>>

                                  <legend class="1margin-remove">Runtime Options:</legend>

                                  <div class="row">
                                    <div class="col-sm-12 col-md-12">


                                      <?php
                                        /* NOTE (RussW): START -  Optional Settings
                                         * custon checkbox material buttons
                                         */
                                      ?>
                                      <p class="small text-muted" style="1min-height:35px;">
                                        <i class="glyphicon glyphicon-info-sign"></i>&nbsp;
                                      <?php if ( !empty($disabled) ): ?>
                                        Options Are Disabled. Check the <span class="label label-warning">Snapshot Dashboard</span> for more information.
                                      <?php else: ?>
                                        Determine what information is included in your forum post, modify the default selections to suit your problem and privacy requirements.
                                      <?php endif; ?>
                                      </p>


                                      <ul class="list-group runtime-options">

                                        <li class="list-group-item">
                                          <div class="row-fluid padding-bottom-sm clearfix">
                                            <div class="col-xs-9 col-sm-9 text-truncate padding-remove text-left">
                                              Show Elevated Permissions
                                            </div>
                                            <div class="col-xs-3 col-sm-3 material-switch padding-remove text-right">
                                              <input id="someSwitchOptionSuccess1" name="someSwitchOption001" type="checkbox" checked />
                                              <label for="someSwitchOptionSuccess1" class="label-success text-left"></label>
                                            </div>
                                          </div>
                                        </li>

                                        <li class="list-group-item">
                                          <div class="row-fluid padding-bottom-sm padding-top-sm clearfix">
                                            <div class="col-xs-9 col-sm-9 text-truncate padding-remove text-left">
                                              Show dataBase Statistics
                                            </div>
                                            <div class="col-xs-3 col-sm-3 material-switch padding-remove text-right">
                                              <input id="someSwitchOptionSuccess2" name="someSwitchOption002" type="checkbox" />
                                              <label for="someSwitchOptionSuccess2" class="label-success text-left"></label>
                                            </div>
                                          </div>
                                        </li>

                                        <li class="list-group-item">
                                          <div class="row-fluid padding-bottom-sm padding-top-sm clearfix">
                                            <div class="col-xs-9 col-sm-9 text-truncate padding-remove text-left">
                                              Show Components
                                            </div>
                                            <div class="col-xs-3 col-sm-3 material-switch padding-remove text-right">
                                              <input id="someSwitchOptionSuccess3" name="someSwitchOption003" type="checkbox" checked />
                                              <label for="someSwitchOptionSuccess3" class="label-success text-left"></label>
                                            </div>
                                          </div>
                                        </li>

                                        <li class="list-group-item">
                                          <div class="row-fluid padding-bottom-sm padding-top-sm clearfix">
                                            <div class="col-xs-9 col-sm-9 text-truncate padding-remove text-left">
                                              Show Modules
                                            </div>
                                            <div class="col-xs-3 col-sm-3 material-switch padding-remove text-right">
                                              <input id="someSwitchOptionSuccess4" name="someSwitchOption004" type="checkbox" />
                                              <label for="someSwitchOptionSuccess4" class="label-success text-left"></label>
                                            </div>
                                          </div>
                                        </li>

                                        <li class="list-group-item">
                                          <div class="row-fluid padding-bottom-sm padding-top-sm clearfix">
                                            <div class="col-xs-9 col-sm-9 text-truncate padding-remove text-left">
                                              Show Plugins
                                            </div>
                                            <div class="col-xs-3 col-sm-3 material-switch padding-remove text-right">
                                              <input id="someSwitchOptionSuccess5" name="someSwitchOption005" type="checkbox" />
                                              <label for="someSwitchOptionSuccess5" class="label-success text-left"></label>
                                            </div>
                                          </div>
                                        </li>

                                        <li class="list-group-item">
                                          <div class="row-fluid padding-bottom-sm padding-top-sm clearfix">
                                            <div class="col-xs-9 col-sm-9 text-truncate padding-remove text-left text-muted">
                                              <em> - Include Core Extensions?</em>
                                            </div>
                                            <div class="col-xs-3 col-sm-3 material-switch padding-remove text-right">
                                              <input id="someSwitchOptionSuccess6" name="someSwitchOption006" type="checkbox" />
                                              <label for="someSwitchOptionSuccess6" class="label-success text-left"></label>
                                            </div>
                                          </div>
                                        </li>

                                      </ul>

                                    </div>

                                  </div><!--/.row-->

                                </fieldset>

                              </div>

                            </div>
                            <div class="col-sm-12 col-lg-6">

                              <div class="1bg-muted" style="1min-height:350px;">

                                <fieldset id="optionalInformation" class="padding-remove" <?php echo $disabled; ?>>
                                  <legend class="1margin-remove">Optional Information:</legend>

                                    <?php
                                      /* NOTE (RussW): START -  Optional Information
                                       *
                                       */
                                    ?>
                                    <p class="small text-muted" style="1min-height:35px;">
                                      <i class="glyphicon glyphicon-info-sign"></i>&nbsp;
                                    <?php if ( !empty($disabled) ): ?>
                                      Options Are Disabled. Check the <span class="label label-warning">Snapshot Dashboard</span> for more information.
                                    <?php else: ?>
                                      To assist with troubleshooting, you may also add additional (optional) trouble-shooting information to your forum post if desired. <em>Leave empty to ignore</em>.
                                    <?php endif; ?>
                                    </p>

                                    <ul class="list-group">

                                      <li class="list-group-item padding-sm">
                                        <div class="form-group margin-remove">
                                          <label for="probDSC" class="col-sm-5 control-label">Problem Description</label>
                                          <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" id="probDSC" name="probDSC" placeholder="Problem Description">
                                          </div>
                                        </div>
                                      </li>

                                      <li class="list-group-item padding-sm">
                                        <div class="form-group margin-remove">
                                          <label for="probMSG1" class="col-sm-5 control-label">Log/Error Message</label>
                                          <div class="col-sm-7">
                                            <input type="text" class="form-control input-sm" id="probMSG1" name="probMSG1" placeholder="Log/Error Message" />
                                          </div>
                                        </div>
                                      </li>

                                      <li class="list-group-item padding-sm">
                                        <div class="form-group has-error margin-remove">
                                          <label for="probMSG2" class="col-sm-5 control-label">Last Reported Error</label>
                                          <div class="col-sm-7">
                                          <?php if ( isset($phpenv['phpLASTERR']) ): ?>
                                            <input type="text" class="form-control input-sm text-danger" id="probMSG2" name="probMSG2" value="<?php echo $phpenv['phpLASTERR']; ?>" placeholder="Last Reported Error" aria-describedby="lastErrorHelp" />
                                            <span id="lastErrorHelp" class="help-block line-height-normal small"><i class="glyphicon glyphicon-info-sign"></i> auto-completed from your php error log</span>
                                          <?php else: ?>
                                            <input type="text" class="form-control input-sm" id="probMSG2" name="probMSG2" placeholder="Last Reported Error" />
                                          <?php endif; ?>
                                          </div>
                                        </div>
                                      </li>

                                      <li class="list-group-item padding-sm">
                                        <div class="form-group margin-remove">
                                          <label for="probACT" class="col-sm-5 control-label">Actions Taken To Resolve?</label>
                                          <div class="col-sm-7">
                                            <textarea class="form-control input-sm" id="probACT" name="probACT" rows="2" placeholder="Action Taken To Resolve?"></textarea>
                                          </div>
                                        </div>
                                      </li>

                                    </ul>

                                </fieldset>

                              </div>


                              <?php
                                /* NOTE (RussW): START -  Information Privacy/Protection
                                 * custon radio buttons
                                 */
                              ?>
                              <div class="text-center">

                                <h5>Information Privacy Settings</h5>

                                <div class="btn-group btn-group-radio information-privacy-options">

                                  <input type="radio" name="showProtected" id="showProtectedNone" class="radio-button" value="1" />
                                  <label class="btn btn-danger col-xs-12 col-sm-4" for="showProtectedNone">None</label>

                                  <input type="radio" name="showProtected" id="showProtectedDefault" class="radio-button" value="2" checked />
                                  <label class="btn btn-warning col-xs-12 col-sm-4" for="showProtectedDefault">Partial</label>

                                  <input type="radio" name="showProtected" id="showProtectedStrict" class="radio-button" value="3" />
                                  <label class="btn btn-success col-xs-12 col-sm-4" for="showProtectedStrict">Strict</label>

                                </div><!--/.information-privacy-options-->

                                <p class="small text-muted margin-top-sm margin-remove-bottom">
                                  <i class="glyphicon glyphicon-info-sign"></i>&nbsp;
                                <?php if ( !empty($disabled) ): ?>
                                  Options Are Disabled. Check the <span class="label label-warning">Snapshot Dashboard</span> for more information.
                                <?php else: ?>
                                  Select how much site identifiable information FPA will collect and display (Partial = Default)
                                <?php endif; ?>
                                </p>

                              </div>

                            </div>
                            <div class="col-sm-12 col-md-12">

                              <br />
                              <div class="">

                                <fieldset class="padding-remove">
                                  <legend>Generate Post Content</legend>
                                  <input type="hidden" name="doIT" value="1" />

                                  <div class="row">

                                    <div class="col-sm-12 col-md-6">

                                      <div class="bg-muted padding-lg">
                                        <h4>To Continue:</h4>
                                        After selecting your preferred runtime options and information privacy level, click the <strong>Generate Post Content!</strong> button to re-run FPA and build your post content.
                                      </div>

                                    </div>
                                    <div class="col-sm-12 col-md-6 text-center">

                                      <div class="row">

                                        <div class="col-xs-12 col-md-9 btn-group" role="group">
                                          <input type="submit" class="btn btn-success btn-block btn-lg" name="submit" value="Generate Post Content!" />
                                          <div class="clearfix"></div>

                                          <div class="checkbox">
                                            <label>
                                              <input type="checkbox" name="increasePOPS" value="1" aria-describedby="increasePOPSHelp">
                                              PHP "Out of Memory" or "Execution Time-Outs" errors?
                                              <span id="increasePOPSHelp" class="help-block line-height-normal small"><i class="glyphicon glyphicon-info-sign"></i> temporarily increase PHP memory and execution time</span>
                                            </label>
                                          </div><!--/.checkbox-->

                                        </div>
                                        <div class="col-xs-12 col-md-3 btn-group" role="group">

                                          <input type="reset" class="btn btn-default btn-block" name="reset" value="reset" />

                                        </div>

                                      </div>

                                    </div>

                                  </div><!--/.row-fluid-->

                                </fieldset>

                              </div>
                            </div>

                          </div><!--/.row-->

                        </form>

                      </div><!--/.panel-body-->
                    </div><!--/#collapseOne-->


                    <div class="collapse container-fluid clearfix" id="collapseExplainSettings">
                      <br />
                      <div class="alert alert-info" role="alert">
                        <h4><i class="glyphicon glyphicon-info-sign"></i> <?php echo _SETTINGS_HEADING ;?></h4>

                        <?php echo _SETTINGS_EXPLAIN ;?>

                      </div>
                    </div>

                  </div>



                  <?php
                    /* NOTE (RussW): START -  FPA Post Content Accordion
                     * post content output
                     *
                     */
                  ?>
                  <div class="panel panel-default">

                    <div class="panel-heading" role="tab" id="headingTwo">
                      <h4 class="panel-title tourStep30">
                        <button class="btn btn-info btn-xs pull-right clearfix" type="button" data-toggle="collapse" data-target="#collapseExplainPostContent" aria-expanded="false" aria-controls="collapseExplainPostContent">
                          <i class="glyphicon glyphicon-info-sign"></i><span class="hidden-xs">&nbsp;<?php echo _FPA_EXPLAIN; ?></span>
                        </button>
                        <a class="collapsed fpa-output" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          <?php echo _POST_HEADING; ?>
                        </a>
                      </h4>
                    </div>


                    <div id="collapseTwo" class="panel-collapse collapse /*in*/" role="tabpanel" aria-labelledby="headingTwo">
                      <div class="panel-body">


                        <textarea class="form-control" rows="15" name="postOUTPUT" id="postOUTPUT" placeholder="Forum Post Content">
                        dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only<br />dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only

                        dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only<br />dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only

                        dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only<br />dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only
                        </textarea>

                        <button id="btnCopyToClipboard" class="btn btn-warning btn-block"><i class="glyphicon glyphicon-copy"></i> Copy Post Content To Clipboard</button>


                        <p class="small text-muted margin-top-sm margin-remove-bottom">
                          <i class="glyphicon glyphicon-info-sign"></i>&nbsp;
                          In the event that the "Copy Post Content To Clipboard" button does not work, <strong>click inside the yellow textarea</strong>, then <strong>press CTRL-a (or Command-a)</strong> to select all the textarea content, <strong>press CTRL-c (Command-c)</strong> to copy the content and then use <strong>CRTL-v (Command-v)</strong> to paste the copied content in to your forum post.
                        </p>


                        <!-- TODO (RussW): determine how to split the content in to two textarea's if exceeds 20k characters-->
                        <br />
                        <div class="alert alert-danger">
                        Post Length: <span id="counter" class="badge"></span>
                        <br /><i>TODO: now we know the content length, we need to figure out a way of dynamically splitting large posts(over 20k) in to two textarea's</i>
                        </div>

                      </div>
                    </div>


                    <div class="collapse container-fluid clearfix" id="collapseExplainPostContent">
                      <br />
                      <div class="alert alert-info" role="alert">
                        <h4><i class="glyphicon glyphicon-info-sign"></i> <?php echo _POST_HEADING; ?></h4>
                        <?php echo _POST_EXPLAIN; ?>
                      </div>
                    </div>


                  </div>

                </div><!--/#accordion-->

              </div><!--/.container-fluid-->
            </div><!--/@settings-section-->






          <?php
            /* NOTE (RussW): START - Content Container
             * XS/SM/MD/LG: page full-width
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
                  <i class="glyphicon glyphicon-dashboard"></i> <?php echo _BASIC_HEADING; ?>
                </h2>

                <p class="lead">
                  <?php echo _BASIC_DESCRIBE; ?>
                </p>

                <div class="collapse clearfix" id="collapseExplainBasic">
                  <div class="alert alert-info" role="alert">
                    <h4><i class="glyphicon glyphicon-info-sign"></i> <?php echo _BASIC_HEADING; ?></h4>
                    <p><?php echo _BASIC_EXPLAIN; ?></p>
                  </div>
                </div><!--/#collapseExplainBasic-->

              </div><!--/.page-header-->


              <?php
                /* NOTE (RussW): SUB-SECTION - Environment Discovery
                 * basic environment information
                 *
                 */
              ?>
              <div id="basic-discovery-container" class="row">

                <div class="col-xs-12 col-md-3 col-lg-3 subsection-heading">
                  <h3 class="margin-remove text-muted"><?php echo _BASIC_HEADING_SNAPSHOT; ?></h3>
                  <p class="text-muted"><?php echo _BASIC_DESCRIBE_SNAPSHOT; ?></p>


                  <?php
                    /* TODO (RussW): HEALTH PROGRESS-BAR - decide if a progress bar is useful here
                     *
                     */
                  ?>
                  <?php
                     $snapshotIndicator                  = '82';  // testing health value
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

                      <div class="panel panel-default item" style="min-height:153px;">

                        <table class="table table-condensed table-bordered" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase">PHP</caption>
                          <colgroup>
                            <col class="col-xs-7">
                            <col>
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <tbody>
                            <tr>
                              <td class="small text-truncate">PHP Version</td>
                              <td class="small text-center"><strong><?php echo _FPA_VER_SHORT; ?>5.6.30</strong></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">PHP API</td>
                              <td class="small text-center">CGI-FCGI</td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">MySQL Support dfdsfds hfghgfhfd</td>
                              <td class="text-center text-success"><?php echo _FPA_Y_ICON; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">MySQLi Support</td>
                              <td class="text-center text-warning"><?php echo _FPA_N_ICON; ?></td>
                            </tr>
                          </tbody>
                        </table>

                      </div><!--/.panel, item-->

                    </div><!--/.content-item-->
                    <div class="col-xs-12 col-md-4 content-item">

                      <div class="panel panel-default item" style="min-height:153px;">

                        <table class="table table-condensed table-bordered" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase">DATABASE</caption>
                          <colgroup>
                            <col class="col-xs-7">
                            <col>
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <tbody>
                            <tr>
                              <td class="small text-truncate">PHP Version</td>
                              <td class="small text-center"><strong><?php echo _FPA_VER_SHORT; ?>5.6.30</strong></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">PHP API</td>
                              <td class="small text-center">CGI-FCGI</td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">MySQL Support dgdfg gdgdf gfdsgs</td>
                              <td class="text-center text-success"><?php echo _FPA_Y_ICON; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">MySQLi Support</td>
                              <td class="text-center text-warning"><?php echo _FPA_N_ICON; ?></td>
                            </tr>
                          </tbody>
                        </table>

                      </div><!--/.panel, item-->

                    </div><!--/.content-item-->
                    <div class="col-xs-12 col-md-4 content-item">

                      <div class="panel panel-default item" style="min-height:153px;">

                        <table class="table table-condensed table-bordered" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase">DATABASE</caption>
                          <colgroup>
                            <col class="col-xs-7">
                            <col>
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <tbody>
                            <tr>
                              <td class="small text-truncate">PHP Version</td>
                              <td class="small text-center"><strong><?php echo _FPA_VER_SHORT; ?>5.6.30</strong></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">PHP API</td>
                              <td class="small text-center">CGI-FCGI</td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">MySQL Support</td>
                              <td class="text-center text-success"><?php echo _FPA_Y_ICON; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">MySQLi Support</td>
                              <td class="text-center text-warning"><?php echo _FPA_N_ICON; ?></td>
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
                  <i class="glyphicon glyphicon-cog"></i> Application Discovery
                </h2>

                <p class="lead">
                  The FPA Application Discovery Section presents any basic information that FPA has managed to discover about your hosting server, database & php environments, installed functions and any discovered Joomla! instance.
                </p>

                <div class="collapse clearfix" id="collapseExplainApplication">
                  <div class="alert alert-info" role="alert">
                    <h4><i class="glyphicon glyphicon-info-sign"></i> Application Discovery Dashboard</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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

                  <h3 class="margin-remove text-muted">Installed Instance</h3>
                  <p class="text-muted">this is some basic information about whats happening. this is always included in the forum post output.</p>

                </div><!--/.subsection-heading-->
                <div class="col-xs-12 col-md-9 col-lg-9 subsection-content">


                  <div class="row content-container">
                    <div class="col-xs-12 col-md-12 content-item">

                      <?php
                        /* DONE (FPA): CHANGES - Installed Instance
                         * removed - database version & characterset, available elsewhere (RussW 02/05/2018)
                         *
                         */
                      ?>

<div class="row clearfix">
  <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">

    <div class="panel panel-default item" style="min-height:111px;">

      <table class="table table-condensed table-bordered" style="table-layout:fixed;">
        <caption class="text-center text-uppercase">CMS</caption>
        <colgroup>
          <col class="col-xs-12">
        </colgroup><!--/required to fix column sizing & employ text-truncate-->
        <tbody>
          <tr>
            <td class="small text-center"><strong>v3.8.7</strong></td>
          </tr>
          <tr>
            <td class="small text-center bg-success text-success">Stable</td>
          </tr>
        </tbody>
      </table>

    </div><!--/.panel, .item-->

  </div>
  <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">

    <div class="panel panel-default item" style="min-height:118px;">

      <table class="table table-condensed table-bordered" style="table-layout:fixed;">
        <caption class="text-center text-uppercase">PLATFORM</caption>
        <colgroup>
          <col class="col-xs-12">
        </colgroup><!--/required to fix column sizing & employ text-truncate-->
        <tbody>
          <tr>
            <td class="small text-center"><strong>v13.1.0</strong></td>
          </tr>
          <tr>
            <td class="small text-center bg-success text-success col-xs-4">Stable</td>
          </tr>
        </tbody>
      </table>

    </div><!--/.panel, .item-->

  </div>
  <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">

    <div class="panel panel-default item" style="min-height:118px;">

      <table class="table table-condensed table-bordered" style="table-layout:fixed;">
        <caption class="text-center text-uppercase">CONFIG</caption>
        <colgroup>
          <col class="col-xs-7">
          <col>
        </colgroup><!--/required to fix column sizing & employ text-truncate-->
        <tbody>
          <tr>
            <td class="small text-truncate">enabledfg gfdgdfg bghfgh</td>
            <td class="small text-center">Y</td>
          </tr>
          <tr class="border-top">
            <td class="small text-truncate">Suffix</td>
            <td class="small text-center">N</td>
          </tr>
          <tr>
            <td class="small text-truncate">ReWrite</td>
            <td class="small text-center">Y</td>
          </tr>
        </tbody>
      </table>

    </div><!--/.panel, .item-->

  </div>
  <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">

    <div class="panel panel-default item" style="min-height:118px;">

      <table class="table table-condensed table-bordered" style="table-layout:fixed;">
        <caption class="text-center text-uppercase">CONFIG</caption>
        <colgroup>
          <col class="col-xs-7">
          <col>
        </colgroup><!--/required to fix column sizing & employ text-truncate-->
        <tbody>
          <tr>
            <td class="small text-truncate">enabledfg gfdgdfg bghfgh</td>
            <td class="small text-center">Y</td>
          </tr>
          <tr class="border-top">
            <td class="small text-truncate">Suffix</td>
            <td class="small text-center">N</td>
          </tr>
          <tr>
            <td class="small text-truncate">ReWrite</td>
            <td class="small text-center">Y</td>
          </tr>
        </tbody>
      </table>

    </div><!--/.panel, .item-->

  </div>
  <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">

    <div class="panel panel-default item" style="min-height:118px;">

      <table class="table table-condensed table-bordered" style="table-layout:fixed;">
        <caption class="text-center text-uppercase">CONFIG</caption>
        <colgroup>
          <col class="col-xs-7">
          <col>
        </colgroup><!--/required to fix column sizing & employ text-truncate-->
        <tbody>
          <tr>
            <td class="small text-truncate">enabledfg gfdgdfg bghfgh</td>
            <td class="small text-center">Y</td>
          </tr>
          <tr class="border-top">
            <td class="small text-truncate">Suffix</td>
            <td class="small text-center">N</td>
          </tr>
          <tr>
            <td class="small text-truncate">ReWrite</td>
            <td class="small text-center">Y</td>
          </tr>
        </tbody>
      </table>

    </div><!--/.panel, .item-->

  </div>
  <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">

    <div class="panel panel-default item" style="min-height:118px;">

      <table class="table table-condensed table-bordered" style="table-layout:fixed;">
        <caption class="text-center text-uppercase">CONFIG</caption>
        <colgroup>
          <col class="col-xs-7">
          <col>
        </colgroup><!--/required to fix column sizing & employ text-truncate-->
        <tbody>
          <tr>
            <td class="small text-truncate">enabledfg gfdgdfg bghfgh</td>
            <td class="small text-center">Y</td>
          </tr>
          <tr class="border-top">
            <td class="small text-truncate">Suffix</td>
            <td class="small text-center">N</td>
          </tr>
          <tr>
            <td class="small text-truncate">ReWrite</td>
            <td class="small text-center">Y</td>
          </tr>
        </tbody>
      </table>

    </div><!--/.panel, .item-->

  </div>
  <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">

    <div class="panel panel-default item" style="min-height:118px;">

      <table class="table table-condensed table-bordered" style="table-layout:fixed;">
        <caption class="text-center text-uppercase">CONFIG</caption>
        <colgroup>
          <col class="col-xs-7">
          <col>
        </colgroup><!--/required to fix column sizing & employ text-truncate-->
        <tbody>
          <tr>
            <td class="small text-truncate">enabledfg gfdgdfg bghfgh</td>
            <td class="small text-center">Y</td>
          </tr>
          <tr class="border-top">
            <td class="small text-truncate">Suffix</td>
            <td class="small text-center">N</td>
          </tr>
          <tr>
            <td class="small text-truncate">ReWrite</td>
            <td class="small text-center">Y</td>
          </tr>
        </tbody>
      </table>

    </div><!--/.panel, .item-->

  </div>
  <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">

    <div class="panel panel-default item" style="min-height:118px;">

      <table class="table table-condensed table-bordered" style="table-layout:fixed;">
        <caption class="text-center text-uppercase">CONFIG</caption>
        <colgroup>
          <col class="col-xs-7">
          <col>
        </colgroup><!--/required to fix column sizing & employ text-truncate-->
        <tbody>
          <tr>
            <td class="small text-truncate">enabledfg gfdgdfg bghfgh</td>
            <td class="small text-center">Y</td>
          </tr>
          <tr class="border-top">
            <td class="small text-truncate">Suffix</td>
            <td class="small text-center">N</td>
          </tr>
          <tr>
            <td class="small text-truncate">ReWrite</td>
            <td class="small text-center">Y</td>
          </tr>
        </tbody>
      </table>

    </div><!--/.panel, .item-->

  </div>
  <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">

    <div class="panel panel-default item" style="min-height:118px;">

      <table class="table table-condensed table-bordered" style="table-layout:fixed;">
        <caption class="text-center text-uppercase">CONFIG</caption>
        <colgroup>
          <col class="col-xs-7">
          <col>
        </colgroup><!--/required to fix column sizing & employ text-truncate-->
        <tbody>
          <tr>
            <td class="small text-truncate">enabledfg gfdgdfg bghfgh</td>
            <td class="small text-center">Y</td>
          </tr>
          <tr class="border-top">
            <td class="small text-truncate">Suffix</td>
            <td class="small text-center">N</td>
          </tr>
          <tr>
            <td class="small text-truncate">ReWrite</td>
            <td class="small text-center">Y</td>
          </tr>
        </tbody>
      </table>

    </div><!--/.panel, .item-->

  </div>
  <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">

    <div class="panel panel-default item" style="min-height:118px;">

      <table class="table table-condensed table-bordered" style="table-layout:fixed;">
        <caption class="text-center text-uppercase">CONFIG</caption>
        <colgroup>
          <col class="col-xs-7">
          <col>
        </colgroup><!--/required to fix column sizing & employ text-truncate-->
        <tbody>
          <tr>
            <td class="small text-truncate">enabledfg gfdgdfg bghfgh</td>
            <td class="small text-center">Y</td>
          </tr>
          <tr class="border-top">
            <td class="small text-truncate">Suffix</td>
            <td class="small text-center">N</td>
          </tr>
          <tr>
            <td class="small text-truncate">ReWrite</td>
            <td class="small text-center">Y</td>
          </tr>
        </tbody>
      </table>

    </div><!--/.panel, .item-->

  </div>
  <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">

    <div class="panel panel-default item" style="min-height:118px;">

      <table class="table table-condensed table-bordered" style="table-layout:fixed;">
        <caption class="text-center text-uppercase">CONFIG</caption>
        <colgroup>
          <col class="col-xs-7">
          <col>
        </colgroup><!--/required to fix column sizing & employ text-truncate-->
        <tbody>
          <tr>
            <td class="small text-truncate">enabledfg gfdgdfg bghfgh</td>
            <td class="small text-center">Y</td>
          </tr>
          <tr class="border-top">
            <td class="small text-truncate">Suffix</td>
            <td class="small text-center">N</td>
          </tr>
          <tr>
            <td class="small text-truncate">ReWrite</td>
            <td class="small text-center">Y</td>
          </tr>
        </tbody>
      </table>

    </div><!--/.panel, .item-->

  </div>
  <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">

    <div class="panel panel-default item" style="min-height:118px;">

      <table class="table table-condensed table-bordered" style="table-layout:fixed;">
        <caption class="text-center text-uppercase">CONFIG</caption>
        <colgroup>
          <col class="col-xs-7">
          <col>
        </colgroup><!--/required to fix column sizing & employ text-truncate-->
        <tbody>
          <tr>
            <td class="small text-truncate">enabledfg gfdgdfg bghfgh</td>
            <td class="small text-center">Y</td>
          </tr>
          <tr class="border-top">
            <td class="small text-truncate">Suffix</td>
            <td class="small text-center">N</td>
          </tr>
          <tr>
            <td class="small text-truncate">ReWrite</td>
            <td class="small text-center">Y</td>
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

                  <h3 class="margin-remove text-muted">DataBase Configuration</h3>
                  <p class="text-muted">this is some basic information about whats happening. this is always included in the forum post output.</p>

                </div><!--/.subsection-heading-->
                <div class="col-xs-12 col-md-9 col-lg-9 subsection-content">


                  <div class="row content-container">
                    <div class="col-xs-12 col-md-6 content-item">

                      <div class="panel panel-default item">

                        <table class="table table-condensed table-bordered" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase">1DataBase (+DB Type)</caption>
                          <colgroup>
                            <col class="col-xs-7">
                            <col>
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <tbody>
                            <tr>
                              <td class="small text-truncate">PHP Version</td>
                              <td class="text-center bg-info small"><?php echo _FPA_VER_SHORT; ?>5.6.30</td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">PHP API</td>
                              <td class="text-center small bg-info">CGI-FCGI</td>
                            </tr>
                            <tr>
                              <td class="small text-truncate text-success">MySQL Support</td>
                              <td class="text-center bg-success"><?php echo _FPA_Y_ICON; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate text-danger">MySQLi Support</td>
                              <td class="text-center bg-danger"><?php echo _FPA_N_ICON; ?></td>
                            </tr>
                          </tbody>
                        </table>

                      </div><!--/.panel, item-->

                    </div><!--/.content-item-->
                    <div class="col-xs-12 col-md-6 content-item">

                      <div class="panel panel-default item">

                        <table class="table table-condensed table-bordered" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase">DataBase Performance</caption>
                          <colgroup>
                            <col class="col-xs-7">
                            <col>
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <tbody>
                            <tr>
                              <td class="small text-truncate">MySQL Version</td>
                              <td class="col-xs-5 text-center bg-info small"><?php echo _FPA_VER_SHORT; ?>5.6.30</td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">PHP API</td>
                              <td class="text-center small bg-info">CGI-FCGI</td>
                            </tr>
                            <tr>
                              <td class="small text-truncate text-success">MySQL Support</td>
                              <td class="text-center bg-success"><?php echo _FPA_Y_ICON; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate text-danger">MySQLi Support</td>
                              <td class="text-center bg-danger"><?php echo _FPA_N_ICON; ?></td>
                            </tr>
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

                  <h3 class="margin-remove text-muted">DataBase Structure</h3>
                  <p class="text-muted">this is some basic information about whats happening. this is always included in the forum post output.</p>

                </div><!--/.subsection-heading-->
                <div class="col-xs-12 col-md-9 col-lg-9 subsection-content">


                  <div class="row content-container">
                    <div class="col-xs-12 content-item">

                      <div class="panel panel-default item">

                        <table class="table table-condensed table-bordered table-striped table-hover" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase">(+DB Type_ :: Table Structure</caption>
                          <colgroup>
                            <col class="col-xs-4">
                            <col class="">
                            <col class="">
                            <col class="hidden-xs hidden-sm">
                            <col class="hidden-xs hidden-sm">
                            <col class="hidden-xs">
                            <col class="">
                            <col class="hidden-xs hidden-sm hidden-md">
                            <col class="hidden-xs hidden-sm hidden-md">
                            <col class="hidden-xs hidden-sm hidden-md">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <thead>
                            <tr class="">
                              <th class="">TABLE</th>
                              <th class="text-center">SIZE</th>
                              <th class="text-center">RCDS</th>
                              <th class="text-center hidden-xs hidden-sm">AVG.<br />LENGTH</th>
                              <th class="text-center hidden-xs hidden-sm">FRAG'MT<br />SIZE</th>
                              <th class="text-center hidden-xs">ENGINE</th>
                              <th class="text-center text-truncate">COLLATION</th>
                              <th class="text-center text-truncate hidden-xs hidden-sm hidden-md">CREATED</th>
                              <th class="text-center text-truncate hidden-xs hidden-sm hidden-md">UPDATED</th>
                              <th class="text-center text-truncate hidden-xs hidden-sm hidden-md">CHECKED</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="">
                              <td class="small text-truncate">ewxku_ticketmaster_transactions_temp</td>
                              <td class="small text-center">16.00 KiB</td>
                              <td class="small text-center text-truncate">319</td>
                              <td class="small text-center text-truncate hidden-xs hidden-sm">16.00 KiB</td>
                              <td class="small text-center text-truncate hidden-xs hidden-sm">61440.00 KiB</td>
                              <td class="small text-center hidden-xs">InnoDB</td>
                              <td class="small text-center text-truncate">*utf8mb4_unicode_ci</td>
                              <td class="small text-center text-truncate hidden-xs hidden-sm hidden-md">2018-04-27</td>
                              <td class="small text-center text-truncate hidden-xs hidden-sm hidden-md">-</td>
                              <td class="small text-center text-truncate hidden-xs hidden-sm hidden-md">-</td>
                            </tr>
                            <tr class="">
                              <td class="small text-truncate">ewxku_ticketmaster_transactions_temp</td>
                              <td class="small text-center">16.00 KiB</td>
                              <td class="small text-center text-truncate">319</td>
                              <td class="small text-center text-truncate hidden-xs hidden-sm">16.00 KiB</td>
                              <td class="small text-center text-truncate hidden-xs hidden-sm">61440.00 KiB</td>
                              <td class="small text-center hidden-xs">InnoDB</td>
                              <td class="small text-center text-truncate">*utf8mb4_unicode_ci</td>
                              <td class="small text-center text-truncate hidden-xs hidden-sm hidden-md">2018-04-27</td>
                              <td class="small text-center text-truncate hidden-xs hidden-sm hidden-md">-</td>
                              <td class="small text-center text-truncate hidden-xs hidden-sm hidden-md">-</td>
                            </tr>
                            <tr class="">
                              <td class="small text-truncate">ewxku_ticketmaster_transactions_temp</td>
                              <td class="small text-center">16.00 KiB</td>
                              <td class="small text-center text-truncate">319</td>
                              <td class="small text-center text-truncate hidden-xs hidden-sm">16.00 KiB</td>
                              <td class="small text-center text-truncate hidden-xs hidden-sm">61440.00 KiB</td>
                              <td class="small text-center hidden-xs">InnoDB</td>
                              <td class="small text-center text-truncate">*utf8mb4_unicode_ci</td>
                              <td class="small text-center text-truncate hidden-xs hidden-sm hidden-md">2018-04-27</td>
                              <td class="small text-center text-truncate hidden-xs hidden-sm hidden-md">-</td>
                              <td class="small text-center text-truncate hidden-xs hidden-sm hidden-md">-</td>
                            </tr>
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
                  <i class="glyphicon glyphicon-equalizer"></i> Hosting Discovery
                </h2>

                <p class="lead">
                  The FPA Discovery Section presents any basic information that FPA has managed to discover about your hosting server, database & php environments, installed functions and any discovered Joomla! instance.
                </p>

                <div class="collapse clearfix" id="collapseExplainHost">
                  <div class="alert alert-info" role="alert">
                    <h4><i class="glyphicon glyphicon-info-sign"></i> Host Discovery Dashboard</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  </div>
                </div><!--/#collapseExplainHost-->

              </div><!--/.page-header-->






              <?php
                /* NOTE (RussW): SUB-SECTION - PHP discovery
                 * php environement information
                 *
                 */
              ?>
              <div id="host-discovery-container" class="row margin-top-lg margin-bottom-lg">

                <div class="col-xs-12 col-md-3 col-lg-3 subsection-heading">

                  <h3 class="margin-remove text-muted">Server Configuration</h3>
                  <p class="text-muted">this is some basic information about whats happening. this is always included in the forum post output.</p>

                </div><!--/.subsection-heading-->
                <div class="col-xs-12 col-md-9 col-lg-9 subsection-content">


                  <div class="row content-container">
                    <div class="col-xs-12 col-md-6 content-item">

                      <div class="panel panel-default item">

                        <table class="table table-condensed table-bordered" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase">PHP Environment</caption>
                          <colgroup>
                            <col class="col-xs-7">
                            <col class="">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <tbody>
                            <tr>
                              <td class="small text-truncate"><span class="text-truncate">PHP Version</span></td>
                              <td class="text-center bg-info small"><?php echo _FPA_VER_SHORT; ?>5.6.30</td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">PHP API</td>
                              <td class="text-center small bg-info">CGI-FCGI</td>
                            </tr>
                            <tr>
                              <td class="small text-truncate text-success">MySQL Support</td>
                              <td class="text-center bg-success"><?php echo _FPA_Y_ICON; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate text-danger">MySQLi Support</td>
                              <td class="text-center bg-danger"><?php echo _FPA_N_ICON; ?></td>
                            </tr>
                          </tbody>
                        </table>

                      </div><!--/.panel, item-->

                    </div><!--/.content-item-->
                    <div class="col-xs-12 col-md-6 content-item">

                      <div class="panel panel-default item">

                        <table class="table table-condensed table-bordered" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase">Host Environment</caption>
                          <colgroup>
                            <col class="col-xs-7">
                            <col class="">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <tbody>
                            <tr>
                              <td class="small text-truncate">MySQL Version</td>
                              <td class="small text-center bg-info"><?php echo _FPA_VER_SHORT; ?>5.6.30</td>
                            </tr>
                            <tr>
                              <td class="small text-truncate">PHP API</td>
                              <td class="small text-center bg-info">CGI-FCGI</td>
                            </tr>
                            <tr>
                              <td class="small text-truncate text-success">MySQL Support</td>
                              <td class="text-center bg-success"><?php echo _FPA_Y_ICON; ?></td>
                            </tr>
                            <tr>
                              <td class="small text-truncate text-danger">MySQLi Support</td>
                              <td class="text-center bg-danger"><?php echo _FPA_N_ICON; ?></td>
                            </tr>
                          </tbody>
                        </table>

                      </div><!--/.panel, item-->

                    </div><!--/.content-item-->

                    <div class="clearfix"></div><!--/responsive-column-reset-->

                    <div class="col-xs-12 content-item">

                      <div class="panel panel-default item">

                        <table class="table table-condensed table-bordered" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase">Host Environment</caption>
                          <colgroup>
                            <col>
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <tbody>
                            <tr>
                              <td class="padding-top-lg">

                                <div class="row-fluid small text-lowercase">
                                  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="border-all margin-bottom-sm text-center">Core<br />7.2.1</div>
                                  </div>
                                  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="border-all margin-bottom-sm text-center">date<br />7.2.1</div>
                                  </div>
                                  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="border-all margin-bottom-sm text-center bg-success text-success">libxml<br />7.2.1</div>
                                  </div>
                                  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="border-all margin-bottom-sm text-center bg-success text-success">openssl<br />7.2.1</div>
                                  </div>
                                  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="border-all margin-bottom-sm text-center">Zend_Engine<br />7.2.1</div>
                                  </div>
                                  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="border-all margin-bottom-sm text-center">Core<br />7.2.1</div>
                                  </div>
                                  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="border-all margin-bottom-sm text-center">Core<br />7.2.1</div>
                                  </div>
                                  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="border-all margin-bottom-sm text-center">Core<br />7.2.1</div>
                                  </div>
                                  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="border-all margin-bottom-sm text-center">Zend_Engine<br />7.2.1</div>
                                  </div>
                                  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="border-all margin-bottom-sm text-center">Core<br />7.2.1</div>
                                  </div>
                                  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="border-all margin-bottom-sm text-center">Core<br />7.2.1</div>
                                  </div>
                                  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="border-all margin-bottom-sm text-center">Zend_Engine<br />7.2.1</div>
                                  </div>
                                </div>

                              </td>
                            </tr>
                            <tr>
                              <td>

                                <div class="row-fluid small">
                                  <div class="col-xs-12">
                                    <h5>Potential Missing Extensions</h5>
                                  </div>
                                  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="border-all margin-bottom-sm text-center bg-warning text-warning">mysqli</div>
                                  </div>
                                  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="border-all margin-bottom-sm text-center bg-warning text-warning">mcrypt</div>
                                  </div>
                                  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                                    <div class="border-all margin-bottom-sm text-center bg-warning text-warning">suhosin</div>
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
                  <i class="glyphicon glyphicon-list-alt"></i> Permissions Discovery
                </h2>

                <p class="lead">
                  The FPA Discovery Section presents any basic information that FPA has managed to discover about your hosting server, database & php environments, installed functions and any discovered Joomla! instance.
                </p>

                <div class="collapse clearfix" id="collapseExplainPerms">
                  <div class="alert alert-info" role="alert">
                    <h4><i class="glyphicon glyphicon-info-sign"></i> Folder & File Permissions</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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

                  <h3 class="margin-remove text-muted">Core Folders</h3>
                  <p class="text-muted">this is some basic information about whats happening. this is always included in the forum post output.</p>

                </div><!--/.subsection-heading-->
                <div class="col-xs-12 col-md-9 col-lg-9 subsection-content">


                  <div class="row content-container">
                    <div class="col-xs-12 content-item">

                      <div class="panel panel-default item">

                        <table class="table table-condensed table-bordered" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase">Core Folder Permissions</caption>
                          <colgroup>
                            <col class="">
                            <col class="">
                            <col class="col-xs-7">
                            <col class="hidden-xs">
                            <col class="hidden-xs hidden-sm">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <thead>
                            <tr class="">
                              <th class="text-center">MODE</th>
                              <th class="text-center">WITEABLE</th>
                              <th class="">FOLDER</th>
                              <th class="text-center hidden-xs">OWNER</th>
                              <th class="text-center hidden-xs hidden-sm">GROUP</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="bg-danger text-danger">
                              <td class="small text-center">777</td>
                              <td class="small text-center"><?php echo _FPA_Y_ICON; ?></td>
                              <td class="small text-truncate">/home/accountname/public_html/this/is/very/long/folder/name/images/</td>
                              <td class="small text-truncate text-center hidden-xs">demohotm</td>
                              <td class="small text-truncate text-center hidden-xs hidden-sm">demohotm</td>
                            </tr>
                            <tr>
                              <td class="small text-center">755</td>
                              <td class="small text-center"><?php echo _FPA_Y_ICON; ?></td>
                              <td class="small text-truncate">components/</td>
                              <td class="small text-truncate text-center hidden-xs">WinterRG</td>
                              <td class="small text-truncate text-center hidden-xs hidden-sm">WinterRG</td>
                            </tr>
                            <tr>
                              <td class="small text-center">755</td>
                              <td class="small text-center"><?php echo _FPA_Y_ICON; ?></td>
                              <td class="small text-truncate">modules/</td>
                              <td class="small text-truncate text-center hidden-xs">WinterRG</td>
                              <td class="small text-truncate text-center hidden-xs hidden-sm">WinterRG</td>
                            </tr>
                            <tr>
                              <td class="small text-center">755</td>
                              <td class="small text-center"><?php echo _FPA_Y_ICON; ?></td>
                              <td class="small text-truncate">plugins/</td>
                              <td class="small text-truncate text-center hidden-xs">WinterRG</td>
                              <td class="small text-truncate text-center hidden-xs hidden-sm">WinterRG</td>
                            </tr>
                            <tr>
                              <td class="small text-center">755</td>
                              <td class="small text-center"><?php echo _FPA_Y_ICON; ?></td>
                              <td class="small text-truncate">language/</td>
                              <td class="small text-truncate text-center hidden-xs">WinterRG</td>
                              <td class="small text-truncate text-center hidden-xs hidden-sm">WinterRG</td>
                            </tr>
                            <tr>
                              <td class="small text-center">755</td>
                              <td class="small text-center"><?php echo _FPA_Y_ICON; ?></td>
                              <td class="small text-truncate">templates/</td>
                              <td class="small text-truncate text-center hidden-xs">WinterRG</td>
                              <td class="small text-truncate text-center hidden-xs hidden-sm">WinterRG</td>
                            </tr>
                            <tr class="bg-warning text-warning">
                              <td class="small text-center">400</td>
                              <td class="small text-center"><?php echo _FPA_N_ICON; ?></td>
                              <td class="small text-truncate">cache/</td>
                              <td class="small text-truncate text-center hidden-xs">WinterRG</td>
                              <td class="small text-truncate text-center hidden-xs hidden-sm">WinterRG</td>
                            </tr>
                            <tr>
                              <td class="small text-center">755</td>
                              <td class="small text-center"><?php echo _FPA_Y_ICON; ?></td>
                              <td class="small text-truncate">logs/</td>
                              <td class="small text-truncate text-center hidden-xs">WinterRG</td>
                              <td class="small text-truncate text-center hidden-xs hidden-sm">WinterRG</td>
                            </tr>
                            <tr>
                              <td class="small text-center">755</td>
                              <td class="small text-center"><?php echo _FPA_Y_ICON; ?></td>
                              <td class="small text-truncate">tmp/</td>
                              <td class="small text-truncate text-center hidden-xs">WinterRG</td>
                              <td class="small text-truncate text-center hidden-xs hidden-sm">WinterRG</td>
                            </tr>
                            <tr>
                              <td class="small text-center">755</td>
                              <td class="small text-center"><?php echo _FPA_Y_ICON; ?></td>
                              <td class="small text-truncate">administrator/components/</td>
                              <td class="small text-truncate text-center hidden-xs">WinterRG</td>
                              <td class="small text-truncate text-center hidden-xs hidden-sm">WinterRG</td>
                            </tr>
                            <tr>
                              <td class="small text-center">755</td>
                              <td class="small text-center"><?php echo _FPA_Y_ICON; ?></td>
                              <td class="small text-truncate">administrator/modules/</td>
                              <td class="small text-truncate text-center hidden-xs">WinterRG</td>
                              <td class="small text-truncate text-center hidden-xs hidden-sm">WinterRG</td>
                            </tr>
                            <tr>
                              <td class="small text-center">755</td>
                              <td class="small text-center"><?php echo _FPA_Y_ICON; ?></td>
                              <td class="small text-truncate">administrator/plugins/</td>
                              <td class="small text-truncate text-center hidden-xs">WinterRG</td>
                              <td class="small text-truncate text-center hidden-xs hidden-sm">WinterRG</td>
                            </tr>
                            <tr>
                              <td class="small text-center">755</td>
                              <td class="small text-center"><?php echo _FPA_Y_ICON; ?></td>
                              <td class="small text-truncate">administrator/language/</td>
                              <td class="small text-truncate text-center hidden-xs">WinterRG</td>
                              <td class="small text-truncate text-center hidden-xs hidden-sm">WinterRG</td>
                            </tr>
                            <tr>
                              <td class="small text-center">755</td>
                              <td class="small text-center"><?php echo _FPA_Y_ICON; ?></td>
                              <td class="small text-truncate">administrator/templates/</td>
                              <td class="small text-truncate text-center hidden-xs">WinterRG</td>
                              <td class="small text-truncate text-center hidden-xs hidden-sm">WinterRG</td>
                            </tr>
                            <tr>
                              <td class="small text-center">-</td>
                              <td class="small text-center">-</td>
                              <td class="small text-truncate text-warning">administrator/logs/</td>
                              <td class="small text-truncate text-center hidden-xs">-</td>
                              <td class="small text-truncate text-center hidden-xs hidden-sm">-</td>
                            </tr>
                          </tbody>
                        </table>

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

                  <h3 class="margin-remove text-muted">Elevated Permissions</h3>
                  <p class="text-muted">this is some basic information about whats happening. this is always included in the forum post output.</p>

                </div><!--/.subsection-heading-->
                <div class="col-xs-12 col-md-9 col-lg-9 subsection-content">


                  <div class="row content-container">
                    <div class="col-xs-12 content-item">

                      <div class="panel panel-default item">

                        <table class="table table-condensed table-bordered" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase">Elevated Permission Checks</caption>
                          <colgroup>
                            <col class="">
                            <col class="">
                            <col class="col-xs-7">
                            <col class="hidden-xs">
                            <col class="hidden-xs hidden-sm">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <thead>
                            <tr class="">
                              <th class="text-center">MODE</th>
                              <th class="text-center">WITEABLE</th>
                              <th class="">FOLDER</th>
                              <th class="text-center hidden-xs">OWNER</th>
                              <th class="text-center hidden-xs hidden-sm">GROUP</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="small text-center">777</td>
                              <td class="small text-center"><?php echo _FPA_Y_ICON; ?></td>
                              <td class="small text-truncate">images/</td>
                              <td class="small text-truncate text-center hidden-xs">demohotm</td>
                              <td class="small text-truncate text-center hidden-xs hidden-sm">demohotm</td>
                            </tr>
                            <tr class="bg-danger text-danger">
                              <td class="small text-center">777</td>
                              <td class="small text-center"><?php echo _FPA_Y_ICON; ?></td>
                              <td class="small text-truncate">images/</td>
                              <td class="small text-truncate text-center hidden-xs">demohotm</td>
                              <td class="small text-truncate text-center hidden-xs hidden-sm">demohotm</td>
                            </tr>
                          </tbody>
                        </table>

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

                <h2>
                  <button class="btn btn-info btn-xs pull-right clearfix hidden-print" type="button" data-toggle="collapse" data-target="#collapseExplainExt" aria-expanded="false" aria-controls="collapseExplainExt">
                    <i class="glyphicon glyphicon-info-sign"></i><span class="hidden-xs">&nbsp;<?php echo _FPA_EXPLAIN; ?></span>
                  </button>
                  <i class="glyphicon glyphicon-th"></i> Extension Discovery
                </h2>

                <p class="lead">
                  The FPA Discovery Section presents any basic information that FPA has managed to discover about your hosting server, database & php environments, installed functions and any discovered Joomla! instance.
                </p>

                <div class="collapse clearfix" id="collapseExplainExt">
                  <div class="alert alert-info" role="alert">
                    <h4><i class="glyphicon glyphicon-info-sign"></i> Installed Component Discovery</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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

                  <h3 class="margin-remove text-muted">Components</h3>
                  <p class="text-muted">this is some basic information about whats happening. this is always included in the forum post output.</p>

                </div><!--/.subsection-heading-->
                <div class="col-xs-12 col-md-9 col-lg-9 subsection-content">


                  <div class="row content-container">
                    <div class="col-xs-12 content-item">

                      <div class="panel panel-default item">

                        <table class="table table-condensed table-bordered" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase">COMPONENTS :: SITE</caption>
                          <colgroup>
                            <col class="col-xs-1 col-sm-2">
                            <col class="col-xs-8 col-sm-3">
                            <col class="">
                            <col class="hidden-xs">
                            <col class="hidden-xs hidden-sm">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <thead>
                            <tr class="">
                              <th class="text-center text-truncate">ENABLED</th>
                              <th class="">NAME</th>
                              <th class="text-center">VERSION</th>
                              <th class="text-center hidden-xs">AUTHOR</th>
                              <th class="text-center hidden-xs hidden-sm">ADDRESS</th>
                              <th class="text-center hidden-xs">CREATED</th>
                              <th class="text-center hidden-xs">TYPE</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="">
                              <td class="small text-center text-success"><?php echo _FPA_Y_ICON; ?></td>
                              <td class="small text-truncate">yoo_sixthavenue</td>
                              <td class="small text-center">1.0.3</td>
                              <td class="small text-center text-truncate hidden-xs">YOOtheme</td>
                              <td class="small text-center text-truncate hidden-xs hidden-sm">www.yootheme.com</td>
                              <td class="small text-center text-truncate hidden-xs">November 2016</td>
                              <td class="small text-center hidden-xs">3rd Party</td>
                            </tr>
                            <tr class="">
                              <td class="small text-center text-success"><?php echo _FPA_Y_ICON; ?></td>
                              <td class="small text-truncate">protostar</td>
                              <td class="small text-center">1.0</td>
                              <td class="small text-center text-truncate hidden-xs">Kyle Ledbeter</td>
                              <td class="small text-center text-truncate hidden-xs hidden-sm">-</td>
                              <td class="small text-center text-truncate hidden-xs">4/30/2012</td>
                              <td class="small text-center hidden-xs">Core</td>
                            </tr>
                          </tbody>
                        </table>

                      </div><!--/.panel, item-->

                      <div class="panel panel-default item">

                        <table class="table table-condensed table-bordered" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase">COMPONENTS :: ADMINISTRATOR</caption>
                          <colgroup>
                            <col class="col-xs-1 col-sm-2">
                            <col class="col-xs-8 col-sm-3">
                            <col class="">
                            <col class="hidden-xs">
                            <col class="hidden-xs hidden-sm">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <thead>
                            <tr class="">
                              <th class="text-center text-truncate">ENABLED</th>
                              <th class="col-sm-3">NAME</th>
                              <th class="text-center">VERSION</th>
                              <th class="text-center hidden-xs">AUTHOR</th>
                              <th class="text-center hidden-xs hidden-sm">ADDRESS</th>
                              <th class="text-center hidden-xs">CREATED</th>
                              <th class="text-center hidden-xs">TYPE</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="">
                              <td class="small text-center text-success"><?php echo _FPA_Y_ICON; ?></td>
                              <td class="small text-truncate">hathor</td>
                              <td class="small text-center">3.0.0</td>
                              <td class="small text-center text-truncate hidden-xs">Andrea Tarr</td>
                              <td class="small text-center text-truncate hidden-xs hidden-sm">www.tarrconsulting.com</td>
                              <td class="small text-center text-truncate hidden-xs">May 2010</td>
                              <td class="small text-center hidden-xs">Core</td>
                            </tr>
                            <tr class="">
                              <td class="small text-center text-success"><?php echo _FPA_Y_ICON; ?></td>
                              <td class="small text-truncate">isis</td>
                              <td class="small text-center">1.0</td>
                              <td class="small text-center text-truncate hidden-xs">Kyle Ledbeter</td>
                              <td class="small text-center text-truncate hidden-xs hidden-sm">-</td>
                              <td class="small text-center text-truncate hidden-xs">3/30/2012</td>
                              <td class="small text-center hidden-xs">Core</td>
                            </tr>
                          </tbody>
                        </table>

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

                  <h3 class="margin-remove text-muted">Modules</h3>
                  <p class="text-muted">this is some basic information about whats happening. this is always included in the forum post output.</p>

                </div><!--/.subsection-heading-->
                <div class="col-xs-12 col-md-9 col-lg-9 subsection-content">


                  <div class="row content-container">
                    <div class="col-xs-12 content-item">

                      <div class="panel panel-default item">

                        <table class="table table-condensed table-bordered" style="table-layout:fixed;">
                              <caption class="text-center text-uppercase">MODULES :: SITE</caption>
                          <colgroup>
                            <col class="col-xs-1 col-sm-2">
                            <col class="col-xs-8 col-sm-3">
                            <col class="">
                            <col class="hidden-xs">
                            <col class="hidden-xs hidden-sm">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                              <thead>
                                <tr class="">
                                  <th class="text-center text-truncate">ENABLED</th>
                                  <th class="col-sm-3">NAME</th>
                                  <th class="text-center">VERSION</th>
                                  <th class="text-center hidden-xs">AUTHOR</th>
                                  <th class="text-center hidden-xs hidden-sm">ADDRESS</th>
                                  <th class="text-center hidden-xs">CREATED</th>
                                  <th class="text-center hidden-xs">TYPE</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr class="">
                                  <td class="small text-center text-success"><?php echo _FPA_Y_ICON; ?></td>
                                  <td class="small text-truncate bg-muted">yoo_sixthavenue</td>
                                  <td class="small text-center">1.0.3</td>
                                  <td class="small text-center text-truncate hidden-xs">YOOtheme</td>
                                  <td class="small text-center text-truncate hidden-xs hidden-sm">www.yootheme.com</td>
                                  <td class="small text-center text-truncate hidden-xs">November 2016</td>
                                  <td class="small text-center hidden-xs">3rd Party</td>
                                </tr>
                                <tr class="">
                                  <td class="small text-center text-success"><?php echo _FPA_Y_ICON; ?></td>
                                  <td class="small text-truncate bg-muted">protostar</td>
                                  <td class="small text-center">1.0</td>
                                  <td class="small text-center text-truncate hidden-xs">Kyle Ledbeter</td>
                                  <td class="small text-center text-truncate hidden-xs hidden-sm">-</td>
                                  <td class="small text-center text-truncate hidden-xs">4/30/2012</td>
                                  <td class="small text-center hidden-xs">Core</td>
                                </tr>
                              </tbody>
                            </table>

                      </div><!--/.panel, item-->

                      <div class="panel panel-default item">

                        <table class="table table-condensed table-bordered" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase">MODULES :: ADMINISTRATOR</caption>
                          <colgroup>
                            <col class="col-xs-1 col-sm-2">
                            <col class="col-xs-8 col-sm-3">
                            <col class="">
                            <col class="hidden-xs">
                            <col class="hidden-xs hidden-sm">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <thead>
                            <tr class="">
                              <th class="text-center text-truncate">ENABLED</th>
                              <th class="col-sm-3">NAME</th>
                              <th class="text-center">VERSION</th>
                              <th class="text-center hidden-xs">AUTHOR</th>
                              <th class="text-center hidden-xs hidden-sm">ADDRESS</th>
                              <th class="text-center hidden-xs">CREATED</th>
                              <th class="text-center hidden-xs">TYPE</th>
                            </tr>
                          </thead>
                              <tbody>
                                <tr class="">
                                  <td class="small text-center text-success"><?php echo _FPA_Y_ICON; ?></td>
                                  <td class="small text-truncate">modulename one</td>
                                  <td class="small text-center">3.0.0</td>
                                  <td class="small text-center text-truncate hidden-xs">Andrea Tarr</td>
                                  <td class="small text-center text-truncate hidden-xs hidden-sm">www.tarrconsulting.com</td>
                                  <td class="small text-center text-truncate hidden-xs">May 2010</td>
                                  <td class="small text-center hidden-xs">Core</td>
                                </tr>
                                <tr class="">
                                  <td class="small text-center text-success"><?php echo _FPA_Y_ICON; ?></td>
                                  <td class="small text-truncate">modulename two</td>
                                  <td class="small text-center">1.0</td>
                                  <td class="small text-center text-truncate hidden-xs">Kyle Ledbeter</td>
                                  <td class="small text-center text-truncate hidden-xs hidden-sm">-</td>
                                  <td class="small text-center text-truncate hidden-xs">3/30/2012</td>
                                  <td class="small text-center hidden-xs">Core</td>
                                </tr>
                              </tbody>
                            </table>

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

                  <h3 class="margin-remove text-muted">Plugins</h3>
                  <p class="text-muted">this is some basic information about whats happening. this is always included in the forum post output.</p>

                </div><!--/.subsection-heading-->
                <div class="col-xs-12 col-md-9 col-lg-9 subsection-content">


                  <div class="row content-container">
                    <div class="col-xs-12 content-item">

                      <div class="panel panel-default item">

                        <table class="table table-condensed table-bordered" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase">PLUGINS :: SITE</caption>
                          <colgroup>
                            <col class="col-xs-1 col-sm-2">
                            <col class="col-xs-8 col-sm-3">
                            <col class="">
                            <col class="hidden-xs">
                            <col class="hidden-xs hidden-sm">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <thead>
                            <tr class="">
                              <th class="text-center text-truncate">ENABLED</th>
                              <th class="">NAME</th>
                              <th class="text-center">VERSION</th>
                              <th class="text-center hidden-xs">AUTHOR</th>
                              <th class="text-center hidden-xs hidden-sm">ADDRESS</th>
                              <th class="text-center hidden-xs">CREATED</th>
                              <th class="text-center hidden-xs">TYPE</th>
                            </tr>
                          </thead>
                              <tbody>
                                <tr class="">
                                  <td class="small text-center text-success"><?php echo _FPA_Y_ICON; ?></td>
                                  <td class="small text-truncate">plugin one</td>
                                  <td class="small text-center">1.0.3</td>
                                  <td class="small text-center text-truncate hidden-xs">YOOtheme</td>
                                  <td class="small text-center text-truncate hidden-xs hidden-sm">www.yootheme.com</td>
                                  <td class="small text-center text-truncate hidden-xs">November 2016</td>
                                  <td class="small text-center hidden-xs">3rd Party</td>
                                </tr>
                                <tr class="">
                                  <td class="small text-center text-success"><?php echo _FPA_Y_ICON; ?></td>
                                  <td class="small text-truncate">plugin two</td>
                                  <td class="small text-center">1.0</td>
                                  <td class="small text-center text-truncate hidden-xs">Kyle Ledbeter</td>
                                  <td class="small text-center text-truncate hidden-xs hidden-sm">-</td>
                                  <td class="small text-center text-truncate hidden-xs">4/30/2012</td>
                                  <td class="small text-center hidden-xs">Core</td>
                                </tr>
                              </tbody>
                            </table>

                      </div><!--/.panel, item-->

                      <div class="panel panel-default item">

                        <table class="table table-condensed table-bordered" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase">PLUGINS :: ADMINISTRATOR</caption>
                          <colgroup>
                            <col class="col-xs-1 col-sm-2">
                            <col class="col-xs-8 col-sm-3">
                            <col class="">
                            <col class="hidden-xs">
                            <col class="hidden-xs hidden-sm">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <thead>
                            <tr class="">
                              <th class="text-center text-truncate">ENABLED</th>
                              <th class="">NAME</th>
                              <th class="text-center">VERSION</th>
                              <th class="text-center hidden-xs">AUTHOR</th>
                              <th class="text-center hidden-xs hidden-sm">ADDRESS</th>
                              <th class="text-center hidden-xs">CREATED</th>
                              <th class="text-center hidden-xs">TYPE</th>
                            </tr>
                          </thead>
                              <tbody>
                                <tr class="">
                                  <td class="small text-center text-success"><?php echo _FPA_Y_ICON; ?></td>
                                  <td class="small text-truncate">freds plugin</td>
                                  <td class="small text-center">3.0.0</td>
                                  <td class="small text-center text-truncate hidden-xs">Andrea Tarr</td>
                                  <td class="small text-center text-truncate hidden-xs hidden-sm"><a href="http://www.tarrconsulting.com" target="_blank">www.tarrconsulting.com</a></td>
                                  <td class="small text-center text-truncate hidden-xs">May 2010</td>
                                  <td class="small text-center hidden-xs">Core</td>
                                </tr>
                                <tr class="">
                                  <td class="small text-center text-success"><?php echo _FPA_Y_ICON; ?></td>
                                  <td class="small text-truncate">search plugin</td>
                                  <td class="small text-center">1.0</td>
                                  <td class="small text-center text-truncate hidden-xs">Kyle Ledbeter</td>
                                  <td class="small text-center text-truncate hidden-xs hidden-sm">-</td>
                                  <td class="small text-center text-truncate hidden-xs">3/30/2012</td>
                                  <td class="small text-center hidden-xs">Core</td>
                                </tr>
                              </tbody>
                            </table>

                      </div><!--/.panel, item-->

                    </div><!--/.content-item-->
                  </div><!--/.content-container-->


                </div><!--/.subsection-content-->

              </div><!--/#plugin-discovery-container-->






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

                  <h3 class="margin-remove text-muted">Templates</h3>
                  <p class="text-muted">this is some basic information about whats happening. this is always included in the forum post output.</p>

                </div><!--/.subsection-heading-->
                <div class="col-xs-12 col-md-9 col-lg-9 subsection-content">


                  <div class="row content-container">
                    <div class="col-xs-12 content-item">

                      <div class="panel panel-default item">

                        <table class="table table-condensed table-bordered" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase">TEMPLATES :: SITE</caption>
                          <colgroup>
                            <col class="col-xs-1 col-sm-2">
                            <col class="col-xs-8 col-sm-3">
                            <col class="">
                            <col class="hidden-xs">
                            <col class="hidden-xs hidden-sm">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <thead>
                            <tr class="">
                              <th class="text-center text-truncate">ENABLED</th>
                              <th class="">NAME</th>
                              <th class="text-center">VERSION</th>
                              <th class="text-center hidden-xs">AUTHOR</th>
                              <th class="text-center hidden-xs hidden-sm">ADDRESS</th>
                              <th class="text-center hidden-xs">CREATED</th>
                              <th class="text-center hidden-xs">TYPE</th>
                            </tr>
                          </thead>
                              <tbody>
                                <tr class="bg-success">
                                  <td class="small text-center text-success"><?php echo _FPA_A_ICON; ?></td>
                                  <td class="small text-truncate">yoo_sixthavenue</td>
                                  <td class="small text-center">1.0.3</td>
                                  <td class="small text-center text-truncate hidden-xs">YOOtheme</td>
                                  <td class="small text-center text-truncate hidden-xs hidden-sm"><a href="http://www.yootheme.com" target="_blank">www.yootheme.com</a></td>
                                  <td class="small text-center text-truncate hidden-xs">November 2016</td>
                                  <td class="small text-center hidden-xs">3rd Party</td>
                                </tr>
                                <tr class="">
                                  <td class="small text-center"><?php echo _FPA_Y_ICON; ?></td>
                                  <td class="small text-truncate">protostar</td>
                                  <td class="small text-center">1.0</td>
                                  <td class="small text-center text-truncate hidden-xs">Kyle Ledbeter</td>
                                  <td class="small text-center text-truncate hidden-xs hidden-sm">-</td>
                                  <td class="small text-center text-truncate hidden-xs">4/30/2012</td>
                                  <td class="small text-center hidden-xs">Core</td>
                                </tr>
                              </tbody>
                            </table>

                      </div><!--/.panel, item-->

                      <div class="panel panel-default item">

                        <table class="table table-condensed table-bordered" style="table-layout:fixed;">
                          <caption class="text-center text-uppercase">TEMPLATES :: ADMINISTRATOR</caption>
                          <colgroup>
                            <col class="col-xs-1 col-sm-2">
                            <col class="col-xs-8 col-sm-3">
                            <col class="">
                            <col class="hidden-xs">
                            <col class="hidden-xs hidden-sm">
                            <col class="hidden-xs">
                            <col class="hidden-xs">
                          </colgroup><!--/required to fix column sizing & employ text-truncate-->
                          <thead>
                            <tr class="">
                              <th class="text-center text-truncate">ENABLED</th>
                              <th class="">NAME</th>
                              <th class="text-center">VERSION</th>
                              <th class="text-center hidden-xs">AUTHOR</th>
                              <th class="text-center hidden-xs hidden-sm">ADDRESS</th>
                              <th class="text-center hidden-xs">CREATED</th>
                              <th class="text-center hidden-xs">TYPE</th>
                            </tr>
                          </thead>
                              <tbody>
                                <tr class="">
                                  <td class="small text-center text-success"><?php echo _FPA_Y_ICON; ?></td>
                                  <td class="small text-truncate">hathor</td>
                                  <td class="small text-center">1.0.3</td>
                                  <td class="small text-center text-truncate hidden-xs">YOOtheme</td>
                                  <td class="small text-center text-truncate hidden-xs hidden-sm"><a href="http://www.yootheme.com" target="_blank">www.yootheme.com</a></td>
                                  <td class="small text-center text-truncate hidden-xs">November 2016</td>
                                  <td class="small text-center hidden-xs">3rd Party</td>
                                </tr>
                                <tr class="bg-success">
                                  <td class="small text-center"><?php echo _FPA_A_ICON; ?></td>
                                  <td class="small text-truncate">isis</td>
                                  <td class="small text-center">1.0</td>
                                  <td class="small text-center text-truncate hidden-xs">Kyle Ledbeter</td>
                                  <td class="small text-center text-truncate hidden-xs hidden-sm">-</td>
                                  <td class="small text-center text-truncate hidden-xs">4/30/2012</td>
                                  <td class="small text-center hidden-xs">Core</td>
                                </tr>
                              </tbody>
                            </table>

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
                    <div class="panel-heading"><strong>Legends & Status</strong></div>
                    <table class="table">
                      <tr class="bg-info text-info">
                        <td><span class="label label-info"><i class="glyphicon glyphicon-info-sign"></i></span></td>
                        <td><span class="label label-info center-block"><i class="glyphicon glyphicon-info-sign"></i> Explain</span></td>
                        <td class="line-height-normal">Information & Help Message/Status</td>
                      </tr>
                      <tr class="bg-success text-success">
                        <td><span class="label label-success"><i class="glyphicon glyphicon-ok-sign"></i></span></td>
                        <td><span class="label label-success center-block"><i class="glyphicon glyphicon-ok-sign"></i> Success</span></td>
                        <td class="line-height-normal">Positive & Successful Message/Status</td>
                      </tr>
                      <tr class="bg-warning text-warning">
                        <td><span class="label label-warning"><i class="glyphicon glyphicon-alert"></i></span></td>
                        <td><span class="label label-warning center-block"><i class="glyphicon glyphicon-alert"></i> Warning</span></td>
                        <td class="line-height-normal">Highlighted & Warning Message/Status</td>
                      </tr>
                      <tr class="bg-danger text-danger">
                        <td><span class="label label-danger"><i class="glyphicon glyphicon-remove-sign"></i></span></td>
                        <td><span class="label label-danger center-block"><i class="glyphicon glyphicon-remove-sign"></i> Alert</span></td>
                        <td class="line-height-normal">Negative Or Error Message/Status</td>
                      </tr>
                      <tr class="bg-protected text-protected">
                        <td><span class="label label-protected"><i class="glyphicon glyphicon-ban-circle"></i></span></td>
                        <td><span class="label label-protected center-block">protected</span></td>
                        <td class="line-height-normal">Privacy Settings Are Protecting Sensitive Data</td>
                      </tr>
                    </table>
                  </div><!--/.panel-->

                </div><!--/left-column-->
                <div class="col-xs-12 col-md-6">


                  <div class="alert alert-danger margin-bottom-sm">

                    <?php
                      /* NOTE (RussW): Security Warning (Browser View Only)
                       *
                       */
                    ?>
                    <div class="row hidden-print">
                      <div class="col-sm-12 col-md-8 text-center">
                        <h6 class="margin-remove">SECURITY NOTICE</h6>
                        <span class="small line-height-normal text-justify">
                          Due to the highly sensitive nature of the information displayed by the FPA script, it should be removed from the server immediately after use.
                          If the script is left on the site, it can be used to gather enough information to hack your site.
                        </span>
                      </div>
                      <div class="col-sm-12 col-md-4 text-center">

                        <a href="fpa-en.php?act=delete" class="btn btn-danger btn-block margin-top-sm" role="button">
                          <i class="glyphicon glyphicon-remove-circle lead margin-remove"></i>
                          <div class="small">Delete FPA</div>
                        </a>

                      </div>
                    </div><!--/.hidden-print-->

                    <?php
                      /* NOTE (RussW): Security Warning (Print View Only)
                       *
                       */
                    ?>
                    <div class="row visible-print-block">
                      <div class="col-xs-12 text-center">
                        <h6 class="margin-remove">SECURITY NOTICE</h6>
                        <span class="small line-height-normal text-justify">
                          Due to the highly sensitive nature of the information displayed by the FPA script, hard-copy or electronic document copies should be securely destroyed immediately after use.
                        </span>
                      </div>
                    </div><!--/.visible-print-block-->

                  </div>
                  <div class="clearfix"></div>


                  <div class="padding-lg text-justify small padding-lg bg-muted tourStepEnd">
                    <h6 class="margin-remove text-center">Developers & Contributors</h6>
                    <p class="text-muted small">
                      The FPA script has been developed by, and is copyright of the following contributors; Russell Winter, Phil DeGruy, Claire Mandville, Bernard Toplak & Sveinung Larsen. <a class="text-primary" href="https://github.com/ForumPostAssistant" target="_blank">Visit the FPA Github Project</a>.
                    </p>

                    <h6 class="margin-remove text-center">Licensing & Disclaimer</h6>
                    <p class="text-muted small">
                      <?php echo _RES .' '. _FPA_VER_SHORT .''. _RES_VERSION .'.'. _RES_VERSION_MAINT .' ['. _RES_RELEASE_TYPE .'] '. _RES_RELEASE_BUILD; ?> script comes with ABSOLUTELY NO WARRANTY.  This is free software; and covered under the <strong>GNU GPLv3 or later license</strong>. You are welcome to redistribute it under certain conditions. For details read the LICENSE.txt file included in the download package with this script. A copy of the license may also be obtained at <a class="text-primary" href="http://www.gnu.org/licenses/" target="_blank">http://www.gnu.org/licenses/</a>.
                    </p>

                  </div>

                </div><!--/right-column-->

              </div><!--/.row-->
              <div class="clearfix"></div>


            </div><!--/#legends-section-->

            <p class="text-muted text-center margin-top-lg small">
              <?php echo _RES .' '. _FPA_VER_SHORT .''. _RES_VERSION .'.'. _RES_VERSION_MAINT .' ['. _RES_RELEASE_TYPE .'] '. _RES_RELEASE_BUILD; ?> <sup>&copy;</sup>2011-<?php echo date('Y'); ?>
            </p>

          </div><!--/#content-->

        </div><!--/.page-->

      </div><!--/.wrapper-->






      <?php
        /* NOTE (RussW): FOOTER - Navigation
         * download links, delete fpa & copyright
         * copyright & contributor popovers removed, moved to legends text section (RussW 23/04/2018)
         *
         */
      ?>
      <footer id="copyright" class="navbar-fixed-bottom bg-muted hidden-print tourStep10">
        <div class="container">
          <div class="btn-toolbar">

            <div class="btn-group btn-group-xs text-success download-info hidden-xs">
              <a href="https://github.com/ForumPostAssistant/FPA/zipball/en-GB/%C2%A0%20Language%20en-GB" tabindex="3" class="" role="button">
                <i class="glyphicon glyphicon-download-alt"></i> Latest (.zip) Download
              </a>
            </div>

            <div class="btn-group btn-group-xs text-success download-info hidden-xs">
              <a href="https://github.com/ForumPostAssistant/FPA/tarball/en-GB/%C2%A0%20Language%20en-GB" tabindex="3" class="" role="button">
                <i class="glyphicon glyphicon-download-alt"></i> Latest (.tar.gz) Download
              </a>
            </div>

            <div class="btn-group btn-group-xs text-danger security-info">
              <a tabindex="2" class="" role="button" data-toggle="popover" title="<span class='text-danger'><i class='glyphicon glyphicon-warning-sign'></i> Important Security Notice</span>" data-content="<span class='text-danger'>Due to the highly sensitive nature of the information displayed by the FPA script, <b>it should be removed from the server immediately after use</b>. If the script is left on the site, it can be used to gather enough information to illegally access, deface or hack your site.</span>">
                <i class="glyphicon glyphicon-warning-sign"></i> Security Notice
              </a>
            </div>

            <div class="btn-group btn-group-xs text-danger delete-fpa">
              <a href="fpa-en.php?act=delete" tabindex="3" class="" role="button">
                <i class="glyphicon glyphicon-remove-circle"></i> Delete FPA
              </a>
            </div>

            <div class="btn-group btn-group-xs text-primary copyright">
              <?php echo _RES .' ('. _FPA_VER_SHORT .''. _RES_VERSION .'.'. _RES_VERSION_MAINT .' ['. _RES_RELEASE_TYPE .'] '. _RES_RELEASE_BUILD; ?>) 2011-<?php echo date('Y'); ?><sup>&copy;</sup>
            </div>

          </div>
        </div>
      </footer><!--/#copyright footer-->






      <?php
        /* NOTE (RussW): Back-To-Top Link
         *
         */
      ?>
      <a id="back-to-top" href="#home-section" class="btn btn-primary btn-sm back-to-top" role="button">
         <span class="glyphicon glyphicon-chevron-up"></span>
      </a>






      <?php
        /* NOTE (RussW): CDN JS INCLUDES - Required BS/jQuery
         * initialisation & configuration of js/jquery objects used in fpa
         */
      ?>
      <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

      <?php
        /* NOTE (RussW): Bootstrap CDN Link
         * only load if FPATour is clicked
         *
         */
      ?>
      <?php if ($runFPATour == '1'): ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.11.0/js/bootstrap-tour.min.js" integrity="sha256-AFoIN2Z5u5QDw8n9X0FoP/p1ZhE1xDnsgHlCMWE0yYQ=" crossorigin="anonymous"></script>
      <?php endif; ?>




      <?php
        /* NOTE (RussW): SCRIPTS - Offline?
         * if jQuery cannot be loaded, assume offline and show a message
         *
         */
      ?>
      <script>
        if (typeof jQuery == 'undefined') {
          var d = document.getElementById('wrapper');
            d.className += " hidepage";
            document.write('<h2 style="text-align:center;margin-top:10%;"><?php echo _RES; ?><br /><?php echo _FPA_VER_SHORT .''. _RES_VERSION; ?></h2>');
            document.write('<div class="border-all bg-muted padding-lg" style="text-align:center;margin:25px 10vw;"><?php echo _FPA_OFFLINE; ?><?php echo _FPA_OFFLINE_MESSAGE; ?></div>');
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
         * only set if $runFPATour=1 from sidebar link (using $_GET['tour'])
         * configuration information at bootstraptour.com
         */
      ?>
      <?php if ($runFPATour == '1'): ?>
        <script>
          var tour = new Tour({
            name:           'test3',
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
                            ',
            smartPlacement: true,
            storage:        false,
            debug:          true,
            animation:      true,
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
              element:      '.tourStep20',
              title:        '<?php echo _TOUR_STEP20_TITLE; ?>',
              content:      '<?php echo _TOUR_STEP20_DESC; ?>',
              onShown:      function (tour) {
                              $('#collapseOne').toggleClass('in');
                            }
            },
            {
              // accordion - settings : generate post
              element:      '.tourStep25',
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
              element:      '.tourStep30',
              title:        '<?php echo _TOUR_STEP30_TITLE; ?>',
              content:      '<?php echo _TOUR_STEP30_DESC; ?>',
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

          // Initialize the tour
          tour.init();
          // Start the tour
          tour.start();
        </script>
      <?php endif; ?>


    </body>
</html>