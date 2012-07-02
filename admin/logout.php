<?php

include 'common.php';

$AdminSession->Destroy();
	
$redirect = "login.php";

	
$Temp->addvar("redirect", $redirect);

	
$Temp->display("overallheader.tpl.php");

$Temp->display("pageheader.tpl.php");

$Temp->display("messages/logoutmessage.tpl.php");

$Temp->display("pagefooter.tpl.php");

?>

