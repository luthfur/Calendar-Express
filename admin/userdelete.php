<?php 

	include 'common.php';

	
	$id = $_GET['uid'];
	
	
	if(is_array($id)) {
			
		while(list($ind, $val) = each($id)) {
			
			$User->Delete($val);


		}


	} else {

		// Delete selected user
		$User->Delete($id);
	
	}

	
	$Event->ResetUser($id);


	$redirect = "user.php";

	$Temp->addvar("redirect", $redirect);

	
$Temp->display("overallheader.tpl.php");
$Temp->display("pageheader.tpl.php");
$Temp->display("process.tpl.php");	
$Temp->display("pagefooter.tpl.php");


	
?>
