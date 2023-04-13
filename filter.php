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
    
    

</head>

<body>

    <div class="container bg-light p-3">
        <h2><a href="list.php">FILTER</a></h2>
        <a href=""><img src="imgs/home.png"></a>
    </div>
    <div class="container p-3">
        <button type="button" class="btn btn-warning" onclick="checkCheckbox()">회원 삭제</button>
        <a href="add.php" type="button" class="btn btn-success">회원 추가 </a>
        <a href="export.php" class="btn btn-primary">불러오기</a>
       
        <div id="right">
            <form action="filter.php" method="post">
                <select name="searchoption" id="searchoption">

                <?php
                require 'config.php';
                $sql2 = "SELECT * FROM member GROUP BY num";
                $result2 = $conn->query($sql2);
                if ($result2->num_rows > 0) {
                    // output data of each row
                    
                    while($row2 = $result2->fetch_assoc()) {
                ?>
                    <option value ="<?php echo $row2["num"];?>"><?php echo $row2["num"];?></option>
                    
                <?php
                    }
                }
                ?>
                </select>
                
               
                <button id="btnSearch" style="border-radius:5px;" class="bg-dark" type="submit"><i style="color:white" class="fa fa-search"></i></button>
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
                    if((!isset($_POST["searchoption"])||$_POST["searchoption"]==""))
                    {
                        $sql = "SELECT * FROM member";
                    }
                    else{
                        $selected = $_POST['searchoption'];
                      
                            $sql = "SELECT * FROM member where num ='$selected'";
                         
                               

                        
                        

                        
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
                <th><input class="form-check-input" type="checkbox" id="myCheck" onclick="checkall()"></th>
                <th>기수</th>
                <th>입소일</th>
                <th>군번</th>
                <th>이름</th>
                <th>&nbsp;</th>
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
           
           
            <tr>
                
                <td colspan="6" >
                    <ul class="pagination" align="center">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                <!-- https://www.w3schools.com/bootstrap5/bootstrap_pagination.php -->

                </td>
               
            </tr>
            </tbody>
            </form>
        </table>
        
    </div>

</body>
</html>