<?php

/***************************************************************

CALENDAR EXPRESS - SYSTEM SETTINGS

WARNING: Improper alteration of any of the following values

could cause Calendar Express to stop functioning. Its recommended

that the values below be edited from the Configuration Control

at the Administration Panel.

******************************************************************/


// Allow External users to post to calendar
// Values:
//	1 - Yes
//	0 - No


$_CONF[allow_external_post] = 1;


// Allow External User Registration
// Values:
//	0 - No
//	1 - Yes, Activation Required
//	2 - Yes, No Activation Required

$_CONF[allow_user_reg] = 2;


// Month View Type
// Values:
//	1 - Block View
//	0 - List View 
$_CONF[month_view] = 0;


// Time display format
// Values:
//	1 - 12 hours
//	0 - 24 hours
$_CONF[time_format] = 0;


// Event Sorting Option
// Values:
//	1 - Event with text time, Event with start and end time
//	2 - Event with start and end time, Event with text time 
$_CONF[event_sort] = 2;


// Allow Text Time to be set
// Values:
//	1 - Yes
//	0 - No
$_CONF[allow_texttime] = 1;


// Display Date Suffix
// Values:
//	1 - Yes
//	0 - No
$_CONF[allow_datesuffix] = 0;


// Show Calendar Name in Event List
// Values:
//	1 - Yes
//	0 - No 
$_CONF[show_calname] = 1;


// Show Event Time in Event List
// Values:
//	1 - Yes
//	0 - No 
$_CONF[show_time] = 1;


// Show Calendar Icon in Event List
// Values:
//	1 - Yes
//	0 - No 
$_CONF[show_calicon] = 0;


// Show Calendar Location in Event List
// Values:
//	1 - Yes
//	0 - No
$_CONF[show_location] = 1;


// Show Calendar Image in Event List
// Values:
//	1 - Yes
//	0 - No
$_CONF[show_calimage] = 1;


// Allow Event Recommendation to be sent
// Values:
//	1 - Yes
//	0 - No
$_CONF[allow_recommend] = 1;


// Number of Data Rows to List per Page
 // Values:
//	1 - Yes
//	0 - No
$_CONF[pagesize] = 10;


// Date Display Format
// Values: refer to documentation
//
$_CONF[date_format] = "F j, Y";


// Date Display Format for MyEvent
// Values: refer to documentation
//
$_CONF[me_date_format] = " M j, Y";


// Weekly, Monthly, day display format
// Values: refer to documentation
//
$_CONF[day_format] = "l, jS";


// Start of the Week
// Values:
// 0 - Sunday
// 6 - Saturday
$_CONF[start_weekday] = 0;


// Current style pack in use
// Values:
// Name of the style directory in the templates directory
//
$_CONF[style] = "defaultblue";


// Admin Email Signature
// Values:
// Formatted Signature String
//
$_CONF[email_sig] = "Thanks,<br /><br />Luthfur";


// Number of Emails to Send Per Interval
// Values:
// Integer
//
$_CONF[email_perinterval] = 10;


// Name of the Calendar System
// Values:
// String
//
$_CONF[site_name] = "Luthfur\'s Calendar";


// Admin/ Support Email Address
// Values:
// Valid email address
//
$_CONF[support_email] = "fur@phplite.com";


// URL of the calendar
// Values:
// Valid http:// URL
//
$_CONF[calendar_url] = "http://www.phplite.com/p/demo";


// Time Zone Value
// Values:
// Time zone string
//
$_CONF[time_zone] = "-02";

?>