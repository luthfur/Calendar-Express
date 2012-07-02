
<table cellpadding="1" cellspacing="0" class="table" width="100%">
	
	<tr>
		
		<td colspan="2" class="theader" align="right">
			<a href='<?php echo "week.php?cid=$cid&catid=$catid&m=$month&w=$weeknum&y=$yearprev&s=$subcal" ?>' class='basiclink'><img src="<?php echo $graphics_path ?>arrowleft.gif" align="center" border="0"></a>
		</td>
		
		<td colspan="4" class="theader" align="center" valign="top">
			<a href='<?php echo "year.php?cid=$cid&catid=$catid&m=$month&w=$weeknum&y=$year&s=$subcal" ?>' class='tableheaderlink'><?php echo $year ?></a>
		</td>
		
		<td colspan="2" class="theader" align="left">
			<a href='<?php echo "week.php?cid=$cid&catid=$catid&m=$month&w=$weeknum&y=$yearnext&s=$subcal" ?>' class='basiclink'><img src="<?php echo $graphics_path ?>arrowright.gif" align="center" border="0"></a>
		</td>
	
	</tr>

</table>
<br />