<?php 

	include 'common.php';
	
	$uid = $_GET['uid'];
	$cid = $_GET['cid'];

	$path = "../";

	// Delete selected calendar privilege
	$UserPriv->Delete($uid, $cid);

	$redirect = "userdetails.php?uid=$uid";

	$Temp->addvar("redirect", $redirect);

	
$Temp->display("overallheader.tpl.php");
$Temp->display("pageheader.tpl.php");
$Temp->display("process.tpl.php");	
$Temp->display("pagefooter.tpl.php");


	
?>
