<?php
require_once 'vendor/autoload.php';
$fb=new Facebook\Facebook([
    'app_id'=>'674340979954155',
    'app_secret'=>'9f25c10951a8f3b69688ecbdfcbed065',
    'default_graph_version'=>'v2.10'
]);


$fb_output='';
$fb_helper=$fb->getRedirectLoginHelper();
if(isset($_GET['code'])){
    if(isset($_SESSION['access_Token'])){
        $access_Token=$_SESSION['access_Token'];
    }
    else{
        $access_Token=$fb_helper->getAccessToken();
        $_SESSION['access_Token']=$access_Token;
        $fb->setDefaultAccessToken($_SESSION['access_Token']);
    }
    $graph_take=$fb->get("/me?fields=name,email",$access_Token);
    $user_info=$graph_take->getGraphUser();
    if(!empty($user_info['id'])){
        $_SESSION['user_Image']='http://graph.facebook.com/'.$user_info['id'].'/picture';
    }
    if(!empty($user_info['name'])){
        $_SESSION['user_name']=$user_info['name'];
    }
    if(!empty($user_info['email'])){
        $_SESSION['user_mail']=$user_info['email'];
    }
}
else{
    $facebook_perm=['email'];
    $login_f=$fb_helper->getLoginUrl("http://localhost/task/",$facebook_perm);
    $login_f='<div align="center"><a href="'.$login_f.'" style="color:white; text-decoration:none">Login with facebook</a></div>';    
}

//print_r($login);
/*try{
    $token=$fb_helper->getAccessToken();
    if(isset($token)){
        $_SESSION['access_Token']=(string)$token;
        header("Location:index.php");
    }
}catch(Exception $e){
    echo $e->getTraceAsString();
}*/
?>