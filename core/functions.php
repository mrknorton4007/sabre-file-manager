<?php
	// Sabre functions file

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

	// Show an informative message
	function msgInfo($text){
		echo "<div class=\"alert alert-info\">";
		echo "<p>".$text."</p></div>\n";
	}

	// Show a success message
	function msgSuccess($text){
		echo "<div class=\"alert alert-success\">";
		echo "<p>".$text."</p></div>\n";
	}

	// Show an alert message
	function msgAlert($text){
		echo "<div class=\"alert alert-danger\">";
		echo "<p>".$text."</p></div>\n";
	}

	// Show a warning message
	function msgWarning($text){
		echo "<div class=\"alert alert-warning\">";
		echo "<p>".$text."</p></div>\n";
	}

	// Return PhpInfo() value
	function getPhpinfo($variable){
		return @get_cfg_var($variable);
	}

	// Try to set PhpInfo() value
	function setPhpinfo($variable, $new){
		return @ini_set($variable, $new);
	}

	// Debug to web browser console
	function debug($text) {
		echo "<script type=\"text/javascript\">console.log(\"".htmlspecialchars($text)."\")</script>";
	}
	
?>
