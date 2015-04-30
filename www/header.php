
<!--
<script type="text/javascript">
		//document.onload = (Title=String(document.title)),Title2=getRevCase(Title),changeTitle(String(document.title));
		
		function changeTitle(titleName)
		{
			document.title = (titleName.indexOf(Title)<0)?Title:Title2;
			(titleName.indexOf(Title)>=0)?setTimeout(function(){changeTitle(Title2)},1000):setTimeout(function(){changeTitle(Title)},1000);
		}
		function getRevCase(title)
		{
			title_new="";
			for (var i = 0; i < title.length; i++) {
				if(title.charAt(i)==title.charAt(i).toUpperCase())
					title_new+=title.charAt(i).toLowerCase();
				else if(title.charAt(i)==title.charAt(i).toLowerCase())
					title_new+=title.charAt(i).toUpperCase();
			};

			return title_new;
		}
		function setActiveState(Obj)
		{
			liElem = document.getElementById("myNavbar").getElementsByTagName("ul")[0].getElementsByTagName("li");
			for (var i = 0; i < liElem.length; i++) {
				liElem[i].setAttribute("class","");
			};
			Obj.setAttribute("class","active");
		}
</script>-->
<?php
require_once 'chkLogIn.inc.php';
?>

<?php
$c_p = str_replace("/","",$_SERVER["PHP_SELF"]);//current page
?>
<script type="text/javascript">
	function setActiveSt (elem_id) {
		document.getElementById(elem_id).click();
	}
	function setElemHidden(elem_id){
		if(String(document.getElementById(elem_id).class).indexOf('hidden')<0)
		{
			document.getElementById(elem_id).setAttribute('class',document.getElementById(elem_id).getAttribute('class')+" hidden-lg hidden-md hidden-sm hidden-xs");
		}
	}
</script>

<nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="background-color:transparent">
		<div class="container-fluid">
			<div class="container-fluid">
			<div class="panel panel-success">
			<div class="panel-body">
			<div class="col-xs-2">
				<img class="img-responsive" src="/images/iit_ropar_correct_trans.png" style="width:120px;height:auto;">
			</div>
			<div class="col-xs-10"><h1 class="infoself">Indian Institute of Technology, Ropar</h1>
			<h3 class="infoself hidden-xs">Training & Placement portal</h3></div>
			</div>
			</div>
			</div>
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" id="toggled" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span
					<span class="icon-bar"></span>
				</button>
			<div class="navbar-brand">R&D Hub</div>
			</div>
			<div class="collapse bs-navbar-collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<?php echo (!hasLoggedIn())?'<li style="margin-left:10px;" class="'.(($c_p=="hireStudents.php")?'active':'').'" ><a href="/hireStudents.php">Hire Students</a></li>':''; ?>
					<li style="margin-left:10px;" class="<?php echo ($c_p=="home.php" || $c_p=="" || $c_p=="index.php")?'active':''; ?>" ><a href="/home.php">Home</a></li>
					<?php echo (isCompany())?'<li style="margin-left:10px;" class="'.(($c_p=="hireStudents.php")?'active':'').'" ><a href="/hireStudents.php">Hire Students</a></li>':''; ?>
					<?php echo (!isCompany())?'<li style="margin-left:10px;" class="'.(($c_p=="approachCo.php")?'active':'').'" ><a href="/approachCo.php">Approach Corporates</a></li>':''; ?>
				</ul>
				<?php
				if(hasLoggedIn())
				{
					//echo "Hello! ".$_SESSION['entry_num'];
					include 'logOutNav.inc.php';
				}
				else
				{
					include 'logSignNav.inc.php';
				}
				?>
			</div>
		</div>
	</nav>
	<div id="container-fluid">
		<?php
		if(!($c_p=="home.php" || $c_p=="" || $c_p=="index.php" || $c_p=="activity.php"))
		{
			include './register-login.php';
		}
		?>
	</div>
	<!--<div class="container">
		<div class="row" style="height:50px;border-top:2px solid black"></div>
	</div>-->