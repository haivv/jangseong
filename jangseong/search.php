<?php
session_start();
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 1 Jan 2000 00:00:00 GMT");
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
    <style>
        .lastcol{
            width: 15%;
        }
    </style>
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

                    var modal = document.getElementById("selmes");
                    modal.style.display = "block";
                    //alert("선택하세요!!!");
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
                <a  href='#' onclick='hidedeleteCheckbox();'  class='btn btn-dark btnfix'>취소</a>
                <a  href='#'  onclick='deleteSubmit();' type='button' class='btn btn-dark btnfix'>확인</a>
                
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
                    <a id="logtext" href="#" onclick="showMessageBox()" >로그아웃</a>
                </div>
            </div>
        </div>
    </div>



    <div class="container" >

        <div id="listaction">
            <div id="right">
                <div id="btnaction">
                    <button type="button" id="btndelete" class="btn btnfix" onclick="checkCheckbox()">회원 삭제</button>
                    <a href="add.php" type="button" id="btnadd" class="btn btn-success btnfix">회원 등록 </a>
                    <a href="export.php" class="btn btn-primary btnfix" id="btndownload ">다운로드</a>      
                </div>

                <form action="search.php" method="post">
                    
                    <select name="searchoption" id="searchoption" class="btnfix">
                        <option value ="name">이름</option>
                        <option value ="kulbon">군번</option>
                    </select>
                
                    
                    <button id="btnSearch" type="submit"><img src="imgs/search.png"></button>
                    <input type="text" id="txtSearch" placeholder="검색어를 입력하세요" name="txtsearch" required >
                </form>    
            </div>
        </div>
    </div>



    
    <div class="container" >
        
        <?php
        require 'config.php';
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
 
            
        $txtsearch = $_POST["txtsearch"];
        if(!isset($_POST['searchoption'])) {
            $sql = "SELECT * FROM member where name like '%$txtsearch%'  ";
        } else {
            $selected = $_POST['searchoption'];  
            if($selected=="name"){
                $sql = "SELECT * FROM member where name like '%$txtsearch%' ";
            }
            else{
                $sql = "SELECT * FROM member where memID ='$txtsearch'  ";
            }
        }

                
                    

                    // Get num of result

                    $result = $conn->query($sql);
                    $num = $result->num_rows;
                    echo "검색 결과 ".$num." 명";

                    
                ?>
            
    </div>

    <div class="container">
    <div id="main">
        <table class="table">
        <form method="get" action="delete.php" name="listmember">
            <thead class="table-dark">
            <tr>
                    <th  class="text-center firstcol"  ><input class="form-check-input checklist" style="position:relative; left:-5px; " type="checkbox" id="myCheck" onclick="checkall()"></th>
                    <th class="listcol">기수</th>
                    <th class="listcol">클래스</th>
                    <th class="listcol">입소일</th>
                    <th class="listcol">군번</th>
                    <th class="listcol">이름</th>
                    <th >&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php

                   
                    $result = $conn->query($sql);


                if ($result->num_rows > 0) {
                    // output data of each row
                    $num=0;
                    while($row = $result->fetch_assoc()) { 
                    $memberID = $row['id'];
                     
                    
            ?>
            <input type="hidden" id="numofmem" value="<?php  echo $result->num_rows; ?>">
            

            <tr>
                    
                    <td class="text-center" > <input class="form-check-input justify-content-center checkitem" style="position:relative; left:-5px; "   type="checkbox" id="myCheck<?php  echo $num;?>" name="mem[]" value="<?php echo $row['id'];?>"></td>
                    <td><?php echo $row['num']; ?></td>
                    <td><?php echo $row['class']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['memID']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td id="cot" ><a href="view.php?memID=<?php echo $row['memID']; ?>" class="btn btn-primary btnfix" style="position:relative; left:50px;" >상세정보</a> <a href="edit.php?id=<?php echo $memberID ?>" class="btn btn-warning btnfix" style="color:white; float:right; margin-right:20px; position:relative; top:5px;" >수정</a></td>
             </tr>
           
            <?php
                $num+=1;
            }
            } else {
          
            }
            


            ?>  
           
           
            
          
            </tbody>
            </form>
        </table>
        </div> <!--end main-->
    </div>


    



    


</body>
</html>

<?php
}
?>
