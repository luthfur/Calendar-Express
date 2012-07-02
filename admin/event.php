<?php
include 'common.php';

extract($_GET);

$Temp->display("overallheader.tpl.php");

$Temp->display("pageheader.tpl.php");

if(!$p) $p = 1;

$resultset = $EventData->getList($p, $orderby, $order, $tid, $cid);

$total = $Result->numRows($resultset);



if($order=="ASC")
	$order="DESC";
else
	$order="ASC";

$Temp->addVar("Page", $Page);

$Temp->addVar("resultset", $resultset);
$Temp->addVar("order", $order);
$Temp->addVar("total", $total);

$Temp->display("event.tpl.php");

$Temp->display("pagefooter.tpl.php");


?>

