<?php 

	include 'common.php';
	
	extract($_POST);
	
	// Test for passed fields

	if(!$user_name) {

		$error['user_name'] = 1;
		
	} elseif ($GetUser->Exists($user_name)) {
	
		$error['user_exists'] = 1;
		$error['user_name'] = 1;

	} elseif($user_pass != $user_pass2 || !$user_pass) {
	
		$error['pass'] = 1;

	} elseif(!$email || !checkmail($email)) {
	
		$error['email'] = 1;

	}	

	
	// display form again if error found

	if(isset($error)) {
		
		$Temp->display("overallheader.tpl.php");

		$Temp->display("pageheader.tpl.php");
		
		$Temp->addVar("error", $error);
		$Temp->addVar("_POST", $_POST);

		$Temp->display("userform.tpl.php");

		$Temp->display("pagefooter.tpl.php");

			
	
	// Add User

	} else {

		$user_id = $User->addNew($_POST, 1);
		
		if(isset($cid)) {
			
			while(list($ind, $val)=each($cid)) {
			
				$UserPriv->addNew($user_id, $val);
			
			}
		
		}

		$redirect = "user.php";

		$Temp->addvar("redirect", $redirect);

		$Temp->display("overallheader.tpl.php");
		$Temp->display("pageheader.tpl.php");
		$Temp->display("process.tpl.php");	
		$Temp->display("pagefooter.tpl.php");

	}
	
?>
