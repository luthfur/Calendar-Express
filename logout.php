<?php

include 'common.php';

$UserSession->Destroy();
	
$redirect = "week.php?cid=$cid&catid=$catid&d=$day&w=$weeknum&wd=$wd&m=$month&y=$year";

	
$Temp->addvar("redirect", $redirect);

	
include 'components/pageheader.php';
$Temp->display("calendarbody.tpl.php");
$Temp->display("logoutmessage.tpl.php");	
$Temp->display("pagefooter.tpl.php");

?>