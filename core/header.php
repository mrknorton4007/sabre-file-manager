<?php

   if(isset($_GET['action'], $_GET['file'])) {
      $act = $_GET['action'];    
      $file_url = "./".sb_file_path."/".$_GET['file'];


      if($act == "download") {
         if (file_exists($file_url)) {
            // Download code
            $act_class = "info";
            $act_text = "Download should be start now...";

            header("Content-Type: application/force-download");
            header("Content-Transfer-Encoding: binary");
            header("Content-Disposition: attachment; filename=\"".@basename($file_url)."\"");
            @readfile($file_url);
         } else {
            // File not found
            $act_class = "danger";
            $act_text = "Sorry, file not found...";
         }
      }

      if($act == "upload") {
         if(constant(sb_user_upload) and $_GET['file'] != "") {
            if (file_exists($file_url)) {
               // Upload complete
               $act_class = "success";
               // $act_text = "File has been uploaded!";
               $act_text = $_GET['file']." has been uploaded!";
               $_SESSION['num_upload'] = $_SESSION['num_upload'] - 1;
            } else {
               // File not found
               $act_class = "danger";
               $act_text = "Sorry, upload error...";
            }
         } else {
            // Not allowed
            $act_class = "danger";
            $act_text = "Sorry, you are not allowed to do this";
         }
      }


      if($act == "delete") {
         if(constant(sb_user_delete)) {
            if (file_exists($file_url)) {
               // Delete code
               @unlink($file_url);
               $act_class = "success";
               // $act_text = "File has been deleted";
               $act_text = $_GET['file']." has been deleted";
            } else {
               // File not found
               $act_class = "danger";
               $act_text = "Sorry, file not found...";
            }
         } else {
            // Not allowed
            $act_class = "danger";
            $act_text = "Sorry, you are not allowed to do this";
         }
      }
   }

echo "<!DOCTYPE HTML>\n";
echo "<html>\n";
echo "  <head>\n";
echo "    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />\n";
echo "    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />\n";
echo "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n";
echo "    <title>".sb_site_name." File manager</title>\n";
echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"core/style.css\" media=\"screen\" />\n";
echo "    <script type=\"text/javascript\" src=\"//code.jquery.com/jquery-1.9.1.min.js\"></script>\n";

if (constant(sb_user_upload)) {
   echo "    <script type=\"text/javascript\">\n";
   echo "      $(function(){\n";
   echo "        // Simulate a click on the file input button to show the file browser dialog\n";
   echo "        $('#drop a').click(function(){\n";
   echo "          $(this).parent().find('input').click();\n";
   echo "        });\n\n";

   echo "        // Auto-submit form after file is selected\n";
   echo "        $('#drop input').change(function(){\n";
   echo "          this.form.submit();\n";
   echo "        });\n";
   echo "      });\n";
   echo "    </script>\n";
}

echo "  </head>\n";
echo "  <body>\n";
echo "    <div id=\"header\">\n";
echo "      <h1><a id=\"logo\" href=\"./\">".sb_site_name." File Manager</a></h1>\n";
echo "    </div> <!-- /header -->\n\n";
echo "    <div id=\"page\">\n";

?>
