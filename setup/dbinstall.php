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

<?php 
  if($error[connection]) {
?>

<font class="errortext">Error: Failed to Connect to MySQL Database</font>
<br /><br />

<?php

}

?>


<form name="eventadd" method="post" action="install.php">


	<table border="1" cellpadding="6" cellspacing="0" class="table" width="70%">
		<tr>
			<td class="theader" colspan="2">
				
				Database Connection
			
			</td>
			
			
		</tr>
	

<tr>
	<td class="listingheader" height="25" colspan="2">
		<font class="orderbylink"><b>The following informations are needed to establish a connection to MySQL.
</b></font>
	</td>

</tr>

	<tr>
		<td colspan="1" class="listingcell" width="50%">
			
			<font class="<? echo ( $error['connection'] ? "errortext" : "midtext" ) ?>"><b>Host Name:</b>  (usually 'localhost')</font><br />

		</td>

		<td colspan="1" align="left" class="listingcell">

			<input type="text" name="hostname" value="<?php echo $hostname ?>" class="textbox" size="35"/>
		
		</td>
	</tr>



	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="<? echo ( $error['connection'] ? "errortext" : "midtext" ) ?>"><b>User Name: </b></font><br />

		</td>

		<td colspan="1" align="left" class="listingcell">

			<input type="text" name="username" value="<?php echo $username ?>" class="textbox" size="35"/>
		
		</td>
	</tr>



	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="<? echo ( $error['connection'] ? "errortext" : "midtext" ) ?>"><b>Password: </b></font><br />

		</td>

		<td colspan="1" align="left" class="listingcell">

			<input type="password" name="password" value="<?php echo $password ?>" class="textbox" size="35"/>
		
		</td>
	</tr>



</table>

<br />
<br />

<?php 
  if($error[dbexist]) {
?>

<font class="errortext">Error: Cannot find specified MySQL Database</font>
<br /><br />

<?php

}

?>

<table border="1" cellpadding="6" cellspacing="0" class="table" width="70%">

<tr>
			<td class="theader" colspan="2">
				
				Database Setup
			
			</td>
			
			
		</tr>
	

<tr>
	<td class="listingheader" height="25" colspan="2">
		<font class="orderbylink"><b>Enter the name of an existing database. If no database exists create a new one before moving on. 
</b></font>
	</td>

</tr>

	<tr>
		<td colspan="1" class="listingcell" width="50%">
			
			<font class="<? echo ( $error['dbexist'] ? "errortext" : "midtext" ) ?>"><b>Database Name:</b></font><br />

		</td>

		<td colspan="1" align="left" class="listingcell">

			<input type="text" name="dbname" value="<?php echo $dbname ?>" class="textbox" size="35"/>
		
		</td>
	</tr>



	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="midtext""><b>Table Prefix: (optional) </b></font><br />

		</td>

		<td colspan="1" align="left" class="listingcell">

			<input type="text" name="prefix" value="<?php echo $prefix ?>" class="textbox" size="35"/>
		
		</td>
	</tr>


</table>

<br />
<br />


<?php 
  if($error[admin_username] || $error[admin_password] || $error[full_name] || $error[email]) {
?>

<font class="errortext">Error: See below</font>
<br /><br />

<?php

}

?>


<table border="1" cellpadding="6" cellspacing="0" class="table" width="70%">

<tr>
			<td class="theader" colspan="2">
				
				Main Administration Account
			
			</td>
			
			
		</tr>
	

<tr>
	<td class="listingheader" height="25" colspan="2">
		<font class="orderbylink"><b>Create your account for the Administration Panel:</b></font>
	</td>

</tr>

	<tr>
		<td colspan="1" class="listingcell" width="50%">
			
			<font class="<? echo ( $error['admin_username'] ? "errortext" : "midtext" ) ?>"><b>Desired User Name:</b></font><br />

		</td>

		<td colspan="1" align="left" class="listingcell">

			<input type="text" name="admin_username" value="<?php echo $admin_username ?>" class="textbox" size="35"/>
		
		</td>
	</tr>



	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="<? echo ( $error['admin_password'] ? "errortext" : "midtext" ) ?>"><b>Desired Password:</b></font><br />

		</td>

		<td colspan="1" align="left" class="listingcell">

			<input type="password" name="admin_password" value="<?php echo $admin_password ?>" class="textbox" size="35"/>
		
		</td>
	</tr>

	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="<? echo ( $error['admin_password'] ? "errortext" : "midtext" ) ?>"><b>Confirm Password:</b></font><br />

		</td>

		<td colspan="1" align="left" class="listingcell">

			<input type="password" name="pass2" value="<?php echo $pass2 ?>" class="textbox" size="35"/>
		
		</td>
	</tr>

	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="<? echo ( $error['full_name'] ? "errortext" : "midtext" ) ?>"><b>Full Name:</b></font><br />

		</td>

		<td colspan="1" align="left" class="listingcell">

			<input type="text" name="full_name" value="<?php echo $full_name ?>" class="textbox" size="35"/>
		
		</td>
	</tr>

	<tr>
		<td colspan="1" class="listingcell">
			
			<font class="<? echo ( $error['email'] ? "errortext" : "midtext" ) ?>"><b>Email Address:</b></font><br />

		</td>

		<td colspan="1" align="left" class="listingcell">

			<input type="text" name="email" value="<?php echo $email ?>" class="textbox" size="35"/>
		
		</td>
	</tr>


</table>


<br /><br />


<table border="1" cellpadding="6" cellspacing="0" class="table" width="70%">
<tr>
		<td colspan="2" class="listingheader" align="center">
			
			<input type="submit" value="Complete Installation" class="buttons"/>
			<input type="reset" value="Reset Fields" class="buttons"/>

		</td>
</tr>
	
	
</table>


</form>




	

<br /><br />

</center>

<br/><br/>

</body>
</html>