<table border="0" cellspacing="1" cellpadding="3" width="770">
<tr>
	<td valign="top" colspan="2">
		<br />
		<font class="subheader">My Location List</font>
		<br />
		<hr width="100%" class="hrbar" />
		
	</td>

</tr>

<tr>
	
	<td align="left">
	<font class="basictext"><b>Total Locations Added: <?php echo $total ?></b></font><br /><br />
	</td>
<form name="multiplecheck" method="get" action="locationdelete.php">
	<td align="right">
	
		<a href="javascript:select_all('id[]')" class="basiclink" >Select All</a>&nbsp;&nbsp;
		<a href="javascript:clear_all('id[]')" class="basiclink" >Clear All</a>&nbsp;&nbsp;
		<input type="submit"  value="Delete Selected" onClick="return confirm('Deleting this location will also delete the related events. Are you sure you want to delete the selected locations?')"/>
		<br />

	</td>


</tr>
</table>		

<br />
		
				
	<table border="1" cellpadding="4" cellspacing="0" class="table" width="770">
		<tr>
			<td class="theader" colspan="5">
				<center>
				Location List
				</center>
			</td>
		</tr>
	

<tr>
	<td class="listingheader" height="25" width="20">
		
	</td>

	<td class="listingheader" height="25" width="40%"">
		<a href="<?php echo $_SERVER[PHP_SELF]?>?orderby=location_title&order=<?php echo $order ?>" class="orderbylink"><b>Location Title</b></font>
	</td>
	<td class="listingheader" height="25" align="center">
		<a href="<?php echo $_SERVER[PHP_SELF]?>?orderby=address_1&order=<?php echo $order ?>" class="orderbylink"><b>Address 1</b></font>
	</td>
	<td class="listingheader" height="25" align="center">
		<a href="<?php echo $_SERVER[PHP_SELF]?>?orderby=city&order=<?php echo $order ?>" class="orderbylink"><b>City</b></font>
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
					<input type="checkbox" value="<?php echo $location_id ?>" name="id[]" />
				</td>

				<td colspan="1" class="listingcell">
					<a href="locationdetails.php?lid=<?php echo $location_id ?>" class="listinglink"><b><?php echo $location_title ?></b></a>
				</td>
				<td colspan="1" align="center" class="listingcell">
					<font class="littletext"><?php echo $address_1	?></font>
				</td>
				<td colspan="1" align="center" class="listingcell">
					<font class="littletext"><?php echo $city ?></font>
				</td>
				<td colspan="1" align="center" class="listingcell">	
					<a href="locationdelete.php?id=<?php echo $location_id ?>" class="listinglink" onClick="return confirm('Deleting this location will also delete the related events. Are you sure you want to delete the selected Location?')"><b>Delete</b></a>
				</td>
			</tr>

	<?php
	
	}

	?>
</form>

	</table>


<br />






<table border="1" cellpadding="4" cellspacing="0" class="table" width="770">

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