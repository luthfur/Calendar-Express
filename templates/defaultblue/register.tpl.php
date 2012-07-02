<center>

	
	<br />
				
	<table border="1" cellpadding="6" cellspacing="0" class="table" width="89%">
		<tr>
			<td class="theader" colspan="2">
				
				New User Registration
			
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
	<td class="listingheader" height="25" colspan="2" width="89%">
		<font class="orderbylink"><b>Log In Details</b></font>
	</td>
	</tr>
	
	<form method="post" action="register.php" >
	
	<?php if($error['user_name']) { ?>
	<tr>
		<td colspan="2" class="listingcell">
			<font class="errortext"><b>Username already exists</b></font>
		</td>
	</tr>
	<?php } ?>
	
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>User Name:</b></font><br />
			<font class="littletext">Enter the desired username</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="user_name" value="<?php echo $val[user_name] ?>" class="textbox" size="40"/>
		</td>
	</tr>
	
	<?php if($error['user_pass'] || $error['verifypass']) { ?>
	<tr>
		<td colspan="2" class="listingcell">
			<font class="errortext"><b>Password missmatch<b></font>
		</td>
	</tr>
	<?php } ?>
	
	
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Desired Password:</b></font><br />
			<font class="littletext">Enter the desired password</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="password" name="user_pass" value="<?php echo $val[user_pass] ?>" class="textbox" size="40"/>
		</td>
	</tr>
	
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Re-enter Password:</b></font><br />
			<font class="littletext">Verify the desired password</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="password" name="verifypass" value="<?php echo $val[verifypass] ?>" class="textbox" size="40"/>
		</td>
	</tr>
	
		
	
	<tr>
	<td class="listingheader" height="25" colspan="2">
		<font class="orderbylink"><b>Other Information</b></font>
	</td>
	</tr>
		
		
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Full Name: (optional)</b></font><br />
			<font class="littletext">Enter you full name</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="fullname" value="<?php echo $val[fullname] ?>" class="textbox" size="40"/>
		</td>
	</tr>
	
	
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Telephone:(optional)</b></font><br />
			<font class="littletext">Enter contact telephone number</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="phone" value="<?php echo $val[phone] ?>" class="textbox" size="40"/>
		</td>
	</tr>
	
	<?php if($error['email']) { ?>
	<tr>
		<td colspan="2" class="listingcell">
			<font class="errortext"><b>Email address invalid</b></font>
		</td>
	</tr>
	<?php } ?>	
	
	
	<tr>
		<td colspan="1" class="listingcell">
			<font class="midtext"><b>Email Address:</b></font><br />
			<font class="littletext">Enter contact e-mail address</font>
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="email" value="<?php echo $val[email] ?>" class="textbox" size="40"/>
		</td>
	</tr>
	
	<tr>
		<td colspan="2" class="listingheader" align="center">
			<input type='hidden' name='cid' value='<?php echo $cid ?>'>
			<input type='hidden' name='catid' value='<?php echo $catid ?>'>
			<input type='hidden' name='d' value='<?php echo $day ?>'>	
			<input type='hidden' name='w' value='<?php echo $weeknum ?>'>
			<input type='hidden' name='m' value='<?php echo $month ?>'>
			<input type='hidden' name='y' value='<?php echo $year ?>'>
			<input type='hidden' name='status' value=3>
			<input type="hidden" name ="eventtype" value="3" class="buttons"/>
			<input type="submit" value="Register" class="buttons"/>
			<input type="reset" value="Reset Fields" class="buttons"/>
		</td>
	</tr>
	</form>
	
	
</table>

<br />


</center>
