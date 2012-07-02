<?php

class DB {
	
	//declare all necessary variables
	var $mysql_hostname;
	var $mysql_username;
	var $mysql_password;
	var $mysql_database;
	var $link_id;
	var $tablename;
	var $resultset;
		
	
	
	/**************************** Class Constructor ************************/
	function DB($mysql_hostname, $mysql_database="") {
		$this->mysql_hostname = "$mysql_hostname";
		$this->mysql_username = "";
		$this->mysql_password = "";
		$this->mysql_database = "$mysql_database";
		$this->link_id = "";
		$this->tablename = "";
		$this->resultset = "";
	}
	
	
	
	
	
	/********************** Database Connection **********************************/
	function Connect($mysql_username, $mysql_password) {
		
		$this->mysql_username = $mysql_username;
		$this->mysql_password = $mysql_password;

		$h = $this->mysql_hostname; 
		$u = $mysql_username;
		$p = $mysql_password;
		$d = $this->mysql_database;
		
		// connect to database
		$this->link_id = mysql_connect("$h", "$u", "$p");
						
		if(!$this->link_id) {
			echo "<b>Error Connecting to Database</b>";
			
		} elseif($d != "") {
			
			//select database if parameter specified
			if(!mysql_select_db($d, $this->link_id)) {
				
				return 0;

			} else {

				return 1;

			}
		}

		return 1;
		
	}
	
		
	
	
	
	/******************************* Change Database *****************************/
	function setDB($d) {
		
		$link = $this->link_id;
		
		if(!mysql_select_db($d, $link)) {
		
			return 0;
			
		} else {
		
			$this->mysql_database = $d;
			return 1;
	
		}
		
	}	
		
		
		
	
	/*********************** Execute Generic Query ************************/
	function Query($query) {
		
		$link = $this->link_id;
		return mysql_query($query, $link);
		
	}
		


	/*********************** Backup Specified Database ************************/
	function Backup() {
		
		global $_CONF;
		
		$hostname = $this->mysql_hostname;
		$username = $this->mysql_username;
		$password = $this->mysql_password;
		$db = $this->mysql_database;
		$loc = $_CONF[backup_location];
		$time = time();

		// Perform Backup Sequence
		$file_name = "calexpbackup" . $time . ".sql";
		$command = "mysqldump -h" . $hostname . " -u" . $username . " -p" . $password . " $db >$loc/$file_name";
		
		echo $command;

		passthru("$command", $error);

		if($error) { 
		
			echo $error;
			exit();
		}

		return $time;
		
	}
	
		
	
	/*********************** Close All Connections ************************/
	function Close() {
		
		mysql_close($this->link_id);
		
	}
	
	
	
}




?>