<?php

/***********************************************************************
Settings Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/




class Settings {


	function getVals() {
		
	}
	
	
	function Update($vals) {

		global $_CONF;
		
		extract($vals);
		
		if(!$pagesize && !is_int(pagesize)) $pagesize = $_CONF[pagesize];
		if(!$date_format) $date_format = $_CONF[date_format];		
		if(!$me_date_format) $me_date_format = $_CONF[me_date_format];
		if(!$style) $style = $_CONF[style];
		if(!$email_sig) $email_sig = $_CONF[email_sig];
		if(!$email_perinterval && !is_int(email_perinterval)) $email_perinterval = $_CONF['email_perinterval'];
		if(!$site_name) $site_name = $_CONF[site_name];
		if(!$support_email) $support_email = $_CONF[support_email];
		if(!$calendar_url) $calendar_url = $_CONF[calendar_url];
		if(!$time_zone && !is_int(time_zone)) $time_zone = $_CONF[time_zone];

		// Write into settings.php
		
		$configtext = "<?php\n\n";
		
		
		$configtext .= "/***************************************************************\n\n";

$configtext .= "CALENDAR EXPRESS - SYSTEM SETTINGS\n\n";

$configtext .= "WARNING: Improper alteration of any of the following values\n\n"; 

$configtext .= "could cause Calendar Express to stop functioning. Its recommended\n\n"; 

$configtext .= "that the values below be edited from the Configuration Control\n\n"; 

$configtext .= "at the Administration Panel.\n\n";

$configtext .= "******************************************************************/\n\n\n";


$configtext .= "// Allow External users to post to calendar\n";
$configtext .= "// Values:\n";
$configtext .= "//	1 - Yes\n";
$configtext .= "//	0 - No\n\n\n";


$configtext .= "\$_CONF[allow_external_post] = $allow_external_post;\n\n\n"; 


$configtext .= "// Allow External User Registration\n";
$configtext .= "// Values:\n";
$configtext .= "//	0 - No\n";
$configtext .= "//	1 - Yes, Activation Required\n";
$configtext .= "//	2 - Yes, No Activation Required\n\n";

$configtext .= "\$_CONF[allow_user_reg] = $allow_user_reg;\n\n\n";  



$configtext .= "// Month View Type\n";
$configtext .= "// Values:\n";
$configtext .= "//	1 - Block View\n";
$configtext .= "//	0 - List View \n";
$configtext .= "\$_CONF[month_view] = $month_view;\n\n\n"; 

$configtext .= "// Time display format\n";
$configtext .= "// Values:\n";
$configtext .= "//	1 - 12 hours\n";
$configtext .= "//	0 - 24 hours\n";
$configtext .= "\$_CONF[time_format] = $time_format;\n\n\n"; 


$configtext .= "// Event Sorting Option\n";
$configtext .= "// Values:\n";
$configtext .= "//	1 - Event with text time, Event with start and end time\n";
$configtext .= "//	2 - Event with start and end time, Event with text time \n";
$configtext .= "\$_CONF[event_sort] = $event_sort;\n\n\n"; 


$configtext .= "// Allow Text Time to be set\n";
$configtext .= "// Values:\n";
$configtext .= "//	1 - Yes\n";
$configtext .= "//	0 - No\n";
$configtext .= "\$_CONF[allow_texttime] = $allow_texttime;\n\n\n"; 



$configtext .= "// Display Date Suffix\n";
$configtext .= "// Values:\n";
$configtext .= "//	1 - Yes\n";
$configtext .= "//	0 - No\n";
$configtext .= "\$_CONF[allow_datesuffix] = $allow_datesuffix;\n\n\n"; 


$configtext .= "// Show Calendar Name in Event List\n";
$configtext .= "// Values:\n";
$configtext .= "//	1 - Yes\n";
$configtext .= "//	0 - No \n";
$configtext .= "\$_CONF[show_calname] = $show_calname;\n\n\n"; 


$configtext .= "// Show Event Time in Event List\n";
$configtext .= "// Values:\n";
$configtext .= "//	1 - Yes\n";
$configtext .= "//	0 - No \n";
$configtext .= "\$_CONF[show_time] = $show_time;\n\n\n";


$configtext .= "// Show Calendar Icon in Event List\n";
$configtext .= "// Values:\n";
$configtext .= "//	1 - Yes\n";
$configtext .= "//	0 - No \n";
$configtext .= "\$_CONF[show_calicon] = $show_calicon;\n\n\n"; 


