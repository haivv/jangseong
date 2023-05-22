<?php
session_start();
if(!isset($_SESSION["login"]))
{
    header('location: index.php');
}
else{
?>
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
    <style>
        input[type="text"]{
            height: 40px;
        }
        input[type="date"]{
            height: 40px;
        }
        

    </style>

</head>

<body>
    <div class="container">
        <div id="top">
            <h2>회원 등록</h2>
            <div id="top-right">
                <div class="btnlogout">
                    
                    <a id="home" href="list.php">
                        <img src="imgs/home.png">
                    </a>
                    <a id="logtext" href="logout.php" >로그아웃</a>
                </div>
            </div>
        </div>
    </div>
    
    <form action="add.php" method="post" name="fadd" >
    <div class="container" >
        <div id="listaction">
            <div id="add-right">
                
                <button  type="submit" class="btn btn-success" >회원 등록 </button>
                <a type="hidden" href="import.php" class="btn btn-primary">불러오기</a>
            </div>
        </div>
    </div>

        
    <div class="container ">
        <div id="main">
        <table class="table mt-3">
                    <thead class="table-dark">
                    <tr>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th >&nbsp;</th>
                        <th  >&nbsp;</th>
                        <th >&nbsp;</th>
                        <th>&nbsp;</th>
                        <th >&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <input type="hidden" id="numofmem" value="<?php  ?>">
                    
                    <!-- add 1 -->
                    <tr?>
                        
                        <td colspan="7" style="text-align:center" >
                           
                            <?php
                                echo "<b style='font-size: 36px;'>공고!</b> <br>";
                                    require 'config.php';

                                
                                        $num1 = $_POST["num1"];
                                        $class1 = $_POST["class1"];
                                        $date1 = $_POST["date1"];
                                        $memID1 = $_POST["memID1"];
                                        $name1 = $_POST["name1"];


                                        $sqlck1 = "SELECT * FROM member  where memID ='$memID1' ";
                                        $resultck1 = $conn->query($sqlck1);
                                        if ($resultck1->num_rows > 0) {
                                            echo "군번 ". $memID1. " 존제했다<br>";
                                        }else{
                                            $sql1 = "INSERT INTO member VALUES (NULL, '$num1','$class1', '$date1', '$memID1', '$name1','');";
                                            $conn->query($sql1);
                                            echo "군번 ".$memID1. "추가 원료했다!<br>";
                                        }


                                    // add row 2
                                
                                        if(($_POST["num2"]) == ''){
                                        
                                            //echo "have not row 2 <br>";
                                        }
                                        else
                                        {
                                            $num2 = $_POST["num2"];
                                            $class2 = $_POST["class2"];
                                            $date2 = $_POST["date2"];
                                            $memID2 = $_POST["memID2"];
                                            $name2 = $_POST["name2"];
                                        
                                            $sqlck2 = "SELECT * FROM member  where memID ='$memID2' ";
                                            $resultck2 = $conn->query($sqlck2);
                                            if ($resultck2->num_rows > 0) {
                                        
                                                echo"군번 ". $memID2. " 존제했다<br>";
                                            }else{
                                                $sql2 = "INSERT INTO member VALUES (NULL, '$num2','$class2', '$date2', '$memID2', '$name2','');";
                                                $conn->query($sql2);
                                                echo "군번 ".$memID2. "추가 원료했다!<br>";
                                            }
                                        
                                        }
                                        
                                    




                                    // add row 3
                                    if(($_POST["num3"]) == ''){
                                        
                                       // echo "have not row 3 <br>";
                                    }
                                    else
                                    {
                                        $num3 = $_POST["num3"];
                                        $class3 = $_POST["class3"];
                                        $date3 = $_POST["date3"];
                                        $memID3 = $_POST["memID3"];
                                        $name3 = $_POST["name3"];

                                        $sqlck3 = "SELECT * FROM member  where memID ='$memID3' ";
                                        $resultck3 = $conn->query($sqlck3);
                                        if ($resultck3->num_rows > 0) {
                                            echo "군번".$memID3. " 존제했다<br>";
                                        }else{
                                            $sql3 = "INSERT INTO member VALUES (NULL, '$num3','$class3', '$date3', '$memID3', '$name3','');";
                                            $conn->query($sql3);
                                            echo "군번 ".$memID3. "추가 원료했다!<br>";
                                        }

                                    }


                                    // add row 4
                                    if(($_POST["num4"]) == ''){
                                        
                                       // echo "have not row 4 <br>";
                                    }
                                    else
                                    {
                                        $num4 = $_POST["num4"];
                                        $class4 = $_POST["class4"];
                                        $date4 = $_POST["date4"];
                                        $memID4 = $_POST["memID4"];
                                        $name4 = $_POST["name4"];

                                        $sqlck4 = "SELECT * FROM member  where memID ='$memID4' ";
                                        $resultck4 = $conn->query($sqlck4);
                                        if ($resultck4->num_rows > 0) {

                                            echo "군번". $memID4. " 존제했다<br>";
                                        }else{
                                            $sql4 = "INSERT INTO member VALUES (NULL, '$num4','$class4', '$date4', '$memID4', '$name4','');";
                                            $conn->query($sql4);
                                            echo "군번 ".$memID4. "추가 원료했다!<br>";
                                        }

                                    }


                                    // add row 5
                                    if(($_POST["num5"]) == ''){
                                        
                                        //echo "have not row 5 <br>";
                                    }
                                    else
                                    {
                                        $num5 = $_POST["num5"];
                                        $class5 = $_POST["class5"];
                                        $date5 = $_POST["date5"];
                                        $memID5 = $_POST["memID5"];
                                        $name5 = $_POST["name5"];

                                        $sqlck5 = "SELECT * FROM member  where memID ='$memID5' ";
                                        $resultck5 = $conn->query($sqlck5);
                                        if ($resultck5->num_rows > 0) {

                                            echo "군번 ".$memID5. "존제했다<br>";
                                        }else{
                                            $sql5 = "INSERT INTO member VALUES (NULL, '$num5','$class5', '$date5', '$memID5', '$name5','');";
                                            $conn->query($sql5);
                                            echo "군번 ".$memID5. "추가 원료했다!<br>";
                                        }

                                    }


                                    // add row 6
                                    if(($_POST["num6"]) ==''){
                                        //echo "have not row 6 <br>";
                                    }
                                    else
                                    {
                                        $num6 = $_POST["num6"];
                                        $class6 = $_POST["class6"];
                                        $date6 = $_POST["date6"];
                                        $memID6 = $_POST["memID6"];
                                        $name6 = $_POST["name6"];

                                        $sqlck6 = "SELECT * FROM member  where memID ='$memID6' ";
                                        $resultck6 = $conn->query($sqlck6);
                                        if ($resultck6->num_rows > 0) {
                                            
                                            echo "군번 ". $memID6. " 존제했다<br>";
                                        }else{
                                            $sql6 = "INSERT INTO member VALUES (NULL, '$num6','$class6', '$date6', '$memID6', '$name6','');";
                                            $conn->query($sql6);
                                            echo "군번 ". $memID6. "추가 원료했다!<br>";
                                        }

                                    }

                                    
                                    ?>
                                    
                                </td>
                            </tr>
                            
                
                
                </tbody>
                
            </table>

    </div>
</div>

</form>

        
    
   
    

        



</body>
</html>
<?php
}
?>
     
