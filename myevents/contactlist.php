<?php
include 'common.php';

extract($_GET);

$Temp->display("overallheader.tpl.php");

$Temp->display("pageheader.tpl.php");

$limit=10;

if(!$p) $p = 1;

$resultset = $GetContact->getList($p, $orderby, $order, $uid);

$total = $GetContact->getTotal($resultset);


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

$Temp->display("contactlist.tpl.php");

$Temp->display("pagefooter.tpl.php");


?>
