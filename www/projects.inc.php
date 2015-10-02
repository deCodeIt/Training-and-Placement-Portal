
<?php
require_once 'chkLogIn.inc.php';
require_once 'connect.inc.php';
?>
<?php



$subOk=1;
$statusMSG="";
$p_msg="";
$d_msg="";
$a_msg="";
$b_msg="";
$y_msg="";

$name="";
$desc="";
$amt="";
$year=array();
$branch=array();

$bcs=0;
$bee=0;
$bme=0;

$y1=0;
$y2=0;
$y3=0;
$y4=0;


if(isCompany() && isset($_POST['submit']))
{
	if (isset($_POST['name']) && !empty($_POST['name']))
	{
		if(strlen(trim($_POST['name'])) < 200)
		{
			$name=mysqli_real_escape_string($connect,trim($_POST['name']));
			if(getProjectField('project_name')==$name)
			{
				$p_msg="Name has already been taken, Please choose a different name";
				$subOk=0;
			}
		}
		else
		{
			$p_msg="Length of Project Name Exceeds 200 Characters";
			$subOk=0;
		}
	}
	else
	{
		$p_msg="Did u forgot to specify the Project name?";
		$subOk=0;
	}

	if (isset($_POST['desc']))
	{
		if(!empty($_POST['desc']))
		{
			$desc=mysqli_real_escape_string($connect,trim($_POST['desc']));
		}
		else
		{
			$d_msg="Description cannot be left empty";
			$subOk=0;
		}
	}
	else
	{
		$d_msg="Did u forgot to write the Description?";
		$subOk=0;
	}

	if (isset($_POST['stipend']) && !empty($_POST['stipend']) )
	{
		if( strlen(trim($_POST['stipend']))<11 && is_numeric(trim($_POST['stipend'])))
		{
			$amt=mysqli_real_escape_string($connect,trim($_POST['stipend']));
		}
		else
		{
			$a_msg="Either The amount is not numeric or exceeds Rs.10000000000";
			$subOk=0;
		}
	}
	
	$ct=0;
	if (isset($_POST['branch_cs']))
	{
		$bcs=1;
		$ct++;
	}
	if (isset($_POST['branch_ee']))
	{
		$bee=1;
		$ct++;
	}
	if (isset($_POST['branch_me']))
	{
		$bme=1;
		$ct++;
	}
	$branch=array($bcs,$bee,$bme);
	if($ct==0)
	{
		$b_msg="Atleast choose one Branch?";
		$subOk=0;
	}

	$ct=0;
	if (isset($_POST['year1']))
	{
		$y1=1;
		$ct++;
	}
	if (isset($_POST['year2']))
	{
		$y2=1;
		$ct++;
	}
	if (isset($_POST['year3']))
	{
		$y3=1;
		$ct++;
	}
	if (isset($_POST['year4']))
	{
		$y4=1;
		$ct++;
	}
	$year=array($y1,$y2,$y3,$y4);
	if($ct==0)
	{
		$y_msg="Atleast choose one Year?";
		$subOk=0;
	}

	if($subOk==1)
	{
		$dataValues=array($_SESSION['company_id'], $name, $desc,$y1,$y2,$y3,$y4,$bcs,$bee,$bme);
		if(insertProjectField($dataValues) )
		{
			if($amt!="")
			{
				if(setProjectField('stipend',$amt,$name)) #optional field
				{
					$statusMSG="The New Project was Created Successfully.";
				}
				else
				{
					$statusMSG="An Error Occured while Submitting the Project..";
					$subOk=0;
				}
			}
			else
			{
				$statusMSG="The New Project was Created Successfully.";
			}
		}
		else
		{
			$statusMSG="An Error Occured while Submitting the Project.";
			$subOk=0;
		}
	}
}
?>
<div class="panel-body">
	 <form class="form-horizontal" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	  <div class="form-group">
	  <?php
		  if($statusMSG != ""){
		  	if($subOk==0)
		  	{
		  		echo '<p class="text-warning bg-warning">'.$statusMSG.'</p>';
		  	}
		  	else
		  	{
		  		echo '<p class="text-success bg-success">'.$statusMSG.'</p>';
		  	}
		  	}
		  	?>
	    <label class="control-label col-xs-3" for="projectName">Project Name:</label>
	    <div class="col-xs-9 col-sm-7 col-md-5">
	      <input type="text" class="form-control" id="name" name="name" maxlength="200" placeholder="Enter Project Name">
	      <?php
		  if($p_msg != ""){
		  	if($subOk==0)
		  	{
		  		echo '<p class="text-warning bg-warning">'.$p_msg.'</p>';
		  	}
		  	else
		  	{
		  		echo '<p class="text-success bg-success">'.$p_msg.'</p>';
		  	}
		  	}
		  	?>
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-xs-3" for="pwd">Description:</label>
	    <div class="col-md-5 col-xs-9 col-sm-7">
	      <textarea class="form-control" id="desc" name="desc" placeholder="Enter the Description" rows="5"></textarea>
	      <p class="help-block">Describe about your Project as much as possible</p>
	      <?php
		  if($d_msg != ""){
		  	if($subOk==0)
		  	{
		  		echo '<p class="text-warning bg-warning">'.$d_msg.'</p>';
		  	}
		  	else
		  	{
		  		echo '<p class="text-success bg-success">'.$d_msg.'</p>';
		  	}
		  	}
		  	?>
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-xs-3" for="projectName">Stipend:</label>
	    <div class="col-xs-5 col-sm-4 col-md-3">
	    	  <div class="input-group">
			      <div class="input-group-addon">Rs.</div>
			      <input type="text" class="form-control" name="stipend" id="stipend" placeholder="Amount">
			      <div class="input-group-addon">.00</div>
	    	  </div>
	    	  <?php
		  if($a_msg != ""){
		  	if($subOk==0)
		  	{
		  		echo '<p class="text-warning bg-warning">'.$a_msg.'</p>';
		  	}
		  	else
		  	{
		  		echo '<p class="text-success bg-success">'.$a_msg.'</p>';
		  	}
		  	}
		  	?>
	    </div>
	  </div>
	  <div class="form-group">
	  	<label class="col-xs-3 control-label">Branch:</label>
	  	<div class="col-md-5 col-xs-9 col-sm-7">

		  	<label class="checkbox-inline">
			  <input type="checkbox" id="branch_cs" name="branch_cs" value="branch_cs"> CS
			</label>
			<label class="checkbox-inline">
			  <input type="checkbox" id="branch_ee" name="branch_ee" value="branch_ee"> EE
			</label>
			<label class="checkbox-inline">
			  <input type="checkbox" id="branch_me" name="branch_me" value="branch_me"> ME
			</label>
			<p class="help-block">You can choose Multiple Branch Students</p>
			<?php
		  if($b_msg != ""){
		  	if($subOk==0)
		  	{
		  		echo '<p class="text-warning bg-warning">'.$b_msg.'</p>';
		  	}
		  	else
		  	{
		  		echo '<p class="text-success bg-success">'.$b_msg.'</p>';
		  	}
		  	}
		  	?>
		</div>
	  </div>
	  <div class="form-group">
	  	<label class="col-xs-3 control-label">Year:</label>
	  	<div class="col-xs-9 col-sm-6 col-md-5">

		  	<label class="checkbox-inline">
			  <input type="checkbox" id="year1" name="year1" value="year1"> Ist Year
			</label>
			<label class="checkbox-inline">
			  <input type="checkbox" id="year2" name="year2" value="year2"> IInd Year
			</label>
			<label class="checkbox-inline">
			  <input type="checkbox" id="year3" name="year3" value="year3"> IIIrd Year
			</label>
			<label class="checkbox-inline">
			  <input type="checkbox" id="year4" name="year4" value="year4"> IVth Year
			</label>
			<p class="help-block">You can choose Multiple Year Students</p>
			<?php
		  if($y_msg != ""){
		  	if($subOk==0)
		  	{
		  		echo '<p class="text-warning bg-warning">'.$y_msg.'</p>';
		  	}
		  	else
		  	{
		  		echo '<p class="text-success bg-success">'.$y_msg.'</p>';
		  	}
		  	}
		  	?>
		</div>
	  </div>
	  <div class="form-group">
	    <div class="col-xs-offset-3 col-xs-9 col-sm-7">
	      <button type="submit" class="btn btn-success" name="submit">Submit</button>
	    </div>
	  </div>
	</form>
</div>