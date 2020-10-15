<?php
include("config.php");
$google_Client->revokeToken($_SESSION['access_token']);
session_destroy();
header('Location:index.php');
?>
