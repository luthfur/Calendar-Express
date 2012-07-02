<br />
<br />
<center>
<table border="0" width="770" cellpadding="0" cellspacing="0">


<tr>

<td colspan="1" align="left">

	
	<font class="midtext"><b>Select a Calendar or a Category to View:</b></font>

</td>

<td align="right">

<form name="ViewSelector">
	
	<select id="calview" name="calview" class="textbox">
		
		<option value="day.php">Day View</option>
		<option value="week.php">Week View</option>
		<option value="month.php">Month View</option>
		<option value="year.php">Year View</option>

	</select>

	&nbsp;&nbsp;
	
	<input type="button" class="button" onClick="GoAll()" value="View All Calendars" />

</form>

</td>


</tr>


</table>

<br />



<table border="0" width="770" cellpadding="0" cellspacing="0">

<?php 
$count = 0; 
while(list($ind, $val) = each($catlist)) {
$count++;
?>


<?php if($count % 2) { ?>
	
	<?php if($count != 1) { ?></tr>

	<tr><td height="20" colspan="2"></td></tr>
	
	<?php } ?>

	<tr>

<?php } ?>


<td width="50%" valign="top">

		<table border="0" cellspacing="0" cellpadding="8" width="100%">
		
		<tr><td class="listingheader"><a href="week.php?catid=<?php echo $val[cat_id] ?>" class="categorylink"><?php echo $val[cat_name] ?></a></td></tr>

		
		<?php while(list($index, $cal) = each($callist[$ind])) { ?>

			<tr>
			<td class="listingcell" height="30">

			&nbsp;&nbsp;


			<?php if($cal[calendar_icon]) { ?>
			
				<img src="<?php echo $cal[calendar_icon] ?>" />&nbsp; 
				
			<?php	}  ?>
				
			<a href="week.php?cid=<?php echo $cal[calendar_id] ?>" class="basiclink"><?php echo $cal[calendar_name] ?></a>

			</td>
			</tr>

		<?php } ?>



		</table>



</td>


<?php } ?>


</table>
</center>
