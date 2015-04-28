<?php
$serverName = "localhost";
$username = "root";
$password = "iitropar123";
$dBase = "projects";
$dTable = "stationId";

//creating connection
$conn = new mysqli($serverName,$username,$password,$dBase);
$st = $_REQUEST["q"];
$st_len=strlen($st);
#echo $st."<br />".$st_len."<br />";
//verifying connection
if ($conn->connect_error) {
	die("Connection failed :( : ".$conn->connect_error);
	# code...
}
$sql="SELECT st_name FROM $dTable";
$res = $conn->query($sql);
$count=0;
if($res->num_rows >0)
{
	while($count<50 && ($row = $res->fetch_assoc()) )
	{
		$st_code=trim(substr($row["st_name"], strpos($row["st_name"], "-")+1));
		#echo "<br />Code : ".$st_code;
		if($st_len > 0 && ( (strlen($row["st_name"]) >= $st_len && strncasecmp($row["st_name"],$st,$st_len)==0) || (strlen($st_code) >= $st_len && strncasecmp($st, $st_code, $st_len)==0 ) ))
		{
			$count++;
			echo "<option value=\"".$row["st_name"]."\">".$row["st_name"]."</option>";
		}
	}
}
else
{
	echo "Empty";
}

#echo "Connected Successfully :)";
#echo "<br />";
$conn->close();
#echo "Connection Closed<br />";
?>