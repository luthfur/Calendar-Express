<?php 

	include 'common.php';

	// Delete selected user
	$User->Update($_POST);

	$redirect = "userdetails.php?uid=" . $_POST[user_id];

	$Temp->addvar("redirect", $redirect);

	
$Temp->display("overallheader.tpl.php");
$Temp->display("pageheader.tpl.php");
$Temp->display("process.tpl.php");	
$Temp->display("pagefooter.tpl.php");


	
?>
