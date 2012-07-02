<?php


// Edit the variable $calendar_path below by entering the relative path to the calendar directory


$calendar_path = "../";



/********************************************************************************/



/*******************************************************************************
                WARNING: DONOT EDIT ANY OF THE CODE BELOW
********************************************************************************/



/*************** Include all required components ******************************/

$source_location = $calendar_path . "sources/";
$config_location = $calendar_path . "";

include $config_location . 'config.php';
include $config_location . 'settings.php';

include $config_location . 'lang_settings.php';


$template_location = $calendar_path . "templates/" . $_CONF[style] . "/addons/";


$temp_path = $template_location;
$style_path = $calendar_path . "templates/" . $_CONF[style] . "/styles/";

include $source_location . 'mysql_db.php';
include $source_location . 'result_iterator.php';
include $source_location . 'template.php';
include $source_location . 'getcalendar.php';



/**************************** Display MiniCalendar *******************************/
$Result = new Result();
$Temp = new Template($temp_path);
$GetCalendar = new GetCalendar();

/******************** Connect to Database ***********************/
$DB = new DB($_CONF['hostname'], $_CONF['database']);
$DB->connect($_CONF['username'], $_CONF['password']);

$monthname = date("F", mktime(0,0,0,$month,1,$year));

// Variables for Minicalendar
$Temp->addVar("calendar_path", $calendar_path);
$Temp->addVar("style_path", $style_path);

$calendarresult = $GetCalendar->getList($catid);

$Temp->addVar("calendarresult", $calendarresult);
$Temp->addVar("Result", $Result);

echo "<link rel='stylesheet' href='$style_path" . "style.css' type='text/css'>";

// Display Minicalendar
$Temp->display("searchbox.tpl.php");



/******************************* End MiniCalendar *********************************/
?>

