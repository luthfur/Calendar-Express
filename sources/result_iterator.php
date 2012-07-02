<?php
	
/******************** Row Iteration Class **********************************/

class Result {

	var $resultset;
	
	
	/**************** Set Resultset ************************/
	function setResult($result) {
		
		$this->resultset = $result;
	
	}
		


	/**************** Free Resultset ************************/
	function freeResult($result = null) {
		
		if(!$result) {
			$result = $this->resultset;
			$this->resultset = null;
		}
				
		mysql_free_result($result);
	
	}
	
	
	
	
	/**************** Set internal Result Pointer ******************/
	function setPointer($row_number, $result = null) {
		
		if(!$result) {
			$result = $this->resultset;
		}
		
		mysql_data_seek($result, $row_number);
		
	}
		
	
	
	
	/*************** Fetch Result as Rows ********************/
	function getRow($result = null) {
		
		if(!$result) {
	 		$result = $this->resultset;
	 	}
	  	return mysql_fetch_row($result);
		
	}
	
	
	
	/*************** Fetch Result as Arrays ********************/
	function getArray($result = null) {
		
		if(!$result) {
	 		$result = $this->resultset;
	 	}
	 	
	  	return mysql_fetch_array($result);
	  	
	}
		
	
	
	/*************** Fetch number of Rows in Resultset ********************/
	function numRows($result = null) {
	
		if(!isset($result)) {
			
	 		$result = $this->resultset;
	 	}
	 	
	 	return mysql_num_rows($result);
		
	}
	
	
	

}

	