<?php echo '<!-- NOTE (RussW): include '. basename(__FILE__) .' placeholder -->'; ?>
<?php
  /* NOTE (RussW): build initial arrays
   *
   */
	/** is an instance present? **************************************************************/
	// this is a two-fold sanity check, we look two pairs of known folders, only one pair need exist
	// this caters for the potential of missing folders, but is not exhaustive or too time consuming
	if ( ( file_exists( 'components/' ) AND file_exists( 'modules/' ) ) OR ( file_exists( 'administrator/components/' ) AND file_exists( 'administrator/modules/' ) ) ) {
		$instance['instanceFOUND'] = _FPA_Y;
	} else {
		$instance['instanceFOUND'] = _FPA_N;
	}



	/** what version is the instance? ********************************************************/
	// >= J3.8.0
	if ( file_exists( 'libraries/src/Version.php' ) ) {
		$instance['cmsVFILE'] = 'libraries/src/Version.php';    

	// >= J3.6.3
	} elseif ( file_exists( 'libraries/cms/version/version.php' ) AND !file_exists( 'libraries/platform.php' ) ) {
		$instance['cmsVFILE'] = 'libraries/cms/version/version.php';    

	// J2.5 & J3.0 libraries/joomla/platform.php files
	} elseif ( file_exists( 'libraries/cms/version/version.php' ) AND file_exists( 'libraries/platform.php' ) ) {
		$instance['cmsVFILE'] = 'libraries/cms/version/version.php';

	// J1.7 includes/version.php & libraries/joomla/platform.php files
	} elseif ( file_exists( 'includes/version.php' ) AND file_exists( 'libraries/platform.php' ) ) {
		$instance['cmsVFILE'] = 'includes/version.php';

	// J1.6 libraries/joomla/version.php & joomla.xml files
	} elseif ( file_exists( 'libraries/joomla/version.php' ) AND file_exists( 'joomla.xml' ) ) {
		$instance['cmsVFILE'] = 'libraries/joomla/version.php';

	// J1.5 & Nooku Server libraries/joomla/version.php & koowa folder
	} elseif ( file_exists( 'libraries/joomla/version.php' ) AND file_exists( 'libraries/koowa/koowa.php' ) ) {
		$instance['cmsVFILE'] = 'libraries/joomla/version.php';

	// J1.5 libraries/joomla/version.php & xmlrpc folder
	} elseif ( file_exists( 'libraries/joomla/version.php' ) AND file_exists( 'xmlrpc/' ) ) {
		$instance['cmsVFILE'] = 'libraries/joomla/version.php';

	// J1.0 includes/version.php & mambots folder
	} elseif ( file_exists( 'includes/version.php' ) AND file_exists( 'mambots/' ) ) {
		$instance['cmsVFILE'] = 'includes/version.php';

	// fpa could bot find the required files to determine version(s)
	} else {
		$instance['cmsVFILE'] = _FPA_N;
	}

	/** Detect multiple instances of version file ***************************************/
 	if ( file_exists( 'libraries/src/Version.php' ) ) {
		$vFile1 = 1;    
	} else {
		$vFile1 = 0;}
  if ( file_exists( 'libraries/cms/version/version.php' ) ) {
		$vFile2 = 1;    
	} else {
		$vFile2 = 0;}
  if ( file_exists( 'includes/version.php' ) ) {
		$vFile3 = 1;    
	} else {
		$vFile3 = 0;}
  if ( file_exists( 'libraries/joomla/version.php' ) ) {
		$vFile4 = 1;    
	} else {
		$vFile4 = 0;}
   $vFileSum = $vFile1 + $vFile2 + $vFile3 + $vFile4;

	/** what version is the framework? (J!1.7 & above) ***************************************/
	// J1.7 libraries/joomla/platform.php
	if ( file_exists( 'libraries/platform.php' ) ) {
		$instance['platformVFILE'] = 'libraries/platform.php';

	// J1.5 Nooku Server libraries/koowa/koowa.php
	} elseif ( file_exists( 'libraries/koowa/koowa.php' ) ) {
		$instance['platformVFILE'] = 'libraries/koowa/koowa.php';

	// J3.7
	} elseif ( file_exists( 'libraries/joomla/platform.php' ) ) {
		$instance['platformVFILE'] = 'libraries/joomla/platform.php';

	} else {
		$instance['platformVFILE'] = _FPA_N;
	}



	// read the cms version file into $cmsVContent (all versions)
	if ( $instance['cmsVFILE'] != _FPA_N ) {
		$cmsVContent = file_get_contents( $instance['cmsVFILE'] );
			// find the basic cms information
			preg_match ( '#\$PRODUCT\s*=\s*[\'"](.*)[\'"]#', $cmsVContent, $cmsPRODUCT );
			preg_match ( '#\$RELEASE\s*=\s*[\'"](.*)[\'"]#', $cmsVContent, $cmsRELEASE );
			preg_match ( '#\$(?:DEV_LEVEL|MAINTENANCE)\s*=\s*[\'"](.*)[\'"]#', $cmsVContent, $cmsDEVLEVEL );
			preg_match ( '#\$(?:DEV_STATUS|STATUS)\s*=\s*[\'"](.*)[\'"]#', $cmsVContent, $cmsDEVSTATUS );
			preg_match ( '#\$(?:CODENAME|CODE_NAME)\s*=\s*[\'"](.*)[\'"]#', $cmsVContent, $cmsCODENAME );
			preg_match ( '#\$(?:RELDATE|RELEASE_DATE)\s*=\s*[\'"](.*)[\'"]#', $cmsVContent, $cmsRELDATE );

                        // Joomla 3.5 - 3.9
                        if (empty($cmsPRODUCT))
                        { 
                            preg_match ( '#const\s*PRODUCT\s*=\s*[\'"](.*)[\'"]#', $cmsVContent, $cmsPRODUCT );
                            preg_match ( '#const\s*RELEASE\s*=\s*[\'"](.*)[\'"]#', $cmsVContent, $cmsRELEASE );
                            preg_match ( '#const\s*DEV_LEVEL\s*=\s*[\'"](.*)[\'"]#', $cmsVContent, $cmsDEVLEVEL );
                            preg_match ( '#const\s*DEV_STATUS\s*=\s*[\'"](.*)[\'"]#', $cmsVContent, $cmsDEVSTATUS );
                            preg_match ( '#const\s*CODENAME\s*=\s*[\'"](.*)[\'"]#', $cmsVContent, $cmsCODENAME );
                            preg_match ( '#const\s*RELDATE\s*=\s*[\'"](.*)[\'"]#', $cmsVContent, $cmsRELDATE );
                            preg_match ( '#const\s*MAJOR_VERSION\s*=\s*(.*);#', $cmsVContent, $cmsMAJOR_VERSION );
                        }
                                                
                        // Joomla 4
                        if (empty($cmsRELEASE))
                        { 
                            preg_match ( '#const\s*PRODUCT\s*=\s*[\'"](.*)[\'"]#', $cmsVContent, $cmsPRODUCT );
                            preg_match ( '#const\s*DEV_STATUS\s*=\s*[\'"](.*)[\'"]#', $cmsVContent, $cmsDEVSTATUS );
                            preg_match ( '#const\s*CODENAME\s*=\s*[\'"](.*)[\'"]#', $cmsVContent, $cmsCODENAME );
                            preg_match ( '#const\s*RELDATE\s*=\s*[\'"](.*)[\'"]#', $cmsVContent, $cmsRELDATE );
                            preg_match ( '#const\s*EXTRA_VERSION\s*=\s*[\'"](.*)[\'"]#', $cmsVContent, $EXTRA_VERSION );
                            preg_match ( '#const\s*MAJOR_VERSION\s*=\s*(.*);#', $cmsVContent, $cmsMAJOR_VERSION );
                            preg_match ( '#const\s*MINOR_VERSION\s*=\s*(.*);#', $cmsVContent, $cmsMINOR_VERSION );
                            preg_match ( '#const\s*PATCH_VERSION\s*=\s*(.*);#', $cmsVContent, $cmsPATCH_VERSION );
                            $cmsRELEASE[1] = $cmsMAJOR_VERSION[1] . '.' . $cmsMINOR_VERSION[1];
                            if (strlen($EXTRA_VERSION[1]) > 0) {
                              $cmsDEVLEVEL[1] = $cmsPATCH_VERSION[1]. '-' . $EXTRA_VERSION[1] ;                            
                            } else {
                              $cmsDEVLEVEL[1] = $cmsPATCH_VERSION[1] ; 
                            }
                        }

                        if (empty($cmsMAJOR_VERSION))
                        {
                            $cmsMAJOR_VERSION[1] = '0' ;
                        }

                        $instance['cmsMAJORVERSION'] = $cmsMAJOR_VERSION[1];                                      
                        $instance['cmsPRODUCT'] = $cmsPRODUCT[1];
                        $instance['cmsRELEASE'] = $cmsRELEASE[1];
                        $instance['cmsDEVLEVEL'] = $cmsDEVLEVEL[1];
                        $instance['cmsDEVSTATUS'] = $cmsDEVSTATUS[1];
                        $instance['cmsCODENAME'] = $cmsCODENAME[1];
                        $instance['cmsRELDATE'] = $cmsRELDATE[1];
	}



	// read the platform version file into $platformVContent (J!1.7 & above only)
	if ( $instance['platformVFILE'] != _FPA_N ) {
		$platformVContent = file_get_contents( $instance['platformVFILE'] );

			// find the basic platform information
			if ( $instance['platformVFILE'] == 'libraries/koowa/koowa.php' ) {

				// Nooku platform based
				preg_match ( '#VERSION.*=\s[\'|\"](.*)[\'|\"];#', $platformVContent, $platformRELEASE );
				preg_match ( '#VERSION.*=\s[\'|\"].*-(.*)-.*[\'|\"];#', $platformVContent, $platformDEVSTATUS );

                                $instance['platformPRODUCT'] = 'Nooku';
                                $instance['platformRELEASE'] = $platformRELEASE[1];
                                $instance['platformDEVSTATUS'] = $platformDEVSTATUS[1];
			} else {

				// default to the Joomla! platform, as it is most common at the momemt
				preg_match ( '#PRODUCT\s*=\s*[\'"](.*)[\'"]#', $platformVContent, $platformPRODUCT );
				preg_match ( '#RELEASE\s*=\s*[\'"](.*)[\'"]#', $platformVContent, $platformRELEASE );
				preg_match ( '#MAINTENANCE\s*=\s*[\'"](.*)[\'"]#', $platformVContent, $platformDEVLEVEL );
				preg_match ( '#STATUS\s*=\s*[\'"](.*)[\'"]#', $platformVContent, $platformDEVSTATUS );
				preg_match ( '#CODE_NAME\s*=\s*[\'"](.*)[\'"]#', $platformVContent, $platformCODENAME );
				preg_match ( '#RELEASE_DATE\s*=\s*[\'"](.*)[\'"]#', $platformVContent, $platformRELDATE );

                                // Joomla 3.5 - 3.9
                                if (empty($platformPRODUCT))
                                { 
                                    preg_match ( '#const\s*PRODUCT\s*=\s*[\'"](.*)[\'"]#', $cmsVContent, $cmsPRODUCT );
                                    preg_match ( '#const\s*RELEASE\s*=\s*[\'"](.*)[\'"]#', $cmsVContent, $cmsRELEASE );
                                    preg_match ( '#const\s*MAINTENANCE\s*=\s*[\'"](.*)[\'"]#', $cmsVContent, $cmsDEVLEVEL );
                                    preg_match ( '#const\s*STATUS\s*=\s*[\'"](.*)[\'"]#', $cmsVContent, $cmsDEVSTATUS );
                                    preg_match ( '#const\s*CODE_NAME\s*=\s*[\'"](.*)[\'"]#', $cmsVContent, $cmsCODENAME );
                                    preg_match ( '#const\s*RELEASE_DATE\s*=\s*[\'"](.*)[\'"]#', $cmsVContent, $cmsRELDATE );
                                }
                                
                                $instance['platformPRODUCT'] = $platformPRODUCT[1];
                                $instance['platformRELEASE'] = $platformRELEASE[1];
                                $instance['platformDEVLEVEL'] = $platformDEVLEVEL[1];
                                $instance['platformDEVSTATUS'] = $platformDEVSTATUS[1];
                                $instance['platformCODENAME'] = $platformCODENAME[1];
                                $instance['platformRELDATE'] = $platformRELDATE[1];
			}
	}


?>