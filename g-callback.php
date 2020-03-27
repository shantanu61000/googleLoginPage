<?php
require_once("config.php");
require_once("connection.php");

if(isset($_SESSION['access_token'])){
    $gClient->setAccessToken($_SESSION['access_token']);
}

else if(isset($_GET['code'])){
    $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token']=$token;
}
else {
    header("location:index.php");
    exit();
}

$oAuth = new Google_Service_Oauth2($gClient);
$userData = $oAuth->userinfo_v2_me->get();

echo "pre";
var_dump($userData);
$_SESSION['name']=$userData["name"];
$_SESSION['id']=$userData["id"];
$_SESSION['gender']=$userData['gender'];
$_SESSION['user']="google";
$_SESSION['profilepic']=$userData['picture'];

$selectQuery="select * from userdata where gid='".$userData['id']."'";

$selRes = mysqli_query($con,$selectQuery);


if($ans = mysqli_fetch_array($selRes)){
    header("location:welcome.php");
    exit();
}
else{

    $insertQuery="insert into userdata(gid,name,gender,pass,profilepic) values ('".$_SESSION['id']."','".$_SESSION['name']."','".$_SESSION['gender']."','null','".$_SESSION['profilepic']."')";
    mysqli_query($con,$insertQuery);
    header("location:welcome.php");
    exit();

}



  




?>