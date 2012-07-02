<?php extract($_POST) ?>
	


<form name="confupdate" method="post" action="confupdate.php">


	<table border="1" cellpadding="6" cellspacing="0" class="table" width="90%">
		<tr>
			<td class="theader" colspan="2">
				
				View and Edit Calendar Settings
			
			</td>
		
		
		</tr>


<?php

if(isset($error)) {

?>


<tr>
		<td colspan="2" class="listingcell">
			<font class="errortext"><b>Error: Unable to Save settings</b></font><br />
			<font class="littletext">Ensure that the file settings.php is writable.</font>
		</td>

</tr>

<?php

} 

?>



<tr>
		<td colspan="1" class="listingcell">
			
			<font class="midtext"><b>Site Name: </b></font><br />
		

		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="site_name" value="<?php echo $_CONF[site_name] ?>" class="textbox" size="40"/>
		</td>

</tr>
	

	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="midtext"><b>Calendar URL:</b></font><br />
	
		</td>
		<td colspan="1" align="left" class="listingcell">
		
			<input type="text" name="calendar_url" value="<?php echo $_CONF[calendar_url] ?>" class="textbox" size="40"/>
		
		</td>
	</tr>


	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="midtext"><b>Site Administrator Email address:</b></font><br />
	
		</td>
		<td colspan="1" align="left" class="listingcell">
		
			<input type="text" name="support_email" value="<?php echo $_CONF[support_email] ?>" class="textbox" size="40"/>
		
		</td>
	</tr>


	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="midtext"><b>Current Active Template Style Pack:</b></font><br />
	
		</td>
		<td colspan="1" align="left" class="listingcell">
		
			<select name="style">
				
				<?php while(list($ind, $val) = each($stylelist)) { ?>
				
					<option value="<?php echo $val ?>"
					
					<?php if($val == $_CONF[style]) echo " selected" ?>
				
					><?php echo $val ?></option>

				<?php } ?>

			</select>
			<!--<input type="text" name="style" value="<?php echo $_CONF[style] ?>" class="textbox" size="40"/>
		-->
		</td>
	</tr>

	
	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="midtext"><b>Time Zone:</b></font><br />
	
		</td>
		<td colspan="1" align="left" class="listingcell">
		
			<input type="text" name="time_zone" value="<?php echo $_CONF[time_zone] ?>" class="textbox" size="3"/>
		
		</td>
	</tr>
	


	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="midtext"><b>Time Display Format:</b></font><br />
	
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="radio" name="time_format" value="1" <?php if($_CONF[time_format] == 1) echo " CHECKED " ?> /> <font class="midtext"><b> 12 Hour Display</b></font>
			&nbsp;
			<input type="radio" name="time_format" value="0" <?php if($_CONF[time_format] == 0) echo " CHECKED " ?>/> <font class="midtext"><b> 24 Hour Display</b></font>
		
		</td>
		
	</tr>
	

	<tr>
		<td colspan="1" class="listingcell">
		
			<font class="midtext"><b>Calendar View Date Format </b></font><br />
		
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="date_format" value="<?php echo $_CONF[date_format] ?>" class="textbox" size="15"/>
		</td>
	</tr>



	<tr>
		<td colspan="1" class="listingcell">
		
			<font class="midtext"><b>My Events Date Format </b></font><br />
		
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="me_date_format" value="<?php echo $_CONF[me_date_format] ?>" class="textbox" size="15"/>
		</td>
	</tr>
	

	<tr>
		<td colspan="1" class="listingcell">
		
			<font class="midtext"><b>Weekly, Monthly, day display format </b></font><br />
		
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="day_format" value="<?php echo $_CONF[day_format] ?>" class="textbox" size="15"/>
		</td>
	</tr>


	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="midtext"><b>Start of Week </b></font><br />
	
		</td>
		<td colspan="1" align="left" class="listingcell">
			
			<select name="start_weekday" class="textbox">
			
			<?php	while(list($ind, $val) = each($_WEEK_NAME)) { ?>
				
				<option value="<?php echo $ind ?>"
				
				<?php if($ind == $_CONF[start_weekday] ) echo " selected" ?>

				>

				<?php echo $val  ?>
				
				</option>

			<?php }	?>
			
			</select>
		
		</td>
	</tr>
	

	<tr>
		<td colspan="1" class="listingcell">
		
			<font class="midtext"><b>Number of Rows per Page in Lists </b></font><br />
		
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="pagesize" value="<?php echo $_CONF[pagesize] ?>" class="textbox" size="2"/>
		</td>
	</tr>
	

	<tr>
		<td colspan="1" class="listingcell">
		
			<font class="midtext"><b>Emails per Interval </b></font><br />
		
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="email_perinterval" value="<?php echo $_CONF[email_perinterval] ?>" class="textbox" size="2"/>
		</td>
	</tr>


	<tr>
		<td colspan="1" class="listingcell" valign="top">
		
			<font class="midtext"><b>Email Signature </b></font><br />
		
		</td>
		<td colspan="1" align="left" class="listingcell">
			
			<input type="text" name="email_sig" value="<?php echo $_CONF[email_sig] ?>" class="textbox" size="40"/>
			
		</td>
	</tr>
	


	

	
	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="midtext"><b>Allow Guest Post: </b></font><br />
		

		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="radio" name="allow_external_post" value="1" <?php if($_CONF[allow_external_post]) echo " CHECKED " ?> /> <font class="midtext"><b>Yes</b></font>
			&nbsp;&nbsp;
			<input type="radio" name="allow_external_post" value="0" <?php if(!$_CONF[allow_external_post]) echo " CHECKED " ?>/> <font class="midtext"><b>No</b></font>
		</td>

	</tr>


	<tr>
		<td colspan="1" class="listingcell" valign="top">
			
			<font class="midtext"><b>Allow User Registration: </b></font><br />
		

		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="radio" name="allow_user_reg" value="1" <?php if($_CONF[allow_user_reg] == 1) echo " CHECKED " ?> /> <font class="midtext"><b> Yes, Activation Required</b></font>
			<br /><br />
			<input type="radio" name="allow_user_reg" value="2" <?php if($_CONF[allow_user_reg] == 2) echo " CHECKED " ?>/> <font class="midtext"><b> Yes, No Activation Required</b></font>
			<br /><br />
			<input type="radio" name="allow_user_reg" value="0" <?php if(!$_CONF[allow_user_reg]) echo " CHECKED " ?>/> <font class="midtext"><b>No</b></font>
		</td>

	</tr>
	

	<tr>
		<td colspan="1" class="listingcell" valign="top">
			
			<font class="midtext"><b>Month View Type: </b></font><br />
		

		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="radio" name="month_view" value="1" <?php if($_CONF[month_view] == 1) echo " CHECKED " ?> /> <font class="midtext"><b> Block View</b></font>
			&nbsp;
			<input type="radio" name="month_view" value="0" <?php if($_CONF[month_view] == 0) echo " CHECKED " ?>/> <font class="midtext"><b> List View</b></font>
			<br /><br />
		</td>

	</tr>


	<tr>
		<td colspan="1" class="listingcell" valign="top">
			
			<font class="midtext"><b>Allow Text Time: </b></font><br />
		

		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="radio" name="allow_texttime" value="1" <?php if($_CONF[allow_texttime] == 1) echo " CHECKED " ?> /> <font class="midtext"><b> Yes</b></font>
			&nbsp;
			<input type="radio" name="allow_texttime" value="0" <?php if($_CONF[allow_texttime] == 0) echo " CHECKED " ?>/> <font class="midtext"><b> No</b></font>
			<br /><br />
		</td>

	</tr>

	<tr>
		<td colspan="1" class="listingcell" valign="top">
			
			<font class="midtext"><b>Event Sorting: </b></font><br />
		

		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="radio" name="event_sort" value="1" <?php if($_CONF[event_sort] == 1) echo " CHECKED " ?> /> <font class="midtext"><b> Event with text time, Event with start and end time</b></font>
			<br /><br />
			<input type="radio" name="event_sort" value="2" <?php if($_CONF[event_sort] == 2) echo " CHECKED " ?>/> <font class="midtext"><b> Event with start and end time, Event with text time</b></font>
			<br /><br />
		</td>

	</tr>

	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="midtext"><b>Allow Event Recommendations: </b></font><br />
		

		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="radio" name="allow_recommend" value="1" <?php if($_CONF[allow_recommend]) echo " CHECKED " ?> /> <font class="midtext"><b>Yes</b></font>
			&nbsp;&nbsp;
			<input type="radio" name="allow_recommend" value="0" <?php if(!$_CONF[allow_recommend]) echo " CHECKED " ?>/> <font class="midtext"><b>No</b></font>
		</td>

	</tr>


	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="midtext"><b>Display Date Suffix ("st", "nd", "th"): </b></font><br />
		

		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="radio" name="allow_datesuffix" value="1" <?php if($_CONF[allow_datesuffix]) echo " CHECKED " ?> /> <font class="midtext"><b>Yes</b></font>
			&nbsp;&nbsp;
			<input type="radio" name="allow_datesuffix" value="0" <?php if(!$_CONF[allow_datesuffix]) echo " CHECKED " ?>/> <font class="midtext"><b>No</b></font>
		</td>

	</tr>


	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="midtext"><b>Show Calendar Image in Calendar View Header: </b></font><br />
		

		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="radio" name="show_calimage" value="1" <?php if($_CONF[show_calimage]) echo " CHECKED " ?> /> <font class="midtext"><b>Yes</b></font>
			&nbsp;&nbsp;
			<input type="radio" name="show_calimage" value="0" <?php if(!$_CONF[show_calimage]) echo " CHECKED " ?>/> <font class="midtext"><b>No</b></font>
		</td>

	</tr>


	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="midtext"><b>Show Calendar Name in Event List: </b></font><br />
		

		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="radio" name="show_calname" value="1" <?php if($_CONF[show_calname]) echo " CHECKED " ?> /> <font class="midtext"><b>Yes</b></font>
			&nbsp;&nbsp;
			<input type="radio" name="show_calname" value="0" <?php if(!$_CONF[show_calname]) echo " CHECKED " ?>/> <font class="midtext"><b>No</b></font>
		</td>

	</tr>


	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="midtext"><b>Show Event Location in Event List: </b></font><br />
		

		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="radio" name="show_location" value="1" <?php if($_CONF[show_location]) echo " CHECKED " ?> /> <font class="midtext"><b>Yes</b></font>
			&nbsp;&nbsp;
			<input type="radio" name="show_location" value="0" <?php if(!$_CONF[show_location]) echo " CHECKED " ?>/> <font class="midtext"><b>No</b></font>
		</td>

	</tr>


	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="midtext"><b>Show Event Time in Event List: </b></font><br />
		

		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="radio" name="show_time" value="1" <?php if($_CONF[show_time]) echo " CHECKED " ?> /> <font class="midtext"><b>Yes</b></font>
			&nbsp;&nbsp;
			<input type="radio" name="show_time" value="0" <?php if(!$_CONF[show_time]) echo " CHECKED " ?>/> <font class="midtext"><b>No</b></font>
		</td>

	</tr>
	

	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="midtext"><b>Show Calendar Icon in Event List: </b></font><br />
		

		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="radio" name="show_calicon" value="1" <?php if($_CONF[show_calicon]) echo " CHECKED " ?> /> <font class="midtext"><b>Yes</b></font>
			&nbsp;&nbsp;
			<input type="radio" name="show_calicon" value="0" <?php if(!$_CONF[show_calicon]) echo " CHECKED " ?>/> <font class="midtext"><b>No</b></font>
		</td>

	</tr>


	

<tr>
		<td colspan="2" class="listingheader" align="center">
			<input type="hidden" name="user_id" value="<?php echo $user_id ?>">
			<input type="submit" value="Save Configuration Changes" class="buttons"/>
			<input type="reset" value="Reset Fields" class="buttons"/>
		</td>
</tr>
	
	
</table>


</form>

<br /><br />