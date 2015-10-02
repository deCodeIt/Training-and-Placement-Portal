<?php
ob_start();
session_start();
require_once 'connect.inc.php';
$tmp_global_connect =$connect;
?>


<?php
function hasLoggedIn(){
if ( (isset($_SESSION['entry_num']) && !empty($_SESSION['entry_num'])) || (isset($_SESSION['company_id']) && !empty($_SESSION['company_id']))) {
	return true;
	# code...
}
else
{
	return false;
}
}
function isCompany(){
if (isset($_SESSION['company_id']) && !empty($_SESSION['company_id'])) {
	return true;
	# code...
}
else
{
	return false;
}	
}
function isStudent(){
if (isset($_SESSION['entry_num']) && !empty($_SESSION['entry_num'])) {
	return true;
	# code...
}
else
{
	return false;
}
}

function getStudentField($field)
{
	global $tmp_global_connect;
	return _getStudentField($field,$tmp_global_connect);
}

function getCompanyDetails($field,$id)
{
	global $tmp_global_connect;
	return _getCompanyDetails($field,$id,$tmp_global_connect);
}

function setLinkStudent($id)
{
	global $tmp_global_connect;
	return _setLinkStudent($id,$tmp_global_connect);
}

function getLinkStudent($id)
{
	global $tmp_global_connect;
	return _getLinkStudent($id,$tmp_global_connect);
}

function getCompanyField($field)
{
	global $tmp_global_connect;
	return _getCompanyField($field,$tmp_global_connect);
}

function getProjectField($field)
{
	global $tmp_global_connect;
	return _getProjectField($field,$tmp_global_connect);
}

function getLinkStudentProject($id)
{
	global $tmp_global_connect;
	return _getLinkStudentProject($id,$tmp_global_connect);
}

function getProjectFields()
{
	global $tmp_global_connect;
	return _getProjectFields($tmp_global_connect);
}

function setStudentField($field,$value)
{
	global $tmp_global_connect;
	return _setStudentField($field,$value,$tmp_global_connect);
}

function setCompanyField($field,$value)
{
	global $tmp_global_connect;
	return _setCompanyField($field,$value,$tmp_global_connect);
}

function _setCompanyField($field,$value,$connect)
{
	$value = mysqli_real_escape_string($connect,$value);
	global $table_name_company;
	$myquery=sprintf("UPDATE %s SET %s='%s' WHERE company_email_id='%s'",$table_name_company,$field,$value,$_SESSION['company_id']);
	if($resQuery=mysqli_query($connect,$myquery))
	{
		return true;
	}
	else
	{
		return false;
	}
}

function setProjectField($field,$value,$field2)
{
	global $tmp_global_connect;
	return _setProjectField($field,$value,$field2,$tmp_global_connect);
}

function _setProjectField($field,$value,$field2,$connect)
{
	$value = mysqli_real_escape_string($connect,$value);
	$field2 = mysqli_real_escape_string($connect,$field2);
	global $table_name_project;
	$myquery=sprintf("UPDATE %s SET %s='%s' WHERE company_email_id='%s' AND project_name='%s'",$table_name_project,$field,$value,$_SESSION['company_id'],$field2);
	if($resQuery=mysqli_query($connect,$myquery))
	{
		return true;
	}
	else
	{
		return false;
	}
}

function insertProjectField($value)
{
	global $tmp_global_connect;
	return _insertProjectField($value,$tmp_global_connect);
}

function _insertProjectField($value,$connect)
{
	#$value = mysqli_real_escape_string($connect,$value);
	foreach ($value as $key => $values) {
			$value[$key]=mysqli_real_escape_string($connect,$values);
		}
	global $table_name_project;
	$myquery=sprintf("INSERT INTO %s (sub_date,company_email_id,project_name,description,year1,year2,year3,year4,branch_cs,branch_ee,branch_me) VALUES (NOW(),'%s','%s','%s',%s,%s,%s,%s,%s,%s,%s)",$table_name_project,$value[0],$value[1],$value[2],$value[3],$value[4],$value[5],$value[6],$value[7],$value[8],$value[9]);
	if($resQuery=mysqli_query($connect,$myquery))
	{
		return true;
	}
	else
	{
		return false;
	}
}

function _setStudentField($field,$value,$connect)
{
	$value = mysqli_real_escape_string($connect,$value);
	global $table_name_student;

	$myquery=sprintf("UPDATE %s SET %s='%s' WHERE entry_number='%s'",$table_name_student,$field,$value,$_SESSION['entry_num']);
	if($resQuery=mysqli_query($connect,$myquery))
	{
		return true;
	}
	else
	{
		return false;
	}
}

function _getProjectFields($connect)
{
	global $table_name_project;
	#returns an array
	$vals=array();
	$ct=0;
	$myquery=sprintf("SELECT company_email_id,project_name,description,duration,sub_date,stipend,year1,year2,year3,year4,branch_cs,branch_ee,branch_me FROM %s WHERE company_email_id='%s'",$table_name_project,$_SESSION['company_id']);
	if($resQuery=mysqli_query($connect,$myquery))
	{
		if($myValue = mysqli_fetch_row($resQuery))
		{
			$vals[$ct++] = $myValue;
			while ( $myValue = mysqli_fetch_row($resQuery) ) {
				$vals[$ct++] = $myValue;
			}
			return $vals;
		}
		else
		{
			return "Not Set.";
		}
	}
	else
	{
		return "Not Set";
	}
}

