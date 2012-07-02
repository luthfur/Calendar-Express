<?php 

$conf="<?php\n\n";

$conf.="/***************************************************************\n\n";

$conf.="CALENDAR EXPRESS - DATABASE CONFIGURATION\n\n";


$conf.="WARNING: Improper alteration of any of the following values\n\n"; 

$conf.="could cause Calendar Express to stop functioning.\n\n";


$conf.="******************************************************************/\n\n";



$conf.="// Database Connection Values\n";
$conf.="//\n";
$conf.="\$_CONF['hostname'] = \"$hostname\";\n";
$conf.="\$_CONF['username'] = \"$username\";\n";
$conf.="\$_CONF['password'] = \"$password\";\n";
$conf.="\$_CONF['database'] = \"$database\";\n\n";

$conf.="\$_CONF['tableprefix'] = \"$tableprefix\";\n\n";


$conf.="// Database Table Name\n";
$conf.="//\n";
$conf.="\$_CONF['calendar_table'] = \"$calendar_table\";\n";
$conf.="\$_CONF['subscr_table'] = \"$subscr_table\";\n";
$conf.="\$_CONF['category_table'] = \"$category_table\";\n";
$conf.="\$_CONF['event_table'] = \"$event_table\";\n";
$conf.="\$_CONF['location_table'] = \"$location_table\";\n";
$conf.="\$_CONF['contact_table'] = \"$contact_table\";\n";
$conf.="\$_CONF['user_table'] = \"$user_table\";\n";
$conf.="\$_CONF['admin_table'] = \"$admin_table\";\n";
$conf.="\$_CONF['email_table'] = \"$email_table\";\n";
$conf.="\$_CONF['userpriv_table'] = \"$userpriv_table\";\n";
$conf.="\$_CONF['occurence_table'] = \"$occurence_table\";\n\n";

$conf.="?>";

?>