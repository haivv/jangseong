


<?php

// Connect to MySQL database
$conn = mysqli_connect("localhost", "root", "", "jangseong");

$result = mysqli_query($conn, "SELECT date FROM member limit 2");

// Create empty array for JSON data
$json_data = array();

// Loop through result set and convert to associative array
while ($row = mysqli_fetch_assoc($result)) {
    //echo $row["date"];
    $row["date"] = explode("-", $row["date"]);
    $row["date"] = $row["date"][0];
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