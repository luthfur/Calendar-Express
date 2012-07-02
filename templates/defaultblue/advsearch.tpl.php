<?php if(isset($searchdata)) extract($searchdata) ?>
<br />

<form name="searchform" method="get" action="search.php">


	<table border="1" cellpadding="6" cellspacing="0" class="table" width="100%">
		<tr>
			<td class="theader" colspan="2">
				
				Advanced Calendar Search
			
			</td>
		</tr>
	
<?php

if(isset($error)) {

?>


<tr>
		<td colspan="2" class="listingcell">

			<font class="errortext"><b>Error: One or more entries missing or invalid</b></font><br />
			
		</td>

</tr>

<?php

} 

?>

<tr>

	<td class="listingheader" height="25" colspan="2">
		<font class="orderbylink"><b>Find Results:</b></font>
	</td>

</tr>

<tr>
		<td colspan="1" class="listingcell">
		
			<font class="<? echo ( $error[keywords] ? "errortext" : "midtext" ) ?>"><b>With all of the words: </b></font><br />

		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="allwords" value="<?php echo $allwords ?>" class="textbox" size="40"/>
		</td>
	</tr>

<tr>
		<td colspan="2" class="listingcell">
		
			<font class="midtext"><b>OR </b></font><br />

		</td>
</tr>


<tr>
		<td colspan="1" class="listingcell">
		
			<font class="<? echo ( $error[keywords] ? "errortext" : "midtext" ) ?>"><b>With at least one of the words: </b></font><br />

		</td>
		<td colspan="1" align="left" class="listingcell">
			<input type="text" name="oneword" value="<?php echo $oneword ?>" class="textbox" size="40"/>
		</td>
	
</tr>




<tr>
	<td class="listingheader" height="25" colspan="2">
		<font class="orderbylink"><b>Select Search Type</b></font>
	</td>

</tr>

<tr>
		<td colspan="1" class="listingcell">
		
			<font class="midtext"><b>Search By Calendar: </b></font><br />

		</td>
		<td colspan="1" align="left" class="listingcell">
			
			<select class='selectbox' name='cid'>
				
				<option value='0'>All Calendars</option>
				<?php
				while ($calendardata = $Result->getArray($calresult)) { ?>

						<option value='<?php echo $calendardata[calendar_id] ?>'
						
						<?php if($calendardata[calendar_id] == $cid) echo " selected " ?>

						>&nbsp;&nbsp;-&nbsp;<?php echo $calendardata[calendar_name] ?></option>
				
				<?php }	?>
				
			</select>

		</td>
	</tr>


<tr>
		<td colspan="2" class="listingcell">
		
			<font class="midtext"><b>OR</b></font><br />

		</td>
</tr>



	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="midtext"><b>Search By Category: </b></font><br />
			
		</td>

		<td colspan="1" align="left" class="listingcell">

			<select class="selectbox" name="catid">
				<option value='0'>Select</option>									
				<?php
				while ($catdata = $Result->getArray($catresult)) { ?>
						
						<option value="<?php echo $catdata[cat_id] ?>"
						
						<?php if($catdata[cat_id] == $catid) echo " selected " ?>		
						
						>&nbsp;&nbsp;-&nbsp;<?php echo $catdata[cat_name] ?></option>
				
				<?php }	?>
				
			</select>
		</td>
	</tr>

<tr>

	<td class="listingheader" height="25" colspan="2">
		<font class="orderbylink"><b>Match:</b></font>
	</td>

</tr>


	<tr>
		
		<td colspan="1" class="listingcell">
			
			
		</td>
		
			
		<td colspan="1" class="listingcell">
			<input type="checkbox" name="title" value="1" <? if($title) echo "CHECKED " ?> />
			<font class="<? echo ( $error[match] ? "errortext" : "midtext" ) ?>"><b>Event Title</b></font><br />
		</td>
		
	</tr>

	<tr>
		
		<td colspan="1" class="listingcell">
			
			
		</td>
		
			
		<td colspan="1" class="listingcell">
			<input type="checkbox" name="desc" value="1" <? if($desc) echo "CHECKED " ?> />
			<font class="<? echo ( $error[match] ? "errortext" : "midtext" ) ?>"><b>Event Description</b></font><br />
			
		</td>
		
	</tr>


<tr>
		<td colspan="2" class="listingheader" align="center">
			<input type="submit" value="Perform Search" class="buttons"/>
			<input type="reset" value="Reset Fields" class="buttons"/>
		</td>
</tr>
	
	
</table>


</form>


<br />
