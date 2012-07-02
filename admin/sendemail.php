<?php 

	include 'common.php';
	
	// Add Email to Database
	$UserMail->addNew($_POST);
	
	// Send Email
	$UserMail->sendMessage($email_subj, $email_message);

	$redirect = "mail.php";

	$Temp->addvar("redirect", $redirect);

	
$Temp->display("overallheader.tpl.php");
$Temp->display("pageheader.tpl.php");
$Temp->display("process.tpl.php");	
$Temp->display("pagefooter.tpl.php");


	
?>
