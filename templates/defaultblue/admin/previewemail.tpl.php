<?php extract($_POST) ?>
	


<form name="sendemail" method="post" action="sendemail.php">


	<table border="1" cellpadding="6" cellspacing="0" class="table" width="90%">
		<tr>
			<td class="theader" colspan="2">
				
				Preview Email Message:
			
			</td>
		
		
		</tr>



<tr>
		<td colspan="1" class="listingcell" width="15%">
			
			<font class="<? echo ( $error[email_subj] ? "errortext" : "midtext" ) ?>"><b>Subject: </b></font><br />

		</td>

		<td colspan="1" align="left" class="listingcell">

			<font class="basictext">
			
			<?php echo $email_subj ?>
			
			</font>
		
		</td>
	</tr>
	
	
	<tr colspan="2" valign="top">
		<td colspan="2" align="left">
			
			<font class="basictext"><?php echo nl2br($email_message) ?></font>
			<br />
			<br />
		</td>
	</tr>

<tr>
		<td colspan="2" class="listingheader" align="center">

			<input type="hidden" name="email_subj" value="<?php echo $email_subj ?>" />
			<input type="hidden" name="email_message" value="<?php echo $email_message ?>" />
			
			<?php

				if(!isset($error)) { ?>

					<input type="submit" value="Send Message" class="buttons"/>

				<?php } ?>

		</td>
</tr>
	
	
</table>


</form>


<br />

