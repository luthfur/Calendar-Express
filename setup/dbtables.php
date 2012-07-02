<?php



$SQL[] ="DROP TABLE IF EXISTS $admin_table";

$SQL[] ="CREATE TABLE $admin_table (
  admin_id bigint(20) NOT NULL auto_increment,
  user_id bigint(20) NOT NULL default '0',
  manage_users tinyint(1) NOT NULL default '0',
  manage_events tinyint(1) NOT NULL default '0',
  manage_locations tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (admin_id)
) TYPE=MyISAM";


$SQL[] ="DROP TABLE IF EXISTS $calendar_table";


$SQL[] ="CREATE TABLE $calendar_table (
  calendar_id bigint(20) NOT NULL auto_increment,
  cat_id bigint(20) NOT NULL default '0',
  calendar_name varchar(200) NOT NULL default '',
  calendar_image varchar(200) NOT NULL default '',
  calendar_icon varchar(200) NOT NULL default '',
  PRIMARY KEY  (calendar_id)
) TYPE=MyISAM";



$SQL[] ="DROP TABLE IF EXISTS $userpriv_table";


$SQL[] ="CREATE TABLE $userpriv_table (
  user_id bigint(20) NOT NULL default '0',
  calendar_id bigint(20) NOT NULL default '0'
) TYPE=MyISAM";



$SQL[] ="DROP TABLE IF EXISTS $category_table";


$SQL[] ="CREATE TABLE $category_table (
  cat_id bigint(20) NOT NULL auto_increment,
  cat_name varchar(200) NOT NULL default '',
  cat_image varchar(200) NOT NULL default '',
  PRIMARY KEY  (cat_id)
) TYPE=MyISAM";




$SQL[] ="DROP TABLE IF EXISTS $contact_table";


$SQL[] ="CREATE TABLE $contact_table (
  contact_id bigint(20) NOT NULL auto_increment,
  user_id bigint(20) NOT NULL default '0',
  contact_name varchar(100) NOT NULL default '',
  contact_email varchar(200) NOT NULL default '',
  contact_phone varchar(20) NOT NULL default '',
  PRIMARY KEY  (contact_id)
) TYPE=MyISAM";




$SQL[] ="DROP TABLE IF EXISTS $email_table";


$SQL[] ="CREATE TABLE $email_table (
  message_id bigint(20) NOT NULL auto_increment,
  date_sent timestamp(14) NOT NULL,
  subject varchar(200) NOT NULL default '',
  message text NOT NULL,
  PRIMARY KEY  (message_id)
) TYPE=MyISAM";





$SQL[] ="DROP TABLE IF EXISTS $event_table";


$SQL[] ="CREATE TABLE $event_table (
  event_id bigint(20) NOT NULL auto_increment,
  type_id bigint(20) NOT NULL default '0',
  calendar_id bigint(20) NOT NULL default '0',
  location_id bigint(20) NOT NULL default '0',
  user_id bigint(20) NOT NULL default '0',
  contact_id bigint(20) NOT NULL default '0',
  event_title varchar(200) NOT NULL default '',
  start_time time default NULL,
  stop_time time default NULL,
  text_time varchar(200) NOT NULL default '',
  event_desc text NOT NULL,
  approved tinyint(1) NOT NULL default '0',
  attachment varchar(200) NOT NULL default '',
  event_active tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (event_id)
) TYPE=MyISAM";




$SQL[] ="DROP TABLE IF EXISTS $location_table";


$SQL[] ="CREATE TABLE $location_table (
  location_id bigint(20) NOT NULL auto_increment,
  user_id bigint(20) NOT NULL default '0',
  location_title varchar(200) NOT NULL default '',
  address_1 varchar(200) NOT NULL default '',
  address_2 varchar(200) NOT NULL default '',
  city varchar(100) NOT NULL default '',
  state varchar(100) NOT NULL default '',
  zip varchar(100) NOT NULL default '',
  location_desc text NOT NULL,
  PRIMARY KEY  (location_id)
) TYPE=MyISAM";




$SQL[] ="DROP TABLE IF EXISTS $occurence_table";


$SQL[] ="CREATE TABLE $occurence_table (
  type_id bigint(20) NOT NULL auto_increment,
  event_type tinyint(1) NOT NULL default '0',
  day tinyint(2) NOT NULL default '0',
  weekday tinyint(1) NOT NULL default '0',
  weeknum tinyint(1) NOT NULL default '0',
  monthnum tinyint(2) NOT NULL default '0',
  start_date date NOT NULL default '0000-00-00',
  stop_date date NOT NULL default '0000-00-00',
  PRIMARY KEY  (type_id)
) TYPE=MyISAM";


$SQL[] ="DROP TABLE IF EXISTS $subscr_table";


$SQL[] ="CREATE TABLE $subscr_table (
  user_id bigint(20) NOT NULL default '0',
  calendar_id bigint(20) NOT NULL default '0',
  cat_id bigint(20) NOT NULL default '0'
) TYPE=MyISAM";




$SQL[] ="DROP TABLE IF EXISTS $user_table";


$SQL[] ="CREATE TABLE $user_table (
  user_id bigint(20) NOT NULL auto_increment,
  user_name varchar(100) NOT NULL default '',
  password varchar(32) NOT NULL default '',
  date_set timestamp(14) NOT NULL,
  status tinyint(1) NOT NULL default '0',
  full_name varchar(200) NOT NULL default '',
  telephone varchar(30) NOT NULL default '',
  email varchar(200) NOT NULL default '',
  active tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (user_id)
) TYPE=MyISAM";


$SQL[] ="INSERT INTO `$category_table` ( `cat_id` , `cat_name` , `cat_image` ) 
VALUES (
'', 'Test Category', ''
)";


$SQL[] ="INSERT INTO `$calendar_table` ( `calendar_id` , `cat_id` , `calendar_name` , `calendar_image` , `calendar_icon` ) 
VALUES (
'', '1', 'Test Calendar', '', ''
)";


$SQL[] ="INSERT INTO `$user_table` ( `user_id` , `user_name` , `password` , `date_set` , `status` , `full_name` , `telephone` , `email` , `active` ) 
VALUES (
'', 'Anonymous', '', NOW( ) , '3', '', '', '', '1'
)";


$SQL[] ="INSERT INTO `$user_table` ( `user_id` , `user_name` , `password` , `date_set` , `status` , `full_name` , `telephone` , `email` , `active` ) 
VALUES (
'', '$admin_username', MD5('$admin_password'), NOW( ) , '1', '$full_name', '', '$email', '1'
)";


$SQL[] ="INSERT INTO `$admin_table` ( `admin_id` , `user_id` , `manage_users` , `manage_events` , `manage_locations` ) 
VALUES (
'', '2', '1', '1', '1'
)";


$SQL[] ="INSERT INTO `$userpriv_table` ( `user_id` , `calendar_id` ) 
VALUES (
'2', '1'
)";


$SQL[] ="INSERT INTO `$contact_table` ( `contact_id` , `user_id` , `contact_name` , `contact_email` , `contact_phone` ) 
VALUES (
'', '1', 'Not Selected', '', ''
)";


?>

