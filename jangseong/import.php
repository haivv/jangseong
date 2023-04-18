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
            

            function checkempty(){
                var dem = 0;
                for(var q=1;q<5;q++){
                    if(document.getElementById('str'+q).value=="") {
                        document.getElementById('str'+q+'err').innerHTML="필수";
                        dem+=1;

                    }
                    else{
                        document.getElementById('str'+q+'err').innerHTML="";
                    }   
                }
                if(dem == 0){
                    document.fadd.submit();
                }

                
            }   
    </script>
    

</head>

<body>
    <div class="container p-3 mt-5">
        <h2>회원 추가  import</h2>
        <div id="top-right">
            <div id="btnlogout">
                <a href="#">로그아웃</a>
                <a id="home" href="list.php">
                    <img src="imgs/home.png">
                </a>
            </div>
        </div>
    </div>

    <div class="container mt-3 p-3">
        <form method="post" action="" name="" enctype="multipart/form-data">
            <div class="container mt-3">
                <div id="add-right"> 
                    <a  href="list.php" type="button" class="btn btn-warning" >취소</a>
                    <button  type="button" class="btn btn-success" onclick="checkempty()">회원 추가 </button>
                </div>
            </div>
       
        </div>       
        <div class="container mt-3">
            <input type="file" name="excel" required value="">
            <button  type="submit"  name="import" class="btn btn-primary">불러오기</button>
        </div>
        
        <div class="container  mt-3">
            <table class="table mt-3">
                <thead class="table-dark">
                <tr>
                    <th id="col1"><input class="form-check-input" type="checkbox" id="myCheck" onclick="checkall()"></th>
                    <th id="col2">기수</th>
                    <th id="col3">입소일</th>
                    <th id="col4">군번</th>
                    <th id="col5">이름</th>
                    <th id="col6">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <?php
                require 'config.php';
                $dem=0;
                if(isset($_POST["import"])){
                    $fileName = $_FILES["excel"]["name"];
                    $fileExtension = explode('.', $fileName);
                    $fileExtension = strtolower(end($fileExtension));
                    $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

                    $targetDirectory = "uploads/" . $newFileName;
                    move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

                    error_reporting(0);
                    ini_set('display_errors', 0);

                    require 'excelReader/excel_reader2.php';
                    require 'excelReader/SpreadsheetReader.php';

                    $reader = new SpreadsheetReader($targetDirectory);
                    
                    foreach($reader as $key => $row){

                       
                        $num = $row[1];

                        $date = $row[2];
                        $newdate = date('d-m-yy', strtotime($date));
                        $memID = $row[3];
                        $name = $row[4];

                        
                        $sql = "INSERT INTO member VALUES (NULL, '$num', '$date', '$memID', '$name','','','')";
						echo "불러오기가 완료되었습니다. <a href='list.php'> 홈 화면으로 돌아갑니다. </a>";
                        $result = $conn->query($sql);
                        
                      
                  
                 
                    }
                }
                ?>
            
                </tbody>
                
            </table>
            
        </div>
        </form>
        
       

    
            
    


</body>
</html>