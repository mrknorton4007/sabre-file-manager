<?php	
	if (file_exists("../config/settings.php")) {
		include("../config/settings.php");
	} else {
		// Default settings
		define('sb_site_name', 'Sabre');
		define('sb_file_path', 'files');
		define('sb_public_file', 'false');
		define('sb_user_upload', 'true');
		define('sb_date_style', 'd/m/Y H:i');
		define('sb_maintenance_mode', 'false');
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="robots" content="noindex" />
		<title>Sabre Config editor</title>
		<link rel="stylesheet" type="text/css" href="../core/style.css" media="screen" />
		<script type="text/javascript" src="../core/jquery-1.9.1.min.js"></script>
	</head>
	<body>
		<div id="header">
			<h1><a id="logo" href="./">Sabre Config editor</a></h1>
		</div>

		<div id="page">
			<div class="container">
		<?php
			if (isSet($_GET['config'])) {
				if ($_GET['config'] == '1') {
					echo '<h2>Successfull configured</h2> <br>';
					echo '<p>Now delete the "install" folder or rename it if you want to use as control panel.</p>';
					echo '<p>Return to <a href="../">Sabre main page</a> now.</p>';
				}

				if ($_GET['config'] == '2') {
					echo '<h2>Success</h2> <br>';
					echo '<p>Config file as been updated</p>';	
				}

				if ($_GET['config'] == '3') {
					echo '<h2>Error</h2> <br>';
					echo '<p>Config file not written!</p>';
				}
			} else {
				if (file_exists('../config/settings.php')) {
					echo '<h2>Warning: this will overwrite your current configuration</h2> <br>';
				}
			?>

			<form method="post" action="./update.php">
				<table width="100%">
					<tr>
						<td width="40%"><p>Site name</p></td>
						<td width="60%"><input type="text" class="big-input" value="<?php echo sb_site_name; ?>" name="site_name" placeholder="Enter the name of your site" required /></td>
					</tr>
					<tr>
						<td width="40%"><p>File path</p></td>
						<td width="60%"><input type="text" class="big-input" value="<?php echo sb_file_path; ?>" name="file_path" placeholder="Enter the name of the folder that contain files" required /></td>
					</tr>
					<tr>
						<td width="40%"><p>Public files</p></td>
						<td width="60%"><select class="" name="public_files">
							<?php if(constant(sb_public_file)){
								echo "<option value=\"true\" selected=\"selected\">Yes</option>";
								echo "<option value=\"false\">No</option>";
							} else {
								echo "<option value=\"false\" selected=\"selected\">No</option>";
								echo "<option value=\"true\">Yes</option>";
							} ?>
						</select></td>
					</tr>
					<tr>
						<td width="40%"><p>Password (only if public_files is checked)</p></td>
						<td width="60%"><input type="password" class="big-input" value="" name="password" placeholder="Entre the name of your site" /></td>
					</tr>
					<tr>
						<td width="40%"><p>User upload</p></td>
						<td width="60%"><select class="" name="user_upload">
							<?php if(constant(sb_user_upload)){
								echo "<option value=\"true\" selected=\"selected\">Yes</option>";
								echo "<option value=\"false\">No</option>";
							} else {
								echo "<option value=\"false\" selected=\"selected\">No</option>";
								echo "<option value=\"true\">Yes</option>";
							} ?>
						</select></td>
					</tr>
					<tr>
						<td width="40%"><p>Date style</p></td>
						<td width="60%"><input type="text" class="big-input" value="<?php echo sb_date_style; ?>" name="date_style" placeholder="See php manual of date() function" required /></td>
					</tr>
					<tr>
						<td width="40%"><p>Maintenance mode</p></td>
						<td width="60%"><select class="" name="maintenance">
							<?php if(constant(sb_maintenance_mode)){
								echo "<option value=\"true\" selected=\"selected\">Enabled</option>";
								echo "<option value=\"false\">No</option>";
							} else {
								echo "<option value=\"false\" selected=\"selected\">Disabled</option>";
								echo "<option value=\"true\">Yes</option>";
							} ?>
						</select></td>
					</tr>
					<tr>
						<td width="40%"></td>
						<td width="60%">
							<input type="submit" class="btn btn-blue" value="Confirm" />
							<?php if (file_exists('../config/settings.php')) echo "<a href=\"../\" class=\"btn btn-blue\">Return to Sabre</a>"; ?>
						</td>
					</tr>
				</table>
			</form>

			<?
			}
		?>
	</div> <!-- /container -->

<?php include("../core/footer.php"); ?>
