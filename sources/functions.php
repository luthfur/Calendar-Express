<?php

/***********************************************************************
Functions Set

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/




/***************** Get Week Number of the Day *********************/
function getweeknum($day, $month, $year) {

	$weeknum = 1;
		
	if ( date("m", mktime(0,0,0,$month, $day, $year)) == date("m", mktime(0,0,0,$month, ($day - 7), $year)) ) {
		$weeknum = 2;
	}
	if ( date("m", mktime(0,0,0,$month, $day, $year)) == date("m", mktime(0,0,0,$month, ($day - 14), $year)) ) {
		$weeknum = 3;
	}
	if ( date("m", mktime(0,0,0,$month, $day, $year)) == date("m", mktime(0,0,0,$month, ($day - 21), $year)) ) {
		$weeknum = 4;
	}
	if ( date("m", mktime(0,0,0,$month, $day, $year)) == date("m", mktime(0,0,0,$month, ($day - 28), $year)) ) {
		$weeknum = 5;
	}
	
	return $weeknum;

}




/***************** Convert Time for DB Input ************************/
function convtime($h, $m, $t) {
	global $_CONF;

	if($t && ($h != 12)){
		
		$h = $h + 12;
	
	} elseif(!$t && ($h == 12)) {
		
		$h = 00;

	}
	
	
	$timestring = "$h:$m:00";
	
	return $timestring;

}



/***************** Convert Time for Calendar Display ************************/
function displaytime($event_timing) {
	
	global $_CONF;

	$timeval = explode( ":", $event_timing);
	
	$hours = $timeval[0];
	$minutes = $timeval[1];
	
	if($_CONF[time_format]) {

	$timeofday = "am";

	
	if($hours == 00) {
		
		$hours = 12;
		
	} else if($hours == 12) {

		$timeofday = "pm";
	
		
	} else if($hours > 12) {

		$hours = $hours - 12;
		$timeofday = "pm";
	}
	
	$timestring = "$hours:$minutes $timeofday";

	} else {

		$timestring = "$hours:$minutes";

	}
	
	return $timestring;

}




/***************** Generate 24hour clock ***************/
function conv24($h, $t) {

	if($t && ($h != 12)){

		$h = $h + 12;
	
	} elseif(!$t && ($h == 12)) {
		
		$h = 00;

	}
		
	return $h;

}





/***************** Convert Date for Calendar Display ************************/
function displaydate($timestamp) {
	
	global $_CONF;


	$year = substr($timestamp, 0, 4);
	$month = substr($timestamp, 4, 2);
	$day = substr($timestamp, 6, 2);
	$hours = substr($timestamp, 8, 2);
	$min = substr($timestamp, 10, 2);
	$sec = substr($timestamp, 12, 2);

	$format = $_CONF['date_format'] . " g:i a";

	$date_string = date($format, mktime($hours, $min, $sec, $month, $day, $year));
	
	return $date_string;

}



/***************** Get Week day Name *********************/
function weekdaypointer($weekdaynum) {

	$weekarray = array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
	
	return $weekarray[$weekdaynum];

}






/***************** Get Week day Name *********************/
function weekdayabbr($weekdaynum) {

	$weekarray = array("SU", "MO", "TU", "WE", "TH", "FR", "SA");
	
	return $weekarray[$weekdaynum];

}








/***************** Filter Array Received from Forms *********************/
function filterarray($_passedVals) {

	if(!get_magic_quotes_gpc()) {
	
			while (list($i, $v) = each($_passedVals)) {
		
				$_Vals[$i] =  htmlspecialchars(addslashes($v));
	
			}
	
	} else {
		
			while (list($i, $v) = each($_passedVals)) {
		
				$_Vals[$i] =  $v;
		
			}
	}
	
	return $_Vals;

}






/***************** Filter Value Received from Forms *********************/
function filter($_passedVal) {
	
	if(is_array($_passedVal)) {
		
		$_Val = array();

		while (list($ind, $val) = each($_passedVal)) {

			if(!get_magic_quotes_gpc()) {
	
				$_Val[$ind] =  htmlspecialchars(addslashes($val));
		
			} else {
		
					$_Val[$ind] =  $val;

			}

		}


	} else {
		
			if(!get_magic_quotes_gpc()) {
	
				$_Val =  htmlspecialchars(addslashes($_passedVal));
		
			} else {
		
				$_Val =  $_passedVal;

			}
	}

	
	return $_Val;

}






