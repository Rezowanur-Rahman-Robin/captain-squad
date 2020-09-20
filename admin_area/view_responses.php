<?php 
session_start();
include("includes/bangladb.php");
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        $per_page=15; 
                         
        if(isset($_GET['page'])){

            $page = $_GET['page'];

        }else{

            $page=1;

        }

        $start_from = ($page-1) * $per_page;

        
        $get_response = "select * from reponse order by 1 DESC LIMIT $start_from,$per_page";
                                
        $run_response = mysqli_query($con,$get_response);
 


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
                

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Responses
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Responses
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th>  NO: </th>
                                <th> Student Name: </th>
                                <th> Exam Name: </th>
                                <th> Question Title: </th> 
                                <th> Given Answers: </th>
                                <th> Correct Answer: </th>
                                <th> Correct/Wrong: </th>
                                <th> Check Status: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->


                            
                            <?php 


                             
          
                                $i=0;
                            
          
                                while($row_response=mysqli_fetch_array($run_response)){
                                    
                                    $response_id = $row_response['response_id'];
                                    
                                    $u_id = $row_response['u_id'];
                                    
                                    $exam_id = $row_response['exam_id'];

                                    $q_id = $row_response['q_id'];
                                    
                                    $given_answer = $row_response['ans'];


                                    $get_user = "select * from users where u_id='$u_id'";
                                
                                    $run_user = mysqli_query($con,$get_user);
              
                                    if($row_user=mysqli_fetch_array($run_user)){
                                        
                                        $u_id = $row_user['u_id'];
                                        
                                        $u_name = $row_user['u_name'];
                                      
                                    }
                                    $get_exam = "select * from exam where exam_id='$exam_id'";
                                
                                    $run_exam = mysqli_query($con,$get_exam);
              
                                    if($row_exam=mysqli_fetch_array($run_exam)){
                                        
                                        $exam_id = $row_exam['exam_id'];
                                        
                                        $exam_title = $row_exam['exam_title'];
                                      
                                    }

                                    $get_question = "select * from questions where q_id='$q_id'";
                                
                                    $run_question = mysqli_query($con,$get_question);
              
                                    if($row_question=mysqli_fetch_array($run_question)){
                                        
                                        $q_id = $row_question['q_id'];
                                        
                                        $q_title = $row_question['q_title'];
                                        
                                        $correct_ans = $row_question['q_ans'];
                                      
                                    }
                                    
 
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo ($i+$per_page*($page-1)); ?> </td>
                                <td> <?php echo $u_name; ?> </td>
                                <td> <?php echo $exam_title; ?></td>
                                <td> <?php echo $q_title; ?> </td>
                                <td> <?php echo $given_answer; ?> </td>
                                <td> <?php echo $correct_ans ;?> </td>

                                
                                <td> 
                                <?php 
                                $get_res_c = "select * from reponse  where response_id='$response_id'";
                                
                                $run_res_c = mysqli_query($con,$get_res_c);
          
                                if($row_res_c=mysqli_fetch_array($run_res_c)){
                                    
                                    $right_click = $row_res_c['right_click'];
                                    $wrong_click = $row_res_c['wrong_click'];
                                    if($right_click=="yes")
                                    {
                                    $right_color="#005100";
                                    $border_color_r="#4cae4c";
                                    }
                                    else
                                    {
                                        $right_color="#5cb85c";
                                        $border_color_r="#4cae4c";
                                    }
                                    if($wrong_click=="yes"){

                                        $wrong_color="red";
                                        $border_color_w="#d43f3a";
                                    }
                                    else{
                                        $wrong_color="#d9534f";
                                        $border_color_w="#d43f3a";
                                    }
                                    
                                 
                                     
                                }
                                
                                ?> 
                                     
                                     <a href="index.php?correct=<?php echo $response_id; ?>&&page=<?php echo $page; ?>" class=" mr15 btn " style="background-color:<?php echo $right_color; ?>;border-color:<?php echo $border_color_r; ?>;color:#fff">
                                     
                                     <i class="fas fa-check-square"></i> Correct
                                    
                                     </a> 
                                     <a href="index.php?wrong=<?php echo $response_id; ?>&&page=<?php echo $page; ?> "  class=" btn  "  style="background-color:<?php echo $wrong_color; ?>;border-color:<?php echo $border_color_w; ?>;color:#fff">
                                     
                                     <i class="fas fa-times-circle"></i> Wrong
                                    
                                     </a> 
                                     
                                </td>
                                <td> 
                                <?php 
                                $get_res = "select * from reponse  where response_id='$response_id'";
                                
                                $run_res = mysqli_query($con,$get_res);
          
                                if($row_res=mysqli_fetch_array($run_res)){
                                    
                                    $check_answer = $row_res['check_answer'];
                                  
                     
                                 
                                     
                                }
                                
                                ?> 
                                
                                
                                        <i class="fa fa-edit"></i>
                                        
                                         <?php 
                                        
                                        if($check_answer==""){

                                            echo"Unchecked";

                                        }
                                        elseif($check_answer=="checked"){
                                            echo"Checked";
                                        }
                                        
                                        ?>
                                    
                                   
                                    
                                </td>
                               
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->



                <center>
               <ul class="pagination"><!-- pagination Begin -->
                 <?php
                         
                $query = "select * from reponse";
                         
                $result = mysqli_query($con,$query);
                         
                $total_records = mysqli_num_rows($result);
                         
                $total_pages = ceil($total_records / $per_page);
                         
                    echo "
                    
                        <li>
                        
                            <a href='view_responses.php?page=1'> ".'First Page'." </a>
                        
                        </li>
                    
                    ";
                         
                    for($i=1; $i<=$total_pages; $i++){

                        if($i==$page){
                        
                          echo "
                    
                        <li class='active'>
                        
                            <a href='view_responses.php?page=".$i."'> ".$i." </a>
                        
                        </li>
                    
                    ";  }
                    else{

                        echo "
                    
                        <li>
                        
                            <a href='view_responses.php?page=".$i."'> ".$i." </a>
                        
                        </li>
                    
                    ";  
                    }
                        
                    };
                    
                         
                    echo "
                    
                        <li>
                        
                            <a href='view_responses.php?page=$total_pages'> ".'Last Page'." </a>
                        
                        </li>
                    
                    ";
                   
                
                    
                 ?> 
                   
               </ul><!-- pagination Finish -->
           </center>
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
               
            </div><!-- container-fluid finish -->
        </div><!-- #page-wrapper finish -->
    </div><!-- wrapper finish -->
	

    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>         
</body>
</html>


<?php   }  ?>




