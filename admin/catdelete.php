<?php 

	include 'common.php';
	
			// Add selected calendar
		$Category->Delete($_GET[catid]);

		$redirect = "calendar.php";

		$Temp->addvar("redirect", $redirect);
		
		$Temp->display("overallheader.tpl.php");
		$Temp->display("pageheader.tpl.php");
		$Temp->display("process.tpl.php");	
	
	$Temp->display("pagefooter.tpl.php");


	
?>
