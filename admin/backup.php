<?php

include 'common.php';

$time = $DB->Backup();

$fp = fopen("lastbackup.php", "w");
fwrite ($fp, $time);
fclose(); 


$redirect = "backupform.php";
	
$Temp->addvar("redirect", $redirect);

	
$Temp->display("overallheader.tpl.php");
$Temp->display("pageheader.tpl.php");
$Temp->display("process.tpl.php");	
$Temp->display("pagefooter.tpl.php");

?>