<?php

extract($_POST);

$source_location = "../sources/";
include $source_location . 'mysql_db.php';
include $source_location . 'result_iterator.php';
include $source_location . 'functions.php';



/******************** Connect to Database ***********************/
$DB = new DB($hostname);

$Result = new Result();

if(!$DB->connect($username, $password)){
		
	$error[connection] = 1;


} elseif (!$DB->setDB($dbname)) {

	$error[dbexist] = 1;

} elseif(!$admin_username) {

   $error['admin_username'] = 1;    
   
} elseif(!$admin_password || ($admin_password != $pass2)) {

   $error['admin_password'] = 1;     
   
} elseif(!$full_name) {

   $error['full_name'] = 1;
   
} elseif(!$email && !checkmail($email)) {

   $error['email'] = 1; 
}


if(isset($error)) {

	include 'dbinstall.php';


} else {

	
		if(!$prefix) $prefix = "ce";

		$tableprefix = $prefix;
	
		$calendar_table = $tableprefix . "_calendar";
		$subscr_table = $tableprefix . "_subscr";
		$category_table = $tableprefix . "_category";
		$event_table = $tableprefix . "_event";
		$location_table = $tableprefix . "_location";
		$contact_table = $tableprefix . "_contact";
		$user_table = $tableprefix . "_user";
		$admin_table = $tableprefix . "_admin";
		$email_table = $tableprefix . "_email";
		$userpriv_table = $tableprefix . "_userpriv";
		$occurence_table = $tableprefix . "_occurence";

		include 'configwrite.php';

		
		// write to file
		$fp = fopen("../config.php", "w");
		fwrite ($fp, $conf);


		// include SQL statements
		include 'dbtables.php';

		// Execute all queries:

		while (list($ind, $val) = each($SQL)) {

			$DB->Query($val);

		}


		include 'complete.php';



}




?>