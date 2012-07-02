<?php


/**********************************Array Iterator Class**************************************/

class ArrayIterator {
	
	var $rows;     //array containing rows
		
	
	
	/************************** Set Row ***********************************/
	function setrow($rows) {
		 $this->rows = $rows;
	}
	
	
	
	/************************** Get Row ***********************************/
	function getrow() {
		
		if (isset($this->rows)) {	
			
			if($the_array = current($this->rows)) {
				
				$this->nextrow();
				return $the_array;
				
		 	} else {
		 		
		 		 return 0;
			}
			
		} else {
			return 0;
		}
		 
	}
	
	
	
	/********************** Go to Next Row *********************************/
	function nextrow() { 
		next($this->rows);
	}
	
	
	
	/********************** Go to Previous Row ******************************/
	function prevrow() { 
		prev($this->rows);
	}
	
	
	
	/************************ Go to First Row *******************************/
	function firstrow() {
		reset($this->rows);
	}
	
	
	
	/************************* Go to Last Row ******************************/
	function lastrow() {
		end($this->rows);
	}
	
	/************************* Go to Last Row ******************************/
	function numrows() {
		return count($this->rows);
	}
	
	/************************* Go to Last Row ******************************/
	function currentkey() {
		return key($this->rows);
	}
		
	
}
?>