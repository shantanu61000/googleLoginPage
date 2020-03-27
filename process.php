<?php
//session_destroy();
require_once("connection.php");
session_start();
if($_SESSION['user']){
    header("location:welcome.php");
}

else{
    if(isset($_POST['login'])){
        echo "welcome";
         if(empty($_POST['uname']) || empty($_POST['password']))
         {
             header("location:index.php?empty=None of fields can be left blank");
         }
         else {
             $query = "select * from userdata where name = '".$_POST['uname']."' and pass = '".$_POST['password']."'";
             
             $result  = mysqli_query($con,$query); 
 
             echo "fields not empty";
 
             if($result){
                 $row = mysqli_fetch_row($result);
                 if($row[0]!=null){
                     printf("%s",$row[0]);
                     echo "result found";
                     $_SESSION['user']="system";
                     $_SESSION['name']=$row[2];
                     $_SESSION['id']=$row[0];
                     $_SESSION['gender']=$row[3];    
                     header("location:welcome.php");
                 }
                 else{
 
                     header("location:index.php?LoginFail=Invalid username or passowrd");
                 }
                
             }
 
             
 
         }
 
     }
 
     elseif(isset($_POST['register_btn'])){
         ?>
 <!DOCTYPE html>
 <html>
     <head>
         <title>REGISTER FORM</title>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
     
     </head>
     <body>
         <br><br><br>
         <div class="container">
 
         <div class="col-sm-4 m-auto card">
             <div class="card-header"><h3><strong>Register</strong></div>
             <div class="card-body">
                 <form action="insert.php" method="post" enctype="multipart/form-data">
                     <input type="text" name="name" placeholder="Name" class="form-control" required> <br>
                     <label>GENDER&nbsp&nbsp&nbsp&nbsp</label>
                         <input type="radio" name="gender"id="gen" value="male" required><label>MALE&nbsp
                         </label>
                         <input type="radio" name="gender" id="gen" value="female" required><label>FEMALE</label>
                         
                         <br>  
                     <input type="password" class="form-control" name="pass" placeholder="Password" required> <br>
                     
                     <label>Profile Picture</label><input type="file" name="profile" class="form-control" required> <br> <br>
 
                     <input type="submit" value="Submit" name="submit_btn" class="form-control btn btn-success"><br><br>
                     <input type="reset" value="Reset"  nmae="reset_btn" class="form-control btn btn-warning">
 
 
                             
                 </form>
             </div>
         </div>
         </div>
     </body>
 </html>
 
 <?php
 }
 
 else{
     echo "click on register button";
 }
}
    
?>