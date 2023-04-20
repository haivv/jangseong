<?php

$num = $_POST["num"];
$date = $_POST["date"];
$memID = $_POST["memID"];
$name = $_POST["name"];

require 'config.php';
$sql = "INSERT INTO member VALUES (NULL, '$num', '$date', '$memID', '$name','');";
$result = $conn->query($sql);

echo "<script>
alert('회원 추가가 완료되었습니다!');
window.location.assign('add.php');
</script>";

?>