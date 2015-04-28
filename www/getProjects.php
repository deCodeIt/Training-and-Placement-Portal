<?php
require_once 'connect.inc.php';
require_once 'chkLogIn.inc.php';
?>

<?php
$ct=1;
function getTabled($myVal)
{
	global $ct;
	echo '<tr onclick="changeModalText(\''.$myVal['description'].'\',\''.$myVal['stipend'].'\','.getTablesStudents($myVal['id']).')" data-target="#myModal" data-toggle="modal"><td>'.$ct.'</td>
	<td>'.$myVal['project_name'].'</td>
	<td>'.date('jS F,Y H:i A',strtotime($myVal['sub_date'])).'</td>
	</tr>';
}
function getTablesStudents($ids)
{
	$stlist = getLinkStudentProject($ids);
	return $stlist;
}
if(isCompany())
	{
	$st = $_GET['page'];
	$st_len=strlen($st);
	if($st_len==0)
	{
		$st=0;
	}
	$st=mysqli_real_escape_string($connect,$st);
	$vals=array();
	$myquery=sprintf("SELECT project_name,sub_date,id,description,stipend FROM %s WHERE company_email_id='%s' LIMIT %s OFFSET %s",$table_name_project,$_SESSION['company_id'],10,$st);
	if($resQuery=mysqli_query($connect,$myquery))
	{
		$ct=1;
		if($myValue = mysqli_fetch_assoc($resQuery))
		{
			#echo '<tr><td colspan="3"><input type="button" value="Fetch data" class="btn btn-primary" onclick="loadProjects()"></td></tr>';
			echo '<tr><th>Sr. No.</th><th>Project Name</th><th>Submitted On</th></tr>';
			getTabled($myValue);
			$ct++;
			while ( $myValue = mysqli_fetch_assoc($resQuery) ) {
				getTabled($myValue);
				$ct++;
			}
		}
	}
}
else
{
	echo "You are Not supposed to be here ==\"";
}

?>