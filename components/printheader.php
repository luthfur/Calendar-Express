<?php

// Get Calendar Data

if($cid) {

	$calendardata = $GetCalendar->getSingle($cid);
	
	// Variables for calendar header
	$calendar_name = $calendardata['calendar_name'];
	$calendar_image = $calendardata['calendar_image'];
	$calendar_icon = $calendardata['calendar_icon'];
	$catid = $calendardata['cat_id'];

} elseif($catid) {

	$catdata = $GetCategory->getSingle($catid);
	
	// Variables for calendar header
	$calendar_name = $catdata['cat_name'];
	$calendar_image = $catdata['cat_image'];
	$catid = $catdata['cat_id'];

} else {

	$calendar_name = $_CONF['site_name'];
	//$calendar_image = $_CONF['site_logo'];

}


$Temp->addVar("calendar_name", $calendar_name);
$Temp->addVar("calendar_image", $calendar_image);
$Temp->addVar("calendar_icon", $calendar_icon);
$Temp->addVar("catid", $catid);


// Display Calendar Header
$Temp->display("overallheader.tpl.php");
$Temp->display("printheader.tpl.php");

?>