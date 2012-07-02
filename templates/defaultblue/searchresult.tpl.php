<table border="0" cellspacing="1" cellpadding="3" width="100%">
<tr>
	<td valign="top">
		<br />
		<font class="subheader">Search Results for <i><?php echo $display_words ?></i></font>
		<br />
		<hr width="100%" class="hrbar" />
		<font class="basictext"><b>Total Results Found: <?php echo $total ?></b></font><br /><br />
	</td>
</tr>
</table>		


		
<!----------------------------------Calendar body--------------------------------------------->
<table border="0" cellspacing="1" cellpadding="3" width="100%">
<tr>
	
	<!---------------------------------Main Calendar----------------------------------------->
	<td align="left" rowspan="1" valign="top" width="50%">
		
	<table border="0" cellpadding="4" height="40" valign="top" cellspacing="0" width="100%">
		<tr>
			
		</tr>
	
	</table>
				
	<table border="1" cellpadding="4" cellspacing="0" class="table" width="100%">
		<tr>
			<td class="theader" colspan="4">
				<center>
				Event List
				</center>
			</td>
		</tr>
	

<tr>
	<td class="listingheader" height="25" width="40%"">
		<a href="<?php echo $_SERVER[PHP_SELF]?>?orderby=event_title&order=<?php echo $order ?>keywords=<?php echo $keywords ?>&cid=<?php echo $cid ?>&title=<?php echo $title ?>&desc=<?php echo $desc ?>&type=<?php echo $type ?>" class="orderbylink"><b>Event Title</b></font>
	</td>
	<td class="listingheader" height="25" align="center">
		<font class="orderbylink"><b>Occurence</b></font>
	</td>
	<td class="listingheader" height="25" align="center">
		<a href="<?php echo $_SERVER[PHP_SELF]?>?orderby=calendar_name&order=<?php echo $order ?>keywords=<?php echo $keywords ?>&cid=<?php echo $cid ?>&title=<?php echo $title ?>&desc=<?php echo $desc ?>&type=<?php echo $type ?>" class="orderbylink"><b>Calendar</b></font>
	</td>
	
</tr>


	<?php 
	

	while ($eventdata = $Page->getDataArray()) {
		
		extract($eventdata);

	?>
		
		<tr>
				<td colspan="1" class="listingcell">
					<a href="javascript:open_window('eventdetails.php?eid=<?php echo $event_id ?>');" class="listinglink"><b><?php echo $event_title ?></b></a>
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






<table border="1" cellpadding="4" cellspacing="0" class="table" width="100%">

<tr>
	<td class="listingcell" height="25" align="center">

	<font class="basictext">Pages(<?php echo $Page->getNumPages() ?>):&nbsp;</font>
		
	<?php if (!$Page->isFirstPage())  { ?>
     
	  <a href="<?php echo $_SERVER[PHP_SELF] . '?p=' . ($Page->getPageNum()-1) ?>&allwords=<?php echo $allwords ?>&oneword=<?php echo $oneword ?>&cid=<?php echo $cid ?>&title=<?php echo $title ?>&desc=<?php echo $desc ?>&type=<?php echo $type ?>" class="basiclink">&lt;&lt;Prev</a>&nbsp;
	
	<?php } ?>

    
	<?php if ($Page->getNumPages() > 1) {
    
	  for ($i=1; $i<=$Page->getNumPages(); $i++)
      {
        if ($Page->isPage($i)) {
	?>

			<font class="midtext"><b>[<?php echo $i ?>]</b></font>&nbsp;


     <?php } else { ?>

          <a href="<?php echo $_SERVER[PHP_SELF] . '?p=' . $i ?>&allwords=<?php echo $allwords ?>&oneword=<?php echo $oneword ?>&cid=<?php echo $cid ?>&title=<?php echo $title ?>&desc=<?php echo $desc ?>&type=<?php echo $type ?>" class="basiclink"><?php echo $i ?></a>&nbsp;

     <?php }
	 
	  }
	  
	  ?>

    <?php if (!$Page->isLastPage())  { ?>

		<a href="<?php echo $_SERVER[PHP_SELF] . '?p=' . ($Page->getPageNum()+1) ?>&allwords=<?php echo $allwords ?>&oneword=<?php echo $oneword ?>&cid=<?php echo $cid ?>&title=<?php echo $title ?>&desc=<?php echo $desc ?>&type=<?php echo $type ?>" class="basiclink">Next &gt;&gt;</a>&nbsp;
    
	<?php }
	
	}
	
	?>
 

	</td>
	
</tr>


</table>