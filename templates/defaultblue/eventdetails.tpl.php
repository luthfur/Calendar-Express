<html>

<head>

<title>Event Details - <?php echo $eventdata[event_title] ?></title>
<link rel="stylesheet" href="<?php echo $style_path ?>style.css" type="text/css">
</head>

<body>

<table border="0" cellpadding="4" cellspacing="1" width="450" valign="top">

<tr>
	
	<td align="right" colspan="2"><a href="vcal.php?eid=<?php echo $eventdata[event_id] ?>" class="basiclink" target="EventViewer">vCalendar</a></td>

</tr>
<tr>
	
	<td class="theader" colspan="2"><?php echo $eventdata[event_title] ?></td>

</tr>


<?php if(isset($_GET[d])) { ?>

<tr>
	
	<td class="tevents1" align="right" width="100"><font class="basictext"><b>Date:</b></font></td>
	
	<td class="tevents2" width="350"><font class="basictext"><?php echo strtr(date($_CONF[date_format], mktime(0, 0, 0, $_GET[m], $_GET[d], $_GET[y])), $_DATE_TRANS) ?></font></td>
		
</tr>


<?php } ?>



	
	<tr>
	
		<td class="tevents1" align="right" width="100"><font class="basictext"><b>Time:</b></font></td>
	
		<td class="tevents2" width="350"><font class="basictext">
			
			<?php if(($eventdata['start_time']!= NULL ) && $_CONF['show_time']) { ?> 

			<?php echo displaytime($eventdata['start_time']) . " - " .  displaytime($eventdata['stop_time']) ?>
			
			<?php } ?>
			
			<?php if($eventdata['text_time'] && $_CONF['show_time']) { ?> 
			
			<?php echo $eventdata['text_time'] ?>
			
			<?php } ?>

		</font></td>
	
	</tr>



<tr>
	
	<td class="tevents1" align="right" width="100"><font class="basictext"><b>Occurence:</b></font></td>
	
	<td class="tevents2" width="350"><font class="basictext"><?php echo getoccurence($eventdata, 1) ?></font></td>
		
</tr>




<tr>
	<td class="tevents1" align="right" width="100"><font class="basictext"><b>Posted by:</b></font></td>
	
	<td class="tevents2" width="350"><font class="basictext"><?php echo $eventdata[user_name] ?></font></td>

</tr>


<?php if($eventdata[contact_id] != 1) { ?>

<tr>
	<td class="tevents1" align="right" width="100"><font class="basictext"><b>Contact:</b></font></td>
	
	<td class="tevents2" width="350">
	
	<font class="basictext"><?php echo $eventdata[contact_name] ?></font>
	
	</td>

</tr>

<tr>
	<td class="tevents1" align="right" width="100"><font class="basictext"><b>Contact Email:</b></font></td>
	
	<td class="tevents2" width="350">
			
		<a href="mailto:<?php echo $eventdata[contact_email] ?>" class="smalllink"><?php echo $eventdata[contact_email] ?></a>
	
	</td>

</tr>

<tr>
	<td class="tevents1" align="right" width="100"><font class="basictext"><b>Contact Telephone:</b></font></td>
	
	<td class="tevents2" width="350">
	
	<font class="basictext"><?php echo $eventdata[contact_phone] ?></font>
	
	</td>

</tr>


<?php } ?>

<tr>
	<td class="tevents1" align="right" width="100"><font class="basictext"><b>Location:</b></td>
	
	<td class="tevents2" width="350">
		<a href="locationdetails.php?lid=<?php echo $eventdata[location_id] ?>&eid=<?php echo $eventdata[event_id] ?>" class="smalllink" target="EventViewer"><?php echo $eventdata[location_title] ?></a>
	</td>
</tr>


	<br />

<tr>
	
	<td class="tevents2" colspan="2" width="450"><br />
		<font class="basictext"><b>Description:</b></font><?php echo $eventdata[event_desc] ?>
	</td>

</tr>

</table>


<br/><br/>


<center>

<table border="0" cellpadding="4" cellspacing="1" valign="top">

<tr>
	
	<td valign="top" width="30">
		<img src="<?php echo $graphics_path ?>printicon.gif" width="30" />
	</td>

	<td width="85" align="left">
		<a href="javascript:self.print()" class="smalllink">Print Event</a>
	</td>
	
	
	<?php if($_CONF['allow_recommend']) { ?>	
	
		
	<td valign="top" width="30">
		<img src="<?php echo $graphics_path ?>mailicon.gif" width="30" />
	</td>

	<td align="left" width="110">
		<a href="recform.php?<?php echo "cid=$cid&catid=$catid&d=$day&w=$weeknum&wd=$weekday&m=$month&y=$year&eid=" . $eventdata[event_id]; ?>" class="smalllink">Recommend it</a>
	</td>
	
	<?php } ?>


	<td valign="top" width="30">
		<img src="<?php echo $graphics_path ?>close.gif" width="30" />
	</td>
		
	<td align="left">
		<a href="javascript:self.close()" class="smalllink">Close Window</a></center>
	</td>

</tr>

</table> 
	
</center>

</body>
</html>
