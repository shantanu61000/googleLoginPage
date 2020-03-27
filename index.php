<?php
require_once("config.php");
if(isset($_SESSION['access_token']) || isset($_SESSION['user'])){
    header("location:welcome.php");
    exit();
}
else{
    $loginurl = $gClient->createAuthUrl();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Login Form</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>    
    </head>

    <body>

<br>
<br>
<br>
     <div class="container">
         <div class="row">
             <div class="col-sm-6 m-auto"><h1 class="text-center"> <strong>LOGIN PAGE</strong> </h1></div>
              
         </div>
         <br>
        
         <div class="row">
             <div class="col-sm-4 m-auto">
                 <form action="process.php" method="POST">
                    <?php  
                    if(@$_GET['empty']==true){
                    ?>
                    
                        <div class="alert-light text-danger text-center">
                            <br>
                            <?php echo $_GET['empty']?>
                        </div>

                    <?php
                    }
                    ?>

                    <?php
                    if(@$_GET['LoginFail']==true)
                    {
                    ?>
                        <div class="alert-light text-danger text-center">
                            <br>
                            <?php echo $_GET['LoginFail']?>
                        </div>


                    <?php
                    }
                    ?>
                    
                    <input type="text" placeholder="Username" name="uname" class="form-control"> <br>
                    <input type="password" placeholder="Password" name="password" class="form-control"> <br><br>
                    <div class="row">
                        <div class="col-sm-12 m-auto">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="submit" value="Login" name="login" class="btn btn-primary form-control">
                                </div>
                                <div class="col-sm-6">
                                    <input type="button" name="gLogin" value="Google Login" class="btn btn-danger form-control" onclick="window.location='<?php echo $loginurl?>';">
                                </div>
                            </div>

                        </div>
                    </div><br>
                    <input type="submit" name="register_btn" class="form-control btn btn-success" value="Register" onclick="window.location='register.php?register'">
                </form>

             </div>
         </div>
            
     </div>   
    </body>
</html>