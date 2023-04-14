<?php

$num = $_POST["num"];
$date = $_POST["date"];
$memID = $_POST["memID"];
$name = $_POST["name"];

require 'config.php';
$sql = "INSERT INTO member VALUES (NULL, '$num', '$date', '$memID', '$name');";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    ?>
    <script>
       alert("ok");
    </scrip>

    <?php
}
echo "<script>
alert('추가 원성 !!!');
window.location.assign('add.php');
</script>";

?>