<?php 

	include 'common.php';
	
	extract($_POST);

	if(!$cat_name) {
	
		$error[cat_name] = 1;

	}
	
	

	if(isset($error))  {
				
		$Temp->addvar("POST", $_POST);
		$Temp->addvar("error", $error);

		$Temp->display("overallheader.tpl.php");
		$Temp->display("pageheader.tpl.php");
		$Temp->display("catform.tpl.php");
	
	} else {

		// Add selected calendar
		$catid = $Category->addNew($_POST);
		$Calendar->switchCategory($_POST[cid], $catid);
		
		$catlist = $GetCalendar->getList($_POST[prev_cat_id]);

		if($Result->numRows($catlist) == 0) {

			$Category->Delete($_POST[prev_cat_id]);

		}


		$redirect = "calendar.php";

		$Temp->addvar("redirect", $redirect);
		
		$Temp->display("overallheader.tpl.php");
		$Temp->display("pageheader.tpl.php");
		$Temp->display("process.tpl.php");	
	
	} 

$Temp->display("pagefooter.tpl.php");


	
?>
