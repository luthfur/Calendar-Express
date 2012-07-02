
	
<br /><br />
	
<center>
				
<table border="1" cellpadding="6" cellspacing="0" class="table" width="60%">
	<tr>
		<td class="theader" colspan="2">
				
			My Events Password Recovery Form
			
		</td>
	</tr>
	
	
	<?php if($error['match']) { ?>
	
	<tr>
		<td colspan="2" class="listingcell" height="40" valign="center">
			
			<font class="errortext"><b>Invalid username and email data</b></font>
			
		</td>
	</tr>
	
	
	<?php } else { ?>
		
	<tr>
		<td colspan="2" class="listingcell" height="40" valign="center">
			
			<font class="basictext">Enter your Username and corresponding email address below</font>
			
		</td>
	</tr>
			
	<?php } ?>
	
	<form action="<?php echo "recoverpass.php?cid=$cid&catid=$catid&d=$day&m=$month&y=$year" ?>" method="post">
	<tr>
		<td colspan="1" class="listingcell" width="35%">
			<font class="midtext"><b>Username:</b></font><br />
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="username" class="textbox" size="30"/>	
		</td>
	</tr>
	
	<tr>
		<td colspan="1" class="listingcell" width="35%">
			<font class="midtext"><b>Email:</b></font><br />
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="email" class="textbox" size="30"/>	
		</td>
	</tr>
	
	
	<tr>
		<td colspan="2" class="listingcell" align="center" width="35%">
			<input type="submit" value="Recover Password" class="buttons" />
		</td>
		
	</tr>

	
	
	
	<input type='hidden' name='cid' value='<?php echo $cid ?>'>
	<input type='hidden' name='catid' value='<?php echo $catid ?>'>
	<input type='hidden' name='d' value='<?php echo $day ?>'>	
	<input type='hidden' name='w' value='<?php echo $weeknum ?>'>
	<input type='hidden' name='m' value='<?php echo $month ?>'>
	<input type='hidden' name='y' value='<?php echo $year ?>'>
	
	</form>
	
</table>

</center>