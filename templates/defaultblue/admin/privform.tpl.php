<?php extract($_GET) ?>
<table border="0" cellspacing="1" cellpadding="3" width="50%">
<tr>
	
	<!---------------------------------Main Calendar----------------------------------------->
	<td align="left" rowspan="1" valign="top" width="50%">
		
	<br />
	


<form name="locationadd" method="post" action="addpriv.php">


	<table border="1" cellpadding="6" cellspacing="0" class="table" width="100%">
		<tr>
			<td class="theader" colspan="2">
				
				Add Calendar Privilege for <?php echo $user_name ?>
			
			</td>
		
		
		</tr>
	
		<tr>
		
		<td colspan="2" align="left" class="listingcell">
			<center>
			
			<select name="cid[]" class="textbox" MULTIPLE>
			
			<?php	while(list($ind, $val) = each($filteredarray)) { ?>
				
				<option value="<?php echo $val ?>"
				
				<?php if($cid == $val ) echo " selected"?>

				>

				<?php echo $calname[$val] ?>
				
				</option>

			<?php }	?>
			
			</select>

			</center>
		</td>
	</tr>
	

<tr>
		<td colspan="2" class="listingheader" align="center">
			<input type="hidden" name="user_id" value="<?php echo $uid ?>">
			<input type="submit" value="Add New Privileges" class="buttons"/>
			<input type="reset" value="Reset Fields" class="buttons"/>
		</td>
</tr>
	
	
</table>


</form>





</td>
</tr>
</table>

<br />
