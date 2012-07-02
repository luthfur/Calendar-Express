<?php

include 'common.php';


extract($_POST);


if(!$username || !$userpass) {
	
	$error['login'] = 1;

} else {
		
	$userdata = $UserPass->Check($username, $userpass, 1);
			
	if(!is_array($userdata)) {
		$error['login'] = 1; 
	} else {
		$UserSession->Register($userdata);	
	}

}


if(isset($error['login'])) {
	
	include 'components/pageheader.php';
	$Temp->display("calendarbody.tpl.php");
	$Temp->addvar("error", $error);
	$Temp->display("loginbox.tpl.php");	
	$Temp->display("pagefooter.tpl.php");
	
} else {
	
	$redirect = "week.php?cid=$cid&catid=$catid&d=$d&w=$w&wd=$wd&m=$m&y=$y";
	
	$Temp->addvar("redirect", $redirect);
	
	include 'components/pageheader.php';
	$Temp->display("calendarbody.tpl.php");
	$Temp->display("loginmessage.tpl.php");	
	$Temp->display("pagefooter.tpl.php");
	
	
}


?>