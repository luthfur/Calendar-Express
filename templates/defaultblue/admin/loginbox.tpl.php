
	
<br /><br />
	
<center>
				
<table border="1" cellpadding="6" cellspacing="0" class="table" width="60%">
	<tr>
		<td class="theader" colspan="2">
				
			Log Into Calendar Express Administration Panel
			
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
			
			<font class="basictext">Enter your Username and Password below to log into Administration</font>
			
		</td>
	</tr>
			
	<?php } ?>
	
	<form action="auth.php?direct=1" method="post">
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
			
			<input type="submit" value="Log In" />

			<br /><br />
			<a href="passform.php" class="smalllink">Forgot your password?</a>
			
						
			</center>
		</td>
	</tr>
		
	</form>
	
</table>

</center>