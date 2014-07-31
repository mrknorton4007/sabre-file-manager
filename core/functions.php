<?php
	// Sabre functions file

	// Currnet Sabre version
	function getversion(){
		return "2.0.1";
	}

	// Byte conversion
	function makeSize($fl){
		$size = filesize($fl);
		$units = array('B','KB','MB','GB','TB');
		$u = 0;
		while ((round($size/1024) > 0) && ($u < 4)){
			$size = $size/1024;
			$u++;
		}
		return (round($size,2) . " " . $units[$u]);
	}

	// Show a message
	// msg_class = info, success, danger or warning
	// msg_text = text of the message
	function showMsg($msg_class, $msg_text){
		echo "<div class=\"alert alert-".$msg_class."\">";
		echo "<p>".$msg_text."</p></div>\n";
	}

	// Return PhpInfo() value
	function getPhpinfo($var){
		return @get_cfg_var($var);
	}

	// Try to set PhpInfo() value
	function setPhpinfo($var, $new){
		return @ini_set($var, $new);
	}

	// Debug to web browser console
	function debug($text) {
		echo "<script type=\"text/javascript\">console.log(\"".htmlspecialchars($text)."\")</script>";
	}
	
?>
