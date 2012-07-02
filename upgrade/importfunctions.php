<?php


	function importcontact($data) {
		
		global $DB, $Result, $contact_table;

		extract($data);
		

		if($contact_name){
		
			$user_id = $user_id + 1;

			$query = "INSERT INTO $contact_table VALUES( NULL, $user_id, '" .  addslashes($contact_name) . "', '$contact_email', '$contact_phone')";
		
			
			$DB->Query($query);
			
			$query = "SELECT contact_id FROM $contact_table ORDER BY contact_id DESC LIMIT 0, 1";
		
		
			$data = $Result->getRow($DB->Query($query));
		
			return $data[0];

		} else {
			

			return 1;

		}


	}


	function importocc($data, $event_type) {
		
		global $DB, $Result, $occurence_table;

		extract($data);

		switch ($event_type) {

			case 1:
				
				$start_date = "$event_date";
				$stop_date = "$event_date";

				$start = explode("-", $start_date);
				$stop = explode("-", $stop_date);
				
				$start_month = $start[1];
				$start_day = $start[2];
				
				$stop_month = $stop[1];
				$stop_day = $stop[2];


				break;

			case 2:

				$start_date = "$event_start";
				$stop_date = "$event_stop";

				$start = explode("-", $start_date);
				$stop = explode("-", $stop_date);
				
				$start_month = $start[1];
				$start_day = $start[2];
				
				$stop_month = $stop[1];
				$stop_day = $stop[2];

				break;

			case 7:

				$start_date = "$display_start";
				$stop_date = "$display_stop";

				$start = explode("-", $start_date);
				$stop = explode("-", $stop_date);
				
				$start_month = $start[1];
				$start_day = $start[2];
				
				$stop_month = $stop[1];
				$stop_day = $stop[2];

				$weekday = $week_day;
				break;

			case 8:

				$start_date = "$display_start";
				$stop_date = "$display_stop";

				$start = explode("-", $start_date);
				$stop = explode("-", $stop_date);
				
				$start_day = $month_day;
				
				break;

			case 9:

				$start_date = "$display_start";
				$stop_date = "$display_stop";

				$start_day = $month_day;
				$start_month = $month;


				break;

			case 10:

				$start_date = "$display_start";
				$stop_date = "$display_stop";
				
				$start = explode("-", $start_date);
				$stop = explode("-", $stop_date);
				
				$start_month = $start[1];
				$start_day = $start[2];
				
				$stop_month = $stop[1];
				$stop_day = $stop[2];

				$weeknum = $week_num;
				$weekday = $week_day;

				break;

			case 11:

				$start_date = "$display_start";
				$stop_date = "$display_stop";

				$start_day = $month_day;
				$start_month = $month;

				$start = explode("-", $start_date);
				$stop = explode("-", $stop_date);
				
				$start_month = $month;
				$start_day = $start[2];
				
				$stop_month = $stop[1];
				$stop_day = $stop[2];

				$weeknum = $week_num;
				$weeknum = $week_day;
			
				break;




		}
		
		if(!$weekday) $weekday = 0;
		if(!$weeknum) $weeknum = 0;
		if(!$start_month) $start_month = 0;

		$query = "INSERT INTO $occurence_table VALUES( NULL, $event_type, $start_day, $weekday, $weeknum, $start_month, '$start_date', '$stop_date')";
				
		$DB->Query($query);

		$query = "SELECT type_id FROM $occurence_table ORDER BY type_id DESC LIMIT 0, 1";
		
		$data = $Result->getRow($DB->Query($query));
		
		return $data[0];


	}



	function importevent($data, $contact_id, $type_id) {

		global  $DB, $Result, $event_table;
		
		extract($data);
		
		$event = $event_table;

		$user_id = $user_id + 1;
			
		$query = "INSERT INTO $event VALUES (NULL, $type_id, $calendar_id, $location_id, $user_id, $contact_id, '" . addslashes($event_title) . "', NULL, NULL, '" . addslashes($event_timing) . "', '" . addslashes($event_desc) . "', 1, '', 1)";
		

		$DB->Query($query);


	}




?>