<?php
	
/***********************************************************************
Get Calendar Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class GetCalendar {
	
	var $resultset;

	/********************* Get Calendar Details ************************/
	function getDetails( $cid = null, $catid = null ) {
		
		global $_CONF;
			
		$calendar = $_CONF[calendar_table];
		$category = $_CONF[category_table];
		
		$query = "SELECT * FROM $calendar, $category";
		
		if($cid) { 
		
			$query .= " WHERE $calendar.calendar_id = $cid";
		    $query .= " AND $calendar.cat_id = $category.cat_id";
				
		} elseif($catid) {
			
			$query .= " WHERE $calendar.cat_id = $catid";
			$query .= " AND $calendar.cat_id = $category.cat_id";
		}
		
		if(!$catid && !$cid) $query .= " WHERE $calendar.cat_id = $category.cat_id";
		
		//echo $query;

		return $query;
				
	}
	
	
		
	
	
	/************************* List Calendars **********************/
	function getList($catid = null, $p = null, $orderby = null, $order = null) {
		
		global $DB, $Result, $Page, $_CONF;
					
		$query = $this->getDetails(0,$catid);
		
		if(!$orderby) {
		
			$orderby = "calendar_name";
			$order= "ASC";

		}
			
		$query .= " ORDER BY " . $orderby . " $order";

		//echo $query;
		
		$this->resultset = $DB->Query($query);
		
		if($p) {
		
			$Page->setResult($this->resultset, $_CONF['pagesize']);
			$Page->setPageNum($p);
			
				
		}

		return $this->resultset;
		
	
	}
		
		
	
	/*************** Get Single Calendar Details *******************/
	function getSingle($cid) {
		
		global $DB, $Result;
		
		$query = $this->getDetails($cid);
							
		return $Result->getArray($DB->Query($query));
	
	}




	/*************** Get total number of Calendars *****************/

	function getTotal() {
		
		global $Result;
		
		if(!$this->resultset) $this->getList();

		return $Result->numRows($this->resultset);
				
	}



}