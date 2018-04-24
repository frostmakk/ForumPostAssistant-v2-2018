<?php
  /** TESTING ONLY - DELETE ME ****************************************/
  //error_reporting(0);
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


  /* TODO (ALL): FPA Versioning & Revisioning
   * remember to update revision information
   */
	define ( '_RES', 'Forum Post Assistant' );     // FPA resource long name
	define ( '_RES_SHORT', 'FPA' );                // FPA resource short name
	define ( '_RES_VERSION', '2.0' );              // major revision (x.y)
	define ( '_RES_VERSION_MAINT', '0' );          // maintenance/patch revision (.z)
	define ( '_RES_RELEASE_BUILD', 'Alpha' );       // dev status revision ( :A(lpha), :B(eta), :RC, :F(inal) )
	define ( '_RES_LAST_UPDATED', '22/04/2018' );  // release date (dd/mm/yyyy)
	define ( '_RES_BRANCH', 'en-GB' );             // Github branch location
	define ( '_RES_LANG', 'en-GB' );               // Country/Language Code


	/* NOTE (ALL): Set Joomla! parent flags
	 *
	 */
	define ( '_VALID_MOS', 1 );                    // for J!1.0
	define ( '_JEXEC', 1 );                        // for J!1.5, J!1.6, J!1.7, J!2.5, J!3.0

	/* NOTE (ALL): FPA specific definitions & constants
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


	/* NOTE (ALL): Output definitions & constants
   * fpa output language strings
	 */

  if ($runFPATour == '1'):
    /* FPA Tour language constants */
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
	define ( '_FPA_VER_SHORT', 'v' ); /* Russw : new v2.0.0 */
	define ( '_FPA_EXPLAIN', 'Explain' ); /* Russw : new v2.0.0 */

	define ( '_FPA_Y', 'Yes' );
	define ( '_FPA_N', 'No' );
	define ( '_FPA_Y_ICON', '<i class="glyphicon glyphicon-ok-sign text-success"></i>' ); /* Russw : new v2.0.0 */
	define ( '_FPA_N_ICON', '<i class="glyphicon glyphicon-remove-sign text-danger"></i>' ); /* Russw : new v2.0.0 */
	define ( '_FPA_U_ICON', '<i class="glyphicon glyphicon-question-sign text-warning"></i>' ); /* Russw : new v2.0.0 */
	/* end fpa language definitions & constants */
?>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title><?php echo _RES .' : '. _FPA_VER_SHORT .''. _RES_VERSION .'.'. _RES_VERSION_MAINT .'-'. _RES_RELEASE_BUILD .' - '. _RES_LANG; ?></title>

	      <?php
  	      // attempt to find and display a favicon
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
        <style>

        </style>
        <link rel="stylesheet" href="fpa-style.css">

    </head>
    <body data-spy="scroll" data-target="#navbar-sidebar">


<script>
  // TODO (RussW): test if jQuery loaded (assumed offline/no-internet otherwise) , if not display a notice as jQ & BS are now required for FPA
  //if (typeof jQuery == 'undefined') {
    // jQuery IS NOT loaded, do stuff here.
  //}
</script>


      <?php
        /* NOTE (RussW): full page & content wrapper
         * ALL: full-width
         * display = flex, align-items = stretch
         */
      ?>
      <div class="wrapper">

        <?php
          /* NOTE (RussW): sidebar navigation
           * LG: 250px wide (fixed)
           * MD: 80px wide (collapsed, scrolling)
           * shortcut links to sections
           */
        ?>
        <nav id="sidebar" class="bg-primary">
          <div id="navbar-sidebar" class="sidebar-affix">

            <div class="sidebar-header">
              <h4 class="text-center margin-remove-bottom">
                <?php
                  // attempt to find and display a joomla logo
                  if (file_exists('./administrator/templates/bluestork/images/logo.png')):
                    $logoPath = './administrator/templates/bluestork/images/logo.png';
                    elseif (file_exists('./administrator/templates/isis/images/logo.png')):
                    $logoPath = './administrator/templates/isis/images/logo.png';
                    elseif (file_exists('./administrator/templates/atum/images/logo.svg')):
                    $logoPath = './administrator/templates/atum/images/logo.svg';
                    endif;
                ?>
                <?php if ($logoPath): ?>
                  <img src="<?php echo $logoPath; ?>" width="175" height="35" />
                <?php endif; ?>

                <?php echo _RES; ?>
              </h4>
              <strong style="border:2px solid #fff;padding:8px;border-radius:50%;width:58px;height:58px;line-height:1.8;">
                <?php echo _RES_SHORT; ?>
              </strong>

          	  <div class="text-center small">
            	  <?php echo _FPA_VER_SHORT .''. _RES_VERSION .'.'. _RES_VERSION_MAINT .'-'. _RES_RELEASE_BUILD; ?>
              </div>

            </div><!--/.sidebar-header-->

            <ul class="nav nav-pills nav-stacked components tourStep05" >
              <li class="active">
                <a href="#fpa-home">
                  <i class="glyphicon glyphicon-home"></i>
                  Home
                </a>
                <!--
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                  <i class="glyphicon glyphicon-home"></i>
                  Home
                </a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                  <li><a href="#">Home 1</a></li>
                  <li><a href="#">Home 2</a></li>
                  <li><a href="#">Home 3</a></li>
                </ul>
                -->
              </li>
              <li>
                <a href="#snapshot-section">
                  <i class="glyphicon glyphicon-briefcase"></i>
                  Snapshot Dashboard
                </a>
              </li>
              <li>
                <a href="#instance-discovery-section">
                  <i class="glyphicon glyphicon-briefcase"></i>
                  Instance Discovery
                </a>
