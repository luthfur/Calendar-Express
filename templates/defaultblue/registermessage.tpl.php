<p>&nbsp;&nbsp;</p>
<center>
<table cellpadding="4" cellspacing="0" class="table" width="60%">

	<tr>
	
		<td class="tevents1" align="center" width="50%">
			
			<br />
			
			<font class="basictext"><b>Thank you for registering with us.</b></font>
			
			<p></p>
			
			<?php if($_CONF['allow_user_reg'] == 2) { ?>
				
				<a href="login.php" class="basiclink">Click here</a><font class="basictext"> to login now</font>
			
				<?php } else { ?>
				
				<font class="basictext">A confirmation email has been sent to you.</font>
				
			<?php } ?>
			
			
			
			<p></p>
			
			<a href="<?php echo $link ?>" class="smalllink">
				Click here to go to the calendar you were previously viewing.
			</a>
				 
			<p></p>
				
					
		</td>

	</tr>

</table>
</center>