<?php
include 'common.php';

$calresult = $GetCalendar->getList();

$Temp->addVar("calresult", $calresult);

$Temp->display("overallheader.tpl.php");

$Temp->display("pageheader.tpl.php");

$Temp->display("userform.tpl.php");

$Temp->display("pagefooter.tpl.php");

?>
