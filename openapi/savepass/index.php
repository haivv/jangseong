<?php

$conn = mysqli_connect("localhost", "root", "", "jangseong");

$memID = $_GET["memID"];
$result = $_GET["result"];
$time = $_GET["time"];
$mode = $_GET["mode"];

$query = "INSERT INTO `record`(`memID`, `result`, `time`, `mode`) VALUES ('$memID','$result','$time','$mode');";
$conn->query($query);

// Close MySQL connection
mysqli_close($conn);
?>