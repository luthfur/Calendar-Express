<?php 

	include 'common.php';
	
	$path = "../";

	extract($_POST);

	// Add new event
	$Contact->Update($_POST);

	$redirect = "contactdetails.php?conid=$_POST[contact_id]";

	$Temp->addvar("redirect", $redirect);

$Temp->display("overallheader.tpl.php");
$Temp->display("pageheader.tpl.php");
$Temp->display("messages/updatecontact.tpl.php");	
$Temp->display("pagefooter.tpl.php");
	
?>
