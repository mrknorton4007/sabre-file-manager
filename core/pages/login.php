<?php include("./core/header.php"); ?>

<div id="login" class="container">
	<?php if (isset($_GET['logout']) and $_GET['logout'] == '1') {
			showMsg('info', '<strong>Goodbye!</strong> All cookies has been deleted.');
		} else {
			showMsg('info', 'Login required');
		} ?>
	<form method="post" action="./core/login.php" style="display:block;margin:0 auto;" align="center">
		<input type="password" class="textbox" value="" name="psw" placeholder="Enter password here" required />
		<input type="submit" class="btn btn-blue" value="Login" />
	</form>
</div> <!-- /login -->

<?php include("./core/footer.php"); ?>
