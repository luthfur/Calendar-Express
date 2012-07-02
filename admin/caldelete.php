<?php 

	include 'common.php';
	
	$id = $_GET['cid'];

	$path = "../";

	$caldetails = $GetCalendar->getSingle($id);
	
	// Delete selected calendar
	$Calendar->Delete($id);

	$catlist = $GetCalendar->getList($caldetails[cat_id]);

	if($Result->numRows($catlist) == 0) {
		
		$Category->Delete($caldetails[cat_id]);

	}

	$redirect = "calendar.php";

	$Temp->addvar("redirect", $redirect);

	
$Temp->display("overallheader.tpl.php");
$Temp->display("pageheader.tpl.php");
$Temp->display("messages/caldelete.tpl.php");	
$Temp->display("pagefooter.tpl.php");


	
?>
