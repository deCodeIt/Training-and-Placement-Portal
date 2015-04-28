<?php
require_once '../connect.inc.php';
require_once '../chkLogIn.inc.php';
?>
<?php
ob_start();
session_start();
?>

<?php 
if (isset($_POST['email_id']) && isset($_POST['password']) && !hasLoggedIn()) {
	
	if(!empty($_POST['email_id']) && !empty($_POST['password']))
	{
		$email_id = trim($_POST['email_id']);
		$email_id = mysqli_real_escape_string($connect,$email_id);
		$pwd = $_POST['password'];
		$pwd = mysqli_real_escape_string($connect,$pwd);
		$pwd = md5($pwd);
		//SELECT column1,column2,column3... FROM tablename ;
		$loginquery = "SELECT count(*) FROM $table_name_company where (company_email_id = '$email_id' and password = '$pwd')";
		//$loginquery = "SELECT count(*) FROM $table_name_for_students_info where (entry_number = '$entry_no' and password = '$pwd')";
		$query = mysqli_query($connect,$loginquery);

		//numeric array

		$res=mysqli_fetch_array($query);

		//print_r($res);
		if ($res[0] > 0){
			//print_r($_SESSION);
			$_SESSION['company_id'] = $email_id;
			#echo "successful logged in.</br> WELCOME ".$_SESSION['comany_name_id'];
			#echo "</br><a href = 'logoutcompany.php'>LOGOUT</a>";
			#echo "</br><a href = 'http://www.ibm.com/in/en/'>COMPANY_PAGE</a>";
			header('Location:/home.php');
		}
		else{
			echo "login failed";
			header('Location:/../activity.php?page=loginCompany');
			#echo "</br><a href = 'signupformcompany.php'>SIGN UP</a>";
			#echo "</br><a href = 'loginformcompany.php'>LOGIN</a>";
		}
	}
	else
	{
		echo "Please Enter your Email Id and Password Correctly!!! :P";
		header('Location:/../activity.php?page=loginCompany');
	}
}


?>