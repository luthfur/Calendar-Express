<?php
include 'common.php';

extract($_GET);

$id = array();

$Temp->display("overallheader.tpl.php");

$Temp->display("pageheader.tpl.php");

$limit=10;

if(!$p) $p = 1;

$resultset = $GetLocation->getList($p, $orderby, $order, $uid);

$total = $GetLocation->getTotal($resultset);


if($order=="ASC")
	$order="DESC";
else
	$order="ASC";

$Temp->addVar("Page", $Page);

$Temp->addVar("resultset", $resultset);
$Temp->addVar("id", $id);
$Temp->addVar("order", $order);
$Temp->addVar("total", $total);
$Temp->addVar("uid", $uid);
$Temp->addVar("limit", $limit);

$Temp->display("locationlist.tpl.php");

$Temp->display("pagefooter.tpl.php");

?>
