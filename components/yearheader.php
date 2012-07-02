<?php

$yearprev = $year - 1;
$yearnext = $year + 1;

$calendarresult = $GetCalendar->getList($catid);

$Temp->addVar("yearprev", $yearprev);
$Temp->addVar("yearnext", $yearnext);

$Temp->addVar("calendarresult", $calendarresult);
$Temp->addVar("Result", $Result);


// Display Calendar Header
$Temp->display("yearheader.tpl.php");

?>