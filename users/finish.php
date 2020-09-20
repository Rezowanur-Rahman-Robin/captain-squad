<?php

session_start();

include("includes/db.php");

?>

<?php 
    


    if(!isset( $_SESSION['u_phn'])){

        
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

        
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Panel</title>
    <link rel="shortcut icon" type="image/jpg" href="../images/LOGO.jpg">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome/css/all.css">
    <link rel="stylesheet" href="styles/style.css">
</head>


<body>



<div class="container"> 
<div class="panel panel-default panel-primary">
                  <div class="panel-heading"><h2>You have successfully completed the exam.</h2></div>
                  <div class="panel-body">

                        
                  <h3 class="bdy">   Within 2 days you will get the result by logging in your account.
                       Although the result will be posted in our facebook event.Keep following us.
                        Those who get prizes, we will contact with them over phone. </h3> 


                  </div>
                  <div class="panel-footer" style="background-color: rgb(23, 162, 184) !important;text-align: center; color: #fff;">

                  <h2 >Thank You Very Much.</h2>
                  </div>
    </div>
</div>

 <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
</body>
</html>


<?php  } ?>