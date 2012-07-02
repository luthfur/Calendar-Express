<?php 

	include 'common.php';
	
	extract($_POST);
	
	if(!$cat_id && !$cat_name) {
	
		$error[cat_name] = 1;
	
	} elseif(!$calendar_name) {
	
		$error[calendar_name] = 1;

	}
	

	if(isset($error))  {
		
		$catresult = $GetCategory->getList();

		$Temp->display("overallheader.tpl.php");
		$Temp->display("pageheader.tpl.php");
		
		$Temp->addvar("POST", $_POST);
		$Temp->addvar("error", $error);
		$Temp->addvar("catresult", $catresult);
		$Temp->display("calform.tpl.php");
	
	} else {

		if(!$cat_id) $_POST[cat_id] = $Category->addNew($_POST);
	
		// Add selected calendar
		$calresult = $Calendar->addNew($_POST);

		$caldata = $Result->getArray($calresult);

		$cal_id = $caldata[0];

		
		$adminresult = $GetAdmin->getList();
		
		while($admindata = $Result->getArray($adminresult)) {

			$UserPriv->addNew($admindata[user_id], $cal_id);
		
		}


		$redirect = "calendar.php";

		$Temp->addvar("redirect", $redirect);

		$Temp->display("overallheader.tpl.php");
		$Temp->display("pageheader.tpl.php");

		$Temp->display("messages/caladd.tpl.php");	
	
	} 

$Temp->display("pagefooter.tpl.php");


	
?>
