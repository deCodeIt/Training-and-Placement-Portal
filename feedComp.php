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
if(isCompany())
	{
	if(isset($_POST['entry_num']) && !empty($_POST['entry_num']))
	{
		$myquery=sprintf("INSERT INTO %s (employee_attitude, work_strategy, quantity_of_work, quality_of_work, Additionally,company_email_id,entry_number) VALUES(%s,%s,%s,%s,'%s','%s','%s')",$table_name_feedcomp,getEsc($_POST['employee_attitude']),getEsc($_POST['work_strategy']),getEsc($_POST['quantity_of_work']),getEsc($_POST['quality_of_work']),getEsc($_POST['additionally']),$_SESSION['company_id'],getEsc($_POST['entry_num']));
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
	else
	{
		echo "some error occured";
	}
}
else
{
	echo "You are Not supposed to be here ==\"";
}

?>