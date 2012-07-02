<?php 

	include 'common.php';
	
	$id = $_GET['id'];

	if(is_array($id)) {
			
		while(list($ind, $val) = each($id)) {

			// Delete selected event
			$Contact->Delete($val);

		}
	} else {

		// Delete selected event
		$Contact->Delete($id);

	}


	
	$redirect = "contactlist.php";

	$Temp->addvar("redirect", $redirect);

	
$Temp->display("overallheader.tpl.php");
$Temp->display("pageheader.tpl.php");
$Temp->display("messages/contactdelete.tpl.php");	
$Temp->display("pagefooter.tpl.php");

	
?>
