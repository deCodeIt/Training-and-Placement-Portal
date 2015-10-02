<div class=" col-xs-12 col-sm-push-8 col-md-push-7 col-sm-4 col-md-5 col-lg-4 col-lg-push-8 ">

<?php
	if(!hasLoggedIn())
	{
		include './signLogin.php';
	}
	else
	{
		include './welMsg.inc.php';
	}
?>
<?
require_once './connect.inc.php';
require_once './chkLogIn.inc.php';
$vals=array();
$flag=0;
	$ct=0;
	$myquery=sprintf("SELECT  %s.project_name, %s.company_name FROM %s,%s WHERE %s.company_email_id=%s.company_email_id ORDER BY %s.sub_date DESC LIMIT 0,5",$table_name_project,$table_name_company,$table_name_company,$table_name_project,$table_name_company,$table_name_project,$table_name_project);
	if($resQuery=mysqli_query($connect,$myquery))
	{
		if($myValue = mysqli_fetch_assoc($resQuery))
		{
			$flag=1;
			$vals[$ct++] = $myValue;
			while ( $myValue = mysqli_fetch_assoc($resQuery) ) {
				$vals[$ct++] = $myValue;
			}
		}
	}
?>
<div class="col-xs-12">
<div class="panel panel-warning"> 
	<div class="panel-heading"><h4>Latest Projects</h4></div>
	<div class="panel-body" style="background-color:transparent;">
	 	<p class="text-primary">
	 	<?php
	 	for ($i=0; $i < count($vals); $i++) { 
	 		echo ($i+1).". Project:\"".$vals[$i]['project_name']."\" by - \"".$vals[$i]['company_name']."\"<br>";
	 	}
	 	?>
	 	</p>
	</div>
</div>
</div>
<div class="col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading"><h4>IIT Ropar News!!!</h4></div>
		<div class="panel-body" style="background-color:transparent;">
			<div class="container-fluid">
				<div class="col-md-6">
					<img src="./images/tandpnews.jpg" class="img-responsive" style="border:1px dotted #000000">
					<div class="vertical"></div>
				</div>
				<div class="col-md-6">
				<a href="http://www.ptu.ac.in/Upload/Notifications/44.pdf"><img src="./images/iit_ropar_news.png" class="img-responsive" style="border:1px dotted #000000"></a>
					<br>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
