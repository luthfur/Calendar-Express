<table border="0" cellspacing="1" cellpadding="3" width="90%">
<tr>
	<td valign="top">
		<br />
		<font class="bigtext">Calendar List</font>
		<br />
		<hr width="100%" class="hrbar" />
		<font class="basictext"><b>Total Categories: <?php echo $cattotal ?></b></font>
		&nbsp;&nbsp;
		<font class="basictext"><b>Total Calendars: <?php echo $total ?></b></font>
		<br /><br />
	</td>
</tr>
</table>		


		
<!----------------------------------Calendar body--------------------------------------------->
<table border="0" cellspacing="1" cellpadding="3" width="90%">
<tr>
	
	<!---------------------------------Main Calendar----------------------------------------->
	<td align="left" rowspan="1" valign="top" width="50%">
		
	<table border="0" cellpadding="4" height="40" valign="top" cellspacing="0" width="100%">
		<tr>
			
		</tr>
	
	</table>
				
	<table border="0" cellpadding="4" cellspacing="0" width="100%">
		
<?php 
	

	while ($catdata = $Result->getArray($catresult)) {
		
		extract($catdata);

	?>


<tr>
	<td class="listingheader" height="25" width="30%">
		&nbsp;<a href="catdetails.php?catid=<?php echo $cat_id ?>" class="catlink"><b><?php echo $cat_name ?></b></a>
	</td>

	<td colspan="1" align="center">
		<font class="littletext">
			<b>Number of Events</b>
		</font>
	</td>
		<td colspan="1" align="center" width="10%">	
		<font class="littletext">
			<b>Action</b>
		</font>
	</td>
	
</tr>


	<?php 
	
	$calresult = $GetCalendar->getList($cat_id);

	while ($caldata = $Result->getArray($calresult)) {
		
		extract($caldata);
		$total_events = $EventData->getTotal($calendar_id);

	?>
		
		<tr>
				<td colspan="1" class="listingcell">
					<a href="caldetails.php?cid=<?php echo $calendar_id ?>" class="listinglink"><b><?php echo $calendar_name ?></b></a>
				</td>
				
				<td colspan="1" align="center" class="listingcell" width="30%">
					<font class="littletext"><?php echo $total_events ?></font>
				</td>

				<td colspan="1" align="center" class="listingcell" width="10%">	
					<a href="caldelete.php?cid=<?php echo $calendar_id ?>" class="listinglink" onClick="return confirm('Are you sure you want to delete the selected calendar?')"><b>Delete</b></a>
				</td>
			</tr>

	<?php	} ?>

	<tr>
		<td colspan="3" height="25">
		
		</td>

<?php }	?>


	</table>

</td>
</tr>
</table>

<br />



