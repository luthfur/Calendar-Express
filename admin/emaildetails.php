<?php
include 'common.php';

extract($_GET);

$emaildata = $GetMail->getSingle($mid);

$Temp->addVar("emaildata", $emaildata);

$Temp->display("overallheader.tpl.php");

$Temp->display("pageheader.tpl.php");

$Temp->display("emaildetails.tpl.php");

$Temp->display("pagefooter.tpl.php");

?>
