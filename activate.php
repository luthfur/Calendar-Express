<?php

include 'common.php';

$User->Activate($_GET[uid]);

$UserSession->Register($GetUser->getSingle($_GET[uid]));
	
$redirect = "index.php";
	
$Temp->addvar("redirect", $redirect);

	
include 'components/pageheader.php';
$Temp->display("calendarbody.tpl.php");
$Temp->display("activatemessage.tpl.php");	
$Temp->display("pagefooter.tpl.php");

?>