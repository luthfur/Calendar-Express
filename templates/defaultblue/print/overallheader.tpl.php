<html>
<head>

<!-------------- Donot Remove the code below ----------------------->

<link rel="stylesheet" href="<?php echo $style_path ?>printstyle.css" type="text/css">
	
<!-------------- Donot Remove the code Above ----------------------->	


<title>

<?php if($header_title) { 
		
		echo $header_title;

	 } else { ?>

		Calendar Express 2.0 [Powered by Phplite.com]

<?php } ?>

</title>

<?php if($redirect) { ?>
	
	<meta http-equiv="refresh" content="1;URL=<?php echo $redirect ?>">
		
<?php } ?>

	<meta http-equiv="Content-Type" content="text/html; charset=x-IA5-Norwegian">

</head>

<body bgcolor="#FFFFFF" leftmargin="0" rightmargin="0" topmargin="0" onload="menuInit()">

<center>


