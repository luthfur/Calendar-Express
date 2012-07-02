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

		Calendar Express 2.2- Database Installer [Powered by PHP Lite.com]

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
				
				Welcome to Calendar Express 2.2
			
			</td>
			
			
		</tr>
	

<tr>
	

</tr>

	<tr>
		<td colspan="2" class="listingcell" width="50%">
				
			
			<br />

			<font class="basictext">
					
					This automatic installer will walk you through the installation of <i>Calendar Express</i>.<br /><br />

To continue with the installation you will need your MySQL hostname (usually localhost), your MySQL username and your MySQL password.
<br /><br />
You will also need the name of the MySQL database in which the tables will be installed. If you donot have a database ready, please create a new one before proceeding.
<br /><br />
Also ensure that the proper permissions are set to allow data to be written to the config.php configuration file, (simply chmod the file to 0666).
<br /><br />
The installation will be done in 2 Steps: in the first step we will test whether your system is compatible with this product, and in the second step 

the MySQL database tables will be installed.


			</font><br /><br />

			<div align="right"><a href="syscheck.php" class="basiclink">Begin System Check &gt;&gt;</a></div>

			<br />
			

		</td>

	</tr>


	
	
</table>

	

<br /><br />

</center>

<br/><br/>

</body>
</html>