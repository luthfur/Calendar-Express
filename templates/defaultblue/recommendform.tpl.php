
<br /><br />

	
<center>
				
<table cellpadding="6" cellspacing="0" width="100%">
	<tr>
		<td class="theader" colspan="2">
				
			Recommend this event to a friend!
			
		</td>
	</tr>
	
	
	<?php if($error) { ?>
	
	<tr>
		<td colspan="2" class="listingcell" height="40" valign="center">
			
			<font class="errortext"><b>One of more entries missing or incorrect</b></font>
			
		</td>
	</tr>
	
	
	<?php } ?>
		
	
	
	<form action="sendrec.php" method="post">
	<tr>
		<td colspan="1" class="listingcell" width="40%">
			<font class="<? echo ( $error[send_email] ? "errortext" : "basictext" ) ?>"><b>Recipient Email Address:</b></font><br />
		</td>
		<td colspan="1" align="left">
			<input type="text" name="send_email" class="textbox" size="30"/>	
		</td>
	</tr>

	<tr>
		<td colspan="1" class="listingcell" width="40%">
			<font class="<? echo ( $error[rec_name] ? "errortext" : "basictext" ) ?>"><b>Recipient Name:</b></font><br />
		</td>
		<td colspan="1" align="left">
			<input type="text" name="rec_name" class="textbox" size="30"/>	
		</td>
	</tr>
	
	<tr>
		<td colspan="1" class="listingcell" width="40%">
			<font class="<? echo ( $error[user_email] ? "errortext" : "basictext" ) ?>"><b>Your Email Address:</b></font><br />
		</td>
		<td colspan="1" align="left">
			<input type="text" name="user_email" class="textbox" size="30"/>	
		</td>
	</tr>

	<tr>
		<td colspan="1" class="listingcell" width="40%">
			<font class="<? echo ( $error[sender_name] ? "errortext" : "basictext" ) ?>"><b>Your Name:</b></font><br />
		</td>
		<td colspan="1" align="left">
			<input type="text" name="sender_name" class="textbox" size="30"/>	
		</td>
	</tr>

	<tr>
		<td colspan="1" class="listingcell" width="40%" valign="top">
			<font class="basictext"><b>Your Message: (optional)</b></font><br />
		</td>
		<td colspan="1" align="left">
			<textarea name="message" cols="30" rows="6"></textarea>	
		</td>
	</tr>


	
	<tr>
		<td colspan="2" height="35" class="listingcell">
			<center>
			<input type="submit" value="Send it" class="buttons" />
			<br />			
			</center>
		</td>
	</tr>

	<input type='hidden' name='d' value='<?php echo $_GET[d] ?>'>
	<input type='hidden' name='m' value='<?php echo $_GET[m] ?>'>
	<input type='hidden' name='y' value='<?php echo $_GET[y] ?>'>
	<input type='hidden' name='eid' value='<?php echo $_GET[eid] ?>'>
	
	</form>
	
</table>

<br />

<table border="0" cellpadding="4" cellspacing="1" valign="top">

<tr>
	
	<td valign="top" width="30">
		<img src="<?php echo $graphics_path ?>backicon.gif" width="30" />
	</td>

	<td width="160" align="left">
		<a href="javascript:history.go(-1)" class="smalllink">Back to Event Details</a>
	</td>
			
	<td valign="top" width="30">
		<img src="<?php echo $graphics_path ?>close.gif" width="30" />
	</td>
		
	<td align="left">
		<a href="javascript:self.close()" class="smalllink">Close Window</a></center>
	</td>

</tr>

</table> 


</center>
