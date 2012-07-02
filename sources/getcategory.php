<?php

/***********************************************************************
Get Category Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/



class GetCategory {

	var $resultset;



	/********************* Get Category Details ************************/
	function getDetails( $catid = null, $cat_name = null ) {
		
		global $_CONF;
				
		$category = $_CONF['category_table'];
		
		$query = "SELECT * FROM $category";
		
		
		if($catid) {
			
			$query .= " WHERE cat_id = $catid";	
			
		} elseif($name) {
		
			$query .= " WHERE $cat_name = '$name'";	
		
		}
		
		return $query;
				
	}
	
	
		
	
	
	/************************* List Category **********************/
	function getList($p = null, $orderby = null, $order = null) {
		
		global $DB, $Result, $Page, $_CONF;
					
		$query = $this->getDetails();
		
		if(!$orderby) {
		
			$orderby = "cat_name";
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
		
		
	
	/*************** Get Single Category Details *******************/
	function getSingle($cid) {
		
		global $DB, $Result;
		
		$query = $this->getDetails($cid);
							
		return $Result->getArray($DB->Query($query));
	
	}




	/*************** Get total number of Category *****************/

	function getTotal() {
		
		global $Result;
		
		if(!$this->resultset) $this->getList();

		return $Result->numRows($this->resultset);
				
	}
	
			
		
}