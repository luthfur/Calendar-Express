<?php
	
/***********************************************************************
Get User Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class GetUser {
	
	var $resultset;
	
	
	/******************* Get User Details ***********************/
	function getDetails($uid=null, $user_name=null, $unapp=null) {
	
		global $DB, $_CONF;
		
		$user = $_CONF['user_table'];
						
		$query = "SELECT * FROM $user WHERE";
		
		if($uid) $query .= " user_id = $uid";
		
		if($uid && $user_name) $query .=" AND ";

		if($user_name) $query .= " user_name = '$user_name'";
		
		if($unapp && ($uid || $user_name)) $query.= " AND ";

		return $query;
		
	}	
	
	
	
	
	/****************** Get User List **************************/
	function getList($p=null, $orderby=null, $order=null, $unapp=null) {
		
		global $DB, $Result, $Page, $_CONF;
					
		$query = $this->getDetails(0,0,$unapp);
		
		if($unapp) {
			
			$query .= " active=0";

		} else {
		
			$query .= " active=1";
		
		}

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
	
	
	
	
	/*************** Get Single User details *******************/
	function getSingle($uid) {
				
		global $DB, $Result;
		
		$query = $this->getDetails($uid);
		
		return $Result->getArray($DB->Query($query));
		
	}
	
	
	
	
	
	/***************** Get Total User ************************/
	function getTotal() {
		
		global $Result;
		
		if(!$this->resultset) $this->getList();

		return $Result->numRows($this->resultset);
	
	}
	
	
	
	
	/***************** Check whether user exists ************************/	
	function Exists($user_name) {
	
		global $DB, $Result, $_CONF;
		
		$query = $this->getDetails(0,$user_name);
		
		if($Result->numRows($DB->Query($query))) return 1;
		
	}


	
	
}