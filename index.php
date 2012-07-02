<?php

include 'common.php';

include 'components/pageheader.php';


$catresult = $GetCategory->getList();

$catlist = array();

$callist = array();

$count = 0;

while($catdata = $Result->getArray($catresult)) {

	$catlist[$count] = $catdata;
	
	$calresult = $GetCalendar->getList($catdata[cat_id]);
	
	$callist[$count] = array();

	while($caldata = $Result->getArray($calresult)) {
	
		array_push($callist[$count], $caldata);

	}

	$count++;

}

$Temp->addVar("catlist", $catlist);
$Temp->addVar("callist", $callist);

$Temp->display("calendarbody.tpl.php");

$Temp->display("index.tpl.php");
	
$Temp->display("pagefooter.tpl.php");

?>
	
	