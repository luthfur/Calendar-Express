<?php
include 'common.php';

$catresult = $GetCategory->getList();

$Temp->addvar("catresult", $catresult);

$Temp->display("overallheader.tpl.php");

$Temp->display("pageheader.tpl.php");

$Temp->display("locationform.tpl.php");

$Temp->display("pagefooter.tpl.php");

?>
