<?php
	
	
	include '../config_old.php';

$source_location = "../sources/";
include $source_location . 'mysql_db.php';
include $source_location . 'result_iterator.php';
include $source_location . 'functions.php';
include 'importfunctions.php';

// Connect to DB
$DB = new DB($_CONF['hostname'], $_CONF['database']);
$DB->connect($_CONF['username'], $_CONF['password']);


$Result=new Result;


	$hostname = $_CONF['hostname'];
	$username = $_CONF['username'];
	$password = $_CONF['password'];
	$database = $_CONF['database'];
	$tableprefix = "newce";
	
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

	include 'importevent.php';
//echo "here";






?>