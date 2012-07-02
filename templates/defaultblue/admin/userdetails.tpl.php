<?php extract($userdata) ?>
	


<form name="locationadd" method="post" action="updateuser.php">


	<table border="1" cellpadding="6" cellspacing="0" class="table" width="85%">
		<tr>
			<td class="theader" colspan="1">
				
				User Details for <?php echo $user_name ?>
			
			</td>

			<td class="theader" colspan="1" align="right">
				
				<a href="userdelete.php?uid=<?php echo $user_id ?>" class="catlink" onClick="return confirm('Are you sure you want to delete the selected user?')"><b>Delete</b></a>&nbsp;
			
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
			
			<font class="midtext"><b>Status: (optional) </b></font><br />
	
		</td>
		<td colspan="1" align="left" class="listingcell">
			<select name="status" class="textbox">
			
			<?php	for ($i=2; $i<=count($_STATUS); $i++) { ?>
				
				<option value="<?php echo $i ?>"
				
				<?php if($i == $status) echo " selected"?>

				>

				<?php echo $_STATUS[$i] ?>
				
				</option>

			<?php }	?>
			
			</select>
		</td>
	</tr>
	

<tr>
		<td colspan="2" class="listingheader" align="center">
			<input type="hidden" name="user_id" value="<?php echo $user_id ?>">
			<input type="submit" value="Save Changes" class="buttons"/>
			<input type="reset" value="Reset Fields" class="buttons"/>
		</td>
</tr>
	
	
</table>

<br /><br />

</form>


<table border="1" cellpadding="4" cellspacing="0" class="table" width="85%">
		<tr>
			<td class="theader" colspan="1">
				
				Calendar Privilege Details for <?php echo $user_name ?>
				
			</td>
			
			<td class="theader" colspan="1" align="right">
				
				<?php if($active) { ?>
				<a href="privform.php?uid=<?php echo $user_id ?>" class="catlink"><b>Add Privileges</b></a>&nbsp;
				
				<?php } else { ?>

				&nbsp;
				
				<?php  } ?>
			</td>

		</tr>


	

<tr>
	<td class="listingheader" height="25">
		<a href="<?php echo $_SERVER[PHP_SELF]?>?orderby=calendar_name&order=<?php echo $order . '&uid=' . $user_id ?>" class="orderbylink"><b>Calendar</b></font>
	</td>
	
	
	<td class="listingheader" height="25" align="center">
		
		<?php if($active) { ?>

			<font class="orderbylink"><b>Action</b></font>
				
		<?php } else { ?>

			&nbsp;
				
		<?php  } ?>
		
	</td>
</tr>


	<?php 
	

	while ($caldata = $Page->getDataArray()) {
		
		extract($caldata);

	?>
		
		<tr>
				<td colspan="1" class="listingcell">
					<a href="caldetails.php?cid=<?php echo $calendar_id ?>" class="listinglink"><b><?php echo $calendar_name ?></b></a>
				</td>
				
				<td colspan="1" align="center" class="listingcell">	
					<?php if($active) { ?>

					<a href="userprivdelete.php?uid=<?php echo $user_id ?>&cid=<?php echo $calendar_id ?>" class="listinglink" onClick="return confirm('Are you sure you want to delete the selected Calendar Privilege?')"><b>Remove Privilege</b></a>
				
				<?php } else { ?>

						&nbsp;
				
				<?php  } ?>
		
					
				</td>
			</tr>

	<?php
	
		$count++;
	}

	?>


	</table>


<br />

<br />






<table border="1" cellpadding="4" cellspacing="0" class="table" width="85%">

<tr>
	<td class="listingcell" height="25" align="center">

	<font class="basictext">Pages(<?php echo $Page->getNumPages() ?>):&nbsp;</font>
		
	<?php if (!$Page->isFirstPage())  { ?>
     
	  <a href="<?php echo $_SERVER[PHP_SELF] . '?p=' . ($Page->getPageNum()-1) . '&cid=' . $cid  . '&uid=' . $user_id ?>" class="basiclink">&lt;&lt;Prev</a>&nbsp;
	
	<?php } ?>

    
	<?php if ($Page->getNumPages() > 1) {
    
	  for ($i=1; $i<=$Page->getNumPages(); $i++)
      {
        if ($Page->isPage($i)) {
	?>

			<font class="midtext"><b>[<?php echo $i ?>]</b></font>&nbsp;


     <?php } else { ?>

          <a href="<?php echo $_SERVER[PHP_SELF] . '?p=' . $i . '&cid=' . $cid . '&uid=' . $user_id ?>" class="basiclink"><?php echo $i ?></a>&nbsp;

     <?php }
	 
	  }
	  
	  ?>

    <?php if (!$Page->isLastPage())  { ?>

		<a href="<?php echo $_SERVER[PHP_SELF] . '?p=' . ($Page->getPageNum()+1) . '&cid=' . $cid . '&uid=' . $user_id ?>" class="basiclink">Next &gt;&gt;</a>&nbsp;
    
	<?php }
	
	}
	
	?>
 

	</td>
	
</tr>


</table>

<br />


