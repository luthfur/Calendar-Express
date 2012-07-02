<?php

extract ($_CONF);
$contact_count = 0;

// get oneday events
		$query = "SELECT *
					FROM $calendar_tablename, `$events_tablename`, $oneday_tablename 
					WHERE `$events_tablename`.calendar_id = $calendar_tablename.calendar_id AND `$events_tablename`.`event_id` = $oneday_tablename.event_id";
		
				
		$result = $DB->Query($query); 	//execute oneday query
			
		while($data = $Result->getArray($result)) {

			$contact_id = importcontact($data);

			$type_id = importocc($data, 1);

			importevent($data, $contact_id, $type_id);

		}





		
		// get multiple events
		$query = "SELECT *
					FROM $calendar_tablename, `$events_tablename`, $multiple_tablename 
					WHERE`$events_tablename`.calendar_id = $calendar_tablename.calendar_id 
					AND `$events_tablename`.`event_id` = $multiple_tablename.event_id";
		
					

		 $result = $DB->Query($query); 	//execute oneday query
			
		while($data = $Result->getArray($result)) {

			$contact_id = importcontact($data);

			$type_id = importocc($data, 2);

			importevent($data, $contact_id, $type_id);

		}
		
		
		
		
		// get weekly events
		$query = "SELECT *
					FROM $calendar_tablename, `$events_tablename`, $weekly_tablename 
					WHERE `$events_tablename`.calendar_id = $calendar_tablename.calendar_id 
					AND `$events_tablename`.`event_id` = $weekly_tablename.event_id";
					
		$result = $DB->Query($query); 	//execute oneday query
			
		while($data = $Result->getArray($result)) {

			$contact_id = importcontact($data);

			$type_id = importocc($data, 7);

			importevent($data, $contact_id, $type_id);

		}
		
		
		
		// get monthly events
		$query = "SELECT *
					FROM $calendar_tablename, `$events_tablename`, $monthly_tablename 
					WHERE`$events_tablename`.calendar_id = $calendar_tablename.calendar_id 
					AND `$events_tablename`.`event_id` = $monthly_tablename.event_id";
		
		$result = $DB->Query($query); 	//execute oneday query
			
		while($data = $Result->getArray($result)) {

			$contact_id = importcontact($data);

			$type_id = importocc($data, 8);

			importevent($data, $contact_id, $type_id);

		}
		
		
		
		// get yearly events
		$query = "SELECT *
					FROM $calendar_tablename, `$events_tablename`, $yearly_tablename 
					WHERE `$events_tablename`.calendar_id = $calendar_tablename.calendar_id 
					AND `$events_tablename`.`event_id` = $yearly_tablename.event_id";
				
		$result = $DB->Query($query); 	//execute oneday query
			
		while($data = $Result->getArray($result)) {

			$contact_id = importcontact($data);

			$type_id = importocc($data, 9);

			importevent($data, $contact_id, $type_id);

		}
		
		
		// get monthly periodical events
		$query = "SELECT *
					FROM $calendar_tablename, `$events_tablename`, $permonthly_tablename 
					WHERE `$events_tablename`.calendar_id = $calendar_tablename.calendar_id 
					AND `$events_tablename`.`event_id` = $permonthly_tablename.event_id";
		
		 $result = $DB->Query($query); 	//execute oneday query
			
		while($data = $Result->getArray($result)) {

			$contact_id = importcontact($data);

			$type_id = importocc($data, 10);

			importevent($data, $contact_id, $type_id);

		}
		
		
		
		// get yearly periodical events
		$query = "SELECT *
					FROM $calendar_tablename, `$events_tablename`, $peryearly_tablename 
					WHERE `$events_tablename`.calendar_id = $calendar_tablename.calendar_id 
					AND `$events_tablename`.`event_id` = $peryearly_tablename.event_id";
		
		 $result = $DB->Query($query); 	//execute oneday query
			
		while($data = $Result->getArray($result)) {

			$contact_id = importcontact($data);

			$type_id = importocc($data, 11);

			importevent($data, $contact_id, $type_id);

		}
		

include 'import.php';



?>