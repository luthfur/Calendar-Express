<?php
	
/***********************************************************************
Get Admin Class (a Sub Class of Get User)

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class GetAdmin {
	
	var $resultset;
	
	
	/******************* Get Adminstrator Details ***********************/
	function getDetails($username=null) {
	
		global $DB, $_CONF;
		
		$user = $_CONF['user_table'];
							
		$query = "SELECT * FROM $user WHERE";
						
		if($user_name) $query .= " $user.user_name = '$user_name' AND";
		
		$query .= " ($user.status=1 OR $user.status=2)";	
		
		return $query;
		
	}	
	
	
	
	
	/****************** Get Adminstrator List **************************/
	function getList($p=null, $orderby=null, $order=null) {
		
		global $DB, $Result, $Page, $_CONF;
					
		$query = $this->getDetails();
		
		if(!$orderby) {
		
			$orderby = "user_id";
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
	
	
	
	
	
	/***************** Get Total Adminstrator ************************/
	function getTotal() {
		
		global $Result;
		
		if(!$this->resultset) $this->getList();

		return $Result->numRows($this->resultset);
	
	}
	
	
	
	
	/***************** Check whether Adminstrator exists ************************/	
	function Exists($user_name) {
	
		global $DB, $Result, $_CONF;
		
		$query = $this->getDetails(0,$user_name);
		
		if($Result->numRows($DB->Query($query))) return 1;
		
	}
	
	
	
}