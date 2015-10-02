<?php
	include './bslines.php';
	require_once './chkLogIn.inc.php';
	require_once './connect.inc.php';
	$li_color = array("text-primary","text-warning");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Hire Students</title>
	<style type="text/css">

	@-moz-document url-prefix() {
	  fieldset { display: table-cell; }
	}
	
	</style>
	
</head>
<body background="images/green-bg_001.jpg">
	<div class="wrappers">
	<?php
	include './header.php';
	?>
	<div class="container-fluid">
	<div class="col-sm-10 col-sm-offset-1">
		<div class="panel panel-warning">
		<div class="panel-heading"><h2 class="infoself">Ready to Jump on the Board!</h2></div>
			<div class="panel-body" style="background-color:transparent;">
				<div class="col-sm-12">
				<?php
echo '<h4 class="infoself"><ul class="text-success text-justify list-style">
&nbsp;
<div class="'.$li_color[0].'"><li>Welcome!! Bienvenue!! Swagatam!! Jee aayan nu!! Dear companies to the RnDHub of our college we map the correct students for your companies needs by providing a clear segregation of students according to the clubs that they are part of.</li></div>
&nbsp;
<div class="'.$li_color[1].'"><li>You will realise that this approach is much more effective, because you can now look at only those students who meet your project’s demands without having to waste time going through piles and piles of resumes.</li></div>
&nbsp;
<div class="'.$li_color[0].'"><li>Also, we have verified all the resumes that you would receive through this portal.</li></div>
&nbsp;
<div class="'.$li_color[1].'"><li>Let us assure you that your dream project partner exists and we will help you find them.</li></div>
&nbsp;
<div class="'.$li_color[0].'"><li>So, what are you waiting for let’s get started before some other company realises how great he or she is.</li></div>
&nbsp;
</ul></h4>';
				if(!hasLoggedIn())
				{
					echo '
					<div class="col-xs-offset-3 col-sm-offset-4">
					<a href="#" onclick="setActiveSt(\'lo\')" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#log-signup">Login</a>
					<a href="#" onclick="setActiveSt(\'so\')" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#log-signup">Signup</a>
					</div>
					';
				}
				elseif (isCompany())
				{
					echo '
					<div class="col-xs-offset-0 col-sm-offset-2 col-md-offset-3">
					<a href="projectSub.php" class="btn btn-warning btn-lg">Create a New Project</a>
					<a href="projectList.php" class="btn btn-warning btn-lg">See your Projects</a>
					</div>
					';
				}
				elseif (isStudent())
				{
					echo '
					<div class="col-xs-offset-0 col-sm-offset-2 col-md-offset-3">
					<h3 class="infoself text-danger">Sorry Student but you can\'t be a corporate :(</h3>
					</div>
					';
				}
				?>
				</div>
			</div>
		</div>
		</div>
	</div>
	</div>
	
</body>
</html>
<!-- Global Footer-->
<?php 
include './footer.php';
?>
