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
      $latestFPAVER   = ltrim($gitcURLARRAY->tag_name, 'v');  // trim the "v" (version) from the latest release tag

      if (version_compare($thisFPAVER, $latestFPAVER) == 0):
        $fpaVersionCheckStatus   = 'success';
        $fpaVersionCheckIcon     = _FPA_Y_ICON;
        $fpaVersionCheckMessage  = _FPA_VER_CHECK_ATLATEST;
        $fpaVersionCheckNote     = 'Up To Date';

      elseif (version_compare($thisFPAVER, $latestFPAVER) > 0):
        $fpaVersionCheckStatus   = 'info';
        $fpaVersionCheckIcon     = _FPA_A_ICON;
        $fpaVersionCheckMessage  = _FPA_VER_CHECK_ATDEVREL;
        $fpaVersionCheckNote     = 'Development';

      else:
        $fpaVersionCheckStatus   = 'warning';
        $fpaVersionCheckIcon     = '';
        $fpaVersionCheckMessage  = _FPA_VER_CHECK_OUTOFDATE;
        $fpaVersionCheckNote     = '';

      endif;

      if ($fpaVersionCheckStatus != 'warning'):
        $fpaVersionCheck  = '<div class="text-right margin-bottom-sm clearfix">';
        $fpaVersionCheck .= '<div class="btn-group" role="group" aria-label="FPA Version Check Information">';
        $fpaVersionCheck .= '<button class="btn btn-default btn-xs margin-bottom-sm" type="button" data-toggle="collapse" data-target="#collapsefpaVersion" aria-expanded="false" aria-controls="collapsefpaVersion">';
        $fpaVersionCheck .= '<span class="text-'. $fpaVersionCheckStatus .'">'. $fpaVersionCheckIcon .' '. _RES_SHORT .' '. _FPA_VER_SHORT .''. $thisFPAVER .' <small>('. $fpaVersionCheckNote .')</small></span>';
        $fpaVersionCheck .= '</button>';
        $fpaVersionCheck .= '<button class="btn btn-info btn-xs margin-bottom-sm text-'. $fpaVersionCheckStatus .'" type="button" data-toggle="collapse" data-target="#collapsefpaVersion" aria-expanded="false" aria-controls="collapsefpaVersion">';
        $fpaVersionCheck .= _FPA_EXPLAIN_ICON .'<span class="hidden-xs">&nbsp;'. _FPA_EXPLAIN .'</span>';
        $fpaVersionCheck .= '</button>';
        $fpaVersionCheck .= '</div>';
        $fpaVersionCheck .= '<div class="collapse" id="collapsefpaVersion">';

        $fpaVersionCheck .= '<div class="text-center alert alert-'. $fpaVersionCheckStatus .'" role="alert">';
      else:
        $fpaVersionCheck .= '<div class="text-center alert alert-'. $fpaVersionCheckStatus .' alert-dismissible" role="alert">';
        $fpaVersionCheck .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      endif;

      $fpaVersionCheck .= '<h4>'. _FPA_EXPLAIN_ICON .' '. _FPA_VER_CHECK_HEADING .'</h4>';
      $fpaVersionCheck .= $fpaVersionCheckMessage;
      $fpaVersionCheck .= '<ul class="list-inline text-center margin-top-sm clearfix">';
      $fpaVersionCheck .= '<li class="col-xs-6 col-sm-3 col-sm-offset-3">'. _FPA_THIS .' '. _FPA_VER .' <span class="label label-'. $fpaVersionCheckStatus .' center-block"><strong>'. _FPA_VER_SHORT .''. $thisFPAVER .'</strong></span></li>';
      $fpaVersionCheck .= '<li class="col-xs-6 col-sm-3">'. _FPA_LATEST .' '. _FPA_VER .' <span class="label label-primary center-block"><strong>'. _FPA_VER_SHORT .''. $latestFPAVER .'</strong></span></li>';
      $fpaVersionCheck .= '</ul>';
      $fpaVersionCheck .= '</div>';

      if ($fpaVersionCheckStatus != 'warning'):
        $fpaVersionCheck .= '</div>';
        $fpaVersionCheck .= '</div>';
      endif;
//      else:

