<table border="0" cellspacing="1" cellpadding="3" width="770">
<tr>
	<td valign="top">
		<br />
		<font class="subheader">My Events Summary</font>
		<br />
		<hr width="100%" class="hrbar" />
		<font class="basictext"><b>Total Events Posted: <?php echo $total ?></b></font><br /><br />
	</td>
</tr>
</table>		


		
				
	<table border="1" cellpadding="4" cellspacing="0" class="table" width="770">
		<tr>
			<td class="theader" colspan="5">
				<center>
				Last 10 Events Posted
				</center>
			</td>
		</tr>
	

<tr>
	<td class="listingheader" height="25" width="40%"">
		<a href="<?php echo $_SERVER[PHP_SELF]?>?orderby=event_title&order=<?php echo $order ?>" class="orderbylink"><b>Event Title</b></font>
	</td>
	<td class="listingheader" height="25" align="center">
		<font class="orderbylink"><b>Occurence</b></font>
	</td>
	<td class="listingheader" height="25" align="center">
		<a href="<?php echo $_SERVER[PHP_SELF]?>?orderby=calendar_name&order=<?php echo $order ?>" class="orderbylink"><b>Calendar</b></font>
	</td>
	<td class="listingheader" height="25" align="center">
		<font class="orderbylink"><b>Action</b></font>
	</td>
</tr>


	<?php 
	

	while (($eventdata = $Result->getArray($resultset))) {
		
		extract($eventdata);

	?>
		
		<tr>
				<td colspan="1" class="listingcell">
					<a href="eventdetails.php?eid=<?php echo $event_id ?>" class="listinglink"><b><?php echo $event_title ?></b></a>
				</td>
				<td colspan="1" align="center" class="listingcell">
					<font class="littletext">
					<?php 
							$display = getoccurence($eventdata);
							echo $display;
					?>
					</font>
				</td>
				<td colspan="1" align="center" class="listingcell">
					<font class="littletext"><?php echo $calendar_name ?></font>
				</td>
				<td colspan="1" align="center" class="listingcell">	
					<a href="eventdelete.php?id=<?php echo $event_id ?>" class="listinglink" onClick="return confirm('Are you sure you want to delete the selected event?')"><b>Delete</b></a>
				</td>
			</tr>

	<?php
	
		$count++;
	}

	?>


	</table>

