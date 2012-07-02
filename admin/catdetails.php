<?php
include 'common.php';

extract($_GET);

$catdata = $GetCategory->getSingle($catid);

$Temp->addVar("catdata", $catdata);

$Temp->display("overallheader.tpl.php");

$Temp->display("pageheader.tpl.php");

$Temp->display("catdetails.tpl.php");

$Temp->display("pagefooter.tpl.php");

?>
