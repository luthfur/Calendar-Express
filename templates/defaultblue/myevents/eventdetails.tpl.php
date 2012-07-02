<?php 

extract($eventdata); 

?>



<form name="eventadd" method="post" action="updateevent.php" onSubmit="submitForm()">


	<table border="1" cellpadding="6" cellspacing="0" class="table" width="770">
		<tr>
			<td class="theader" colspan="1">
				
				Event Details
			
			</td>

			<td class="theader" colspan="1" align="right">
				
				<a href="eventdelete.php?eid=<?php echo $event_id ?>" class="tableheaderlink" onClick="return confirm('Are you sure you want delete this event?')"><b>Delete Event</b></a>&nbsp;&nbsp;
			
			</td>

		</tr>
	

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

					if($cal[calendar_id] == $calendar_id) echo "selected";
					
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
					
					if($i == $event_type) echo " selected ";
					
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
						
						<?php 
							
							$selected = 0;

							for ($i=1; $i<=count($_MONTH_NAME); $i++) { 
				
							echo "<option value=$i";
					
							if(($i == $start_month) || ($i == $month) && (!$selected)) {

									echo " selected ";
									$selected = 1;
								}

							echo ">$_MONTH_NAME[$i]</option>";
				
						 } ?>	
					</select>
					
					&nbsp;

						
					<select name="start_day" class="textbox">
							
							<?php 
								
								$selected = 0;

								for ($i=1; $i<=31; $i++) { 
				
								echo "<option value=$i";
					
								if(($i == $start_day) || ($i == $day) && (!$selected)) {

									echo " selected ";
									$selected = 1;
								}

								echo ">$i</option>";
				
							} ?>	
					
					</select>

					&nbsp;
						
						<select name="start_year" class="textbox">
							
							<?php 
								
							$display_year = $curyear;

							$selected = 0;

							for ($i=1; $i<=10; $i++) { 
				
								echo "<option value=$display_year";
					
								if(($display_year == $start_year) || ($display_year == $year) && (!$selected)) {

									echo " selected ";
									$selected = 1;
								}

								echo ">$display_year</option>";
															
								$display_year++;
							}
							

							?>
						
						</select>
		
		</td>
	</tr>
	
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Display Until:</b></font><br />
			<font class="littletext">Select the date until which the event will be displayed</font>
		</td>
		
		<td colspan="1" align="left" class="listingcell">
				
			
			<select name="stop_month" class="textbox">
						
						<?php 
							$selected = 0;

							for ($i=1; $i<=count($_MONTH_NAME); $i++) { 
				
							echo "<option value=$i";
					
							if($i == $stop_month || $i == $month && (!$selected)) {

									echo " selected ";
									$selected = 1;
								}

							echo ">$_MONTH_NAME[$i]</option>";
				
						 } ?>	
					</select>
					
					&nbsp;

						
					<select name="stop_day" class="textbox">
							
							<?php 
								
								$selected = 0;
								for ($i=1; $i<=31; $i++) { 
				
								echo "<option value=$i";
					
								if($i == $stop_day || $i == $day && (!$selected)) {

									echo " selected ";
									$selected = 1;
								}

								echo ">$i</option>";
				
							} ?>	
					
					</select>

					&nbsp;
						
						<select name="stop_year" class="textbox">
							
							<?php 
							$selected = 0;	
							$display_year = $curyear;

							for ($i=1; $i<=10; $i++) { 
				
								echo "<option value=$display_year";
					
								if($display_year == $stop_year || $display_year == $year && (!$selected)) {

									echo " selected ";
									$selected = 1;
								}

								echo ">$display_year</option>";
															
								$display_year++;
							}
							

							?>
						
						</select>



		</td>
	</tr>



<tr>
	<td class="listingheader" height="25" colspan="2">
		<font class="orderbylink"><b>Event Time</b></font>
	</td>
