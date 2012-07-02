<?php 

	include 'common.php';
	
	extract($_POST);
	
	// Test for passed fields

	if(!$location_title) {
	
		$error['location_title'] = 1;

	}  elseif(!$location_desc) {
	
		$error['location_desc'] = 1;

	}

	
	// display form again if error found

	if(isset($error)) {
		
		$Temp->display("overallheader.tpl.php");

		$Temp->display("pageheader.tpl.php");
		
		$catresult = $GetCategory->getList();
		
		$Temp->addVar("catresult", $catresult);
		$Temp->addVar("uid", $uid);
		$Temp->addVar("error", $error);
		$Temp->addVar("_POST", $_POST);

		$Temp->display("locationform.tpl.php");

		$Temp->display("pagefooter.tpl.php");

			
	
	// Add Location

	} else {

		$Location->addNew($_POST, $uid);
		
		$redirect = "location.php";

	$Temp->addvar("redirect", $redirect);

	
	$Temp->display("overallheader.tpl.php");
	$Temp->display("pageheader.tpl.php");
	$Temp->display("process.tpl.php");	
	$Temp->display("pagefooter.tpl.php");


	}
	
?>
