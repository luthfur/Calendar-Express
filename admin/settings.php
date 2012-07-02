<?php
include 'common.php';

$calresult = $GetCalendar->getList();

$stylelist = listpacks();

$Temp->addVar("calresult", $calresult);
$Temp->addVar("stylelist", $stylelist);

$Temp->display("overallheader.tpl.php");

$Temp->display("pageheader.tpl.php");

$Temp->display("settings.tpl.php");

$Temp->display("pagefooter.tpl.php");

?>
