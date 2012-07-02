<?php 

	include 'common.php';
		
	$id = $_GET[mid];
	
	if(is_array($id)) {
			
		while(list($ind, $val) = each($id)) {
			
			$UserMail->Delete($val);


		}


	} else {

		// Delete selected email
		$UserMail->Delete($id);

	}



		$redirect = "mail.php";

		$Temp->addvar("redirect", $redirect);
		
		$Temp->display("overallheader.tpl.php");
		$Temp->display("pageheader.tpl.php");
		$Temp->display("process.tpl.php");	
	
	$Temp->display("pagefooter.tpl.php");


	
?>
