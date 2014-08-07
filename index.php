<?php 

	/* *********************************************
	 * Sabre File manager - Main file
	 * Author: Mark Norton
	 * Version: 2.0.1
	 * https://github.com/mrknorton4007/sabre
	 * ********************************************* */

	// Include function.php
	include("./core/functions.php"); 

	// Load and check settings
	include("./core/redirect.php");

	// Complete requests operations and load header
	include("./core/header.php"); 


	// Print Sabre menu
	echo "      <div id=\"menu\">\n";
	echo "        <a href=\"./\" class=\"btn btn-blue\">Refresh list</a>\n";
	if (constant(sb_user_upload)) {
		echo "        <form id=\"drop\" method=\"post\" action=\"./core/upload.php\" enctype=\"multipart/form-data\">\n";
		echo "        <a href=\"#\" class=\"btn btn-blue\">Upload file</a><input type=\"file\" name=\"upl\" multiple />\n";
		echo "        </form>\n";
	}
	if (!constant(sb_public_file)) {
		echo "        <a href=\"./core/logout.php?c=1\" class=\"btn btn-blue\">Logout</a>\n";
	}
	echo "      </div> <!-- /menu -->\n\n";


	// Open container tag
	echo "      <div class=\"container\">\n";

	// Check for messages
	if (isset($act_class, $act_text)) {
		showMsg($act_class, $act_text);
	}

	// Check if folder exist
	if (!file_exists(sb_file_path)) {
		showMsg('danger', 'Can\'t open <strong>'.sb_file_path.'</strong> folder. Check your Sabre settings!');
	}

	// Show file list
	echo "        <table class=\"filesys\">\n";
	echo "        <thead><tr><th class=\"file-index\">#</th><th class=\"file-name\">Name</th><th class=\"file-size\">File size</th><th class=\"file-date\">Upload date</th></tr></thead>\n";
	echo "        <tbody>\n";

	$filecount = 0;
	foreach(glob("./".sb_file_path."/*") as $file){
		if (!is_dir($file)) {
			$filecount++;
			$filename = basename($file);
			$filelink = "./".sb_file_path."/".$filename;
			$date = date(sb_date_style, filemtime($file));
			$filedim = makeSize($file);

			echo "        <tr>";
			echo "<td class=\"file-index\">".$filecount."</td>";
			echo "<td class=\"file-name\"><p>".$filename."</p>";

			echo "<span class=\"options\">";
			echo "<a href=\"./?action=download&amp;file=".$filename."\">Download</a>";
			if(constant(sb_user_delete)) {
				echo " / <a href=\"./?action=delete&amp;file=".$filename."\">Delete</a>";	
			}
			echo "</span>";
			echo "</td>";

			echo "<td class=\"file-size\">".$filedim."</td>";
			echo "<td class=\"file-date\">".$date."</td>";
			echo "</tr>\n";	
		} else {
			// Sorry, no recursive scan for now...
		}
	}

	echo "        </tbody>\n";
	echo "        </table>\n";
	echo "      </div> <!-- /container -->\n";

	// Include footer
	include("./core/footer.php");
?>
