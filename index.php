<?php
include('config.php');
//include('fbconfig.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>LOGIN PAGE</title>
        <link rel="stylesheet"  type="text/css" href="design.css">
        
    </head>
    <body>
        <div class="back">
                   <?php
                   if($login==''){
                       header("location:home.html");
                   }
                 //if(!isset($login_f)){
                   //    header('location:home.html');
                   //}
                   else{
                       ?>
                        <h1>Login Here</h1>
                <form action="home.html" method="POST">
                    <p><b>REGISTERED ID</b></p><br>
                    <input type="text" name="user" placeholder="registered id" required><br><br>
                    <p></p><b>PASSWORD</b></p>  <br>
                    <input type="password" name="password" placeholder="PASSWORD" id="pass" required>
                    <table>
                    <tr>
                    
                    <input type="submit" class="use_me" name="login" value="Login"><br>
                        <?php
                        echo '<div align="center" style="background-color:white; margin-left:4px;  width:336px; border-radius:20px; color:black; padding:10px;" class="use">'.$login.'</div>';
                    
                    ?>
                    </div><br>
                    <div class="use" style="width:350px; text-align:center" >
                   <?php
                    echo '<div align="center" style="background-color:blue; color:white; margin-left:4px;  width:336px; border-radius:20px; padding:10px;" class="use">Login with facebook</div>';
                   }  
                    ?>                    
                    </div>
                </form>
        </div>
    </body>
</html>
