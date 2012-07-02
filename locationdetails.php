<?php

include 'common.php';

$locationdata = $GetLocation->getSingle($_GET['lid']);

$locationdata[add_parsed] = str_replace(" ", "+", $locationdata[address_1]);
$locationdata[city_parsed] = str_replace(" ", "+", $locationdata[city]);
$locationdata[zip_parsed] = str_replace(" ", "+", $locationdata[zip]);

$Temp->addVar("locationdata", $locationdata);

$Temp->display("locationdetails.tpl.php");


?>
	
	