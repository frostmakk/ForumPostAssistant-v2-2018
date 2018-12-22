<center class="margin-bottom-lg">
  <h3>THIS IS AN EXCESSIVE POST OUTPUT TEST</h3>
  <form method="post">
    <input type="hidden" name="doIT" value="1">
    <div class="btn-group" role="group" aria-label="...">
      <button class="btn btn-primary" type="submit" value="0" name="excessivePOST">Simulate A standard <20K Post</button>
      <button class="btn btn-success" type="submit" value="1" name="excessivePOST">Simulate A 20K-39K Post</button>
      <button class="btn btn-warning" type="submit" value="2" name="excessivePOST">Simulate A 40K-59K Post</button>
      <button class="btn btn-danger" type="submit" value="3" name="excessivePOST">Simulate A 60K-79K Post</button>
    </div>
  </form>
</center>



<div id="excessive-post">

  <!-- Nav tabs -->
  <ul id="excessive-post-output" class="nav nav-tabs <?php if (@$_POST['excessivePOST'] >= '1') echo 'nav-justified'; ?>" role="tablist">
    <li role="presentation" class="active"><a id="default-output-tab" href="#default-post-output" aria-controls="default-post-output" role="tab" data-toggle="tab"><span class="badge">1</span> Default Post Output</a></li>
<?php if (@$_POST['excessivePOST'] >= '1'): ?>
    <li role="presentation" class=""><a id="second-output-tab" href="#second-post-output" aria-controls="second-post-output" role="tab" data-toggle="tab"><span class="badge">2</span> Second Post Output</a></li>
<?php endif; ?>
<?php if (@$_POST['excessivePOST'] >= '2'): ?>
    <li role="presentation" class=""><a id="third-output-tab" href="#third-post-output" aria-controls="third-post-output" role="tab" data-toggle="tab"><span class="badge">3</span> Third Post Output</a></li>
<?php endif; ?>
<?php if (@$_POST['excessivePOST'] >= '3'): ?>
    <li role="presentation" class=""><a id="fourth-output-tab" href="#fourth-post-output" aria-controls="third-post-output" role="tab" data-toggle="tab"><span class="badge">4</span> Fourth Post Output</a></li>
<?php endif; ?>
  </ul>


  <!-- Tab panes -->
  <div class="tab-content /*border-bottom*/ margin-bottom-lg" style="min-height:200px;">

    <div role="tabpanel" class="tab-pane active" id="default-post-output">

      <h4>default-post-output or up to first 20K</h4>
      <div class="row">
        <div class="col-md-6">

          <textarea class="form-control" rows="15" name="postOUTPUT" id="postOUTPUT" placeholder="Forum Post Content">
