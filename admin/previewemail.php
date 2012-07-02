<?php
include 'common.php';

if(!$_POST[email_subj]) {
	
	$error[email_subj] = 1;
	
} elseif(!$_POST[email_message]) {
	
	$error[email_message] = 1;

}



$Temp->addVar("error", $error);

$Temp->display("overallheader.tpl.php");

$Temp->display("pageheader.tpl.php");

$Temp->display("previewemail.tpl.php");

$Temp->display("emailform.tpl.php");

$Temp->display("pagefooter.tpl.php");

?>
