<?php 

	include 'common.php';
	
	
	$id = $_GET[lid];

	
	if(is_array($id)) {
			
		while(list($ind, $val) = each($id)) {
			
			$Location->Delete($val);


		}


	} else {
	
		// Delete selected event
		$Location->Delete($id);

	}

	
	$redirect = "location.php";

	$Temp->addvar("redirect", $redirect);

	
$Temp->display("overallheader.tpl.php");
$Temp->display("pageheader.tpl.php");
$Temp->display("process.tpl.php");	
$Temp->display("pagefooter.tpl.php");

	
?>
