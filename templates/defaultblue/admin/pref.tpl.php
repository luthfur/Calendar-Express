<form name="inspdetails" method="POST" action="changepass.php">

	<table border="1" cellpadding="6" cellspacing="0" class="table" width="85%">
		<tr>
			<td class="theader" colspan="2">
				
			 Change Your Password
			
			</td>
		
		</tr>
		
		<?php
		if(isset($error)) {

		?>


		<tr>
		<td colspan="2" class="listingcell">
			
			<font class="errortext"><b>Error: One or more entries missing or invalid</b></font><br />
			
		</td>

	</tr>

	<?php

		}	 

	?>

	
		<tr>
		<td colspan="1" class="listingcell" width="55%">
		
			<font class="midtext"><b>Current Password:</b></font><br />
			
		</td>

		<td colspan="1" align="left" class="listingcell">
	
		<input type="password" name="currpass" class="textbox" size="40"/>
		
	
		</td>
	</tr>
	
	
	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="midtext"><b>New Password:</b></font><br />
		
		</td>

		<td colspan="1" align="left" class="listingcell">
	
			<input type="password" name="newpass" class="textbox" size="40"/>
		
	
		</td>
	</tr>
	
	
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Confirm New Password:</b></font><br />
		</td>
		<td colspan="1" align="left" class="listingcell">
				
			<input type="password" name="confpass" class="textbox" size="40"/>
		
		</td>
	</tr>

		

<tr>
		<td colspan="2" class="listingheader" align="center">
			<input type="hidden" name ="admin_id" value="1" class="buttons"/>
			<input type="submit" value="Save Changes" class="buttons"/>
			<input type="reset" value="Reset Fields" class="buttons"/>
		</td>
</tr>
	
	
</table>
</form>