<?php
include 'common.php';

extract($_GET);

if(!$p) $p=1;

$resultset = $GetSub->getList($uid, 0,0, $p, $orderby, $order);


if($order=="ASC")
	$order="DESC";
else
	$order="ASC";


$Temp->addVar("order", $order);
$Temp->addVar("total", $total);
$Temp->addVar("limit", $limit);
$Temp->addVar("Page", $Page);
$Temp->addVar("resultset", $resultset);

$Temp->display("overallheader.tpl.php");

$Temp->display("pageheader.tpl.php");

$Temp->display("sublist.tpl.php");

$Temp->display("subcatlist.tpl.php");

$Temp->display("pagefooter.tpl.php");

?>
