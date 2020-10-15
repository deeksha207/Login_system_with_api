<?php
include('config.php');
//$google_Client->revokeToken();
session_destroy();
header('location:index.php');
?>