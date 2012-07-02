<?php
include 'common.php';

$privresult = $GetUserPriv->getList(0,0,0,0,$_GET[uid]);
$calresult = $GetCalendar->getList();



while($privdata = $Result->getArray($privresult)) {

	$privarray[] = $privdata[calendar_id]; 

}

while($caldata = $Result->getArray($calresult)) {

	$calarray[] = $caldata[calendar_id]; 
	$calname[$caldata[calendar_id]] = $caldata[calendar_name];
}

$filteredarray = $calarray;

if(isset($privarray)) {
	
	$filteredarray = array_diff($calarray, $privarray);

}



$userdata = $GetUser->getSingle($_GET[uid]);

$Temp->addVar("filteredarray", $filteredarray);
$Temp->addVar("calname", $calname);
$Temp->addVar("order", $order);
$Temp->addVar("total", $total);
$Temp->addVar("limit", $limit);
$Temp->addVar("Page", $Page);
$Temp->addVar("user_name", $userdata[user_name]);

$Temp->display("overallheader.tpl.php");

$Temp->display("pageheader.tpl.php");

$Temp->display("privform.tpl.php");

$Temp->display("pagefooter.tpl.php");

?>
