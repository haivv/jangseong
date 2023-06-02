<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link rel="stylesheet" href="style.css">
    
    <script src="src/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="src/bootstrap.min.css">
    <link rel="stylesheet" href="src/style.css">
</head>
<script>
    // message box
    function showMessageDeleteOk() {
        var modal = document.getElementById("delmesok");
        modal.style.display = "block";
    }

    function deleteok() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    }
</script>
<body>

<?php
require 'config.php';
$name = $_GET['mem'];

foreach ($name as $memID){ 
    
    $sql= "DELETE FROM member WHERE id = $memID";
    $result = $conn->query($sql);
}


?>
<body  onload="showMessageDeleteOk()" >
 <!-- delete message -->
 <div id='delmesok' class='modal'>
        <div class='modal-content'>
          <p>회원 삭제가 완료되었습니다!</p>
          <p>
                
                <a  href='list.php'  onclick='' type='button' class='btn btn-dark btnfix'>확인</a>
                
          </p>
        </div>
    </div>

    </body>
</html>