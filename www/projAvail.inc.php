
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
		function changeModalText(desc,stipend,c_name,ids,states)
		{

			$('#description').html(desc);
			$('#stipend').html("Rs. "+stipend+"/-");
			$('#c_name').html(c_name);
			$('#project_id').attr('value',ids);
			if(states==true)
			{
				$('apply4it').prop('disabled',true);
				$('apply4it').attr('class','btn btn-success');
			}
			else
			{
				$('apply4it').prop('disabled',false);
				$('apply4it').attr('class','btn btn-primary');
			}
		}
	</script>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="projectDetails" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
      <form class="form-horizontal" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title text-info" id="projectDetails">Project Details</h4>
         </div>
		<div class="modal-body" id="insideText">
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
            <input type="submit" class="btn btn-primary" value="Apply!" id="apply4it">
         </div>
         </form>
      </div>
  </div>
</div>
<div class="panel-body">
	 <table class="table table-hover" id="project_disp">
	 <tr><td colspan="3"><input type="button" value="Fetch data" class="btn btn-danger" onclick="loadProjects();" ></td></tr>
	 <tr>
	 	<th>No.</th>
	 	<th>Project Name</th>
	 	<th>Submitted on</th>
	 </tr>
	 </table>
</div>