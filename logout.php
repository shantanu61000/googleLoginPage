<?php
session_start();
if(isset($_SESSION['user']) ||isset($_SESSION['access_token']) ){
    if(isset($_GET['logout'])){
        session_destroy();
        header("location:index.php");
    }  
    else{
        echo "cannot logout";
    }  
}

else{
    header("location:index.php");
}

?>