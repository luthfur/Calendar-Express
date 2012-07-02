<?php 

	include 'common.php';
	
	$id = $_GET['uid'];

	$path = "../";

	// Approve User
	$User->Activate($id);
	$RegEmail->NotifyAcc($id);

	$redirect = "unappuser.php";

	$Temp->addvar("redirect", $redirect);

	
$Temp->display("overallheader.tpl.php");
$Temp->display("pageheader.tpl.php");
$Temp->display("process.tpl.php");	
$Temp->display("pagefooter.tpl.php");


	
?>
