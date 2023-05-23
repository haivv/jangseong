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
    echo "<script>
    alert('수정이 완료되었습니다!');
    window.location.assign('list.php ');
    </script>";
}
else{

    $sqlck1 = "SELECT * FROM member  where memID ='$memID' ";
    $resultck1 = $conn->query($sqlck1);
    if ($resultck1->num_rows > 0) {
        echo "<script>
        alert('입력한 군번은 회원정보에 존재합니다.');
        window.location.assign('edit.php?id=$id');
        </script>";
    }else{
        $sql= "UPDATE member SET num = '$num', class = '$class', date = '$date', memID = '$memID', name = '$name' WHERE id = $id";
        //echo $sql;
        $result = $conn->query($sql);
        echo "<script>
        alert('수정이 완료되었습니다!');
        window.location.assign('list.php');
        </script>";


            
    }
}
            
    
              
              
                   


           
    


//header('location: list.php');

?>
