<?php


/**************************** Display MiniCalendar *******************************/

// Get Month Event Array
$month_exists = $EventCheck->thisMonth($month_array, $cid, $catid);

$weekmap = $WeekConv->getMap();


// set month variables
$monthprev = $month - 1;
$monthnext = $month + 1;


$yearprev = $year - 1;
$yearnext = $year + 1;


// Variables for Minicalendar
$Temp->addVar("monthname", $monthname);
$Temp->addVar("monthprev", $monthprev);
$Temp->addVar("monthnext", $monthnext);
$Temp->addVar("yearprev", $yearprev);
$Temp->addVar("yearnext", $yearnext);

$Temp->addVar("weekmap", $weekmap);

$Temp->addVar("month_exists", $month_exists);

// Display Minicalendar
$Temp->display("minicalendar.tpl.php");


/******************************* End MiniCalendar *********************************/
	






/**************************** Display Year Navigation *******************************/


// Display Year Nav
$Temp->display("yearnavbox.tpl.php");

/****************************** End Year Navigation *********************************/
	
	
	
	


/************************* Grab Calendar and Lists *********************************/

$calendarresult = $GetCalendar->getList($catid);

$Temp->addVar("calendarresult", $calendarresult);
$Temp->addVar("Result", $Result);

/************************* Grab Calendar and Lists *********************************/
	
	
	
	



/************************** Display Calendar Search Box *****************************/
	
$Temp->display("searchbox.tpl.php");

/************************** End Calendar Search Box *********************************/	
	
	



/************************** Display Category Select Box *****************************/

$catresult = $GetCategory->getList();

$Temp->addVar("catresult", $catresult);

$Temp->display("categoryselect.tpl.php");


/************************** End Category Select Box *********************************/
	
	


/************************** Display Calendar Select Box *****************************/


$Temp->display("calendarselect.tpl.php");


/************************** End Calendar Select Box *********************************/
	



/************************** Printable Link *****************************/


$link = basename($_SERVER[PHP_SELF]);

$Temp->addVar("link", $link);

$Temp->display("printlink.tpl.php");


/**************************  Printable Link*********************************/



?>