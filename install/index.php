<?php	
	include("../core/functions.php");
	if (file_exists("../config/settings.php")) {
		include("../config/settings.php");
	} else {
		// Default settings
		define('sb_site_name', 'Sabre');
		define('sb_file_path', 'upload');
		define('sb_public_file', 'true');
		define('sb_user_upload', 'true');
		define('sb_user_delete', 'false');
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
		<!-- <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.min.js"></script> -->
		<script type="text/javascript" src="../core/lib/jquery-1.9.1.min.js"></script>
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
					// Config file created
					showMsg('info', '<strong>Successfull configured!</strong> Now delete the "install" folder or rename it if you want to use this page as control panel.');
				}

				if ($_GET['config'] == '2') {
					// Config file updated
					showMsg('success', '<strong>Success!</strong> Config file as been updated.');
				}

				if ($_GET['config'] == '3') {
					// Can't write config file
					showMsg('danger', '<strong>Error:</strong> config file not written!');
				}
			} else {
				if (file_exists('../config/settings.php')) {
					showMsg('warning', '<strong>Warning:</strong> this will overwrite your current configuration...');
				}
			}
			?>

			<form method="post" action="./update.php">
				<table width="100%" class="editor">
					<tr>
						<td width="40%"><p>Site name</p></td>
						<td width="60%"><input type="text" class="textbox" value="<?php echo sb_site_name; ?>" name="site_name" id="frm_site_name" placeholder="Enter the name of your site" required /></td>
					</tr>
					<tr>
						<td width="40%"><p>Upload folder name</p></td>
						<td width="60%"><input type="text" class="textbox" value="<?php echo sb_file_path; ?>" name="file_path" id="frm_file_path" placeholder="Enter the name of the folder that contain files" required /></td>
					</tr>
					<tr>
						<td width="40%"><p>Public files</p></td>
						<td width="60%"><select class="textbox" name="public_file" id="frm_public_file">
							<?php if(constant(sb_public_file)){
								echo "<option value=\"true\" selected=\"selected\">Yes</option>";
								echo "<option value=\"false\">No</option>";
							} else {
								echo "<option value=\"true\">Yes</option>";
								echo "<option value=\"false\" selected=\"selected\">No</option>";
							} ?>
						</select></td>
					</tr>
					<tr>
						<td width="40%"><p>Password (only if public_files is true)</p></td>
						<td width="60%"><input type="password" class="textbox" value="" name="password" id="frm_password" placeholder="Password to access" /></td>
					</tr>
					<tr>
						<td width="40%"><p>User upload</p></td>
						<td width="60%"><select class="textbox" name="user_upload" id="frm_user_upload">
							<?php if(constant(sb_user_upload)){
								echo "<option value=\"true\" selected=\"selected\">Yes</option>";
								echo "<option value=\"false\">No</option>";
							} else {
								echo "<option value=\"true\">Yes</option>";
								echo "<option value=\"false\" selected=\"selected\">No</option>";
							} ?>
						</select></td>
					</tr>
					<tr>
						<td width="40%"><p>User delete</p></td>
						<td width="60%"><select class="textbox" name="user_delete" id="frm_user_delete">
							<?php if(constant(sb_user_delete)){
								echo "<option value=\"true\" selected=\"selected\">Yes</option>";
								echo "<option value=\"false\">No</option>";
							} else {
								echo "<option value=\"true\">Yes</option>";
								echo "<option value=\"false\" selected=\"selected\">No</option>";
							} ?>
						</select></td>
					</tr>
					<tr>
						<td width="40%"><p>Date style</p></td>
						<td width="60%"><input type="text" class="textbox" value="<?php echo sb_date_style; ?>" name="date_style" id="frm_date_style" placeholder="See php manual of date() function" required /></td>
					</tr>
					<tr>
						<td width="40%"><p>Maintenance mode</p></td>
						<td width="60%"><select class="textbox" name="maintenance" id="frm_maintenance">
							<?php if(constant(sb_maintenance_mode)){
								echo "<option value=\"true\" selected=\"selected\">Enabled</option>";
								echo "<option value=\"false\">Disabled</option>";
							} else {
								echo "<option value=\"false\" selected=\"selected\">Disabled</option>";
								echo "<option value=\"true\">Enabled</option>";
							} ?>
						</select></td>
					</tr>
				</table> <br>
				<input type="submit" class="btn btn-blue" value="Save" />
				<?php if (file_exists('../config/settings.php')) echo "<a href=\"../\" class=\"btn btn-blue\">Return to Sabre</a>"; ?>
			</form>
		</div> <!-- /container -->

		<script type="text/javascript">
			$("#frm_public_file").change(function(){
				if ($(this).val() == 'true')
					$("#frm_password").prop('disabled', true);
				else
					$("#frm_password").prop('disabled', false);
			});
		</script>

<?php include("../core/footer.php"); ?>
