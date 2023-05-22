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
    <style>
        input[type="text"]{
            height: 40px;
        }
        input[type="date"]{
            height: 40px;
        }
        

    </style>
    
    <script type="text/javascript" > 
          
            function checkrow1(){
                var count = 0;
                for(var q=1;q<6;q++){

                    if(document.getElementById('str'+q).value=="") {
                        document.getElementById('str'+q+'err').innerHTML="필수";
                        count++;
                    }
                    else{
                        document.getElementById('str'+q+'err').innerHTML="";
                    } 
    
                }

                var str11 = document.getElementById('str1').value;
                var firstStr11 = str11.slice(0, 2);

                var str12 = document.getElementById('str3').value;
                var firstStr12 = str12.slice(2, 4);
                
                var str13 = document.getElementById('str4').value;
                var firstStr13 = str13.slice(0, 2);

                if((firstStr11 != firstStr12 )||(firstStr11 != firstStr13 ))
                {
                    alert("1행에서  기수와 입소일이 군번과 일치하지 않습니다!");
                    document.fadd.num1.focus();
                    return false;
                }
                else if(count>0){
                    return false;
                }
                else{
                    return true;
                }

            }
            //row 2
            function checkrow2()
            {
                var str21 = document.getElementById('str6').value;    
                var str22 = document.getElementById('str7').value;
                var str23 = document.getElementById('str8').value;  
                var str24 = document.getElementById('str9').value;
                var str25 = document.getElementById('str10').value;
              

                var firstStr21 = str21.slice(0, 2);
                var firstStr23 = str23.slice(2, 4);
                var firstStr24 = str24.slice(0, 2);
                var count = 0;
                for(var q=6 ; q<11 ; q++){
                    if(document.getElementById('str'+q).value=="")
                    {
                        count ++;
                    }

                }
              
                if(count != 5){
                    
                    var dem = 0;
                    for(var q=6 ; q<11 ;q ++){
                     
                        if(document.getElementById('str'+q).value=="") {
                            document.getElementById('str'+q+'err').innerHTML="필수";   
                            dem++;                         
                        }
                        else{
                            document.getElementById('str'+q+'err').innerHTML="";                
                        } 
                    }
                    
                    if((firstStr21 != firstStr23 )||(firstStr21 != firstStr24 ))
                    {
                        alert("2행에서 기수와 입소일이 군번과 일치하지 않습니다!");  
                        return false;
                    }
                    else if (dem>0){
                        return false;
                    }
                    else{
                        return true;
                    }                     
                } //end if(count != 5){
                else{
                    
                    for(var q=5;q<11;q++){
                        document.getElementById('str'+q+'err').innerHTML="";
                        return true;
                    }
                }   
            }


            //row 3
            function checkrow3()
            {
                var str31 = document.getElementById('str11').value;    
                var str32 = document.getElementById('str12').value;
                var str33 = document.getElementById('str13').value;  
                var str34 = document.getElementById('str14').value;
                var str35 = document.getElementById('str15').value;
              

                var firstStr31 = str31.slice(0, 2);
                var firstStr33 = str33.slice(2, 4);
                var firstStr34 = str34.slice(0, 2);
                var count = 0;
                for(var q=11 ; q<16 ; q++){
                    if(document.getElementById('str'+q).value=="")
                    {
                        count ++;
                    }

                }
              
                if(count != 5){
                    
                    var dem = 0;
                    for(var q=11 ; q<16 ;q ++){
                     
                        if(document.getElementById('str'+q).value=="") {
                            document.getElementById('str'+q+'err').innerHTML="필수";   
                            dem++;                         
                        }
                        else{
                            document.getElementById('str'+q+'err').innerHTML="";                
                        } 
                    }
                    
                    if((firstStr31 != firstStr33 )||(firstStr31 != firstStr34 ))
                    {
                        alert("3행에서 기수와 입소일이 군번과 일치하지 않습니다!");  
                        return false;
                    }
                    else if (dem>0){
                        return false;
                    }
                    else{
                        return true;
                    }                     
                } //end if(count != 5){
                else{
                    
                    for(var q=11;q<16;q++){
                        document.getElementById('str'+q+'err').innerHTML="";
                        return true;
                    }
                }   
            }

             //row 4
             function checkrow4()
            {
                var str41 = document.getElementById('str16').value;    
                var str42 = document.getElementById('str17').value;
                var str43 = document.getElementById('str18').value;  
                var str44 = document.getElementById('str19').value;
                var str45 = document.getElementById('str20').value;
              

                var firstStr41 = str41.slice(0, 2);
                var firstStr43 = str43.slice(2, 4);
                var firstStr44 = str44.slice(0, 2);
                var count = 0;
                for(var q=16 ; q<21 ; q++){
                    if(document.getElementById('str'+q).value=="")
                    {
                        count ++;
                    }

                }
              
                if(count != 5){
                    
                    var dem = 0;
                    for(var q=16 ; q<21 ;q ++){
                     
                        if(document.getElementById('str'+q).value=="") {
                            document.getElementById('str'+q+'err').innerHTML="필수";   
                            dem++;                         
                        }
                        else{
                            document.getElementById('str'+q+'err').innerHTML="";                
                        } 
                    }
                    
                    if((firstStr41 != firstStr43 )||(firstStr41 != firstStr44 ))
                    {
                        alert("4행에서 기수와 입소일이 군번과 일치하지 않습니다!");  
                        return false;
                    }
                    else if (dem>0){
                        return false;
                    }
                    else{
                        return true;
                    }                     
                } //end if(count != 5){
                else{
                    
                    for(var q=16;q<21;q++){
                        document.getElementById('str'+q+'err').innerHTML="";
                        return true;
                    }
                }   
            }

            //row 5
            function checkrow5()
            {
                var str51 = document.getElementById('str21').value;    
                var str52 = document.getElementById('str22').value;
                var str53 = document.getElementById('str23').value;  
                var str54 = document.getElementById('str24').value;
                var str55 = document.getElementById('str25').value;
              

                var firstStr51 = str51.slice(0, 2);
                var firstStr53 = str53.slice(2, 4);
                var firstStr54 = str54.slice(0, 2);
                var count = 0;
                for(var q=21 ; q<26 ; q++){
                    if(document.getElementById('str'+q).value=="")
                    {
                        count ++;
                    }

                }
              
                if(count != 5){
                    var dem = 0;
                    for(var q=21 ; q<26 ;q ++){
                        if(document.getElementById('str'+q).value=="") {
                            document.getElementById('str'+q+'err').innerHTML="필수";   
                            dem++;                         
                        }
                        else{
                            document.getElementById('str'+q+'err').innerHTML="";                
                        } 
                    }
                    
                    if((firstStr51 != firstStr53 ) || (firstStr51 != firstStr54 ))
                    {
                        alert("5행에서 기수와 입소일이 군번과 일치하지 않습니다!");  
                        return false;
                    }
                    else if (dem>0){
                        return false;
                    }
                    else{
                        return true;
                    }                     
                } //end if(count != 5){
                else{
                    
                    for(var q=21;q<26;q++){
                        document.getElementById('str'+q+'err').innerHTML="";
                        return true;
                    }
                }   
            }

            




            //row 6
            function checkrow6()
            {
                var str61 = document.getElementById('str26').value;    
                var str62 = document.getElementById('str27').value;
                var str63 = document.getElementById('str28').value;  
                var str64 = document.getElementById('str29').value;
                var str65 = document.getElementById('str30').value;

                var firstStr61 = str61.slice(0, 2);
                var firstStr63 = str63.slice(2, 4);
                var firstStr64 = str64.slice(0, 2);
                var count = 0;
                for(var q=26 ; q<31 ; q++){
                    if(document.getElementById('str'+q).value=="")
                    {
                        count ++;
                    }

                }
            
                if(count != 5){
                    var count = 0;
                    for(var q=26;q<31;q++){
                        if(document.getElementById('str'+q).value=="") {
                            document.getElementById('str'+q+'err').innerHTML="필수";   
                            count++;                         
                        }
                        else{
                            document.getElementById('str'+q+'err').innerHTML="";                
                        } 
                    }
                    
                    if((firstStr61 != firstStr63 )||(firstStr61 != firstStr64 ))
                    {
                        alert("6행에서 기수와 입소일이 군번과 일치하지 않습니다!");  
                        return false;
                    }
                    else if (count>0){
                        return false;
                    }
                    else{
                        return true;
                    }                     
                } //end if(count != 5){
                else{
                    
                    for(var q=26;q<31;q++){
                        document.getElementById('str'+q+'err').innerHTML="";
                        return true;
                    }
                }   
            }
           
		
            function checkall(){
               // alert(checkrow2());
                if((checkrow1()==true) && (checkrow2()==true) && (checkrow3()==true) && (checkrow4()==true) && (checkrow5()==true) &&(checkrow6()==true)){
                   document.fadd.submit();
                 }

             
                
            }
    </script>
    

