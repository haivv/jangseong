<?php
require 'config.php';
$name = $_GET['mem'];


foreach ($name as $memID){ 

    echo $memID."<br />";
    $sql= "DELETE FROM member WHERE id = $memID";

    $result = $conn->query($sql);
}

echo "<script>
alert('회원 삭제가 완료되었습니다!');
window.location.assign('list.php');
</script>";

?>
