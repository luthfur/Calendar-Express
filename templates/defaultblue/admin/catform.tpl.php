
<table border="0" cellspacing="1" cellpadding="3" width="90%">
<tr>
	
	
	<td align="left" rowspan="1" valign="top" width="50%">
		
	<br />
	


<form name="contactupdate" method="post" action="catadd.php">


	<table border="1" cellpadding="6" cellspacing="0" class="table" width="100%">
		<tr>
			<td class="theader" colspan="2">
				
				Add A New Category
			
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
		<td colspan="2" class="listingheader" align="center">
			<input type="hidden" name="prev_cat_id" value="<?php echo $_GET[prevcatid] ?>"/>
			<input type="hidden" name="cid" value="<?php echo $_GET[cid] ?>"/>
			<input type="submit" value="Add Category"/>
			<input type="reset" value="Reset Fields"/>
		</td>
</tr>
	
	
</table>


</form>





</td>
</tr>
</table>

<br />
