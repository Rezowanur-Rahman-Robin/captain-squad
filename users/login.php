<?php

session_start();
include("includes/db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-In</title>
    <link rel="shortcut icon" type="image/jpg" href="../images/f.jpg">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/fonts.css">
    <link rel="stylesheet" href="styles/login.css">
    <link rel="stylesheet" href="styles/style.css">
</head>


<body>

<div class="container"><!-- container begin -->
       <form action="login.php" class="form-login" method="post"><!-- form-login begin -->
           <h2 class="form-login-heading"> Student Login </h2>
           
           <input type="text" class="form-control" placeholder="Phone Number" name="u_phn" required>
           
           <input type="password" class="form-control" placeholder="Password" name="u_pass" required>
           
           <button type="submit" class="btn btn-lg btn-primary btn-block" name="u_login"><!-- btn btn-lg btn-primary btn-block begin -->
               
               Login
               
           </button><!-- btn btn-lg btn-primary btn-block finish -->
           
       </form><!-- form-login finish -->
   </div><!-- container finish -->

 <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
</body>
</html>


<?php 

if(isset($_POST['u_login'])){
    
    $u_phn = $_POST['u_phn'];
    
    $u_pass = $_POST['u_pass'];
     
    $get_user ="select * from users where u_phn='$u_phn' AND u_pass='$u_pass'";

    $run_user=mysqli_query($con,$get_user);

    $count=mysqli_num_rows($run_user);

    if($count==1){
            
        $_SESSION['u_phn']=$u_phn;
        
        echo "<script>alert('Logged in. Welcome Back')</script>";
        
        echo "<script>window.open('main.php?dashboard','_self')</script>";
        
    }else{
        
        echo "<script>alert('Email or Password is Wrong !')</script>";
        
    }
    
    

    
}

?>