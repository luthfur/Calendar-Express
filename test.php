<?php

include 'common.php';

include 'components/pageheader.php';

$Temp->display("calendarbody.tpl.php");

include 'components/monthbox.php';

$Temp->display("rightbar.tpl.php");

include 'components/rightsidebar.php';

$Temp->display("pagefooter.tpl.php");

?>
	
	