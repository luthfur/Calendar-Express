<?php 

	include 'common.php';
	
	
	$eid = $_GET[eid];
	
	// Delete selected event
	$Event->Delete($eid);
	
	$redirect = "eventlist.php";

	$Temp->addvar("redirect", $redirect);

	
$Temp->display("overallheader.tpl.php");
$Temp->display("pageheader.tpl.php");
$Temp->display("messages/eventdelete.tpl.php");	
$Temp->display("pagefooter.tpl.php");

	
?>
