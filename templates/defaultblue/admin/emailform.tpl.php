<?php extract($_POST) ?>
<table border="0" cellspacing="1" cellpadding="3" width="90%">
<tr>
	
	<!---------------------------------Main Calendar----------------------------------------->
	<td align="left" rowspan="1" valign="top" width="50%">
		
	<br />
	


<form name="emailform" method="post" action="previewemail.php">


	<table border="1" cellpadding="6" cellspacing="0" class="table" width="100%">
		<tr>
			<td class="theader" colspan="2">
				
				Send A New Email Message to your Users:
			
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
			
			<font class="<? echo ( $error[email_subj] ? "errortext" : "midtext" ) ?>"><b>Subject: </b></font><br />

		</td>

		<td colspan="1" align="left" class="listingcell">

			<input type="text" name="email_subj" value="<?php echo $email_subj ?>" class="textbox" size="95"/>
		
		</td>
	</tr>
	
	
	<tr colspan="2" class="listingcell" valign="top">
		<td colspan="2" align="left" class="listingcell">
			<textarea cols="80" rows="15" name="email_message"><?php echo $email_message ?></textarea>
		</td>
	</tr>

<tr>
		<td colspan="2" class="listingheader" align="center">
			
			<input type="submit" value="Preview Email" class="buttons"/>
			<input type="reset" value="Reset Fields" class="buttons"/>

		</td>
</tr>
	
	
</table>


</form>





</td>
</tr>
</table>

<br />
