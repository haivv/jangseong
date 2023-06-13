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
    
    function checknum(strNum){
            var num = document.getElementById(strNum).value;
            var titlemess = document.getElementById("mess");
            var firstNum = num.substr(0,2);
            var lastNum = num.substr(3,2);
            var countOfCheck = 0;
                if(num.length != 5 ){
                   var modal = document.getElementById("checkNumMes");
                    modal.style.display = "block";
                    titlemess.innerHTML  = "기수 양식은 'yy-xx' 입니다. <br>";
                    countOfCheck += 1;
                }
                if(num.substr(2,1) != '-'){
                    var modal = document.getElementById("checkNumMes");
                    modal.style.display = "block";
                    titlemess.innerHTML = "기수 양식은 'yy-xx' 입니다. <br>";
                    countOfCheck += 1;
                }
                if(isNaN(firstNum)){
                    var modal = document.getElementById("checkNumMes");
                    modal.style.display = "block";
                    titlemess.innerHTML = "기수의 처음 2자는 숫자여야 합니다.<br>";
                    countOfCheck += 1;
                }
                if(isNaN(lastNum)){
                    var modal = document.getElementById("checkNumMes");
                    modal.style.display = "block";
                    titlemess.innerHTML =  "기수의 마지막 2자는 숫자여야 합니다.<br>";
                    countOfCheck += 1;
                }

                if(countOfCheck > 0){
                    return false;
                }
                else{ 
                    return true;
                }

          }

          function checkmemID(strMemID){
            var memID = document.getElementById(strMemID).value;
            var titlemess = document.getElementById("mess");
            var firstmemID = memID.substr(0,2);
            var lastmemID = memID.substr(3,6);
            var countOfCheck = 0;
            
                if (memID.length != 9 ){
                   
                    var modal = document.getElementById("checkNumMes");
                    modal.style.display = "block";
                    titlemess.innerHTML  = "군번 양식은 'yy-xxxxxx' 입니다. <br>";
                    countOfCheck += 1;
                    
                }
                if(memID.substr(2,1) != '-'){

                    var modal = document.getElementById("checkNumMes");
                    modal.style.display = "block";
                    titlemess.innerHTML = "군번 양식은 'yy-xxxxxx' 입니다.<br>";
                    countOfCheck += 1;
                }
                
                if(isNaN(firstmemID)){
                    var modal = document.getElementById("checkNumMes");
                    modal.style.display = "block";
                    titlemess.innerHTML = "군번의 처음 2자는 숫자여야 합니다.<br>";
                    countOfCheck += 1;
                }
                if(isNaN(lastmemID)){
                    var modal = document.getElementById("checkNumMes");
                    modal.style.display = "block";
                    titlemess.innerHTML =  "군번의 마지막 6자는 숫자여야 합니다.<br>";
                    countOfCheck += 1;
                }
                if(countOfCheck > 0){
                    return false;
                }
                else{ 
                    return true;
                }
                
                
          }
      
          
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
                if(dem > 0){
                    return false;
                }
                else{
                    return true;
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
                    //alert("기수와 입소일이 군번과 일치하지 않습니다!");
                    var modal = document.getElementById("myModal1");
                    modal.style.display = "block";
                    return false;
                }  
                else{
                    return true;
                }
            }
            
            function hideMessageBoxYear() {
            var modal = document.getElementById("myModal1");
            modal.style.display = "none";
            }


            function hideMesNum() {
            var modal = document.getElementById("checkNumMes");
            modal.style.display = "none";
            }

            function checkall(){
                // checknum('str1');
                 //checkmemID('str4');
                 //alert(checkyear());
                 //checkempty();

                // checkyear();
                if((checkempty()==true) &&  (checknum('str1')==true) && (checkmemID('str4')==true)  && (checkyear()==true) ){
                    document.listmember.submit();
                }
            }
     

         // message box
         function showMessageBox() {
            var modal = document.getElementById("myModal");
            modal.style.display = "block";
            }

            function hideMessageBox() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
            }

    </script>
    
</head>

<body>
    <!-- logout message -->
    <div id='myModal' class='modal'>
        <div class='modal-content'>
          <p>로그아웃 하시겠습니까?</p>
          <p>
                
                <a  href='index.php?logout' type='button' class='btn btn-dark btnfix'>확인</a>
                <a  href='#' onclick='hideMessageBox();'  class='btn btn-dark btnfix'>취소</a>
          </p>
        </div>
    </div>

    <!--check year message-->
    <div id='myModal1' class='modal'>
        <div class='modal-content'>
          <p>기수와 입소일이 군번과 일치하지 않습니다!</p>
          <p>
                <a  href='#' onclick='hideMessageBoxYear();'  class='btn btn-dark btnfix'>확인</a>
          </p>
        </div>
    </div>

    <!--check num row 1 message-->
    <div id='checkNumMes' class='modal'>
        <div class='modal-content'>
          <p id="mess"></p>
          <p>
                <a  href='#' onclick='hideMesNum();'  class='btn btn-dark btnfix'>확인</a>
                
          </p>
        </div>
    </div>


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
                    <a id="logtext" href="#" onclick="showMessageBox()">로그아웃</a>
                </div>
            </div>
        </div>
    </div>



    

    <div class="container ">
        <div id="main">
   
        <table class="table">
        <form method="post" action="proedit.php" name="listmember" >
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
            <input type="hidden" name="memIDfixed" value="<?php echo $row['memID'];?>">
            
            

            <tr>
                <td>&nbsp;</td>
                <td><input type="text" id="str1" name="num" value="<?php echo $row['num'];?>"><span class="error" id ="str1err"> </span></td>
                <td><input type="text" id="str2" name="class" value="<?php echo $row['class'];?>"><span class="error" id ="str2err"> </span></td>
                <td><input type="date" id="str3" name="date" value="<?php echo $row['date'];?>"><span class="error" id ="str3err"> </span></td>
                <td><input type="text" id="str4" name="memID" value="<?php echo $row['memID'];?>"><span class="error" id ="str4err"> </span></td>
                <td><input type="text" id="str5" name="name" value="<?php echo $row['name'];?>"><span class="error" id ="str5err"> </span></td>
                <td><button type="button" class="btn btn-warning" style="color:white" onclick="checkall()" >수정</button></td>
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
        
    </div>


    


</body>
</html>

<?php
}
?>