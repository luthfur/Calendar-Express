<?php

include 'common.php';

$cresult = $GetCalendar->getList();

while($calendardata = $Result->getArray($cresult)) {
		
	$eventset = $GetEvents->thisDay($day, $weekday, $calendardata['calendar_id']);
	
	if(count($eventset)) $Reminder->sendMessage($eventset, $calendardata['calendar_id'], $calendardata['calendar_name'] );

		
}

echo "Event Reminders Successfully sent to all subscribed users.";


?>