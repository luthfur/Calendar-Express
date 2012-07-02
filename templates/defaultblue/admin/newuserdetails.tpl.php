<?php extract($userdata) ?>
	


<form name="locationadd" method="post" action="updateuser.php">


	<table border="1" cellpadding="6" cellspacing="0" class="table" width="85%">
		<tr>
			<td class="theader" colspan="1">
				
				User Details for <?php echo $user_name ?>
			
			</td>

			<td class="theader" colspan="1" align="right">

				<a href="userapprove.php?uid=<?php echo $user_id ?>" class="catlink"><b>Approve</b></a>&nbsp;&nbsp;
				
				<a href="userreject.php?uid=<?php echo $user_id ?>" class="catlink" onClick="return confirm('Are you sure you want to reject the selected user?')"><b>Reject</b></a>&nbsp;
			
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
		
			<font class="midtext"><b>Full Name: (optional) </b></font><br />
		
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="full_name" value="<?php echo $full_name ?>" class="textbox" size="40"/>
		</td>
	</tr>
	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="midtext"><b>Telephone: (optional) </b></font><br />
	
		</td>
		<td colspan="1" align="left" class="listingcell">
			
			<input type="text" name="telephone" value="<?php echo $telephone ?>" class="textbox" size="40"/>
		
		</td>
	</tr>
	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="<? echo ( $error[email] ? "errortext" : "midtext" ) ?>"><b>Email </b></font><br />
			
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="email" value="<?php echo $email ?>" class="textbox" size="40"/>
		</td>
	</tr>
	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="midtext"><b>Status: (optional) </b></font><br />
	
		</td>
		<td colspan="1" align="left" class="listingcell">
			<select name="status" class="textbox">
			
			<?php	for ($i=2; $i<=count($_STATUS); $i++) { ?>
				
				<option value="<?php echo $i ?>"
				
				<?php if($i == $status) echo " selected"?>

				>

				<?php echo $_STATUS[$i] ?>
				
				</option>

			<?php }	?>
			
			</select>
		</td>
	</tr>
	

<tr>
		<td colspan="2" class="listingheader" align="center">
			<input type="hidden" name="user_id" value="<?php echo $user_id ?>">
			<input type="submit" value="Save Changes" class="buttons"/>
			<input type="reset" value="Reset Fields" class="buttons"/>
		</td>
</tr>
	
	
</table>

<br /><br />

</form>



<br />


