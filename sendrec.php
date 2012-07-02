<?php

include 'common.php';


extract($_POST);


if(!$send_email || !checkmail($send_email)) {
	
	$error['send_email'] = 1;

} elseif (!$user_email || !checkmail($user_email)) {

	$error['user_email'] = 1;

} elseif (!$sender_name) {

	$error['sender_name'] = 1;

} elseif (!$rec_name) {

	$error['rec_name'] = 1;

}
	



if(isset($error)) {
	
	$Temp->addVar("error", $error);
	$Temp->addVar("val", $_POST);
	
	$Temp->display("overallheader.tpl.php");
	
	$Temp->display("recommendform.tpl.php");
	
	$Temp->display("pagefooter.tpl.php");
	
	
	
} else {
	
	$redirect = "eventdetails.php?cid=$cid&catid=$catid&d=$d&w=$w&wd=$wd&m=$m&y=$y&eid=$eid";
	
	$RecEmail->sendMessage($_POST);
	
	$Temp->addVar("redirect", $redirect);
	
	$Temp->display("overallheader.tpl.php");
	
	$Temp->display("messages/recmessage.tpl.php");	
	
	$Temp->display("pagefooter.tpl.php");
	
	
}


?>