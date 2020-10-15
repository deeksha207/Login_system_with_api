<?php
session_start();
require_once 'vendor/autoload.php';
$google_Client=new Google_Client(); //making instance of google api or we can say making object of google api
$google_Client->setClientId('405497401858-h88m86cshp5lku3qppidqqtoeeg719p9.apps.googleusercontent.com');
$google_Client->setClientSecret('fLk3H57bU3zK931AYw7DMQcY');
$google_Client->setRedirectUri('http://localhost/task/index.php');

$google_Client->addScope('email');
$google_Client->addScope('profile');

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
