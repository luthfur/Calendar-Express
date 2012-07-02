<br />
<table width="770" height="90" border="0" cellpadding="2" cellspacing="0">
<tr>
	
	<td class="header">
		
		<?php if($calendar_image && $_CONF[show_calimage]) { ?>
		
			<img src="<?php echo $calendar_image ?>">
		
		<?php } ?>
			
	</td>	
	
	
	<td class="header" align="left" width="65%">
		<font class="bigtext">
			<b>
				<?php echo $calendar_name	?>
			</b>
		</font>
	</td>
		
	
	
	<td align="right" valign="bottom" width="35%">

		<?php if(isset($sessiondata['username'])) { ?>
			<font class="littletext"><b>Welcome, <?php echo ( $sessiondata[fullname] ? "$sessiondata[fullname]" : "$sessiondata[username]" ) ?></b></font>
			<a href="<?php echo "logout.php?cid=$cid&catid=$catid&w=$weeknum&d=$day&m=$month&y=$year" ?>" class="navlink" title="Log Out of My Events">[Log Out]</a>
		<?php } ?>

	</td>			
	
	
</tr>

<tr>
	
	<td colspan="3" width="100%" valign="bottom">
	
		
	<!-----------------nav bar------------------------------------------>	
    <div id="nav">
	<table cellpadding="1" cellspacing="0" class="table" width="100%">
	<tr>
	
	<td align="left" height="25" width="100">
	
		<div class="top"><a href="index.php" class="navlink" title="View the Complete Calendar List">Calendar List</a></div>
	
	</td>
	
	<td width="10"></td>

	<td width="60">
		<div class="top"><a href="#">Views</a></div>
            <div class="section">
			  <div class="box"><a href="<?php echo "week.php?cid=$cid&catid=$catid&m=$month&y=$year" ?>" title="View the Weekly calendar">Weekly View</a></div>
              <div class="box"><a href="<?php echo "month.php?cid=$cid&catid=$catid&m=$month&y=$year" ?>" title="View the Monthly calendar">Monthly View</a></div>
              <div class="box"><a href="<?php echo "year.php?cid=$cid&catid=$catid&m=$month&y=$year" ?>" title="View the Yearly calendar">Yearly View</a></div>
			  <div class="box"><a href="<?php echo "day.php?cid=$cid&catid=$catid&d=$curday&m=$curmonth&y=$curyear" ?>" title="View Today's Events">Today's Event</a></div>
           </div>
	
	</td>
	
	
	
	<?php if($_CONF['allow_external_post'] == 1 && !isset($sessiondata['username'])) { ?>
	<td width="10"></td>
	<td width="130">
		<div class="top"><a href="eventform.php" title="Suggest a New Events">Suggest Events</a></div>
	</td>
	<?php } ?>


	


	<?php if(isset($sessiondata['username'])) { ?>
			
		

			<?php if(!$unsub) { ?>
			
				<?php if(isset($unsub)) { ?>
					<td width="10"></td>
					<td width="100">
					<div class="top"><a href="<?php echo "subscribe.php?cid=$cid&catid=$catid&d=$day&m=$month&y=$year" ?>" title="Subscribe to this Calendar">Subscribe</a></div>
			
					</td>
				<?php } ?>

			<?php } else { ?>
			<td width="10"></td>
				<td width="100">
				<div class="top"><a href="<?php echo "unsubscribe.php?cid=$cid&catid=$catid&d=$day&m=$month&y=$year" ?>" title="Unsubscribe from this Calendar">Unsubscribe</a></div>
		
				</td>
			<?php } ?>
			
			<td width="10"></td>

			<td width="100">
			
			<div class="top"><a href="myevents" class="navlink" title="Go to MyEvents">My Events</a></div>
            <div class="section">
			  <div class="box"><a href="myevents/" title="Go ot MyEvents Control Panel">My Events Home</a></div>	
              <div class="box"><a href="myevents/eventform.php" title="Add a new Event">Add Events</a></div>
              <div class="box"><a href="myevents/eventlist.php" title="View all the Events you have published">View Events</a></div>
              <div class="box"><a href="myevents/locationlist.php" title="View the Locations you have added">View Locations</a></div>
			  <div class="box"><a href="myevents/contactlist.php" title="View all your Contacts">View Contacts</a></div>
           </div>
			</td>
			
		<?php } else { ?>
			<td width="100">
			<div class="top"><a href="<?php echo "login.php?cid=$cid&catid=$catid&w=$weeknum&d=$day&m=$month&y=$year" ?>" title="Log Into MyEvents">Log In</a></div>
			</td>

		<?php } ?>
			
		
			<!------------------------nav bar top ends----------------------------->
	</td>
	
		
		<td align="right">
			<!-----------------nav bar----------------------------------------->
			
				<div class="top"><a href="<?php echo "day.php?cid=$cid&catid=$catid&d=$curday&m=$curmonth&y=$curyear" ?>" title="View Today's Events"><b>Today:</b> <?php echo strtr(date($_CONF['date_format'], time()), $_DATE_TRANS) ?></a>&nbsp;&nbsp;</div>
			
			<!------------------------nav bar top ends---------------------------->
		</td>
		
	</div>	

		</tr></table>
		

	</td>
	
</tr>
</table>