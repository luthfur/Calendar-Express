<table border="0" cellspacing="1" cellpadding="3" width="90%">
<tr>
	<td valign="top" colspan="2">
		<br />
		<font class="bigtext">Email Archive</font>
		<br />
		<hr width="100%" class="hrbar" />
	</td>

</tr>

<tr>
	<td>
		<font class="basictext"><b>Total Emails Sent Added: <?php echo $total ?></b></font><br /><br />
	</td>

	<form name="multiplecheck" method="get" action="emaildelete.php">

	<td align="right">
	
		<a href="javascript:select_all('mid[]')" class="basiclink" >Select All</a>&nbsp;&nbsp;
		<a href="javascript:clear_all('mid[]')" class="basiclink" >Clear All</a>&nbsp;&nbsp;
		<input type="submit"  value="Delete Selected" onClick="return confirm('Are you sure you want to delete the selected emails?')"/>
		<br />

	</td>
</tr>

</table>		


				
	<table border="1" cellpadding="4" cellspacing="0" class="table" width="90%">
		<tr>
			<td class="theader" colspan="5">
				<center>
				Sent Messages
				</center>
			</td>
		</tr>
	

<tr>

	<td class="listingheader" height="25" width="20">
		
	</td>

	<td class="listingheader" height="25" width="40%"">
		<a href="<?php echo $_SERVER[PHP_SELF]?>?orderby=date_sent&order=<?php echo $order ?>" class="orderbylink"><b>Date Sent</b></font>
	</td>
	<td class="listingheader" height="25" align="center">
		<a href="<?php echo $_SERVER[PHP_SELF]?>?orderby=subject&order=<?php echo $order ?>" class="orderbylink"><b>Subject</b></font>
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

				<td class="listingheader" height="25" width="20">
					<input type="checkbox" value="<?php echo $message_id ?>" name="mid[]" />
				</td>

				<td colspan="1" class="listingcell">
				
					<font class="littletext"><?php echo displaydate($date_sent) ?></font>
					
				</td>
				<td colspan="1" align="center" class="listingcell">
					<a href="emaildetails.php?mid=<?php echo $message_id ?>" class="listinglink"><b><?php echo $subject ?></b></a>
				</td>
				
				<td colspan="1" align="center" class="listingcell">	
					<a href="emaildelete.php?mid=<?php echo $message_id ?>" class="listinglink" onClick="return confirm('Are you sure you want to delete the selected Email?')"><b>Delete</b></a>
				</td>
			</tr>

	<?php
	
		$count++;
	}

	?>


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
<br /><br />