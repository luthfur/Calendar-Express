<?php
	
/***********************************************************************
Get Location Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class GetContact {
	
	var $resultset;
	
	
	/******************* Get Location Details ***********************/
	function getDetails($con_id=null, $uid=null) {
	
		global $DB, $_CONF;
		
		$c = $_CONF['contact_table'];
		
				
		$query = "SELECT * FROM $c";
		
		if($con_id) $query .= " WHERE contact_id = $con_id";
		
		if($uid) $query .= " WHERE user_id = $uid";
		
		return $query;
		
	}	
	
	
	
	
	/****************** Get Location List **************************/
	function getList($p, $orderby=null, $order=null, $uid=null) {
		
		global $DB, $Result, $Page, $_CONF;
					
		$query = $this->getDetails(0,$uid);
		
		if(!$orderby) {
		
			$orderby = "contact_id";
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
	
	
	
	
	/*************** Get Single Location details *******************/
	function getSingle($lid) {
				
		global $DB, $Result;
		
		$query = $this->getDetails($lid);
				
		return $Result->getArray($DB->Query($query));
		
	}
	
	
	
	
	
	/***************** Get Total Locations ************************/
	function getTotal($resultset) {
		
		global $Result;
		
		return $Result->numRows($resultset);
	
	}
	
}