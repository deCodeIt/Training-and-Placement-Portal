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
<div class="container-fluid">
<div class="panel panel-success"> 
	<div class="panel-heading"><h4>Latest Updates</h4></div>
	<div class="panel-body" style="background-color:transparent;">
	 	<p class="text-info">Yet to be Modified</p>
	 	<p class="text-info">THIS is some Random text.<br>THIS is some Random text.<br>THIS is some Random text.<br>THIS is some Random text.<br></p>
	</div>
</div>
</div>
<div class="col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading"><h4>IIT Ropar News!!!</h4></div>
		<div class="panel-body" style="background-color:transparent;">
			<div class="container-fluid">
				<div class="col-md-6">
					<img src="/images/tandpnews.jpg" class="img-responsive" style="border:1px dotted #000000">
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
