<?php 

include 'common.php';

$Temp->display("overallheader.tpl.php");

$Temp->display("pageheader.tpl.php");

$locdata = $GetLocation->getSingle($_GET[lid]);


$Temp->addVar("uid", $uid);
$Temp->addVar("locdata", $locdata);

$Temp->display("locationdetails.tpl.php");

$Temp->display("pagefooter.tpl.php");

?>
