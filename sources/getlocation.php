<?php
	
/***********************************************************************
Get Location Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class GetLocation {
	
	var $resultset;
	
	
	/******************* Get Location Details ***********************/
	function getDetails($lid=null, $uid=null) {
	
		global $DB, $_CONF;
		
		$location = $_CONF['location_table'];
		
				
		$query = "SELECT * FROM $location";
		
		if($lid) $query .= " WHERE location_id = $lid";
		
		if($uid) $query .= " WHERE user_id = $uid";
		
		return $query;
		
	}	
	
	
	
	
	/****************** Get Location List **************************/
	function getList($p=null, $orderby=null, $order=null, $uid=null) {
		
		global $DB, $Result, $Page, $_CONF;
					
		$query = $this->getDetails(0,$uid);
		
		if(!$orderby) {
		
			$orderby = "location_id";
			$order= "DESC";

		}
			
		$query .= " ORDER BY " . $orderby . " $order";
		
		$this->resultset = $DB->Query($query);
		
		if($p) {
		
			$Page->setResult($this->resultset, $_CONF['pagesize']);
			$Page->setPageNum($p);
			
				
		}

		return $this->resultset;
	
	
	}
	
	
	
	
	/*************** Get Single Location details *******************/
	function getSingle($lid) {
				
		global $DB, $Result;
		
		$query = $this->getDetails($lid);
				
		return $Result->getArray($DB->Query($query));
		
	}
	
	
	
	
	
	/***************** Get Total Locations ************************/
	function getTotal() {
		
		global $Result;
		
		if(!$this->resultset) $this->getList();

		return $Result->numRows($this->resultset);
				
	
	}
	
}