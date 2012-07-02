<?php 

	include 'common.php';
	
	
	$aid = $_GET[aid];
	
	// Delete selected event
	$Admin->Delete($aid);
	
	$redirect = "admin.php";

	$Temp->addvar("redirect", $redirect);

	
$Temp->display("overallheader.tpl.php");
$Temp->display("pageheader.tpl.php");
$Temp->display("process.tpl.php");	
$Temp->display("pagefooter.tpl.php");

	
?>
