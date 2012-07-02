<?php

/**************************** Display MiniCalendar *******************************/
	
// Get Month Event Array
$month_exists = $EventCheck->thisMonth($month_array, $cid);


// set month variables
$monthprev = $curmonthnum - 1;
$monthnext = $curmonthnum + 1;
$monthname  = $curmonthname;


$yearprev = $year - 1;
$yearnext = $year + 1;


// Variables for Minicalendar
$Temp->addVar("monthname", $monthname);
$Temp->addVar("monthprev", $monthprev);
$Temp->addVar("monthnext", $monthnext);
$Temp->addVar("yearprev", $yearprev);
$Temp->addVar("yearnext", $yearnext);


$Temp->addVar("month_exists", $month_exists);

// Display Minicalendar
$Temp->display("minicalendar.tpl.php");


/******************************* End MiniCalendar *********************************/
	



/**************************** Display Year Navigation *******************************/

// Display Year Nav
$Temp->display("yearnav.tpl.php");

/****************************** End Year Navigation *********************************/
	
	


/************************** Display Calendar Select Box *****************************/
	
$calendarresult = $Calendar->getList(1);

$Temp->addVar("calendarresult", $calendarresult);
$Temp->addVar("Result", $Result);

$Temp->display("calendarselect.tpl.php");


/************************** End Calendar Select Box *********************************/




/************************** Display Calendar Search Box *****************************/

$Temp->display("searchbox.tpl.php");

/************************** End Calendar Search Box *********************************/
?>