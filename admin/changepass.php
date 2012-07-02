<?php

include 'common.php';


extract($_POST);


if(!$AdminPass->Check($sessiondata[user_name], $currpass) || ($newpass != $confpass)) {
	
	$error['pass'] = 1;
	
	$Temp->addvar("error", $error);

	$Temp->display("overallheader.tpl.php");

	$Temp->display("pageheader.tpl.php");

	$Temp->display("pref.tpl.php");

	$Temp->display("pagefooter.tpl.php");

} else {
		
	$AdminPass->Change($sessiondata[user_name], $newpass);
	
	$redirect="index.php";

	$Temp->addvar("redirect", $redirect);

	$Temp->display("overallheader.tpl.php");

	$Temp->display("pageheader.tpl.php");

	$Temp->display("messages/passchange.tpl.php");

	$Temp->display("pagefooter.tpl.php");

}



?>