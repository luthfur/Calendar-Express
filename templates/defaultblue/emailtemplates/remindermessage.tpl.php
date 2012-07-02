<?php $output = "Hi $user_name,

This is a reminder for today's events on the calendar: $calname.

Following are the event details:

";

while(list($ind, $vals) = each($eventset)) {
				
	extract($vals);
				
	$occ = getoccurence($vals, 1);
	$date = date($_CONF[date_format], mktime(0, 0, 0, $month, $day, $year));
	
	$start_time = displaytime($start_time);
	$stop_time = displaytime($stop_time);

	$output .= "
---------------------------------------------
Event Title: $event_title
Date: $date
Time:  $start_time -  $stop_time, $text_time
Occurence: $occ
Posted By: $user_name
Contact: $contact_name
Contact Email: $contact_email
Contact Telephone: $contact_phone
Location: $location_title
Description: $event_desc


";			

}


$output .= "

$_CONF[email_sig]


 "; ?>


