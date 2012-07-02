<?php 

	include 'common.php';

	// Update selected category
	$Category->Update($_POST);

	$redirect = "catdetails.php?catid=$_POST[cat_id]";

	$Temp->addvar("redirect", $redirect);

	
$Temp->display("overallheader.tpl.php");
$Temp->display("pageheader.tpl.php");
$Temp->display("messages/catupdate.tpl.php");	
$Temp->display("pagefooter.tpl.php");


	
?>
