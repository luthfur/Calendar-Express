<?php

include 'common.php';


extract($_POST);


if(!$user_name || $GetUser->Exists($user_name)) {
	
	$error['user_name'] = 1;

} elseif (!$user_pass) {

	$error['user_pass'] = 1;

} elseif ($user_pass != $verifypass) {

	$error['verifypass'] = 1;

} elseif (!checkmail($email)) {

	$error['email'] = 1;
	
} else {

	if($_CONF[allow_user_reg] > 1) $active = 1;

	$user_id = $User->addNew($_POST, $active);
	
	$result = $GetCalendar->getList();

		
	while($caldata = $Result->getArray($result)) {
			
		$UserPriv->addNew($user_id, $caldata[calendar_id]);
			
	}
		
	


}


if(isset($error)) {
	
	$Temp->addVar("error", $error);
	$Temp->addVar("val", $_POST);
	
	$Temp->display("overallheader.tpl.php");
	$Temp->display("calendarbody.tpl.php");
	$Temp->display("register.tpl.php");
	$Temp->display("pagefooter.tpl.php");
	
} else {
	
	$link = "week.php?cid=$cid&catid=$catid&d=$d&w=$w&wd=$wd&m=$m&y=$y";
	
	$RegEmail->sendMessage($email, $user_name, $user_id);
	
	$Temp->addVar("link", $link);
	
	include 'components/pageheader.php';
	
	$Temp->display("calendarbody.tpl.php");
	
	$Temp->display("registermessage.tpl.php");	
	
	$Temp->display("pagefooter.tpl.php");
	
	
}


?>