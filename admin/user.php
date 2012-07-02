<?php
include 'common.php';

extract($_GET);


$Temp->display("overallheader.tpl.php");

$Temp->display("pageheader.tpl.php");

$calresult = $GetCalendar->getList();

$limit=10;

if(!$p) $p = 1;

if($cid) {
	
	$resultset = $GetUserPriv->getList($p, $orderby, $order, $cid);

} else {

	$resultset = $GetUser->getList($p, $orderby, $order);
}

$total = $Result->numRows($resultset);


if($order=="ASC")
	$order="DESC";
else
	$order="ASC";

	$total--;

$Temp->addVar("Page", $Page);
$Temp->addVar("cid", $cid);
$Temp->addVar("calresult", $calresult);
$Temp->addVar("resultset", $resultset);
$Temp->addVar("order", $order);
$Temp->addVar("total", $total);
$Temp->addVar("limit", $limit);

$Temp->display("user.tpl.php");

$Temp->display("pagefooter.tpl.php");

?>
