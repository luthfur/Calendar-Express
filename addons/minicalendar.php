<?php


// Edit the variable $calendar_path below by entering the relative path to the calendar directory


$calendar_path = "../";
$calendar_id = 0;


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
$graphics_path = $calendar_path . "templates/" . $_CONF[style] . "/graphics/";

include $source_location . 'mysql_db.php';
include $source_location . 'result_iterator.php';
include $source_location . 'template.php';
include $source_location . 'month.php';
include $source_location . 'week.php';
include $source_location . 'weekconv.php';
include $source_location . 'events/eventcheck.php';
include $source_location . 'functions.php';



/**************************** Display MiniCalendar *******************************/
$Result = new Result();
$Temp = new Template($temp_path);
$WeekConv = new WeekConv($_CONF['start_weekday']);
$Month = new Month();
$Week = new Week();


/******************** Connect to Database ***********************/
$DB = new DB($_CONF['hostname'], $_CONF['database']);
$DB->connect($_CONF['username'], $_CONF['password']);


/****************** Generate Month Array ************************/

// get today's date data	
$today = getdate(time());
$month = $today["mon"];
$day = $today["mday"];
$weekday = $today["wday"];
$year = $today["year"];

$month_array = $Month->generate($month, $year);

// Instantiate Event Check Class
$EventCheck = new EventCheck($day, $month, $year);	

// Get Month Event Array
$month_exists = $EventCheck->thisMonth($month_array, $calendar_id, $catid);

$weekmap = $WeekConv->getMap();


// set month variables
$monthprev = $month - 1;
$monthnext = $month + 1;


$yearprev = $year - 1;
$yearnext = $year + 1;

$monthname = date("F", mktime(0,0,0,$month,1,$year));

// Variables for Minicalendar
$Temp->addVar("calendar_path", $calendar_path);
$Temp->addVar("style_path", $style_path);
$Temp->addVar("graphics_path", $graphics_path);

$Temp->addVar("weeknum", $weeknum);
$Temp->addVar("weekday", $weekday);

$Temp->addVar("day", $day);
$Temp->addVar("month", $month);
$Temp->addVar("year", $year);

$Temp->addVar("month_array", $month_array);

$Temp->addVar("_CONF", $_CONF);
$Temp->addVar("_WEEK_LETTER", $_WEEK_LETTER);
$Temp->addVar("_MONTH_NAME", $_MONTH_NAME);

$Temp->addVar("monthname", $monthname);
$Temp->addVar("monthprev", $monthprev);
$Temp->addVar("monthnext", $monthnext);
$Temp->addVar("yearprev", $yearprev);
$Temp->addVar("yearnext", $yearnext);

$Temp->addVar("weekmap", $weekmap);

$Temp->addVar("month_exists", $month_exists);

echo "<link rel='stylesheet' href='$style_path" . "style.css' type='text/css'>";

// Display Minicalendar
$Temp->display("minicalendaraddon.tpl.php");



/******************************* End MiniCalendar *********************************/




?>

