<?php
session_start();
require 'config.php';

if(isset($_POST["user"]))
{
    $user = $_POST["user"];
}
else{
    $user ="";
}
if(isset($_POST["pass"])){
    $pass = $_POST["pass"];
} 
else{
    $pass="";
}  


$sqllogin = "SELECT * FROM account WHERE username = '$user' and password ='$pass'";

$resultlogin = $conn->query($sqllogin);
$numoflogin = $resultlogin->num_rows;
if ($numoflogin > 0) {
// output data of each row
    $_SESSION["login"]="ok";
    while($rowlogin = $resultlogin->fetch_assoc()) {
        $_SESSION["authority"]=$rowlogin['authority']; 
    }

}
else{
    
}



if(!isset($_SESSION["login"]))
{
    echo "
    <div id='messagebox'>
    <script>
    alert('관리자 권한이 없는 계정입니다!');
    window.location.assign('index.php');
    </script>
    </div>
    ";
    
    //header('location: index.php');
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

    <div class="container p-3 mt-5" >
        <h2>회원 조회</h2>
        <div id="top-right">
            <div class="btnlogout">
                
                <a class="home" href="list.php">
                    <img src="imgs/home.png">
                </a>
                <a class="logtext" href="logout.php" >로그아웃</a>
            </div>
        </div>
    </div>

    <div class="container mt-5 p-3">
        <div id="right">
            <div id="btnaction">
                <button type="button" id="btndelete" class="btn" onclick="checkCheckbox()">회원 삭제</button>
                <a href="add.php" type="button" id="btnadd" class="btn btn-success">회원 추가 </a>
                <a href="export.php" class="btn btn-primary" id="btndownload">다운로드</a>      
            </div>

            <form action="search.php" method="post">
                
                
                <select name="searchoption" id="searchoption">
                    <option value ="name">이름</option>
                    <option value ="kulbon">군번</option>
                </select>
                
                <button id="btnSearch" type="submit"><img src="imgs/search.png"></button>
                <input type="text" id="txtSearch" placeholder="검색어를 입력하세요" name="txtsearch" >
            </form>    
        </div>
    </div>
    <div class="container">
   
        <table class="table">
        <form method="get" action="delete.php" name="listmember">
            <thead class="table-dark">
            <tr>
                <th ><input class="form-check-input" type="checkbox" id="myCheck" onclick="checkall()"></th>
                <th class="listcol">기수</th>
                <th class="listcol">클래스</th>
                <th class="listcol">입소일</th>
                <th class="listcol">군번</th>
                <th class="listcol">이름</th>
                <th class="listcol">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php
                
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }
                $per_page_record = 4;  // Number of entries to show in a page.

// Look for a GET variable page if not found default is 1.

                if (isset($_GET["page"])) {
                    $page  = $_GET["page"];
                }
                else {
                    $page=1;
                }
                $start_from = ($page-1) * $per_page_record;


                $sql = "SELECT * FROM member  ORDER BY id DESC LIMIT $start_from, $per_page_record ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                $num = 0;
                while($row = $result->fetch_assoc()) {
                     $memberID=$row['id']; 

            ?>
            <input type="hidden" id="numofmem" value="<?php  echo $result->num_rows; ?>">
            

            <tr>
                <td><input class="form-check-input" type="checkbox" id="myCheck<?php  echo $num;?>" name="mem[]" value="<?php echo $row['id'];?>"></td>
                <td><?php echo $row['num']; ?></td>
                <td><?php echo $row['class']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['memID']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td id="cot"><a href="view.php?memID=<?php echo $row['memID']; ?>" class="btn btn-primary" >상세보기</a> <a href="edit.php?id=<?php echo $memberID ?>" class="btn btn-warning" style="color:white" >수정</a></td>
            </tr>
           
            <?php
                $num+=1;
            }
            } else {
            echo "0 results";
            }

            ?>  
            
    
           
            </tbody>
            </form>
        </table>
        
    </div>
    
    <div    class="container">
    <ul class="pagination" id="page1" >
                <?php

                    $query = "SELECT COUNT(*) FROM member ORDER BY id";
                    $rs_result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_row($rs_result);
                    $total_records = $row[0];

                    echo "</br>";

                    // Number of pages required.
                    $total_pages = ceil($total_records / $per_page_record);
                    $pagLink = "";
                    if($page>=2){
                        echo "<li class='page-item' ><a class='page-link' id='paging-left' href='list.php?page=".($page-1)."'>  이전 </a></li>";
                    }

                    for ($i=1; $i<=$total_pages; $i++) {
                        if ($i == $page) {
                            $pagLink .= "<li class='page-item active'><a class = 'page-link' href='list.php?page=".$i."'>".$i." </a></li>";
                            
                        }
                        else  {
                            $pagLink .= "<li class='page-item '><a class='page-link' href='list.php?page=".$i."'> ".$i." </a></li>";
                        }
                    }

                    echo $pagLink;

                    if($page<$total_pages){
                        echo "<li class='page-item'><a class='page-link' href='list.php?page=".($page+1)."'>  다음 </a></li>";
                    }

                    ?>
                    </ul>
    </div>

    <input type="hidden" id="firstmem" value="<?php  
            
            $sql2 = "SELECT * FROM member limit 1";
            $result2 = $conn->query($sql2);

           if ($result2->num_rows > 0) {
           // output data of each row
           
           while($row2 = $result2->fetch_assoc()) {
       
               echo $row2['id'];
           }
        }
        $conn->close();
       
       ?>">


</body>
</html>

<?php
}
?>
