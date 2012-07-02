<?php

include 'common.php';


extract($_POST);


if(!$username || !$userpass) {
	
	$error['login'] = 1;

} else {
		
	$userdata = $AdminPass->Check($username, $userpass, 1);
			
	if(!is_array($userdata)) {
		$error['login'] = 1; 
	} else {
		$AdminSession->Register($userdata);	
	}

}


if(isset($error['login'])) {
	
	$Temp->display("overallheader.tpl.php");
	$Temp->addvar("error", $error);
	$Temp->display("loginbox.tpl.php");	
	$Temp->display("pagefooter.tpl.php");
	
} else {
	
	$AdminSession->Register($userdata);
	
	$redirect = "index.php";
	
	$Temp->addvar("redirect", $redirect);
	
	$Temp->display("overallheader.tpl.php");

	$Temp->display("messages/loginmessage.tpl.php");	
	$Temp->display("pagefooter.tpl.php");
	
	
}


?>