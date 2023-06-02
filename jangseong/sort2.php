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
<script>
// Check if the browser supports the CacheStorage API
if ('caches' in window) {
  // Open the cache storage
  caches.open('my-cache-name').then(function(cache) {
    // Clear all caches
    cache.keys().then(function(cacheNames) {
      cacheNames.forEach(function(cacheName) {
        cache.delete(cacheName);
      });
    }).then(function() {
      console.log('Cache successfully deleted!');
    }).catch(function(error) {
      console.log('Error deleting cache:', error);
    });
  });
}
</script>

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
                    var modal = document.getElementById("selmes");
                    modal.style.display = "block";
                }
                else{
                    var modal = document.getElementById("delmes");
                    modal.style.display = "block";

                }
               
            }

            function hidecheckCheckbox(){
                var modal = document.getElementById("selmes");
                modal.style.display = "none";
            }
            function hidedeleteCheckbox(){
                var modal = document.getElementById("delmes");
                modal.style.display = "none";
            }
            function deleteSubmit(){
                document.listmember.submit();

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

    <!-- select item to delete message -->
    <div id='selmes' class='modal'>
        <div class='modal-content'>
          <p>삭제할 회원을 선택해주세요!</p>
          <p>
                <a  href='#' onclick='hidecheckCheckbox();'  class='btn btn-dark btnfix'>확인</a>
                
          </p>
        </div>
    </div>

    <!-- delete message -->
    <div id='delmes' class='modal'>
        <div class='modal-content'>
          <p>회원을 삭제하겠습니까?</p>
          <p>
                
                <a  href='#'  onclick='deleteSubmit();' type='button' class='btn btn-dark btnfix'>확인</a>
                <a  href='#' onclick='hidedeleteCheckbox();'  class='btn btn-dark btnfix'>취소</a>
                
          </p>
        </div>
    </div>

    
    <div class="container"  >
        <div id="top">
            <h2>회원 조회</h2>
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

    <div class="container" >
        <div id="listaction">
            <div id="right">
                <div id="btnaction">
                    <button type="button" id="btndelete" class="btn" onclick="checkCheckbox()">회원 삭제</button>
                    <a href="add.php" type="button" id="btnadd" class="btn btn-success">회원 등록 </a>
                    <a href="export.php" class="btn btn-primary" id="btndownload">다운로드</a>      
                </div>

                <form action="search.php" method="post">
                    
                    <select name="searchoption" id="searchoption">
                        <option value ="name">이름</option>
                        <option value ="kulbon">군번</option>
                    </select>
                
                    
                    <button id="btnSearch" type="submit"><img src="imgs/search.png"></button>
                    <input type="text" id="txtSearch" placeholder="검색어를 입력하세요" name="txtsearch" required >
                </form>    
            </div>
        </div>
    </div>
   
    <div class="container ">
        <div id="main">
            <form method="get" action="delete.php" name="listmember">
            <table class="table">
            
                <thead class="table-dark">
                <tr>
                    <th  class="text-center firstcol"  ><input class="form-check-input checklist" type="checkbox" id="myCheck" onclick="checkall()" style="position:relative; left:-5px; "></th>
                    <th class="listcol">기수</th>
                    <th class="listcol">클래스</th>
                    <th class="listcol">입소일</th>
                    <th class="listcol">군번
                        <?php
                            if(!isset($_GET["act"])){
                                $sort ="";
                            }
                            else{
                            $sort = $_GET["act"];
                            }
                            if($sort=="a"){
                                echo "<a href='sort2.php?act=b' class='btnsort'>&#8595; </a> ";
                            }
                            else{
                                echo "<a href='sort2.php?act=a' class='btnsort'>&#8593; </a> ";
                            }
                        ?>
                    </th>
                    <th class="listcol">이름 <a href="sort.php?act=a" class="btnsort">&#8595;</a> </th>
                    <th >&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }
                    $per_page_record = 6;  // Number of entries to show in a page.

    // Look for a GET variable page if not found default is 1.

                    if (isset($_GET["page"])) {
                        $page  = $_GET["page"];
                    }
                    else {
                        $page=1;
                    }
                    $start_from = ($page-1) * $per_page_record;


                    if($sort=="a"){
                        $sql = "SELECT * FROM member  ORDER BY memID  ASC LIMIT $start_from, $per_page_record ";
                    }
                    else{
                        $sql = "SELECT * FROM member  ORDER BY memID DESC LIMIT $start_from, $per_page_record ";
                    }
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    // output data of each row
                    $num = 0;
                    while($row = $result->fetch_assoc()) {
                        $memberID=$row['id']; 

                ?>
                <input type="hidden" id="numofmem" value="<?php  echo $result->num_rows; ?>">
                

                <tr>
                    
                    <td class="text-center" > <input class="form-check-input justify-content-center checkitem"  style="position:relative; left:-5px; "  type="checkbox" id="myCheck<?php  echo $num;?>" name="mem[]" value="<?php echo $row['id'];?>"></td>
                    <td><?php echo $row['num']; ?></td>
                    <td><?php echo $row['class']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['memID']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td id="cot" ><a href="view.php?memID=<?php echo $row['memID']; ?>" class="btn btn-primary btnfix" style="position:relative; left:53px;" >상세정보</a> <a href="edit.php?id=<?php echo $memberID ?>" class="btn btn-warning btnfix" style="color:white; float:right; margin-right:20px; position:relative; " >수정</a></td>
             </tr>
            
                <?php
                    $num+=1;
                }
                } else {
                echo "0 results";
                }

                ?>  
                
        
            
                </tbody>
                
            </table>
            </form>
        </div>
        
    </div>
    
    <div    class="container">
        <ul class="pagination  justify-content-center"  >
    
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
                    if($sort=="a"){
                        echo "<li class='page-item' ><a class='page-link' id='paging-left' href='sort2.php?page=".($page-1)."&act=a'>  이전 </a></li>";
                    }
                    else{
                        echo "<li class='page-item' ><a class='page-link' id='paging-left' href='sort2.php?page=".($page-1)."&act=b'>  이전 </a></li>";
                    }
                }

                for ($i=1; $i<=$total_pages; $i++) {
                    if ($i == $page) {
                        if($sort=="a"){
                            $pagLink .= "<li class='page-item active'><a class = 'page-link' href='sort2.php?page=".$i."&act=a'>".$i." </a></li>";
                        }
                        else{
                            $pagLink .= "<li class='page-item active'><a class = 'page-link' href='sort2.php?page=".$i."&act=b'>".$i." </a></li>";
                        }
                        
                    }
                    else  {
                        if($sort=="a"){
                            $pagLink .= "<li class='page-item '><a class='page-link' href='sort2.php?page=".$i."&act=a'> ".$i." </a></li>";
                        }
                        else{
                            $pagLink .= "<li class='page-item '><a class='page-link' href='sort2.php?page=".$i."&act=b'> ".$i." </a></li>";
                        }
                    }
                }

                echo $pagLink;

                if($page<$total_pages){
                    if($sort=="a"){
                        echo "<li class='page-item'><a class='page-link' href='sort2.php?page=".($page+1)."&act=a'>  다음 </a></li>";
                    }
                    else{
                        echo "<li class='page-item'><a class='page-link' href='sort2.php?page=".($page+1)."&act=b'>  다음 </a></li>";
                    }
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