/************************ Make Hypertext Links Clickable *********************/
function make_clickable($txt) {
 	
	return $txt;
	
	/*
 	$txt = nl2br($txt);
 	
    $txt = preg_replace('#([^\w=+;%?/]|^)(\w+[\w.-]*\w+@\w+[\w.-]*\w+\.[a-z]{2,6})#i', '$1<a href="mailto:$2" class="basiclink">$2</a>', $txt); 

    $txt = preg_replace('#([^\w/@]|^)((?:www\.[\w-]+\.[\w-]+?\S*?)|(?:[a-z]{3,6}://\S+?))(?=[^a-z0-9/]*?(?:[\s<\][]|(?:&(?:quot|lt|gt);)|$))#ei', 
        'create_link(\'$1\', \'$2\')', $txt); 

    return $txt;


	*/

} 




/************* function that make_clickable()'s preg_replace() calls *****************/
function create_link($pre, $url) {
	
	// Fix backslash escaped double quotes... 
    $pre = str_replace('\"', '"', $pre); 
    $url = str_replace('\"', '"', $url); 
    $suf = ''; 

    if (substr($url, -4) == '&amp') 
    { 
        $suf = '&amp'; 
        $url = substr($url, 0, -4); 
    } 

    return "$pre<a href=\"" . add_http($url) . "\" class=\"basiclink\" target=\"_blank\">$url</a>$suf"; 
	

} 




/**************** Add http:// to the beginning of the address ************/ 
function add_http($url) 
{ 
    if (!preg_match('#^[a-z]{3,6}://#i', $url)) { return "http://$url"; } 

    return $url; 
    
} 




/*************** Check and verify email address ************************/
function checkmail($email) {

	if(!$email) { 
		
			return 0;
	
	} else {
	
		if(!ereg("^[^@ ]+@[^@ ]+\.[^@ \.]+$", $email, $trashed)) return 0;
	
	} 
	
	return 1;

}	


/******************* Get Month Name ***************************************/
function getmonthname($num) {

	global $_MONTH_NAME;

	$montharray = $_MONTH_NAME;
	
	return $montharray[$num];



}



/****************************** Append Zero to numbers ***********************/
function appendzero($num) {

	if($num < 10) $num = "0" . $num;
	
	return $num;

}

/****************************** Append Suffix to numbers ***********************/
function num_suffix($num) {
	
	global $_CONF;

	if(!$_CONF[allow_datesuffix]) return $num;
		
	$suff = "th";

	switch ($num) {

		case 1:

			$suff = "st";
			break;
		
		case 21:

			$suff = "st";
			break;

		case 31:

			$suff = "st";
			break;

		case 2:

			$suff = "nd";
			break;
		
		case 22:

			$suff = "nd";
			break;

		case 3:

			$suff = "rd";
			break;

		case 23:

			$suff = "rd";
			break;
		
	}

	return $num . $suff;



}



/****************************** Get Occurence Details ***********************/
function getoccurence($eventdata, $inline=null) {
		
		global $_CONF, $_DATE_TRANS;
			
		extract($eventdata);
				
		$monthname = getmonthname($monthnum);
		$weekname = weekdaypointer($weekday);

		$start_date = explode("-", $start_date);
		$stop_date = explode("-", $stop_date);
		
		
		$start_year = $start_date[0];
		$start_month = $start_date[1];
		$start_day = $start_date[2];

		$stop_year = $stop_date[0];
		$stop_month = $stop_date[1];
		$stop_day = $stop_date[2];
		
		
		switch($event_type) {
	
		case 1:
			break;
		
		case 2:
			$display = strtr("Every Day", $_DATE_TRANS);
			break;

		case 3:
			$display = strtr("Tue,Thu", $_DATE_TRANS);
			break;

		case 4:
			$display = strtr("Mon,Wed,Fri", $_DATE_TRANS);
			break;

		case 5:
			$display = strtr("Weekdays", $_DATE_TRANS);
			break;

		case 6:
			$display = strtr("Weekends", $_DATE_TRANS);
			break;

		case 7:
			$display = strtr("Every $weekname", $_DATE_TRANS);
			break;

		case 8:
			$display = strtr(num_suffix($day) . " of Every Month", $_DATE_TRANS);
			break;

		case 9:
			$display = strtr("$monthname $day, Every Year", $_DATE_TRANS);
			break;
		
		case 10:
			$display = strtr(num_suffix($weeknum) . " $weekname of Every Month", $_DATE_TRANS);
			break;

		case 11:
			$display = strtr(num_suffix($weeknum) . " $weekname, $monthname  of Every Year", $_DATE_TRANS);
			break;
		
		
	}


	if(!$inline) {
	
		$display .= "<br />";
	
	} else if(isset($display)) {
	
		$display .= ", ";

	}
	


	if($start_day != "00") {

		$display .= date($_CONF[me_date_format], mktime(0, 0, 0, $start_month, $start_day, $start_year));
	
		if($event_type > 1) $display .= " to " . date($_CONF[me_date_format], mktime(0, 0, 0, $stop_month, $stop_day, $stop_year));
	
	}


	return strtr($display, $_DATE_TRANS);


}




