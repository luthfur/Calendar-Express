<?php extract($_POST) ?>
<table border="0" cellspacing="1" cellpadding="3" width="90%">
<tr>
	
	<!---------------------------------Main Calendar----------------------------------------->
	<td align="left" rowspan="1" valign="top" width="50%">
		
	<br />
	


<form name="locationadd" method="post" action="adduser.php">


	<table border="1" cellpadding="6" cellspacing="0" class="table" width="100%">
		<tr>
			<td class="theader" colspan="2">
				
				Add A New User
			
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
			
			<font class="<? echo ( $error[user_name] ? "errortext" : "midtext" ) ?>"><b>Username: </b></font><br />
			
			<?php if($error[user_exists]) { ?>
				<font class="littletext">The username is already in use</font>  
			<?php } ?>

		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="user_name" value="<?php echo $user_name ?>" class="textbox" size="40"/>
		</td>
	</tr>
	
	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="<? echo ( $error[pass] ? "errortext" : "midtext" ) ?>"><b>Password:</b></font><br />
	
		</td>
		<td colspan="1" align="left" class="listingcell">
		
			<input type="password" name="user_pass" value="<?php echo $user_pass ?>" class="textbox" size="40"/>
		
		</td>
	</tr>

	<tr>
		<td colspan="1" class="listingcell">
		
			<font class="<? echo ( $error[pass] ? "errortext" : "midtext" ) ?>"><b>Confirm Password: </b></font><br />
		
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="password" name="user_pass2" value="<?php echo $user_pass2 ?>" class="textbox" size="40"/>
		</td>
	</tr>

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
			
			<font class="midtext"><b>Status: </b></font><br />
	
		</td>
		<td colspan="1" align="left" class="listingcell">
			<select id="status" name="status" class="textbox" onChange="AdminSelect()">
			
			<?php	for ($i=2; $i<=count($_STATUS); $i++) { ?>
				
				<option value="<?php echo $i ?>"
				
				<?php if($i == $status || ($i==3 && !$status)) echo " selected" ?>

				>

				<?php echo $_STATUS[$i] ?>
				
				</option>

			<?php }	?>
			
			</select>
		</td>
	</tr>

	<tr>
		<td colspan="1" class="listingcell" valign="top">
			
			<font class="midtext"><b>Calendar Privileges: </b></font><br />
	
		</td>
		<td colspan="1" align="left" class="listingcell">
			<select id="priv" name="cid[]" class="textbox" size="8" MULTIPLE>
			
			<?php	while($caldata = $Result->getArray($calresult)) { ?>
				
				<option value="<?php echo $caldata[calendar_id] ?>"
				
				<?php if($cid == $caldata[calendar_id] ) echo " selected"?>

				>

				<?php echo $caldata[calendar_name]  ?>
				
				</option>

				


			<?php }	?>
			
			</select>
			<br />
				<font class="basictext">(To select multiple calendars, hold down CTRL while clicking)</font>
				<br />
		

		</td>
	</tr>
	

<tr>
		<td colspan="2" class="listingheader" align="center">
			<input type="hidden" name="user_id" value="<?php echo $user_id ?>">
			<input type="submit" value="Add New User"/>
			<input type="reset" value="Reset Fields"/>
		</td>
</tr>
	
	
</table>


</form>





</td>
</tr>
</table>

<br />
