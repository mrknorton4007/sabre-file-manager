<?php
	// Sabre updade config script
	session_start();

	$site_name = htmlspecialchars($_POST['site_name']);
	$file_path = htmlspecialchars($_POST['file_path']);
	$public_file = $_POST['public_file'];
	$password = md5($_POST['password']);
	$user_upload = $_POST['user_upload'];
	$date_style = htmlspecialchars($_POST['date_style']);
	$maintenance = $_POST['maintenance'];

	$data = "<?php
	// Sabre config file
	// Created on ".date('Y/m/d H:i')."

	define('sb_site_name', '".$site_name."');
	define('sb_root_path', '".dirname(getcwd())."');
	define('sb_version', '1.0.0');
	define('sb_file_path', '".$file_path."');
	define('sb_public_file', '".$public_file."');
	define('sb_password_hash', '".$password."');
	define('sb_user_upload', '".$user_upload."');
	define('sb_date_style', '".$date_style."');
	define('sb_maintenance_mode', '".$maintenance."');

?>";

	$first_setup = !file_exists("../config/settings.php");
	$file = "../config/settings.php";
	$strm = fopen($file, "w");
	$write_status = fwrite($strm, $data);
	fclose($strm);

	if ($write_status) {
		if ($first_setup) {
			header('location: ./index.php?config=1');
			exit();
		} else {
			header('location: ./index.php?config=2');
			exit();	
		}
	} else {
		header('location: ./index.php?config=3');
		exit();
	}
?>
