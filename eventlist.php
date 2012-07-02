<?php
include 'common.php';

extract($_GET);

$Temp->display("overallheader.tpl.php");

$Temp->display("pageheader.tpl.php");


$limit=10;

if(!$p) $p = 1;

$resultset = $EventData->getList($p, $orderby, $order, $tid, $cid, $uid);

$total = $EventData->getTotal($uid);



if($order=="ASC")
	$order="DESC";
else
	$order="ASC";

$Temp->addVar("Page", $Page);

$Temp->addVar("resultset", $resultset);
$Temp->addVar("order", $order);
$Temp->addVar("total", $total);
$Temp->addVar("uid", $uid);
$Temp->addVar("limit", $limit);

$Temp->display("eventlist.tpl.php");

$Temp->display("pagefooter.tpl.php");


?>

