<?php
	include './bslines.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	

	<title>Login/Signup</title>
	<style type="text/css">

	@-moz-document url-prefix() {
	  fieldset { display: table-cell; }
	}

	/*canvas {
		width: 100%;
	}*/

	</style>
</head>
<body background="/images/green-bg_001.jpg">
	<div class="wrappers">
		<?php
		include './header.php';
		?>
		<div class="container-fluid">
			<div class=" col-xs-12 col-sm-push-3 col-md-push-3 col-sm-6 col-md-5 col-lg-4 col-lg-push-4 ">
				<?php
					if(!hasLoggedIn())
					{
						include './signLogin.php';
					}
					else
					{
						include './welMsg.inc.php';
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>
<?php
	include './footer.php';
?>

