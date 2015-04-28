<?php
ob_start();
session_start();

require_once 'chkLogIn.inc.php';
?>

<div class="wrappers">
	<?php
	include './header.php';
	?>
	<div class="container-fluid">
	<?php
	if(!hasLoggedIn())
	{
		include './signLogin.php';
	}
	else
	{
		$title="";
		$myP="";
	  $pAv="";
	  $uCv="";
	  $cPr="";
	  $cpw="";
	  $myD="";
	  $cPj="";
	  $pSb="";
	  $cLg="";
	  $cPw="";
		switch ($page) {
			case 'myProf.inc.php':
				if(isStudent()){
				$title="My Profile";
				$myP="active";
				}
				break;
			case 'myDet.inc.php':
				if(isCompany()){
				$title="My Details";
				$myD="active";
				}
				break;
			case 'projects.inc.php':
				if(isCompany()){
				$title="Create Project";
				$cPj="active";
				}
				break;
			case 'myProfPic.inc.php':
				if(isStudent()){
				$title="Edit My Profile Pic";
				$cPr="active";
				}
				break;
			case 'chpasswd.inc.php':
				if(hasLoggedIn()){
				$title="Change My Password";
				$cpw="active";
				$cPw="active";
				}
				break;
			case 'chLogNew.inc.php':
				if(isCompany()){
				$title="Change Your Logo!";
				$cLg="active";
				}
				break;
			case 'projLst.inc.php':
				if(isCompany()){
				$title="My Projects!";
				$pSb="active";
				}
				break;
			case 'upcv_new.inc.php':
				if(isStudent()){
				$title="View/Edit My CV!";
				$uCv="active";
				}
				break;
			case 'projAvail.inc.php':
				if(isStudent()){
				$title="Available Projects";
				$pAv="active";
				}
				break;
			default:
				$title="";
				break;
		}
		include 'leftPanel.inc.php';
		#includes the left panel
		if($title!="")
		{
			echo '<div class="col-sm-9"><div class="panel panel-success">';
			echo '<div class="panel-heading"><h4>'.$title.'</h4></div>';
			include $page;
			echo '</div></div>';
		}
	}
	?>
	</div>
</div>