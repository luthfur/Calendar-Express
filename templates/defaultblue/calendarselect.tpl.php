<?php 
 
 $Result->setResult($calendarresult);	
 
  $Result->setPointer(0);
				
?>

<!----------------------Drop down select box---------------------->

<table cellpadding="2" class="selectbox" width="100%">
	
	<tr>
		<td align="left">
			<font class="subheader">Select a Calendar:</font><br />
		</td>
	</tr>
	<tr>
		<td align="left">
		<form name="calendarselect" method="get" action="<?php echo $_SERVER["PHP_SELF"] ?>">
			<select class="selectbox" name="cid" onchange="javascript: calendarselect.submit()">
										
				<?php
				while ($calendardata = $Result->getArray()) {
										
					if($calendardata[calendar_id] == $cid) {
				?>
					<option selected value="<?php echo $calendardata[calendar_id] ?>">&nbsp;&nbsp;-&nbsp;<?php echo $calendardata[calendar_name] ?></option>
				<?php } else { ?>
					<option value="<?php echo $calendardata[calendar_id] ?>">&nbsp;&nbsp;-&nbsp;<?php echo $calendardata[calendar_name] ?></option>
				<?php
					}
				}
				?>
				
			</select>
			
			<input type="hidden" name="catid" value="<?php echo $catid ?>">
			<input type="hidden" name="w" value="<?php echo $weeknum ?>">
			<input type="hidden" name="d" value="<?php echo $day ?>">
			<input type="hidden" name="m" value="<?php echo $month ?>">
			<input type="hidden" name="y" value="<?php echo $year ?>">
			<input type="hidden" name="selection" value="1">
		</td>
	</tr>
	<tr>
		<td align="right">
			<input type="submit" value="Go" class="buttons"></form>
		</td>
	</tr>
</table>
<!--------------------Drop down select box ends------------------->