/******** Arrange Time in Chronological Error ***************/
function arrange_events($eventset) {
	
	global $_CONF;

	$count = count($eventset);
		
	do {
		
		$swap = 0;

		for ($i=0; $i<$count; $i++) {
		
			$pointer = $i + 1;
			$event_one = $eventset[$i];
			$event_two = $eventset[$pointer];

			if($event_one[start_time] == NULL) {

				if($_CONF[event_sort] == 1) {
					
					$up = $i - 1;
					
					if($up >= 0) {

						$event_top = $eventset[$up];

						if($event_top[start_time] != NULL) {
						
							$temp = $eventset[$up];
							$eventset[$up] = $eventset[$i];
							$eventset[$i] = $temp;

							$swap++;
						
						}
						

					}
					
				
				} elseif($event_two[start_time] != NULL) {

					$temp = $event_one;
					$eventset[$i] = $event_two;
					$eventset[$pointer] = $temp;
					$swap++;
				
				}

				

			} else {
				

				
				if($event_two[start_time] != NULL) {
				
				
					
				$start_time_one = explode(":", $event_one[start_time]);
				$start_time_two = explode(":", $event_two[start_time]);

				$start_date_one = explode("-", $event_one[start_date]);
				
			
				$time_one = mktime ( $start_time_one[0], $start_time_one[1], 0, $start_date_one[1], $start_date_one[2], $start_date_one[0]);
				$time_two = mktime ( $start_time_two[0], $start_time_one[1], 0, $start_date_one[1], $start_date_one[2], $start_date_one[0]);
				

					if( $time_one > $time_two) {

						$temp = $event_one;
						$eventset[$i] = $event_two;
						$eventset[$pointer] = $temp;

						$swap++;

					}
				
				} elseif($_CONF[event_sort] == 1) {

						$temp = $event_one;
						$eventset[$i] = $event_two;
						$eventset[$pointer] = $temp;

						$swap++;

				

				}


			}
				
		}	
		
		
	} while ($swap != 0 ); 

	
	return $eventset;


}






/***************** Generate Password ************************/
function generatepass() {
	
	$pass = md5(uniqid(rand(), 1));

	return substr($pass, 0, 8);

}



/******************* Get list of style packs available ***************/
function listpacks() {

	$dir = "../templates";

	$handle = opendir($dir);

	while (($directory = readdir($handle)) !== false) {
           
			if($directory != "." && $directory != "..") $packs[] = $directory;

       }

      closedir($handle);
	
	return $packs;

}




function RTESafe($strText) {

	//returns safe code for preloading in the RTE
	$tmpString = trim($strText);
	
	//convert all types of single quotes
	$tmpString = str_replace(chr(145), chr(39), $tmpString);
	$tmpString = str_replace(chr(146), chr(39), $tmpString);
	$tmpString = str_replace("'", "&#39;", $tmpString);
	
	//convert all types of double quotes
	$tmpString = str_replace(chr(147), chr(34), $tmpString);
	$tmpString = str_replace(chr(148), chr(34), $tmpString);
//	$tmpString = str_replace("\"", "\"", $tmpString);
	
	//replace carriage returns & line feeds
	$tmpString = str_replace(chr(10), " ", $tmpString);
	$tmpString = str_replace(chr(13), " ", $tmpString);
	
	return $tmpString;

}


?>