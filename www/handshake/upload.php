<?php
if ($_FILES['fileToUpload']){
	$file = $_FILES['fileToUpload'];
	//now the $file is an array contains all the information
	//like name type tmp_name size etc	;
	//print_r($file);
	
	$file_name = $file['name'];
	$file_tmp_name = $file['tmp_name'];
	$file_size = $file['size'];
	$file_error = $file['error'];
	//checking the file extension;
	//print_r(pathinfo($file_name,PATHINFO_EXTENSION));
	$file_extension = pathinfo($file_name,PATHINFO_EXTENSION);
	
	//allowed extension;
	$allowed_extension = array('txt','pdf','png');
	$allowed_size = 1048576;//in bytes 1 MB
	$file_directory = '';	//write the directory path. beware '\' are to be escaped;
	//
	if(in_array($file_extension,$allowed_extension)){
		//checks for error if any
		if($file_error === 0){
			//checks the size of the fileToUpload
			if ($file_size <= $allowed_size){
				//now the file ready to uploaded
				$file_destination = $file_directory.$file_name;
				//'directory/'file_name
				//move the uploaded file to the required destination
				
				if (move_uploaded_file($file_tmp_name,$file_destination)){
					echo $file_destination;//MESSAGE TO BE DISPLAYED AFTER UPLOADING THE FILE;
					//can redirect to other page but turn on output buffering before using header 
				}
				else{
					echo "the file is not sent via  HTTP post method";
				}
			}
			else{
				echo "the file sige is greater than allowed limit which equals =".$allowed_size;
			}
			
		}
		else{
			echo "the file has error".$file_error;
		}
	}
	else{
	echo "the file extension is not allowed";
	}
	
}
