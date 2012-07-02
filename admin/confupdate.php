<?php 

	include 'common.php';

	$conf = $config_location . "settings.php";

	if(!is_writable($conf)) {
		
		$error = 1;

		$calresult = $GetCalendar->getList();

	$Temp->addVar("error", $error);

	$Temp->addVar("calresult", $calresult);

	$Temp->display("overallheader.tpl.php");

	$Temp->display("pageheader.tpl.php");

	$Temp->display("settings.tpl.php");

	$Temp->display("pagefooter.tpl.php");

	} else {



	// Update settings
	$Settings->Update($_POST);

	$redirect = "settings.php";

	$Temp->addvar("redirect", $redirect);

	
$Temp->display("overallheader.tpl.php");
$Temp->display("pageheader.tpl.php");
$Temp->display("messages/process.tpl.php");	
$Temp->display("pagefooter.tpl.php");


	}

	
?>
