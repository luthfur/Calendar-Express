<?php

$path = "../";

include 'common.php';

$UserSession->Destroy();
	
$redirect = $path . "week.php?cid=$cid&catid=$catid&d=$day&w=$weeknum&wd=$wd&m=$month&y=$year";

	
$Temp->addvar("redirect", $redirect);

	
include $path . 'components/pageheader.php';
$Temp->display($path . "calendarbody.tpl.php");
$Temp->display($path . "logoutmessage.tpl.php");	
$Temp->display($path . "pagefooter.tpl.php");

?>

