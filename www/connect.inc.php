<?php
$servername = "localhost";//name of the server
$rootusername = "csp203";
$password = "iitropar@786";//password of the root user
$database_name = "hub_csp";
$table_name_company = "companyinfo";
$table_name_student = "studentinfo";
$table_name_project = "projects";
$table_name_studentProject = "student_project";
// Create connection
$connect = mysqli_connect($servername,$rootusername,$password,$database_name);

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL :(";// . mysqli_connect_error();
  }
?>