<?php extract($_POST) ?>

<table border="0" cellspacing="1" cellpadding="3" width="90%">
<tr>
	
	<!---------------------------------Main Calendar----------------------------------------->
	<td align="left" rowspan="1" valign="top" width="50%">
		
	<br />
	


<form name="eventadd" method="post" action="addevent.php">


	<table border="1" cellpadding="6" cellspacing="0" class="table" width="100%">
		<tr>
			<td class="theader" colspan="2">
				
				Add A New Event
			
			</td>
		</tr>
	

<?php

if(isset($error)) {

?>


<tr>
		<td colspan="2" class="listingcell">
			<font class="errortext"><b>Error: One or more entries missing or invalid</b></font><br />
			<font class="littletext">See below for details</font>
		</td>

</tr>

<?php

} 

?>



<tr>
	<td class="listingheader" height="25" colspan="2">
		<font class="orderbylink"><b>Select Calendar</b></font>
	</td>

</tr>
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Select Calendar:</b></font><br />
			<font class="littletext">Select the calendar to which the event will be added</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<select name="calendar_id" class="textbox">
				
				<?php while($cal = $Result->getArray($calresult)) { 

					echo "<option value=\"$cal[calendar_id]\"";

					if($i == $calendar_id) echo "selected";
					
					echo ">$cal[calendar_name]</option>";
				}

				?>

			</select>	
		</td>
	</tr>
	
	<tr>
	<td class="listingheader" height="25" colspan="2">
		<font class="orderbylink"><b>Event Occurence</b></font>
	</td>
	</tr>
	
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Reccurence:</b></font><br />
			<font class="littletext">Select how the event will recurr</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<select name="event_type" class="textbox">
				
				<?php for ($i=1; $i<=count($_EVENT_TYPE); $i++) { 
				
					echo "<option value=$i";
					
					if($i == $event_type) echo " selected";
					
					echo ">$_EVENT_TYPE[$i]</option>";
				
				 } ?>

			</select>
		
		</td>
	</tr>
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Event Date:</b></font><br />
			<font class="littletext">Select the date of the event</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
					<select name="start_month" class="textbox">
						
						<?php for ($i=1; $i<=count($_MONTH_NAME); $i++) { 
				
							echo "<option value=$i";
					
							if(($i == $start_month) || ($i == $month)) echo " selected ";
					
							echo ">$_MONTH_NAME[$i]</option>";
				
						 } ?>	
					</select>
					
					&nbsp;

						
					<select name="start_day" class="textbox">
							
							<?php for ($i=1; $i<=31; $i++) { 
				
								echo "<option value=$i";
					
								if(($i == $start_day) || ($i == $day)) echo " selected ";
					
								echo ">$i</option>";
				
							} ?>	
					
					</select>

					&nbsp;
						
						<select name="start_year" class="textbox">
							
							<?php 
								
							$display_year = $curyear;

							for ($i=1; $i<=10; $i++) { 
				
								echo "<option value=$display_year";
					
								if(($display_year == $start_year) || ($display_year == $year)) echo " selected ";
					
								echo ">$display_year</option>";
															
								$display_year++;
							}
							

							?>
						
						</select>
		
		</td>
	</tr>
	
	<tr>
		<td colspan="1" class="listingcell">
			<font class="<? echo ( $error[stop_date] ? "errortext" : "midtext" ) ?>"><b>Display Until:</b></font><br />
			<font class="<? echo ( $error[stop_date] ? "errortext" : "littletext" ) ?>">Select the date until which the event will be displayed</font>
		</td>
		
		<td colspan="1" align="left" class="listingcell">
				
			
			<select name="stop_month" class="textbox">
						
						<?php for ($i=1; $i<=count($_MONTH_NAME); $i++) { 
				
							echo "<option value=$i";
					
							if($i == $stop_month || $i == $month) echo " selected ";
					
							echo ">$_MONTH_NAME[$i]</option>";
				
						 } ?>	
					</select>
					
					&nbsp;

						
					<select name="stop_day" class="textbox">
							
							<?php for ($i=1; $i<=31; $i++) { 
				
								echo "<option value=$i";
					
								if($i == $stop_day || $i == $day) echo " selected ";
					
								echo ">$i</option>";
				
							} ?>	
					
					</select>

					&nbsp;
						
						<select name="stop_year" class="textbox">
							
							<?php 
								
							$display_year = $curyear;

							for ($i=1; $i<=10; $i++) { 
				
								echo "<option value=$display_year";
					
								if($display_year == $stop_year || $display_year == $year) echo " selected ";
					
								echo ">$display_year</option>";
															
								$display_year++;
							}
							

							?>
						
						</select>


		</td>
	</tr>

