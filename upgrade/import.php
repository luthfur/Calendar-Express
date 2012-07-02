<?php

// Get Administrators
$query = "SELECT * FROM $_CONF[admin_tablename]";
$result = $DB->Query($query);



while($data = $Result->getArray($result)) {

	$admin[] = $data[user_id];

}

// Import Administrators and Users
$query = "SELECT * FROM $_CONF[user_tablename]";

$result = $DB->Query($query);

while($data = $Result->getArray($result)) {

	extract($data);

	$status = 3;

	while (list($ind, $val) = each($admin)) {
		
		if($user_id == $val) {
			
			$user_id = $user_id + 1;

			$query = "INSERT INTO $admin_table VALUES( NULL, $user_id,1, 1, 1)";
			$DB->Query($query);			
			$status = 2;

		}
	}
	
	if($status != 2) $user_id = $user_id + 1;

	$query = "INSERT INTO $user_table VALUES( $user_id, '$user_name', '$password', '$date_set', $status, '$full_name', '$telephone', '$email', 1)";
		
	$DB->Query($query);	

}




// Import Locations
$query = "SELECT * FROM $_CONF[location_tablename]";
$result = $DB->Query($query);

while($data = $Result->getArray($result)) {
	
	extract($data);

	$user_id = $user_id + 1;

	$query = "INSERT INTO $location_table VALUES( $location_id, $user_id, '" . addslashes($location_title) . "', '$address_1', '$address_2', '$city', '$state', '$zip', '" . addslashes($location_desc) . "')";
	
	

	$DB->Query($query);

}



// Import Privileges
$query = "SELECT * FROM $_CONF[privileges_tablename]";
$result = $DB->Query($query);

while($data = $Result->getArray($result)) {
	
	extract($data);

	$user_id = $user_id + 1;

	$query = "INSERT INTO $userpriv_table VALUES( $user_id, $calendar_id)";

	$DB->Query($query);


}




// Import Calendars
$query = "SELECT * FROM $_CONF[calendar_tablename]";
$result = $DB->Query($query);


while($data = $Result->getArray($result)) {

	extract($data);
	$query = "INSERT INTO $calendar_table VALUES( $calendar_id, 1, '$calendar_name',  '$calendar_image', '$calendar_icon')";
	
	
	$DB->Query($query);

}



header("Location: complete.php")

?>