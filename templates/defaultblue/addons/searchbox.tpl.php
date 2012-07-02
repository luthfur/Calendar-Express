<link rel="stylesheet" href="<?php echo $style_path ?>style.css" type="text/css" />
<?php 
 
 $Result->setResult($calendarresult);	
 $Result->setPointer(0);
 				
?>

<table class='selectbox' valign='center' cellpadding='2' width='100%'>
	<tr>
	<td align='right'>
	<form name='calendarsearch' method='get' action='<?php echo $calendar_path ?>search.php'>
	
	<input type='text' name='allwords' value='<? echo ( $display_words ? $display_words : "Search for..." ) ?>' class='textbox'/><br/>
	
	<select class='selectbox' name='cid'>
				
				<option value='0'>All Calendars</option>
				<?php
				while ($calendardata = $Result->getArray()) {
					if($calendardata[calendar_id] == $cid) {
				?>
					<option selected value='<?php echo $calendardata[calendar_id] ?>'>&nbsp;&nbsp;-&nbsp;<?php echo $calendardata[calendar_name] ?></option>
				<?php } else { ?>
					<option value='<?php echo $calendardata[calendar_id] ?>'>&nbsp;&nbsp;-&nbsp;<?php echo $calendardata[calendar_name] ?></option>
				<?php
					}
				}
				?>
				
			</select>
			
			<input type='hidden' name='title' value='1'>
			<input type='hidden' name='desc' value='1'>
		</td>
	</tr>
	<tr>
		<td align='right'>
			
			<input type='submit' value='Search' class='buttons'>
			<br /><br />
			<a href="<?php echo $calendar_path ?>advsearch.php" class="smalllink">Advanced Search</a>
			</form>
		</td>
	</tr>
</table>