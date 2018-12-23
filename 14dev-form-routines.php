<?php echo '<!-- NOTE (RussW): include '. basename(__FILE__) .' placeholder -->'; ?>
<?php

    // CMS Found
    if($instance['instanceFOUND'] == _FPA_Y) {
        $styleinstancefound = 'success';
        $fieldinstancefound =  _FPA_Y_ICON ;
    }
    else if($instance['instanceFOUND'] == _FPA_N) {
        $styleinstancefound = 'alert';
        $fieldinstancefound =  _FPA_N_ICON ; 
    }
    else{
        $styleinstancefound = 'unknown';
        $fieldinstancefound =  _FPA_U_ICON ; 
    }
     //CMS devStatus
    if($instance['cmsDEVSTATUS'] == 'Stable') {
        $styledevstatus = 'success';
    }
    else{
        $styledevstatus = 'warning'; 
    }






    // Platform found
if (isset($instance['platformVFILE']))  {
    if($instance['platformVFILE'] != _FPA_N) {
        $stylepltffound = 'success';
        $fieldpltffound =  _FPA_Y_ICON ;
    }
    else{
        $stylepltffound = 'unknown';
        $fieldpltffound =  _FPA_N_ICON ; 
    }
}else{
        $stylepltffound = 'unknown';
        $fieldpltffound =  _FPA_N_ICON ; 
}


     // Platform devStatus
if (isset($instance['platformDEVSTATUS']))  {
     if($instance['platformDEVSTATUS'] == 'Stable') {
        $stylepltfdevstatus = 'success';
        $frmpltfdevstatus = $instance['platformDEVSTATUS'];
    }
    else{
        $stylepltfdevstatus = 'warning'; 
        $frmpltfdevstatus = $instance['platformDEVSTATUS'];
    }
}else{
        $stylepltfdevstatus = 'normal'; 
        $frmpltfdevstatus = _FPA_NA;

}

     // Platform devlevel
if (isset($instance['platformDEVLEVEL']))  {
        $frmpltfdevlevel =  $instance['platformDEVLEVEL'];           
    }
    else{
        $frmpltfdevlevel =  '';
    }


     // Platform release
