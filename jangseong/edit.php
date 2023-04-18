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
                    alert("삭제할 회원을 선택해주세요!");
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
    <?php
   
                

                
            ?>
    </div>

    <div class="container">
   
        <table class="table">
        <form method="post" action="proedit.php" name="listmember">
            <thead class="table-dark">
            <tr>
                
                <th class="listcol">기수</th>
                <th class="listcol">입소일</th>
                <th class="listcol">군번</th>
                <th class="listcol">이름</th>
                <th class="listcol">&nbsp;</th>
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
                
                <td><input type="text" name="num" value="<?php echo $row['num'];?>"></td>
                <td><input type="date" name="date" value="<?php echo $row['date'];?>"></td>
                <td><input type="text" name="memID" value="<?php echo $row['memID'];?>"></td>
                <td><input type="text" name="name" value="<?php echo $row['name'];?>"></td>
                <td><button type="submit" class="btn btn-warning" style="color:white" >수정</button></td>
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