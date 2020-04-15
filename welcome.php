<?php
require_once("connection.php");
ini_set('session.cookie_lifetime', 60 * 60 * 24 * 365);
ini_set('session.gc-maxlifetime', 60 * 60 * 24 * 365);
session_start();

if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
  
    


    if($_SESSION['user']=='google'){
        echo "<center><br><br><h1><strong>Welcome to main page </strong></h1><br>";
        echo "<strong><h3></h3> </strong> <img src='".$_SESSION['profilepic']."' height='100px' width='100px'><br><br>";
        echo "<h3>ID :".$_SESSION['id']."<br></h3>";
        echo "<h3>User :".$_SESSION['user']."</h3><br>";
        echo "<h3>NAME :".$_SESSION['name']."</h3><br>";
        echo "<h3>Gender :".$_SESSION['gender']."</h3><br>";
    }
    
    elseif($_SESSION['user']=='system'){

        $sel =mysqli_query($con,"SELECT profilepic FROM userdata where srno='".$_SESSION['id']."'");
        if($sel){
                $row=mysqli_fetch_array($sel);
                    echo "<center><br><br><h1><strong>Welcome to main page </strong></h1><br>";
                    echo" <img src= 'data:image;base64,".base64_encode($row['profilepic'])."' height='100px' width='100px'><br><br>";
                    echo "<h3>ID :".$_SESSION['id']."<br></h3>";
                    echo "<h3>User :".$_SESSION['user']."</h3><br>";
                    echo "<h3>NAME :".$_SESSION['name']."</h3><br>";
                    echo "<h3>Gender :".$_SESSION['gender']."</h3><br>";

                }

    }



?>
 <head>
        <title> Main Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
    </head>
    <a href="logout.php?logout"><button class="btn btn-danger">Logout</button>
</a>
<?php
    
}
else{
    header("location:index.php");
}

?>