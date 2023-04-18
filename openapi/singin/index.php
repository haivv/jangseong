<?php
// Connect to MySQL database
$conn = mysqli_connect("localhost", "root", "", "jangseong");

$year = $_GET["year"];
$cardinalnumber = $_GET["cardinalnumber"];
$memID = $_GET["memID"];
$pass = $_GET["password"];

if(!isset($_GET["year"])&&!isset($_GET["cardinalnumber"])&&!isset($_GET["name"])){
	$result = mysqli_query($conn, "SELECT password FROM  member");
}
else{
	$result = mysqli_query($conn, "SELECT password FROM  member  where num = '$cardinalnumber' and date like '$year%' and memID='$memID'");
}

// Create empty array for JSON data
$json_data = [];

// Loop through result set and convert to associative array
while ($row = mysqli_fetch_assoc($result)) {

	if($row["password"] == $pass)
	{
		$json_data += ["result" => true];
	}
	else
	{
		$json_data += ["result" => false];
	}
}

// Convert PHP array to JSON
$json_output = json_encode($json_data);
echo $json_output;

// Close MySQL connection
mysqli_close($conn);
?>