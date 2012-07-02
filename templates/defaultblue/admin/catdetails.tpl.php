<?php 	extract($catdata);  ?>

<table border="0" cellspacing="1" cellpadding="3" width="90%">
<tr>
	
	
	<td align="left" rowspan="1" valign="top" width="50%">
		
	<br />
	


<form name="contactupdate" method="post" action="catupdate.php">


	<table border="1" cellpadding="6" cellspacing="0" class="table" width="100%">
		<tr>
			<td class="theader" colspan="1">
				
				Category Details
			
			</td>
			
			<td class="theader" colspan="1" align="right">
				
				<a href="catdelete.php?catid=<?php echo $cat_id ?>" class="catlink" onClick="return confirm('All calendars in this category will be deleted as well. Are you sure you want to delete the selected category?')"><b>Delete</b></a>&nbsp;
			
			</td>

		</tr>
	


<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Category Name: </b></font><br />
			
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
		<td colspan="2" class="listingheader" align="center">
			<input type="hidden" name="cat_id" value="<?php echo $cat_id ?>">
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

