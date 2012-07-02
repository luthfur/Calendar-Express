<table border="0" cellspacing="1" cellpadding="3" width="90%">
<tr>
	<td valign="top">
		<br />
		<font class="bigtext">Administrator List</font>
		<br />
		<hr width="100%" class="hrbar" />
		<font class="basictext"><b>Total Administrator: <?php echo $total ?></b></font><br /><br />
	</td>
</tr>
</table>		


		
<!----------------------------------Calendar body--------------------------------------------->
<table border="0" cellspacing="1" cellpadding="3" width="90%">
<tr>
	
	<!---------------------------------Main Calendar----------------------------------------->
	<td align="left" rowspan="1" valign="top" width="50%">
		
	<table border="0" cellpadding="4" height="40" valign="top" cellspacing="0" width="100%">
		<tr>
			
		</tr>
	
	</table>
				
	<table border="1" cellpadding="4" cellspacing="0" class="table" width="100%">
		<tr>
			<td class="theader" colspan="5">
				<center>
				Administrator List
				</center>
			</td>
		</tr>
	

<tr>
	<td class="listingheader" height="25" width="40%"">
		<a href="<?php echo $_SERVER[PHP_SELF]?>?orderby=user_name&order=<?php echo $order ?>" class="orderbylink"><b>Username</b></font>
	</td>
	<td class="listingheader" height="25" align="center">
		<a href="<?php echo $_SERVER[PHP_SELF]?>?orderby=status&order=<?php echo $order ?>" class="orderbylink"><b>Status</b></font>
	</td>
	<td class="listingheader" height="25" align="center">
		<a href="<?php echo $_SERVER[PHP_SELF]?>?orderby=email&order=<?php echo $order ?>" class="orderbylink"><b>Email</b></font>
	</td>
	<td class="listingheader" height="25" align="center">
		<font class="orderbylink"><b>Action</b></font>
	</td>
</tr>


	<?php 
	

	while ($locdata = $Page->getDataArray()) {
		
		extract($locdata);

	?>
		
		<tr>
				<td colspan="1" class="listingcell">
					<a href="admindetails.php?aid=<?php echo $admin_id ?>" class="listinglink"><b><?php echo $user_name ?></b></a>
				</td>
				<td colspan="1" align="center" class="listingcell">
					<font class="littletext"><?php echo $status	?></font>
				</td>
				<td colspan="1" align="center" class="listingcell">
					<font class="littletext"><?php echo $email ?></font>
				</td>
				<td colspan="1" align="center" class="listingcell">	
					<a href="admindelete.php?aid=<?php echo $admin_id ?>" class="listinglink" onClick="return confirm('Are you sure you want to delete the selected Administrator?')"><b>Delete</b></a>
				</td>
			</tr>

	<?php
	
		$count++;
	}

	?>


	</table>

</td>
</tr>
</table>

<br />

<br />






<table border="1" cellpadding="4" cellspacing="0" class="table" width="90%">

<tr>
	<td class="listingcell" height="25" align="center">

	<font class="basictext">Pages(<?php echo $Page->getNumPages() ?>):&nbsp;</font>
		
	<?php if (!$Page->isFirstPage())  { ?>
     
	  <a href="<?php echo $_SERVER[PHP_SELF] . '?p=' . ($Page->getPageNum()-1) ?>" class="basiclink">&lt;&lt;Prev</a>&nbsp;
	
	<?php } ?>

    
	<?php if ($Page->getNumPages() > 1) {
    
	  for ($i=1; $i<=$Page->getNumPages(); $i++)
      {
        if ($Page->isPage($i)) {
	?>

			<font class="midtext"><b>[<?php echo $i ?>]</b></font>&nbsp;


     <?php } else { ?>

          <a href="<?php echo $_SERVER[PHP_SELF] . '?p=' . $i ?>" class="basiclink"><?php echo $i ?></a>&nbsp;

     <?php }
	 
	  }
	  
	  ?>

    <?php if (!$Page->isLastPage())  { ?>

		<a href="<?php echo $_SERVER[PHP_SELF] . '?p=' . ($Page->getPageNum()+1) ?>" class="basiclink">Next &gt;&gt;</a>&nbsp;
    
	<?php }
	
	}
	
	?>
 

	</td>
	
</tr>


</table>