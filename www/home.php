<?php
	include './bslines.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	

	<title>IIT-Ropar R&D Hub</title>
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
	<div class="col-xs-12">
		<img src="./images/quote-unquote.png" class="img-responsive-height" id="bangoku">
		<br>
	</div>
	<?php
	include './rightSide.inc.php';
	include './homeContent.php';
	?>
	</div>
	</div>
</body>
</html>
<?php
	include './footer.php';
?>
