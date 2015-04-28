<?php
require_once 'chkLogIn.inc.php';
require_once 'connect.inc.php';

?>
<?php
// Check if image file is a actual image or fake image
$statusMSG="";
$changeOk=1;
$cont = 1;
$c_msg="";
$n_msg1="";
$n_msg2="";
$c_pass="";
$n_pass1="";
$n_pass2="";
$count=1;
if(hasLoggedIn() && isset($_POST["submit"])) {
	if(isset($_POST['Cpass']) && !empty($_POST['Cpass']))
	{
		$changeOk=1;
		$c_pass=mysqli_real_escape_string($connect,$_POST['Cpass']);
	}
	else
	{
		$changeOk=0;
		$c_msg="Current Password cannot be left blank";
		$statusMSG .= $count++.". ".$c_msg."<br>" ;
	}
	if(isset($_POST['Npass1']) && !empty($_POST['Npass1']))
	{
		$changeOk=($changeOk==1)?1:0;
		$n_pass1=mysqli_real_escape_string($connect,$_POST['Npass1']);
		
	}
	else
	{
		$changeOk=0;
		$n_msg1="New Password cannot be left blank";
		$statusMSG .= $count++.". ".$n_msg1."<br>";
	}
	if(isset($_POST['Npass2']) && !empty($_POST['Npass2']))
	{
		$changeOk=($changeOk==1)?1:0;
		$n_pass2=mysqli_real_escape_string($connect,$_POST['Npass2']);
	}
	else
	{
		$changeOk=0;
		$n_msg2="Renter New Password cannot be left blank";
		$statusMSG .= $count++.". ".$n_msg2."<br>";
	}

	if($changeOk==1)
	{
		if($n_pass1==$n_pass2 && strlen($n_pass1)>=8){
			$n_pass1=md5($n_pass1);
			$n_pass2=md5($n_pass2);
			$c_pass=md5($c_pass);
		if (isStudent()) {
		# code...
			if($c_pass==getStudentField('password'))
			{
				if(setStudentField('password',$n_pass1))
				{
					$statusMSG="Password Changed Successfully";
				}
				else
				{
					$statusMSG="An Error Occured!! Password Could not be changed";
				}
			}
			else
			{
				$c_msg="Incorrect Current Password";
				$changeOk=0;
			}
		}
		elseif (isCompany()) {
			if($c_pass==getCompanyField('password'))
			{
				if(setCompanyField('password',$n_pass1))
				{
					$statusMSG="Password Changed Successfully";
				}
				else
				{
					$statusMSG="An Error Occured!! Password Could not be changed";
				}
			}
			else
			{
				$c_msg="Incorrect Current Password";
				$changeOk=0;
			}
		}
		}
		else
		{
			$n_msg1="Passwords Do Not Match or length is less than 8 characters";
			$changeOk=0;
		}
	}
	else
	{
		$statusMSG="Are you sure that You followed the Instructions carefully?<br>".$statusMSG;
	}
}
?>

		<div class="panel-body">
		<div class="col-sm-12">
		 <form class="form-horizontal" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		  <?php
		  if($statusMSG != ""){
		  	if($changeOk==0)
		  	{
		  		echo '<div class="form-group"><p class="text-danger bg-danger">'.$statusMSG.'</p></div>';
		  	}
		  	else
		  	{
		  		echo '<div class="form-group"><p class="text-success bg-success">'.$statusMSG.'</p></div>';
		  	}
		  	}
		  	?>
		  <div class="form-group">
		    <label for="currentPassword" class="col-xs-4 control-label">Current password:</label>
		    <div class="col-md-5 col-xs-8 col-sm-7">
		    <input type="password" class="form-control" id="Cpass" name="Cpass">
		    <p class="help-block">Enter your current password</p>
		    <?php
		  if($c_msg != ""){
		  	if($changeOk==0)
		  	{
		  		echo '<p class="text-warning bg-warning">'.$c_msg.'</p>';
		  	}
		  	else
		  	{
		  		echo '<p class="text-success bg-success">'.$c_msg.'</p>';
		  	}
		  	}
		  	?>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="newPassword1" class="col-xs-4 control-label">New password:</label>
		    <div class="col-md-5 col-xs-8 col-sm-7">
		    <input type="password" class="form-control" id="Npass1" name="Npass1">
		    <p class="help-block">Enter new password, atleast 8 characters Long</p>
		    <?php
		  if($n_msg1 != ""){
		  	if($changeOk==0)
		  	{
		  		echo '<p class="text-warning bg-warning">'.$n_msg1.'</p>';
		  	}
		  	else
		  	{
		  		echo '<p class="text-success bg-success">'.$n_msg1.'</p>';
		  	}
		  	}
		  	?>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="newPassword2" class="col-xs-4 control-label">New password:</label>
		    <div class="col-md-5 col-xs-8 col-sm-7">
		    <input type="password" class="form-control" id="Npass2" name="Npass2">
		    <p class="help-block">Enter new password once again</p>
		    <?php
		  if($n_msg2 != ""){
		  	if($changeOk==0)
		  	{
		  		echo '<p class="text-warning bg-warning">'.$n_msg2.'</p>';
		  	}
		  	else
		  	{
		  		echo '<p class="text-success bg-success">'.$n_msg2.'</p>';
		  	}
		  	}
		  	?>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class=" col-xs-offset-4 col-xs-4 col-md-offset-3 col-md-3">
		      <input type="submit" class="btn btn-success " name="submit" value="Change Password!">
		    </div>
		  </div>
		</form>
		</div>
		</div>