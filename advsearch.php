<?php

include 'common.php';

include 'components/pageheader.php';

$Temp->display("calendarbody.tpl.php");

$Temp->addVar("Result", $Result);

$calresult = $GetCalendar->getList();

$Temp->addVar("calresult", $calresult);
	
$catresult = $GetCategory->getList();

$Temp->addVar("catresult", $catresult);


$Temp->display("advsearch.tpl.php");


$Temp->display("rightbar.tpl.php");

include 'components/rightsidebar.php';

$Temp->display("pagefooter.tpl.php");


?>