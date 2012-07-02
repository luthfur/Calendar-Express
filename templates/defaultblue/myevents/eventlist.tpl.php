<table border="0" cellspacing="1" cellpadding="3" width="770">


<tr>
	<td valign="top" colspan="2">
		<br />
		<font class="subheader">My Events List</font>
		<br />
		<hr width="100%" class="hrbar" />
		<font class="basictext"><b>Total Events Posted: <?php echo $total ?></b></font><br />
	</td>
</tr>



<form action="<?php echo $_SERVER[PHP_SELF] ?>" method="GET">


<tr>
	<td valign="top">

		<font class="basictext">View Events that Occur:</font>
		
		<select name="eventtype" class="textbox">
			
			<option value="0">All Types </option>

			<?php	for($i=1; $i<=count($_EVENT_TYPE); $i++) { ?>
				
				<option value="<?php echo $i ?>"
				
				<?php if($eventtype == $i ) echo " selected"?>

				>

				<?php echo $_EVENT_TYPE[$i]  ?>
				
				</option>

			<?php }	?>
			
		</select>

		&nbsp;

		<input type="submit" class="buttons" value="Go" />

	</td>

	</form>

	<form name="multiplecheck" method="get" action="eventdelete.php">

	<td align="right">
	
		<a href="javascript:select_all('id[]')" class="basiclink" >Select All</a>&nbsp;&nbsp;
		<a href="javascript:clear_all('id[]')" class="basiclink" >Clear All</a>&nbsp;&nbsp;
		<input type="submit"  value="Delete Selected" onClick="return confirm('Are you sure you want to delete the selected events?')"/>
		<br />

	</td>

</tr>

</table>		


<br />
<table border="1" cellpadding="4" cellspacing="0" class="table" width="770">
	<tr>
		<td class="theader" colspan="5">
			<center>
			Event List
			</center>
		</td>
	</tr>

<tr>
	<td class="listingheader" height="25" width="20">
		
	</td>
	<td class="listingheader" height="25" width="40%"">
		<a href="<?php echo $_SERVER[PHP_SELF]?>?orderby=event_title&order=<?php echo $order . '&eventtype=' . $eventtype ?>" class="orderbylink"><b>Event Title</b></font>
	</td>
	<td class="listingheader" height="25" align="center">
		<font class="orderbylink"><b>Occurence</b></font>
	</td>
	<td class="listingheader" height="25" align="center">
		<a href="<?php echo $_SERVER[PHP_SELF]?>?orderby=calendar_name&order=<?php echo $order . '&eventtype=' . $eventtype ?>" class="orderbylink"><b>Calendar</b></font>
	</td>
	<td class="listingheader" height="25" align="center">
		<font class="orderbylink"><b>Action</b></font>
	</td>
</tr>


	<?php 
	
	while ($eventdata = $Page->getDataArray()) {
		
		extract($eventdata);

	?>
		
		<tr>

				<td class="listingheader" height="25" width="20">
					<input type="checkbox" value="<?php echo $event_id ?>" name="id[]" />
				</td>

				<td colspan="1" class="listingcell">
					<a href="eventdetails.php?eid=<?php echo $event_id ?>" class="listinglink"><b><?php echo $event_title ?></b></a>
				</td>
				<td colspan="1" align="center" class="listingcell">
					<font class="littletext">
					<?php 
							$display = getoccurence($eventdata);
							echo $display;
					?>
					</font>
				</td>
				<td colspan="1" align="center" class="listingcell">
					<font class="littletext"><?php echo $calendar_name ?></font>
				</td>
				<td colspan="1" align="center" class="listingcell">	
					<a href="eventdelete.php?id=<?php echo $event_id ?>" class="listinglink" onClick="return confirm('Are you sure you want to delete the selected event?')"><b>Delete</b></a>
				</td>
			</tr>

	<?php
	
	}

	?>


	</table>

	</form>





<br />

<table border="1" cellpadding="4" cellspacing="0" class="table" width="770">

<tr>
	<td class="listingcell" height="25" align="center">

	<font class="basictext">Pages(<?php echo $Page->getNumPages() ?>):&nbsp;</font>
		
	<?php if (!$Page->isFirstPage())  { ?>
     
	  <a href="<?php echo $_SERVER[PHP_SELF] . '?p=' . ($Page->getPageNum()-1) . '&eventtype=' . $eventtype ?>" class="basiclink">&lt;&lt;Prev</a>&nbsp;
	
	<?php } ?>

    
	<?php if ($Page->getNumPages() > 1) {
    
	  for ($i=1; $i<=$Page->getNumPages(); $i++)
      {
        if ($Page->isPage($i)) {
	?>

			<font class="midtext"><b>[<?php echo $i ?>]</b></font>&nbsp;


     <?php } else { ?>

          <a href="<?php echo $_SERVER[PHP_SELF] . '?p=' . $i . '&eventtype=' . $eventtype ?>" class="basiclink"><?php echo $i ?></a>&nbsp;

     <?php }
	 
	  }
	  
	  ?>

    <?php if (!$Page->isLastPage())  { ?>

		<a href="<?php echo $_SERVER[PHP_SELF] . '?p=' . ($Page->getPageNum()+1) . '&eventtype=' . $eventtype ?>" class="basiclink">Next &gt;&gt;</a>&nbsp;
    
	<?php }
	
	}
	
	?>
 

	</td>
	
</tr>


</table>