<?php
	include './bslines.php';
	require_once './chkLogIn.inc.php';
	require_once './connect.inc.php';
	$li_color = array("text-primary","text-warning");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Approach Corporates!</title>
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
		<div class="panel-heading"><h2 class="infoself">Your Journey is about to start!</h2></div>
			<div class="panel-body" style="background-color:transparent;">
				<div class="col-sm-12">
				<?php
					
echo '
<h4 class="infoself"><ul class="text-warning text-justify list-style">
&nbsp;
<div class="'.$li_color[0].'"><li><div class="text-primary">We have a reputation of carrying out efficient and accurate market research. </li></div>
&nbsp;
<div class="'.$li_color[1].'"><li>We understand that given the current work scenario, what your demands would be.</li></div>
&nbsp;
<div class="'.$li_color[0].'"><li>Also, we understand the needs of the students and excel in matching every company to its correct student body.</li></div>
&nbsp;
<div class="'.$li_color[1].'"><li>The requirements of both parties being met results in a win-win situation which turns out to be most popular to all the involved parties.</li></div>
&nbsp;
<div class="'.$li_color[0].'"><li>We listen to all your queries and have set up a special forum to address these.</li></div>
&nbsp;
<div class="'.$li_color[1].'"><li>There is also a mentorship program by which if you have recruited and trained one student of our college word would pass through him to all the future employees that you would recruit from our college.</li></div>
&nbsp;
<div class="'.$li_color[0].'"><li>Also students can bank upon their seniors for reliable advice regarding their future with a company.</li></div>
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
				elseif (isStudent())
				{
					echo '	
					<div class="col-xs-offset-0 col-sm-offset-2 col-md-offset-3">
						<a class="btn btn-warning btn-md" role="button" href="/projectAvailable.php">Available Projects</a>
						<a class="btn btn-warning btn-md" role="button" href="/myProfile.php">My Profile!</a>
					</div>';
				}
				elseif (isCompany())
				{
					echo '
					<div class="col-xs-offset-0 col-sm-offset-2 col-md-offset-3">
					<h3 class="infoself text-danger">Sorry corporate but you can\'t take projects :(</h3>
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
