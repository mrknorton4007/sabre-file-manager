<?php
	
	if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){
		include("../config/settings.php");

		if (constant(sb_user_upload)) {
			$file_name = pathinfo($_FILES['upl']['name'], PATHINFO_FILENAME);
			$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
			$upload_path = "../".sb_file_path."/";

			// A list of permitted file extensions
			/* $ext_allowed = array('txt', 'jpg', 'pdf', 'zip', 'png');
			if(!in_array(strtolower($extension), $ext_allowed)){
				header('location: ../?action=upload&file=');
				exit;
			} */
			
			// Remove spaces from filename
			$file_name = str_replace(" ", "-", $file_name);

			// Check for duplicates
			$file_count = 0;
			$final_name = $file_name.".".$extension;
			while(file_exists($upload_path.$final_name)){
				$file_count++;
				$final_name = $file_name.'_'.$file_count.'.'.$extension;
			}

			if(move_uploaded_file($_FILES['upl']['tmp_name'], $upload_path.$final_name)){
				header('location: ../?action=upload&file='.$final_name.'');
				exit;
			}
		} else {
			// Not allowed
			header('location: ../');
			exit;
		}
	}

	header('location: ../');
	exit;
?>