$configtext .= "// Show Calendar Location in Event List\n";
$configtext .= "// Values:\n";
$configtext .= "//	1 - Yes\n";
$configtext .= "//	0 - No\n";
$configtext .= "\$_CONF[show_location] = $show_location;\n\n\n"; 


$configtext .= "// Show Calendar Image in Event List\n";
$configtext .= "// Values:\n";
$configtext .= "//	1 - Yes\n";
$configtext .= "//	0 - No\n";
$configtext .= "\$_CONF[show_calimage] = $show_calimage;\n\n\n";


$configtext .= "// Allow Event Recommendation to be sent\n";
$configtext .= "// Values:\n";
$configtext .= "//	1 - Yes\n";
$configtext .= "//	0 - No\n";
$configtext .= "\$_CONF[allow_recommend] = $allow_recommend;\n\n\n"; 


$configtext .= "// Number of Data Rows to List per Page\n ";
$configtext .= "// Values:\n";
$configtext .= "//	1 - Yes\n";
$configtext .= "//	0 - No\n";
$configtext .= "\$_CONF[pagesize] = $pagesize;\n\n\n"; 


$configtext .= "// Date Display Format\n";
$configtext .= "// Values: refer to documentation\n";
$configtext .= "//\n";
$configtext .= "\$_CONF[date_format] = \"$date_format\";\n\n\n";  


$configtext .= "// Date Display Format for MyEvent\n";
$configtext .= "// Values: refer to documentation\n";
$configtext .= "//\n";
$configtext .= "\$_CONF[me_date_format] = \"$me_date_format\";\n\n\n";


$configtext .= "// Weekly, Monthly, day display format\n";
$configtext .= "// Values: refer to documentation\n";
$configtext .= "//\n";
$configtext .= "\$_CONF[day_format] = \"$day_format\";\n\n\n"; 


$configtext .= "// Start of the Week\n";
$configtext .= "// Values:\n"; 
$configtext .= "// 0 - Sunday\n";
$configtext .= "// 6 - Saturday\n";
$configtext .= "\$_CONF[start_weekday] = $start_weekday;\n\n\n";  


$configtext .= "// Current style pack in use\n"; 
$configtext .= "// Values:\n";  
$configtext .= "// Name of the style directory in the templates directory\n"; 
$configtext .= "//\n";  
$configtext .= "\$_CONF[style] = \"$style\";\n\n\n";  


$configtext .= "// Admin Email Signature\n"; 
$configtext .= "// Values:\n";  
$configtext .= "// Formatted Signature String\n"; 
$configtext .= "//\n";  
$configtext .= "\$_CONF[email_sig] = \"". $email_sig . "\";\n\n\n";


$configtext .= "// Number of Emails to Send Per Interval\n"; 
$configtext .= "// Values:\n";  
$configtext .= "// Integer\n"; 
$configtext .= "//\n";  
$configtext .= "\$_CONF[email_perinterval] = $email_perinterval;\n\n\n"; 


$configtext .= "// Name of the Calendar System\n"; 
$configtext .= "// Values:\n";  
$configtext .= "// String\n"; 
$configtext .= "//\n";  
$configtext .= "\$_CONF[site_name] = \"$site_name\";\n\n\n";


$configtext .= "// Admin/ Support Email Address\n"; 
$configtext .= "// Values:\n";  
$configtext .= "// Valid email address\n"; 
$configtext .= "//\n";  
$configtext .= "\$_CONF[support_email] = \"$support_email\";\n\n\n";


$configtext .= "// URL of the calendar\n"; 
$configtext .= "// Values:\n";  
$configtext .= "// Valid http:// URL\n"; 
$configtext .= "//\n"; 
$configtext .= "\$_CONF[calendar_url] = \"$calendar_url\";\n\n\n"; 


$configtext .= "// Time Zone Value\n"; 
$configtext .= "// Values:\n";  
$configtext .= "// Time zone string\n"; 
$configtext .= "//\n"; 
$configtext .= "\$_CONF[time_zone] = \"$time_zone\";\n\n";

$configtext .= "?>";

$fp = fopen("../settings.php", "w");
fwrite ($fp, $configtext);
fclose($fp);


		
	}

}

?>