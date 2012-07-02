<?php

$version = phpversion();



$writable = is_writable("../config.php");



if(($version > "4.1.0") && ($writable))  {
		
		header("Location: dbinstall.php");

} else {
	
	?>

<html>
<head>

<!-------------- Donot Remove the code below ----------------------->

<script src="<?php echo $style_path ?>rollover.js"></script>
<link rel="stylesheet" href="<?php echo $style_path ?>style.css" type="text/css">
	
<!-------------- Donot Remove the code Above ----------------------->	


<title>

<?php if($header_title) { 
		
		echo $header_title;

	 } else { ?>

		Calendar Express 2.2 - Database Installer [Powered by PHP Lite.com]

<?php } ?>

</title>

<?php if($redirect) { ?>
	
	<meta http-equiv="refresh" content="1;URL=<?php echo $redirect ?>">
		
<?php } ?>

	
</head>

<body bgcolor="#FFFFFF" leftmargin="0" rightmargin="0" topmargin="0">


<center>
<br /><br />

<table border="0" cellpadding="6" cellspacing="0" width="70%">
		<tr>
			<td colspan="2">
				<img src="logo.gif" />
			</td>
	</table>

<br /><br />

	<table border="1" cellpadding="8" cellspacing="0" class="table" width="70%">
		<tr>
			<td class="theader" colspan="2">
				
				System Errors Detected
			
			</td>
			
			
		</tr>
	

<tr>
	

</tr>

	<tr>
		<td colspan="2" class="listingcell" width="50%">
				
			
			<br />

			<font class="basictext">

			<b>Below are details of the errors that we found:</b><br /><br />
				
			<?php if($version < "4.1.0") { ?>
				
				You are currently running PHP version <b><?php echo $version ?></b>, which is incompatible with our requirement of version 4.1.0 or greater.

			<?php } ?>

			

			<?php if(!$writable) { ?>
				<br /><br />
				You have not changed the file permission for config.php.

			<?php } ?>

			<br /><br />


			</font><br /><br />

			<div align="right"><a href="syscheck.php" class="basiclink">Retry System Check &gt;&gt;</a></div>

			<br />
			

		</td>

	</tr>


	
	
</table>




	

<br /><br />

</center>

<br/><br/>

</body>
</html>


<?php

}


?>