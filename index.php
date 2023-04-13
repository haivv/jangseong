<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    
    <script src="src/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="src/bootstrap.min.css">
    <link rel="stylesheet" href="src/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        function checkfile(){

                    if(document.getElementById('user').value==""||document.getElementById('user').value!="admin") {
                        document.getElementById('usererr').innerHTML="등록되지 않은 ID입니다.";
                         return false;
                       
                    }
                    else{
                        
                        document.getElementById('usererr').innerHTML="";    
                    }   
                    if(document.getElementById('pass').value==""||document.getElementById('pass').value!="123") {
                        document.getElementById('passerr').innerHTML="등록되지 않은 ID입니다.";
                        return false;
                    }
                    else{
                        
                        document.getElementById('passerr').innerHTML=""    
                    }   

                document.flogin.submit();
                
            }
    </script>
    
</head>

<body style="background:#363F50;">
    <div id="wrap">
        <div id="logo1">
            <img src="imgs/military-logo.png" alt="">
        </div>

        <div id="form-login">
            <form action="list.php" name="flogin" method="post" >
        
                <input type="text" name="user"  id="user" placeholder="유저을 작성하세요"  >
                <span class="error" id ="usererr"> </span>
                <input type="password" name="pass" id="pass" placeholder="비밀을 작성하세요"  >
                <span class="error" id ="passerr"> </span>
                <button type="button" id="send" class="btn btn-dark mt-3" onclick="checkfile();">로그인</button>

            </form>
        

        </div>
        <div id="logoSimg">
            <img src="imgs/logo.png" alt="">
        </div>
    </div>
</body>
</html>