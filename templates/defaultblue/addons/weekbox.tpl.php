<link rel="stylesheet" href="<?php echo $style_path ?>style.css" type="text/css" />

	<center>
<table border="1" cellpadding="4" cellspacing="0" class="table" width="60%">
		<tr>
			<td class="theader">
				<center>
					Week of <?php echo "$firstdate-$lastdate $monthname ($year)" ?>
				</center>
			</td>
		</tr>
	
	<table>
	
	

	<table width="60%" border="0" height="35">
	<tr>
		<td class="tablebody" valign="center">
		
		<font class="littletext"><b>Quick Jump to:</b></font>&nbsp;&nbsp;
		<a href="#sun" class="smalllink"><b>Sun</b></a> 
		<font class="smalltext">&nbsp;&nbsp;</font>
		<a href="#mon" class="smalllink"><b>Mon</b></a> 
		<font class="smalltext">&nbsp;&nbsp;</font>
		<a href="#tue" class="smalllink"><b>Tue</b></a> 
		<font class="smalltext">&nbsp;&nbsp;</font>
		<a href="#wed" class="smalllink"><b>Wed</b></a> 
		<font class="smalltext">&nbsp;&nbsp;</font>
		<a href="#thu" class="smalllink"><b>Thu</b></a> 
		<font class="smalltext">&nbsp;&nbsp;</font>
		<a href="#fri" class="smalllink"><b>Fri</b></a> 
		<font class="smalltext">&nbsp;&nbsp;</font>
		<a href="#sat" class="smalllink"><b>Sat</b></a>
	
		</td>
	</tr>
	</table>

	
	
<table width="60%" cellpadding="2" cellspacing="0" class="table">
	
<?php	
		//iterate through available dates
				
		for($i=$firstkey; $i<=$lastkey; $i++) {
			

			$day = $the_array[$i];
			$eventlist = $eventset[$i];
			
			
			//print_r($eventlist);
						
			$weekpointer = weekdaypointer($i);
?>
		
		<tr>
			<td class="eventheader" height="25">
				<a name="<?php echo $weekpointer ?>"></a>
				&nbsp;&nbsp;<font class="eventheadertext"><b><?php echo date("l, jS", mktime(0, 0, 0, $month, $day, $year)) ?></b></font>
			</td>
			
			<td class="eventheader" height="25" align="right">
				<?php if(isset($sessiondata['username'])) { ?>
					<a href="<?php echo $calendar_path ?>myevents/eventform.php?<?php echo "cid=$cid&catid=$catid&d=$day&m=$month&y=$year" ?>" class="eventaddlink" title="Click to add an event to this date">Add Events</a>&nbsp;
				<?php } ?>
			</td>
		</tr>
		
		<tr>
		<td class="tevents1" height="40" colspan="2">
		
		
			<?php
				
				$found = 0;
				

				for ($j=0; $j<=count($eventlist); $j++) {
										
					$eventlist = arrange_events($eventlist);

					if($eventdata = $eventlist[$j]) {

						//print_r($eventdata);
			?>
			
			
			<table border="0" cellpadding="0" cellspacing="8" width="100%">
			<tr>
				<td align="center" width="5%">
					
					<?php if($_CONF['show_calicon'] && $eventdata['calendar_icon']) { ?>
						
					<img src="<?php echo $eventdata['calendar_icon'] ?>">
					
					<?php } ?>
					
				</td>
					
				
				<td height="45">
					
					<a href="javascript:open_window('<?php echo "eventdetails.php?cid=$eventdata[calendar_id]&catid=$catid&eid=$eventdata[event_id]&d=$day&m=$month&y=$year&s=$subcal" ?>');" class="basiclink"><?php echo $eventdata['event_title'] ?></a><br />
					
					<?php if($_CONF['show_calname']) { ?> 
					
					<font class="littletext">( Calendar: <a href="<?php echo $calendar_path ?><?php echo "week.php?cid=$eventdata[calendar_id]&catid=$catid&d=$day&m=$month&y=$year&s=$subcal" ?>" class="smalllink"><?php echo $eventdata['calendar_name'] ?></a> )</font>
					
					<?php } ?>
					
					
					<?php if($_CONF['show_location']) { ?> 
					
					<font class="littletext">&nbsp;&nbsp;Location: <a href="javascript:open_window('<?php echo "locationdetails.php?cid=$eventdata[calendar_id]&lid=$eventdata[location_id]&catid=$catid&d=$day&m=$month&y=$year&s=$subcal" ?>')" class="smalllink"><?php echo $eventdata['location_title'] ?></a>
					
					<?php } ?>
					
					 
					
					
					<?php if(($eventdata['start_time']!= "00:00:00" )&& $_CONF['show_time']) { ?> 
					
						&nbsp;&nbsp;-&nbsp;&nbsp;<font class="littletext">Time: <?php echo displaytime($eventdata['start_time']) . " - " .  displaytime($eventdata['start_time']) ?></font> 
					
					<?php } else if($eventdata['text_time'] && $_CONF['show_time']) { ?> 
					
						&nbsp;&nbsp;-&nbsp;&nbsp;<font class="littletext">Time: <?php echo $eventdata['text_time'] ?></font> 
					
					<?php } ?>
				
					
					<?php if($sessiondata['user_id'] == $eventdata[12]) { ?>
					
						&nbsp;<a href="<?php echo $calendar_path ?>myevents/eventdetails.php?<?php echo "eid=$eventdata[event_id]" ?>" class="editlink" title="Click to edit this event">[Edit]</a>
						&nbsp;<a href="<?php echo $calendar_path ?>myevents/eventdelete.php?<?php echo "eid=$eventdata[event_id]" ?>" class="editlink" onclick="return confirm('Are you sure you want to delete the selected event?')" title="Click to edit this event">[Delete]</a>
					
					<?php } ?>
					
				</td>
			</tr>
					
			</table>
						
			
			
			<?php	
					$found++;
					}
				
				}
					
					if(!$found) {
			?>		
					
			
			<table border="0" cellpadding="0" cellspacing="8" width="100%">
			<tr>
				<td align="center" width="5%"></td><td height="45">
					<font class="basictext">There are no events scheduled for this day</font>
				</td>
			</tr>
			</table>
				
			
			<?php		
				}	
			?>
		
			
		</td>
	</tr>
	
	<?php		
		}	
	?>		
			
</table>

	</center>