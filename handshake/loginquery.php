<?php
require_once '../connect.inc.php';
require_once '../chkLogIn.inc.php';
?>

<?php 
ob_start();
session_start();

?>

<?php 
if (isset($_POST['entry_number']) && isset($_POST['password']) && !hasLoggedIn()) {
	
	if(!empty($_POST['entry_number']) && !empty($_POST['password']))
	{
	$entry_no = strtoupper(trim($_POST['entry_number']));
	$entry_no = mysqli_real_escape_string($connect,$entry_no);
	//echo "$entry_no";
	$pwd = $_POST['password'];
	$pwd = mysqli_real_escape_string($connect,$pwd);
	$pwd = md5($pwd);
	//SELECT column1,column2,column3... FROM tablename ;
	$loginquery = "SELECT count(*) FROM $table_name_student where (entry_number = '$entry_no' and password = '$pwd')";
	//echo $loginquery;
	if($query = mysqli_query($connect,$loginquery)){

	//numeric array

	$res=mysqli_fetch_array($query);
	//print_r($res);
	if ($res[0] == 1){
		//print_r($_SESSION);
		$_SESSION['entry_num'] = $entry_no;
		header('Location:./../home.php');
	}
	else{
		header('Location:./../activity.php?page=loginStudent');
	}
}
}
else
{
	echo "Please Enter your Entry Number and Password Correctly!!! :P";
	header('Location:./../activity.php?page=loginStudent');
}
}
?>