<?php
include 'common.php';

extract($_GET);

if(!$p) $p=1;

$resultset = $GetUserPriv->getList($p, $orderby, $order,0,$uid);


if($order=="ASC")
	$order="DESC";
else
	$order="ASC";


$userdata = $GetUser->getSingle($uid);

$Temp->addVar("order", $order);
$Temp->addVar("total", $total);
$Temp->addVar("limit", $limit);
$Temp->addVar("Page", $Page);
$Temp->addVar("userdata", $userdata);

$Temp->display("overallheader.tpl.php");

$Temp->display("pageheader.tpl.php");

$Temp->display("userdetails.tpl.php");

$Temp->display("pagefooter.tpl.php");

?>
