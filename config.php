<?php
session_start();
require_once "API/vendor/autoload.php";
$gClient = new Google_Client();
$gClient->setClientId("396294235577-7gp0sbf5hrhib4jqj7h1eke05h158hmg.apps.googleusercontent.com");
$gClient->setClientSecret("CXcvvoaw9L60ZkFmmPsb5OaM");
$gClient->setApplicationName("Login App");
$gClient->setRedirectUri("http://localhost/login/g-callback.php");
$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>