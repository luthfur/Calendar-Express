<?php
	
/************ Phplite Template Engine ********************

 Author: Luthfur R. Chowdhury for Phplite.com
 (C) Luthfur Rahman Chowdhury 2003 

*********************************************************/

	
class Template {

// Variable container array for use inside template files
var $_VARS = array();

// Directory in which the templates are stored
var $tempDir = "";




/*********** Initialize Template Class ****************/
function Template($dir = "") {
	
	$this->setDir($dir);
	
}




/********** Add Template Variable *********************/
function addVar($name, &$value) {

	$this->_VARS[$name] = $value;

}




/********* Get Template Variable *********************/
function getVars() {
	
	$variables = array_keys($this->_VARS);
	
	if (!empty($variables)) {
		return $variables;
	} else {
		return 0;
	}

}




/************** Display Template *********************/
function display($file) {
	
	$tempFile = $file;
	
	if(isset($this->tempDir)) {
		$tempFile = realpath($this->tempDir) . "/" . $file;
	}
	
	extract($this->_VARS);
	
	if(file_exists($tempFile)) {
		include $tempFile;	
		
	} else {
		trigger_error("The template file '$tempFile' is does not exist!", E_USER_ERROR);
	}
	
}



/************** Parse Template *********************/
function parseFile($file) {
	
	$tempFile = $file;
	
	if(isset($this->tempDir)) {
		$tempFile = realpath($this->tempDir) . "/" . $file;
	}
	
	extract($this->_VARS);
	
	if(file_exists($tempFile)) {

			include $tempFile;
			
			return $output;
		
	} else {
		trigger_error("The template file '$tempFile' is does not exist!", E_USER_ERROR);
	}
	
}






/************** Set Template Directory *********************/
function setDir($dir) {
	
	$tempDir = realpath($dir);
	
	if(is_dir($tempDir)) {
		$this->tempDir = $tempDir;	
	} else {
		trigger_error("The template directory '$tempDir' does not exist!", E_USER_ERROR);
		$this->tempDir = "";	
	}

}

}


?>