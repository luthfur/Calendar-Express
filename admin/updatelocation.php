<?php 

	include 'common.php';
	
	$path = "../";

	extract($_POST);

	// Add new event
	$Location->Update($_POST);

	$redirect = "locationdetails.php?lid=$_POST[location_id]";

	$Temp->addvar("redirect", $redirect);

	
$Temp->display("overallheader.tpl.php");
$Temp->display("pageheader.tpl.php");
$Temp->display("process.tpl.php");	
$Temp->display("pagefooter.tpl.php");


	
?>
