<?php
require_once '../connect.inc.php';
require_once '../chkLogIn.inc.php';
echo "yes";
?>
<?php

if( isset($_REQUEST['authkey']) && !empty($_REQUEST['authkey']) && isset($_REQUEST['userem']) && !empty($_REQUEST['userem']) )
{
	$comp_email = htmlentities(trim($_REQUEST['userem']));
	$auth = htmlentities(trim($_REQUEST['authkey']));

	$myquery=sprintf("SELECT * FROM %s WHERE company_email_id='%s' AND auth_token='%s'",$table_name_company,$comp_email,$auth);
	if($resQuery=mysqli_query($connect,$myquery))
	{
		if($query=mysqli_fetch_row($resQuery))
		{
			$myquery=sprintf("UPDATE %s SET verified=1 WHERE company_email_id='%s'",$table_name_company,$comp_email);
			if($resQuery=mysqli_query($connect,$myquery))
			{
				$_SESSION['activated']['activated']='Congratutalions! you have successfully registered yourself';
				$_SESSION['company_id']=$comp_email;
			}
		}
		else
		{
			$_SESSION['error']['activated']="invalid token";
		}
	}
	else
	{
		$_SESSION['error']['activated']="invalid token";
	}
}
elseif (isset($_POST['email_id']) && isset($_POST['password']) && !hasLoggedIn()) {
	
	if(!empty($_POST['email_id']) && !empty($_POST['password']))
	{
		$company_email = htmlentities($_POST['email_id']);
		$passwd = md5(htmlentities($_POST['password']));
		$auth_token=rand(1000,9999).bin2hex(openssl_random_pseudo_bytes(15)).rand(1000,9999);
		echo $auth_token;
		$myquery=sprintf("SELECT * FROM %s WHERE company_email_id='%s'",$table_name_company,$company_email);
		//enter the field of the table in comanyinfo
		if($resQuery=mysqli_query($connect,$myquery))
		{
			if(mysqli_fetch_row($resQuery)==0)
			{
				$myquery=sprintf("INSERT INTO %s (company_email_id,password,auth_token) VALUES ('%s','%s','%s')",$table_name_company,$company_email,$passwd,$auth_token);
				if($resQuery=mysqli_query($connect,$myquery))
				{
					$_SESSION['success']['activation']="A verification link has been sent to your email address provided";
				}
				else
				{
					$_SESSION['error']['dberror']="Sorry! Database error occurred";
				}
			}
			else
			{
				$_SESSION['error']['email']='Email Address Already Exists in our Database =="';
			}
		}
		else
		{
			$_SESSION['error']['dberror']="Sorry! Database error occurred";
		}
	}
	else
	{
		$_SESSION['error']['empty']="Email-Address / Password was left empty";
	}
}
header('Location:../activity.php?page=signupCompany');
?>
