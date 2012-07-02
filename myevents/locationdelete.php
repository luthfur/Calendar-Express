<?php 

	include 'common.php';
	
	$path = "../";

	$id = $_GET[id];

	if(is_array($id)) {
			
		while(list($ind, $val) = each($id)) {

		// Delete selected event
		$Location->Delete($val);
		
		}

	} else {

		// Delete selected event
		$Location->Delete($id);

	}

	$redirect = "locationlist.php";

	$Temp->addvar("redirect", $redirect);

	
$Temp->display("overallheader.tpl.php");
$Temp->display("pageheader.tpl.php");
$Temp->display("messages/locationdelete.tpl.php");	
$Temp->display("pagefooter.tpl.php");


	
?>
