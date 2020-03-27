<?php
require_once("connection.php");
session_start();

if(isset($_POST['submit_btn'])){
   
    $image = addslashes(file_get_contents($_FILES['profile']['tmp_name']));

    
$query = "INSERT INTO userdata(gId,name,gender,pass,profilepic) VALUES ('null','".$_POST['name']."','".$_POST['gender']."','".$_POST['pass']."','$image')";    
    $result =mysqli_query($con,$query); 

    if($result){

        $sel =mysqli_query($con,"SELECT srno FROM userdata where name='".$_POST['name']."' and pass = '".$_POST['pass']."'");

        if($sel) {
            $row = mysqli_fetch_array($sel);
           
            $_SESSION['name']=$_POST["name"];
            $_SESSION['id']=$row["srno"];
            $_SESSION['gender']=$_POST['gender'];
            $_SESSION['user']="system";

            echo $_SESSION['user'];
           header("location:welcome.php");
           exit();
        }
    }
    else{
       echo "unable to execute the query"; 
    }

    
}


?>