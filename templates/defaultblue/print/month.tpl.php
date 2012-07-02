<center>
<table border="1" cellpadding="4" cellspacing="0" class="table" width="100%">
		<tr>


			<td class="theader">
				<center>
					Month of <?php echo "$monthname ($year)" ?>
				</center>
			</td>
		

		</tr>
	
	<table>

	<table border="0" cellpadding="4" cellspacing="0" width="100%">
		<tr>
			<td height="5">
				
			</td>
		</tr>
	
	<table>

	<table cellspacing="0" cellpadding="0" class="table" width="100%">
	
	<?php while(list($ind, $val) = each($weekmap)) {	?>
	
		<td colspan="1" class="eventheader" height="30" align="center" width="106"><font class="littletext"><b><?php echo $_WEEK_NAME[$val] ?></b></font></td>

	<?php } ?>


	</tr>
		
		
	<?php 
				
	 for($i=1; $i<=5; $i++) { 
			
		 $the_array = $month_array[$i]; 
		 $eventarray = $eventset[$i];
		
		 
	?>	
			
		<tr>
		
		<?php 
			
			for ($j=0; $j<=6; $j++) { 
			
				if(!$the_array[$j]) { 
			?>
					<td colspan="1" class="monthemptycell" valign="top">
				
					
				<?php } elseif($the_array[$j] == $curday && $month == $curmonth && $year == $curyear) { ?>
			
					<td colspan="1" class="monthtodaycell"  valign="top">
									
				<?php  } elseif($exists[$j]) { ?>
					
					<td colspan="1" class="montheventcell" valign="top">
				
				<?php  } else { ?>			
			
					<td colspan="1" class="monthdatecell" valign="top">
					
				<?php } ?>
							
						<font class="midtext">
						
				<?php 

				// display space if no date exists
				if($the_array[$j]) { 
					
					
					 echo $the_array[$j];

					 $eventlist = $eventarray[$j];



					 for ($h=0; $h<=count($eventlist); $h++) {
										
					if($eventdata = $eventlist[$h]) {

						//print_r($eventdata);
			?>
			
			<?php if ($h > 0) { ?>

				<hr width="100%" align="center" />

				<?php } ?>
			
			<table border="0" cellpadding="0" cellspacing="8" width="100%" valign="top">
			<tr>
									
				
				<td height="15" width="100%" valign="top">

					<?php if(($eventdata['start_time']!= NULL ) && $_CONF['show_time']) { ?> 
					
						<font class="littletext"><?php echo displaytime($eventdata['start_time']) . "<br />to " .  displaytime($eventdata['stop_time']) ?></font><br /> 
					  
					<?php } ?>
					
					<font class="littletext"><b><?php echo $eventdata['event_title'] ?></b></font>
			
				</td>
			</tr>
					
			</table>
						
			
			
			<?php	
					}
				
				}
					
					

			 	} else { ?>
				
					<br /><br />
					
				
				<?php } ?>
				
				</a>
				</td>
					
			<?php } // end weekday iteration ?>
			
			</tr>
			
		<?php }  // end week iteration ?>

		
		<?php 
		
		if ($month_array[6][0]) { 
			$the_array = $month_array[6]; 
			$eventarray = $eventset[6];
		?>
			
			<tr>
			
			
			
			<?php 
			
			//loop through and display the dates 
			for ($i=0; $i<=6; $i++) {
				
				
				// check if date exists
				if(!$the_array[$i]) {
			?>
				
					<td colspan="1" class="monthemptycell" valign="top">
								
			<?php 
				// highlight today's date
				} elseif($the_array[$i] == $curday && $month == $curmonth && $year == $curyear) {
			?>
				<td colspan="1" class="monthtodaycell" onMouseOver="this.style.backgroundColor=on; " onMouseOut="this.style.backgroundColor=todayoff; " valign="top">
					
			<?php 	
				// Highlight date with events
				} elseif($exists[$i]) {
			?>
					<td colspan="1" class="montheventcell" onMouseOver="this.style.backgroundColor=on; " onMouseOut="this.style.backgroundColor=eventoff;" valign="top">
			
			<?php } else { ?>
				
					<td colspan="1" class="monthdatecell" onMouseOver="this.style.backgroundColor=on; " onMouseOut="this.style.backgroundColor=dateoff;" valign="top">
					
			<?php } ?>
			
			<?php
		

			// display space if no date exists
				if($the_array[$i]) {
					
					echo $the_array[$i];
						
					 $eventlist = $eventarray[$i];



							 for ($h=0; $h<=count($eventlist); $h++) {
										
					if($eventdata = $eventlist[$h]) {

						//print_r($eventdata);
			?>
			
			<?php if ($h > 0) { ?>

				<hr width="100%" align="center" />

				<?php } ?>

			<table border="0" cellpadding="0" cellspacing="8" width="100%" valign="top">
			<tr>
								
				<td height="15" width="100%" valign="top">

					

					<?php if(($eventdata['start_time']!= NULL ) && $_CONF['show_time']) { ?> 
					
						<font class="littletext"><?php echo displaytime($eventdata['start_time']) . "<br />to " .  displaytime($eventdata['stop_time']) ?></font><br />
					  
					<?php } ?>
					
					<font class="midtext"><b><?php echo $eventdata['event_title'] ?></b></font>
					
					
				</td>
			</tr>
					
			</table>
						
			
			
			<?php	
					
					}
				
				}
					
						



				} else {
			?>
					
					<br /><br />
				
			
			<?php	} ?>
				
				</a>
							
				</td>
			
		<?php 	}	// for ends ?>
			
			</tr>
		
	<?php }  // end the if ?>
			
	</table>
	<br />
<!-----------------------------Main Calendar Ends----------------------------------->




	
