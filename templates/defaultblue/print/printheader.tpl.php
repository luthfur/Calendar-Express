
<table width="770" height="90" border="0" cellpadding="2" cellspacing="0">
<tr>
	
	<td class="header">
		
		<?php if($calendar_image && $_CONF[show_calimage]) { ?>
		
			<img src="<?php echo $calendar_image ?>">
		
		<?php } ?>
			
	</td>	
	
	
	<td class="header" align="left" width="65%">
		<font class="bigtext">
			<b>
				<?php echo $calendar_name	?>
			</b>
		</font>
	</td>
		
	
	
	<td align="right" valign="bottom" width="35%">

		<?php if(isset($sessiondata['username'])) { ?>
			<font class="littletext"><b>Welcome, <?php echo ( $sessiondata[fullname] ? "$sessiondata[fullname]" : "$sessiondata[username]" ) ?></b></font>
			<a href="<?php echo "logout.php?cid=$cid&catid=$catid&w=$weeknum&d=$day&m=$month&y=$year" ?>" class="navlink" title="Log Out of My Events">[Log Out]</a>
		<?php } ?>

	</td>			
	
	
</tr>

</table>