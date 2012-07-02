<?php
include 'common.php';

extract($_GET);


$total = $GetCalendar->getTotal();
$catresult = $GetCategory->getList();
$cattotal = $GetCategory->getTotal();


$Temp->addVar("catresult", $catresult);
$Temp->addVar("total", $total);
$Temp->addVar("cattotal", $cattotal);
$Temp->addVar("EventData", $EventData);
$Temp->addVar("GetCalendar", $GetCalendar);
$Temp->addVar("Page", $Page);

$Temp->display("overallheader.tpl.php");

$Temp->display("pageheader.tpl.php");

$Temp->display("calendar.tpl.php");

$Temp->display("pagefooter.tpl.php");

?>
