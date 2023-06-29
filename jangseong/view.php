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

    <div class="container"  >
        <div id="top">
            <h2>
                <?php
                $memID = $_GET["memID"];
            // echo $memID;
                //echo $_SESSION["authority"];
                require 'config.php';
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM member where memID = '$memID'";
                $result1 = $conn->query($sql);
                while($row1 = $result1->fetch_assoc()) {
                    echo $row1["name"]."님 기록 조회";
                }
                ?>

            </h2>
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



    <div class="container">
   
        <table class="table">
        <form method="get" action="delete.php" name="listmember">
            <thead class="table-dark">
                <tr>
                    <th>&nbsp;</th>
                    <th class="">모드</th>
                    <th class="">합격 횟수</th>
                    <th class="">훈련 횟수</th>
                    <th class="">총 훈련 시간</th>
                    
                </tr>
            </thead>
           
            <tbody>
            <?php
                
               function result_numof_pass($mode){
                require 'config.php';
                $memID=$_GET["memID"];
                $sql = "SELECT * FROM record where memID = '$memID' and mode='$mode'";
                $result = $conn->query($sql);
                $pass = 0;
                while($row2 = $result->fetch_assoc()) {
                    if($row2["result"] == "합격"){
                    $pass+=1;
                }
                }
                return $pass;
               }


               function result_numof_test($mode){
                require 'config.php';
                $memID=$_GET["memID"];
                $sql = "SELECT * FROM record where memID = '$memID' and mode='$mode'";
                
                $result = $conn->query($sql);
                $coutoftest = 0;
                while($row = $result->fetch_assoc()) {
                
                    if(($row["result"] == "합격")||($row["result"] == "불합격")){
                        $coutoftest+=1;
                    }
                
                }
                
                return $coutoftest;
               }


               function count_time($mode){
                    require 'config.php';
                    $memID=$_GET["memID"];
                    $sql = "SELECT * FROM record where memID = '$memID' and mode='$mode'";
                    $result = $conn->query($sql);
                    $total_time = 0;
                    $time_list=array();
                    while($row = $result->fetch_assoc()) {
                        array_push($time_list,$row["time"]);
                        
                    }
                    $total_seconds = 0;
                    foreach ($time_list as $time) {
                        $time_parts = explode(':', $time);
                        $hours = (int)$time_parts[0];
                        $minutes = (int)$time_parts[1];
                        $seconds = (int)$time_parts[2];
                        $total_seconds += ($hours * 3600) + ($minutes * 60) + $seconds;
                    }

                    // Convert total seconds back to hours, minutes, and seconds
                    $total_hours = floor($total_seconds / 3600);
                    $total_seconds %= 3600;
                    $total_minutes = floor($total_seconds / 60);
                    $total_seconds %= 60;

                    // Get the formatted string representation of the total sum
                    $total_time_str = sprintf("%02d:%02d:%02d", $total_hours, $total_minutes, $total_seconds);

                    // Print the total sum
                
                    
                    return $total_time_str;
               }

               switch($_SESSION["authority"]){   
                case 2:                    
                   
                    echo "<style>#rowdata7,#rowdata8 {display:none;}</style>";
                    break; 
                case 3:                    
                   
                    echo "<style>#rowdata1,#rowdata2 ,#rowdata5, #rowdata7,#rowdata8  {display:none;}</style>";
                    break;
                case 4:                    
                    echo "<style>#rowdata1,#rowdata2,#rowdata3,#rowdata4,#rowdata5  {display:none;}</style>";
                    break;
                case 5:                    
                    echo "<style>#rowdata1,#rowdata2,#rowdata3,#rowdata4 {display:none;}</style>";
                    break;
                    case 6:                    
                   
                        echo "<style>#rowdata7,#rowdata8 {display:none;}</style>";
                        break; 
                    case 3: 
                        
            //     case 4:                
            //         echo "<style>#rowdata1,#rowdata2,#rowdata4,#rowdata5{display:none;}</style>";
            //         break;
            //     case 5:               
            //         echo "<style>#rowdata1,#rowdata2,#rowdata3,#rowdata5{display:none;}</style>";
            //         break;
            //     case 6:                
            //         echo "<style>#rowdata1,#rowdata2,#rowdata3,#rowdata4{display:none;}</style>";
            //         break;
            //     default:
            //         echo "<style>#rowdata5,#rowdata2,#rowdata3,#rowdata4{display:none;}</style>";
            //     break;

            }

            ?>
                <tr  id="rowdata1">      
                    <td>&nbsp;</td>
                    <td >주행연습</td>
                    <td>
                        <?php
                        if(result_numof_test("주행연습")==0){
                            echo "-";
                        }
                        else{
                            echo result_numof_pass("주행연습"). "회";
                        }
                       
                        
                        ?>

                    </td>
                    <td>    
                        <?php
                            if(result_numof_test("주행연습")==0){
                                echo "-";
                            }
                            else{
                                echo result_numof_test("주행연습"). "회";
                            }
                         
                        ?>

                    </td>
                    <td>
                        <?php
                            if(result_numof_test("주행연습")==0){
                                echo "-";
                            }
                            else{
                                echo count_time("주행연습");
                            }
                        
                        ?>
                    </td>       
                </tr>
                <tr id="rowdata2">     
                    <td>&nbsp;</td> 
                    <td>주행시험</td>
                    <td>
                        <?php
                        if(result_numof_test("주행시험")==0)
                        {
                            echo "-";
                        }
                        else{
                            echo result_numof_pass("주행시험"). "회" ;
                        }
                        
                        ?>

                    </td>
                    <td>    
                        <?php
                         if(result_numof_test("주행시험")==0)
                         {
                             echo "-";
                         }
                         else{
                            echo result_numof_test("주행시험"). "회";
                         }
                        ?>

                    </td>
                    <td>
                        <?php
                        if(result_numof_test("주행시험")==0)
                        {
                            echo "-";
                        }
                        else{
                            echo count_time("주행시험");
                        }
                        ?>
                    </td>        
                </tr>
                <tr id="rowdata3"> 
                    <td>&nbsp;</td>     
                    <td>굴착연습</td>
                    <td>
                        <?php
                        if(result_numof_test("굴착연습")==0)
                        {
                            echo "-";
                        }
                        else{
                            echo result_numof_pass("굴착연습"). "회" ;
                        }
                        
                        ?>

                    </td>
                    <td>    
                        <?php
                         if(result_numof_test("굴착연습")==0)
                         {
                             echo "-";
                         }
                         else{
                            echo result_numof_test("굴착연습"). "회";
                         }
                        ?>

                    </td>
                    <td>
                        <?php
                        if(result_numof_test("굴착연습")==0)
                        {
                            echo "-";
                        }
                        else{
                            echo count_time("굴착연습");
                        }
                        ?>
                    </td>      
                </tr>
                <tr id="rowdata4"> 
                    <td>&nbsp;</td>     
                    <td>굴착시험</td>
                    <td>
                        <?php
                        if(result_numof_test("굴착시험")==0)
                        {
                            echo "-";
                        }
                        else{
                            echo result_numof_pass("굴착시험"). "회" ;
                        }
                        
                        ?>

                    </td>
                    <td>    
                        <?php
                         if(result_numof_test("굴착시험")==0)
                         {
                             echo "-";
                         }
                         else{
                            echo result_numof_test("굴착시험"). "회";
                         }
                        ?>

                    </td>
                    <td>
                        <?php
                        if(result_numof_test("굴착시험")==0)
                        {
                            echo "-";
                        }
                        else{
                            echo count_time("굴착시험");
                        }
                        ?>
                    </td>      
                </tr>
                <tr id="rowdata7"> 
                    <td>&nbsp;</td>     
                    <td>연습</td>
                    <td>
                        <?php
                        if(result_numof_test("연습")==0)
                        {
                            echo "-";
                        }
                        else{
                            echo result_numof_pass("연습"). "회" ;
                        }
                        
                        ?>

                    </td>
                    <td>    
                        <?php
                         if(result_numof_test("연습")==0)
                         {
                             echo "-";
                         }
                         else{
                            echo result_numof_test("연습"). "회";
                         }
                        ?>

                    </td>
                    <td>
                        <?php
                        if(result_numof_test("연습")==0)
                        {
                            echo "-";
                        }
                        else{
                            echo count_time("연습");
                        }
                        ?>
                    </td>      
                </tr>
                
                <tr id="rowdata8"> 
                    <td>&nbsp;</td>     
                    <td>시험</td>
                    <td>
                        <?php
                        if(result_numof_test("시험")==0)
                        {
                            echo "-";
                        }
                        else{
                            echo result_numof_pass("시험"). "회" ;
                        }
                        
                        ?>

                    </td>
                    <td>    
                        <?php
                         if(result_numof_test("시험")==0)
                         {
                             echo "-";
                         }
                         else{
                            echo result_numof_test("시험"). "회";
                         }
                        ?>

                    </td>
                    <td>
                        <?php
                        if(result_numof_test("시험")==0)
                        {
                            echo "-";
                        }
                        else{
                            echo count_time("시험");
                        }
                        ?>
                    </td>      
                </tr>

                <tr id="rowdata5"> 
                    <td>&nbsp;</td>     
                    <td>자율주행</td>
                    <td>
                        <?php
                        if(result_numof_test("자율주행")==0)
                        {
                            echo "-";
                        }
                        else{
                            echo result_numof_pass("자율주행"). "회" ;
                        }
                        
                        ?>

                    </td>
                    <td>    
                        <?php
                         if(result_numof_test("자율주행")==0)
                         {
                             echo "-";
                         }
                         else{
                            echo result_numof_test("자율주행"). "회";
                         }
                        ?>

                    </td>
                    <td>
                        <?php
                        if(result_numof_test("자율주행")==0)
                        {
                            echo "-";
                        }
                        else{
                            echo count_time("자율주행");
                        }
                        ?>
                    </td>      
                </tr>

                <tr id="rowdata6"> 
                    <td>&nbsp;</td>     
                    <td>자율작업</td>
                    <td>
                        <?php
                        if(result_numof_test("자율작업")==0)
                        {
                            echo "-";
                        }
                        else{
                            echo result_numof_pass("자율작업"). "회" ;
                        }
                        
                        ?>

                    </td>
                    <td>    
                        <?php
                         if(result_numof_test("자율작업")==0)
                         {
                             echo "-";
                         }
                         else{
                            echo result_numof_test("자율작업"). "회";
                         }
                        ?>

                    </td>
                    <td>
                        <?php
                        if(result_numof_test("자율작업")==0)
                        {
                            echo "-";
                        }
                        else{
                            echo count_time("자율작업");
                        }
                        ?>
                    </td>      
                </tr>

                

                
            <?php
            
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
