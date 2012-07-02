<?php

include 'common.php';

include 'components/pageheader.php';

include 'components/yearheader.php';

$Temp->display("calendarbody.tpl.php");


for($i=1; $i<=12; $i++) {
	
	// Generate Month Array 
	$month_array = $Month->generate($i, $year);
	
	// Get Month Event Array
	$month_exists = $EventCheck->thisMonth($month_array, $cid, $catid, $i);
	
	$year_array[$i] = $month_array;
	$year_exists[$i] = $month_exists;

}


$weekmap = $WeekConv->getMap();

$Temp->addVar("weekmap", $weekmap);

$Temp->addvar("year_array", $year_array);
$Temp->addvar("year_exists", $year_exists);
	



/************************* Grab Calendar and Lists *********************************/

$calendarresult = $GetCalendar->getList($catid);

$Temp->addVar("calendarresult", $calendarresult);
$Temp->addVar("Result", $Result);

/************************* Grab Calendar and Lists *********************************/
	
	


/************************** Grab Category List *****************************/

$catresult = $GetCategory->getList();

$Temp->addVar("catresult", $catresult);

/************************** End Category List *********************************/
		


$Temp->display("year_body.tpl.php");


/******************** Display MinCals ******************************/


 for($l=1; $l<=12; $l++) { 

		$month_array = $year_array[$l];
		$month_exists = $year_exists[$l];
		$themonth = $l;

		if($l==1 || $l==5 || $l==9) { 

			$Temp->display("year_tr.tpl.php");
	
		}
		
		$Temp->addVar("month_array", $month_array);
		$Temp->addVar("month_exists", $month_exists);
		$Temp->addVar("themonth", $themonth);

		$Temp->display("yearminicalendar.tpl.php");

		
		if($l==4 || $l==8 || $l==12) {
	
		$Temp->display("year_trend.tpl.php");
	
		 } 



	 }


/******************************************************************/


$Temp->display("year_bodyend.tpl.php");









$Temp->display("monthcal_table.tpl.php");

$Temp->display("categoryselect.tpl.php");

$Temp->display("monthcal_tdclose.tpl.php");


$Temp->display("monthcal_tdcenter.tpl.php");

$Temp->display("calendarselect.tpl.php");

$Temp->display("monthcal_tdclose.tpl.php");


$Temp->display("monthcal_tdright.tpl.php");

$Temp->display("searchbox.tpl.php");

$Temp->display("monthcal_tableclose.tpl.php");
	
$Temp->display("pagefooter.tpl.php");

?>
	
	