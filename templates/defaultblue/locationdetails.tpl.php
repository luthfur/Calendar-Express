<html>

<head>

<title>Location Details - <?php echo $locationdata[location_title] ?></title>
<link rel="stylesheet" href="<?php echo $style_path ?>style.css" type="text/css">
</head>

<body>

<br /><br />

<center>

	
<table border="0" cellpadding="4" cellspacing="1" width="450" valign="top">
	
<tr>
	
	<td class="theader" colspan="2"><?php echo $locationdata[location_title] ?></td>

</tr>



<tr>
	<td class="tevents1" align="right" width="100"><font class="basictext"><b>Address 1:</b></font></td>
	
	<td class="tevents2" width="350"><font class="basictext"><?php echo $locationdata[address_1] ?></font></td>

</tr>
	

<tr>
	<td class="tevents1" align="right" width="100"><font class="basictext"><b>Address 2:</b></font></td>
	
	<td class="tevents2" width="350"><font class="basictext"><?php echo $locationdata[address_2] ?></font></td>

</tr>


<tr>
	<td class="tevents1" align="right" width="100"><font class="basictext"><b>City:</b></font></td>
	
	<td class="tevents2" width="350"><font class="basictext"><?php echo $locationdata[city] ?></font></td>

</tr>


<tr>
	<td class="tevents1" align="right" width="100"><font class="basictext"><b>State:</b></font></td>
	
	<td class="tevents2" width="350"><font class="basictext"><?php echo $locationdata[state] ?></font></td>

</tr>


<tr>
	<td class="tevents1" align="right" width="100"><font class="basictext"><b>Zip:</b></font></td>
	
	<td class="tevents2" width="350"><font class="basictext"><?php echo $locationdata[zip] ?></font></td>

</tr>

<!---
	<td class="tevents1" align="right" width="100"><font class="basictext"><b>Map:</b></font></td>
	
	<td class="tevents2" width="350"><a href="http://www.mapquest.com/maps/map.adp?<?php echo "city=$locationdata[city_parsed]&address=$locationdata[add_parsed]&state=$locationdata[state]&zip=$locationdata[zip_parsed]&country=us&zoom=7" ?>" target="_blank" class="smalllink">View Location Map</a></td>

--->

<tr>
	
	<td class="tevents2" colspan="2" width="450"><br />
		<font class="basictext"><b>Description:</b> <?php echo $locationdata[location_desc] ?></font>
	</td>

</tr>

</table>


<br/><br/>


<center>

<table border="0" cellpadding="4" cellspacing="1" valign="top">

<tr>
	
	<?php if($_GET[eid]) { ?>

	<td valign="top" width="30">
		<img src="<?php echo $graphics_path ?>backicon.gif" width="30" />
	</td>

	<td width="160" align="left">
		<a href="javascript:history.go(-1)" class="smalllink">Back to Event Details</a>
	</td>
	
	<?php  } ?>

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
