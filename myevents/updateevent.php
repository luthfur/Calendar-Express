<?php 

	include 'common.php';
	
	$path = "../";

	extract($_POST);

	// Add new event
	$Event->Update($_POST);

	$redirect = "eventlist.php";

	$Temp->addvar("redirect", $redirect);

	
$Temp->display("overallheader.tpl.php");
$Temp->display("pageheader.tpl.php");
$Temp->display("messages/updateevent.tpl.php");	
$Temp->display("pagefooter.tpl.php");


	
?>
