<?php
require 'config.php';
$name = $_GET['mem'];


foreach ($name as $memID){ 

    echo $memID."<br />";
    $sql= "DELETE FROM member WHERE id = $memID";

    $result = $conn->query($sql);
}
header('location: list.php');

?>