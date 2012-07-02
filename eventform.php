<?php

include 'common.php';

include 'components/pageheader.php';

$decoyid = 1;

$Temp->display("calendarbody.tpl.php");

	$calresult = $GetCalendar->getList();
	$locresult = $GetLocation->getList(0,"location_title","ASC",0);

if($_CONF['time_format']) {
		
		$time_until = 12;

	} else {
		
		$time_until = 23;

	}


	$Temp->addVar("time_until", $time_until);
	$Temp->addVar("calresult", $calresult);
	$Temp->addVar("locresult", $locresult);
	$Temp->addVar("conresult", $conresult);
	$Temp->addVar("uid", $decoyid);
	$Temp->addVar("Result", $Result);


$Temp->display("eventform.tpl.php");

$Temp->display("pagefooter.tpl.php");

?>
	
	