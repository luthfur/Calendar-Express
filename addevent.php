<?php 

	include 'common.php';
	
	extract($_POST);

	$start_date = "$start_year-$start_month-$start_day";
	$stop_date = "$stop_year-$stop_month-$stop_day";
	

	// Check for start and stop date 
	$start_stamp = mktime ( 0, 0, 0, $start_month, $start_day, $start_year);
	$stop_stamp = mktime ( 0, 0, 0, $stop_month, $stop_day, $stop_year);
	
	//Covert Hour for calculation
	$start_clac_hour = conv24($start_hour, $start_dst);
	$stop_clac_hour = conv24($stop_hour, $stop_dst);	
	
	// Test for passed fields

	if($start_stamp > $stop_stamp) {
		
		$error['stop_date'] = 1;
	
	} elseif(!$event_title) {
		
		$error['event_title'] = 1;
	
	} elseif(!$event_desc) {
		
		$error['event_desc'] = 1;
	
	} elseif($contact_email && !checkmail($contact_email)) {
		
		$error['contact_email'] = 1;
	
	} elseif(!$location_title && !$location_id) {
	
		$error['location_title'] = 1;

	}  elseif(!$location_desc && !$location_id) {
	
		$error['location_desc'] = 1;

	}

	
	//print_r($error);
	
	// display form again if error found

	if(isset($error)) {
		
		$Temp->display("overallheader.tpl.php");

		$Temp->display("pageheader.tpl.php");
		
		
	
		$calresult = $GetCalendar->getList();
		$locresult = $GetLocation->getList(0,"location_title","ASC",0);
		$conresult = $GetContact->getList(0,"contact_name","ASC",$uid);

		if($_CONF['time_format']) {
		
		$time_until = 12;

	} else {
		
		$time_until = 23;

	}


	$Temp->addVar("time_until", $time_until);

		$Temp->addVar("calresult", $calresult);
		$Temp->addVar("locresult", $locresult);
		$Temp->addVar("conresult", $conresult);
		$Temp->addVar("uid", $uid);
		$Temp->addVar("error", $error);
		$Temp->addVar("_POST", $_POST);
		$Temp->addVar("Result", $Result);

		$Temp->display("eventform.tpl.php");

		$Temp->display("pagefooter.tpl.php");
	
	
	// Begin Adding Events

	} else {
		
		// Set user id to anonymous
		$uid = 1;

		// Add new location
		if(!$location_id) $location_id = $Location->addNew($_POST, $uid);
		
		// Add new contact
		if(!$contact_id) $contact_id = $Contact->addNew($_POST, $uid);
		
		// Add new occurence
		$type_id = $Occ->addNew($_POST);

		// Add new event
		$Event->addNew($_POST, $type_id, $location_id, $uid, $contact_id, 0);

		include $source_location . 'notifyadmin.php';
		
		$NotifyAdmin = new NotifyAdmin($Temp);
	
		$NotifyAdmin->send();

			$redirect = "week.php";

			$Temp->addvar("redirect", $redirect);

	
			include 'components/pageheader.php';
			$Temp->display("calendarbody.tpl.php");
			$Temp->display("messages/addevent.tpl.php");	
			$Temp->display("pagefooter.tpl.php");

	}
	
?>
