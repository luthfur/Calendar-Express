<?php 

	include 'common.php';
	

	if($_GET[eid]) $id= $_GET[eid];
	if($_GET[id]) $id = $_GET[id];
	


	if(is_array($id)) {
			
		while(list($ind, $val) = each($id)) {
			
			$Event->Delete($val);


		}


	} else {
		
		// Delete selected event
		$Event->Delete($id);
	
	}

$redirect = "eventlist.php";

$Temp->addvar("redirect", $redirect);

	
$Temp->display("overallheader.tpl.php");
$Temp->display("pageheader.tpl.php");
$Temp->display("messages/eventdelete.tpl.php");	
$Temp->display("pagefooter.tpl.php");

	
?>