<?php
          	if ( @$_POST['doIT'] == '1' ) {

       
        			//	echo '<div class="normal-note" style="width:725px;text-align:center;margin: 0px auto;padding:2px;padding-top:5px;">';

			//	echo '<span class="ok" style="text-transform:uppercase;">'. _RES .' '. _FPA_POSTD .'</span><br />';


				/** LOAD UP THE SELECTED CONFIGURATION AND DIAGNOSTIC INFORMATION FOR THE POST ************
				** this section loads up a text-box with BBCode for the forum, it will quote each section
				** to make viewing easier and once used to the format, hopefully making it simpler to
				** pinpoint related information quickly
				**
				** the user then copies and pastes this outputin to forum post
				**
				** many "if/then/else" statements have been placed in single lines for ease of management,
				** this looks ugly and goes against coding practices but *shrug*, it's messy otherwise
				**
				** NOTE IF MODIFYING: carriage returns and line breaks MUST be double-quoted, not single-
				** quote, hence some of the weird quoting and formating
				*****************************************************************************************/
			//	echo '<textarea class="protected" style="width:700px;height:400px;font-size:9px;margin-top:5px;" type="text" rows="20" cols="100" name="postOUTPUT" id="postOUTPUT">';

 
				/** BBCode for the Joomla! Forum
				*****************************************************************************************/
					echo '[quote="'. _RES .' (v'. _RES_VERSION .') : '. @date( 'jS F Y' ) .'"]';

					if ( $_POST['probDSC'] ) { echo '[quote="'. _FPA_PROB_DSC .' :: "][size=85]'. $_POST['probDSC'] .' [/size][/quote]'; }

					if ( $_POST['probMSG1'] ) { echo '[quote="'. _FPA_PROB_MSG .' :: "][size=85]'. $_POST['probMSG1'] .'[/size][/quote]'; }

					if ( $phpenv['phpLASTERR'] AND $_POST['probMSG2'] ) { echo '[quote="'. _FPA_LAST .' PHP '. _FPA_ER .' :: "][size=85][color=#800000]'. $_POST['probMSG2'] .'[/color][/size][/quote]';
					} elseif ( !@$phpenv['phpLASTERROR'] AND $_POST['probMSG2'] ) { echo '[quote="'. _FPA_PROB_MSG .' :: "][size=85]'. $_POST['probMSG2'] .'[/size][/quote]'; }

					if ( $_POST['probACT'] ) { echo '[quote="'. _FPA_PROB_ACT .' "][size=85]'. $_POST['probACT'] .'[/size][/quote]'; }

					// do the basic information
					echo '[quote="'. _FPA_BASIC .' '. _FPA_ENVIRO .' ::"][size=85]';

					// Joomla! cms details
					echo '[b]'. _FPA_APP .' '. _FPA_INSTANCE.' :: [/b]';
					if ( $instance['instanceFOUND'] == _FPA_Y ) { echo '[color=Blue]'. $instance['cmsPRODUCT'] .' [b]'. $instance['cmsRELEASE'] .'.'. $instance['cmsDEVLEVEL'] .'[/b]-'. $instance['cmsDEVSTATUS'] .' ('. $instance['cmsCODENAME'] .') '. $instance['cmsRELDATE'] .'[/color]';
					} else { echo '[color=orange]'. _FPA_NF .'[/color]'; }

					// Multiple version file warning
					if ($vFileSum > 1) { 
					echo "\r\n";          
					echo '[color=Red][b]' . _FPA_MVFW . '[/b][/color]';}

					// Joomla! platform details
					if ( @$instance['platformPRODUCT'] ) {
					echo "\r\n";
					echo '[b]'. _FPA_APP .' '. _FPA_PLATFORM .' :: [/b] [color=Blue]'. @$instance['platformPRODUCT'] .' [b]'. @$instance['platformRELEASE'] .'.'. @$instance['platformDEVLEVEL'] .'[/b]-'. @$instance['platformDEVSTATUS'] .' ('. @$instance['platformCODENAME'] .') '. @$instance['platformRELDATE'] .'[/color]'; }

					echo "\r\n";

					echo '[b]'. _FPA_APP .' '. _FPA_YC .' :: [/b]';

					if ( $instance['instanceCONFIGURED'] == _FPA_Y ) {
					   echo '[color=Green]'. _FPA_Y .'[/color] | ';

					if ( $instance['configWRITABLE'] == _FPA_Y ) { echo '[color=Green]'. _FPA_WRITABLE .'[/color] ('; } else { echo _FPA_RO .' ('; }

					if ( substr( $instance['configMODE'],1 ,1 ) == '7' OR substr( $instance['configMODE'],2 ,1 ) >= '5' OR substr( $instance['configMODE'],3 ,1 ) >= '5' ) { echo '[color=Red]'; } else { echo '[color=Green]'; }
					   echo $instance['configMODE'] .'[/color]) | ';

					if ( @$instance['definesEXIST'] == _FPA_Y ) {
                       echo   _FPA_DEFI . ' ' . _FPA_E . ' | ';
					   if ( @$instance['equalPATH'] == _FPA_N ) {
					       echo '[color=Red]'. _FPA_DEFIPA .'[/color]  | ';
					   }
					}

            if ( $_POST['showProtected'] == '1' ) {
  						echo '[b]'. _FPA_OWNER .':[/b] '. $instance['configOWNER']['name'] .' (uid: '. isset($instance['configOWNER']['uid']) .'/gid: '. isset($instance['configOWNER']['gid']) .') | [b]'. _FPA_GROUP .':[/b] '. $instance['configGROUP']['name'] .' (gid: '. isset($instance['configGROUP']['gid']) .') | [b]Valid For:[/b] '. $instance['configVALIDFOR'];
              } else {
  						echo '[b]'. _FPA_OWNER .':[/b]  [color=orange]--'. _FPA_HIDDEN .'--[/color] . (uid: '. isset($instance['configOWNER']['uid']) .'/gid: '. isset($instance['configOWNER']['gid']) .') | [b]'. _FPA_GROUP .':[/b]  [color=orange]--'. _FPA_HIDDEN .'--[/color]  (gid: '. isset($instance['configGROUP']['gid']) .') | [b]Valid For:[/b] '. $instance['configVALIDFOR'];
              } 
					echo "\r\n";

					echo '[b]'. _FPA_CFG .' '. _FPA_OPTS .' :: Offline:[/b] '. $instance['configOFFLINE'] .' | [b]SEF:[/b] '. $instance['configSEF'] .' | [b]SEF Suffix:[/b] '. $instance['configSEFSUFFIX'] .' | [b]SEF ReWrite:[/b] '. $instance['configSEFRWRITE'] .' | ';
					echo '[b].htaccess/web.config:[/b] ';

						if ( ($instance['configSITEHTWC'] == _FPA_N AND $instance['configSEFRWRITE'] == '1') OR ($instance['configSITEHTWC'] == _FPA_N AND $instance['configSEFRWRITE'] == 'true' )) { echo '[color=orange]'. $instance['configSITEHTWC'] .' (ReWrite Enabled but no .htaccess?)[/color] | ';
						} elseif ( $instance['configSITEHTWC'] == _FPA_Y ) { echo '[color=Green]'. $instance['configSITEHTWC'] .'[/color] | ';
						} elseif ( $instance['configSITEHTWC'] == _FPA_N ) { echo '[color=orange]'. $instance['configSITEHTWC'] .'[/color] | '; }

					echo '[b]GZip:[/b] '. $instance['configGZIP'] .' | [b]Cache:[/b] '. $instance['configCACHING'] .' | [b]CacheTime:[/b] '. $instance['configCACHETIME'] .' | [b]CacheHandler:[/b] '. $instance['configCACHEHANDLER'] .' | [b]CachePlatformPrefix:[/b] '. $instance['configCACHEPLFPFX'] .' | [b]FTP Layer:[/b] '. $instance['configFTP'] .' | [b]Proxy:[/b] '. $instance['configPROXY'] .' | [b]LiveSite:[/b] '. $instance['configLIVESITE'] .' | [b]Session lifetime:[/b] '. $instance['configLIFETIME'] .' | [b]Session handler:[/b] '. $instance['configSESSHAND'] .' | [b]Shared sessions:[/b] '. $instance['configSHASESS'] .' | [b]SSL:[/b] '. $instance['configSSL'] .' | [b]Error Reporting:[/b] '. $instance['configERRORREP'] .' | [b]Site Debug:[/b] '. $instance['configSITEDEBUG'] .' | ';

						if ( version_compare( $instance['cmsRELEASE'], '1.5', '>=' ) ) {
							echo '[b]Language Debug:[/b] '. $instance['configLANGDEBUG'] .' | ';
							echo '[b]Default Access:[/b] '. $instance['configACCESS'] .' | [b]Unicode Slugs:[/b] '. $instance['configUNICODE'] .' | [b]dbConnection Type:[/b] '. $instance['configDBTYPE'] .' | ';
						}

						echo '[b]' . _FPA_SUPPHP .' J! '. @$instance['cmsRELEASE'] .'.' . @$instance['cmsDEVLEVEL'] . ': [/b]' ;
							if ( $snapshot['phpSUP4J'] == _FPA_Y ) { echo '[color=Green]'; } else { echo '[color=Red]'; }
							 echo $snapshot['phpSUP4J'] .'[/color] | ';

						echo '[b]' . _FPA_SUPSQL .' J! '. @$instance['cmsRELEASE'] .'.' . @$instance['cmsDEVLEVEL'] . ': [/b]' ;
							if ( $snapshot['sqlSUP4J'] == _FPA_Y ) { echo '[color=Green]'; } else { echo '[color=Red]'; }
							 echo $snapshot['sqlSUP4J'] .'[/color] | ';

						echo '[b]'. _FPA_DB .' '. _FPA_CREDPRES .':[/b] ';
							if ( $instance['configDBCREDOK'] == _FPA_Y ) { echo '[color=Green]'; } else { echo '[color=Red]'; }
							echo $instance['configDBCREDOK'] .'[/color] | ';

					} else { 
					   if ( @$instance['definesEXIST'] == _FPA_Y ) {
					       echo '[color=orange]'. _FPA_NF .' (' . _FPA_DEFI . ' ' . _FPA_E . ')[/color]';
					       if ( @$instance['equalPATH'] == _FPA_N ) {
					           echo '[color=Red]'. _FPA_DEFIPA .'[/color] ';
					       }
					   } else {
					       echo '[color=orange]'. _FPA_NF .'[/color]';
					   }                    
					}
					echo "\r\n\r\n";

					if ( $showProtected <> 1 ) {
					echo '[b]'. _FPA_HOST .' '. _FPA_CFG .' :: OS:[/b] '. $system['sysPLATOS'] .' |  [b]OS '._FPA_VER.':[/b] '. $system['sysPLATREL'] .' | [b]'. _FPA_TEC .':[/b] '. $system['sysPLATTECH'] .' | [b]'. _FPA_WSVR .':[/b] '. $system['sysSERVSIG'] .' | [b]Encoding:[/b] '. $system['sysENCODING'] .' | [b]'. _FPA_DROOT .':[/b] '. '[color=orange]--'. _FPA_HIDDEN .'--[/color]' .' | [b]'. _FPA_SYS .' TMP '. _FPA_WRITABLE .':[/b] ';
						if ( $system['sysTMPDIRWRITABLE'] == _FPA_Y ) { echo '[color=Green]'; } else { echo '[color=Red]'; }
						echo $system['sysTMPDIRWRITABLE'] .'[/color] | ';
					}else{
					echo '[b]'. _FPA_HOST .' '. _FPA_CFG .' :: OS:[/b] '. $system['sysPLATOS'] .' |  [b]OS '._FPA_VER.':[/b] '. $system['sysPLATREL'] .' | [b]'. _FPA_TEC .':[/b] '. $system['sysPLATTECH'] .' | [b]'. _FPA_WSVR .':[/b] '. $system['sysSERVSIG'] .' | [b]Encoding:[/b] '. $system['sysENCODING'] .' | [b]'. _FPA_DROOT .':[/b] '. $system['sysDOCROOT'] .' | [b]'. _FPA_SYS .' TMP '. _FPA_WRITABLE .':[/b] ';
						if ( $system['sysTMPDIRWRITABLE'] == _FPA_Y ) { echo '[color=Green]'; } else { echo '[color=Red]'; }
						echo $system['sysTMPDIRWRITABLE'] .'[/color] | ';
					}

					if ( function_exists( 'disk_free_space' ) )
						{
						$free_space = sprintf( '%.2f', disk_free_space( './' ) /1073741824 );
						$system['sysFREESPACE'] = $free_space .' GiB';
						  echo '[b]  ' . _FPA_FDSKSP . ' :[/b] ' . $system['sysFREESPACE'] . ' |';
						}
						else
						{
						  echo '[b]  ' . _FPA_FDSKSP . ' :[/b] ' . _FPA_U . ' |';
						}
                        
					echo "\r\n\r\n";

					echo '[b]PHP '. _FPA_CFG .' :: '. _FPA_VER .':[/b] ';
						if ( version_compare( $phpenv['phpVERSION'], '5.0.0', '<' ) ) { echo '[color=Red]'. $phpenv['phpVERSION'] .'[/color] | '; } else { echo '[b]'. $phpenv['phpVERSION'] .'[/b] | '; }

					echo '[b]PHP API:[/b] ';
						if ( $phpenv['phpAPI'] == 'apache2handler' ) { echo '[color=orange]'. $phpenv['phpAPI'] .'[/color] | '; } else { echo '[b]'. $phpenv['phpAPI'] .'[/b] | '; }

					echo '[b]Session Path '. _FPA_WRITABLE .':[/b] ';
						if ( $phpenv['phpSESSIONPATHWRITABLE'] == _FPA_Y ) { echo '[color=Green]'. $phpenv['phpSESSIONPATHWRITABLE'] .'[/color] | '; } elseif ( $phpenv['phpSESSIONPATHWRITABLE'] == _FPA_N ) { echo '[color=Red]'. $phpenv['phpSESSIONPATHWRITABLE'] .'[/color] | '; } else { echo '[color=orange]'. $phpenv['phpSESSIONPATHWRITABLE'] .'[/color] | '; }

					echo '[b]Display Errors:[/b] '. $phpenv['phpERRORDISPLAY'] .' | [b]Error Reporting:[/b] '. $phpenv['phpERRORREPORT'] .' | [b]Log Errors To:[/b] '. $phpenv['phpERRLOGFILE'] .' | [b]Last Known Error:[/b] '. @$phpenv['phpLASTERRDATE'] .' | [b]Register Globals:[/b] '. $phpenv['phpREGGLOBAL'] .' | [b]Magic Quotes:[/b] '. $phpenv['phpMAGICQUOTES'] .' | [b]Safe Mode:[/b] '. $phpenv['phpSAFEMODE'] .' | [b]Open Base:[/b] '. $phpenv['phpOPENBASE'] .' | [b]Uploads:[/b] '. $phpenv['phpUPLOADS'] .' | [b]Max. Upload Size:[/b] '. $phpenv['phpMAXUPSIZE'] .' | [b]Max. POST Size:[/b] '. $phpenv['phpMAXPOSTSIZE'] .' | [b]Max. Input Time:[/b] '. $phpenv['phpMAXINPUTTIME'] .' | [b]Max. Execution Time:[/b] '. $phpenv['phpMAXEXECTIME'] .' | [b]Memory Limit:[/b] '. $phpenv['phpMEMLIMIT'];

					echo "\r\n\r\n";

					echo '[b]Database '. _FPA_CFG .' :: [/b] ';
					if ( $database['dbDOCHECKS'] == _FPA_N ) {
						echo '[color=orange]'. _FPA_DB .' '. _FPA_DBCREDINC .'[/color] '. _FPA_NODISPLAY;
					echo "\r\n";

							if ( @$instance['configDBCREDOK'] != _FPA_Y AND $instance['instanceFOUND'] == _FPA_Y ) {
								echo '[color=Red][b]'. _FPA_MISSINGCRED .': [/b][/color] ';

								if ( @$instance['configDBTYPE'] == '' ) { echo '[color=orange][b]Connection Type[/b] missing[/color] | '; }
								if ( @$instance['configDBNAME'] == '' ) { echo '[color=orange][b]Database Name[/b] missing[/color] |'; }
								if ( @$instance['configDBHOST'] == '' ) { echo '[color=orange][b]MySQL Host[/b] missing[/color] | '; }
								if ( @$instance['configDBPREF'] == '' ) { echo '[color=orange][b]Table Prefix[/b] missing[/color] | '; }
								if ( @$instance['configDBUSER'] == '' ) { echo '[color=orange][b]Database Username[/b] missing[/color] | '; }
								if ( @$instance['configDBPASS'] == '' ) { echo '[color=orange][b]Database Password[/b] missing[/color] |'; }

							}


					} elseif ( @$database['dbERROR'] != _FPA_N ) { echo '[b]'. _FPA_ECON .':[/b] ';

							if ( $_POST['showProtected'] == '3' ) {
								echo '[color=orange][b]'. _FPA_PRIVSTR .'[/b] '. _FPA_INFOPRI .'[/color], '. _FPA_BUT .' [color=Red]'. _FPA_ER .'[/color].';
							} else {
								echo '[color=Red]'. @$database['dbERROR'] .'[/color] : [color=orange]'. _FPA_DB .' '. _FPA_CREDPRES .'? '. _FPA_IN .' '. _FPA_CFG .'...[/color]';
							}

					} else {
						echo '[b]'. _FPA_VER .':[/b] [b]'. $database['dbHOSTSERV'] .'[/b] (Client:'. $database['dbHOSTCLIENT'] .') | ';

							if ( $_POST['showProtected'] > '1' ) { echo '[b]'. _FPA_HOST .':[/b]  [color=orange]--'. _FPA_HIDDEN .'--[/color] ([color=orange]--'. _FPA_HIDDEN .'--[/color]) | ';
							} else { echo '[b]'. _FPA_HOST .':[/b] '. $instance['configDBHOST'] .' ('. $database['dbHOSTINFO'] .') | '; }
							echo '[b]'. _FPA_DEF .' '. _FPA_TCOL .':[/b] '. $database['dbCOLLATION'] .' ([b]'. _FPA_DEF .' '. _FPA_CHARS .':[/b] '. $database['dbCHARSET'] .') | [b]'. _FPA_DB .' '. _FPA_TSIZ .':[/b] '. $database['dbSIZE'] .' | [b]#'. _FPA_OF .'&nbsp'. _FPA_TABLE .':&nbsp[/b] '. $database['dbTABLECOUNT'];
					}

		echo '[/size][/quote]';




					// do detailed information
					echo '[quote="'. _FPA_DETAILED .' '. _FPA_ENVIRO .' ::"][size=85]';

					echo '[b]'. _FPA_PHPEXT_TITLE .' :: [/b]';

						foreach ( $phpextensions as $key => $show ) {

							if ( $show != $phpextensions['ARRNAME'] ) {

								// find the requirements and mark them as present or missing
								if ( $key == 'libxml' OR $key == 'xml' OR $key == 'zip' OR $key == 'openssl' OR $key == 'zlib' OR $key == 'curl' OR $key == 'iconv' OR $key == 'mbstring' OR $key == 'mysql' OR $key == 'mysqli' OR $key == 'pdo_mysql' OR $key == 'mcrypt' OR $key == 'suhosin' OR $key == 'cgi' OR $key == 'cgi-fcgi' ) {
									echo '[color=Green][b]'. $key .'[/b][/color] ('. $show .') | ';
								} elseif ( $key == 'apache2handler' ) {
									echo '[color=orange]'. $key .'[/color] ('. $show .') | ';
								} else {
									echo $key .' ('. $show .') | ';
								}

							} // endif !arrname

							if ( !in_array( $key, $phpreq ) ) {
								unset ( $phpreq[$key] );
							}

						}

						if ( version_compare( $instance['cmsRELEASE'], '3.8', '>=') OR version_compare( $phpenv['phpVERSION'], '7.2.0', '>=' ))   {
						  unset($phpreq['mcrypt']);   
						}

						if (version_compare( $phpenv['phpVERSION'], '7.0.0', '>=' ))   {
						  unset($phpreq['mysql']);   
						}

						echo "\r\n";
						echo '[b]'. _FPA_POTME .' :: [/b]';
						foreach ( $phpreq as $missingkey => $missing ) {
							echo '[color=orange]'. $missingkey .'[/color] | ';
						}

			// disabled PHP functions
			if ( $phpenv['phpDISABLED'] ) {
                echo "\r\n";
                echo '[b]'. _FPA_DI_PHP_FU .' :: [/b]';
                $disabledfunctions = explode(",",$phpenv['phpDISABLED']);
                $arrlength = count($disabledfunctions);
 				for($x = 0; $x < $arrlength; $x++) {
 				   echo  $disabledfunctions[$x] .' | ';
 				}
			}

						echo "\r\n\r\n";
						echo '[b]Switch User '. _FPA_ENVIRO .'[/b] [i](Experimental)[/i][b] :: PHP CGI:[/b] '. $phpenv['phpCGI'] .' | [b]Server SU:[/b] '. $phpenv['phpAPACHESUEXEC'] .' |  [b]PHP SU:[/b] '. $phpenv['phpPHPSUEXEC'] .' |   [b]Custom SU (LiteSpeed/Cloud/Grid):[/b] '. $phpenv['phpCUSTOMSU'];
						echo "\r\n";
						echo '[b]'. _FPA_POTOI .':[/b] ';
							if ( $phpenv['phpOWNERPROB'] == _FPA_Y ) { echo '[color=Red]'; } elseif ( $phpenv['phpOWNERPROB'] == _FPA_N ) { echo '[color=Green]'; } else { echo '[color=orange]'; }
							echo $phpenv['phpOWNERPROB'] .'[/color] ';


						// IF APACHE with PHP in Module mode
						if ( $phpenv['phpAPI'] == 'apache2handler' ) {
						echo "\r\n\r\n";

							echo '[b]'. _FPA_APAMOD_TITLE .' :: [/b]';

							foreach ( $apachemodules as $key => $show ) {

								if ( $show != $apachemodules['ARRNAME'] ) {

									// find the requirements and mark them as present or missing
									if ( $show == 'mod_rewrite' OR $show == 'mod_cgi' OR $show == 'mod_cgid' OR $show == 'mod_expires' OR $show == 'mod_deflate' OR $show == 'mod_auth'  ) {
										echo '[color=Green][b]'. $show .'[/b][/color] | ';
									} elseif ( $show == 'mod_php4' ) {
										echo '[color=Red]'. $show .'[/color] | ';
									} else {
										echo $show .' | ';
									}

								} // endif !arrname

								if ( !in_array( $show, $apachereq ) ) {
									unset ( $apachereq['ARRNAME'] );
									unset ( $apachereq[$show] );
								}

							}

							echo "\r\n";
							echo '[b]'. _FPA_POTMM .' :: [/b]';
							foreach ( $apachereq as $missingkey => $missing ) {
								echo '[color=orange]'. $missingkey .'[/color] | ';
							}

							echo "\r\n";

						} // end if Apache and PHP module



					echo '[/size][/quote]';



						if ( $instance['instanceFOUND'] == _FPA_Y ) {
							echo '[quote="Folder Permissions ::"][size=85]';

								echo '[b]'. _FPA_COREDIR_TITLE .' :: [/b]';

									foreach ( $folders as $i => $show ) {

										if ( $show != $folders['ARRNAME'] ) {

											if ( $_POST['showProtected'] == '3' ) {
												echo '[color=orange]--'. _FPA_HIDDEN .'--[/color] (';
											} else {
												echo $show .' (';
											}

											if ( substr( $modecheck[$show]['mode'],1 ,1 ) == '7' OR substr( $modecheck[$show]['mode'],2 ,1 ) == '7' ) {
												echo '[color=Red]'. $modecheck[$show]['mode'] .'[/color]) | ';
											} else {
												echo $modecheck[$show]['mode'] .') | ';
											}

										}

									}


									if ( @$_POST['showElevated'] == 'on' ) {
										echo "\r\n\r\n";

										$limitCount = '0';
										echo '[b]'. _FPA_ELEVPERM_TITLE .'[/b] [i]('. _FPA_FIRST .' 10)[/i][b] :: [/b]';

											foreach ( $elevated as $key => $show ) {

												if ( $limitCount >= '11' ) {
													unset ( $key );
												} else {

													if ( $show != $elevated['ARRNAME'] ) {

														if ( $_POST['showProtected'] == '3' ) {
															echo '[color=orange]--'. _FPA_HIDDEN .'--[/color] (';
														} else {

															if ( $key == 'None' ) {
																echo '[color=Green][b]'. $key .'[/b][/color] ';
															} else {
																echo $key .'/ (';

															}

														}

														if ( $key != 'None' ) {

															if ( substr( $show['mode'],1 ,1 ) == '7' OR substr( $show['mode'],2 ,1 ) == '7' ) {
																echo '[color=Red]'. $show['mode'] .'[/color]) | ';
															} else {
																echo $show['mode'] .') | ';

															}

														}

													}

												}

												$limitCount ++;
												}

									}

								echo '[/size][/quote]';

						} // end if InstanceFOUND





					// do the Database Statistics and Table information
					if ( $database['dbDOCHECKS'] == _FPA_Y AND @$database['dbERROR'] == _FPA_N  AND $database['dbHOSTINFO'] <> _FPA_U AND $instance['configDBTYPE'] <> 'postgresql' AND $instance['configDBTYPE'] <> 'pgsql' ) {
						echo '[quote="Database Information ::"][size=85]';
						echo '[b]'. _FPA_DB .' '. _FPA_STATS .' :: [/b]';
						foreach ( $database['dbHOSTSTATS'] as $show ) {
						$dbPieces = explode(": ", $show );
						echo '[b]'. $dbPieces[0] .':[/b] '. $dbPieces[1] .' | ';
						}
						echo '[/size][/quote]';
					}

					// do the Extensions information
					if ( $instance['instanceFOUND'] == _FPA_Y AND ( @$_POST['showComponents'] == 'on' OR @$_POST['showModules'] == 'on' OR @$_POST['showPlugins'] == 'on' ) ) {
					echo '[quote="Extensions Discovered ::"][size=85]';

						if ( $_POST['showProtected'] == '3' ) {
							echo '[color=orange][b]Strict[/b] Information Privacy was selected.[/color] Nothing to display.';
							echo '[/size][/quote]';
						} else {

							if ( @$_POST['showComponents'] == 'on' ) {
								echo '[b]'. _FPA_EXTCOM_TITLE .' :: '. _FPA_SITE .' :: [/b]';
							if ( @$_POST[showCoreEx] == 'on') {
								echo "\r\n";
								echo '[b] ' . _FPA_JCORE . ' :: [/b][color=Blue]';
									foreach ( $component['SITE'] as $key => $show ) {
										if (isset($exset[0]['name'])) { 
										$extarrkey = recursive_array_search($show['name'], $exset);
										$extenabled = $exset[$extarrkey]['enabled'];
										} else { $extenabled = '' ;}
										if ($extenabled <> 0 AND $extenabled <> 1 ){
										$extenabled = '';
										}
										if ( $show['type'] == _FPA_JCORE)
										{                      
										echo  $show['name'] .' ('. $show['version'] .')  '.$extenabled.' | ';
										}
									}
                               echo '[/color]';
							}
								echo "\r\n";
								echo '[b]' .  _FPA_3PD . ':: [/b][color=Brown]';

									foreach ( $component['SITE'] as $key => $show ) {
										if (isset($exset[0]['name'])) { 
										$extarrkey = recursive_array_search($show['name'], $exset);
										$extenabled = $exset[$extarrkey]['enabled'];
										} else { $extenabled = '' ;}
										if ($extenabled <> 0 AND $extenabled <> 1 ){
										$extenabled = '';
										}
										if ( $show['type'] == _FPA_3PD)
										{                      
										echo  $show['name'] .' ('. $show['version'] .')  '.$extenabled.' | ';
										}
										}
                                          echo '[/color]';
								echo "\r\n\r\n";

								echo '[b]'. _FPA_EXTCOM_TITLE .' :: '. _FPA_ADMIN .' :: [/b]';
							if ( @$_POST[showCoreEx] == 'on') {
								echo "\r\n";
								echo '[b] ' . _FPA_JCORE . ' :: [/b][color=Blue]';
									foreach ( $component['ADMIN'] as $key => $show ) {
										if (isset($exset[0]['name'])) { 
										$extarrkey = recursive_array_search($show['name'], $exset);
										$extenabled = $exset[$extarrkey]['enabled'];
										} else { $extenabled = '' ;}
										if ($extenabled <> 0 AND $extenabled <> 1 ){
										$extenabled = '';
										}
										if ( $show['type'] == _FPA_JCORE)
										{                      
										echo  $show['name'] .' ('. $show['version'] .')  '.$extenabled.' | ';
										}
									}
                               echo '[/color]';
							}
								echo "\r\n";
								echo '[b]' .  _FPA_3PD . ':: [/b][color=Brown]';

									foreach ( $component['ADMIN'] as $key => $show ) {
										if (isset($exset[0]['name'])) { 
										$extarrkey = recursive_array_search($show['name'], $exset);
										$extenabled = $exset[$extarrkey]['enabled'];
										} else { $extenabled = '' ;}
										if ($extenabled <> 0 AND $extenabled <> 1 ){
										$extenabled = '';
										}
										if ( $show['type'] == _FPA_3PD)
										{                      
										echo  $show['name'] .' ('. $show['version'] .')  '.$extenabled.' | ';
										}
										}
                                          echo '[/color]';
			  			}
								echo "\r\n\r\n";

							if ( @$_POST['showModules'] == 'on' ) {
								echo '[b]'. _FPA_EXTMOD_TITLE .' :: '. _FPA_SITE .' :: [/b]';
							if ( @$_POST[showCoreEx] == 'on') {
								echo "\r\n";
								echo '[b] ' . _FPA_JCORE . ' :: [/b][color=Blue]';
									foreach ( $module['SITE'] as $key => $show ) {
										if (isset($exset[0]['name'])) { 
										$extarrkey = recursive_array_search($show['name'], $exset);
										$extenabled = $exset[$extarrkey]['enabled'];
										} else { $extenabled = '' ;}
										if ($extenabled <> 0 AND $extenabled <> 1 ){
										$extenabled = '';
										}
										if ( $show['type'] == _FPA_JCORE)
										{                      
										echo  $show['name'] .' ('. $show['version'] .')  '.$extenabled.' | ';
										}
									}
                               echo '[/color]';
							}
								echo "\r\n";
								echo '[b]' .  _FPA_3PD . ':: [/b][color=Brown]';

									foreach ( $module['SITE'] as $key => $show ) {
										if (isset($exset[0]['name'])) { 
										$extarrkey = recursive_array_search($show['name'], $exset);
										$extenabled = $exset[$extarrkey]['enabled'];
										} else { $extenabled = '' ;}
										if ($extenabled <> 0 AND $extenabled <> 1 ){
										$extenabled = '';
										}
										if ( $show['type'] == _FPA_3PD)
										{                      
										echo  $show['name'] .' ('. $show['version'] .')  '.$extenabled.' | ';
										}
										}
                                          echo '[/color]';
								echo "\r\n\r\n";

								echo '[b]'. _FPA_EXTMOD_TITLE .' :: '. _FPA_ADMIN .' :: [/b]';
							if ( @$_POST[showCoreEx] == 'on') {
								echo "\r\n";
								echo '[b] ' . _FPA_JCORE . ' :: [/b][color=Blue]';
									foreach ( $module['ADMIN'] as $key => $show ) {
										if (isset($exset[0]['name'])) { 
										$extarrkey = recursive_array_search($show['name'], $exset);
										$extenabled = $exset[$extarrkey]['enabled'];
										} else { $extenabled = '' ;}
										if ($extenabled <> 0 AND $extenabled <> 1 ){
										$extenabled = '';
										}
										if ( $show['type'] == _FPA_JCORE)
										{                      
										echo  $show['name'] .' ('. $show['version'] .')  '.$extenabled.' | ';
										}
									}
                               echo '[/color]';
							}
								echo "\r\n";
								echo '[b]' .  _FPA_3PD . ':: [/b][color=Brown]';

									foreach ( $module['ADMIN'] as $key => $show ) {
										if (isset($exset[0]['name'])) { 
										$extarrkey = recursive_array_search($show['name'], $exset);
										$extenabled = $exset[$extarrkey]['enabled'];
										} else { $extenabled = '' ;}
										if ($extenabled <> 0 AND $extenabled <> 1 ){
										$extenabled = '';
										}
										if ( $show['type'] == _FPA_3PD)
										{                      
										echo  $show['name'] .' ('. $show['version'] .')  '.$extenabled.' | ';
										}
										}
                                          echo '[/color]';
			  			}
								echo "\r\n\r\n";                              
							if ( @$_POST['showLibraries'] == 'on' ) {
								echo '[b]'. _FPA_EXTLIB_TITLE .' :: '. _FPA_SITE .' :: [/b]';
							if ( @$_POST[showCoreEx] == 'on') {
								echo "\r\n";
								echo '[b] ' . _FPA_JCORE . ' :: [/b][color=Blue]';
									foreach ( $library['SITE'] as $key => $show ) {
										if (isset($exset[0]['name'])) { 
										$extarrkey = recursive_array_search($show['name'], $exset);
										$extenabled = $exset[$extarrkey]['enabled'];
										} else { $extenabled = '' ;}
										if ($extenabled <> 0 AND $extenabled <> 1 ){
										$extenabled = '';
										}
										if ( $show['type'] == _FPA_JCORE)
										{                      
										echo  $show['name'] .' ('. $show['version'] .')  '.$extenabled.' | ';
										}
									}
                               echo '[/color]';
							}
								echo "\r\n";
								echo '[b]' .  _FPA_3PD . ':: [/b][color=Brown]';
									foreach ( $library['SITE'] as $key => $show ) {
										if (isset($exset[0]['name'])) { 
										$extarrkey = recursive_array_search($show['name'], $exset);
										$extenabled = $exset[$extarrkey]['enabled'];
										} else { $extenabled = '' ;}
										if ($extenabled <> 0 AND $extenabled <> 1 ){
										$extenabled = '';
										}
										if ( $show['type'] == _FPA_3PD)
										{                      
										echo  $show['name'] .' ('. $show['version'] .')  '.$extenabled.' | ';
										}
										}
                                          echo '[/color]';
						} 
								echo "\r\n\r\n";
							if ( @$_POST['showPlugins'] == 'on' ) {
								echo '[b]'. _FPA_EXTPLG_TITLE .' :: '. _FPA_SITE .' :: [/b]';
							if ( @$_POST[showCoreEx] == 'on') {
								echo "\r\n";
								echo '[b] ' . _FPA_JCORE . ' :: [/b][color=Blue]';
									foreach ( $plugin['SITE'] as $key => $show ) {
										if (isset($exset[0]['name'])) { 
										$extarrkey = recursive_array_search($show['name'], $exset);
										$extenabled = $exset[$extarrkey]['enabled'];
										} else { $extenabled = '' ;}
										if ($extenabled <> 0 AND $extenabled <> 1 ){
										$extenabled = '';
										}
										if ( $show['type'] == _FPA_JCORE)
										{                      
										echo  $show['name'] .' ('. $show['version'] .')  '.$extenabled.' | ';
										}
									}
                               echo '[/color]';
							}
								echo "\r\n";
								echo '[b]' .  _FPA_3PD . ':: [/b][color=Brown]';
									foreach ( $plugin['SITE'] as $key => $show ) {
										if (isset($exset[0]['name'])) { 
										$extarrkey = recursive_array_search($show['name'], $exset);
										$extenabled = $exset[$extarrkey]['enabled'];
										} else { $extenabled = '' ;}
										if ($extenabled <> 0 AND $extenabled <> 1 ){
										$extenabled = '';
										}
										if ( $show['type'] == _FPA_3PD)
										{                      
										echo  $show['name'] .' ('. $show['version'] .')  '.$extenabled.' | ';
										}
										}
                                          echo '[/color]';
						} 

							echo '[/size][/quote]';
					} // end showProtected != strict


						// do the template information
						if ( $instance['instanceFOUND'] == _FPA_Y ) {
							echo '[quote="'. _FPA_TMPL_TITLE .' Discovered ::"][size=85]';

								if ( $_POST['showProtected'] == '3' ) {
									echo '[color=orange][b]'. _FPA_STRICT .'[/b] '. _FPA_INFOPRI .'[/color] '. _FPA_NODISPLAY;
									echo '[/size][/quote]';
								} else {

									echo '[b]'. _FPA_TMPL_TITLE .' :: '. _FPA_SITE .' :: [/b]';

										foreach ( $template['SITE'] as $key => $show ) {                    
										if (substr($instance['cmsRELEASE'],0,1) <> 1 AND @$database['dbHOSTINFO'] <> _FPA_U OR $postgresql = _FPA_Y) { 
										if (isset($exset[0]['name'])) { 
										  $extarrkey = recursive_array_search($show['name'], $exset);
										  $extenabled = $exset[$extarrkey]['enabled'];
										  } else { $extenabled = '' ;}
										if ($extenabled <> 0 AND $extenabled <> 1 ){
										  $extenabled = '';
										}
										if (isset($tmpldef[0]['template'])) { 
										$extarrkey = recursive_array_search($show['name'], $tmpldef);
										$deftempl = $tmpldef[$extarrkey]['home'];    
										} else { $deftempl = '' ;}
										if ($deftempl == 1 ){                    
										  $bldop = '[b][u]';
										  $bldcl = '[/u][/b]';
										} else {
										  $bldop = '';
										  $bldcl = '';                                        
										}     
										} else {
										  $bldop = '';
										  $bldcl = '';
										  $extenabled = '';                                    
										}     
										if ( $show['type'] == _FPA_3PD OR @$_POST[showCoreEx] == 'on')
										{                      
										if ( $show['type'] == _FPA_3PD)
										{                     
										echo '[color=Brown]'. $bldop . $show['name'] .' ('. $show['version'] .')' . $bldcl . '[/color]  '.$extenabled.' | ';
										} else {
										echo '[color=Blue]'. $bldop . $show['name'] .' ('. $show['version'] .')' . $bldcl . '[/color]  '.$extenabled.' | ';
										}
								}
				 			}
									echo "\r\n";

									echo '[b]'. _FPA_TMPL_TITLE .' :: '. _FPA_ADMIN .' :: [/b]';

										foreach ( $template['ADMIN'] as $key => $show ) {                    
										if (substr($instance['cmsRELEASE'],0,1) <> 1 AND @$database['dbHOSTINFO'] <> _FPA_U OR $postgresql = _FPA_Y ) { 
										  if (isset($exset[0]['name'])) { 
										    $extarrkey = recursive_array_search($show['name'], $exset);
										    $extenabled = $exset[$extarrkey]['enabled'];
										  } else { 
										    $extenabled = '' ;
										}
										if ($extenabled <> 0 AND $extenabled <> 1 ){
										  $extenabled = '';
										}
										if (isset($tmpldef[0]['template'])) { 
										$extarrkey = recursive_array_search($show['name'], $tmpldef);
										$deftempl = $tmpldef[$extarrkey]['home'];    
										} else { $deftempl = '' ;}
										if ($deftempl == 1 ){                    
										  $bldop = '[b][u]';
										  $bldcl = '[/u][/b]';
										} else {
										  $bldop = '';
										  $bldcl = '';                                        
										}     
										} else {
										  $bldop = '';
										  $bldcl = '';
										  $extenabled = '';                                      
										}     
										if ( $show['type'] == _FPA_3PD OR @$_POST[showCoreEx] == 'on')
										{                      
										if ( $show['type'] == _FPA_3PD)
										{                     
										echo '[color=Brown]'. $bldop . $show['name'] .' ('. $show['version'] .')' . $bldcl . '[/color]  '.$extenabled.' | ';
										} else {
										echo '[color=Blue]'. $bldop . $show['name'] .' ('. $show['version'] .')' . $bldcl . '[/color]  '.$extenabled.' | ';
										}
									}
							}
						}
									echo '[/size][/quote]';
					}
					} // end if InstanceFOUND
 				echo '[/quote]';
                   	}


        ?></textarea>
          <button id="btnCopyToClipboard" class="btn btn-success btn-lg btn-block"><i class="glyphicon glyphicon-copy"></i> Copy Post Content To Clipboard</button>

          <p class="small text-muted margin-top-sm margin-remove-bottom">
            <i class="glyphicon glyphicon-info-sign"></i>&nbsp;
            In the event that the "Copy Post Content To Clipboard" button does not work, <strong>click inside the yellow textarea</strong>, then <strong>press CTRL-a (or Command-a)</strong> to select all the textarea content, <strong>press CTRL-c (Command-c)</strong> to copy the content and then use <strong>CRTL-v (Command-v)</strong> to paste the copied content in to your forum post.
          </p>

        </div>
        <div class="col-md-6">

          <fieldset id="optionalInformation" class="padding-remove-top" <?php echo @$disabled; ?>>
            <legend class="1margin-remove margin-bottom-sm">Instructions:</legend>

                <p class="bg-muted padding-lg">
                  There will be some instructions here. Short and to the point with an "Explain" for more help. There will be some instructions here.  Short and to the point with an "Explain" for more help.
                </p>

                <?php if (@$_POST['excessivePOST'] >= '1'): ?>
                  <a class="btn btn-primary btn-sm btn-block" onclick="$('#second-output-tab').tab('show');">Continue <span class="glyphicon glyphicon-chevron-right"></span></a>
                <?php endif; ?>


                <!-- TODO (RussW): determine how to split the content in to two textarea's if exceeds 20k characters-->
                <br />
                <div class="alert alert-danger">
                Post Length: <span id="counter" class="badge"></span>
                <br /><i>TODO: now we know the content length, we need to figure out a way of dynamically splitting large posts(over 20k) in to two textarea's</i>
                </div>

          </fieldset>

        </div>
      </div><!--/.row-->

    </div><!--/.tab-pane-->


    <div role="tabpanel" class="tab-pane" id="second-post-output">

      <h4>second-post-output or from 20K to 39K output</h4>
      <div class="row">
        <div class="col-md-6">

          <textarea class="form-control" rows="15" name="postOUTPUT" id="postOUTPUT" placeholder="Forum Post Content">
            if the post content exceeds 20K, but is under 40K the rest of the content will be displayed here and need to be posted in to an additional reply/post
            If the post exceeds 40K, the hosting and permissions sections(s) will display here only and a new tab is produced for the output above 40K
          </textarea>
          <button id="btnCopyToClipboard" class="btn btn-success btn-lg btn-block"><i class="glyphicon glyphicon-copy"></i> Copy Post Content To Clipboard</button>

          <p class="small text-muted margin-top-sm margin-remove-bottom">
            <i class="glyphicon glyphicon-info-sign"></i>&nbsp;
            In the event that the "Copy Post Content To Clipboard" button does not work, <strong>click inside the yellow textarea</strong>, then <strong>press CTRL-a (or Command-a)</strong> to select all the textarea content, <strong>press CTRL-c (Command-c)</strong> to copy the content and then use <strong>CRTL-v (Command-v)</strong> to paste the copied content in to your forum post.
          </p>

        </div>
        <div class="col-md-6">

          <fieldset id="optionalInformation" class="padding-remove-top" <?php echo @$disabled; ?>>
            <legend class="1margin-remove margin-bottom-sm">Instructions:</legend>

                <p class="bg-muted padding-lg">
                  There will be some instructions here. Short and to the point with an "Explain" for more help. There will be some instructions here.  Short and to the point with an "Explain" for more help.
                </p>

                <?php if (@$_POST['excessivePOST'] >= '2'): ?>
                  <a class="btn btn-primary btn-sm btn-block" onclick="$('#third-output-tab').tab('show');">Continue <span class="glyphicon glyphicon-chevron-right"></span></a>
                <?php endif; ?>


                <!-- TODO (RussW): determine how to split the content in to two textarea's if exceeds 20k characters-->
                <br />
                <div class="alert alert-danger">
                Post Length: <span id="counter" class="badge"></span>
                <br /><i>TODO: now we know the content length, we need to figure out a way of dynamically splitting large posts(over 20k) in to two textarea's</i>
                </div>

          </fieldset>

        </div>
      </div><!--/.row-->

    </div><!--/.tab-pane-->


    <div role="tabpanel" class="tab-pane" id="third-post-output">

      <h4>third-post-output or from 40K to 59K output</h4>
      <div class="row">
        <div class="col-md-6">

          <textarea class="form-control" rows="15" name="postOUTPUT" id="postOUTPUT" placeholder="Forum Post Content">
            if the post content exceeds 40K, but is under 60K the rest of the content will be displayed here and need to be posted in to another additional reply/post
            If the post exceeds 60K, the extensions sections(s) will display here only and a new tab is produced for the output above 60K
          </textarea>
          <button id="btnCopyToClipboard" class="btn btn-success btn-lg btn-block"><i class="glyphicon glyphicon-copy"></i> Copy Post Content To Clipboard</button>

          <p class="small text-muted margin-top-sm margin-remove-bottom">
            <i class="glyphicon glyphicon-info-sign"></i>&nbsp;
            In the event that the "Copy Post Content To Clipboard" button does not work, <strong>click inside the yellow textarea</strong>, then <strong>press CTRL-a (or Command-a)</strong> to select all the textarea content, <strong>press CTRL-c (Command-c)</strong> to copy the content and then use <strong>CRTL-v (Command-v)</strong> to paste the copied content in to your forum post.
          </p>

        </div>
        <div class="col-md-6">

          <fieldset id="optionalInformation" class="padding-remove-top" <?php echo @$disabled; ?>>
            <legend class="1margin-remove margin-bottom-sm">Instructions:</legend>

                <p class="bg-muted padding-lg">
                  There will be some instructions here. Short and to the point with an "Explain" for more help. There will be some instructions here.  Short and to the point with an "Explain" for more help.
                </p>

                <?php if (@$_POST['excessivePOST'] >= '3'): ?>
                  <a class="btn btn-primary btn-sm btn-block" onclick="$('#fourth-output-tab').tab('show');">Continue <span class="glyphicon glyphicon-chevron-right"></span></a>
                <?php endif; ?>


                <!-- TODO (RussW): determine how to split the content in to two textarea's if exceeds 20k characters-->
                <br />
                <div class="alert alert-danger">
                Post Length: <span id="counter" class="badge"></span>
                <br /><i>TODO: now we know the content length, we need to figure out a way of dynamically splitting large posts(over 20k) in to two textarea's</i>
                </div>

          </fieldset>

        </div>
      </div><!--/.row-->


    </div><!--/.tab-pane-->


    <div role="tabpanel" class="tab-pane" id="fourth-post-output">

      <h4>fourth-post-output is from 50K to 70K output</h4>
      <div class="row">
        <div class="col-md-6">

          <textarea class="form-control" rows="15" name="postOUTPUT" id="postOUTPUT" placeholder="Forum Post Content">
            this will only contain over 50K and under 70K output
          </textarea>
          <button id="btnCopyToClipboard" class="btn btn-success btn-lg btn-block"><i class="glyphicon glyphicon-copy"></i> Copy Post Content To Clipboard</button>

          <p class="small text-muted margin-top-sm margin-remove-bottom">
            <i class="glyphicon glyphicon-info-sign"></i>&nbsp;
            In the event that the "Copy Post Content To Clipboard" button does not work, <strong>click inside the yellow textarea</strong>, then <strong>press CTRL-a (or Command-a)</strong> to select all the textarea content, <strong>press CTRL-c (Command-c)</strong> to copy the content and then use <strong>CRTL-v (Command-v)</strong> to paste the copied content in to your forum post.
          </p>

        </div>
        <div class="col-md-6">

          <fieldset id="optionalInformation" class="padding-remove-top" <?php echo @$disabled; ?>>
            <legend class="1margin-remove margin-bottom-sm">Instructions:</legend>

                <p class="bg-muted padding-lg">
                  There will be some instructions here. Short and to the point with an "Explain" for more help. There will be some instructions here.  Short and to the point with an "Explain" for more help.
                </p>

                <?php //if (@$_POST['excessivePOST'] >= '4'): ?>
                  <!--
                  <a class="btn btn-primary btn-sm btn-block" onclick="$('#fourth-output-tab').tab('show');">Continue <span class="glyphicon glyphicon-chevron-right"></span></a>
                  -->
                <?php //endif; ?>


                <!-- TODO (RussW): determine how to split the content in to two textarea's if exceeds 20k characters-->
                <br />
                <div class="alert alert-danger">
                Post Length: <span id="counter" class="badge"></span>
                <br /><i>TODO: now we know the content length, we need to figure out a way of dynamically splitting large posts(over 20k) in to two textarea's</i>
                </div>

          </fieldset>

        </div>
      </div><!--/.row-->

    </div><!--/.tab-pane-->


  </div><!--/.tab-content-->

