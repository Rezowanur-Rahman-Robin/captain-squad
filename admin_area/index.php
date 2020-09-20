<?php 
session_start();
include("includes/bangladb.php");
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link rel="shortcut icon" type="image/jpg" href="../images/LOGO.jpg">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/fonts.css">
    <link rel="stylesheet" href="font-awesome/css/all.css">
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
      
                   }if(isset($_GET['insert_exam'])){
                        
                        include("insert_exam.php");
  
                   }if(isset($_GET['view_exams'])){
                        
                    include("view_exams.php");

                   }if(isset($_GET['delete_exam'])){
                        
                    include("delete_exam.php");

                   }if(isset($_GET['edit_exam'])){
                        
                    include("edit_exam.php");

                   }if(isset($_GET['create_questions'])){
                        
                    include("create_questions.php");

                   }if(isset($_GET['view_students'])){
                        
                    include("view_students.php");

                   }if(isset($_GET['delete_user'])){
                        
                    include("delete_user.php");

                   }if(isset($_GET['view_questions'])){
                        
                    include("view_questions.php");

                   }if(isset($_GET['view_exam_questions'])){
                        
                    include("view_exam_questions.php");

                   }if(isset($_GET['edit_questions'])){
                        
                    include("edit_questions.php");

                   }if(isset($_GET['delete_question'])){
                        
                    include("delete_question.php");

                   }if(isset($_GET['view_responses'])){
                        
                    include("view_responses.php");

                   }if(isset($_GET['view_responses.php'])){
                        
                    include("view_responses.php");

                   }if(isset($_GET['correct'])){
                        
                    include("correct.php");

                   }if(isset($_GET['wrong'])){
                        
                    include("wrong.php");

                   }if(isset($_GET['view_results'])){
                        
                    include("view_results.php");

                   }if(isset($_GET['view_individual_result'])){
                        
                    include("view_individual_result.php");

                   }if(isset($_GET['view_start'])){
                        
                    include("view_start.php");

                   }if(isset($_GET['hide_start'])){
                        
                    include("hide_start.php");

                   }if(isset($_GET['view_reg_students'])){
                        
                    include("view_reg_students.php");

                   }if(isset($_GET['send_mail'])){
                        
                    include("send_mail.php");

                   }if(isset($_GET['mail_sending'])){
                        
                    include("mail_sending.php");

                   }if(isset($_GET['send_result_email'])){
                        
                    include("send_result_email.php");

                   }if(isset($_GET['send_certificate_email'])){
                        
                    include("certificates/send_certificate_email.php");

                   }if(isset($_GET['generate_view_reg_students_pdf'])){
                        
                    include("generate_view_reg_students_pdf.php");

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


