<?php
require_once 'chkLogIn.inc.php';
require_once 'connect.inc.php';

?>
<?php
// Check if image file is a actual image or fake image
$statusMSG="";
$uploadOk = 0;
if(isStudent() && isset($_POST["submit"])) {
	$target_dir = "ProfilePics/";
	$uploadOk = 1;
	$imageFileType = pathinfo(basename($_FILES["InputFile"]["name"]),PATHINFO_EXTENSION);
	$newName= rand(1000,9999) . md5($_SESSION['entry_num']) . rand(1000,9999) .".". $imageFileType;
	$target_file = $target_dir . $newName;
	
    $check = getimagesize($_FILES["InputFile"]["tmp_name"]);
    if($check !== false) {
        #echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $statusMSG =  "File is not an image.";
        $uploadOk = 0;
	    }
	// Check if file already exists
	if (file_exists($target_file)) {
		if(!unlink($target_file))
		{
		    $statusMSG =  "Sorry, Unable to replace your Old profile pic.";
		    $uploadOk = 0;
		}
	}
	// Check file size
	if ($_FILES["InputFile"]["size"] > 2097152) {
	    $statusMSG =  "Sorry, your image is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    $statusMSG =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    $statusMSG =  "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		$img_old=getStudentField('profilePic');
		
			# code...
			if($img_old!="default_profile_pic.jpg" && !unlink($target_dir.$img_old))
			{
				$uploadOk=0;
				$statusMSG="Sorry, Unable to replace your Old profile pic.";
			}
			else
			{
				if (move_uploaded_file($_FILES["InputFile"]["tmp_name"], $target_file)) {
			        if(setStudentField('profilePic',$newName))
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
		<div class="col-xs-4">
			<img class="img-responsive" src="<?php echo './ProfilePics/'.getStudentField('profilePic') ?>">
		</div>
		<div class="col-xs-8">
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
		    <label for="InputFiles" class="col-xs-12">Upload Your Image :</label>
		    <div class="col-xs-12">
		    <input type="file" class="form-control-static" id="InputFile" name="InputFile">
		    <p class="help-block">Only JPG,PNG,JPEG,GIF files are allowed with SIZE < 2MB</p>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class=" col-xs-offset-4 col-xs-4 col-md-offset-1 col-md-3">
		      <input type="submit" class="btn btn-success" name="submit" value="Save">
		    </div>
		  </div>
		</form>
		</div>
		</div>