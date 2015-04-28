<?php
require_once 'chkLogIn.inc.php';
require_once 'connect.inc.php';

?>
<?php
// Check if image file is a actual image or fake image
$statusMSG="";
$uploadOk = 0;
if(isStudent() && isset($_POST["submit"])) {
	$target_dir = "cv_students/";
	$uploadOk = 1;
	$imageFileType = pathinfo(basename($_FILES["InputFile"]["name"]),PATHINFO_EXTENSION);
	$newName= rand(1000,9999) . md5($_SESSION['entry_num']) . rand(1000,9999) .".". $imageFileType;
	$target_file = $target_dir . $newName;
	
	// Check if file already exists
	if (file_exists($target_file)) {
		if(!unlink($target_file))
		{
		    $statusMSG =  "Sorry, Unable to replace your Old CV.";
		    $uploadOk = 0;
		}
	}
	// Check file size
	if ($_FILES["InputFile"]["size"] > 5242880) {
	    $statusMSG =  "Sorry, your CV file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "pdf") {
	    $statusMSG =  "Sorry, only PDF file is allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    #$statusMSG =  "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		$img_old=getStudentField('cv_link');
		
			# code...
			if($img_old!="sample_cv.pdf" && !unlink($target_dir.$img_old))
			{
				$uploadOk=0;
				$statusMSG="Sorry, Unable to replace your Old CV.";
			}
			else
			{
				if (move_uploaded_file($_FILES["InputFile"]["tmp_name"], $target_file)) {
			        if(setStudentField('cv_link',$newName))
			        {
			        	$statusMSG =  "The file ". basename( $_FILES["InputFile"]["name"]). " has been uploaded Successfully.";
			        }
			        else
			        {
			        	$uploadOk=0;
				        $statusMSG =  "Sorry, there was an error uploading your file.";
			        }

			    }
			    else {
			    	#echo $target_file."<br>";
			    	#echo $_FILES["InputFile"]["tmp_name"]."<br>";
			    	$uploadOk=0;
			        $statusMSG =  "Sorry, there was an error uploading your file.";
			    }
			}
		
	}
}
?>

		<div class="panel-body">
		<div class="col-xs-12">
			<p class="text-info bg-info">Download Your Current CV from <a href="/cv_students/<?php echo getStudentField('cv_link'); ?>">here</a></p>
			<embed src="/cv_students/<?php echo getStudentField('cv_link'); ?>" width="100%" height="80%"><br><br>
		</div>
		<div class="col-xs-12">
		 <form class="form-horizontal" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
		  <div class="form-group">
		  <?php
		  if($statusMSG != ""){
		  	if($uploadOk==0)
		  	{
		  		echo '<p class="text-warning bg-warning">'.$statusMSG.'</p>';
		  	}
		  	else
		  	{
		  		echo '<p class="text-success bg-success">'.$statusMSG.'</p>';
		  	}
		  	}
		  	?>
		    <label for="InputFiles" class="col-sm-4 col-sm-offset-1 col-md-3">Wish to update your CV :</label>
		    <div class="col-sm-5 col-md-4">
		    <input type="file" class="form-control-static" id="InputFile" name="InputFile">
		    <p class="help-block">Only PDF file is allowed with SIZE < 5MB</p>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class=" col-xs-offset-4 col-xs-4 col-md-offset-2 col-md-3">
		      <input type="submit" class="btn btn-success" name="submit" value="Upload Your CV">
		    </div>
		  </div>
		</form>
		</div>
		</div>