<tr>
	<td class="listingheader" height="25" colspan="2">
		<font class="orderbylink"><b>Event Details</b></font>
	</td>
</tr>
	<tr>
		<td colspan="1" class="listingcell">
			<font class="<? echo ( $error[event_title] ? "errortext" : "midtext" ) ?>"><b>Title: </b></font><br />
			<font class="<? echo ( $error[event_title] ? "errortext" : "littletext" ) ?>">Enter the title/name of the event</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="event_title" value="<?php echo $event_title ?>" class="textbox" size="40"/>
		</td>
	</tr>
	
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Time: (optional)</b></font><br />
			<font class="littletext">Enter the time of the event</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			
			<select name="hours" class="textbox">		
				<?php

					for ($i=1; $i<=12; $i++) {
						
						echo "<option";
						
						if($i == $hours) echo " selected";
						
						echo ">" . $i . "</option>";
					}
				
				?>
					
			</select>
				
			<font class="littletext">Hours</font>	
			
			<select name="minutes" class="textbox">		
				<?php
										
					for ($i=0; $i<=59; $i++) {

						echo "<option value=$i";
						
						if($i == $minutes) echo " selected";
						
						echo ">";
						
						if($i < 10) echo "0";

						echo $i . "</option>";
					}
				
				?>
					
			</select>	
			
			<font class="littletext">Minutes</font>

			<select name="timeofday" class="textbox">		
				<?php
										
					echo "<option value=0";
						
						if($timeofday == 0) echo " selected";
						
						echo ">am</option>";
					
					echo "<option value=1";
						
						if($timeofday == 1) echo " selected";
						
						echo ">pm</option>";
					
				
				?>
					
			</select>	


		</td>
	</tr>
	
	<tr>
		<td colspan="1" class="listingcell" valign="top">
			<font class="<? echo ( $error[event_desc] ? "errortext" : "midtext" ) ?>"><b>Description</b></font><br />
			<font class="<? echo ( $error[event_desc] ? "errortext" : "littletext" ) ?>">Enter a description of the event</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<textarea cols="35" rows="5" name="event_desc"><?php echo $event_desc ?></textarea>
		</td>
	</tr>

<tr>
	<td class="listingheader" height="25" colspan="2">
		<font class="orderbylink"><b>Contact Details</b></font>
	</td>
</tr>	

<tr>
	<td colspan="1" class="listingcell">
		<font class="midtext"><b>Select Contact Name (optional)</b></font><br />
		<font class="littletext">Select a contact from the list or add a new location using the form below</font>
	</td>
	<td colspan="1" align="left" class="listingcell">
		<select name="contact_id" class="textbox">
				
				<option value=0>Select a Contact</option>

				<?php while($con = $Result->getArray($conresult)) { 

					echo "<option value=\"$con[contact_id]\"";
					
					if($con[contact_id] == $contact_id) echo " selected ";
					
					echo ">$con[contact_name]</option>";
				}

				?>

			</select>	
	</td>
</tr>


