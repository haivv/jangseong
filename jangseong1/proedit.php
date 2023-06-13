<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>회원 조회</title>
    <link rel="stylesheet" href="style.css">
    
    <script src="src/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="src/bootstrap.min.css">
    <link rel="stylesheet" href="src/style.css">
</head>
<script>
    // edit message box
    function showMessageEditOk() {
        var modal = document.getElementById("editMesOk");
        modal.style.display = "block";

    }
   function memIDExist(){
        var modal = document.getElementById("memExistMes");
        modal.style.display = "block";
   }


</script>

<?php
require 'config.php';
$id = $_POST["id"];


if(!isset($_POST['num']))
{
    $_POST['num']="";
}
else{
    $num = $_POST['num'];
}

if(!isset($_POST['class']))
{
    $_POST['class']="";
}
else{
    $class = $_POST['class'];
}


if(!isset($_POST['date']))
{
    $_POST['date']="";
}
else{
    $date = $_POST['date'];
}

if(!isset($_POST['memID']))
{
    $_POST['memID']="";
}
else{
    $memID = $_POST['memID'];
}

if(!isset($_POST['name']))
{
    $_POST['name']="";
}
else{
    $name = $_POST['name'];
}


$memIDfixed=$_POST["memIDfixed"];

if($memID==$memIDfixed){
    $sql= "UPDATE member SET num = '$num', class = '$class', date = '$date', memID = '$memID', name = '$name' WHERE id = $id";
    $result = $conn->query($sql);
    echo "<body onload='showMessageEditOk()'>";

}
else{

    $sqlck1 = "SELECT * FROM member  where memID ='$memID' ";
    $resultck1 = $conn->query($sqlck1);
    if ($resultck1->num_rows > 0) {
        echo "<body onload='memIDExist()'>";
    }else{
        $sql= "UPDATE member SET num = '$num', class = '$class', date = '$date', memID = '$memID', name = '$name' WHERE id = $id";
        
        $result = $conn->query($sql);
        echo "<body onload='showMessageEditOk()'>";
   
    }
}
            
?>
<!-- edit message -->
<div id='editMesOk' class='modal'>
    <div class='modal-content'>
        <p>수정이 완료되었습니다.</p>
        <p>
            <a  href='list.php'  type='button' class='btn btn-dark btnfix'>확인</a>
            
        </p>
    </div>
</div>

<!-- 입력한 군번은 회원정보에 존재합니다 message -->
<div id='memExistMes' class='modal'>
    <div class='modal-content'>
        <p>입력한 군번은 회원정보에 존재합니다.</p>
        <p>
            <a  href='edit.php?id=<?php echo $id; ?>'  type='button' class='btn btn-dark btnfix'>확인</a>
            
        </p>
    </div>
</div>





</body>
<html>