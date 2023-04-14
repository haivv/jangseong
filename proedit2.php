<?php
// edit when import data from excel
$id = $_POST["id"];


if(!isset($_POST['num']))
{
    $_POST['num']="";
}
else{
    $num = $_POST['num'];
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

if(!isset($_POST['importnum']))
{
    $_POST['importnum']="";
}
else{
    $importnum = $_POST['importnum'];
}


$sql= "UPDATE member SET num = '$num', date = '$date', memID = '$memID', name = '$name' WHERE id = $id";
    echo $sql;
    //$result = $conn->query($sql);
    // echo "<script>
    // alert('수정 원성 !!!');
    // window.location.assign('import.php?importnum=$id');
    // </script>";


?>