</tr>
		
	<tr>
		<td colspan="1" class="listingcell">
			<font class="<? echo ( $error[start_time] ? "errortext" : "midtext" ) ?>"><b>Start Time: </b></font><br />
			<font class="littletext">Enter the start time for the event</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			
			<select name="start_hour" class="textbox">		
				<?php

					for ($i=0; $i<=12; $i++) {
						
						echo "<option";
						
						if($i == $start_hour) echo " selected";
						
						echo ">" . $i . "</option>";
					}
				
				?>
					
			</select>
				
			<font class="littletext">Hours</font>	
			
			<select name="start_min" class="textbox">		
				<?php
										
					for ($i=0; $i<=59; $i++) {

						echo "<option value=$i";
						
						if($i == $start_min) echo " selected";
						
						echo ">";
						
						if($i < 10) echo "0";

						echo $i . "</option>";
					}
				
				?>
					
			</select>	
			
			<font class="littletext">Minutes</font>
			
			<select name="start_dst" class="textbox">		
				<?php
										
					echo "<option value=0";
						
						if($start_dst == 0) echo " selected";
						
						echo ">am</option>";
					
					echo "<option value=1";
						
						if($start_dst == 1) echo " selected";
						
						echo ">pm</option>";
					
				
				?>
					
			</select>	
		

		</td>
	</tr>

	


	<tr>
		<td colspan="1" class="listingcell">
			<font class="<? echo ( $error[start_time] ? "errortext" : "midtext" ) ?>"><b>End Time: </b></font><br />
			<font class="littletext">Enter the end time for the event</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			
			<select name="stop_hour" class="textbox">		
				<?php

					for ($i=0; $i<=12; $i++) {
						
						echo "<option";
						
						if($i == $stop_hour) echo " selected";
						
						echo ">" . $i . "</option>";
					}
				
				?>
					
			</select>
				
			<font class="littletext">Hours</font>	
			
			<select name="stop_min" class="textbox">		
				<?php
										
					for ($i=0; $i<=59; $i++) {

						echo "<option value=$i";
						
						if($i == $stop_min) echo " selected";
						
						echo ">";
						
						if($i < 10) echo "0";

						echo $i . "</option>";
					}
				
				?>
					
			</select>	
			
			<font class="littletext">Minutes</font>
			
			<select name="stop_dst" class="textbox">		
				<?php
										
					echo "<option value=0";
						
						if($stop_dst == 0) echo " selected";
						
						echo ">am</option>";
					
					echo "<option value=1";
						
						if($stop_dst == 1) echo " selected";
						
						echo ">pm</option>";
					
				
				?>
					
			</select>	



		</td>
	</tr>


	<?php if($_CONF[allow_texttime]) { ?>
	<tr>
		<td colspan="1" class="listingcell">
			<font class="<? echo ( $error[text_time] ? "errortext" : "midtext" ) ?>"><b>Text Time:  (optional)</b></font><br />
			<font class="<? echo ( $error[text_time] ? "errortext" : "littletext" ) ?>">If you haven't chosen a time above, specify a time here (example: "Morning", "TBA")</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="text_time" value="<?php echo $text_time ?>" class="textbox" size="40"/>
		</td>
	</tr>
	<?php } ?>


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
		<td colspan="2" class="listingcell" valign="top">
			
			
			<font class="<? echo ( $error[event_desc] ? "errortext" : "midtext" ) ?>"><b>Description</b></font><br />
			<font class="<? echo ( $error[event_desc] ? "errortext" : "littletext" ) ?>">Enter a description of the event</font>

			<br /><br />
				
				<script language="JavaScript" type="text/javascript">
			
				//Usage: initRTE(imagesPath, includesPath, cssFile)
				initRTE("<?php echo $graphics_path ?>rte/", "<?php echo $style_path ?>", "<?php echo $style_path ?>");

				</script>


				<noscript><p><b>Javascript must be enabled to use this form.</b></p></noscript>


				<script language="JavaScript" type="text/javascript">

				//Usage: writeRichText(fieldname, html, width, height, buttons)
				writeRichText('desc', '<?=RTESafe($event_desc)?>', 600, 200, true, false);

				</script>
				
				<br /><br />


		</td>
	</tr>






<tr>
	<td class="listingheader" height="25" colspan="2">
		<font class="orderbylink"><b>Contact and Location Details</b></font>
	</td>
</tr>	

<tr>
	<td colspan="1" class="listingcell">
		<font class="midtext"><b>Contact Name </b></font><br />
		<font class="littletext">Select a contact from the list or add a new location using the form below</font>
	</td>
	<td colspan="1" align="left" class="listingcell">
		
		
		
		<select name="contact_id" class="textbox">
				
				<?php

				echo "<option value=\"1\"";
					
					if($contact_id == 1) echo " selected ";
					
					echo ">Not Selected
					</option>";
				
				 while($con = $Result->getArray($conresult)) { 

					echo "<option value=\"$con[contact_id]\"";
					
					if($con[contact_id] == $contact_id) echo " selected ";
					
					echo ">$con[contact_name]</option>";
				}

				?>

		</select>	
	</td>
</tr>




<tr>
	<td colspan="1" class="listingcell">
		<font class="midtext"><b>Location </b></font><br />
		<font class="littletext">Select a location from the list or add a new location using the form below</font>
	</td>
	<td colspan="1" align="left" class="listingcell">
		<select name="location_id" class="textbox">
				
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
		<td colspan="2" class="listingheader" align="center">
			<input type="hidden" value="" name="event_desc" id="event_desc" />
			<input type="hidden" name="event_id" value="<?php echo $event_id ?>">
			<input type="hidden" name="type_id" value="<?php echo $type_id ?>">
			<input type="submit" value="Save Changes" class="buttons"/>
			<input type="reset" value="Reset Fields" class="buttons"/>
		</td>
</tr>
	
	
</table>


</form>
