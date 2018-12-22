<?php echo '<!-- NOTE (RussW): include '. basename(__FILE__) .' placeholder -->'; ?>
<?php
  /* NOTE (RussW): build initial arrays
   *
   */
	/** COMPLETE MODE (PERMISSIONS) CHECKS ON KNOWN FOLDERS ***********************************
	** test the mode and writability of known folders from the $folders array
	** to try and avoid "white-screens" fpa tries to check for function availability before
	** using any function, but this does mean it has grown in size quite a bit and unfortunately
	** gets a little messy in places.
	*****************************************************************************************/
	/** build the mode-set details for each folder *******************************************/
	if ( $instance['instanceFOUND'] == _FPA_Y ) {

		foreach ( $folders as $i => $show ) {

			if ( $show != $folders['ARRNAME'] ) { // ignore the ARRNAME

				if ( file_exists( $show ) ) {
					$modecheck[$show]['mode'] = substr( sprintf('%o', fileperms( $show ) ),-3, 3 );

					if ( is_writable( $show ) ) {
						$modecheck[$show]['writable'] = _FPA_Y;

					} else {
						$modecheck[$show]['writable'] = _FPA_N;
					}


					if ( function_exists( 'posix_getpwuid' ) AND $system['sysSHORTOS'] != 'WIN' ) {
						$modecheck[$show]['owner'] = posix_getpwuid( fileowner( $show ) );
						$modecheck[$show]['group'] = posix_getgrgid( filegroup( $show ) );

					} else { // non-posix compatible hosts
						$modecheck[$show]['owner']['name'] = fileowner( $show );
						$modecheck[$show]['group']['name'] = filegroup( $show );
					}


				} else {
					$modecheck[$show]['mode'] = '---';
					$modecheck[$show]['writable'] = '-';
					$modecheck[$show]['owner']['name'] = '-';
					$modecheck[$show]['group']['name'] = _FPA_DNE;
				}
			}
		}


		// !CLEANME this needs to be done a little smarter
		// here we take the folders array and unset folders that aren't relevant to a specific release
		function filter_folders( $folders, $instance ) {
		GLOBAL $folders;

			if ( $instance['cmsRELEASE'] != '1.0' ) {           // ignore the folders for J!1.0
				unset ( $folders[4] );

			} elseif ( $instance['cmsRELEASE'] == '1.0' ) {     // ignore folders for J1.5 and above
				unset ( $folders[3] );
				unset ( $folders[8] );
				unset ( $folders[9] );
				unset ( $folders[12] );
			}


			if ( $instance['platformPRODUCT'] != 'Nooku' ) {    // ignore the Nooku sites folder if not Nooku
				unset ( $folders[14] );
			}

		}

		// !FIXME need to fix warning in array_filter ( '@' work-around )
		// new filtered list of folders to check permissions on, based on the installed release
		@array_filter( $folders, filter_folders( $folders, $instance ) );

	}
	unset ( $key, $show );
?>



<?php
	/** getDirectory FUNCTION TO RECURSIVELY READ THROUGH LOOKING FOR PERMISSIONS ************
	** this is used to read the directory structure and return a list of folders with 'elevated'
	** mode-sets ( -7- or --7 ) ignoring the first position as defaults folders are normally 755.
	** $dirCount is applied when the folder list is excessive to reduce unnecessary processing
	** on really sites with 00's or 000's of badly configured folder modes. Limited to displaying
	** the first 10 only.
	*****************************************************************************************/


		$dirCount = 0;

		function getDirectory( $path = '.', $level = 0 ) {
			global $elevated, $dirCount;

			// directories to ignore when listing output. Many hosts
			$ignore = array( '.', '..' );

			// open the directory to the handle $dh
			if ( !$dh = @opendir( $path ) )
			{ # Bernard: if a folder is NOT readable, without this check we get endless loop
				echo '<div class="alert" style="padding:25px;"><span class="alert-text" style="font-size:x-large;">'._FPA_DIR_UNREADABLE.': <b>'.$path.'</b></span></div>';
				return FALSE;
			}
			
			

			// loop through the directory
			while ( false !== ( $file = readdir( $dh ) ) ) {

				// check that this file is not to be ignored
				if ( !in_array( $file, $ignore ) ) {

					if ( $dirCount < '10' ) { // 10 or more folder will cancel the processing

						// its a directory, so we need to keep reading down...
						if ( is_dir( "$path/$file" ) ) {

							$dirName = $path .'/'. $file;
							$dirMode = substr( sprintf( '%o', fileperms( $dirName ) ),-3, 3 );

								// looking for --7 or -7- or -77 (default folder permissions are usually 755)
								if ( substr( $dirMode,1 ,1 ) == '7' OR substr( $dirMode,2 ,1 ) == '7' ) {
									$elevated[''. str_replace( './','', $dirName ) .'']['mode'] = $dirMode;

									if ( is_writable( $dirName ) ) {
										$elevated[''. str_replace( './','', $dirName ) .'']['writable'] = _FPA_Y;

									} else {  // custom ownership or setUiD/GiD in-effect
										$elevated[''. str_replace( './','', $dirName ) .'']['writable'] = _FPA_N;
									}
									$dirCount++;
								}

								// re-call this same function but on a new directory.
								getDirectory ( "$path/$file", ( $level +1 ) );

						}
					}
				}
			}
			// Close the directory handle
			closedir( $dh );
		}
		/** Fixed Warning: Illegal string offset 'mode' on line 1476
		** Warning: Illegal string offset 'writable' on line 1477 - Phil 09-20-12*/
			if (isset( $dirCount) == '0' ) {
				$elevated['None'] = _FPA_NONE;
				$elevated['None']['mode'] = '-';
				$elevated['None']['writable'] = '-';
			}

		// now call the function to read from the selected folder ( '.' current location of FPA script )
		getDirectory( '.' );
		ksort( $elevated );


?>