<!--
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                  <i class="glyphicon glyphicon-duplicate"></i>
                  Pages
                </a>

                <ul class="collapse list-unstyled" id="pageSubmenu">
                  <li><a href="#">Page 1</a></li>
                  <li><a href="#">Page 2</a></li>
                  <li><a href="#">Page 3</a></li>
                </ul>
-->
              </li>
              <li>
                <a href="#">
                  <i class="glyphicon glyphicon-link"></i>
                  Portfolio
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="glyphicon glyphicon-paperclip"></i>
                  FAQ
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

<!--
          <div style="position: absolute;bottom: 0;left: 0; right:0;max-width:250px;">
            <ul class="list-unstyled CTAs">
              <li>
                <a href="fpa-en.php?act=delete" class="btn btn-danger btn-lg text-center" role="button">
                  <i class="glyphicon glyphicon-remove-circle"></i> Delete FPA
                </a>
              </li>
              <li><a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a></li>
              <li><a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a></li>
            </ul>
          </div>
-->

        </nav><!--/#sidebar-->


        <?php
          /* NOTE (RussW): main page container
           *       LG: dymanic-width
           * XS/SM/MD: full-width
           */
        ?>
        <div id="fpa-home" class="page">


          <?php
            /* NOTE (RussW): main page navigation & notification
             * XS/SM/MD/LG: fixed top
             *       XS/SM: joomla! & forum links hidden
             *          XS: navbar-right hidden
             * collapse/in sidebar button, privacy & security notices, delete button, offsite links
             */
          ?>
          <nav class="navbar navbar-default tourStep00">

            <div class="container-fluid">

              <div id="header-fixed" class="navbar-header">

                <div class="btn-toolbar navbar-left">
                  <div class="btn-group" role="group">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary navbar-btn">
                      <i class="glyphicon glyphicon-transfer"></i>
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
                  <li><a href="https://github.com/ForumPostAssistant/FPA/releases" target="_blank" class="btn btn-default btn-xs navbar-btn" role="button"><span class="text-primary"><i class="glyphicon glyphicon-download-alt"></i> Download</span></a></li>
                </ul><!--/.navbar-right-->
              </div><!--/.navbar-collapse-->

            </div><!--/.container-fluid-->

          </nav><!--/.navbar-default-->



            <?php
              /* NOTE (RussW): start fpa settings & post output section
               * XS/SM/MD/LG: page full-width
               * accordion - settings & output panels
               */
            ?>
            <div id="settings-section">


              <div class="container-fluid">

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                  <div class="panel panel-default">

                    <div class="panel-heading" role="tab" id="headingOne">
                      <h4 class="panel-title tourStep20">
                        <button class="btn btn-info btn-xs pull-right clearfix" type="button" data-toggle="collapse" data-target="#collapseExplainSettings" aria-expanded="false" aria-controls="collapseExplainSettings">
                          <i class="glyphicon glyphicon-info-sign"></i><span class="hidden-xs">&nbsp;<?php echo _FPA_EXPLAIN; ?></span>
                        </button>
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <i class="glyphicon glyphicon-tasks"></i> FPA Settings
                        </a>
                      </h4>
                    </div>

                    <div id="collapseOne" class="panel-collapse collapse /*in*/" role="tabpanel" aria-labelledby="headingOne">
                      <div class="panel-body">

                        <form method="post" name="postDetails" id="postDetails" class="form-horizontal">

                          <div class="row-fluid">

                            <div class="col-sm-12 col-lg-6">
                              <div class="bg-muted" style="min-height:350px;">

                                <fieldset id="optionalInformation" <?php echo $disabled; ?>>
                                  <legend>Optional Information:</legend>

                                  <p class="small text-muted" style="min-height:35px;">
                                  <?php if ( !empty($disabled) ): ?>
                                    Options Are Disabled. Check the <span class="label label-warning">Snapshot Dashboard</span> for more information.
                                  <?php else: ?>
                                    You may add additional (optional) trouble-shooting information to your forum post if desired. Leave empty to ignore.
                                  <?php endif; ?>
                                  </p>
                                  <br />

                                  <div class="form-group">
                                    <label for="probDSC" class="col-sm-5 control-label">Problem Description</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control input-sm" id="probDSC" name="probDSC" placeholder="Problem Description">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="probMSG1" class="col-sm-5 control-label">Log/Error Message</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control input-sm" id="probMSG1" name="probMSG1" placeholder="Log/Error Message" />
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="probMSG2" class="col-sm-5 control-label">Last Reported Error</label>
                                    <div class="col-sm-7">
    									              <?php if ( isset($phpenv['phpLASTERR']) ): ?>
                                      <input type="text" class="form-control input-sm" id="probMSG2" name="probMSG2" value="<?php echo $phpenv['phpLASTERR']; ?>" placeholder="Last Reported Error" aria-describedby="lastErrorHelp" />
                                      <span id="lastErrorHelp" class="help-block line-height-normal small"><i class="glyphicon glyphicon-info-sign"></i> auto-completed from your php error log</span>
                                    <?php else: ?>
                                      <input type="text" class="form-control input-sm" id="probMSG2" name="probMSG2" placeholder="Last Reported Error" />
                                    <?php endif; ?>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="probACT" class="col-sm-5 control-label">Actions Taken To Resolve?</label>
                                    <div class="col-sm-7">
                                      <textarea class="form-control input-sm" id="probACT" name="probACT" rows="2" placeholder="Action Taken To Resolve?"></textarea>
                                    </div>
                                  </div>
                                </fieldset>

                              </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                              <div class="bg-muted" style="min-height:350px;">

                                <fieldset id="runtimeOptions" <?php echo $disabled; ?>>
                                  <legend>Runtime Options:</legend>

                                  <p class="small text-muted" style="min-height:35px;">
                                  <?php if ( !empty($disabled) ): ?>
                                    Options Are Disabled. Check the <span class="label label-warning">Snapshot Dashboard</span> for more information.
                                  <?php else: ?>
                                    Determine what information is included in your forum post, modify the default selections to suit your problem and privacy requirements.
                                  <?php endif; ?>
                                  </p>
                                  <br />

                                  <div class="row-fluid">
                                    <div class="col-sm-6 col-md-6">

                                      <strong>Optional Display Settings</strong>
                                      <div class="checkbox">
                                        <label>
                                          <input type="checkbox" value="">
                                          Show Elevated Permissions
                                        </label>
                                      </div>

                                      <div class="checkbox">
                                        <label>
                                          <input type="checkbox" value="">
                                          Show Components
                                        </label>
                                      </div>

                                      <div class="checkbox">
                                        <label>
                                          <input type="checkbox" value="">
                                          Show Modules
                                        </label>
                                      </div>

                                      <div class="checkbox">
                                        <label>
                                          <input type="checkbox" value="">
                                          Show Plugins
                                        </label>
                                      </div>

                                      <div class="checkbox" style="margin-left: 20px;">
                                        <label>
                                          <input type="checkbox" value="">
                                           <i>Include Core Extensions</i>
                                        </label>
                                      </div>

                                      <div class="checkbox">
                                        <label>
                                          <input type="checkbox" value="">
                                          Show database table statistics
                                        </label>
                                      </div>
                                      <br />

                                    </div>
                                    <div class="col-sm-6 col-md-6">

                                      <strong>Information Privacy Settings</strong>
                                      <div class="radio">
                                        <label>
                                          <input type="radio" name="showProtected" id="showProtected" value="1" aria-describedby="privacyNoneHelp" />
                                          None
                                        <span id="privacyNoneHelp" class="help-block line-height-normal small"><i class="glyphicon glyphicon-info-sign"></i> no elements are masked</span>
                                        </label>
                                      </div>

                                      <div class="radio">
                                        <label>
                                          <input type="radio" name="showProtected" id="showProtected" value="2" aria-describedby="privacyPartialHelp" checked />
                                          Partial <i>(Default)</i>
                                        <span id="privacyPartialHelp" class="help-block line-height-normal small"><i class="glyphicon glyphicon-info-sign"></i> some elements are masked</span>
                                        </label>
                                      </div>

                                      <div class="radio">
                                        <label>
                                          <input type="radio" name="showProtected" id="showProtected" value="3" aria-describedby="privacyPartialHelp" />
                                          Strict
                                        <span id="privacyNoneHelp" class="help-block line-height-normal small"><i class="glyphicon glyphicon-info-sign"></i> all identifiable elements are masked</span>
                                        </label>
                                      </div>
                                      <br />

                                    </div>
                                  </div><!--/.row-->





                                </fieldset>

                              </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                              <br />
                              <div class="">

                                <fieldset>
                                  <legend>dfsdfsdfds</legend>
                  							  <input type="hidden" name="doIT" value="1" />

                                  <div class="row-fluid">

                                    <div class="col-sm-12 col-md-6 text-center">

                                      <p>Click the <span class="label label-success">Generate Post Content</span> button to build your post information</p>

                                    </div>
                                    <div class="col-sm-12 col-md-6 text-center">

                                      <div class="border-all padding-top-lg padding-bottom-lg tourStep25">
                                        <div class="btn-group" role="group">
        								                  <input type="submit" class="btn btn-success btn-lg" name="submit" value="Generate Post Content" />
                                          <input type="reset" class="btn btn-default btn-lg" name="reset" value="reset" />
                                        </div>
                                      </div>

                                      <div class="checkbox margin-top-lg border-all">
                                        <label>
                                          <input type="checkbox"name="increasePOPS" value="1" aria-describedby="increasePOPSHelp">
                                          PHP "Out of Memory" or "Execution Time-Outs" errors?
                                          <span id="increasePOPSHelp" class="help-block line-height-normal small"><i class="glyphicon glyphicon-info-sign"></i> temporarily increase PHP memory and execution time</span>
                                        </label>
                                      </div><!--/.checkbox-->

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
                        <h4><i class="glyphicon glyphicon-info-sign"></i> FPA Settings</h4>

                        <p>In order to collect relevant configuration & diagnostic information for you to generate a forum post, FPA needs to know what sort of problem you are observing and what information you wish to share in the forum. Please follow the instruction below to select the desired options and then click the <span class="label label-success">Generate Post Content</span> button.</p>
                        <br />
                        <ol>
                          <li>Enter your problem description <i>(optional)</i></li>
                          <li>Enter any error messages you see <i>(optional)</i></li>
                          <li>Enter any actions taken to resolve the issue <i>(optional)</i></li>
                          <li>Select detail & privacy level options of the output <i>(optional)</i></li>
                          <li>Click the <span class="label label-success">Generate Post Content</span> button to build the post content</li>
                          <li>Copy the contents of the <span class="label label-info">Forum Post Content</span> box (below) and paste it into a forum post</li>
                        </ol>
                      </div>
                    </div>

                  </div>


                  <div class="panel panel-default">

                    <div class="panel-heading" role="tab" id="headingTwo">
                      <h4 class="panel-title tourStep30">
                        <button class="btn btn-info btn-xs pull-right clearfix" type="button" data-toggle="collapse" data-target="#collapseExplainPostContent" aria-expanded="false" aria-controls="collapseExplainPostContent">
                          <i class="glyphicon glyphicon-info-sign"></i><span class="hidden-xs">&nbsp;<?php echo _FPA_EXPLAIN; ?></span>
                        </button>
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          <i class="glyphicon glyphicon-paste"></i> Forum Post Content
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                      <div class="panel-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>

                    <div class="collapse container-fluid clearfix" id="collapseExplainPostContent">
                      <br />
                      <div class="alert alert-info" role="alert">
                        <h4><i class="glyphicon glyphicon-info-sign"></i> Forum Post Content</h4>
                        <p>POST CONTENT Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                      </div>
                    </div>


                  </div>

                </div><!--/#accordion-->

              </div><!--/.container-fluid-->
            </div><!--/@settings-section-->





          <?php
            /* NOTE (RussW): start fpa content visual output
             * XS/SM/MD/LG: page full-width
             * diagnostic & troubleshooting visual information sections container
             */
          ?>
          <div id="content">


            <?php
              /* NOTE (RussW): snapshot section
               * XS/SM/MD/LG: page full-width
               * generic top-level environment information
               */
            ?>


