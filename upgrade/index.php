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

		Calendar Express 2.2- Database Upgrade [Powered by PHP Lite.com]

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
				
				Welcome to Calendar Express 2.0
			
			</td>
			
			
		</tr>
	

<tr>
	

</tr>

	<tr>
		<td colspan="2" class="listingcell" width="50%">
				
			
			<br />

			<font class="basictext">
					
					This automatic installer will walk you through upgrading your installation to  <i>Calendar Express 2</i>.<br /><br />

To continue with the installation you will need to first rename the file config.php, from your current 
installation, to config_old.php. Copy config_old.php to the new Calendar Express 2 directory. <br /><br />

You will also need to change the file permission to the file config.php and make it writable. (This can be done by CHMOD'ing the file to
0666 in Unix based systems.)

<br /><br />
Ensure that you backup your existing database before proceeding.

			</font><br /><br />

			<div align="right"><a href="upgrade.php" class="basiclink">Begin Upgrade &gt;&gt;</a></div>

			<br />
			

		</td>

	</tr>


	
	
</table>

	

<br /><br />

</center>

<br/><br/>

</body>
</html>