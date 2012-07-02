<table border="0" cellspacing="1" cellpadding="3" width="85%">
<tr>
	<td valign="top">
		<br />
		<font class="bigtext">Calendar Statistics</font>
		<br />
	</td>
</tr>
</table>	

<br />

<table border="1" cellpadding="6" cellspacing="0" class="table" width="85%">

<tr>
	<td class="listingheader" height="25" width="32%">
		<font class="orderbylink"><b>Statistics</b></font>
	</td>
	<td class="listingheader" height="25" align="center">
		<font class="orderbylink"><b>Value</b></font>
	</td>
	<td class="listingheader" height="25" width="32%" align="center">
		<font class="orderbylink"><b>Statistics</b></font>
	</td>
	<td class="listingheader" height="25" align="center">
		<font class="orderbylink"><b>Value</b></font>
	</td>
</tr>

		
		<tr>
				<td colspan="1" class="listingcell">
					<font class="littletext">
						Number of Calendars
					</font>
				</td>
				<td colspan="1" align="center" class="listingcell">
					<font class="littletext">
						<b><?php echo $total_calendars ?></b>
					</font>
				</td>
				<td colspan="1" class="listingcell">
					<font class="littletext">
					Number of Users
					</font>
				</td>
				<td colspan="1" align="center" class="listingcell">	
					<font class="littletext">
						<b><?php echo $total_users ?></b>
					</font>
				</td>
			</tr>
			
			<tr>
				<td colspan="1" class="listingcell">
					<font class="littletext">
						Number of Events
					</font>
				</td>
				<td colspan="1" align="center" class="listingcell">
					<font class="littletext">
						<b><?php echo $total_events ?></b>
					</font>
				</td>
				<td colspan="1" class="listingcell">
					<font class="littletext">
						Number of Locations
					</font>
				</td>
				<td colspan="1" align="center" class="listingcell">	
					<font class="littletext">
						<b><?php echo $total_locations ?></b>
					</font>
				</td>
			</tr>

			<tr>
				<td colspan="1" class="listingcell">
					<font class="littletext">
						Events Pending Approval
					</font>
				</td>
				<td colspan="1" align="center" class="listingcell">
					<font class="littletext">
						<b><?php echo $total_unapp_events ?></b>
					</font>
				</td>
				<td colspan="1" class="listingcell">
					<font class="littletext">
						Number of Admins
					</font>
				</td>
				<td colspan="1" align="center" class="listingcell">	
					<font class="littletext">
						<b><?php echo $total_admins ?></b>
					</font>
				</td>
			</tr>

			<tr>
				<td colspan="1" class="listingcell">
					<font class="littletext">
						Users Pending Approval
					</font>
				</td>
				<td colspan="1" align="center" class="listingcell">
					<font class="littletext">
						<b><?php echo $total_unapp_users ?></b>
					</font>
				</td>
				<td colspan="1" class="listingcell">
					<font class="littletext">
						
					</font>
				</td>
				<td colspan="1" align="center" class="listingcell">	
					<font class="littletext">
						<b><?php echo $last_backup ?></b>
					</font>
				</td>
			</tr>


	</table>
	
	<br />

	<table border="0" cellspacing="1" cellpadding="3" width="85%">
	<tr>
		<td valign="top">
			<br />
			<font class="bigtext">Quick Tasks</font>
			<br />
		</td>
	</tr>
	</table>	
	
	<br />

	<table border="1" cellpadding="4" cellspacing="0" class="table" width="85%">

	<tr>
	<td class="listingcell" height="25">
		<a href="unappevent.php" class="listinglink">
			View Unapproved Events
		</a>
	</td>

	<td class="listingcell" height="25">
		<a href="unappuser.php" class="listinglink">
			View New Users
		</a>
	</td>

	<td class="listingcell" height="25">
		<a href="userform.php" class="listinglink">
			Add New User
		</a>
	</td>

	<td class="listingcell" height="25">
		<a href="locationform.php" class="listinglink">
			Add New Location
		</a>
	</td>
	
	
	</tr>
	
	</table>