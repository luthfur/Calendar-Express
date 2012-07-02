<?php 

	include 'common.php';
	
	
	$eid = $_GET[eid];
	
	
	if(is_array($eid)) {
			
		while(list($ind, $val) = each($eid)) {
			
			$Event->Delete($val);


		}


	} else {

		// Delete selected event
		$Event->Delete($eid);
	}


	$redirect = "event.php";

	$Temp->addvar("redirect", $redirect);

	
$Temp->display("overallheader.tpl.php");
$Temp->display("pageheader.tpl.php");
$Temp->display("process.tpl.php");	
$Temp->display("pagefooter.tpl.php");

	
?>
