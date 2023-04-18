<?php
// Connect to MySQL database
$conn = mysqli_connect("localhost", "root", "", "jangseong");

$year = $_GET["year"];
$cardinalnumber = $_GET["cardinalnumber"];
$name = $_GET["name"];
$pass = $_GET["password"];

if(!isset($_GET["year"])&&!isset($_GET["cardinalnumber"])&&!isset($_GET["name"])){
	$result = mysqli_query($conn, "SELECT password FROM  member");
}
else{
	$result = mysqli_query($conn, "SELECT password FROM  member  where num = '$cardinalnumber' and date like '$year%' and name='$name' and password='$pass'");
}

if(($year=='2022') && ($cardinalnumber=='22-2') &&($name=='이준호'))
{
	$sql2= "UPDATE member SET password = '$pass' WHERE name = '이준호'";
	
    
    $result2 = $conn->query($sql2);
}
else{
	echo "dont";
}
// Create empty array for JSON data
$json_data = array();

// Loop through result set and convert to associative array
while ($row = mysqli_fetch_assoc($result)) {
    //echo $row["date"];
    if($row["password"]=="")
	{
		$row["password"]="false";
	}
	else{
		$row["password"] = "true";
	}
    $json_data[] = $row;
}

// Convert PHP array to JSON
$json_output = json_encode($json_data);
echo $json_output;

// Write JSON data to file
$json_file = fopen("data2.json", "w");

fwrite($json_file, $json_output);

fclose($json_file);

// Close MySQL connection
mysqli_close($conn);
?>