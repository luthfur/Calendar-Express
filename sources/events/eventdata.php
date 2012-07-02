<?php
	
/***********************************************************************
Event Data Pull Out Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class EventData {

	
		
	/********************  Event Details **************************/
	function getDetails( $id = null, $typeid = null, $cid = null, $uid = null, $unapp=null ) {
		
		global $DB, $Result, $_CONF;
		
		$event = $_CONF['event_table'];
		$occurence = $_CONF['occurence_table'];
		$calendar = $_CONF['calendar_table'];
		$location = $_CONF['location_table'];
		$user = $_CONF['user_table'];
		$contact = $_CONF['contact_table'];
				
		$query = "SELECT * FROM $event, $calendar, $occurence, $user, $location, $contact WHERE $event.type_id = $occurence.type_id AND $calendar.calendar_id = $event.calendar_id AND $user.user_id = $event.user_id AND $location.location_id = $event.location_id AND $contact.contact_id = $event.contact_id";
		
		if($id) {
			
			$query .= " AND $event.event_id = $id";
			
		} 
		
		if($typeid) {
		
			$query .= " AND $occurence.event_type = $typeid";
			
		} 

		if($cid) {
		
			$query .= " AND $event.calendar_id = $cid";
		
		}  

		if($uid) {
		
			$query .= " AND $user.user_id = $uid";
		
		} 

		
		return $query;
		
			
	}
	
	
	
	
	
	/********************  Event Listing **************************/
	function getList($p=null, $orderby=null, $order=null, $tid=null, $cid=null, $uid=null) {
		
		global $DB, $Result, $Page, $_CONF;
					
		$query = $this->getDetails(0,$tid,$cid,$uid);
		
		if(!$orderby) {
		
			$orderby = "event_id";
			$order= "DESC";

		}
			
		$query .= " ORDER BY " . $orderby . " $order";
		
		$resultset = $DB->Query($query);
		
		if($p) {
		
			$Page->setResult($resultset, $_CONF['pagesize']);
			$Page->setPageNum($p);
			
				
		}

		return $resultset;
	
	
	}




	
	/********************  Get Last 10 Events Posted **************************/
	function userPost($orderby=null, $order=null, $limit=null, $uid=null) {
		
		global $DB, $Result, $Page, $_CONF;
					
		$query = $this->getDetails(0,0,0,$uid);
		
		if(!$orderby) {
			
			$orderby = "event_id";
			$order = "DESC";

		}
			
		$query .= " ORDER BY " . $orderby . " $order";

		if($limit) $query .= " LIMIT 0, $limit";
		
		$resultset = $DB->Query($query);
		

		return $resultset;
	
	
	}
	

	
	
	
	/*************** Get total number of Events *****************/

	function getTotal($cid=null, $uid=null) {
		
		global $DB, $Result, $_CONF;

		$query = "SELECT COUNT(*) FROM $_CONF[event_table]";
		
		if($uid) $query .= " WHERE user_id = $uid";

		if($cid) $query .= " WHERE calendar_id = $cid";
		
		$data = $Result->getRow($DB->Query($query));

		return $data[0];
				
	}
	
	
	
	
	/*************** Get Single Event Details *******************/
	function getSingle($id) {
		
		global $DB, $Result;
		
		$query = $this->getDetails($id);
		
		return $Result->getArray($DB->Query($query));
	
	}
		
	
	
	
	/********************  Event Exists **************************/
	function getExtPosts($p=null, $orderby=null, $order=null) {
	
		global $DB, $Page, $_CONF;
		
		$event = $_CONF['event_table'];
		$occurence = $_CONF['occurence_table'];
		$calendar = $_CONF['calendar_table'];
		
		$query = "SELECT * FROM $event, $calendar, $occurence WHERE $event.approved = 0 AND $calendar.calendar_id = $event.calendar_id AND $event.type_id = $occurence.type_id";
		
		if(!$orderby) {
		
			$orderby = "event_id";
			$order= "DESC";

		}
			
		$query .= " ORDER BY " . $orderby . " $order";
		
		$resultset = $DB->Query($query);
		
		$Page->setResult($resultset, $_CONF['pagesize']);
		$Page->setPageNum($p);

		return $resultset;
			
		
	}
	
	
	
	
	
	
}
	
	