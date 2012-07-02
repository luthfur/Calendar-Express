<?php
include 'common.php';

extract($_GET);

$caldata = $GetCalendar->getSingle($cid);
$catresult = $GetCategory->getList();

$Temp->addVar("catresult", $catresult);

$Temp->addVar("caldata", $caldata);

$Temp->display("overallheader.tpl.php");

$Temp->display("pageheader.tpl.php");

$Temp->display("caldetails.tpl.php");

$Temp->display("pagefooter.tpl.php");

?>
