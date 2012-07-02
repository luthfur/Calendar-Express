<?php

include 'common.php';

$Temp->display("overallheader.tpl.php");

$Temp->display("pageheader.tpl.php");
	
	
	$contactdata = $GetContact->getSingle($_GET[conid]);

	$Temp->addVar("contactdata", $contactdata);
	$Temp->addVar("uid", $uid);

$Temp->display("contactdetails.tpl.php");

$Temp->display("pagefooter.tpl.php");

?>
		
