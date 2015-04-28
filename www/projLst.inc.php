
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
		function changeModalText(desc,stipend,st_name)
		{

			$('#description').html(desc);
			$('#stipend').html("Rs. "+stipend+"/-");
			st='';
			if(st_name.length>0)
			{
				st='<table class="table" id="st_names"><tr><th>Student Name</th><th>CV-Resume</th></tr>';
				for (var i = 2; i < st_name.length; i++) {
					st=st+'<tr><td>'+st_name[i++]+'</td><td><a href="'+st_name[i]+'">View CV</a></td></tr>';
				};
				st=st+'</table>';
			}
			else
			{
				st='<p class="form-control-static">No Application received yet!</p>';
			}
			$('#st_name').html(st);
		}
	</script>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="projectDetails" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
      <div class="container-fluid">
      <form class="form-horizontal" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title text-info" id="projectDetails">Project Details</h4>
         </div>
		<div class="modal-body" id="insideText">
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
         <input type="hidden" value="" id="project_id" name="project_id">
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
         </form>
         </div>
      </div>
  </div>
</div>
<div class="panel-body">
	 <table class="table table-hover" id="project_disp">
	 <tr>
	 	<th>Sr. No.</th>
	 	<th>Project Name</th>
	 	<th>Submitted Date</th>
	 </tr>
	 <tr><td colspan="3"><input type="button" value="Fetch data" class="btn btn-primary" onclick="loadProjects()"></td></tr>
	 </table>
</div>