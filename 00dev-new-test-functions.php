<?php echo '<!-- include '. basename(__FILE__) .' placeholder -->'; ?>

<?php
  /* NOTE (RussW): get the latest FPA release info from github
   * test for cURL being loaded, if it is access the github latest release json page
   *
   */
  $fpaVersionCheck  = '';
  if (extension_loaded('curl')):

    $gitcURL     = 'https://api.github.com/repos/ForumPostAssistant/FPA/releases/latest';  // fpa github json latest release URL
    $ch          = curl_init( $gitcURL );  // init cURL
    $gitcURLOPT  = array ( CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT'],
                           CURLOPT_TIMEOUT => 5,
                           CURLOPT_CONNECTTIMEOUT => 5,
                           CURLOPT_RETURNTRANSFER => true,
                           CURLOPT_HTTPHEADER => array('Content-type: application/json'),
                          );
    curl_setopt_array( $ch, $gitcURLOPT );

    $gitcURLJSON  = curl_exec($ch); // get json result string

    if($gitcURLJSON ===  FALSE):
      $fpaVersionCheck = '';

    else:
      $gitcURLARRAY   = json_decode($gitcURLJSON);  // decode json in to an array
      // TODO (RussW): uncomment in production
      //$thisFPAVER     = _RES_VERSION .'.'. _RES_VERSION_MAINT .'-'. _RES_RELEASE_BUILD;
      //$latestFPAVER   = ltrim($gitcURLARRAY->tag_name, 'v');  // trim the "v" (version) from the latest release tag

      if (version_compare($thisFPAVER, $latestFPAVER) == 0):
        $fpaVersionCheckStatus   = 'success' ;
        $fpaVersionCheckMessage  = _FPA_VER_CHECK_ATLATEST;

      elseif (version_compare($thisFPAVER, $latestFPAVER) > 0):
        $fpaVersionCheckStatus   = 'info' ;
        $fpaVersionCheckMessage  = _FPA_VER_CHECK_ATDEVREL;

      else:
        $fpaVersionCheckStatus   = 'warning' ;
        $fpaVersionCheckMessage  = _FPA_VER_CHECK_OUTOFDATE;

      endif;

      $fpaVersionCheck  = '<div class="text-center alert alert-'. $fpaVersionCheckStatus .' alert-dismissible" role="alert">';
      $fpaVersionCheck .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      $fpaVersionCheck .= '<h4>'. _FPA_EXPLAIN_ICON .' '. _FPA_VER_CHECK_HEADING .'</h4>';
      $fpaVersionCheck .= $fpaVersionCheckMessage;
      $fpaVersionCheck .= '<ul class="list-inline text-center margin-top-sm clearfix">';
      $fpaVersionCheck .= '<li class="col-xs-6 col-sm-2 col-sm-offset-4">This Version : <span class="label label-'. $fpaVersionCheckStatus .'">'. _FPA_VER_SHORT .''. $thisFPAVER .'</span></li>';
      $fpaVersionCheck .= '<li class="col-xs-6 col-sm-2">Latest Version: <span class="label label-primary">'. _FPA_VER_SHORT .''. $latestFPAVER .'</span></li>';
      $fpaVersionCheck .= '</ul>';
      $fpaVersionCheck .= '</div>';

    endif;

  endif;






  /* NOTE (RussW): get the latest Joomla! release info from the stable update site
   * test for simplexml being loaded, if it is access the latest release xml file
   *
   */
  $joomlaVersionCheck  = '';
  if (extension_loaded('simplexml')):
    $jupdateURL  = 'https://update.joomla.org/core/list.xml';
    $jupdateXML  = simpleXML_load_file( $jupdateURL, 'SimpleXMLElement', LIBXML_NOCDATA );


    if($jupdateXML ===  FALSE):
      $joomlaVersionCheck = '';

    else:
      $latestJATTR  = $jupdateXML->extension[count($jupdateXML->extension) -1];
      $latestJVER   = $latestJATTR->attributes()->version->__toString();

      if (version_compare($thisJVER, $latestJVER) == 0):
        $joomlaVersionCheckStatus   = 'success' ;
        $joomlaVersionCheckMessage  = _J_VER_CHECK_ATLATEST;

      elseif (version_compare($thisJVER, $latestJVER) > 0):
        $joomlaVersionCheckStatus   = 'info' ;
        $joomlaVersionCheckMessage  = _J_VER_CHECK_ATDEVREL;

      else:
        $joomlaVersionCheckStatus   = 'warning' ;
        $joomlaVersionCheckMessage  = _J_VER_CHECK_OUTOFDATE;

      endif;

      $joomlaVersionCheck  = '<div class="text-center alert alert-'. $joomlaVersionCheckStatus .'" role="alert">';
      $joomlaVersionCheck .= '<h4>'. _FPA_EXPLAIN_ICON .' '. _J_VER_CHECK_HEADING .'</h4>';
      $joomlaVersionCheck .= $joomlaVersionCheckMessage;
      $joomlaVersionCheck .= '<ul class="list-inline text-center margin-top-sm clearfix">';
      $joomlaVersionCheck .= '<li class="col-xs-6 col-sm-2 col-sm-offset-4">This Version : <span class="label label-'. $joomlaVersionCheckStatus .'">'. _FPA_VER_SHORT .''. $thisJVER .'</span></li>';
      $joomlaVersionCheck .= '<li class="col-xs-6 col-sm-2">Latest Version: <span class="label label-primary">'. _FPA_VER_SHORT .''. $latestJVER .'</span></li>';
      $joomlaVersionCheck .= '</ul>';
      $joomlaVersionCheck .= '</div>';

    endif;

  endif;
?>