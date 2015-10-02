
<?php
require_once 'chkLogIn.inc.php';
require_once 'connect.inc.php';
?>
<?php
#$prList = getProjectFields();
#print_r($prList);

?>
<script type="text/javascript">
		var pgNo=0;
		var count=0;
		entry_number="";
		function visibility_arrows(inc)
		{
			count=parseInt(count)+parseInt(String(inc));
			//alert(count);
			if(count==1)
			{
				//document.getElementById("previous").setAttribute("style","display:none");
			}
			else if(count==5)
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
			st=st.replace("estar","employee_attitude");
			st=st.replace("pstar","work_strategy");
			st=st.replace("cstar","quantity_of_work");
			st=st.replace("mstar","quality_of_work");
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
		function loadFeedback(entry)
		{
			entry_number=entry;
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
				$('#feedback').attr('style','display:none');
		    	document.getElementById("insideFeed").innerHTML=xmlhttp.responseText;
		    }
		}
		xmlhttp.open("GET","fbCo.php",true);
		xmlhttp.send();
		}

		function setStatus(entry,option,ids)
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
		    	alert(xmlhttp.responseText);
		    }
		  }
		  xmlhttp.open("POST","processStatus.php",true);
		  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		  xmlhttp.send("entry_num="+entry+"&options="+option+"&id="+ids);
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
		  xmlhttp.open("GET","getProjects.php?page="+pgNo,true);
		  xmlhttp.send();
		}
		function setEntry () {
			document.getElementById('entry_num').value=entry_number;
		}
		function changeModalText(desc,stipend,st_name,ids)
		{
			document.getElementById("projectDetails").innerHTML="Project Details";
			document.getElementById("insideFeed").setAttribute("style","display:none");
			document.getElementById("insideDesc").setAttribute("style","display:block");
			$('#description').html(desc);
			$('#stipend').html("Rs. "+stipend+"./-");
			st='';
			if(st_name.length>0)
			{
				st='<table class="table" id="st_names"><tr><th>Student Name</th><th>CV-Resume</th><th><Accept</th></tr>';
				for (var i = 3; i < st_name.length; i++) {
					st=st+'<tr><td>'+st_name[i++]+'</td><td><a href="'+st_name[i++]+'">View CV</a></td><td>';
					if(st_name[i+1].indexOf('0')>=0)
					{
						st+='<a href="#" onclick="setStatus(\''+st_name[i]+'\',\'1\',\''+ids+'\')"><span style="color:green" class="glyphicon glyphicon-ok"></span></a><a href="#" onclick="setStatus(\''+st_name[i++]+'\',\'2\',\''+ids+'\')"><span style="color:red" class="glyphicon glyphicon-remove" ></span></a>';
					}
					else
					{
						st+='<a href="#" type="button" onclick="loadFeedback(\''+st_name[i]+'\');" class="btn btn-warning btn-sm">Feedback</a>';
						i++;
					}
					st+='</td></tr>';
				};
				st=st+'</table>';
			}
			else
			{
				st='<p class="form-control-static">No Application received yet!</p>';
			}
			$('#st_name').html(st);
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
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="projectDetails" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
      <div class="container-fluid">
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
            <label class="control-label col-sm-offset-1">Description :</label>
            <div class="col-sm-offset-2"><p class="form-control-static" id="description"></p></div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-offset-1">Stipend :</label>
            <div class="col-sm-offset-2"><p class="form-control-static" id="stipend"></p></div>
         </div>
         <div class="form-group">
            <label class="control-label col-sm-offset-1">Students :</label>
            <div class="col-sm-offset-1" id="st_name">
            	
            </div>
        </div>
        </div>
         <input type="hidden" value="" id="project_id" name="project_id">
         </div>
         </form>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
         
         </div>
      </div>
  </div>
</div>
<div class="panel-body">
	 <table class="table table-hover" id="project_disp">
	 <!--<tr>
	 	<th>Sr. No.</th>
	 	<th>Project Name</th>
	 	<th>Submitted Date</th>
	 </tr>
	 <tr><td colspan="3"><input type="button" value="Fetch data" class="btn btn-primary" onclick="loadProjects()"></td></tr>
	 -->
	 <?php
	 include 'getProjects.php';
	 ?>
	 </table>
</div>