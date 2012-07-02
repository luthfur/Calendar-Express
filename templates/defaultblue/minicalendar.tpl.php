
<!-----------------------------Mini Calendar-------------------------------------->
				
<table cellspacing="0" class="table" width="100%">
	<tr>
	
	<td colspan="2" class="theader" align="right">

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
	
	<td colspan="4" class="theader" align="center" valign="center">
		<a href='<?php echo "month.php?cid=$cid&catid=$catid&m=$month&w=$weeknum&y=$year&s=$subcal" ?>' class='tableheaderlink'><?php echo $monthname ?></a>
	</td>
	
	<td colspan="2" class="theader" align="left">
	
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
	
	
	<tr>
	
	<td colspan="1" class="tminicalendar" align="center"><font class="littletext">&nbsp;</font></td>

	<?php while(list($ind, $val) = each($weekmap)) {	?>
	
		<td colspan="1" class="tminicalendar" align="center"><font class="littletext"><b><?php echo $_WEEK_LETTER[$val] ?></b></font></td>

	<?php } ?>


	</tr>
		
		
	<?php 
				
	 for($i=1; $i<=5; $i++) { 
			
		 $the_array = $month_array[$i]; 
		 $exists = $month_exists[$i];
		 
	?>	
			
		<tr>
		
		<td colspan="1" align="center" class="tminicalendar" width="15">
		
			<a href="week.php?cid=<?php echo $cid  . '&catid=' . $catid . '&wd=' . $weekday . '&m=' . $month . '&w=' . $i . '&y=' . $year . '&s=' . $subcal ?>" title="Click to view this week">
			
			<img src="<?php echo $graphics_path ?>arrowright.gif" align="center" border="0"></a></td>
			
			
			<?php 
			
			for ($j=0; $j<=6; $j++) { 
			
				if(!$the_array[$j]) { 
			?>
					<td colspan="1" align="center" class="tdatecell" onMouseOver="this.style.backgroundColor=on;" onMouseOut="this.style.backgroundColor=dateoff;">
					<a href="day.php?cid=<?php echo $cid  . '&catid=' . $catid . '&d=' . $the_array[$j] . '&m=' . $month . '&w=' . $i . '&wd=' . $j . '&y=' . $year . '&s=' . $subcal ?>" class="datelink" title="View events for this date">
					
				<?php } elseif($the_array[$j] == $curday && $month == $curmonth && $year == $curyear) { ?>
			
					<td colspan="1" align="center" class="ttodaycell" onMouseOver="this.style.backgroundColor=on;" onMouseOut="this.style.backgroundColor=todayoff;">
					<a href="day.php?cid=<?php echo $cid  . '&catid=' . $catid . '&d=' . $the_array[$j] . '&m=' . $month . '&w=' . $i . '&wd=' . $j . '&y=' . $year . '&s=' . $subcal ?>" class="todaylink" title="View today's events">
				
				<?php  } elseif($exists[$j]) { ?>
					
					<td colspan="1" align="center" class="teventcell" onMouseOver="this.style.backgroundColor=on; " onMouseOut="this.style.backgroundColor=eventoff;">
					<a href="day.php?cid=<?php echo $cid  . '&catid=' . $catid . '&d=' . $the_array[$j] . '&m=' . $month . '&w=' . $i . '&wd=' . $j . '&y=' . $year . '&s=' . $subcal ?>" class="eventlink" title="View events for this date">
				
				<?php  } else { ?>			
			
					<td colspan="1" align="center" class="tdatecell" onMouseOver="this.style.backgroundColor=on; " onMouseOut="this.style.backgroundColor=dateoff;">
					<a href="day.php?cid=<?php echo $cid  . '&catid=' . $catid . '&d=' . $the_array[$j] . '&m=' . $month . '&w=' . $i . '&wd=' . $j . '&y=' . $year . '&s=' . $subcal ?>" class="datelink" title="View events for this date">
			
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
			
			<td colspan="1" align="center" class="tminicalendar" width="15">
			
			<a href="week.php?<?php echo 'cid='. $cid  . '&catid=' . $catid . '&m=' . $month . '&w=6&y=' . $year . '&s=' . $subcal ?>" title="Click to view this week">
			
			<img src="<?php echo $graphics_path ?>arrowright.gif" align="center" border="0"></a></td>
			
			
			
			<?php 
			
			//loop through and display the dates 
			for ($i=0; $i<=6; $i++) {
				
				
				// check if date exists
				if(!$the_array[$i]) {
			?>
				
					<td colspan="1" align="center" class="tdatecell" onMouseOver="this.style.backgroundColor=on; " onMouseOut="this.style.backgroundColor=dateoff; ">
					<a href="day.php?cid=<?php echo $cid  . '&catid=' . $catid . '&d=' . $the_array[$i] . '&m=' . $month . '&w=6' . '&wd=' . $i . '&y=' . $year . '&s=' . $subcal ?>" class="datelink" title="View events for this date">
			
				
			<?php 
				// highlight today's date
				} elseif($the_array[$i] == $curday && $month == $curmonth && $year == $curyear) {
			?>
				<td colspan="1" align="center" class="ttodaycell" onMouseOver="this.style.backgroundColor=on; " onMouseOut="this.style.backgroundColor=todayoff; ">
				<a href="day.php?cid=<?php echo $cid  . '&catid=' . $catid . '&d=' . $the_array[$i] . '&m=' . $month . '&w=' . '&wd=' . $i . '6&y=' . $year . '&s=' . $subcal ?>" class="todaylink" title="View today's events">
						
			<?php 	
				// Highlight date with events
				} elseif($exists[$i]) {
			?>
					<td colspan="1" align="center" class="teventcell" onMouseOver="this.style.backgroundColor=on; " onMouseOut="this.style.backgroundColor=eventoff;">
					<a href="day.php?cid=<?php echo $cid  . '&catid=' . $catid . '&d=' . $the_array[$i] . '&m=' . $month . '&w=6' . '&wd=' . $i . '&y=' . $year . '&s=' . $subcal ?>" class="eventlink" title="View events for this date">
			
			<?php } else { ?>
				
					<td colspan="1" align="center" class="tdatecell" onMouseOver="this.style.backgroundColor=on; " onMouseOut="this.style.backgroundColor=dateoff;">
					<a href="day.php?<?php echo $cid  . '&catid=' . $catid . '&d=' . $the_array[$i] . '&m=' . $month . '&w=6' . '&wd=' . $i . '&y=' . $year . '&s=' . $subcal ?>" class="datelink" title="View events for this date">
			
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
		
	<?php }  // end the if ?>
			
	</table>
	<br />
<!-----------------------------Mini Calendar Ends----------------------------------->