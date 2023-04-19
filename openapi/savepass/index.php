<?php

$conn = mysqli_connect("localhost", "root", "", "jangseong");

$memID = $_GET["memID"];
$result = $_GET["result"];
$time = $_GET["time"];
$equipment = $_GET["equipment"];

$query = "INSERT INTO `record`(`memID`, `result`, `time`, `equipment`) VALUES ('$memID','$result','$time','$equipment');";
$conn->query($query);

// Close MySQL connection
mysqli_close($conn);
?>