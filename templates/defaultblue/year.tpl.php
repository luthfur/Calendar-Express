<center>
<table border="0" cellpadding="2" cellspacing="0" width="770">

<tr><td>

	<center>
	<table border="0" cellpadding="2" cellspacing="0">

	<?php for($l=1; $l<=12; $l++) { 

		$month_array = $year_array[$l];
		$month_exists = $year_exists[$l];
		$themonth = $l;

		if($l==1 || $l==5 || $l==9) { ?>

			<tr>
	
		<?php } ?>

		<?php include "yearminicalendar.tpl.php"; ?>
	
		<?php if($l==4 || $l==8 || $l==12) { ?> 
	
		</tr>
	
		<?php } ?>



	<?php } ?>
	
	</table>

	</center>

</tr>
</table>