</div><!--/#excessive-post-->


<!--
<div id="excessive-post-carousel">

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-wrap="false" data-interval="false">
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner bg-muted" role="listbox" style="min-height: 500px;">

    <div class="item active" style="border:1px dotted red;min-height:500px;">
      <img src="..." alt="...">
      <div class="carousel-caption text-danger">
         <textarea class="form-control" rows="15" name="postOUTPUT" id="postOUTPUT" placeholder="Forum Post Content">
           dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only<br />dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only
          dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only<br />dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only
        </textarea>
        <button id="btnCopyToClipboard" class="btn btn-success btn-lg btn-block"><i class="glyphicon glyphicon-copy"></i> Copy Post Content To Clipboard</button>
        <h3>FIRST OUTPUT</h3>
        <p>tis is the first output</p>
      </div>
    </div>

    <div class="item" style="border:1px dotted red;min-height:500px;">
      <img src="..." alt="...">
      <div class="carousel-caption text-danger">
          <textarea class="form-control" rows="15" name="postOUTPUT" id="postOUTPUT" placeholder="Forum Post Content">
           dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only<br />dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only
          dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only<br />dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only
        </textarea>
        <button id="btnCopyToClipboard" class="btn btn-success btn-lg btn-block"><i class="glyphicon glyphicon-copy"></i> Copy Post Content To Clipboard</button>
        <h3>SECOND OUTPUT</h3>
        <p>tis is the second output</p>
      </div>
    </div>

    <div class="item" style="border:1px dotted red;min-height:500px;">
      <img src="..." alt="...">
      <div class="carousel-caption text-danger">
         <textarea class="form-control" rows="15" name="postOUTPUT" id="postOUTPUT" placeholder="Forum Post Content">
           dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only<br />dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only
          dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only<br />dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes onlydummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only,dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only, dummy content for testing purposes only dummy content for testing purposes only, dummy content for testing purposes only
        </textarea>
        <button id="btnCopyToClipboard" class="btn btn-success btn-lg btn-block"><i class="glyphicon glyphicon-copy"></i> Copy Post Content To Clipboard</button>
        <h3>THIRD OUTPUT</h3>
        <p>tis is the third output</p>
      </div>
    </div>

  </div>

  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div>
-->