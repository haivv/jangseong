<?php

// Connect to MySQL database
$conn = mysqli_connect("localhost", "root", "", "jangseong");
mysqli_set_charset($conn,"utf8");
if((!isset($_GET["year"]))&&(!isset($_GET["cardinalnumber"])))
{
    $result = mysqli_query($conn, "SELECT name, memID FROM  member  GROUP BY name ");
}
else{
    $year = $_GET["year"];
    $cardinalnumber = $_GET["cardinalnumber"];
    
    $result = mysqli_query($conn, "SELECT name,memID FROM  member  where num = '$cardinalnumber' and date like '$year%' ");
}

mysqli_set_charset($conn, 'utf8');

// Create empty array for JSON data
$json_data = array();

// Loop through result set and convert to associative array
while ($row = mysqli_fetch_assoc($result)) {
    $json_data[] = $row;
}

// Convert PHP array to JSON
$json_output = json_encode($json_data);

echo $json_output;

// Close MySQL connection
mysqli_close($conn);

?>

