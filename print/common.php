<?php
if(!$suppress) session_start();


/************* Path Variables ********************/
$source_location = "../sources/";
$config_location = "../";


/* pre-include configuration file */
include $config_location . 'config.php';
include $config_location . 'settings.php';
include $config_location . 'lang_settings.php';


$template_location = "../templates/" . $_CONF[style] . "/";


$temp_path = $template_location . "print/";
$style_path = $template_location . "styles/";
$graphics_path = $template_location . "graphics/";





/************ Include All required Components ****************/


//include predefined functions
include $source_location . 'functions.php';


//include all classes
include $source_location . 'mysql_db.php';
include $source_location . 'result_iterator.php';
include $source_location . 'mysql_page.php';
include $source_location . 'template.php';
include $source_location . 'month.php';
include $source_location . 'week.php';
include $source_location . 'weekconv.php';

// Category Classes
include $source_location . 'category.php';
include $source_location . 'getcategory.php';

// Calendar Classes
include $source_location . 'calendar.php';
include $source_location . 'getcalendar.php';

// Get Subscription Classes
include $source_location . 'subscribe.php';
include $source_location . 'getsubscribe.php';


// location classes
include $source_location . 'location.php';
include $source_location . 'getlocation.php';


// contact class
include $source_location . 'contact.php';
include $source_location . 'getcontact.php';



// user classes
include $source_location . 'user.php';
include $source_location . 'getuser.php';
include $source_location . 'userpassword.php';
include $source_location . 'userpriv.php';
include $source_location . 'getuserpriv.php';
include $source_location . 'usersession.php';

// admin classes
include $source_location . 'admin.php';
include $source_location . 'getadmin.php';
include $source_location . 'adminpassword.php';


// event classes
include $source_location . 'events/event.php';
include $source_location . 'events/eventdata.php';
include $source_location . 'events/eventsearch.php';
include $source_location . 'events/getevents.php';
include $source_location . 'events/eventcheck.php';
include $source_location . 'events/eventdelete.php';



// Email Classes
include $source_location . 'email.php';
include $source_location . 'recommend.php';
include $source_location . 'regemail.php';


// event type classes
include $source_location . 'occurrence.php';


/************* Instantiate All Required Classes ***************/

$Result = new Result();
$Page = new Page();
$Temp = new Template($temp_path);
$WeekConv = new WeekConv($_CONF['start_weekday']);
$Month = new Month();
$Week = new Week();

// Instantiate Category classes
$Category = new Category();
$GetCategory = new GetCategory();

// Instantiate calendar classes
$Calendar = new Calendar($_CONF['calendar_table'], $_CONF['category_table'] );
$GetCalendar = new GetCalendar();

// Instantiate subscription classes
$Sub = new Subscription();
$GetSub = new GetSubscription();

// Instantiate location classes
$Location = new Location();
$GetLocation = new GetLocation();


// Instantiate contact classes
$Contact = new Contact();
$GetContact = new GetContact();


// Instantiate user classes
$User = new User();
$GetUser = new GetUser();
$UserPass = new UserPassword();
$UserPriv = new UserPriv();
$GetUserPriv = new GetUserPriv();
$UserSession = new UserSession();

// Instantiate admin classes
$Admin = new Admin();
$GetAdmin = new GetAdmin();
//$AdminPass = new AdminPassword();


// Instantiate event classes
$Event = new Event();
$EventData = new EventData();
$EventSearch = new EventSearch();
$EventDelete = new EventDelete();


// Instantiate Email Classes
$Email = new Email();
$RecEmail = new Recommend();
$RegEmail = new RegistrationEmail();


// Instantiate event type classes
$Occ = new Occurrence();



/******************** Initialize Date Variables ***********************/

// get data from query string

if(is_array($_GET)) {
	
	$cid = $_GET['cid'];
	$catid = $_GET['catid'];
	$weeknum = $_GET['w'];
	$weekday = $_GET['wd'];
	$day = $_GET['d'];
	$year = $_GET['y'];
	$month = $_GET['m'];

} else {

	$cid = $_POST['cid'];
	$catid = $_POST['catid'];
	$weeknum = $_POST['w'];
	$weekday = $_POST['wd'];
	$day = $_POST['d'];
	$year = $_POST['y'];
	$month = $_POST['m'];


}
	
// get today's date data	
$today = getdate(time());
$curmonth = $today["mon"];
$curday = $today["mday"];
$curweekday = $today["wday"];
$curyear = $today["year"];

$curmonthname = date("F", mktime(0,0,0,$curmonth,1,$curyear));

	
if(!$year) {
		
	$month = $curmonth;
	$day = $curday;
	$weekday = $curweekday;
	$year= $curyear;
	$monthname = $curmonthname;	
	
} else {

	$monthname = date("F", mktime(0,0,0,$month,1,$year));	
}


$monthname = strtr($monthname, $_DATE_TRANS);

// Instantiate Event Check Class
$EventCheck = new EventCheck($day, $month, $year);	



/******************** Connect to Database ***********************/
$DB = new DB($_CONF['hostname'], $_CONF['database']);
$DB->connect($_CONF['username'], $_CONF['password']);




/****************** Generate Month Array ************************/
$month_array = $Month->generate($month, $year);




/****** Enter All Common Variables into Template Engine **********/

$Temp->addVar("cid", $cid);
$Temp->addVar("catid", $catid);
$Temp->addVar("temp_path", $temp_path);
$Temp->addVar("style_path", $style_path);
$Temp->addVar("graphics_path", $graphics_path);

$Temp->addVar("weeknum", $weeknum);
$Temp->addVar("weekday", $weekday);

$Temp->addVar("day", $day);
$Temp->addVar("month", $month);
$Temp->addVar("year", $year);

$Temp->addVar("curday", $curday);
$Temp->addVar("curmonth", $curmonth);
$Temp->addVar("curyear", $curyear);

$Temp->addVar("monthname", $monthname);

$Temp->addVar("month_array", $month_array);

$Temp->addVar("_CONF", $_CONF);
$Temp->addVar("_EVENT_TYPE", $_EVENT_TYPE);
$Temp->addVar("_WEEK_LETTER", $_WEEK_LETTER);
$Temp->addVar("_WEEK_NAME", $_WEEK_NAME);
$Temp->addVar("_MONTH_NAME", $_MONTH_NAME);
$Temp->addVar("_DATE_TRANS", $_DATE_TRANS);



/****************** Initialize Get Event class ************************/
$GetEvents = new GetEvents($day, $month, $year);


/****************** Grab Calendars if Category id specified ************/
$calendarresult = $GetCalendar->getList($catid);



/***************** Grab User data from Session vars *********************/
$sessiondata = $UserSession->GetData();
$Temp->addVar("sessiondata", $sessiondata);


if(($cid || $catid) && isset($sessiondata['username'])) {

	$unsub=0;

	if($GetSub->Subscribed($sessiondata['user_id'], $cid, $catid, $calendarresult)) { 

		$unsub = 1;

	}

	$Temp->addVar("unsub", $unsub);
}






?>