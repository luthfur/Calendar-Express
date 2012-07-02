<?php 

	include 'common.php';
	
	extract($_GET);
	
	if($catid) {

		while($caldata = $Result->getArray($calendarresult)) {
			
			$Sub->addNew($sessiondata[user_id], $caldata[calendar_id], $catid);
		}

		
	} elseif($cid) {

		$Sub->addNew($sessiondata[user_id], $cid, $catid);

	}


	$redirect = "week.php?cid=$cid&catid=$catid&m=$month&y=$year";

	$Temp->addvar("redirect", $redirect);

	include 'components/pageheader.php';
	$Temp->display($path . "calendarbody.tpl.php");
	$Temp->display($path . "messages/sub.tpl.php");	
	$Temp->display($path . "pagefooter.tpl.php");

	
?>
