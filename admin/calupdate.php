<?php 

	include 'common.php';

	// Update selected calendar
	$Calendar->Update($_POST);
	

	$catlist = $GetCalendar->getList($_POST[prev_cat_id]);

	if($Result->numRows($catlist) == 0) {

		$Category->Delete($_POST[prev_cat_id]);

	}


	$redirect = "caldetails.php?cid=$_POST[calendar_id]";

	$Temp->addvar("redirect", $redirect);

	
$Temp->display("overallheader.tpl.php");
$Temp->display("pageheader.tpl.php");
$Temp->display("messages/calupdate.tpl.php");	
$Temp->display("pagefooter.tpl.php");

?>