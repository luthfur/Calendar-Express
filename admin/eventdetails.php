<?php
	
	include 'common.php';

	$Temp->display("overallheader.tpl.php");

	$Temp->display("pageheader.tpl.php");
	
	
	$eventdata = $EventData->getSingle($_GET['eid']);
	
	$calresult = $GetCalendar->getList();
	$locresult = $GetLocation->getList(0,"location_title","ASC",0);
	$conresult = $GetContact->getList(0,"contact_name","ASC");

	$start_date = explode("-", $eventdata[start_date]);
	$stop_date = explode("-", $eventdata[stop_date]);
		
	$eventdata[start_year] = $start_date[0];
	$eventdata[start_month] = $start_date[1];
	$eventdata[start_day] = $start_date[2];

	$eventdata[stop_year] = $stop_date[0];
	$eventdata[stop_month] = $stop_date[1];
	$eventdata[stop_day] = $stop_date[2];
	
	
	$start_dst = 0;
	$stop_dst = 0;

	if($eventdata[start_time] == NULL) {
			
		$start_hour = "00";
	    $start_min = "00";
		$stop_hour = "00";
		$stop_min = "00";


	} else {

		$start_time = explode(":", $eventdata[start_time]);
		$stop_time = explode(":", $eventdata[stop_time]);
		
		
		$start_hour = $start_time[0];
		$start_min = $start_time[1];
	
		$stop_hour = $stop_time[0];
		$stop_min = $stop_time[1];

		if($_CONF['time_format']) {

			$time_until = 12;

			if($start_hour == 00) {
				$start_hour = 12;
		
			} elseif($start_hour > 12) {
				$start_hour = $start_hour - 12;
				$start_dst = 1;

			} elseif($start_hour == 12) {
				$start_dst = 1;
			}

	
			if($stop_hour == 00) {
				$stop_hour = 12;
		
			} elseif($stop_hour > 12) {
				$stop_hour = $stop_hour - 12;
				$stop_dst = 1;

			} elseif($stop_hour == 12) {
				$stop_dst = 1;
			}
		
		} else {
				
			$time_until = 23;

		}

	}


	$eventdata[start_hour] = $start_hour;
	$eventdata[start_min] = $start_min;
	$eventdata[start_dst] = $start_dst;

	$eventdata[stop_hour] = $stop_hour;
	$eventdata[stop_min] = $stop_min;
	$eventdata[stop_dst] = $stop_dst;

	$Temp->addVar("calresult", $calresult);
	$Temp->addVar("locresult", $locresult);
	$Temp->addVar("conresult", $conresult);
	$Temp->addVar("eventdata", $eventdata);
	$Temp->addVar("uid", $uid);
	$Temp->addVar("time_until", $time_until);

	$Temp->display("eventdetails.tpl.php");

	$Temp->display("pagefooter.tpl.php");

?>
