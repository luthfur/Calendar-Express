<html>
<head>

<?php if($redirect) { ?>
	
	<meta http-equiv="refresh" content="1;URL=<?php echo $redirect ?>">
		
<?php } ?>

<!-------------- Donot Remove the code below ----------------------->

<script language="javascript">

/****************************** Select All ********************************/
		
	function select_all(boxID) {

		var boxes = document.getElementsByName(boxID); 

        for(var i=0; i<boxes.length; i++) 
        { 
            if(!boxes[i].checked) {

                boxes[i].click();

			}
      
		} 

	}
	
	/****************************** Select All ********************************/
	


	/****************************** Clear All *******************************/
		
	function clear_all(boxID) {

		var boxes = document.getElementsByName(boxID); 

        for(var i=0; i<boxes.length; i++) 
        { 
            if(boxes[i].checked) {

                boxes[i].click();

			}
      
		} 
		
	}
	
	/***************************** Clear All ********************************/


</script>

<script src="<?php echo $style_path ?>menu.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo $style_path ?>richtext.js"></script>
<link rel="stylesheet" href="<?php echo $style_path ?>style.css" type="text/css">
	
<!-------------- Donot Remove the code Above ----------------------->	


<title>Calendar Express 2.2 - My Events [Powered by Phplite.com]</title>



	
</head>

<body bgcolor="#FFFFFF" leftmargin="0" rightmargin="0" topmargin="0" onload="menuInit()">

<center>

<br />