//      endif;

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
      $joomlaVersionCheck .= '<li class="col-xs-6 col-sm-3 col-sm-offset-3">'. _FPA_THIS .' '. _FPA_VER .' <span class="label label-'. $joomlaVersionCheckStatus .' center-block"><strong>'. _FPA_VER_SHORT .''. $thisJVER .'</strong></span></li>';
      $joomlaVersionCheck .= '<li class="col-xs-6 col-sm-3">'. _FPA_LATEST .' '. _FPA_VER .' <span class="label label-primary center-block"><strong>'. _FPA_VER_SHORT .''. $latestJVER .'</strong></span></li>';
      $joomlaVersionCheck .= '</ul>';
      $joomlaVersionCheck .= '</div>';

    endif;

  endif;





  /* NOTE (RussW): get the latest FPA release info from github
   * test for cURL being loaded, if it is access the github latest release json page
   *
   */
/**
  $velVersionCheck  = '';
  if (extension_loaded('curl')):

    $velcURL     = 'https://vel.joomla.org/index.php?option=com_vel&format=json';  // vel json feed URL
    $ch          = curl_init( $velcURL );  // init cURL
    $velcURLOPT  = array ( CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT'],
                           CURLOPT_TIMEOUT => 5,
                           CURLOPT_CONNECTTIMEOUT => 5,
                           CURLOPT_RETURNTRANSFER => true,
                           CURLOPT_HTTPHEADER => array('Content-type: application/json'),
                          );
    curl_setopt_array( $ch, $velcURLOPT );

    $velcURLJSON  = curl_exec($ch); // get json result string

    if($velcURLJSON ===  FALSE):
      $velVersionCheck = '';

    else:
      $velcURLARRAY   = json_decode($velcURLJSON, true);  // decode json in to an array
      $velITEMARRAY   = $velcURLARRAY['data']['items'];
//      echo '<pre>';
//      var_dump($velcURLARRAY);
//      var_dump($velITEMARRAY['0']['status']);
//      echo '</pre>';

///echo count($velITEMARRAY);

// TODO (RussW): workout "live" array info
echo '<table class="table table-condensed table-striped table-bordered">';
echo '<caption>VEL LIVE</caption>';
  foreach ($velITEMARRAY as $velLIVE):
    if ($velLIVE['status'] == '1'):
      echo '<tr>';
      echo '<td>';
        if (@$velLIVE['install_data']['name']): echo $velLIVE['install_data']['name']; elseif ($velLIVE['title']): echo $velLIVE['title']; endif;
      echo '</td><td class="bg-warning text-warning">';
        if (@$velLIVE['recommendation']): echo $velLIVE['recommendation']; else: echo '-'; endif;
      echo '</td><td>';
        if (@$velLIVE['vulnerable_version']): echo $velLIVE['vulnerable_version']; else: echo '-'; endif;
      echo '</td><td>';
        if (@$velLIVE['patch_version']): echo $velLIVE['patch_version']; else: echo '-'; endif;
      echo '</td>';
      echo '</tr>';
    endif;
  endforeach;
echo '</table>';

echo '<table class="table table-condensed table-striped table-bordered">';
echo '<caption>VEL RESOLVED</caption>';
  foreach ($velITEMARRAY as $velRESOLVED):
    if ($velRESOLVED['status'] == '2'):
      echo '<tr>';
      echo '<td>';
        if (@$velRESOLVED['install_data']['name']): echo $velRESOLVED['install_data']['name']; elseif ($velRESOLVED['title']): echo $velRESOLVED['title']; endif;
      echo '</td><td class="bg-warning text-warning">';
        if (@$velRESOLVED['recommendation']): echo $velRESOLVED['recommendation']; else: echo '-'; endif;
      echo '</td><td>';
        if (@$velRESOLVED['vulnerable_version']): echo $velRESOLVED['vulnerable_version']; else: echo '-'; endif;
      echo '</td><td>';
        if (@$velRESOLVED['patch_version']): echo $velRESOLVED['patch_version']; else: echo '-'; endif;
      echo '</td>';
      echo '</tr>';
    endif;
  endforeach;
echo '</table>';

      // TODO (RussW): uncomment in production
      //$thisFPAVER     = _RES_VERSION .'.'. _RES_VERSION_MAINT .'-'. _RES_RELEASE_BUILD;
      $latestFPAVER   = ltrim($gitcURLARRAY->tag_name, 'v');  // trim the "v" (version) from the latest release tag

      if (version_compare($thisFPAVER, $latestFPAVER) == 0):
        $fpaVersionCheckStatus   = 'success';
        $fpaVersionCheckIcon     = _FPA_Y_ICON;
        $fpaVersionCheckMessage  = _FPA_VER_CHECK_ATLATEST;
        $fpaVersionCheckNote     = 'Up To Date';

      elseif (version_compare($thisFPAVER, $latestFPAVER) > 0):
        $fpaVersionCheckStatus   = 'info';
        $fpaVersionCheckIcon     = _FPA_A_ICON;
        $fpaVersionCheckMessage  = _FPA_VER_CHECK_ATDEVREL;
        $fpaVersionCheckNote     = 'Development';

      else:
        $fpaVersionCheckStatus   = 'warning';
        $fpaVersionCheckIcon     = '';
        $fpaVersionCheckMessage  = _FPA_VER_CHECK_OUTOFDATE;
        $fpaVersionCheckNote     = '';

      endif;

      if ($fpaVersionCheckStatus != 'warning'):
        $fpaVersionCheck  = '<div class="text-right margin-bottom-sm clearfix">';
        $fpaVersionCheck .= '<div class="btn-group" role="group" aria-label="FPA Version Check Information">';
        $fpaVersionCheck .= '<button class="btn btn-default btn-xs margin-bottom-sm" type="button" data-toggle="collapse" data-target="#collapsefpaVersion" aria-expanded="false" aria-controls="collapsefpaVersion">';
        $fpaVersionCheck .= '<span class="text-'. $fpaVersionCheckStatus .'">'. $fpaVersionCheckIcon .' '. _RES_SHORT .' '. _FPA_VER_SHORT .''. $thisFPAVER .' <small>('. $fpaVersionCheckNote .')</small></span>';
        $fpaVersionCheck .= '</button>';
        $fpaVersionCheck .= '<button class="btn btn-info btn-xs margin-bottom-sm text-'. $fpaVersionCheckStatus .'" type="button" data-toggle="collapse" data-target="#collapsefpaVersion" aria-expanded="false" aria-controls="collapsefpaVersion">';
        $fpaVersionCheck .= _FPA_EXPLAIN_ICON .'<span class="hidden-xs">&nbsp;'. _FPA_EXPLAIN .'</span>';
        $fpaVersionCheck .= '</button>';
        $fpaVersionCheck .= '</div>';
        $fpaVersionCheck .= '<div class="collapse" id="collapsefpaVersion">';

        $fpaVersionCheck .= '<div class="text-center alert alert-'. $fpaVersionCheckStatus .'" role="alert">';
      else:
        $fpaVersionCheck .= '<div class="text-center alert alert-'. $fpaVersionCheckStatus .' alert-dismissible" role="alert">';
        $fpaVersionCheck .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      endif;

      $fpaVersionCheck .= '<h4>'. _FPA_EXPLAIN_ICON .' '. _FPA_VER_CHECK_HEADING .'</h4>';
      $fpaVersionCheck .= $fpaVersionCheckMessage;
      $fpaVersionCheck .= '<ul class="list-inline text-center margin-top-sm clearfix">';
      $fpaVersionCheck .= '<li class="col-xs-6 col-sm-3 col-sm-offset-3">'. _FPA_THIS .' '. _FPA_VER .' <span class="label label-'. $fpaVersionCheckStatus .' center-block"><strong>'. _FPA_VER_SHORT .''. $thisFPAVER .'</strong></span></li>';
      $fpaVersionCheck .= '<li class="col-xs-6 col-sm-3">'. _FPA_LATEST .' '. _FPA_VER .' <span class="label label-primary center-block"><strong>'. _FPA_VER_SHORT .''. $latestFPAVER .'</strong></span></li>';
      $fpaVersionCheck .= '</ul>';
      $fpaVersionCheck .= '</div>';

      if ($fpaVersionCheckStatus != 'warning'):
        $fpaVersionCheck .= '</div>';
        $fpaVersionCheck .= '</div>';
      endif;

    endif;

  endif;
**/
?>