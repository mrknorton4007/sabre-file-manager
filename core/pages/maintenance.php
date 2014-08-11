<?php
	include("./core/header.php");

	echo "      <div id=\"maintenace\" class=\"container\">\n";
	echo "        "; showMsg('warning', 'Under maintenance');
	echo "        <p>This file manager is under scheduled maintenance. Please try again later.</p>\n";
	echo "      </div> <!-- /maintenance -->\n";

	include("./core/footer.php");
?>
