<?php

include 'common.php';

include '../components/printheader.php';


$eventset = $GetEvents->thisDay($day, $weekday, $cid, $catid);

$Temp->addVar("eventset", $eventset);



$Temp->display("calendarbody.tpl.php");

$Temp->display("day.tpl.php");

$Temp->display("pagefooter.tpl.php");

?>
	
	