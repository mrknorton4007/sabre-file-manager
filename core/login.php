<?php
	// Sabre login script
	session_start();

	if( isSet($_POST['psw']) ){
		include("../config/settings.php");
		
		if( md5($_POST['psw']) == sb_password_hash ){
			session_regenerate_id(TRUE);
			$_SESSION['auth'] = sb_password_hash;
			setcookie("sabre_cookie", $_SESSION['auth'], time()+31536000);
		}
	}

	header('location: ../');
?>
