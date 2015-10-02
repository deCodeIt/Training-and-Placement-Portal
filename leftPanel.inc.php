<?php
require_once 'chkLogIn.inc.php';
?>
<div class="col-sm-3">
	<div class="panel panel-warning">
		<div class="panel-heading"><h4>Links</h4></div>
		<div class="panel-body">
			 <div class="list-group">
			  <?php 
			  if (isStudent()) {
			  	# code...
			  echo '<a href="./myProfile.php" class="list-group-item '.$myP.'">My Profile</a>
			  <a href="./projectAvailable.php" class="list-group-item '.$pAv.'">Projects Available</a>
			  <a href="./uplCv.php" class="list-group-item '.$uCv.'">View Your CV</a>
			  <a href="./uplProfile.php" class="list-group-item '.$cPr.'">Change Profile Pic</a>
			  <a href="./chPass.php" class="list-group-item '.$cpw.'">Change Password</a>';
			}
			elseif (isCompany()) {
				# code...
				echo '<a href="./myDetails.php" class="list-group-item  '.$myD.'">My Details</a>
				<a href="./projectSub.php" class="list-group-item '.$cPj.'">Create Project</a>
			  <a href="./projectList.php" class="list-group-item '.$pSb.'">Projects Submitted</a>
			  <a href="./chLogo.php" class="list-group-item '.$cLg.'">Change Your Logo</a>
			  <a href="./chPass.php" class="list-group-item '.$cPw.'">Change Password</a>';
			}
			?>
			</div>
		</div>
	</div>
</div>