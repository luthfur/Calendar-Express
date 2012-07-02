
	
<br /><br />
	
<center>
				
<table border="1" cellpadding="6" cellspacing="0" class="table" width="60%">
	<tr>
		<td class="theader" colspan="2">
				
			Log Into My Events
			
		</td>
	</tr>
	
	
	<?php if($error['login']) { ?>
	
	<tr>
		<td colspan="2" class="listingcell" height="40" valign="center">
			
			<font class="errortext"><b>Login Failed: Invalid Username or Password</b></font>
			
		</td>
	</tr>
	
	
	<?php } else { ?>
		
	<tr>
		<td colspan="2" class="listingcell" height="40" valign="center">
			
			<font class="basictext">Enter your Username and Password below to log into My Event</font>
			
		</td>
	</tr>
			
	<?php } ?>
	
	<form action="<?php echo "auth.php?cid=$cid&catid=$catid&d=$day&m=$month&y=$year" ?>" method="post">
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
			<font class="midtext"><b>Password:</b></font><br />
		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="password" name="userpass" class="textbox" size="30"/>	
		</td>
	</tr>
	
	<tr>
		<td colspan="2" height="35" class="listingcell">
			<center>
			<input type="submit" value="Log In" class="buttons" />
			<br /><br />
			<a href="passform.php" class="smalllink">Forgot your password?</a>
			
			
			<?php if($_CONF['allow_user_reg']) { ?> 
			
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="regform.php?<?php echo "cid=$cid&catid=$catid&m=$month&y=$year" ?>" class="smalllink">Register Now</a>
			
			<?php } ?>
			
			</center>
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