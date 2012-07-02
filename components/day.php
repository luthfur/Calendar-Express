<?php
	
$eventset = $GetEvents->thisDay($day, $weekday, $cid, $catid);

$Temp->addVar("eventset", $eventset);

$Temp->display("day.tpl.php");


?>