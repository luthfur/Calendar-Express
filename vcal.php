<?php
$filename = "eventexport" . $_GET[eid] . ".vcs";

header("Content-type: text/x-vCalendar");
header("Content-Disposition: inline; filename=$filename");

$suppress = 1;

include 'common.php';

$eventdata = $EventData->getSingle($_GET[eid]);

extract($eventdata);


	$start_date = explode("-", $start_date);
	$end_date = explode("-", $stop_date);

if($start_time != NULL) {

	$start_time = explode(":", $start_time);
	$stop_time = explode(":", $stop_time);

} else {
		
	$start_time[0] = "00";
	$start_time[1] = "00";
	$start_time[2] = "00";

	$stop_time[0] = "00";
	$stop_time[1] = "00";
	$stop_time[2] = "00";

}


$start_time = $start_date[0] . $start_date[1] . $start_date[2] . "T" . $start_time[0] . $start_time[1] . $start_time[2];
$end_time = $start_date[0] . $start_date[1] . $start_date[2] . "T" . $stop_time[0] . $stop_time[1] . $stop_time[2];

switch ($event_type) {
	
	case 1:
		$rrule = 0;
		break;
								
	case 2:
		$rrule = "D1 $end_time";
		break;
							
	case 3:
		$rrule = "W1 TU TH $end_time";
		break;
				
	case 4:
		$rrule = "W1 MO WE FR $end_time";
		break;
				
	case 5:
		$rrule = "W1 MO TU WE TH FR $end_time";
		break;
				
	case 6:
		$rrule = "W1 SA SU $end_time";
		break;
														
	case 7:
		$weekday = weekdayabbr($weekday);
		$rrule = "W1 $weekday $end_time";
		break;
					
	case 8:
		$rrule = "MD1 $day";
		break;
				
	case 9:
		$rrule = "YD1 $monthnum MD12 $day $end_time";
		break;	
								
	case 10:
		$weekday = weekdayabbr($weekday);
		$rrule = "MP1 $weeknum+ $weekday $end_time";
		break;
					
	case 11:
		$weekday = weekdayabbr($weekday);
		$rrule = "YD1 $monthnum MP12 $weeknum+ $weekday $end_time";
		break;
	

//RRULE:<?php echo $rrule . "\n"
}
?>

BEGIN:VCALENDAR
VERSION:1.0
PRODID:<?php echo $_CONF[site_name] ."\n" ?>
TZ:<?php echo $_CONF[time_zone] ."\n" ?>
BEGIN:VEVENT
SUMMARY:<?php echo $event_title ."\n" ?>
DESCRIPTION;ENCODING=QUOTED-PRINTABLE:<?php echo $event_desc ?> Contact: <?php echo $contact_name ?> (email: <?php echo $contact_email ?>, phone: <?php echo $contact_phone ?>)<?php echo "\n" ?>
LOCATION;ENCODING=QUOTED-PRINTABLE:<?php echo $location_title ."\n" ?>
DTSTART:<?php echo $start_time ."\n" ?>
DTEND:<?php echo $end_time ."\n" ?>
END:VEVENT<?php echo "\n" ?>
END:VCALENDAR<?php echo "\n" ?>