<!--TESTING-->
            <section id="basic-discovery" class="container-fluid">
              <div class="page-header">
                <h2>
                  <button class="btn btn-info btn-xs pull-right clearfix tourStep15" type="button" data-toggle="collapse" data-target="#collapseExplainBasic" aria-expanded="false" aria-controls="collapseExplainBasic">
                    <i class="glyphicon glyphicon-info-sign"></i><span class="hidden-xs">&nbsp;<?php echo _FPA_EXPLAIN; ?></span>
                  </button>
                  Basic Discovery
                </h2>

                <p class="lead">The FPA Discovery Section presents any basic information that FPA has managed to discover about your hosting server, database & php environments, installed functions and any discovered Joomla! instance.</p>

                <div class="collapse clearfix" id="collapseExplainBasic">
                  <div class="alert alert-info" role="alert">
                    <h4><i class="glyphicon glyphicon-info-sign"></i> Basic Discovery Dashboard</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  </div>
                </div><!--/#collapseExplainBasic-->
              </div><!--/.page-header-->



<div id="basic-discovery-environment" class="row">

  <div class="col-xs-12 col-md-3 col-lg-3 subsection-heading">
    <h3 class="margin-remove text-muted">Environment Discovery</h3>
    <p class="text-muted">this is some basic information about whats happening. this is always included in the forum post output.</p>

  </div><!--/.subsection-heading-->

  <div class="col-xs-12 col-md-9 col-lg-9 subsection-content">


    <div class="row content-container">

      <div class="col-xs-12 col-md-4 content-item">

        <div class="panel panel-default item">
          <div class="panel-heading">PHP</div>
          <table class="table table-condensed" style="table-layout:fixed;min-width:100%;">
            <tbody>
              <tr>
                <td class="small text-truncate"><span class="text-truncate">PHP Version</span></td>
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

      <div class="col-xs-12 col-md-4 content-item">

        <div class="panel panel-default item">
          <div class="panel-heading">DataBase</div>
          <table class="table table-condensed" style="table-layout:fixed;min-width:100%;">
            <tbody>
              <tr>
                <td class="small text-truncate"><span class="text-truncate">MySQL Version</span></td>
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

      <div class="col-xs-12 col-md-4 content-item">

        <div class="panel panel-default item">
          <div class="panel-heading">PHP</div>
          <table class="table table-condensed" style="table-layout:fixed;min-width:100%;">
            <tbody>
              <tr>
                <td class="small text-truncate"><span class="text-truncate">PHP Version</span></td>
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

