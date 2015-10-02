<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="jquery/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<title>Student Details</title>
	<style type="text/css">
	#drpdwn{
		width:170px;
		text-align: center;
	}
	/*#drpdwn option{
		width: 100px;
	}*/
	</style>
	<script type="text/javascript">
		function loadOptions(strs)
		{
		var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		    {
		    	document.getElementById("names").innerHTML=xmlhttp.responseText;
		    }
		}
		xmlhttp.open("GET","getStation.php?q="+strs,true);
		xmlhttp.send();
	}
	</script>
</head>
<body background="images/Black-woven-seamless-background-tile.jpg">
	<div class="container" >
		<div class="table-responsive form-group-sm" style="background-image: url('images/6783-subtle-light-tile-pattern-vol1-graphic-web-backgrounds-pixeden.jpg')">
			<table border="0" class="table table-hover col-sm-7">
				<form name="frm" id="frm" method="POST">
					<tr>
						<th colspan="2" style="text-align:center">
							<h2><font color="Black">Information</font></h2>
						</th>
					</tr>
					<tr>
						<td >
							<font color="red" >Staion Name asdlasbfoawbfopwbaifbw :</font>
						</td>
						<td >
							<input type="text" class="form-control" list="names" id="nm" name="nm" autocomlete="off" onkeyup="loadOptions(this.value)">
							<datalist id="names">
							<!--here goes the dropdown list fetched from the server-->
							<datalist>
						</td>
					</tr>
					<tr>
						<td>
							<font color="blue">Gender :</font>
						</td>
						<td>
							<p>
							<select name="gen" size="1" id="drpdwn">
								<option value="male">MALE</option>
								<option value="female">FEMALE</option>
							</select>
							</p>
						</td>
					</tr>
					<tr>
						<td>
							<font color="blue">Entry Number :</font>
						</td>
						<td>
							<p><input type="text" id="en" class="form-control" size="20" name="en"></p>
						</td>
					</tr>
					<tr>
						<td>
							<font color="black">Branch :</font>
						</td>
						<td>
							<div class="form-group">
								<select class="form-control" name="branch" id="drpdwn">
									<option value="cse">CSE</option>
									<option value="ee">EE</option>
									<option value="me">ME</option>
								</select>
							</div>
						</td>
					</tr>
					<tr style="height:20px;"></tr>
					<tr>
						<td colspan="2" style="text-align:center">
							<p><input type="submit" value="SUBMIT!!!" style="width:150px;padding:5px 10px;background-color:#51A7FF"></p>
						</td>
					</tr>
				</form>
			</table>
		</div>
	</div>
</body>
</html>