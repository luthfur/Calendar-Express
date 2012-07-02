<?php

$eventset = $GetEvents->thisMonth($month_array, $cid, $catid);

$weekmap = $WeekConv->getMap();

//get the first and last dates for the week
		if (isset($month_array)) {
			
			$the_array = $month_array[1];
			
			$firstdate = reset($the_array);
			$firstkey = key($the_array);
			
			if($month_array[6][0]) {
				
				$the_array = $month_array[6];
				
			} else {
				
				$the_array = $month_array[5];
			
			}
		
			$lastdate = end($the_array);
			$lastkey = key($the_array);	
			
		} else {
			
			$noweek = 1;
			
		}	

// set month variables
$monthprev = $month - 1;
$monthnext = $month + 1;

$yearprev = $year - 1;
$yearnext = $year + 1;

$catresult = $GetCategory->getList();

$Temp->addVar("catresult", $catresult);

$Temp->addVar("calendarresult", $calendarresult);
$Temp->addVar("catresult", $catresult);
$Temp->addVar("weekmap", $weekmap);
$Temp->addVar("eventset", $eventset);
$Temp->addVar("the_array", $the_array);
$Temp->addVar("firstdate", $firstdate);
$Temp->addVar("firstkey", $firstkey);
$Temp->addVar("lastdate", $lastdate);
$Temp->addVar("lastkey", $lastkey);

$Temp->addVar("monthprev", $monthprev);
$Temp->addVar("monthnext", $monthnext);

$Temp->addVar("yearprev", $yearprev);
$Temp->addVar("yearnext", $yearnext);

$Temp->addVar("Result", $Result);

$Temp->display("monthcal.tpl.php");



$Temp->display("monthcal_table.tpl.php");

$Temp->display("categoryselect.tpl.php");

$link = basename($_SERVER[PHP_SELF]);

$Temp->addVar("link", $link);

$Temp->display("printlink.tpl.php");

$Temp->display("monthcal_tdclose.tpl.php");


$Temp->display("monthcal_tdcenter.tpl.php");

$Temp->display("calendarselect.tpl.php");

$Temp->display("monthcal_tdclose.tpl.php");


$Temp->display("monthcal_tdright.tpl.php");

$Temp->display("searchbox.tpl.php");

$Temp->display("monthcal_tableclose.tpl.php");






?>