</div><!--/#basic-discovery-container-->

            </section><!--/#basic-discovery-->
<!--/TESTING-->






            <section id="snapshot-section" class="container-fluid">
              <div class="page-header">
                <h2>
                  <button class="btn btn-info btn-xs pull-right clearfix tourStep15" type="button" data-toggle="collapse" data-target="#collapseExplainSnapshot" aria-expanded="false" aria-controls="collapseExplainSnapshot">
                    <i class="glyphicon glyphicon-info-sign"></i><span class="hidden-xs">&nbsp;<?php echo _FPA_EXPLAIN; ?></span>
                  </button>
                  Snapshot Dashboard
                </h2>
              </div>

              <div class="collapse clearfix" id="collapseExplainSnapshot">
                <div class="alert alert-info" role="alert">
                  <h4><i class="glyphicon glyphicon-info-sign"></i> Snapshot Dashboard</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
              </div>

              <div class="row tourStep16">

                <div class="col-xs-6 col-sm-4 col-md-3">
                  <div class="panel panel-default text-center">
                    <div class="panel-heading line-height-normal">PHP Supports J!3.5.0</div>
                    <div class="panel-body">
                      <span class="label label-success label-large"><?php echo _FPA_Y; ?></span>
                    </div>
                  </div>
                </div>

                <div class="col-xs-6 col-sm-4 col-md-3">
                  <div class="panel panel-default text-center">
                    <div class="panel-heading line-height-normal">MySQL Supports J!3.5.0</div>
                    <div class="panel-body">
                      <span class="label label-success label-large"><?php echo _FPA_Y; ?></span>
                    </div>
                  </div>
                </div>

                <div class="clearfix visible-xs-block"></div><!--/responsive-column-reset-->

                <div class="col-xs-6 col-sm-4 col-md-3">
                  <div class="panel panel-danger text-center">
                    <div class="panel-heading line-height-normal">PHP Supports MySQL</div>
                    <div class="panel-body">
                      <span class="label label-danger label-large"><?php echo _FPA_N; ?></span>
                    </div>
                  </div>
                </div>

                <div class="clearfix visible-sm-block"></div><!--/responsive-column-reset-->

                <div class="col-xs-6 col-sm-4 col-md-3">
                  <div class="panel panel-warning text-center">
                    <div class="panel-heading line-height-normal">PHP Supports MySQLi</div>
                    <div class="panel-body">
                      <span class="label label-warning label-large"><?php echo _FPA_N; ?></span>
                    </div>
                  </div>
                </div>

                <div class="clearfix visible-xs-block visible-md-block visible-lg-block"></div><!--/responsive-column-reset-->

                <div class="col-xs-6 col-sm-4 col-md-3">
                  <div class="panel panel-default text-center">
                    <div class="panel-heading">MySQL Version</div>
                    <div class="panel-body">
                      <span class="label label-info label-large">5.6.38</span>
                    </div>
                  </div>
                </div>

                <div class="col-xs-6 col-sm-4 col-md-3">
                  <div class="panel panel-default text-center">
                    <div class="panel-heading">Panel heading</div>
                    <div class="panel-body">
                      6
                    </div>
                  </div>
                </div>

                <div class="clearfix visible-xs-block visible-sm-block"></div><!--/responsive-column-reset-->

                <div class="col-xs-6 col-sm-4 col-md-3">
                  <div class="panel panel-default text-center">
                    <div class="panel-heading">OS</div>
                    <div class="panel-body">
                      Linux
                    </div>
                  </div>
                </div>

                <div class="col-xs-6 col-sm-4 col-md-3">
                  <div class="panel panel-default text-center">
                    <div class="panel-heading">Panel heading</div>
                    <div class="panel-body">
                      6
                    </div>
                  </div>
                </div>

                <div class="clearfix visible-xs-block visible-md-block visible-lg-block"></div><!--/responsive-column-reset-->

                <div class="col-xs-6 col-sm-4 col-md-3">
                  <div class="panel panel-default text-center">
                    <div class="panel-heading">OS</div>
                    <div class="panel-body">
                      Linux
                    </div>
                  </div>
                </div>

                <div class="clearfix visible-sm-block"></div><!--/responsive-column-reset-->

                <div class="col-xs-6 col-sm-4 col-md-3">
                  <div class="panel panel-default text-center">
                    <div class="panel-heading">Panel heading</div>
                    <div class="panel-body">
                      6
                    </div>
                  </div>
                </div>

                <div class="clearfix visible-xs-block"></div><!--/responsive-column-reset-->

                <div class="col-xs-6 col-sm-4 col-md-3">
                  <div class="panel panel-default text-center">
                    <div class="panel-heading">OS</div>
                    <div class="panel-body">
                      Linux
                    </div>
                  </div>
                </div>

                <div class="col-xs-6 col-sm-4 col-md-3">
                  <div class="panel panel-default text-center">
                    <div class="panel-heading">Panel heading</div>
                    <div class="panel-body">
                      6
                    </div>
                  </div>
                </div>

              </div><!--/.row-->
            </section><!--/#snapshot-section-->


            <?php
              /* NOTE (RussW): instance discovery section
               * XS/SM/MD/LG: page full-width
               * basic instance discovery & configuration
               */
            ?>
            <section id="instance-discovery-section" class="container-fluid">

              <div class="page-header">
                <h2>
                  <button class="btn btn-info btn-xs pull-right clearfix" type="button" data-toggle="collapse" data-target="#collapseExplainOverview" aria-expanded="false" aria-controls="collapseExplainOverview">
                    <i class="glyphicon glyphicon-info-sign"></i><span class="hidden-xs">&nbsp;<?php echo _FPA_EXPLAIN; ?></span>
                  </button>
                  Instance Discovery
                </h2>
              </div>

              <div class="collapse clearfix" id="collapseExplainOverview">
                <div class="alert alert-info" role="alert">
                  <h4><i class="glyphicon glyphicon-info-sign"></i> Overview Section</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
              </div>

              <div class="row">

                <div class="col-sm-12 col-md-6 outer-col">

                  <div class="panel panel-info panel-outer">
                    <div class="panel-heading"><h4 class="margin-remove">Application Instance :: Discovery</h4></div>
                    <div class="panel-body padding-remove">

                      <div class="row col-xs-12 padding-sm">

                        <div class="col-xs-6 col-sm-6 col-md-6 padding-sm inner-col">
                          <table class="table margin-top-sm">
                            <tr>
                              <td class="text-center bg-muted border-all"><h4 class="small margin-remove">CMS Found</h4></td>
                            </tr>
                            <tr>
                              <td class="text-center">Joomla!</td>
                            </tr>
                            <tr>
                              <td class="text-center">v3.5.0</td>
                            </tr>
                            <tr>
                              <td class="text-center"><span class="label label-info label-large">Stable</span></td>
                            </tr>
                          </table>
                        </div><!--/.inner-col-->

                        <div class="col-xs-6 col-sm-6 col-md-6 padding-sm inner-col">
                          <table class="table margin-top-sm">
                            <tr>
                              <td class="text-center bg-muted border-all"><h4 class="small margin-remove">J! Platform</h4></td>
                            </tr>
                            <tr>
                              <td class="text-center">Joomla! Platform</td>
                            </tr>
                            <tr>
                              <td class="text-center">v13.1.0</td>
                            </tr>
                            <tr>
                              <td class="text-center"><span class="label label-info label-large">Stable</span></td>
                            </tr>
                          </table>
                        </div><!--/.inner-col-->

                        <div class="col-xs-6 col-sm-6 col-md-6 padding-sm inner-col">
                          <table class="table margin-top-sm">
                            <tr>
                              <td class="text-center bg-muted border-all"><h4 class="small margin-remove">Config Found</h4></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?php echo _FPA_Y_ICON; ?> Valid</td>
                            </tr>
                            <tr>
                              <td class="text-center">v3.5</td>
                            </tr>
                            <tr>
                              <td class="text-center"><span class="label label-info label-large">Matches CMS</span></td>
                            </tr>
                          </table>
                        </div><!--/.inner-col-->

                        <div class="col-xs-6 col-sm-6 col-md-6 padding-sm inner-col">
                          <table class="table margin-top-sm">
                            <tr>
                              <td class="text-center bg-muted border-all"><h4 class="small margin-remove">Config Mode</h4></td>
                            </tr>
                            <tr>
                              <td class="text-center text-success">444</td>
                            </tr>
                            <tr>
                              <td class="text-center">demohotm : demohotm</td>
                            </tr>
                            <tr>
                              <td class="text-center"><span class="label label-info label-large">Read Only</span></td>
                            </tr>
                          </table>
                        </div><!--/.inner-col-->

                      </div><!--/.row-fluid, col-xs-12-->

                    </div><!--/.panel-body-->
                  </div><!--/.panel, outer-->

                </div><!--/.oouter-col-->
                <div class="col-sm-12 col-md-6 outer-col">

                  <div class="panel panel-info panel-outer">
                    <div class="panel-heading"><h4 class="margin-remove">Application Instance :: Discovery</h4></div>
                    <div class="panel-body padding-remove">

                      <div class="row col-xs-12 padding-sm">

                        <div class="col-xs-6 col-sm-6 col-md-6 padding-sm inner-col">
                          <table class="table margin-top-sm">
                            <tr>
                              <td class="text-center bg-muted border-all"><h4 class="small margin-remove">CMS Found</h4></td>
                            </tr>
                            <tr>
                              <td class="text-center">Joomla!</td>
                            </tr>
                            <tr>
                              <td class="text-center">v3.5.0</td>
                            </tr>
                            <tr>
                              <td class="text-center"><span class="label label-info label-large">Stable</span></td>
                            </tr>
                          </table>
                        </div><!--/.inner-col-->

                        <div class="col-xs-6 col-sm-6 col-md-6 padding-sm inner-col">
                          <table class="table margin-top-sm">
                            <tr>
                              <td class="text-center bg-muted border-all"><h4 class="small margin-remove">J! Platform</h4></td>
                            </tr>
                            <tr>
                              <td class="text-center">Joomla! Platform</td>
                            </tr>
                            <tr>
                              <td class="text-center">v13.1.0</td>
                            </tr>
                            <tr>
                              <td class="text-center"><span class="label label-info label-large">Stable</span></td>
                            </tr>
                          </table>
                        </div><!--/.inner-col-->

                        <div class="col-xs-6 col-sm-6 col-md-6 padding-sm inner-col">
                          <table class="table margin-top-sm">
                            <tr>
                              <td class="text-center bg-muted border-all"><h4 class="small margin-remove">Config Found</h4></td>
                            </tr>
                            <tr>
                              <td class="text-center"><?php echo _FPA_Y_ICON; ?> Valid</td>
                            </tr>
                            <tr>
                              <td class="text-center">v3.5</td>
                            </tr>
                            <tr>
                              <td class="text-center"><span class="label label-info label-large">Matches CMS</span></td>
                            </tr>
                          </table>
                        </div><!--/.inner-col-->

                        <div class="col-xs-6 col-sm-6 col-md-6 padding-sm inner-col">
                          <table class="table margin-top-sm">
                            <tr>
                              <td class="text-center bg-muted border-all"><h4 class="small margin-remove">Config Mode</h4></td>
                            </tr>
                            <tr>
                              <td class="text-center text-success">444</td>
                            </tr>
                            <tr>
                              <td class="text-center">demohotm : demohotm</td>
                            </tr>
                            <tr>
                              <td class="text-center"><span class="label label-info label-large">Read Only</span></td>
                            </tr>
                          </table>
                        </div><!--/.inner-col-->

                      </div><!--/.row-fluid, col-xs-12-->

                    </div><!--/.panel-body-->
                  </div><!--/.panel, outer-->

                </div><!--/.outer-col-->


              </div><!--/.row-->
            </section><!--/#application-instance-section-->


            <?php
              /* NOTE (RussW): database discovery section
               * XS/SM/MD/LG: page full-width
               * basic database discovery & configuration
               */
            ?>
            <section id="database-discovery-section" class="container-fluid">

              <div class="page-header">
                <h2>Discovery Section</h2>
              </div>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


              <div class="row">

                <div class="col-sm-12 col-md-6">
                  <div class="panel panel-default">
                    <div class="panel-heading">Panel With Table</div>
                    <div class="panel-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>
                    <table class="table">
                      <tr><th>heading</th><th>heading</th><th>heading</th></tr>
                      <tr><td>data</td><td>data</td><td>data</td></tr>
                      <tr><td>data</td><td>data</td><td>data</td></tr>
                    </table>
                  </div>
                </div>

                <div class="col-sm-12 col-md-6">
                  <div class="panel panel-default">
                    <div class="panel-heading">Panel With List</div>
                    <div class="panel-body">
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>
                    <ul class="list-group">
                      <li class="list-group-item">Cras justo odio</li>
                      <li class="list-group-item">Dapibus ac facilisis in</li>
                      <li class="list-group-item">Morbi leo risus</li>
                      <li class="list-group-item">Porta ac consectetur ac</li>
                      <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                  </div>
                </div>

                <div class="col-sm-12 col-md-6">
                  <div class="panel panel-default">
                    <div class="panel-heading">Panel With Table</div>
                    <table class="table">
                      <tr><th>heading</th><th>heading</th><th>heading</th></tr>
                      <tr><td>data</td><td>data</td><td>data</td></tr>
                      <tr><td>data</td><td>data</td><td>data</td></tr>
                    </table>
                  </div>
                </div>

                <div class="col-sm-12 col-md-6">
                  <div class="panel panel-default">
                    <div class="panel-heading">Panel heading</div>
                    <ul class="list-group">
                      <li class="list-group-item">Cras justo odio</li>
                      <li class="list-group-item">Dapibus ac facilisis in</li>
                      <li class="list-group-item">Morbi leo risus</li>
                      <li class="list-group-item">Porta ac consectetur ac</li>
                      <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                  </div>
                </div>

              </div><!--/.row-->
            </section><!--/#database-discovery-section-->




            <div class="line"></div>


            <?php
              /* NOTE (RussW): legends & settings section
               * XS/SM/MD/LG: page full-width
               * fpa legends, descriptions and runtime settings display
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

                  <div class="padding-lg text-justify small padding-sm">
                    <h6 class="margin-remove text-center">Developers & Contributors</h6>
                    <p class="text-muted small">
                      The FPA script has been developed by, and is copyright of the following contributors; Russell Winter, Phil DeGruy, Claire Mandville, Bernard Toplak & Sveinung Larsen. <a class="text-primary" href="https://github.com/ForumPostAssistant" target="_blank">Visit the FPA Github Project</a>.
                    </p>

                    <h6 class="margin-remove text-center">Licensing & Disclaimer</h6>
                    <p class="text-muted small">
                      <?php echo _RES .' ('. _FPA_VER_SHORT .''. _RES_VERSION .'.'. _RES_VERSION_MAINT .'-'. _RES_RELEASE_BUILD .')'; ?> script comes with ABSOLUTELY NO WARRANTY.  This is free software; and covered under the <strong>GNU GPLv3 or later license</strong>. You are welcome to redistribute it under certain conditions. For details read the LICENSE.txt file included in the download package with this script. A copy of the license may also be obtained at <a class="text-primary" href="http://www.gnu.org/licenses/" target="_blank">http://www.gnu.org/licenses/</a>.
                    </p>
                    <p class="text-muted text-center small">
                      <?php echo _RES .' ('. _FPA_VER_SHORT .''. _RES_VERSION .'.'. _RES_VERSION_MAINT .'-'. _RES_RELEASE_BUILD .')'; ?> <sup>&copy;</sup>2011-<?php echo date('Y'); ?>
                    </p>
                  </div>

                </div><!--/right-column-->

              </div><!--/.row-->
            <div class="clearfix"></div>


            </div><!--/#legends-section-->


            <a id="back-to-top" href="#home-section" class="btn btn-primary btn-sm back-to-top" role="button">
               <span class="glyphicon glyphicon-chevron-up"></span>
            </a>
            <div class="clearfix"></div>


          </div><!--/#content-->

        </div><!--/.page-->

      </div><!--/.wrapper-->


          <?php
            /* NOTE (RussW): footer navigation section
             * XS/SM/MD/LG: page full-width (fixed-bottom)
             *       XS/SM: download links hidden
             * license, contributors, download links, security notice, delete fpa & copyright
             */
          ?>
          <footer id="copyright" class="navbar-fixed-bottom bg-muted tourStep10">
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
                  <?php echo _RES .' ('. _FPA_VER_SHORT .''. _RES_VERSION .'.'. _RES_VERSION_MAINT .'-'. _RES_RELEASE_BUILD .')'; ?> <sup>&copy;</sup>2011-<?php echo date('Y'); ?>
                </div>

              </div>
            </div>
          </footer><!--/#copyright footer-->


        <?php
          /* NOTE (RussW): required bootstrap/jquery cdn inclusions
           * initialisation & configuration of js/jquery objects used in fpa
           */
        ?>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <?php if ($runFPATour == '1'): ?>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.11.0/js/bootstrap-tour.min.js" integrity="sha256-AFoIN2Z5u5QDw8n9X0FoP/p1ZhE1xDnsgHlCMWE0yYQ=" crossorigin="anonymous"></script>
        <?php endif; ?>

        <?php
          /* NOTE (RussW): custom javascript & jquery scripts
           * initialisation & configuration of js/jquery objects used in fpa
           */
        ?>
        <script type="text/javascript">
          $(document).ready(function () {

            // NOTE (RussW): inititialise the sidebar toggle button actions
            $('#sidebarCollapse').on('click', function () {
              $('#sidebar').toggleClass('active');
              $('.page .navbar').toggleClass('expand');
            });

            // NOTE (RussW): simulate 'smoothscroll' animation with BS sidebar/scrollspy links
            $("#navbar-sidebar ul li a[href^='#']").on('click', function(e) {
              e.preventDefault();
              var hash = this.hash;
              $('html, body').animate({
                scrollTop: $(hash).offset().top
                }, 500, function(){
                // window.location.hash = hash;
              });
            });

            // NOTE (RussW): inititialise different BS popover objects
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

            // NOTE (RussW): initialise back-to-top object
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
         </script>


        <?php
          /* NOTE (RussW): initialisation and configuration for FPA Tour
           * only set if $runFPATour=1 from sidebar link (using $_GET['tour'])
           */
        ?>
        <?php if ($runFPATour == '1'): ?>
          <script type="text/javascript">
            var tour = new Tour({
              name:           'test3',
              template:       '<div class="popover tour">\
                                 <div class="arrow"></div>\
                                 <h3 class="popover-title"><i class="glyphicon glyphicon-blackboard"></i> </h3>\
                                 <div class="popover-content"></div>\
                                 <div class="panel-footer">\
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
                element:      '.tourStep15',
                title:        '<?php echo _TOUR_STEP15_TITLE; ?>',
                content:      '<?php echo _TOUR_STEP15_DESC; ?>',
                placement:    'auto left',
                onShown:      function (tour) {
                                $('#collapseExplainSnapshot').toggleClass('in');
                              },
                onHide:       function (tour) {
                                $('#collapseExplainSnapshot').toggleClass('in');
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
