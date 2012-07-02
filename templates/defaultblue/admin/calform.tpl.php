<?php extract($_POST) ?>
<table border="0" cellspacing="1" cellpadding="3" width="90%">
<tr>
	
	
	<td align="left" rowspan="1" valign="top" width="50%">
		
	<br />
	


<form name="contactupdate" method="post" action="caladd.php">


	<table border="1" cellpadding="6" cellspacing="0" class="table" width="100%">
		<tr>
			<td class="theader" colspan="2">
				
				Add A New Calendar
			
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
		<font class="orderbylink"><b>Category Details</b></font>
	</td>
</tr>	

<tr>
	<td colspan="1" class="listingcell">
		<font class="midtext"><b>Select Category </b></font><br />
		
	</td>
	<td colspan="1" align="left" class="listingcell">
		<select name="cat_id" class="textbox">
				
				<option value=0>Select a Category</option>

				<?php while($cat = $Result->getArray($catresult)) { 

					echo "<option value=\"$cat[cat_id]\"";
					
					if($cat[cat_id] == $cat_id) echo " selected ";
					
					echo ">$cat[cat_name]</option>";
				}

				?>

			</select>	
	</td>
</tr>

<tr>
	<td class="listingheader" height="25" colspan="2">
		<font class="orderbylink"><b>Add a new Category (use this form if you haven't chosen a category above)</b></font>
	</td>
</tr>

<tr>
		<td colspan="1" class="listingcell">
			<font class="<? echo ( $error[cat_name] ? "errortext" : "midtext" ) ?>"><b>Category Name: </b></font><br />
			
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="cat_name" value="<?php echo $cat_name ?>" class="textbox" size="40"/>
		</td>
	</tr>
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Category Image: (optional) </b></font><br />
			<font class="littletext">The location of the image at the top of this calendar view</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="cat_image" value="<?php echo $cat_image ?>" class="textbox" size="40"/>
		</td>
	</tr>

<tr>
	<td class="listingheader" height="25" colspan="2">
		<font class="orderbylink"><b>Calendar Details</b></font>
	</td>
</tr>	
<tr>
		<td colspan="1" class="listingcell">
			<font class="<? echo ( $error[calendar_name] ? "errortext" : "midtext" ) ?>"><b>Calendar Name: </b></font><br />
			
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="calendar_name" value="<?php echo $calendar_name ?>" class="textbox" size="40"/>
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
			<input type="submit" value="Add New Calendar"/>
			<input type="reset" value="Reset Fields"/>
		</td>
</tr>
	
	
</table>


</form>





</td>
</tr>
</table>

<br />
