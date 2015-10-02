<?php
require_once 'connect.inc.php';
require_once 'chkLogIn.inc.php';
?>

<?php
function getEsc($str)
{
	global $connect;
	return trim(mysqli_real_escape_string($connect,$str));
}
if(isStudent())
	{
	if(isset($_POST['email']) && !empty($_POST['email']))
	{
		$myquery=sprintf("INSERT INTO %s (work_environment, work_provided, entry_number, Office_activities, Communication, Monitoring, Additionally,company_email_id) VALUES(%s,%s,'%s',%s,%s,%s,'%s','%s')",$table_name_feedstud,getEsc($_POST['work_environment']),getEsc($_POST['work_provided']),$_SESSION['entry_num'],getEsc($_POST['office_activities']),getEsc($_POST['communication']),getEsc($_POST['monitoring']),getEsc($_POST['additionally']),getEsc($_POST['email']));
		if($resQuery=mysqli_query($connect,$myquery))
		{
			echo "successfull submission of form";
		}
		else
		{
			echo "yesss";
			echo mysqli_error();
		}
	}
}
else
{
	echo "You are Not supposed to be here ==\"";
}

?>