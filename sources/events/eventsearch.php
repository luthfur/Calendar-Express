<?php
	
/***********************************************************************
Event Search Pull Out Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class EventSearch {

	
		
	/********************  Event Details **************************/
	function getDetails( $keywords, $title=null, $desc=null, $type=null, $cid=null, $catid=null, $p=null ) {
		
		global $DB, $Result, $_CONF;
		
		$keywords = addslashes($keywords);

		$event = $_CONF['event_table'];
		$occurence = $_CONF['occurence_table'];
		$calendar = $_CONF['calendar_table'];
		$location = $_CONF['location_table'];
		$category = $_CONF['category_table'];
		$user = $_CONF['user_table'];
		
		$keywords_array = explode("+", $keywords);
				
		$query = "SELECT * FROM $event, $category, $calendar, $occurence, $user, $location WHERE $event.type_id = $occurence.type_id AND $calendar.cat_id = $category.cat_id AND $calendar.calendar_id = $event.calendar_id AND $user.user_id = $event.user_id AND $location.location_id = $event.location_id";
		

		if($title) {
		
			if($type) {
				
				$value = str_replace( "+", " ", $keywords );

				$title_query = "$event.event_title LIKE '%$value%'";
				
			
			} else {

				while(list($index, $value) = each($keywords_array)) {

					$title_str[$index] = "$event.event_title LIKE '%$value%'";

				}
			
				$title_query = implode(" OR ", $title_str);
			
			}


					
		}
		
		reset($keywords_array);

		if($desc) {
			
			if($type) {
				
				$value = str_replace( "+", " ", $keywords );

				$desc_query = "$event.event_desc LIKE '%$value%'";
				
			
			} else {

				while(list($index, $value) = each($keywords_array)) {

					$desc_str[$index] = "$event.event_desc LIKE '%$value%'";

				}
			
				$desc_query = implode(" OR ", $desc_str);
			
			}
			
		}

		
		$search_str = " AND ((";
		
		if($title_query) {
			
			$search_str .= " $title_query )";

		} else if($desc_query) {
			
			$search_str .= " $desc_query )";

		}

		if($title && $desc) {
		
			$search_str .= " OR ($desc_query)";

		}
		
		$search_str .= ")";

		
		$query .= $search_str;

		if($cid) {
			
			$query .= " AND $event.calendar_id = $cid";
			
		} elseif($catid) {
		
			$query .= " AND $category.cat_id = $catid";
			
		}

		//echo $query;
		

		return $query;
		
			
	}
	
	
	
	
	
	/********************  Event Listing **************************/
	function getList($keywords, $title=null, $desc=null, $type=null, $cid=null, $catid=null, $p=null, $order=null, $orderby=null) {
		
		global $DB, $Result, $Page, $_CONF;
					
		$query = $this->getDetails($keywords, $title, $desc, $type, $cid, $catid, $p);
		
	
		if($orderby) $query .= " ORDER BY " . $orderby . " $order";
	
		$resultset = $DB->Query($query);
		
		if($p) {
		
			$Page->setResult($resultset, $_CONF['pagesize']);
			$Page->setPageNum($p);
			
				
		}

		return $resultset;
	
	
	}

	
	
	
}
	
	