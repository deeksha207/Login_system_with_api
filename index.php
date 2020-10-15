<?php
session_start();
include('config.php');

$login='';
if(isset($_GET["code"])){
    $token=$google_Client->fetchAccessTokenWithAuthCode($_GET["code"]);
    if(!isset($token['error'])){
        $google_Client->setAccessToken($token['access_token']);
        $_SESSION['access_token']=$token['access_token'];
        $google_service=new Google_Service_Oauth2($google_Client);
        $data=$google_service->userinfo->get();
        if(!empty($data['given_name'])){
            $_SESSION['user_first_name']=$data['given_name'];
        }
        if(!empty($data['family_name'])){
            $_SESSION['user_last_name']=$data['family_name'];
        }
        if(!empty($data['email'])){
            $_SESSION['user_email']=$data['email'];
        }
        if(!empty($data['gender'])){
            $_SESSION['user_gender']=$data['gender'];
        }
        if(!empty($data['picture'])){
            $_SESSION['user_image']=$data['picture'];
        }
    }
}
if(!isset($_SESSION['access_token'])){
    $login='<a href="'.$google_Client->createAuthUrl().'" style:"padding:10px; color:white">Login with Google</a>';
}
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
                   if(!isset($login_f)){
                       header("location:home.html");
                   }
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