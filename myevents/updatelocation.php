<?php 

	include 'common.php';
	
	$path = "../";

	extract($_POST);

	// Add new event
	$Location->Update($_POST);

	$redirect = "locationlist.php";

	$Temp->addvar("redirect", $redirect);

	
$Temp->display("overallheader.tpl.php");
$Temp->display("pageheader.tpl.php");
$Temp->display("messages/updatelocation.tpl.php");	
$Temp->display("pagefooter.tpl.php");


	
?>
