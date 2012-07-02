<?php
include 'common.php';

extract($_GET);


$Temp->display("overallheader.tpl.php");

$Temp->display("pageheader.tpl.php");

$limit=10;

$total_users = $GetUser->getTotal();
$total_calendars = $GetCalendar->getTotal();
$total_locations = $GetLocation->getTotal();
$total_events = $EventData->getTotal();
$total_admins = $GetAdmin->getTotal();
$total_unapp_users = $Result->numRows($GetUser->getList(0,0,0,1));
$total_unapp_events = $Result->numRows($EventData->getExtPosts());

$resultset = $EventData->userPost($orderby,$order,$limit,$uid);

$total_users--;


if($order=="ASC")
	$order="DESC";
else
	$order="ASC";


$Temp->addVar("resultset", $resultset);
$Temp->addVar("order", $order);

$Temp->addVar("total_users", $total_users);
$Temp->addVar("total_calendars", $total_calendars);
$Temp->addVar("total_locations", $total_locations);
$Temp->addVar("total_events", $total_events);
$Temp->addVar("total_admins", $total_admins);
$Temp->addVar("total_unapp_users", $total_unapp_users);
$Temp->addVar("total_unapp_events", $total_unapp_events);

$Temp->addVar("uid", $uid);
$Temp->addVar("limit", $limit);

$Temp->display("index.tpl.php");

$Temp->display("pagefooter.tpl.php");

?>
