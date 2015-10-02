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
	if(isset($_POST['entry_num']) && !empty($_POST['entry_num']) && isset($_POST['options']) && !empty($_POST['options']))
	{
		$myquery=sprintf("UPDATE %s SET status=%s WHERE entry_number='%s' AND id=%s",$table_name_studentProject,getEsc($_POST['options']),getEsc($_POST['entry_num']),getEsc($_POST['id']));
		if($resQuery=mysqli_query($connect,$myquery))
		{
			echo "Query Successful";
		}
		else
		{
			echo "Something undesirable happened :( We apologize for the same";
		}
	}
	else
	{
		echo "missing parameters";
	}
}
else
{
	echo "You are Not supposed to be here ==\"";
}

?>