<?php
	
/***********************************************************************
Get Email Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class GetMail {
	
	var $resultset;
	
	
	/******************* Get Location Details ***********************/
	function getDetails($mid=null) {
	
		global $DB, $_CONF;
		
		$email = $_CONF['email_table'];
		
				
		$query = "SELECT * FROM $email";
		
		if($mid) $query .= " WHERE message_id = $mid";
		

		return $query;
		
	}	
	
	
	
	
	/****************** Get Location List **************************/
	function getList($p=null, $orderby=null, $order=null, $mid=null) {
		
		global $DB, $Result, $Page, $_CONF;
					
		$query = $this->getDetails($mid);
		
		if(!$orderby) {
		
			$orderby = "message_id";
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