<tr>
	<td class="listingheader" height="25" colspan="2">
		<font class="orderbylink"><b>Add a new Contact (use this form if you haven't chosen a contact above)</b></font>
	</td>
</tr>


<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Contact Name: (optional) </b></font><br />
			<font class="littletext">Enter the contact name of the organisers of this event</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="contact_name" value="<?php echo $contact_name ?>" class="textbox" size="40"/>
		</td>
	</tr>
	<tr>
		<td colspan="1" class="listingcell">
			<font class="<? echo ( $error[contact_email] ? "errortext" : "midtext" ) ?>"><b>Contact Email: (optional) </b></font><br />
			<font class="<? echo ( $error[contact_email] ? "errortext" : "littletext" ) ?>">Enter the email address of the organisers of this event</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="contact_email" value="<?php echo $contact_email ?>" class="textbox" size="40"/>
		</td>
	</tr>
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Contact Telephone: (optional) </b></font><br />
			<font class="littletext">Enter the telephone number of the organisers of this event</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="contact_phone" value="<?php echo $contact_phone ?>" class="textbox" size="40"/>
		</td>
	</tr>



<tr>
	<td class="listingheader" height="25" colspan="2">
		<font class="orderbylink"><b>Location Details</b></font>
	</td>
</tr>	

<tr>
	<td colspan="1" class="listingcell">
		<font class="midtext"><b>Select Location </b></font><br />
		<font class="littletext">Select a location from the list or add a new location using the form below</font>
	</td>
	<td colspan="1" align="left" class="listingcell">
		<select name="location_id" class="textbox">
				
				<option value=0>Select a Location</option>

				<?php while($loc = $Result->getArray($locresult)) { 

					echo "<option value=\"$loc[location_id]\"";
					
					if($loc[location_id] == $location_id) echo " selected ";
					
					echo ">$loc[location_title]</option>";
				}

				?>

			</select>	
	</td>
</tr>

<tr>
	<td class="listingheader" height="25" colspan="2">
		<font class="orderbylink"><b>Add New Location (use this form if you haven't chosen a location above)</b></font>
	</td>
</tr>



<tr>
		<td colspan="1" class="listingcell">
			<font class="<? echo ( $error[location_title] ? "errortext" : "midtext" ) ?>"><b>Title: </b></font><br />
			<font class="<? echo ( $error[location_title] ? "errortext" : "littletext" ) ?>">Enter the title/name of the location</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="location_title" value="<?php echo $location_title ?>" class="textbox" size="40"/>
		</td>
	</tr>
	
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Address1: (optional)</b></font><br />
			<font class="littletext">Enter the first address line of the location</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="address_1" value="<?php echo $address_1 ?>" class="textbox" size="40"/>
		</td>
	</tr>
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Address2: (optional) </b></font><br />
			<font class="littletext">Enter the second address line of the location</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="address_2" value="<?php echo $address_2 ?>" class="textbox" size="40"/>
		</td>
	</tr>
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>City: (optional) </b></font><br />
			<font class="littletext">Enter the name of the city</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="city" value="<?php echo $city ?>" class="textbox" size="40"/>
		</td>
	</tr>
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>State/Province: (optional) </b></font><br />
			<font class="littletext">Enter the name of the state or province if applicable</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="state" value="<?php echo $state ?>" class="textbox" size="40"/>
		</td>
	</tr>
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Zip: (optional) </b></font><br />
			<font class="littletext">Enter the zip code of the location</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="zip" value="<?php echo $zip ?>" class="textbox" size="40"/>
		</td>
	</tr>
	<tr>
		<td colspan="1" class="listingcell" valign="top">
			<font class="<? echo ( $error[location_desc] ? "errortext" : "midtext" ) ?>"><b>Description</b></font><br />
			<font class="<? echo ( $error[location_desc] ? "errortext" : "littletext" ) ?>">Enter a description of the location</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<textarea cols="35" rows="5" name="location_desc"><?php echo $location_desc ?></textarea>
		</td>
	</tr>

<tr>
		<td colspan="2" class="listingheader" align="center">
			<input type="submit" value="Post Event" class="buttons"/>
			<input type="reset" value="Reset Fields" class="buttons"/>
		</td>
</tr>
	
	
</table>


</form>





</td>
</tr>
</table>

<br />


</td>
	<!---------------------------------Main Calendar Ends------------------------------------->

	</tr>

</table>