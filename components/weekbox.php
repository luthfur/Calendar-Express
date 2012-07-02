<?php
if(!$weeknum) {	
	$Week->setMonth($month_array);
	$weeknum = $Week->getNum();
}

$the_array = $month_array[$weeknum];


$GetEvents = new GetEvents($day, $month, $year);
$eventset = $GetEvents->thisWeek($the_array, $cid, $catid);





//get the first and last dates for the week
		if (isset($the_array)) {
			$firstdate = reset($the_array);
			$firstkey = key($the_array);
		
			$lastdate = end($the_array);
			$lastkey = key($the_array);	
		} else {
			$noweek = 1;
		}	



$Temp->addVar("eventset", $eventset);
$Temp->addVar("the_array", $the_array);
$Temp->addVar("weeknum", $weeknum);
$Temp->addVar("firstdate", $firstdate);
$Temp->addVar("firstkey", $firstkey);
$Temp->addVar("lastdate", $lastdate);
$Temp->addVar("lastkey", $lastkey);

$Temp->display("weekbox.tpl.php");


?>