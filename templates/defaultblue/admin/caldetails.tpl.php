<?php 	extract($caldata);  ?>
<table border="0" cellspacing="1" cellpadding="3" width="90%">
<tr>
	
	
	<td align="left" rowspan="1" valign="top" width="50%">
		
	<br />
	


<form name="contactupdate" method="post" action="calupdate.php">


	<table border="1" cellpadding="6" cellspacing="0" class="table" width="100%">
		<tr>
			<td class="theader" colspan="1">
				
				Calendar Details
			
			</td>

			<td class="theader" colspan="1" align="right">
				
				<a href="caldelete.php?cid=<?php echo $calendar_id ?>" class="catlink" onClick="return confirm('Are you sure you want to delete the selected calendar?')"><b>Delete</b></a>&nbsp;
			
			</td>

		</tr>
	

<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Calendar ID: </b></font><br />
			
		</td>
		<td colspan="1" align="left" class="listingcell">
			<font class="basictext"><?php echo $calendar_id ?></font>
		</td>
	</tr>

<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Calendar Name: </b></font><br />
			
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="calendar_name" value="<?php echo $calendar_name ?>" class="textbox" size="40"/>
		</td>
	</tr>

	<tr>
	<td colspan="1" class="listingcell">
		<font class="midtext"><b>Category </b></font><br />
		
	</td>
	<td colspan="1" align="left" class="listingcell">
		<select name="cat_id" class="textbox">
				
				
				<?php while($cat = $Result->getArray($catresult)) { 

					echo "<option value=\"$cat[cat_id]\"";
					
					if($cat[cat_id] == $cat_id) echo " selected ";
					
					echo ">$cat[cat_name]</option>";
				}

				?>

			</select>	

			&nbsp;&nbsp;

			<a href="catform.php?cid=<?php echo $calendar_id ?>&prevcatid=<?php echo $cat_id ?>" class="basiclink">Move to New Category</a>
	</td>
</tr>

	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Calendar Image: (optional) </b></font><br />
			<font class="littletext">The location of the image at the top of this calendar view</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="calendar_image" value="<?php echo $calendar_image ?>" class="textbox" size="40"/>
		</td>
	</tr>
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Calendar Icon: (optional)</b></font><br />
			<font class="littletext">The location of the icon beside every event in this calendar</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="calendar_icon" value="<?php echo $calendar_icon ?>" class="textbox" size="40"/>
		</td>
	</tr>


<tr>
		<td colspan="2" class="listingheader" align="center">
			<input type="hidden" name="prev_cat_id" value="<?php echo $cat_id ?>">
			<input type="hidden" name="calendar_id" value="<?php echo $calendar_id ?>">
			<input type="submit" value="Save Changes" class="buttons"/>
			<input type="reset" value="Reset Fields" class="buttons"/>
		</td>
</tr>
	
	
</table>


</form>





</td>
</tr>
</table>

<br />
