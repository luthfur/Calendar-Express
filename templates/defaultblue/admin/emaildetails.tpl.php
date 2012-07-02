<?php extract($emaildata) ?>


<form name="sendemail" method="post" action="sendemail.php">


	<table border="1" cellpadding="6" cellspacing="0" class="table" width="90%">
		<tr>
			<td class="theader" colspan="2">
				
				Email Message sent on <?php echo displaydate($date_sent) ?>
			
			</td>
		
		
		</tr>



<tr>
		<td colspan="1" class="listingcell" width="15%">
			
			<font class="midtext"><b>Subject: </b></font><br />

		</td>

		<td colspan="1" align="left" class="listingcell">

			<font class="basictext">
			
			<?php echo $subject ?>
			
			</font>
		
		</td>
	</tr>
	
	
	<tr colspan="2" valign="top">
		<td colspan="2" align="left">
			
			<font class="basictext"><?php echo nl2br($message) ?></font>
			<br />
			<br />
		</td>
	</tr>


	
</table>


</form>


<br />

