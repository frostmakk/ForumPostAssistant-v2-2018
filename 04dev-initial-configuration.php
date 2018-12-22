<?php echo '<!-- NOTE (RussW): include '. basename(__FILE__) .' placeholder -->'; ?>
<?php
  /* NOTE (RussW): build initial arrays
   *
   */
	// determine exactly where the REAL configuration file is, it might not be the one in the "/" folder
	if ( @$instance['cmsRELEASE'] == '1.0' ) {
	   if ( file_exists( 'configuration.php' ) ) {
	       $instance['configPATH'] = 'configuration.php';
	   }
	} elseif ( @$instance['cmsRELEASE'] == '1.5' ) {
	   $instance['configPATH'] = 'configuration.php';
	} elseif ( @$instance['cmsRELEASE'] >= '1.6' ) {
	   if ( file_exists( 'defines.php' ) OR file_exists( 'administrator\defines.php' )) {
	       $instance['definesEXIST'] = _FPA_Y;
	       // look for a 'defines' override file in the "/" folder.
	       if ( file_exists( 'defines.php' ) ) {
	           $cmsOverride = file_get_contents( 'defines.php' );
	           preg_match ( '#JPATH_CONFIGURATION\s*\S*\s*[\'"](.*)[\'"]#', $cmsOverride, $cmsOVERRIDEPATH );
	           if ( file_exists( @$cmsOVERRIDEPATH[1] . '\configuration.php' ) ) {
    	           $instance['configPATH'] = $cmsOVERRIDEPATH[1] . '\configuration.php';
    	           $instance['configSiteDEFINE'] = _FPA_Y;
	           } else {
	               $instance['configPATH'] = 'configuration.php';
    	           $instance['configSiteDEFINE'] = _FPA_Y;                  
	           }
	       } else {
	           $instance['configPATH'] = 'configuration.php';
	           $instance['configSiteDEFINE'] = _FPA_N ;
	       }
	       if ( file_exists( 'administrator\defines.php' ) ) {
	           $cmsAdminOverride = file_get_contents( 'administrator\defines.php' );
	           preg_match ( '#JPATH_CONFIGURATION\s*\S*\s*[\'"](.*)[\'"]#', $cmsAdminOverride, $cmsADMINOVERRIDEPATH );
	           if ( file_exists( @$cmsOVERRIDEPATH[1] . '\configuration.php' ) ) {
	               $instance['configADMINPATH'] = $cmsADMINOVERRIDEPATH[1] . '\configuration.php';
	               $instance['configAdminDEFINE'] = _FPA_Y;
	           } else {
	               $instance['configADMINPATH'] = 'configuration.php';
	               $instance['configAdminDEFINE'] = _FPA_Y;
	           }               
	       } else {               
	           $instance['configAdminDEFINE'] = _FPA_N;
	           $instance['configADMINPATH'] = 'configuration.php';
	       }
	       if (( $instance['configPATH'] <> $instance['configADMINPATH'] ) OR ($instance['configSiteDEFINE'] <> $instance['configAdminDEFINE'] )) {
	           $instance['equalPATH'] = _FPA_N;
	       } else {
	           $instance['equalPATH'] = _FPA_Y;
	       }
	   } else {
	       $instance['configPATH'] = 'configuration.php';
	       $instance['definesEXIST'] = _FPA_N;
	       $instance['equalPATH'] = _FPA_Y;
	   }
	} else {
	   $instance['configPATH'] = 'configuration.php';
	}

	// check the configuration file (all versions)
	if ( file_exists( $instance['configPATH'] ) ) {
		$instance['instanceCONFIGURED'] = _FPA_Y;

		// determine it's ownership and mode
		if ( is_writable( $instance['configPATH'] ) ) {
			$instance['configWRITABLE']	= _FPA_Y;

		} else {
			$instance['configWRITABLE']	= _FPA_N;

		}


		$instance['configMODE'] = substr( sprintf('%o', fileperms( $instance['configPATH'] ) ),-3, 3 );


		if ( function_exists( 'posix_getpwuid' ) AND $system['sysSHORTOS'] != 'WIN' ) { // gets the UiD and converts to 'name' on non Windows systems
			$instance['configOWNER'] = posix_getpwuid( fileowner( $instance['configPATH'] ) );
			$instance['configGROUP'] = posix_getgrgid( filegroup( $instance['configPATH'] ) );

		} else { // only get the UiD for Windows, not 'name'
			$instance['configOWNER']['name'] = fileowner( $instance['configPATH'] );
			$instance['configGROUP']['name'] = filegroup( $instance['configPATH'] );
		}


	/** if present, is the configuration file valid? *****************************************/
		/** added code to fix the config version mis-match on 2.5 versions of Joomla - 4-8-12 - Phil *****/
		/** reworked code block to better determine version in 1.7 - 3.0+ versions of Joomla - 8-06-12 - Phil *****/
		$cmsCContent = file_get_contents( $instance['configPATH'] );
 
			// >= 3.8.0
			if ( preg_match ( '#(public)#', $cmsCContent ) AND file_exists( 'libraries/src/Version.php' ) ) {
				$instance['configVALIDFOR'] = $instance['cmsRELEASE'];
				$instance['cmsVFILE'] = 'libraries/src/Version.php';
				$instance['instanceCFGVERMATCH'] = _FPA_Y; 
 
			// >= 3.6.3
			} elseif ( preg_match ( '#(public)#', $cmsCContent ) AND $instance['platformVFILE'] == _FPA_N AND file_exists( 'libraries/cms/version/version.php' ) ) {
				$instance['configVALIDFOR'] = $instance['cmsRELEASE'];
				$instance['cmsVFILE'] = 'libraries/cms/version/version.php';
				$instance['instanceCFGVERMATCH'] = _FPA_Y;

			//for 3.0
			} elseif ( preg_match ( '#(public)#', $cmsCContent ) AND $instance['platformVFILE'] != _FPA_N ) {
				$instance['configVALIDFOR'] = $instance['cmsRELEASE'];
				$instance['cmsVFILE'] = 'libraries/cms/version/version.php';
				$instance['instanceCFGVERMATCH'] = _FPA_Y;

			//for 2.5
			} elseif ( preg_match ( '#(public)#', $cmsCContent ) AND substr( $instance['platformRELEASE'],0,2 ) == '11' ) {
				$instance['configVALIDFOR'] = $instance['cmsRELEASE'];
				$instance['cmsVFILE'] = 'libraries/cms/version/version.php';
				$instance['instanceCFGVERMATCH'] = _FPA_Y;

			//for 1.7
			} elseif ( preg_match ( '#(public)#', $cmsCContent ) AND $instance['platformVFILE'] != _FPA_N  AND $instance['cmsVFILE'] != 'libraries/cms/version/version.php') {
				$instance['cmsVFILE'] = 'includes/version.php';
				$instance['configVALIDFOR'] = $instance['cmsRELEASE'];
				$instance['instanceCFGVERMATCH'] = _FPA_Y;

			//for 1.6
			} elseif ( preg_match ( '#(public)#', $cmsCContent ) AND $instance['platformVFILE'] == _FPA_N ) {
				$instance['configVALIDFOR'] = '1.6';
				$instance['instanceCFGVERMATCH'] = _FPA_Y;
                
			// for 1.5
			} elseif ( preg_match ( '#(var)#', $cmsCContent ) ) {
				$instance['configVALIDFOR'] = '1.5';
				$instance['instanceCFGVERMATCH'] = _FPA_Y;                
                
			// for 1.0
			} elseif ( preg_match ( '#(\$mosConfig_)#', $cmsCContent ) ) {
				$instance['configVALIDFOR'] = '1.0';
				$instance['instanceCFGVERMATCH'] = _FPA_Y;

			} else {
				$instance['configVALIDFOR'] = _FPA_U;
			}

			// fpa found a configuration.php but couldn't determine the version, is it valid?
			if ( $instance['configVALIDFOR'] == _FPA_U ) {

				if ( filesize( $instance['configPATH'] ) < 512 ) {
						$instance['configSIZEVALID'] = _FPA_N;
				}
			}


			// check if the configuration.php version matches the discovered version
			if ( $instance['configVALIDFOR'] != _FPA_U AND $instance['cmsVFILE'] != _FPA_N ) {


			// set defaults for the configuration's validity and a sanity score of zero
			$instance['configSANE'] = _FPA_N;
			$instance['configSANITYSCORE'] = 0;


				// !TODO add white-space etc checks
				// do some configuration.php sanity/validity checks
				if ( filesize( $instance['configPATH'] ) > 512 ) {
					$instance['cfgSANITY']['configSIZEVALID'] = _FPA_Y;
				}

				// !TODO FINISH  white-space etc checks
				$instance['cfgSANITY']['configNOTDIST'] = _FPA_Y;   // is not the distribution example
				$instance['cfgSANITY']['configNOWSPACE'] = _FPA_Y;  // no white-space
				$instance['cfgSANITY']['configOPTAG'] = _FPA_Y;     // has php open tag
				$instance['cfgSANITY']['configCLTAG'] = _FPA_Y;     // has php close tag
				$instance['cfgSANITY']['configJCONFIG'] = _FPA_Y;   // has php close tag

				// run through the sanity checks, if sane ( =Yes ) increment the score by 1 (should total 6)
				foreach ( $instance['cfgSANITY'] as $i => $sanityCHECK ) {

					if ( $instance['cfgSANITY'][$i] == _FPA_Y ) {
						$instance['configSANITYSCORE'] = $instance['configSANITYSCORE'] +1;
					}
				}

				// if the configuration file is sane, set it as valid
				if ( $instance['configSANITYSCORE'] == '6' ) {
					$instance['configSANE'] = _FPA_Y;   // configuration appears valid?
				}

			} else {
				$instance['instanceCFGVERMATCH'] = _FPA_U;
			}


			// include configuration.php
			if ( $instance['configVALIDFOR'] != _FPA_U ) 
            {
    			ini_set( 'display_errors', 1 );
                $includeconfig = require_once($instance['configPATH']);
                $config = new JConfig();
                if ( defined( '_FPA_DIAG' ) ) {
                    ini_set( 'display_errors', 1 );
                    }
                    else
                    {
                    ini_set( 'display_errors', 0 );
                    }

					$instance['configERRORREP'] = $config->error_reporting;
					$instance['configDBTYPE'] = $config->dbtype;
					$instance['configDBHOST'] = $config->host;
					$instance['configDBNAME'] = $config->db;
					$instance['configDBPREF'] = $config->dbprefix;
					$instance['configDBUSER'] = $config->user;
					$instance['configDBPASS'] = $config->password;

					switch ($config->offline) {
					    case true:
        					$instance['configOFFLINE'] = 'true';
					        break;
					    case false:
        					$instance['configOFFLINE'] = 'false';
					        break;
					    default:
        					$instance['configOFFLINE'] = $config->offline;
					}

					switch ($config->sef) {
					    case true:
        					$instance['configSEF'] = 'true';
					        break;
					    case false:
        					$instance['configSEF'] = 'false';
					        break;
					    default:
        					$instance['configSEF'] = $config->sef;
					}

					switch ($config->gzip) {
					    case true:
        					$instance['configGZIP'] = 'true';
					        break;
					    case false:
        					$instance['configGZIP'] = 'false';
					        break;
					    default:
        					$instance['configGZIP'] = $config->gzip;
					}

					switch ($config->caching) {
					    case true:
        					$instance['configCACHING'] = 'true';
					        break;
					    case false:
        					$instance['configCACHING'] = 'false';
					        break;
					    default:
        					$instance['configCACHING'] = $config->caching;
					}

					switch ($config->debug) {
					    case true:
        					$instance['configSITEDEBUG'] = 'true';
					        break;
					    case false:
        					$instance['configSITEDEBUG'] = 'false';
					        break;
					    default:
        					$instance['configSITEDEBUG'] = $config->debug;
					}

 					if ( isset($config->shared_session )) 
                    {
					   switch ($config->shared_session) 
                       {
					       case true:
					           $instance['configSHASESS'] = 'true';
					           break;
					       case false:
					           $instance['configSHASESS'] = 'false';
					           break;
					       default:
					           $instance['configSHASESS'] = $config->shared_session;
					   }
                    } 
                    else 
                    {
					   $instance['configSHASESS'] = _FPA_NA;
					}          

 					if ( isset($config->cache_platformprefix )) 
                    {
					   switch ($config->cache_platformprefix) 
                       {
					       case true:
					           $instance['configCACHEPLFPFX'] = 'true';
					           break;
					       case false:
					           $instance['configCACHEPLFPFX'] = 'false';
					           break;
					       default:
					           $instance['configCACHEPLFPFX'] = $config->cache_platformprefix;
					   }
                    } 
                    else 
                    {
					   $instance['configCACHEPLFPFX'] = _FPA_NA;
					}          

 					if ( isset($config->ftp_enable )) 
                    {
					   switch ($config->ftp_enable) 
                       {
					       case true:
					           $instance['configFTP'] = 'true';
					           break;
					       case false:
					           $instance['configFTP'] = 'false';
					           break;
					       default:
					           $instance['configFTP'] = $config->ftp_enable;
					   }
                    } 
                    else 
                    {
					   $instance['configFTP'] = _FPA_NA;
					}          

 					if ( isset($config->debug_lang )) 
                    {
					   switch ($config->debug_lang) 
                       {
					       case true:
					           $instance['configLANGDEBUG'] = 'true';
					           break;
					       case false:
					           $instance['configLANGDEBUG'] = 'false';
					           break;
					       default:
					           $instance['configLANGDEBUG'] = $config->debug_lang;
					   }
                    } 
                    else 
                    {
					   $instance['configLANGDEBUG'] = _FPA_NA;
					}          

 					if ( isset($config->sef_suffix )) 
                    {
					   switch ($config->sef_suffix) 
                       {
					       case true:
					           $instance['configSEFSUFFIX'] = 'true';
					           break;
					       case false:
					           $instance['configSEFSUFFIX'] = 'false';
					           break;
					       default:
					           $instance['configSEFSUFFIX'] = $config->sef_suffix;
					   }
                    } 
                    else 
                    {
					   $instance['configSEFSUFFIX'] = _FPA_NA;
					}          

 					if ( isset($config->sef_rewrite )) 
                    {
					   switch ($config->sef_rewrite) 
                       {
					       case true:
					           $instance['configSEFRWRITE'] = 'true';
					           break;
					       case false:
					           $instance['configSEFRWRITE'] = 'false';
					           break;
					       default:
					           $instance['configSEFRWRITE'] = $config->sef_rewrite;
					   }
                    } 
                    else 
                    {
					   $instance['configSEFRWRITE'] = _FPA_NA;
					}          

					if ( isset($config->proxy_enable )) 
                    {
					   switch ($config->proxy_enable) 
                       {
					       case true:
					           $instance['configPROXY'] = 'true';
					           break;
					       case false:
					           $instance['configPROXY'] = 'false';
					           break;
					       default:
					           $instance['configPROXY'] = $config->proxy_enable;
					   }
                    } 
                    else 
                    {
					   $instance['configPROXY'] = _FPA_NA;
					}          

					if ( isset($config->unicodeslugs )) 
                    {
					   switch ($config->unicodeslugs) 
                       {
					       case true:
					           $instance['configUNICODE'] = 'true';
					           break;
					       case false:
					           $instance['configUNICODE'] = 'false';
					           break;
					       default:
					           $instance['configUNICODE'] = $config->unicodeslugs;
					   }
                    } 
                    else 
                    {
					   $instance['configUNICODE'] = _FPA_NA;
                    }          

					if ( isset($config->force_ssl )) 
                    {
					   $instance['configSSL'] = $config->force_ssl;
                    } 
                    else 
                    {
					   $instance['configSSL'] = _FPA_NA;
                    }

					if ( isset($config->session_handler )) 
                    {
					   $instance['configSESSHAND'] = $config->session_handler;
                    } 
                    else 
                    {
					   $instance['configSESSHAND'] = _FPA_NA;
                    }

					if ( isset($config->lifetime )) 
                    {
					   $instance['configLIFETIME'] = $config->lifetime;
                    } 
                    else 
                    {
					   $instance['configLIFETIME'] = _FPA_NA;
                    }

					if ( isset($config->cachetime )) 
                    {
					   $instance['configCACHETIME'] = $config->cachetime;
                    } 
                    else 
                    {
					   $instance['configCACHETIME'] = _FPA_NA;
                    }

					if ( isset($config->live_site )) 
                    {
					   $instance['configLIVESITE'] = $config->live_site;
                    } 
                    else 
                    {
					   $instance['configLIVESITE'] = _FPA_NA;
                    }

					if ( isset($config->cache_handler )) 
                    {
					   $instance['configCACHEHANDLER'] = $config->cache_handler;
                    } 
                    else 
                    {
					   $instance['configCACHEHANDLER'] = _FPA_NA;
                    }

					if ( isset($config->access )) 
                    {
					   $instance['configACCESS'] = $config->access;
                    } 
                    else 
                    {
					   $instance['configACCESS'] = _FPA_NA;
                    }
            }

            			if ($instance['configDBTYPE'] == 'mysql' and $instance['cmsMAJORVERSION'] == '4') {
                $instance['configDBTYPE'] = 'pdomysql';
            }

			// J!1.0 assumed 'mysql' with no variable, so we'll just add it
			if ($instance['configDBTYPE'] == _FPA_N and $instance['configVALIDFOR'] == '1.0') {
			 $instance['configDBTYPE'] = 'mysql';
			}


			// look to see if we are using a remote or local MySQL server
			if ( strpos($instance['configDBHOST'] , 'localhost' ) === 0  OR strpos($instance['configDBHOST'] , '127.0.0.1' ) === 0 ) {
  				$database['dbLOCAL'] = _FPA_Y;

			} else {
  				$database['dbLOCAL'] = _FPA_N;
			}

			// check if all the DB credentials are complete
			if ( @$instance['configDBTYPE'] AND $instance['configDBHOST'] AND $instance['configDBNAME'] AND $instance['configDBPREF'] AND $instance['configDBUSER'] AND $instance['configDBPASS'] ) {
				$instance['configDBCREDOK'] = _FPA_Y;
 			} else if ( @$instance['configDBTYPE'] AND $instance['configDBHOST'] AND $instance['configDBNAME'] AND $instance['configDBPREF'] AND $instance['configDBUSER'] AND $database['dbLOCAL'] = _FPA_Y ){
				$instance['configDBCREDOK'] = _FPA_PMISS;
			} else {
				$instance['configDBCREDOK'] = _FPA_N;
			}


		// looking for htaccess (Apache and some others) or web.config (IIS)
		if ( $system['sysSHORTWEB'] != 'MIC' ) {

			// htaccess files
			if ( file_exists( '.htaccess' ) ) {
				$instance['configSITEHTWC'] = _FPA_Y;

			} else {
				$instance['configSITEHTWC'] = _FPA_N;
			}

			if ( file_exists( 'administrator/.htaccess' ) ) {
				$instance['configADMINHTWC'] = _FPA_Y;

			} else {
				$instance['configADMINHTWC'] = _FPA_N;

			}

		} else {

			// web.config file
			if ( file_exists( 'web.config' ) ) {
				$instance['configSITEHTWC'] = _FPA_Y;
				$instance['configADMINHTWC'] = _FPA_NA;

			} else {
				$instance['configSITEHTWC'] = _FPA_N;
				$instance['configADMINHTWC'] = _FPA_NA;
			}
		}


	} else { // no configuration.php found
		$instance['instanceCONFIGURED'] = _FPA_N;
		$instance['configVALIDFOR'] = _FPA_U;
	}


?>