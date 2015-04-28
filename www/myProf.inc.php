<?php
require_once 'chkLogIn.inc.php';
require_once 'connect.inc.php';

$isEdit=false;
if (isStudent() && isset($_POST['edit']))
{
	if(isset($_POST['student_name']) && !empty($_POST['student_name']))
	{
		$st_name=$_POST['student_name'];
		if (strlen($st_name)>0 && strlen($st_name)<50) {
			$isEdit = !setStudentField('name',$st_name);
		}
		else
		{
			$isEdit=true;
			//please use less characters
		}
	}
	elseif (isset($_POST['student_name']) && empty($_POST['student_name']))
	{
		$isEdit=false;
	}
	else
	{
		$isEdit=true;
	}
}
else
{
	$isEdit=false;
}

?>
		<div class="panel-body">
		<div class="col-sm-4 col-xs-offset-1 col-xs-10 col-sm-offset-0">
			<img class="img-responsive" src="<?php echo '/ProfilePics/'.getStudentField('profilePic') ?>">
		</div>
		<div class="col-sm-8">
		 <form class="form-horizontal" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		  <div class="form-group">
		    <label class="control-label col-xs-3" for="name">Name:</label>
		    <div class="col-xs-9 col-sm-7 col-md-5">
		      <?php 
		      if (!$isEdit){
		      	echo '<p class="form-control-static">'.getStudentField('name').'</p>';
		      }
		      else{
		      	echo '<input type="text" class="form-control" name="student_name" id="student_name" maxlength="49" placeholder="'.getStudentField('name').'">';
		      }

		      ?>
		      

		    </div>
		  </div>
		  <div class="form-group">
		  	<label class="col-xs-3 control-label" for="entryNumber">Entry Number:</label>
		  	<div class="col-md-5 col-xs-9 col-sm-7">
		  	<p class="form-control-static"><?php echo getStudentField('entry_number'); ?></p>
			</div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-xs-3" for="branch">Branch:</label>
		    <div class="col-md-5 col-xs-9 col-sm-7">
		      <p class="form-control-static"><?php echo getStudentField('branch'); ?></p>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-xs-3" for="year">Year:</label>
		    <div class="col-xs-5 col-sm-4 col-md-3">
		    	<p class="form-control-static"><?php echo getStudentField('year'); ?></p>
		    </div>
		  </div>
		  <div class="form-group">
		  	<label class="col-xs-3 control-label" for="email">Email Id:</label>
		  	<div class="col-md-5 col-xs-9 col-sm-7">
		  	<p class="form-control-static"><?php echo getStudentField('email_id'); ?></p>
			</div>
		  </div>
		  <div class="form-group">
		  	<?php
		  		#projects submitted by the user
		  	?>
		  </div>
		  <input type="hidden" value="<?php echo ($isEdit)?0:1; ?>" name="edit">
		  <div class="form-group">
		    <div class=" col-xs-offset-4 col-xs-4 col-md-offset-1 col-md-3">
		      <?php
		      if (!$isEdit)
		      {
		      echo '<input type="submit" class="btn btn-warning btn-block" value="Edit">';
		      }
		      else{
		      	echo '<input type="submit" class="btn btn-success btn-block" value="Save">';
		      }
		      ?>
		    </div>
		  </div>
		</form>
		</div>
		</div>