<html>
<head>

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



	function select_all_options(sel_list, bool_status) {

		obj = document.getElementById(sel_list);
		
		for(i=0; i<obj.length; i++) {

			obj.options[i].selected = bool_status;

		}
	}
	

	function AdminSelect() {
		
		st = document.getElementById('status');
		
		if(st.selectedIndex == 0) {

			select_all_options('priv', true);

		} else {

			select_all_options('priv', false);

		}
		
	
	}


</script>

<script language="JavaScript" type="text/javascript" src="<?php echo $style_path ?>richtext.js"></script>
<link rel="stylesheet" href="<?php echo $style_path ?>adminstyle.css" type="text/css">
	
<!-------------- Donot Remove the code Above ----------------------->	


<title>Calendar Express 2.2 - Main Administration [Powered by Phplite.com]</title>

<?php if($redirect) { ?>
	
	<meta http-equiv="refresh" content="1;URL=<?php echo $redirect ?>">
		
<?php } ?>

	
</head>

<body bgcolor="#FFFFFF" leftmargin="0" rightmargin="0" topmargin="0">

<center>


