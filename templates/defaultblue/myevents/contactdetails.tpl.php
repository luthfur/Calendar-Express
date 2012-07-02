<?php 	extract($contactdata);  ?>



<form name="contactupdate" method="post" action="updatecontact.php">


	<table border="1" cellpadding="6" cellspacing="0" class="table" width="770">
		<tr>
			<td class="theader" colspan="1">
				
				Contact Details
			
			</td>

			<td class="theader" colspan="1" align="right">
				
				<a href="contactdelete.php?conid=<?php echo $contact_id ?>" class="tableheaderlink" onClick="return confirm('Are you sure you want delete this contact?')"><b>Delete Contact</b></a>&nbsp;&nbsp;
			
			</td>
		</tr>
	


<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Contact Name: </b></font><br />
			<font class="littletext">The contact name of the organisers of this event</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="contact_name" value="<?php echo $contact_name ?>" class="textbox" size="40"/>
		</td>
	</tr>
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Contact Email: (optional) </b></font><br />
			<font class="littletext">The email address of the organisers of this event</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="contact_email" value="<?php echo $contact_email ?>" class="textbox" size="40"/>
		</td>
	</tr>
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Contact Telephone: (optional)</b></font><br />
			<font class="littletext">The telephone number of the organisers of this event</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="contact_phone" value="<?php echo $contact_phone ?>" class="textbox" size="40"/>
		</td>
	</tr>


<tr>
		<td colspan="2" class="listingheader" align="center">
			<input type="hidden" name="contact_id" value="<?php echo $contact_id ?>">
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
