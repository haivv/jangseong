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
    
    <script type="text/javascript" > 
      
          


            function checkall(){
                var numofmem = document.getElementById("numofmem").value;
                if(document.getElementById("myCheck").checked == true)   {
                    for (var i = 0; i<numofmem; i++){
						document.getElementById("myCheck"+i).checked = true;                
					}
      
                }
                else
                {
                    for (var j = 0; j<numofmem; j++){
						document.getElementById("myCheck"+j).checked = false;  
					}
                }
                return false;
            }
			
            
            function checkCheckbox() {
                var numofmem = document.getElementById("numofmem").value;
              

                var dem = 0;
                for (var i = 0; i<numofmem; i++) {
                    if(document.getElementById("myCheck"+i).checked == true)  {
                        dem+=1;
                    }
                }
                if(dem==0) {
                    alert("선택하세요!!!");
                }
                else{
                     let text = "회원을 삭제하겠습니까?";
                    if (confirm(text) == true) {
                         document.listmember.submit();

                     } else {
                        
                     }

                }
               
            }
            
    </script>
    

</head>

<body>

    <div class="container p-3 mt-5">
        <h2>

            <?php
            $memID = $_GET["memID"];
            require 'config.php';
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM member where id = $memID";
            $result1 = $conn->query($sql);
            while($row1 = $result1->fetch_assoc()) {
                echo $row1["name"]."님 기록 조회";
            }
            ?>
            

        </h2>
        <div id="top-right">
            <div id="btnlogout">
                <a href="logout.php">로그아웃</a>
                <a id="home" href="list.php">
                    <img src="imgs/home.png">
                </a>
            </div>
        </div>
    </div>

    <!-- <div class="container mt-3 p-3">
        <div id="right">
            <button type="button" id="btndelete" class="btn" onclick="checkCheckbox()">회원 삭제</button>
            <a href="add.php" type="button" id="btnadd" class="btn btn-success">회원 추가 </a>
            <a href="export.php" class="btn btn-primary">불러오기</a>
       
        
            <form action="search.php" method="post">
                <select name="searchoption" id="searchoption">
                    <option value ="name">이름</option>
                    <option value ="kulbon">군번</option>
                </select>
                
                <input type="text" id="txtSearch" placeholder="검색어를 입력하세요" name="txtsearch" >
                <button id="btnSearch" type="submit"><img src="imgs/search.png"></button>
            </form>    
        </div>
    </div> -->

    <div class="container" >
  
    </div>

    <div class="container">
   
        <table class="table">
        <form method="get" action="delete.php" name="listmember">
            <thead class="table-dark">
            
            <?php


            ?>




            <tr>
                
                <th class="listcol">장비</th>
                <th class="listcol">합격 횟수</th>
                <th class="listcol">시험 횟수</th>
                <th class="listcol">총 훈련 시간</th>
                
            </tr>
            </thead>
            <tbody>
            <?php
                
               // $memID = $_GET["memID"];
                echo $memID;
                
                $sql2 = "SELECT * FROM test where tbmemID = $memID and equipment='휠형 굴착기'";
                $result2 = $conn->query($sql2);
                $equiment1_pass = 0;
                while($row2 = $result2->fetch_assoc()) {
                    if($row2["result"] == "합격"){
                    $equiment1_pass+=1;
                }
                }
                echo $equiment1_pass;
                
               //end loop 2
               
               function result_numof_pass($equip){
                require 'config.php';
                $memID=$_GET["memID"];
                $sql = "SELECT * FROM test where tbmemID = $memID and equipment='$equip'";
                $result = $conn->query($sql);
                $pass = 0;
                while($row2 = $result->fetch_assoc()) {
                    if($row2["result"] == "합격"){
                    $pass+=1;
                }
                }
                return $pass;
               }
               function result_numof_test($equip){
                require 'config.php';
                $memID=$_GET["memID"];
                $sql = "SELECT * FROM test where tbmemID = $memID and equipment='$equip'";
                $result = $conn->query($sql);
                $couttest = 0;
                while($row2 = $result->fetch_assoc()) {
                    
                    $couttest+=1;
                
                }
                return $couttest;
               }

               function count_time($equip){
                require 'config.php';
                $memID=$_GET["memID"];
                $sql = "SELECT * FROM test where tbmemID = $memID";
                $result = $conn->query($sql);
                $total_time = 0;
                while($row = $result->fetch_assoc()) {

                    
                    
                    $total_time=strtotime($row["time"]);

                   //echo $timeadd;
                
                }
                $newdate = time ( 'Y-m-j' , $total_time );
                return $newdate;
               }


            ?>
            
            

            <tr>      
                <td>휠형 굴착기</td>
                <td>
                <?php
                   echo result_numof_pass("휠형 굴착기");
                ?>
                
                </td>
                <td>
                    <?php
                        echo result_numof_test("궤도형 굴착기");
                    ?>
                </td>
                <td>
                    <?php
                       // echo count_time("궤도형 굴착기");
                    ?>
                
                </td>        
            </tr>
            <tr>      
                <td>궤도형 굴착기</td>
                <td>
                    <?php
                     echo result_numof_pass("궤도형 굴착기");
                    ?>

                </td>
                <td>
                    
                    <?php
                        echo result_numof_test("궤도형 굴착기");
                    ?>

                </td>
                <td>-</td>        
            </tr>
            <tr>      
                <td>도저</td>
                <td>
                    <?php
                     echo result_numof_pass("도저");
                    ?>


                </td>
                <td>
                    <?php
                        echo result_numof_test("궤도형 굴착기");
                    ?>

                </td>
                <td>-</td>        
            </tr>
            <tr>      
                <td>로더</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>        
            </tr>
            <tr>  
                <td>그레이더</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>          
                <?php
                
                
                ?>
            </tr>
            <?php
            //     $num+=1;
            // }
            // } else {
          
            // }
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