function _getProjectField($field,$connect)
{
	global $table_name_project;
	$myquery=sprintf("SELECT %s FROM %s WHERE company_email_id='%s'",$field,$table_name_project,$_SESSION['company_id']);
	if($resQuery=mysqli_query($connect,$myquery))
	{
		mysqli_data_seek($resQuery,0);
		if($myValue = mysqli_fetch_row($resQuery))
		{
			return $myValue[0];
		}
		else
		{
			return "Not Set";
		}
	}
	else
	{
		return "Not Set";
	}
}

function _getStudentField($field,$connect)
{
	global $table_name_student;
	$myquery=sprintf("SELECT %s FROM %s WHERE entry_number='%s'",$field,$table_name_student,$_SESSION['entry_num']);
	if($resQuery=mysqli_query($connect,$myquery))
	{
		mysqli_data_seek($resQuery,0);
		if($myValue = mysqli_fetch_row($resQuery))
		{
			return $myValue[0];
		}
		else
		{
			return "Not Set";
		}
	}
	else
	{
		return "Not Set";
	}
}

function _getCompanyField($field,$connect)
{
	global $table_name_company;
	$myquery=sprintf("SELECT %s FROM %s WHERE company_email_id='%s'",$field,$table_name_company,$_SESSION['company_id']);
	if($resQuery=mysqli_query($connect,$myquery))
	{
		mysqli_data_seek($resQuery,0);
		if($myValue = mysqli_fetch_row($resQuery))
		{
			return $myValue[0];
		}
		else
		{
			return "Not Set";
		}
	}
	else
	{
		return "Not Set";
	}
}

function _getCompanyDetails($field,$id,$connect)
{
	global $table_name_company;
	$myquery=sprintf("SELECT %s FROM %s WHERE company_email_id='%s'",$field,$table_name_company,$id);
	if($resQuery=mysqli_query($connect,$myquery))
	{
		mysqli_data_seek($resQuery,0);
		if($myValue = mysqli_fetch_row($resQuery))
		{
			return $myValue[0];
		}
		else
		{
			return "Not Set";
		}
	}
	else
	{
		return "Not Set";
	}
}

function _setLinkStudent($id,$connect)
{
	global $table_name_studentProject;
	$myquery=sprintf("SELECT %s FROM %s WHERE entry_number='%s' and id='%s'",$id,$table_name_studentProject,$_SESSION['entry_num'],$id);
	if($resQuery=mysqli_query($connect,$myquery))
	{
		if(mysqli_fetch_row($resQuery) == 0)
		{
			$myquery=sprintf("INSERT INTO %s (id,entry_number) VALUES ('%s','%s')",$table_name_studentProject,$id,$_SESSION['entry_num']);
			if($resQuery=mysqli_query($connect,$myquery))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	else
	{
		return false;
	}
}

function _getLinkStudent($id,$connect)
{
	global $table_name_studentProject;
	$myquery=sprintf("SELECT status FROM %s WHERE entry_number='%s' and id='%s'",$table_name_studentProject,$_SESSION['entry_num'],$id);
	if($resQuery=mysqli_query($connect,$myquery))
	{
		if($myValue = mysqli_fetch_row($resQuery))
		{
			return $myValue[0];
		}
		else
		{
			return -1;
		}
	}
	else
	{
		return -1;
	}
}

function _getLinkStudentProject($id,$connect)
{
	global $table_name_studentProject;
	$myStudList=array();
	$myquery=sprintf("SELECT entry_number,status FROM %s WHERE id='%s' AND status!='2'",$table_name_studentProject,$id);
	//it will neglect rejected student names :(
	if($resQuery=mysqli_query($connect,$myquery))
	{
		if($myValue = mysqli_fetch_row($resQuery))
		{
			$myStudList[]=$myValue;
			while($myValue = mysqli_fetch_row($resQuery))
			{
				$myStudList[]=$myValue;
			}
			$res = getTabledStudentList($myStudList,$connect);
			return $res;
		}
		else
		{
			return "[]";
		}
	}
	else
	{
		return "[]";
	}
}

function getTabledStudentList($entryList,$connect)
{
	$st='[\'Student Name\',\'CV-Resume\',\'Accept\'';
	#$st='<table class="table" id="st_names"><tr><th>Student Name</th><th>CV-Resume</th></tr>';
	$len = count($entryList);
	for ($i=0; $i < $len; $i++) {
		$temp_st=',\''._getStudentFieldSelf('name',$entryList[$i][0],$connect).'\',\"./cv_students/'._getStudentFieldSelf('cv_link',$entryList[$i][0],$connect).'\',\''.$entryList[$i][0].'\',\''.$entryList[$i][1].'\'';
		$st=$st.$temp_st;
	}
	#$st=$st.'</table>';
	$st=$st.']';
	return $st;
}

function _getStudentFieldSelf($field,$entry_num,$connect)
{
	global $table_name_student;
	$myquery=sprintf("SELECT %s FROM %s WHERE entry_number='%s'",$field,$table_name_student,$entry_num);
	if($resQuery=mysqli_query($connect,$myquery))
	{
		mysqli_data_seek($resQuery,0);
		if($myValue = mysqli_fetch_row($resQuery))
		{
			return $myValue[0];
		}
		else
		{
			return NULL;
		}
	}
	else
	{
		return NULL;
	}
}
?>