<?php
include 'common.php';

extract($_GET);


$Temp->display("overallheader.tpl.php");

$Temp->display("pageheader.tpl.php");

$limit=10;

$resultset = $EventData->userPost($orderby,$order,$limit,$uid);

$total = $EventData->getTotal(0,$uid);

if($order=="ASC")
	$order="DESC";
else
	$order="ASC";


$Temp->addVar("resultset", $resultset);
$Temp->addVar("order", $order);
$Temp->addVar("total", $total);
$Temp->addVar("uid", $uid);
$Temp->addVar("limit", $limit);

$Temp->display("index.tpl.php");

$Temp->display("pagefooter.tpl.php");

?>
