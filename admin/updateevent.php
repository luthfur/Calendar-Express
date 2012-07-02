<?php 

	include 'common.php';
	
	$path = "../";

	extract($_POST);

	// Add new event
	$Event->Update($_POST);

	$redirect = "eventdetails.php?eid=$_POST[event_id]";

	$Temp->addvar("redirect", $redirect);

	
$Temp->display("overallheader.tpl.php");
$Temp->display("pageheader.tpl.php");
$Temp->display("process.tpl.php");	
$Temp->display("pagefooter.tpl.php");


	
?>
