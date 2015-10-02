<?php
require_once 'chkLogIn.inc.php';
require_once 'connect.inc.php';

$isEdit=false;
if (isCompany() && isset($_POST['edit']))
{
	if(isset($_POST['company_name']) && !empty($_POST['company_name']))
	{
		$ct_name=$_POST['company_name'];
		if (strlen($ct_name)>0 && strlen($ct_name)<50) {
			$isEdit = !setCompanyField('company_name',$ct_name);
		}
		else
		{
			$isEdit=true;
			//please use less characters for company name :(
		}
	}
	elseif (isset($_POST['company_name']) && empty($_POST['company_name']))
	{
		$isEdit=false;
	}
	else
	{
		$isEdit=true;
	}

	if( !$isEdit && isset($_POST['ph_no']) && !empty($_POST['ph_no']))
	{
		$ct_name=$_POST['ph_no'];
		if (strlen($ct_name)>0 && strlen($ct_name)<20) {
			$isEdit = !setCompanyField('phone_number',$ct_name);
		}
		else
		{
			$isEdit=true;
			//please use less characters for company name :(
		}
	}
	elseif (isset($_POST['ph_no']) && empty($_POST['ph_no']))
	{
		$isEdit=false;
	}
	else
	{
		$isEdit=true;
	}

	if(!$isEdit && isset($_POST['address']) && !empty($_POST['address']))
	{
		$ct_name=$_POST['address'];
		if (strlen($ct_name)>0 && strlen($ct_name)<100) {
			$isEdit = !setCompanyField('address',$ct_name);
		}
		else
		{
			$isEdit=true;
			//please use less characters for company name :(
		}
	}
	elseif (isset($_POST['address']) && empty($_POST['address']))
	{
		$isEdit=false;
	}
	else
	{
		$isEdit=true;
	}
	if(!$isEdit && isset($_POST['website']) && !empty($_POST['website']))
	{
		$ct_name=$_POST['website'];
		if (strlen($ct_name)>0 && strlen($ct_name)<30) {
			$isEdit = !setCompanyField('website',$ct_name);
		}
		else
		{
			$isEdit=true;
			//please use less characters for website :(
		}
	}
	elseif (isset($_POST['website']) && empty($_POST['website']))
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
			<img class="img-responsive" src="<?php echo './Logo/'.getCompanyField('comp_logo') ?>">
		</div>
		<div class="col-sm-8">
		 <form class="form-horizontal" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		  <div class="form-group">
		    <label class="control-label col-xs-3" for="name">Company Name :</label>
		    <div class="col-xs-9 col-sm-7 col-md-5">
		      <?php 
		      if (!$isEdit){
		      	echo '<p class="form-control-static">'.getCompanyField('company_name').'</p>';
		      }
		      else{
		      	echo '<input type="text" class="form-control" name="company_name" id="company_name" maxlength="50" placeholder="'.getCompanyField('company_name').'">';
		      }
			  ?>
		    </div>
		  </div>
		  <div class="form-group">
		  	<label class="col-xs-3 control-label" for="email">Email Id :</label>
		  	<div class="col-md-5 col-xs-9 col-sm-7">
		  	<p class="form-control-static"><?php echo getCompanyField('company_email_id'); ?></p>
			</div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-xs-3" for="number">Contact Num :</label>
		    <div class="col-md-5 col-xs-9 col-sm-7">
		    <?php 
		      if (!$isEdit){
		      	echo '<p class="form-control-static">'.getCompanyField('phone_number').'</p>';
		      }
		      else{
		      	echo '<input type="text" class="form-control" name="ph_no" id="ph_no" maxlength="20" placeholder="'.getCompanyField('phone_number').'">';
		      }
			  ?>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-xs-3" for="add">Address :</label>
		    <div class="col-xs-5 col-sm-4 col-md-3">
		    	<?php 
		      if (!$isEdit){
		      	echo '<p class="form-control-static">'.getCompanyField('address').'</p>';
		      }
		      else{
		      	echo '<input type="text" class="form-control" name="address" id="address" maxlength="100" placeholder="'.getCompanyField('address').'">';
		      }
			  ?>
		    </div>
		  </div>
		  <div class="form-group">
		  	<label class="col-xs-3 control-label" for="website">Website :</label>
		  	<div class="col-md-5 col-xs-9 col-sm-7">
		  	<?php 
		      if (!$isEdit){
		      	echo '<p class="form-control-static">'.getCompanyField('website').'</p>';
		      }
		      else{
		      	echo '<input type="text" class="form-control" name="website" id="website" maxlength="100" placeholder="'.getCompanyField('website').'">';
		      }
			  ?>			</div>
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