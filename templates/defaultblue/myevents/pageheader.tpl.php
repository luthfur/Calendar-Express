
<table width="770" border="0" cellpadding="2" cellspacing="0">
<tr>
	
	<td class="header" height="50">
		
		
			
	</td>	
	
	
	<td class="header" align="left" width="50%" height="50">
		<font class="bigtext">
			<b>My Events</b>
		</font>
	</td>
		
	
	
	<td align="right" valign="bottom" width="50%" height="50">

		<?php if(isset($sessiondata['username'])) { ?>
		
			<font class="littletext"><b>Welcome, <?php echo $sessiondata['username'] ?> </b></font>
			&nbsp;
			<a href="pref.php" class="navlink" title="Log Out of My Events">[Preferences]</a>
			&nbsp;
			<a href="<?php echo "logout.php?cid=$cid&catid=$catid&w=$weeknum&d=$day&m=$month&y=$year" ?>" class="navlink" title="Log Out of My Events">[Log Out]</a>
		
		<?php } ?>

	</td>			
	
	
</tr>

<tr>
	
	<td colspan="3" width="100%">
	
	<div id="nav">	

	<table cellpadding="1" cellspacing="0" class="table" width="100%">

	<tr><td align="left" height="25">

		<!-----------------nav bar------------------------------------------>
		<td align="left" height="25" width="130">
		<div class="top"><a href="../" title="Go to Calendar Homepage">Calendar Home</a></div>
			<div class="section">
			  <div class="box"><a href="<?php echo "../week.php?cid=$cid&catid=$catid&m=$month&y=$year" ?>" title="View the Weekly calendar">Weekly View</a></div>
              <div class="box"><a href="<?php echo "../month.php?cid=$cid&catid=$catid&m=$month&y=$year" ?>" title="View the Monthly calendar">Monthly View</a></div>
              <div class="box"><a href="<?php echo "../year.php?cid=$cid&catid=$catid&m=$month&y=$year" ?>" title="View the Yearly calendar">Yearly View</a></div>
			  <div class="box"><a href="<?php echo "../day.php?cid=$cid&catid=$catid&d=$curday&m=$curmonth&y=$curyear" ?>" title="View Today's Events">Today's Event</a></div>
           </div>
		</td>

		<td width="10"></td>
		
		<td align="left" height="25" width="130"><div class="top"><a href="eventlist.php" title="Go to MyEvents Main Page">My Events</a></div></td>
		
		<td width="10"></td>
		
		<td align="left" height="25" width="130"><div class="top"><a href="eventform.php" title="Add a new Event">Add Events</a></div></td>
		
		<td width="10"></td>
				
		<td align="left" height="25" width="130"><div class="top"><a href="locationlist.php" title="View Locations you had Added">Locations</a></div></td>
		
		<td width="10"></td>
		
		<td align="left" height="25" width="130"><div class="top"><a href="contactlist.php" title="View Contacts you had Added">Contacts</a></div>
		
		
				
		<!------------------------nav bar top ends----------------------------->
		</td>
		
	</tr></table>
	</div>

	</td>

</tr>

</table>
