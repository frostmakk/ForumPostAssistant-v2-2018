<?php echo '<!-- NOTE (RussW): include '. basename(__FILE__) .' placeholder -->'; ?>
<?php
  /* NOTE (RussW): build initial arrays
   *
   */

	/** API and ownership related settings ***************************************************/
	$phpenv['phpAPI']               = php_sapi_name();

		// looking for php to be installed as a CGI or CGI/Fast
		if (substr($phpenv['phpAPI'], 0, 3) == 'cgi') {
			$phpenv['phpCGI'] = _FPA_Y;

			// looking for the Apache "suExec" utility
			if ( ( $system['sysCURRUSER'] === $system['sysWEBOWNER'] ) AND ( substr($phpenv['phpAPI'], 0, 3) == 'cgi' ) ) {
				$phpenv['phpAPACHESUEXEC'] = _FPA_Y;
				$phpenv['phpOWNERPROB'] = _FPA_N;

			} else {
				$phpenv['phpAPACHESUEXEC'] = _FPA_N;
				$phpenv['phpOWNERPROB'] = _FPA_M;
			}

			// looking for the "phpsuExec" utility
			if ( ( $system['sysCURRUSER'] === $system['sysEXECUSER'] ) AND ( substr($phpenv['phpAPI'], 0, 3) == 'cgi' ) ) {
				$phpenv['phpPHPSUEXEC'] = _FPA_Y;
				$phpenv['phpOWNERPROB'] = _FPA_N;

			} else {
				$phpenv['phpPHPSUEXEC'] = _FPA_N;
				$phpenv['phpOWNERPROB'] = _FPA_M;
			}

		} else {
			$phpenv['phpCGI'] = _FPA_N;
			$phpenv['phpAPACHESUEXEC'] = _FPA_N;
			$phpenv['phpPHPSUEXEC'] = _FPA_N;
			$phpenv['phpOWNERPROB'] = _FPA_M;
		}



		/** WARNING WILL ROBINSON! ****************************************************************
		** THIS IS A TEST FEATURE AND AS SUCH NOT GUARANTEED TO BE 100% ACCURATE
		** try and cater for custom "su" environments, like cluster, grid and cloud computing.
		** this would include weird ownership combinations that allow group access to non-owner files
		** (like GoDaddy and a couple of grid and cloud providers I know of)
		*****************************************************************************************
		** took out this part: AND ( $instance['configWRITABLE'] == _FPA_Y )  as Joomla sets config file
		** to 444 so is read only permissions. Also changed this section:
		** ( $system['sysCURRUSER'] != $instance['configOWNER']['name'] from != to ==
		** If config owner is same as current user then we are probably using a custom "su" enviroment
		** such as LiteSpeed uses - 4-8-12 - Phil **/

		if ( ( $instance['instanceCONFIGURED'] == _FPA_Y ) AND ( @$phpenv['phpAPI'] == 'litespeed' ) AND ( $system['sysCURRUSER'] == $instance['configOWNER']['name'] ) AND ( ( substr( $instance['configMODE'],0 ,1 ) < '6' ) OR ( substr( $instance['configMODE'],1 ,1 ) < '6' ) OR ( substr( $instance['configMODE'],2 ,1 ) <= '6' ) ) ) {
		/** changed from maybe to yes - 4-8-12 - Phil **/
		$phpenv['phpCUSTOMSU'] = _FPA_Y;
			$phpenv['phpOWNERPROB'] = _FPA_N;

		} elseif( ( $instance['instanceCONFIGURED'] == _FPA_Y ) AND ( $system['sysCURRUSER'] == $instance['configOWNER']['name'] ) AND ( ( substr( $instance['configMODE'],0 ,1 ) < '6' ) OR ( substr( $instance['configMODE'],1 ,1 ) < '6' ) OR ( substr( $instance['configMODE'],2 ,1 ) <= '6' ) ) ) {
		/** changed from maybe to yes - 4-8-12 - Phil **/
		$phpenv['phpCUSTOMSU'] = _FPA_Y;
			$phpenv['phpOWNERPROB'] = _FPA_N;

		} else {
			$phpenv['phpCUSTOMSU'] = _FPA_N;
			$phpenv['phpOWNERPROB'] = _FPA_M;
		}



		/*****************************************************************************************/
		/** THIS IS A TEST FEATURE AND AS SUCH NOT GUARANTEED TO BE 100% ACCURATE ****************/
		/*****************************************************************************************/





?>