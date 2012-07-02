<?php 

	include 'common.php';
	
	$id = $_GET['eid'];

	$path = "../";

	// Delete selected calendar
	$Event->Reject($id);

	$redirect = "unappevent.php";

	$Temp->addvar("redirect", $redirect);

	
$Temp->display("overallheader.tpl.php");
$Temp->display("pageheader.tpl.php");
$Temp->display("process.tpl.php");	
$Temp->display("pagefooter.tpl.php");


	
?>
