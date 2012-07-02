<?php

$output = "

Hi $rec_name,

$sender_name has recommended the event \"$event_title\" to you.

Following are the event details:

-------------------Event Details Below--------------------------
Event Title: $event_title
Date: $date
Occurence: $occ
Posted By: $user_name
Contact: $contact_name
Contact Email: $contact_email
Contact Telephone: $contact_phone
Location: $location_title
Description: $event_desc

$message

$_CONF[email_sig]


 "; ?>


