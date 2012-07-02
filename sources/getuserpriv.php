<?php
	
/***********************************************************************
Get User Privilege Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class GetUserPriv {
	
	
	/************** Get User Privileges ************************/
	function getPrivs($uid=null, $cid=null) {
	
		global $DB, $_CONF;
		
		$p = $_CONF['userpriv_table'];
		$c = $_CONF['calendar_table'];
		$u = $_CONF['user_table'];
				
		$query = "SELECT * FROM $p, $c, $u";
		
		if($uid) $query .= " WHERE $p.user_id = $uid";
		
		if($cid) $query .= " WHERE $p.calendar_id = $cid";

		if(!$uid && !$cid) 
			$query .= " WHERE ";
		else
			$query .= " AND ";

		$query .= "$p.user_id = $u.user_id AND $p.calendar_id = $c.calendar_id";
		
		return $query;
	
	}	




	/****************** Get User List **************************/
	function getList($p=null, $orderby=null, $order=null, $cid=null, $uid=null) {
		
		global $DB, $Result, $Page, $_CONF;
					
		$query = $this->getPrivs($uid,$cid);
		
		if(!$orderby) {
		
			$orderby = "calendar_name";
			$order= "ASC";

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
		
		$query = $this->getPrivs($uid);
		
		return $Result->getArray($DB->Query($query));
		
	}
	
	
	
	
	
	/***************** Get Total User ************************/
	function getTotal() {
		
		global $Result;
		
		if(!$this->resultset) $this->getList();

		return $Result->numRows($this->resultset);
	
	}


	/***************** Check Whether Privileges exist ************************/
	function Exist($cid, $uid) {
		
		global $DB, $Result, $_CONF;
		
		$p = $_CONF['userpriv_table'];

		$query = "SELECT * FROM $p WHERE calendar_id = $cid AND user_id = $uid";
		
		if($Result->numRows($DB->Query($query))) {
			return 1;
		}
		
		return 0;

	}
		


}