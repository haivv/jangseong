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

    <title>회원 수정</title>
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
    
    <script type="text/javascript" > 
      
          
            function checkempty(){
                var dem = 0;
                for(var q=1;q<6;q++){
                    if(document.getElementById('str'+q).value=="") {
                        document.getElementById('str'+q+'err').innerHTML="필수";
                        dem+=1;

                    }
                    else{
                        document.getElementById('str'+q+'err').innerHTML="";
                    }   
                }
                
   
            }   

            
            
           

            function checkyear(){
                var str1 = document.getElementById('str1').value;
                var firstStr1 = str1.slice(0, 2);
                //alert("list 1: " + firstStr1);
            

                var str2 = document.getElementById('str3').value;
                var firstStr2 = str2.slice(2, 4);
                
                var str3 = document.getElementById('str4').value;
                var firstStr3 = str3.slice(0, 2);

                if((firstStr1 != firstStr2) || (firstStr1 != firstStr3) )
                {
                    alert("기수와 입소일이 군번과 일치하지 않습니다!");
                }  
                else{
                    document.listmember.submit();
                }
        }
            
    </script>
    
</head>

<body>
    <div class="container" >
        <div id="top">
            <h2>
                <?php 
                    $id = $_GET["id"];
                    require 'config.php';
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }
        
                    $sql = "SELECT * FROM member where id = $id";
                    $result1 = $conn->query($sql);
                    while($row1 = $result1->fetch_assoc()) {
                        echo $row1["name"]."님의 정보 수정";
                    }
                ?>

            </h2>
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



    

    <div class="container" >

    </div>

    <div class="container">
   
        <table class="table">
        <form method="post" action="proedit.php" name="listmember">
            <thead class="table-dark">
            <tr>
                <th>&nbsp;</th>
                <th class="">기수</th>
                <th class="">클래스</th>
                <th class="">입소일</th>
                <th class="">군번</th>
                <th class="">이름</th>
                <th class="">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php

                $result = $conn->query($sql);
                 
                 if ($result->num_rows > 0) {
                 // output data of each row
                 $num = 0;
                 while($row = $result->fetch_assoc()) {
                     
                    
            ?>
            
            

            <tr>
                <td>&nbsp;</td>
                <td><input type="text" id="str1" name="num" value="<?php echo $row['num'];?>"></td>
                <td><input type="text" id="str2" name="class" value="<?php echo $row['class'];?>"></td>
                <td><input type="date" id="str3" name="date" value="<?php echo $row['date'];?>"></td>
                <td><input type="text" id="str4" name="memID" value="<?php echo $row['memID'];?>"></td>
                <td><input type="text" id="str5" name="name" value="<?php echo $row['name'];?>"></td>
                <td><button type="button" class="btn btn-warning" style="color:white" onclick=" checkyear()" >수정</button></td>
            </tr>
            <input type="hidden" name="id" value="<?php echo $row["id"]?>">
            <?php
                
            }
            } else {
          
            }
            $conn->close();


            ?>  
           
           
           
            </tbody>
           
            </form>
        </table>
        
    </div>


    


</body>
</html>

<?php
}
?>