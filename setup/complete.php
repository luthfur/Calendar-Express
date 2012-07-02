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
				
				Installation Successfully Completed!
			
			</td>
			
			
		</tr>
	

<tr>
	

</tr>

	<tr>
		<td colspan="2" class="listingcell" width="50%">
				
			
			<br />

			<font class="basictext">

				You can now access the <a href="../admin/" target="_blank" class="smalllink">Administration Panel</a> and your 
				<a href="../myevents/" target="_blank" class="smalllink">My Events</a> control panel using your
	user name and password.<br /><br /> A test calendar and a test category
	has also been automatically setup to get you started.
	 <a href="../index.php" target="_blank" class="smalllink">Click here to view it.</a>

	 <br /><br />
	
	We hope you find this software efficient and easy to use.

			</font><br /><br />
			

		</td>

	</tr>


	
	
</table>




	

<br /><br />

</center>

<br/><br/>

</body>
</html>
