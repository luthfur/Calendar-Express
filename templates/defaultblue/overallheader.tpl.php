<html>
<head>

<!-------------- Donot Remove the code below ----------------------->

<script src="<?php echo $style_path ?>rollover.js"></script>
<script src="<?php echo $style_path ?>menu.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo $style_path ?>richtext.js"></script>
<link rel="stylesheet" href="<?php echo $style_path ?>style.css" type="text/css">

<script language="javascript">

	function GoAll() {
		
		var v = document.getElementById('calview');
		
		window.location = v.options[v.selectedIndex].value;

	}

</script>
	
<!-------------- Donot Remove the code Above ----------------------->	


<title>

<?php if($header_title) { 
		
		echo $header_title;

	 } else { ?>

		Calendar Express 2.2 [Powered by PHP Lite.com]

<?php } ?>

</title>

<?php if($redirect) { ?>
	
	<meta http-equiv="refresh" content="1;URL=<?php echo $redirect ?>">
		
<?php } ?>

	<meta http-equiv="Content-Type" content="text/html; charset=x-IA5-Norwegian">

</head>

<body bgcolor="#FFFFFF" leftmargin="0" rightmargin="0" topmargin="0" onload="menuInit()">

<center>


