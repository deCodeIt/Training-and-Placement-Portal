<?php
	include './bslines.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	
	<title>MY Projects!</title>
	<style type="text/css">

	@-moz-document url-prefix() {
	  fieldset { display: table-cell; }
	}

	/*canvas {
		width: 100%;
	}*/
	</style>
</head>
<body background="/images/green-bg_001.jpg" onload="loadProjects()">
	<?php
	$page = 'projLst.inc.php';
	include 'setPageFormat.inc.php'; 
	?>
</body>
</html>
<script type="text/javascript">
		//document.getElementById("myNavbar").getElementsByTagName("ul")[0].getElementsByTagName("li")[1].setAttribute("class","active");
	</script>
<?php
	include './footer.php';
?>
