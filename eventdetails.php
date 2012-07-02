<?php

include 'common.php';

$eventdata = $EventData->getSingle($_GET['eid']);

$Temp->addVar("eventdata", $eventdata);

$Temp->display("eventdetails.tpl.php");


?>
	
	