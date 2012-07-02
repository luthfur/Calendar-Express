<?php

include 'common.php';

extract($_GET);


if(!$allwords && !$oneword) {

	$error[keywords] = 1;

} else if(!$title && !$desc) {

	$error[match] = 1;

}



if(isset($error)) {


include 'components/pageheader.php';

$Temp->display("calendarbody.tpl.php");

$Temp->addVar("searchdata", $_GET);

$Temp->addVar("error", $error);

$Temp->addVar("Result", $Result);

$calresult = $GetCalendar->getList();

$Temp->addVar("calresult", $calresult);
	
$catresult = $GetCategory->getList();

$Temp->addVar("catresult", $catresult);


$Temp->display("advsearch.tpl.php");


$Temp->display("rightbar.tpl.php");

include 'components/rightsidebar.php';

$Temp->display("pagefooter.tpl.php");



} else {


if(!$p) $p = 1;

if($allwords) {
	
	$keywords = $allwords;
	$type = 1;

} elseif($oneword) {

	$keywords = $oneword;
	$type = 0;

}


$display_words = stripslashes($keywords);
$keywords = str_replace( " ", "+", $display_words );

$resultset = $EventSearch->getList($keywords, $title, $desc, $type, $cid, $catid, $p, $order, $orderby);

$total = $Result->numRows($resultset);


if($order=="ASC")
	$order="DESC";
else
	$order="ASC";

$Temp->addVar("Page", $Page);

$Temp->addVar("resultset", $resultset);
$Temp->addVar("order", $order);
$Temp->addVar("total", $total);
$Temp->addVar("keywords", $keywords);
$Temp->addVar("allwords", $allwords);
$Temp->addVar("oneword", $oneword);
$Temp->addVar("display_words", $display_words);
$Temp->addVar("cid", $cid);
$Temp->addVar("title", $title);
$Temp->addVar("desc", $desc);
$Temp->addVar("type", $type);



include 'components/pageheader.php';

$Temp->display("calendarbody.tpl.php");

if($total) {

	$Temp->display("searchresult.tpl.php");

} else {

	$Temp->display("nosearchresult.tpl.php");

}

$Temp->display("rightbar.tpl.php");

include 'components/rightsidebar.php';

$Temp->display("pagefooter.tpl.php");

}

?>