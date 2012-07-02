<?php

include 'common.php';


extract($_POST);


if(!$username || !$email) {
	
	$error['match'] = 1;

} else {
		
	$userdata = $UserPass->Check($username,0,1,$email);
			
	if(!is_array($userdata)) {
		
		$error['match'] = 1; 

	} else {
		
		$UserPass->SendPass($userdata);	
	}

}


if(isset($error['match'])) {
	
	include 'components/pageheader.php';
	$Temp->display("calendarbody.tpl.php");
	$Temp->addvar("error", $error);
	$Temp->display("passform.tpl.php");	
	$Temp->display("pagefooter.tpl.php");
	
} else {
		
	$redirect = "login.php?cid=$cid&catid=$catid&d=$d&w=$w&wd=$wd&m=$m&y=$y";
	
	$Temp->addvar("redirect", $redirect);
	
	include 'components/pageheader.php';
	$Temp->display("calendarbody.tpl.php");
	$Temp->display("process.tpl.php");	
	$Temp->display("pagefooter.tpl.php");
	
	
}


?>