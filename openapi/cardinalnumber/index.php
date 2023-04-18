<?php
// Connect to MySQL database
$conn = mysqli_connect("localhost", "root", "", "jangseong");
	$year = $_GET["year"];
	
	if(!isset($_GET["cardinalnumber"])){
	$_GET["cardinalnumber"]="";
	$result = mysqli_query($conn, "SELECT num FROM  member  where date like '$year%' GROUP BY num ");
	 }
	 else{
		$cardinalnumber = $_GET["cardinalnumber"];
		$result = mysqli_query($conn, "SELECT num FROM  member  where num = '$cardinalnumber' and date like '$year%' GROUP BY num ");
}
// Create empty array for JSON data
$json_data = array();

// Loop through result set and convert to associative array
while ($row = mysqli_fetch_assoc($result)) {
    //echo $row["date"];
    
    $json_data[] = $row;
}

// Convert PHP array to JSON
$json_output = json_encode($json_data);
echo $json_output;

// Close MySQL connection
mysqli_close($conn);
?>