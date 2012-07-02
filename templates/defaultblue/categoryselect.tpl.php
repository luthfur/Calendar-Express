<?php 
 
 $Result->setResult($catresult);	
 
  		
?>

<!----------------------Drop down select box---------------------->

<table cellpadding="2" class="selectbox" width="100%">
		
	<tr>
		<td align="left">
			<font class="subheader">Select a Category:</font><br />
		</td>
	</tr>
	<tr>
		<td align="left">
		<form name="categoryselect" method="get" action="<?php echo $_SERVER["PHP_SELF"] ?>">
			<select class="selectbox" name="catid" onchange="javascript: categoryselect.submit()">
				
				<option value="">&nbsp;&nbsp;-&nbsp;All Calendars</option>
									
				<?php
				while ($catdata = $Result->getArray()) {
										
					if($catdata[cat_id] == $catid) {
				?>
					<option selected value="<?php echo $catdata[cat_id] ?>">&nbsp;&nbsp;-&nbsp;<?php echo $catdata[cat_name] ?></option>
				<?php } else { ?>
					<option value="<?php echo $catdata[cat_id] ?>">&nbsp;&nbsp;-&nbsp;<?php echo $catdata[cat_name] ?></option>
				<?php
					}
				}
				?>
				
			</select>
			
			<input type="hidden" name="cid" value="">
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