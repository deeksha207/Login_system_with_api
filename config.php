<?php
//session_start();
require_once 'vendor/autoload.php';
$google_Client=new Google_Client(); //making instance of google api or we can say making object of google api
$google_Client->setClientId('405497401858-h88m86cshp5lku3qppidqqtoeeg719p9.apps.googleusercontent.com');
$google_Client->setClientSecret('fLk3H57bU3zK931AYw7DMQcY');
$google_Client->setRedirectUri('http://localhost/task/index.php');

$google_Client->addScope('email');
$google_Client->addScope('profile');




?>