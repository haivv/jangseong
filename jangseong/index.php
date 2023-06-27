<?php
session_start();
if(isset($_GET["logout"]))
{
   session_destroy();
}

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

    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    
    <script src="src/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="src/bootstrap.min.css">
    <link rel="stylesheet" href="src/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>


        function checkfile(){
                    if(document.getElementById('user').value=="") {
                        document.getElementById('usererr').innerHTML="등록되지 않은 ID입니다.";
                         return false;   
                    }
                    else{
                        document.getElementById('usererr').innerHTML="";    
                    }   
                    
                    if(document.getElementById('pass').value=="") {
                        document.getElementById('passerr').innerHTML="등록되지 않은 ID입니다.";
                        return false;
                    }
                    else{
                        document.getElementById('passerr').innerHTML="";   
                    }   

                document.flogin.submit();
                
            }

        document.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            // Execute your code here
            checkfile();
        }
        });
		
		 window.history.forward();
		function noBack()
		{
			window.history.forward();
		}

    </script>
    
</head>

<body style="background:#363F50;" onLoad="noBack();" onpageshow="if (event.persisted) noBack();">
    <div id="wrap">
        <div id="logo1">
            <img src="imgs/military-logo.png" alt="">
        </div>

        <div id="form-login">
            <form action="list.php" name="flogin" method="post" >
        
                <input type="text" name="user"  id="user" placeholder="ID를 입력해주세요."  >
                <span class="error" id ="usererr"> </span>
                <input type="password" name="pass" id="pass" placeholder="비밀번호를 입력해주세요."  >
                <span class="error" id ="passerr"> </span>
                <button type="button" id="send" class="btn btn-dark mt-3" onclick="checkfile()">로그인</button>

            </form>
        

        </div>
        <div id="logoSimg">
            <img src="imgs/logo.png" alt="" />
        </div>
    </div>
</body>
</html>