if (isset($instance['platformRELEASE']))  {
        $frmpltfrelease =  $instance['platformRELEASE'];           
    }
    else{
        $frmpltfrelease =  _FPA_NA;
    }



    // Config file found
    if($instance['instanceCONFIGURED'] == _FPA_Y) {
        $isconfig =  _FPA_Y_ICON ;
    }
    else{
        $isconfig =  _FPA_N_ICON ; 
    } 
    // Config file valid
    if($instance['configSANE'] == _FPA_Y) {
        $isconfigvalid =  _FPA_Y_ICON ;
    }
    else{
        $isconfigvalid =  _FPA_N_ICON ; 
    } 
    // Config file Matches CMS
    if($instance['instanceCFGVERMATCH'] == _FPA_Y) {
        $configmatches =  _FPA_Y_ICON ;
    }
    else{
        $configmatches =  _FPA_U_ICON ; 
    } 


    // Site offline
    if($instance['configOFFLINE'] == 'true') {
        $siteonline =  _FPA_N_ICON ;
    }
    else if($instance['configOFFLINE'] == '1') {
        $siteonline =  _FPA_N_ICON ;
    }
    else if($instance['configOFFLINE'] == 'false') {
        $siteonline =  _FPA_Y_ICON ;
    }
    else if($instance['configOFFLINE'] == '0') {
        $siteonline =  _FPA_Y_ICON ;
    }
    else{
        $siteonline =  _FPA_U_ICON ; 
    } 

    // PHP supports MySQL
    if($phpenv['phpSUPPORTSMYSQL'] == _FPA_Y) {
        $suppmysql =  _FPA_Y_ICON ;
        $stylesuppmysql = 'success';
    }
    else{
        $suppmysql =  _FPA_N_ICON ; 
        $stylesuppmysql = 'warning';
    } 

    // PHP supports MySQLI
    if($phpenv['phpSUPPORTSMYSQLI'] == _FPA_Y) {
        $suppmysqli =  _FPA_Y_ICON ;
        $stylesuppmysqli = 'success';
    }
    else{
        $suppmysqli =  _FPA_N_ICON ; 
        $stylesuppmysqli = 'warning';
    }  
 
 
    if ( function_exists( 'disk_free_space' ) )
    {
        $free_space = sprintf( '%.2f', disk_free_space( './' ) /1073741824 );
        $system['sysFREESPACE'] = $free_space .' GiB';
    }
    else
    {
        $system['sysFREESPACE'] = _FPA_U;
    } 
    
 
    // PHP error reporting
    if($phpenv['phpERRORDISPLAY'] == '1') {
        $frmerrorrep =  _FPA_Y_ICON ;
    }
    else{
        $frmerrorrep =  _FPA_N_ICON ; 
    }   



    
    if($phpenv['phpMAGICQUOTES']) {
        $frmmagic =  _FPA_Y_ICON ;
    }
    else{
        $frmmagic =  _FPA_N_ICON ; 
    }   



        if($phpenv['phpSAFEMODE']) {
        $frmsafemod =  _FPA_Y_ICON ;
    }
    else{
        $frmsafemod =  _FPA_N_ICON ; 
    } 
    
    
        if($phpenv['phpUPLOADS'] == '1') {
        $frmfupl =  _FPA_Y_ICON ;
    }
    else{
        $frmfupl  =  _FPA_N_ICON ; 
    }     
    
         if($phpenv['phpSESSIONPATHWRITABLE'] == _FPA_Y) {
        $frmiswrtbl =  _FPA_Y_ICON ;
    }
    else{
        $frmiswrtbl =  _FPA_N_ICON ; 
    }  



	// minimum and maximum PHP support requirements met?


		if ( $fpa['supportENV']['minPHP'] == _FPA_NA ) {
			$snapshot['phpSUP4J'] = _FPA_U;
            $frmphpSUP4J =  _FPA_U_ICON ;
		} elseif ( ( version_compare( PHP_VERSION, $fpa['supportENV']['minPHP'], '>=' ) ) AND ( version_compare( PHP_VERSION, $fpa['supportENV']['maxPHP'], '<=' ) ) ) {
			$snapshot['phpSUP4J'] = _FPA_Y;
            $frmphpSUP4J =  _FPA_Y_ICON ;
		} elseif ( ( version_compare( PHP_VERSION, $fpa['supportENV']['minPHP'], '<' ) ) OR ( version_compare( PHP_VERSION, $fpa['supportENV']['maxPHP'], '>' ) ) ) {
			$snapshot['phpSUP4J'] = _FPA_N;
            $frmphpSUP4J =  _FPA_N_ICON ;
		} else {
			$snapshot['phpSUP4J'] = _FPA_U;
            $frmphpSUP4J =  _FPA_U_ICON ;
		}



	// MySQL supported by PHP?

		if ( array_key_exists( 'mysql', $phpextensions ) ) {
			$snapshot['phpSUP4MYSQL'] = _FPA_Y;

		} else {
			$snapshot['phpSUP4MYSQL'] = _FPA_N;
		}




	// MySQLi supported by PHP?

		if ( array_key_exists( 'mysqli', $phpextensions ) ) {
			$snapshot['phpSUP4MYSQL-i'] = _FPA_Y;

		} else {
			$snapshot['phpSUP4MYSQL-i'] = _FPA_N;
		}


	// minimum and maximum MySQL support requirements met?

		if ( $fpa['supportENV']['minSQL'] == _FPA_NA OR @$database['dbERROR'] != _FPA_N ) {
			$snapshot['sqlSUP4J'] = _FPA_U;
            $frmDbSUP4J =  _FPA_U_ICON ;
		} elseif ( ( version_compare( @$database['dbHOSTSERV'], $fpa['supportENV']['minSQL'], '>=' ) ) AND ( version_compare( @$database['dbHOSTSERV'], $fpa['supportENV']['maxSQL'], '<=' ) ) ) {

			// WARNING, will run, but ONLY after modifying install SQL to remove ENGINE TYPE statements (removed in MySQL 5.5)
			if ( ( $instance['cmsRELEASE'] == '1.5' ) AND ( @$database['dbHOSTSERV'] > '5.1.43' ) ) {
				$snapshot['sqlSUP4J'] = _FPA_M;
                $frmDbSUP4J =  _FPA_U_ICON ;
			} else {
				$snapshot['sqlSUP4J'] = _FPA_Y;
                $frmDbSUP4J =  _FPA_Y_ICON ;
			}

		} elseif ( ( version_compare( @$database['dbHOSTSERV'], $fpa['supportENV']['minSQL'], '<' ) ) OR ( version_compare( @$database['dbHOSTSERV'], $fpa['supportENV']['maxSQL'], '>' ) ) ) {

			// WARNING, will run, but ONLY after modifying install SQL to remove ENGINE TYPE statements (removed in MySQL 5.5)
			if ( ( $instance['cmsRELEASE'] == '1.5' ) AND ( @$database['dbHOSTSERV'] > '5.1.43' ) ) {
				$snapshot['sqlSUP4J'] = _FPA_M;
                $frmDbSUP4J =  _FPA_U_ICON ;
			} 
			//Added this elseif to give the ok for postgreSQL
			elseif ($instance['configDBTYPE'] == 'postgresql' AND $database['dbHOSTSERV'] >= 8.3 ) {
				$snapshot['sqlSUP4J'] = _FPA_Y;
                $frmDbSUP4J =  _FPA_Y_ICON ;
			}

			//Added this elseif to give the ok for PDO postgreSQL
			elseif ($instance['configDBTYPE'] == 'pgsql' AND $database['dbHOSTSERV'] >= 8.3 ) {
				$snapshot['sqlSUP4J'] = _FPA_Y;
                $frmDbSUP4J =  _FPA_Y_ICON ;
			}
                         
			//Added this elseif to give the ok for MariaDB -- PhilD 03-17-17
			elseif (@$output_array[0] == "MariaDB") {
				$snapshot['sqlSUP4J'] = _FPA_Y;
                $frmDbSUP4J =  _FPA_Y_ICON ;
			}
			else {
				$snapshot['sqlSUP4J'] = _FPA_N;
                $frmDbSUP4J =  _FPA_N_ICON ;
			}

		} else {
			$snapshot['sqlSUP4J'] = _FPA_U;
            $frmDbSUP4J =  _FPA_U_ICON ;
		}



	// MySQLi supported by MySQL?

		if ( !@$database['dbHOSTSERV'] OR @$database['dbERROR'] != _FPA_N ) {
			$snapshot['sqlSUP4SQL-i'] = _FPA_U;

		} elseif ( version_compare( @$database['dbHOSTSERV'], '5.0.7', '>=' ) ) {

		} else {
			$snapshot['sqlSUP4SQL-i'] = _FPA_N;
		}



	// known buggy php releases (mainly for installation on 1.5)

		foreach ( $fpa['supportENV']['badPHP'] as $badKey => $badValue ) {
			if ( version_compare( PHP_VERSION, $badValue, '==' ) ) {
				$badANS = _FPA_Y;
				continue;
			}

		}

		if ( @$badANS == _FPA_Y ) {
			$badClass = 'alert-text';
			$snapshot['buggyPHP'] = _FPA_Y;

		} else {
			$badANS = _FPA_N;
			$badClass = 'ok';
			$snapshot['buggyPHP'] = _FPA_N;
		}



// reset variables to fix zend check bug
	$badValue = "";
	$badANS = "";
		foreach ( $fpa['supportENV']['badZND'] as $badKey => $badValue ) {

			if ( version_compare( $phpextensions['Zend Engine'], $badValue, '==' ) ) {
				$badANS = _FPA_Y;
				continue;
			}

		}

		if ( @$badANS == _FPA_Y ) {
			$badClass = 'alert-text';
			$snapshot['buggyZEND'] = _FPA_Y;

		} else {
			$badANS = _FPA_N;
			$badClass = 'ok';
			$snapshot['buggyZEND'] = _FPA_N;
		}
                       
    // Db Connected
    if($dBconn) {
        $fieldconnected =  _FPA_Y_ICON ;
    }
    else{
        $fieldconnected =  _FPA_N_ICON ; 
    }


        if (function_exists('disk_total_space'))
        {
        	$total_space = sprintf('%.2f', disk_total_space('./') / 1073741824) . ' GiB';
        }
        else
        {
        	$total_space = _FPA_U_ICON;
        }


 
 
 
 
 
    
?>