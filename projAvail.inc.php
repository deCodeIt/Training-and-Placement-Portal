
<?php
require_once 'chkLogIn.inc.php';
require_once 'connect.inc.php';
?>
<?php
if(isset($_POST['project_id']) && !empty($_POST['project_id']))
{
	$ids = htmlentities($_POST['project_id']);
	@setLinkStudent($ids);

}
?>
<script type="text/javascript">
		var pgNo=0;
		var count=0;
		emailid="";
		function visibility_arrows(inc)
		{
			count=parseInt(count)+parseInt(String(inc));
			//alert(count);
			if(count==1)
			{
				//document.getElementById("previous").setAttribute("style","display:none");
			}
			else if(count==6)
			{
				//document.getElementById("next").setAttribute("style","display:none");
			}
			else
			{
				document.getElementById("previous").setAttribute("style","display:inline-block");
				document.getElementById("next").setAttribute("style","display:inline-block");
			}

		}
		function changeIt(changeMe)
		{
			ids = changeMe.getAttribute("id");
			ids = ids.substr(0,ids.length-1);
			st=ids;
			st=st.replace("estar","work_environment");
			st=st.replace("pstar","work_provided");
			st=st.replace("astar","office_activities");
			st=st.replace("cstar","communication");
			st=st.replace("mstar","monitoring");
			document.getElementById(st).value=changeMe.getAttribute("id").substr(changeMe.getAttribute("id").length-1,changeMe.getAttribute("id").length);
			if(changeMe.getAttribute("class")=="glyphicon glyphicon-star-empty")
			  {
			    switch(changeMe.getAttribute("id")) {
				    case ids+'5':
				        document.getElementById(ids+'5').setAttribute("class","glyphicon glyphicon-star");
				    case ids+'4':
				        document.getElementById(ids+'4').setAttribute("class","glyphicon glyphicon-star");
				    case ids+'3':
				    	document.getElementById(ids+'3').setAttribute("class","glyphicon glyphicon-star");
				    case ids+'2':
				    	document.getElementById(ids+'2').setAttribute("class","glyphicon glyphicon-star");
				    case ids+'1':
				    	document.getElementById(ids+'1').setAttribute("class","glyphicon glyphicon-star");
				    default:
				        break;
				}
			 }
			  else
			  {
			  		document.getElementById(st).value=0;
			        document.getElementById(ids+'5').setAttribute("class","glyphicon glyphicon-star-empty");
			        document.getElementById(ids+'4').setAttribute("class","glyphicon glyphicon-star-empty");
			    	document.getElementById(ids+'3').setAttribute("class","glyphicon glyphicon-star-empty");
			    	document.getElementById(ids+'2').setAttribute("class","glyphicon glyphicon-star-empty");
			    	document.getElementById(ids+'1').setAttribute("class","glyphicon glyphicon-star-empty");
			  }
		}
		function loadFeedback()
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
		    	document.getElementById("projectDetails").innerHTML="Feedback";
		    	document.getElementById("insideFeed").setAttribute("style","display:block");
				document.getElementById("insideDesc").setAttribute("style","display:none");
				$('#apply4it').attr('style','display:none');
				$('#feedback').attr('style','display:none');
		    	document.getElementById("insideFeed").innerHTML=xmlhttp.responseText;
		    }
		}
		xmlhttp.open("GET","fbSt.php",true);
		xmlhttp.send();
		}

		function loadProjects()
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
		    	document.getElementById("project_disp").innerHTML=xmlhttp.responseText;
		    }
		}
		xmlhttp.open("GET","getProjStud.php?page="+pgNo,true);
		xmlhttp.send();
		}
		function setEmail () {
			document.getElementById('email').value=emailid;
		}
		function changeModalText(desc,stipend,c_name,ids,states,emailId)
		{
			emailid=emailId;
			document.getElementById("projectDetails").innerHTML="Project Details";
			document.getElementById("insideFeed").setAttribute("style","display:none");
			document.getElementById("insideDesc").setAttribute("style","display:block");
			$('#description').html(desc);
			$('#stipend').html("Rs. "+stipend+"./-");
			$('#c_name').html(c_name);
			$('#project_id').attr('value',ids);
			if(states=='text-success bg-success')
			{
				$('#apply4it').attr('style','display:none');
				$('#feedback').attr('style','display:inline-block');
			}
			else if(states=='')
			{
				$('#apply4it').attr('style','display:inline-block');
				$('#feedback').attr('style','display:none');
				$('#apply4it').attr('class','btn btn-primary');
				$('#apply4it').attr('value','Apply!');
			}
			else
			{
				$('#feedback').attr('style','display:none');
				$('#apply4it').attr('style','display:none');
			}
		}
		function submitForm()
		{
			//application form
			document.getElementById("applyingForm").setAttribute("action","<?php echo htmlentities($_SERVER['PHP_SELF']); ?>");
			document.getElementById("applyingForm").submit();
		}
		function submitForm2()
		{
			//feedback form
			document.getElementById("applyingForm").setAttribute("action","./feedComp.php");
			document.getElementById("applyingForm").submit();
		}
	</script>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="projectDetails" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content" id="modinner">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title text-info" id="projectDetails">Project Details</h4>
         </div>
         <form class="form-horizontal" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" id="applyingForm" method="POST">
		<div class="modal-body" id="insideText">
		<div id="insideFeed"></div>
		<div id="insideDesc">
		<div class="form-group">
            <label class="control-label col-sm-offset-1">Corporate Info :</label>
            <div class="col-sm-offset-2"><p class="form-control-static" id="c_name"></p></div>
        </div>
		<div class="form-group">
            <label class="control-label col-sm-offset-1">Description :</label>
            <div class="col-sm-offset-2"><p class="form-control-static" id="description"></p></div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-offset-1">Stipend :</label>
            <div class="col-sm-offset-2"><p class="form-control-static" id="stipend"></p></div>
         </div>
         <input type="hidden" value="" id="project_id" name="project_id">
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="apply4it" onclick="submitForm();">Apply!</button>
            <button type="button" class="btn btn-success" onclick="loadFeedback(),visibility_arrows();" id="feedback">Give Feedback</button>
         </div>
         </div>
         </form>
      </div>
  </div>
</div>
<div class="panel-body">
	 <table class="table table-hover" id="project_disp">
	 <?php
	 include 'getProjStud.php';
	 ?>
	 <!--<tr><td colspan="3"><input type="button" value="Fetch data" class="btn btn-danger" onclick="loadProjects();" ></td></tr>
	 <tr>
	 	<th>No.</th>
	 	<th>Project Name</th>
	 	<th>Submitted on</th>
	 </tr>
	 -->
	 </table>
</div>