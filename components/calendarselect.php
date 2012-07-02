<?php

$calendarresult = $Calendar->getList(1);

$Temp->addVar("calendarresult", $calendarresult);
$Temp->addVar("Result", $Result);

$Temp->display("calendarselect.tpl.php");


?>