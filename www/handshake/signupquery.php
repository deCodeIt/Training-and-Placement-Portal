<?php
#will not work unless the below line is UNcommented
//require_once '../connect.inc.php';
?>
<?php 
	if(isset($_POST['username']) && isset($_POST['entry_number']) && isset($_POST['password']))
	{
		//$emailadd =  mysqli_real_escape_string($connect,$_POST['email_id']);
		$username =  trim(mysqli_real_escape_string($connect,$_POST['username'])); //cannot be used to login
		$entry_no =  trim(mysqli_real_escape_string($connect,strtoupper($_POST['entry_number']))); //converts entry number into upper case
		$passwd =  trim(mysqli_real_escape_string($connect,$_POST['password']));
		//enter the field of the table in studentinfo
		if(preg_match("/^201[1-4](CSB|CS|ME|EE)1(0[0-9][0-9]|120|1[0-1][0-9])$/", $entry_no))
		{
			if (!empty($username) && !empty($entry_no) && !empty($passwd) ) {
					# code...
				//$enquire = "INSERT INTO $table_name_for_students_info (username,entry_number,password) VALUES ($username','$entry_no','$passwd')";
				$query = mysqli_query($connect,$enquire);
				//INSERT INTO table_name (column1,column2,column3,...)
				//VALUES (value1,value2,value3,...);
				
				if(!$query){
					echo "UNSuccessful SIGN UP ,please signup again <br>";
					echo "<a href = 'signupform.php'>SIGN_UP</a>";
				}
				else{
					echo "HELLO $username!";
					//code that sends the mail to the user giving its field
				}
			}
			else
			{
				echo "<font color='red'>Please Don't Leave Anything Blank</font>";
			}
		}
		else
		{
			echo "Invalid Entry Number";
		}
	}
	else
	{
		echo "Error!!!";
	}

?>
