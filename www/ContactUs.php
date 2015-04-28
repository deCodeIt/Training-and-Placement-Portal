<?php
	include './bslines.php';
?>

<?php
$msg="";
$msg_code=0;
if( isset($_POST['name']) && isset($_POST['emailId']) && isset($_POST['subject']) && isset($_POST['message']) ) {
	$emailFrom='feedback@tnp.iitrpr.ac.in';
	$name = htmlentities($_POST['name']);
	$emailId = htmlentities($_POST['emailId']);
	$message = htmlentities($_POST['message']);
	$subject = htmlentities($_POST['subject']);
	$name_max = 25;
	$subject_max=50;
	$emailId_max = 30;
	$message_max = 500;
	
	if(!empty($name) && !empty($emailId) && !empty($subject) && !empty($message) ) {
		if( strlen($name)>$name_max || strlen($emailId)>$emailId_max || strlen($subject)>$subject_max || strlen($message)>$message_max ) {
			$msg = "Maximun Length exceeded in atleast One of the Fields";
		}
		else {
			$to = '786alijafri786@gmail.com';
			$sub = "T&P Contact Form Details";
			$body = "Subject : ".$subject."\nFrom : ".$name." < ".$emailId." >\n\n".$message;
			$headers = 'From: '.$emailFrom;
			
			if (@mail($to,$sub,$body,$headers)) {
				$msg = "Thank you, your response has been successfully submitted";
				$msg_code=1;
			}
			else {
				$msg =  "Sorry, An Error occurred while submitting your form, Please try again!";
				$msg_code=0;
			}
		}
	}
	else {
		$msg = "All Fields are necessary";
		$msg_code=0;
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	

	<title>Contact Us</title>
	<style type="text/css">

	@-moz-document url-prefix() {
	  fieldset { display: table-cell; }
	}

	/*canvas {
		width: 100%;
	}*/

	</style>
</head>
<body background="/images/green-bg_001.jpg">
	<div class="wrappers">
	<?php
	include './header.php';
	?>
	<div class="container-fluid">
		<div class="col-md-6 col-md-push-3 col-sm-8 col-sm-push-2">
			<div class="panel panel-primary">
				<div class="panel-body" style="background-color:transparent;">
					<div>
					<h2 class="text-primary">Contact Us</h2>
					<br>
						<h5><b>For any Feedback/Suggestions You can write to us by using the form below</b></h5>
						<p class="<?php echo ($msg_code==1)?'text-success bg-success':'text-danger bg-danger'; ?>"><?php echo $msg; ?></p>
						<form class="form-horizontal" action="/ContactUs.php" method="POST">
							<label for="name">Name : </label><input required type="text" maxlength="25" class="form-control" name="name" maxlength="25">
							<br><label for="email">Email Id : </label><input required type="text" maxlength="30" class="form-control" name="emailId" maxlength="50">
							<br><label for="subject">Subject : </label><input required type="text" maxlength="50" class="form-control" name="subject" maxlength="100">
							<br><label for="message">Message : </label><textarea required name="message" class="form-control" rows="6" cols="22" maxlength="500"></textarea>
							<br>
							<div class="form-group">
								<div class="col-xs-push-5 col-xs-2">
									<input type="submit" value="Submit" class="btn btn-warning">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>
</html>
<?php
	include './footer.php';
?>
