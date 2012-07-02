<?php
	
/***********************************************************************
Get Subscription Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class GetSubscription {
	
	
	
	/************** Get Single user subscription details ************************/
	function Subscribed($uid, $cid=null, $catid=null, $calresult) {
	
		global $DB, $Result, $_CONF;
		
		$s = $_CONF['subscr_table'];
				
		$query = "SELECT * FROM $s WHERE user_id = $uid AND "; 
		
		if($cid) { 
			
			$query .= "calendar_id = $cid";
			
		
		} else {
			
			$query .= "cat_id = $catid";
		
		}

		$data = $DB->Query($query);

		if($Result->numRows($data) && ($cid)) {
		
			return 1;

		} elseif($Result->numRows($data) == $Result->numRows($calresult)) {
		
			return 1;

		} else {

			return 0;

		}
		

	}




	/************** Get List of Calendar Subscriptions ************************/
	function getList($uid=null, $cid = null, $catid=null, $p=null, $orderby=null, $order=null ) {
	
		global $DB, $_CONF, $Page;
		
		$s = $_CONF['subscr_table'];
		$c = $_CONF['calendar_table']; 
		$u = $_CONF['user_table'];
		
		$query = "SELECT * FROM $s, $c, $u";
		
		if($uid) $query .= " WHERE $s.user_id = $uid AND";

		if($cid) $query .= " WHERE $s.calendar_id = $cid AND";

		if($catid) $query .= " WHERE $s.cat_id = $catid AND";
		
		if(!$catid && !$cid) $query .= " WHERE";

		$query .= " $c.calendar_id = $s.calendar_id";
		$query .= " AND $u.user_id = $s.user_id";

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

}