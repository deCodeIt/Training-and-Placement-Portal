<?php
session_start();
$_SESSION = array();
if (isset($_COOKIE[session_name()])){
	setcookie(session_name(),'',time()-4200,'/');
}
session_destroy();

{
echo "LOGGED OUT SUCCESSFULLY<br>";
echo "<a href = 'loginform.php'>LOGIN</a><br>";
}

//or redirect to login form.ph

//header("Locaition:loginform.php");

?>