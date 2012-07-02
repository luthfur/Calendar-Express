<center>
<table border="1" cellpadding="4" cellspacing="0" class="table" width="766">
		<tr>


		<td class="theader" align="right" width="250">

		<?php if ($monthprev) { ?>
	
			<a href="<?php echo $_SERVER[PHP_SELF] . '?cid=' . $cid . '&catid=' . $catid . '&d=' . $day . '&w=' . $weeknum  . '&m=' . $monthprev . '&y=' . $year . '&s=' . $subcal ?>" class="arrow" title="Go the previous month">
				<img src="<?php echo $graphics_path ?>arrowleft.gif" align="center" border="0">
			</a>
	
		<?php } else { ?>
	
			<a href="<?php echo $_SERVER[PHP_SELF] . '?cid=' . $cid . '&catid=' . $catid . '&d=31' . '&w=' . $weeknum  . '&m=12' . '&y=' . $yearprev . '&s=' . $subcal ?>" class="arrow" title="Go the previous month">
				<img src="<?php echo $graphics_path ?>arrowleft.gif" align="center" border="0">
			</a>
	
		<?php } ?>
	
	</td>
			<td class="theader">
				<center>
					Month of <?php echo "$monthname ($year)" ?>
				</center>
			</td>

		<td class="theader" align="left" width="250">
	
		<?php if ($monthnext < 13) { ?>
	
		<a href="<?php echo $_SERVER[PHP_SELF] . '?cid=' . $cid . '&catid=' . $catid  . '&d=' . $day . '&w=' . $weeknum . '&m=' . $monthnext . '&y=' . $year . '&s=' . $subcal ?>" class="arrow" title="Go the next month">
			<img src="<?php echo $graphics_path ?>arrowright.gif" align="center" border="0">
		</a>

		<?php } else { ?>

			<a href="<?php echo $_SERVER[PHP_SELF] . '?cid=' . $cid . '&catid=' . $catid  . '&d=' . $day . '&w=' . $weeknum . '&m=1' . '&y=' . $yearnext . '&s=' . $subcal ?>" class="arrow" title="Go the next month">
				<img src="<?php echo $graphics_path ?>arrowright.gif" align="center" border="0">
			</a>

		<?php }	?>
	
	</td>

		</tr>
	
	<table>

	<table border="0" cellpadding="4" cellspacing="0" width="766">
		<tr>
			<td height="5">
				
			</td>
		</tr>
	
	<table>

	<table cellspacing="0" cellpadding="0" class="table" width="766">
	
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
					<a href="day.php?cid=<?php echo $cid  . '&catid=' . $catid . '&d=' . $the_array[$j] . '&m=' . $month . '&w=' . $i . '&wd=' . $j . '&y=' . $year . '&s=' . $subcal ?>" class="datelink">
					
				<?php } elseif($the_array[$j] == $curday && $month == $curmonth && $year == $curyear) { ?>
			
					<td colspan="1" class="monthtodaycell" onMouseOver="this.style.backgroundColor=on;" onMouseOut="this.style.backgroundColor=todayoff;" valign="top">
					<a href="day.php?cid=<?php echo $cid  . '&catid=' . $catid . '&d=' . $the_array[$j] . '&m=' . $month . '&w=' . $i . '&wd=' . $j . '&y=' . $year . '&s=' . $subcal ?>" class="todaylink">
				
				<?php  } elseif($exists[$j]) { ?>
					
					<td colspan="1" class="montheventcell" onMouseOver="this.style.backgroundColor=on; " onMouseOut="this.style.backgroundColor=eventoff;" valign="top">
					<a href="day.php?cid=<?php echo $cid  . '&catid=' . $catid . '&d=' . $the_array[$j] . '&m=' . $month . '&w=' . $i . '&wd=' . $j . '&y=' . $year . '&s=' . $subcal ?>" class="eventlink">
				
				<?php  } else { ?>			
			
					<td colspan="1" class="monthdatecell" onMouseOver="this.style.backgroundColor=on; " onMouseOut="this.style.backgroundColor=dateoff;" valign="top">
					<a href="day.php?cid=<?php echo $cid  . '&catid=' . $catid . '&d=' . $the_array[$j] . '&m=' . $month . '&w=' . $i . '&wd=' . $j . '&y=' . $year . '&s=' . $subcal ?>" class="datelink">
			
				<?php } ?>
							
								
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
					
					<a href="javascript:open_window('<?php echo "eventdetails.php?cid=$eventdata[calendar_id]&catid=$catid&eid=$eventdata[event_id]&d=$the_array[$j]&m=$month&y=$year&s=$subcal" ?>');" class="monthviewlink" title="Calendar: <?php echo $eventdata['calendar_name'] ?>, Location: <?php echo $eventdata['location_title'] ?>"><?php echo $eventdata['event_title'] ?></a>
			
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
					<a href="day.php?cid=<?php echo $cid  . '&catid=' . $catid . '&d=' . $the_array[$i] . '&m=' . $month . '&w=6' . '&wd=' . $i . '&y=' . $year . '&s=' . $subcal ?>" class="datelink">
			
				
			<?php 
				// highlight today's date
				} elseif($the_array[$i] == $curday && $month == $curmonth && $year == $curyear) {
			?>
				<td colspan="1" class="monthtodaycell" onMouseOver="this.style.backgroundColor=on; " onMouseOut="this.style.backgroundColor=todayoff; " valign="top">
				<a href="day.php?cid=<?php echo $cid  . '&catid=' . $catid . '&d=' . $the_array[$i] . '&m=' . $month . '&w=' . '&wd=' . $i . '6&y=' . $year . '&s=' . $subcal ?>" class="todaylink">
						
			<?php 	
				// Highlight date with events
				} elseif($exists[$i]) {
			?>
					<td colspan="1" class="montheventcell" onMouseOver="this.style.backgroundColor=on; " onMouseOut="this.style.backgroundColor=eventoff;" valign="top">
					<a href="day.php?cid=<?php echo $cid  . '&catid=' . $catid . '&d=' . $the_array[$i] . '&m=' . $month . '&w=6' . '&wd=' . $i . '&y=' . $year . '&s=' . $subcal ?>" class="eventlink">
			
			<?php } else { ?>
				
					<td colspan="1" class="monthdatecell" onMouseOver="this.style.backgroundColor=on; " onMouseOut="this.style.backgroundColor=dateoff;" valign="top">
					<a href="day.php?<?php echo $cid  . '&catid=' . $catid . '&d=' . $the_array[$i] . '&m=' . $month . '&w=6' . '&wd=' . $i . '&y=' . $year . '&s=' . $subcal ?>" class="datelink">
			
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
					
					<a href="javascript:open_window('<?php echo "eventdetails.php?cid=$eventdata[calendar_id]&catid=$catid&eid=$eventdata[event_id]&d=$the_array[$i]&m=$month&y=$year&s=$subcal" ?>');" class="monthviewlink" title="Calendar: <?php echo $eventdata['calendar_name'] ?>, Location: <?php echo $eventdata['location_title'] ?>"><?php echo $eventdata['event_title'] ?></a>
					
					
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




	
