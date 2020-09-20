<?php 
session_start();
include("includes/bangladb.php");
    
    if(!isset($_SESSION['u_phn'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Panel</title>
    <link rel="shortcut icon" type="image/jpg" href="../images/LOGO.jpg">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome/css/all.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
  
   
</head>
<body>

    <div id="wrapper"><!-- #wrapper begin -->
       
       <?php include("includes/sidebar.php"); ?>
       
        <div id="page-wrapper"><!-- #page-wrapper begin -->
            <div class="container-fluid"><!-- container-fluid begin -->
            
                <?php
                
                    if(isset($_GET['dashboard'])){
                        
                        include("dashboard.php");
      
                   }if(isset($_GET['view_exams'])){
                        
                    include("view_exams.php");
  
                   }if(isset($_GET['view_reg_exams'])){
                        
                    include("view_reg_exams.php");
  
                   }if(isset($_GET['view_profile'])){
                        
                    include("view_profile.php");
  
                   }if(isset($_GET['change_pass'])){
                        
                    include("change_pass.php");
  
                   }if(isset($_GET['view_result'])){
                        
                    include("view_result.php");
  
                   }if(isset($_GET['view_individual_result'])){
                        
                    include("view_individual_result.php");
  
                   }if(isset($_GET['contact'])){
                        
                    include("contact.php");
  
                   }
                   
                   
                   


                ?>
                
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>         
</body>
</html>


<?php   }  ?>


