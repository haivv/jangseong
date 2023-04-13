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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" > 
            //

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
        <h2>회원 조회</h2>
        <div id="top-right">
            <div id="btnlogout">
                <a href="logout.php">로그아웃</a>
                <a id="home" href="list.php">
                    <img src="imgs/home.png">
                </a>
            </div>
        </div>
    </div>

    <div class="container mt-3 p-3">
        <div id="right">
            <button type="button" id="btndelete" class="btn" onclick="checkCheckbox()">회원 삭제</button>
            <a href="add.php" type="button" id="btnadd" class="btn btn-success">회원 추가 </a>
            <a href="export.php" class="btn btn-primary">다운로드</a>
       
        
            <form action="search.php" method="post">
                <select name="searchoption" id="searchoption">
                    <option value ="name">이름</option>
                    <option value ="kulbon">군번</option>
                </select>
                
                <input type="text" id="txtSearch" placeholder="검색어를 입력하세요" name="txtsearch" >
                <button id="btnSearch" type="submit"><img src="imgs/search.png"></button>
            </form>    
        </div>
    </div>
    <div class="container" >
    <?php
    require 'config.php';
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

                    //get search option
                    if((!isset($_POST["searchoption"])||$_POST["searchoption"]=="")&&(!isset($_POST["txtsearch"]) ||$_POST["txtsearch"]==""))
                    {
                        $sql = "SELECT * FROM member";
                    }
                    else{
                        $txtsearch = $_POST["txtsearch"];
                        if(!isset($_POST['searchoption'])) {
                           $sql = "SELECT * FROM member where name='$txtsearch' OR memID ='$txtsearch'";
                        } else {
                            $selected = $_POST['searchoption'];


                            if($_POST["txtsearch"] ==""){
                                $sql = "SELECT * FROM member";
                            }
                            else{
                                
                                if($selected=="name"){
                                    $sql = "SELECT * FROM member where name ='$txtsearch'";

                                }
                                else if($selected=="gunbeon"){
                                    $sql = "SELECT * FROM member where memID ='$txtsearch'";
                                }
                                else{
                                    $sql = "SELECT * FROM member where name='$txtsearch' OR memID ='$txtsearch'";
                                }

                            }

                        }
                        

                        
                    }

                $result = $conn->query($sql);
                $num = $result->num_rows;
                echo "결과 ".$num." 명!!!";

                
            ?>
    </div>

    <div class="container">
   
        <table class="table">
        <form method="get" action="delete.php" name="listmember">
            <thead class="table-dark">
            <tr>
                <th ><input class="form-check-input" type="checkbox" id="myCheck" onclick="checkall()"></th>
                <th class="listcol">기수</th>
                <th class="listcol">입소일</th>
                <th class="listcol">군번</th>
                <th class="listcol">이름</th>
                <th class="listcol">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php
                if ($result->num_rows > 0) {
                    // output data of each row
                    $num=0;
                    while($row = $result->fetch_assoc()) { 
                    $memberID = $row['id'];
                     
                    
            ?>
            <input type="hidden" id="numofmem" value="<?php  echo $result->num_rows; ?>">
            

            <tr>
                <td><input class="form-check-input" type="checkbox" id="myCheck<?php  echo $num;?>" name="mem[]" value="<?php echo $row['id'];?>"></td>
                <td><?php echo $row['num']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['memID']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><a href="view.php?memID=<?php echo $memberID ?>" class="btn btn-primary" >상세보기</a></td>
            </tr>
           
            <?php
                $num+=1;
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