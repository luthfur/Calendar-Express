<?php 

	include 'common.php';
	
	extract($_POST);
	
	if(isset($cid)) {
			
			while(list($ind, $val)=each($cid)) {
			
				$UserPriv->addNew($user_id, $val);
			
			}
		
		}

		$redirect = "userdetails.php?uid=$user_id";

		$Temp->addvar("redirect", $redirect);

		$Temp->display("overallheader.tpl.php");
		$Temp->display("pageheader.tpl.php");
		$Temp->display("process.tpl.php");	
		$Temp->display("pagefooter.tpl.php");

	
	
?>
