<?php
	

/***********************************************************************
Week Generator Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class WeekConv {
	
	// declare  all necessary variables
		
		var $startweek;				// start week as specified in the settings
		var $week_array;
		var $curweekday;
	
	
	
/********************* Class Constructor ***************************/
	function WeekConv($sweek) {
		
		// get todays date
		$today = time();
		$today = getdate($today);
		$this->curweekday = $today["wday"];
		
		$this->startweek = $sweek;
		
		$this->mapWeek();
				
	}
	
	
	
	

/******************* Map Display Week onto Real Week **********************/
	function mapWeek() {
						
		
		$week_array[0] = $this->startweek;
		
		$count = $this->startweek;

		for ($i=1; $i<=6; $i++) {
		
			if($count == 6) {
				
					$count = 0; 

			} else {

					$count++;

			}
			
			$week_array[$i] = $count;

		}

		$this->week_array = $week_array;
		

		//print_r($this->week_array);

	}	
	
	
	
	
	
/******************** Converty Display Week to Real Week *********************************/
	function dispWeek($weeknum) {

		return array_search($weeknum, $this->week_array);
		
	}
	
	
	
	

/******************** Converty Real Week to Display Week *********************************/
	function dataWeek($weeknum=null) {
		
		if(isset($weeknum)) {
					
			return $this->week_array[$weeknum];
				
		} else {
			
			return $this->curweekday;			

		}

	}



/******************* Get Week Map ****************************************/
function getMap() {
		
		return $this->week_array;
		

	}



}
	
?>