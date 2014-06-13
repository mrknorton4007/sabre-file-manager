<?php

	session_start();

	// Sabre installed?
	if(file_exists("./config/settings.php")) {
		include("./config/settings.php");
	} else {
		// Default settings
		define('sb_site_name', 'Sabre');
		define('sb_version', '1.0.0');
		include("./core/pages/setup.php");
		exit();
	}

	// Scheduled maintenance?
	if(constant(sb_maintenance_mode)){
		include("./core/pages/maintenance.php");
		exit();
	}

	// Login is required?
	if(!constant(sb_public_file) and !isSet($_SESSION['auth'])){
		include("./core/pages/login.php");
		exit();
	}

	// Password is required and correct?
	if(!constant(sb_public_file) and $_SESSION['auth'] != sb_password_hash){
		include("./core/pages/login.php");
		exit();
	}

?>
