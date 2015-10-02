<?php
require_once 'chkLogIn.inc.php';
?>
<script src="./kickout.js"></script>
<ul class="nav navbar-nav navbar-right">
	<?php
	if(isStudent())
	{ 
		echo '<li><a href="./myProfile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;My Profile!</a></li>';
	}
	elseif (isCompany()) {
		echo '<li><a href="./myDetails.php"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;My Details!</a></li>';	
		# code...
	}
	?>
	<li><a href="#" onclick="logMeOut();"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Logout!</a></li>
</ul>