<?php
// Connect to MySQL database
$conn = mysqli_connect("localhost", "root", "", "jangseong");

$year = $_GET["year"];
$cardinalnumber = $_GET["cardinalnumber"];
$memID = $_GET["memID"];
$pass = $_GET["password"];

if(!isset($_GET["year"])&&!isset($_GET["cardinalnumber"])&&!isset($_GET["memID"])){
	$result = mysqli_query($conn, "SELECT password FROM  member");
}
else{
	if(isset($_GET["password"]))
	{
		$pass = $_GET["password"];
		$result = mysqli_query($conn, "SELECT password FROM  member  where num = '$cardinalnumber' and date like '$year%' and memID='$memID' and password='$pass'");
		
		$sql2= "UPDATE member SET password = '$pass' WHERE memID = '$memID'";
		$result2 = $conn->query($sql2);
	}
	// else{
		
	// 	if(!isset($_GET["noftest"])){
	// 		$nofpass = $_GET["nofpass"];
	// 		$result = mysqli_query($conn, "SELECT nofpass FROM  member  where num = '$cardinalnumber' and date like '$year%' and memID='$memID'and nofpass='$nofpass' ");
	// 	}
	// 	else{
	// 		$noftest = $_GET["noftest"];
	// 		$result = mysqli_query($conn, "SELECT noftest FROM  member  where num = '$cardinalnumber' and date like '$year%' and memID='$memID' and noftest='$noftest' ");
	// 	}
	// }
}

// Create empty array for JSON data
$json_data = [];

// Loop through result set and convert to associative array
while ($row = mysqli_fetch_assoc($result)) {

	if($row["password"] == "")
	{
		$json_data += ["result" => false];
	}
	else
	{
		$json_data += ["result" => true];
	}
}

// Convert PHP array to JSON
$json_output = json_encode($json_data);
echo $json_output;

// Close MySQL connection
mysqli_close($conn);
?>