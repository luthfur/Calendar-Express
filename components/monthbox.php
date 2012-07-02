<?php

$eventset = $GetEvents->thisMonth($month_array, $cid, $catid);



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


$Temp->addVar("eventset", $eventset);
$Temp->addVar("the_array", $the_array);
$Temp->addVar("firstdate", $firstdate);
$Temp->addVar("firstkey", $firstkey);
$Temp->addVar("lastdate", $lastdate);
$Temp->addVar("lastkey", $lastkey);

$Temp->display("monthbox.tpl.php");


?>