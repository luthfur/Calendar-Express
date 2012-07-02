<?php
include 'common.php';

extract($_GET);


$Temp->display("overallheader.tpl.php");

$Temp->display("pageheader.tpl.php");

$limit=10;

if(!$p) $p = 1;

$GetAdmin->getList($p, $orderby, $order);

$total = $GetAdmin->getTotal();


if($order=="ASC")
	$order="DESC";
else
	$order="ASC";

$Temp->addVar("Page", $Page);

$Temp->addVar("order", $order);
$Temp->addVar("total", $total);
$Temp->addVar("limit", $limit);

$Temp->display("admin.tpl.php");

$Temp->display("pagefooter.tpl.php");

?>
