<?php 

	include 'common.php';
	
		
		$Sub->Delete($sessiondata[user_id], $cid, $catid );

		$redirect = "week.php?cid=$cid&catid=$catid&m=$month&y=$year";

		$Temp->addvar("redirect", $redirect);

		include 'components/pageheader.php';
		$Temp->display($path . "calendarbody.tpl.php");
		$Temp->display($path . "messages/unsub.tpl.php");	
		$Temp->display($path . "pagefooter.tpl.php");

	
?>
