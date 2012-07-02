<?php  extract($locdata); ?>

<table border="0" cellspacing="1" cellpadding="3" width="90%">
<tr>
	
	<!---------------------------------Main Calendar----------------------------------------->
	<td align="left" rowspan="1" valign="top" width="50%">
		
	<br />
	


<form name="locationupdate" method="post" action="updatelocation.php">


	<table border="1" cellpadding="6" cellspacing="0" class="table" width="100%">
		<tr>
			<td class="theader" colspan="1">
				
				Location Details
			
			</td>
			
			<td class="theader" colspan="1" align="right">
				
				<a href="locationdelete.php?lid=<?php echo $location_id ?>" class="catlink" onClick="return confirm('Deleting this location will also delete the related events. Are you sure you want to delete the selected location?')"><b>Delete</b></a>&nbsp;
			
			</td>
		</tr>
	


<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Title: </b></font><br />
			<font class="littletext">The title/name of the location</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="location_title" value="<?php echo $location_title ?>" class="textbox" size="40"/>
		</td>
	</tr>
	
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Address1: (optional)</b></font><br />
			<font class="littletext">The first address line of the location</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="address_1" value="<?php echo $address_1 ?>" class="textbox" size="40"/>
		</td>
	</tr>
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Address2: (optional) </b></font><br />
			<font class="littletext">The second address line of the location</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="address_2" value="<?php echo $address_2 ?>" class="textbox" size="40"/>
		</td>
	</tr>
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>City: (optional) </b></font><br />
			<font class="littletext">The name of the city</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="city" value="<?php echo $city ?>" class="textbox" size="40"/>
		</td>
	</tr>
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>State/Province: (optional) </b></font><br />
			<font class="littletext">The name of the state or province if applicable</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="state" value="<?php echo $state ?>" class="textbox" size="40"/>
		</td>
	</tr>
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Zip: (optional) </b></font><br />
			<font class="littletext">Zip code of the location</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="zip" value="<?php echo $zip ?>" class="textbox" size="40"/>
		</td>
	</tr>
	<tr>
		<td colspan="1" class="listingcell" valign="top">
			<font class="midtext"><b>Description</b></font><br />
			<font class="littletext">Description of the location</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<textarea cols="35" rows="5" name="location_desc"><?php echo $location_desc ?></textarea>
		</td>
	</tr>

<tr>
		<td colspan="2" class="listingheader" align="center">
			<input type="hidden" name="location_id" value="<?php echo $location_id ?>">
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
