<?php 
session_start();
if ((isset($_SESSION['login']) && $_SESSION['login'] != '')){
	header('Location: http://www.ibm.com/in/en/');//redirect to comapany specific  
}
else{
	echo "Viewing the webpage as guest!<br>";
	echo "Sign in from your comapany id to see the list of the student <br>";
	echo "<a href = 'loginformcompany.php'> LOGIN_COMPANY</a><br>";
	echo "NOT registered , sign up  <br>";
	echo "<a href = 'signupformcompany.php'> SIGNUP_COMPANY</a><br>";
}
?>