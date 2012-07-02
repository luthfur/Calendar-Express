<?php


// Edit the variable $calendar_path below by entering the relative path to the calendar directory


$calendar_path = "../";
$calendar_id = 0;
$num_days = 3;


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
include $source_location . 'functions.php';
include $source_location . 'events/getevents.php';
include $source_location . 'date.php';


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

$monthname = date("F", mktime(0,0,0,$month,1,$year));

// Variables for Minicalendar
$Temp->addVar("calendar_path", $calendar_path);
$Temp->addVar("style_path", $style_path);
$Temp->addVar("graphics_path", $graphics_path);

$Temp->addVar("weekday", $weekday);

$Temp->addVar("day", $day);
$Temp->addVar("month", $month);
$Temp->addVar("year", $year);

$Temp->addVar("monthname", $monthname);

$Temp->addVar("month_array", $month_array);

$Temp->addVar("_CONF", $_CONF);
$Temp->addVar("_MONTH_NAME", $_MONTH_NAME);


echo "<link rel='stylesheet' href='$style_path" . "style.css' type='text/css'>";


$ThisDate = new DateTime($day, $month, $year );

$GetEvents = new GetEvents($day, $month, $year);

$eventset = array();


for($i=1; $i<=$num_days; $i++) {

	$GetEvents->ChangeMonth($ThisDate->month);
	$GetEvents->ChangeYear($ThisDate->year);
	
	$eventset[$i] = $GetEvents->thisDay($ThisDate->day, $ThisDate->day_of_week);

	$ThisDate->AddDay(1);


}

$ThisDate->RemoveDay($num_days);


$Temp->addVar("eventset", $eventset);
$Temp->addVar("ThisDate", $ThisDate);
$Temp->addVar("GetEvents", $GetEvents);
$Temp->addVar("weeknum", $weeknum);
$Temp->addVar("num_days", $num_days);
$Temp->display("upcoming.tpl.php");




/******************************* End MiniCalendar *********************************/




?>

