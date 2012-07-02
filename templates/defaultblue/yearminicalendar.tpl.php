<td valign="top"><!----- <<< Year view table data tag --------------->
	
<!-----------------------------Mini Calendar-------------------------------------->
<script src="rollover.js"></script>
				
<table cellspacing="0" class="table" width="100%">
	<tr>
	
		
	<td colspan="8" class="tyearcalheader" align="center" valign="center">
		<a href='<?php echo "month.php?cid=$cid&catid=$catid&m=" . date("n", mktime(0,0,0,$themonth,1,$year)) . "&w=$weeknum&y=$year&s=$subcal" ?>' class='tableheaderlink'>
		<?php echo strtr(date("F", mktime(0,0,0,$themonth,1,$year)), $_DATE_TRANS); ?>
		</a>
	</td>
	
	
	</tr>
	
	
	<tr>

	<td colspan="1" class="tminicalendar" align="center"><font class="littletext"><b>&nbsp;</b></font></td>
	
	<?php 
		reset($weekmap);
		while(list($ind, $val) = each($weekmap)) {	
	
	?>
	
		<td colspan="1" class="tminicalendar" align="center"><font class="littletext"><b><?php echo $_WEEK_LETTER[$val] ?></b></font></td>

	<?php } ?>

	</tr>
		
		
	<?php 
				
	 for($i=1; $i<=5; $i++) { 
			
		 $the_array = $month_array[$i]; 
		 $exists = $month_exists[$i];
		 
	?>	
			
		<tr>
		
		<td colspan="1" width="15" align="center" class="tminicalendar">
		
			<a href="week.php?cid=<?php echo $cid . '&catid=' . $catid . '&wd=' . $weekday . '&m=' . $themonth . '&w=' . $i . '&y=' . $year . '&s=' . $subcal ?>" title="Click to view this week">
			
			<img src="<?php echo $graphics_path ?>arrowright.gif" align="center" border="0"></a></td>
			
			
			<?php 
			
			for ($j=0; $j<=6; $j++) { 
			
				if(!$the_array[$j]) { 
			?>
					<td colspan="1" align="center" class="tdatecell" onMouseOver="this.style.backgroundColor=on;" onMouseOut="this.style.backgroundColor=dateoff;">
					
					<center>
					<a href="day.php?cid=<?php echo $cid . '&catid=' . $catid . '&d=' . $the_array[$j] . '&m=' . $themonth . '&w=' . $i . '&wd=' . $j . '&y=' . $year . '&s=' . $subcal ?>" class="datelink" title="View events for this date">
					</center>

				<?php } elseif($the_array[$j] == $curday && $themonth == $curmonth && $year == $curyear) { ?>
			
					<td colspan="1" align="center" class="ttodaycell" onMouseOver="this.style.backgroundColor=on;" onMouseOut="this.style.backgroundColor=todayoff;">
					
					<center>
					<a href="day.php?cid=<?php echo $cid . '&catid=' . $catid . '&d=' . $the_array[$j] . '&m=' . $themonth . '&w=' . $i . '&wd=' . $j . '&y=' . $year . '&s=' . $subcal ?>" class="todaylink" title="View today's events">
					</center>

				<?php  } elseif($exists[$j]) { ?>
					
					<td colspan="1" align="center" class="teventcell" onMouseOver="this.style.backgroundColor=on; " onMouseOut="this.style.backgroundColor=eventoff;">
					
					<center>
					<a href="day.php?cid=<?php echo $cid . '&catid=' . $catid . '&d=' . $the_array[$j] . '&m=' . $themonth . '&w=' . $i . '&wd=' . $j . '&y=' . $year . '&s=' . $subcal ?>" class="eventlink" title="View events for this date">
					</center>

				<?php  } else { ?>			
			
					<td colspan="1" align="center" class="tdatecell" onMouseOver="this.style.backgroundColor=on; " onMouseOut="this.style.backgroundColor=dateoff;">
					
					<center>
					<a href="day.php?cid=<?php echo $cid . '&catid=' . $catid . '&d=' . $the_array[$j] . '&m=' . $themonth . '&w=' . $i . '&wd=' . $j . '&y=' . $year . '&s=' . $subcal ?>" class="datelink" title="View events for this date">
					</center>

				<?php } ?>
							
								
				<?php 
				// display space if no date exists
				if($the_array[$j]) { 
					 echo $the_array[$j];
			 	} else { ?>
				
					&nbsp;
				
				<?php } ?>
				
				</a></td>
					
			<?php } // end weekday iteration ?>
			
			</tr>
			
		<?php }  // end week iteration ?>

		
		<?php 
		
		if ($month_array[6][0]) { 
			$the_array = $month_array[6]; 
			$exists = $month_exists[6];
		?>
			
			<tr>
			
			<td colspan="1" width="15" align="center" class="tminicalendar">
			
			<a href="week.php?<?php echo 'cid='. $cid . '&catid=' . $catid . '&m=' . $themonth . '&w=6&y=' . $year . '&s=' . $subcal ?>" title="Click to view this week">
			
			<img src="<?php echo $graphics_path ?>arrowright.gif" align="center" border="0"></a></td>
			
			
			
			<?php 
			
			//loop through and display the dates 
			for ($i=0; $i<=6; $i++) {
				
				
				// check if date exists
				if(!$the_array[$i]) {
			?>
				
					<td colspan="1" align="center" class="tdatecell" onMouseOver="this.style.backgroundColor=on; " onMouseOut="this.style.backgroundColor=dateoff; ">
					<a href="day.php?cid=<?php echo $cid . '&catid=' . $catid . '&d=' . $the_array[$i] . '&m=' . $themonth . '&w=6' . '&wd=' . $i . '&y=' . $year . '&s=' . $subcal ?>" class="datelink" title="View events for this date">
			
				
			<?php 
				// highlight today's date
				} elseif($the_array[$i] == $curday && $themonth == $curmonth && $year == $curyear) {
			?>
				<td colspan="1" align="center" class="ttodaycell" onMouseOver="this.style.backgroundColor=on; " onMouseOut="this.style.backgroundColor=todayoff; ">
				<a href="day.php?cid=<?php echo $cid . '&catid=' . $catid  . '&d=' . $the_array[$i] . '&m=' . $themonth . '&w=' . '&wd=' . $i . '6&y=' . $year . '&s=' . $subcal ?>" class="todaylink" title="View today's events">
						
			<?php 	
				// Highlight date with events
				} elseif($exists[$i]) {
			?>
					<td colspan="1" align="center" class="teventcell" onMouseOver="this.style.backgroundColor=on; " onMouseOut="this.style.backgroundColor=eventoff;">
					<a href="day.php?cid=<?php echo $cid . '&catid=' . $catid  . '&d=' . $the_array[$i] . '&m=' . $themonth . '&w=6' . '&wd=' . $i . '&y=' . $year . '&s=' . $subcal ?>" class="eventlink" title="View events for this date">
			
			<?php } else { ?>
				
					<td colspan="1" align="center" class="tdatecell" onMouseOver="this.style.backgroundColor=on; " onMouseOut="this.style.backgroundColor=dateoff;">
					<a href="day.php?<?php echo $cid . '&catid=' . $catid . '&d=' . $the_array[$j] . '&m=' . $themonth . '&w=6' . '&wd=' . $i . '&y=' . $year . '&s=' . $subcal ?>" class="datelink" title="View events for this date">
			
			<?php } ?>
						
			<?php
			// display space if no date exists
				if($the_array[$i]) {
					echo $the_array[$i];
				} else {
			?>
					&nbsp;
			
			<?php	} ?>
				
				</a></td>
			
		<?php 	}	// for ends ?>
			
			</tr>
		
	<?php }else { ?>
	
			<tr class="tminicalendar">
			
			<td colspan="8" height="19" valign="top">
				
			</td>
				
			</tr>
	
	<?php  } // end the if ?> 
			
	</table>
	<br />

</td> <!----- <<< Year view table data tag --------------->
	
<!-----------------------------Mini Calendar Ends----------------------------------->