</head>

<body>
    <div class="container">
        <div id="top">
            <h2>회원 등록</h2>
            <div id="top-right">
                <div class="btnlogout">
                    
                    <a id="home" href="list.php">
                        <img src="imgs/home.png">
                    </a>
                    <a id="logtext" href="logout.php" >로그아웃</a>
                </div>
            </div>
        </div>
    </div>
    
    <form action="proadd.php" method="post" name="fadd" >
    <div class="container" >
        <div id="listaction">
            <div id="add-right">
                <a  href="list.php" type="button" class="btn btn-warning" >취소</a>
                <button  type="button" class="btn btn-success" onclick="checkall();">회원 등록 </button>
                <a type="hidden" href="import.php" class="btn btn-primary">불러오기</a>
            </div>
        </div>
    </div>

        
    <div class="container ">
        <div id="main">
        <table class="table mt-3">
                    <thead class="table-dark">
                    <tr>
                        <th>&nbsp;</th>
                        <th>기수</th>
                        <th >클래스</th>
                        <th >입소일</th>
                        <th >군번</th>
                        <th>이름</th>
                        <th >&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <input type="hidden" id="numofmem" value="<?php  ?>">
                    
                    <!-- add 1 -->
                    <tr>
                        <td>&nbsp;</td>
                        <td><input  type="text" name="num1" id="str1"> <span class="error" id ="str1err"> </span></td>
                        <td><input  type="text" name="class1" id="str2"> <span class="error" id ="str2err"> </span></td>
                        <td><input  type="date" name="date1" id="str3"> <span class="error" id ="str3err"> </span></td>
                        <td><input  type="text" name="memID1" id="str4"> <span class="error" id ="str4err"> </span></td>
                        <td><input  type="text" name="name1" id="str5"> <span class="error" id ="str5err"></span></td>
                        <td >&nbsp;</td>
                    </tr>

                    <!-- add 2 -->
                    <tr>
                        <td>&nbsp;</td>
                        <td><input  type="text" name="num2" id="str6"> <span class="error" id ="str6err"> </span></td>
                        <td><input  type="text" name="class2" id="str7"> <span class="error" id ="str7err"> </span></td>
                        <td><input  type="date" name="date2" id="str8"> <span class="error" id ="str8err"> </span></td>
                        <td><input  type="text" name="memID2" id="str9"> <span class="error" id ="str9err"> </span></td>
                        <td><input  type="text" name="name2" id="str10"> <span class="error" id ="str10err"></span></td>
                        <td >&nbsp;</td>
                    </tr>

                    <!-- add 3 -->
                    <tr>
                        <td>&nbsp;</td>
                        <td><input  type="text" name="num3" id="str11"> <span class="error" id ="str11err"> </span></td>
                        <td><input  type="text" name="class3" id="str12"> <span class="error" id ="str12err"> </span></td>
                        <td><input  type="date" name="date3" id="str13"> <span class="error" id ="str13err"> </span></td>
                        <td><input  type="text" name="memID3" id="str14"> <span class="error" id ="str14err"> </span></td>
                        <td><input  type="text" name="name3" id="str15"> <span class="error" id ="str15err"></span></td>
                        <td >&nbsp;</td>
                    </tr>

                    <!-- add 4 -->
                    <tr>
                        <td>&nbsp;</td>
                        <td><input  type="text" name="num4" id="str16"> <span class="error" id ="str16err"> </span></td>
                        <td><input  type="text" name="class4" id="str17"> <span class="error" id ="str17err"> </span></td>
                        <td><input  type="date" name="date4" id="str18"> <span class="error" id ="str18err"> </span></td>
                        <td><input  type="text" name="memID4" id="str19"> <span class="error" id ="str19err"> </span></td>
                        <td><input  type="text" name="name4" id="str20"> <span class="error" id ="str20err"></span></td>
                        <td >&nbsp;</td>
                    </tr>

                    <!-- add 5 -->
                    <tr>
                        <td>&nbsp;</td>
                        <td><input  type="text" name="num5" id="str21"> <span class="error" id ="str21err"> </span></td>
                        <td><input  type="text" name="class5" id="str22"> <span class="error" id ="str22err"> </span></td>
                        <td><input  type="date" name="date5" id="str23"> <span class="error" id ="str23err"> </span></td>
                        <td><input  type="text" name="memID5" id="str24"> <span class="error" id ="str24err"> </span></td>
                        <td><input  type="text" name="name5" id="str25"> <span class="error" id ="str25err"></span></td>
                        <td >&nbsp;</td>
                    </tr>

                    <!-- add 6 -->
                    <tr>
                        <td>&nbsp;</td>
                        <td><input  type="text" name="num6" id="str26"> <span class="error" id ="str26err"> </span></td>
                        <td><input  type="text" name="class6" id="str27"> <span class="error" id ="str27err"> </span></td>
                        <td><input  type="date" name="date6" id="str28"> <span class="error" id ="str28err"> </span></td>
                        <td><input  type="text" name="memID6" id="str29"> <span class="error" id ="str29err"> </span></td>
                        <td><input  type="text" name="name6" id="str30"> <span class="error" id ="str30err"></span></td>
                        <td >&nbsp;</td>
                    </tr>
                
                
                    </tbody>
                    
                </table>

        </div>
    </div>

    </form>

            
        
       
        
    
            
   


</body>
</html>
<?php
}
?>
