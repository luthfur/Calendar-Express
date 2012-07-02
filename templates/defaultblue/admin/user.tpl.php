<table border="0" cellspacing="1" cellpadding="3" width="90%">
<tr>
	<td valign="top" colspan="2">
		<br />
		<font class="bigtext">User List</font>
		<br />
		<hr width="100%" class="hrbar" />
		<font class="basictext"><b>Total Users Added: <?php echo $total ?></b></font>

	</td>
</tr>

<tr>
	<td>
		
		<form action="<?php echo $_SERVER[PHP_SELF] ?>" method="GET">

		<font class="basictext">View Users with access to:</font>
		
		<select name="cid" class="textbox">
			
			<option value="0">All Users </option>

			<?php	while($caldata = $Result->getArray($calresult)) { ?>
				
				<option value="<?php echo $caldata[calendar_id] ?>"
				
				<?php if($cid == $caldata[calendar_id] ) echo " selected"?>

				>

				<?php echo $caldata[calendar_name]  ?>
				
				</option>

			<?php }	?>
			
			</select>

			&nbsp;

			<input type="submit" class="buttons" value="Go" />
			</form>

		<br />
	</td>

	<form name="multiplecheck" method="get" action="userdelete.php">

	<td align="right">
	
		<a href="javascript:select_all('uid[]')" class="basiclink" >Select All</a>&nbsp;&nbsp;
		<a href="javascript:clear_all('uid[]')" class="basiclink" >Clear All</a>&nbsp;&nbsp;
		<input type="submit"  value="Delete Selected" onClick="return confirm('Are you sure you want to delete the selected users?')"/>
		<br />

	</td>
</tr>
</table>		


				
	<table border="1" cellpadding="4" cellspacing="0" class="table" width="90%">
		<tr>
			<td class="theader" colspan="5">
				<center>
				User List
				</center>
			</td>
		</tr>


	

<tr>

	<td class="listingheader" height="25" width="20">
		
	</td>
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

		
		if($user_id != 1) {

	?>
		
		<tr>
				<td class="listingheader" height="25" width="20">
					<input type="checkbox" value="<?php echo $user_id ?>" name="uid[]" />
				</td>

				<td colspan="1" class="listingcell">
					<a href="userdetails.php?uid=<?php echo $user_id ?>" class="listinglink"><b><?php echo $user_name ?></b></a>
				</td>
				<td colspan="1" align="center" class="listingcell">
					<font class="littletext"><?php echo $_STATUS[$status]	?></font>
				</td>
				<td colspan="1" align="center" class="listingcell">
					<font class="littletext"><?php echo $email ?></font>
				</td>
				<td colspan="1" align="center" class="listingcell">	
					<a href="userdelete.php?uid=<?php echo $user_id ?>" class="listinglink" onClick="return confirm('Are you sure you want to delete the selected User?')"><b>Delete</b></a>
				</td>
			</tr>

	<?php

		}
	
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
     
	  <a href="<?php echo $_SERVER[PHP_SELF] . '?p=' . ($Page->getPageNum()-1) . '&cid=' . $cid ?>" class="basiclink">&lt;&lt;Prev</a>&nbsp;
	
	<?php } ?>

    
	<?php if ($Page->getNumPages() > 1) {
    
	  for ($i=1; $i<=$Page->getNumPages(); $i++)
      {
        if ($Page->isPage($i)) {
	?>

			<font class="midtext"><b>[<?php echo $i ?>]</b></font>&nbsp;


     <?php } else { ?>

          <a href="<?php echo $_SERVER[PHP_SELF] . '?p=' . $i . '&cid=' . $cid ?>" class="basiclink"><?php echo $i ?></a>&nbsp;

     <?php }
	 
	  }
	  
	  ?>

    <?php if (!$Page->isLastPage())  { ?>

		<a href="<?php echo $_SERVER[PHP_SELF] . '?p=' . ($Page->getPageNum()+1) . '&cid=' . $cid ?>" class="basiclink">Next &gt;&gt;</a>&nbsp;
    
	<?php }
	
	}
	
	?>
 

	</td>
	
</tr>


</table>
<br /><br />