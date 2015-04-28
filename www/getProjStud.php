<?php
require_once 'connect.inc.php';
require_once 'chkLogIn.inc.php';
?>

<?php
$ct=1;
function getTabled($myVal)
{
	global $ct;
	$states='false';
	$row_status = getLinkStudent($myVal["id"])?'text-success bg-success':'';
	if ($row_status=='') {
		$states='false';
	}
	else
	{
		$states='true';
	}
	echo '<tr class="'.$row_status.'" onclick="changeModalText(\''.$myVal['description'].'\',\''.$myVal["stipend"].'\',\''.getCompanyDetails("company_name",$myVal["company_email_id"]).'\',\''.$myVal['id'].'\','.$states.');" data-target="#myModal" data-toggle="modal"><td>'.$ct.'</td>
	<td>'.$myVal['project_name'].'</td>
	<td>'.date('jS F,Y H:i A',strtotime($myVal['sub_date'])).'</td>
	</tr>';
}

if(isStudent())
	{
	$st = $_GET['page'];
	$st_len=strlen($st);
	if($st_len==0)
	{
		$st=0;
	}
	$st=mysqli_real_escape_string($connect,$st);
	$vals=array();

	$year = getStudentField('year');
	switch ($year) {
		case '2014':
			$year='year1';
			break;
		case '2013':
			$year='year2';
			break;
		case '2012':
			$year='year3';
			break;
		default:
			$year='year4';
			break;
	}
	$branch = getStudentField('branch');
	switch ($branch) {
		case 'CSE':
			$branch='branch_cs';
			break;
		case 'EE':
			$branch='branch_ee';
			break;
		default:
			$branch='branch_me';
			break;
	}
	$myquery=sprintf("SELECT project_name,sub_date,id,description,stipend,company_email_id FROM %s WHERE %s='%s' AND %s='%s' LIMIT %s OFFSET %s",$table_name_project,$branch,1,$year,1,10,$st);
	if($resQuery=mysqli_query($connect,$myquery))
	{
		$ct=1;
		if($myValue = mysqli_fetch_assoc($resQuery))
		{
			#echo '<tr><td colspan="3"><input type="button" value="Fetch data" class="btn btn-primary" onclick="loadProjects()"></td></tr>';
			echo '<tr><th>No.</th><th>Project Name</th><th>Date Of Submission</th></tr>';
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