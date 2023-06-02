<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>회원 등록</title>
    <link rel="stylesheet" href="style.css">
    
    <script src="src/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="src/bootstrap.min.css">
    <link rel="stylesheet" href="src/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .modal-content h3{
            margin-top:20px;
            width:100%;
            text-align: center;
          
            line-height: 40px;
        }
        .modal-content{
            
        }
        /* .modal-content p{
            width: 100%;
            
            margin:1px 0px !important;
            
        }
       
        #selectFile{
            position: relative;
            top:-40px;
        }
        #lastchild{
            padding-top:10px;
        } */
    </style>
    <script type="text/javascript" > 
             // message box
        function showMessageBox() {
        var modal = document.getElementById("myModal");
        modal.style.display = "block";
        }

        function hideMessageBox() {
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
        }


        //mess check file information
        function showMesCheckInfo(){
            var modal1 = document.getElementById("MessInfo");
            modal1.style.display = "block";
        }

        function hideMesCheckInfo() {
        var modal2 = document.getElementById("MessInfo");
        modal2.style.display = "none";
        }

    </script>

    

</head>

<body>
<!-- check empty message -->
<div id='MessEmpty' class='modal'>
    <div class='modal-content'>
        <h3>경보</h3>
        <p id='selectFile'>파일 선택하세요.</p>
        <p>
            <a  href='#' onclick='hideMesCheckEmpty();'  class='btn btn-dark btnfix'>확인</a>    
        </p>
    </div>
</div>

<!-- logout message -->
<div id='myModal' class='modal'>
        <div class='modal-content'>
          <p id="titlelogout">로그아웃 하시겠습니까?</p>
          <p>
                <a  href='index.php?logout' type='button' class='btn btn-dark btnfix'>확인</a>
                <a  href='#' onclick='hideMessageBox();'  class='btn btn-dark btnfix'>취소</a>
          </p>
        </div>
</div>
<div class="container"  >
        <div id="top">
            <h2>회원 등록</h2>
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
                    <div id="add-right"> 
                        <a  href="list.php" type="button" class="btn btn-warning btnfix" id="btncancel" >취소</a>
                        <a  href="add.php" class="btn btn-success btnfix" >회원 등록 </a>
                    </div>
                </form>    
            </div>
        </div>
    
    
    <form method="post" action="" name="fImport" enctype="multipart/form-data">
          
    <div class="bg-white " id="boxcontainer">
            
            <table class="table">
                <thead class="table-dark">
                <tr>
                    <th id="col1">&nbsp;</th>
                    <th id="col2">&nbsp;</th>
                    <th id="col2">&nbsp;</th>
                    <th id="col3">&nbsp;</th>
                    <th id="col4">&nbsp;</th>
                    <th id="col5">&nbsp;</th>
                    <th id="col6">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                
                
                </tbody>
                
            </table>

                
            <div id="importform">
                
                    <input type="file" name="excel" id="importfile" required value=""  accept=".xls, .xlsx">
                    <button  type="submit"  name="import" class="btn btn-primary btnfix" id="btnimport" >불러오기</button><br>
              

                <?php
                        //onclick="showMesCheckInfo();"
                        require 'config.php';
                        $dem=0;
                        if(isset($_POST["import"])){
                           
                           
                            ?>
                           <div id='MessInfo' class='modal'>
                                    <div class='modal-content1'>
                                        
                                        <?php
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
                                        $rowNo = 0;
                                        foreach($reader as $key => $row){
                                            $rowNo +=1;
                                            $countCheck = 0;
                                            $num = $row[1];
                                            $strNum = strlen($num);
                                            
                                            if($strNum !=5)
                                            {
                                                echo "<p>".$rowNo."행에서 기수 양식은 'yy-xx' 입니다.</p>";
                                                $countCheck +=1;
                                            }
                                            
                                            $firstNum = substr($num, 0, 2);
                                            $lastNum = substr($num, 3, 2);
                                            $arrayNum = substr($num, 2, 1);

                                            if($arrayNum != '-'){
                                                echo "<p>".$rowNo."기수의 세 번째 글자는 '-' 입니다..</p>";
                                                $countCheck +=1;
                                            }
                                            if(is_numeric($firstNum)==false){
                                                echo "<p>".$rowNo."행에서 기수의 처음 2자는 숫자여야 합니다.</p>";
                                                $countCheck +=1;
                                               
                                            }
                                            if(is_numeric($lastNum)==false){
                                                echo "<p>".$rowNo."행에서 기수의 마지막 2자는 숫자여야 합니다.</p>";
                                                $countCheck +=1;
                                               
                                            }

                                            $class = $row[2];

                                            $date = $row[3];
                                            $newdate = date('d-m-yy', strtotime($date));
                                            
                                            $strYear = substr($date, 2, 2);

                                            $memID = $row[4];

                                            $firstMem = substr($memID, 0, 2);
                                            $lastMem = substr($memID, 3, 6);
                                            $arrayMem = substr($memID, 2, 1);

                                            $stMem = strlen($memID);
                                            if($stMem !=9)
                                            {
                                                echo "<p>".$rowNo."행에서 군번 양식은 'yy-xxxxxx' 입니다.</p>";
                                                $countCheck +=1;
                                            }

                                            if($arrayMem != '-'){
                                                echo "<p>".$rowNo."군번의 세 번째 글자는 '-' 입니다..</p>";
                                                $countCheck +=1;
                                            }
                                            if(is_numeric($firstMem)==false){
                                                echo "<p>".$rowNo."행에서 군번의 처음 2자는 숫자여야 합니다.</p>";
                                                $countCheck +=1;
                                               
                                            }
                                            if(is_numeric($lastMem)==false){
                                                echo "<p>".$rowNo."행에서 군번의 마지막 6자는 숫자여야 합니다.</p>";
                                                $countCheck +=1;
                                               
                                            }

                                            $name = $row[5];
                                            
                                            
                                            if(($firstNum != $strYear) || ($firstNum != $firstMem)){
                                                echo "<p>".$rowNo."행에서 기수와 입소일이 군번과 일치하지 않습니다.</p>";
                                                $countCheck +=1;
                                                

                                            }

                                            
                                            if($countCheck == 0){
                                                $sql = "INSERT INTO member VALUES (NULL, '$num', '$class', '$date', '$memID', '$name','')";
                                                
                                                //$result = $conn->query($sql);
                                                
                                                if ($conn->query($sql) === TRUE) {
                                                    echo "<p>" . $memID." 군번을 추가하였습니다. </p>";
                                                } else {
                                                    echo "<p>" . $memID." 군번은 회원정보에 존재합니다. </p>" ;
                                                }
                                            }   
                                            
                                           // $rowNo ++;
                                        }
                                    ?>
                                    <br>
                                    
                                    <p id="lastchild">
                                        <a  href='list.php'  class='btn btn-dark btnfix'>회원조회</a> <a  href='import.php'  class='btn btn-dark btnfix'>취소</a>     
                                    </p> 
                                </div>
                            
                                </div> 

                            <?php
                            
                    //echo "불러오기가 완료되었습니다. <a href='list.php'> 홈 화면으로 돌아갑니다. </a>";
                        }
                        else{
                            echo "</div>";
                           
                        }
                        ?>
        

            </div>       
           
                            
        
    </form>
    </div>
        
       

    </div>  
            
    


</body>
</html>