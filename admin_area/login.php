<?php

session_start();
include("includes/bangladb.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-In</title>
    <link rel="shortcut icon" type="image/jpg" href="../images/LOGO.jpg">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/fonts.css">
    <link rel="stylesheet" href="styles/login.css">
    <link rel="stylesheet" href="styles/style.css">
</head>


<body>

<div class="container"><!-- container begin -->
       <form action="login.php" class="form-login" method="post"><!-- form-login begin -->
           <h2 class="form-login-heading"> Admin Login </h2>
           
           <input type="text" class="form-control" placeholder="Email" name="a_email" required>
           
           <input type="password" class="form-control" placeholder="Password" name="a_pass" required>
           
           <button type="submit" class="btn btn-lg btn-primary btn-block" name="a_login"><!-- btn btn-lg btn-primary btn-block begin -->
               
               Login
               
           </button><!-- btn btn-lg btn-primary btn-block finish -->
           
       </form><!-- form-login finish -->
   </div><!-- container finish -->

 <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
</body>
</html>


<?php 

if(isset($_POST['a_login'])){
    
    $admin_email = $_POST['a_email'];
    
    $admin_pass = $_POST['a_pass'];
     
    $get_admin ="select * from admin where admin_email='$admin_email' AND admin_pass='$admin_pass'";

    $run_admin=mysqli_query($con,$get_admin);

    $count=mysqli_num_rows($run_admin);

    if($count==1){
            
        $_SESSION['admin_email']=$admin_email;
        
        echo "<script>alert('Logged in. Welcome Back')</script>";
        
        echo "<script>window.open('index.php?dashboard','_self')</script>";
        
    }else{
        
        echo "<script>alert('Email or Password is Wrong !')</script>";
        
    }
    
    

    
}

?>