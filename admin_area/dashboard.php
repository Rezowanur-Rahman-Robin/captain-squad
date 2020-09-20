<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        $get_exam = "select COUNT(exam_id) as exam_number from exam ";
                                
        $run_exam = mysqli_query($con,$get_exam);

        if($row_exam=mysqli_fetch_array($run_exam)){
            
            $exam_number = $row_exam['exam_number'];
          
        }

        $get_user = "select COUNT(u_id) as num_user from users";
                                
        $run_user = mysqli_query($con,$get_user);
              
        if($row_user=mysqli_fetch_array($run_user)){
                                        
        $num_user = $row_user['num_user'];
         }

         $get_response = "select COUNT(response_id) as num_reponse from reponse";
                                
        $run_response = mysqli_query($con,$get_response);
              
        if($row_response=mysqli_fetch_array($run_response)){
                                        
         $num_reponse = $row_response['num_reponse'];
         }

         
         


?> 

<div class="row"><!-- row no: 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <h1 class="page-header"> Dashboard </h1>
        
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
            
                <i class="fa fa-dashboard"></i> Dashboard
            
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
        
    </div><!-- col-lg-12 finish -->
</div><!-- row no: 1 finish -->

<div class="row"><!-- row no: 2 begin -->
   
    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-primary"><!-- panel panel-primary begin -->
            
            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                    <div class="col-xs-3"><!-- col-xs-3 begin -->
                       
                        <i class="fa fa-tasks fa-5x"></i>
                        
                    </div><!-- col-xs-3 finish -->
                    
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <div class="huge"> <?php  echo $exam_number; ?>  </div>
                           
                        <div> Total Exams </div>
                        
                    </div><!-- col-xs-9 text-right finish -->
                    
                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->
            
            <a href="index.php?view_exams"><!-- a href begin -->
                <div class="panel-footer"><!-- panel-footer begin -->
                   
                    <span class="pull-left"><!-- pull-left begin -->
                        View Details 
                    </span><!-- pull-left finish -->
                    
                    <span class="pull-right"><!-- pull-right begin --> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span><!-- pull-right finish --> 
                    
                    <div class="clearfix"></div>
                    
                </div><!-- panel-footer finish -->
            </a><!-- a href finish -->
            
        </div><!-- panel panel-primary finish -->
    </div><!-- col-lg-3 col-md-6 finish -->
   
    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-green"><!-- panel panel-green begin -->
            
            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                    <div class="col-xs-3"><!-- col-xs-3 begin -->
                       
                        <i class="fa fa-users fa-5x"></i>
                        
                    </div><!-- col-xs-3 finish -->
                    
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <div class="huge"><?php echo $num_user;  ?> </div>
                           
                        <div> Total Registered Students </div>
                        
                    </div><!-- col-xs-9 text-right finish -->
                    
                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->
            
            <a href="index.php?view_students"><!-- a href begin -->
                <div class="panel-footer"><!-- panel-footer begin -->
                   
                    <span class="pull-left"><!-- pull-left begin -->
                        View Details 
                    </span><!-- pull-left finish -->
                    
                    <span class="pull-right"><!-- pull-right begin --> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span><!-- pull-right finish --> 
                    
                    <div class="clearfix"></div>
                    
                </div><!-- panel-footer finish -->
            </a><!-- a href finish -->
            
        </div><!-- panel panel-green finish -->
    </div><!-- col-lg-3 col-md-6 finish -->
   
    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-orange"><!-- panel panel-yellow begin -->
            
            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                    <div class="col-xs-3"><!-- col-xs-3 begin -->
                       
                        <i class="fa fa-tags fa-5x"></i>
                        
                    </div><!-- col-xs-3 finish -->
                    
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <div class="huge"> <?php echo $num_reponse; ?> </div>
                           
                        <div>Total Response </div>
                        
                    </div><!-- col-xs-9 text-right finish -->
                    
                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->
            
            <a href="view_responses.php"><!-- a href begin -->
                <div class="panel-footer"><!-- panel-footer begin -->
                   
                    <span class="pull-left"><!-- pull-left begin -->
                        View Details 
                    </span><!-- pull-left finish -->
                    
                    <span class="pull-right"><!-- pull-right begin --> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span><!-- pull-right finish --> 
                    
                    <div class="clearfix"></div>
                    
                </div><!-- panel-footer finish -->
            </a><!-- a href finish -->
            
        </div><!-- panel panel-yellow finish -->
    </div><!-- col-lg-3 col-md-6 finish -->
   
    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-red"><!-- panel panel-red begin -->
            
            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                    <div class="col-xs-3"><!-- col-xs-3 begin -->
                       
                        <i class="fa fa-shopping-cart fa-5x"></i>
                        
                    </div><!-- col-xs-3 finish -->
                    
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <div class="huge">  </div>
                           
                        <div> Result Board</div>
                        
                    </div><!-- col-xs-9 text-right finish -->
                    
                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->
            
            <a href="index.php?view_results"><!-- a href begin -->
                <div class="panel-footer"><!-- panel-footer begin -->
                   
                    <span class="pull-left"><!-- pull-left begin -->
                        View Details 
                    </span><!-- pull-left finish -->
                    
                    <span class="pull-right"><!-- pull-right begin --> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span><!-- pull-right finish --> 
                    
                    <div class="clearfix"></div>
                    
                </div><!-- panel-footer finish -->
            </a><!-- a href finish -->
            
        </div><!-- panel panel-red finish -->
    </div><!-- col-lg-3 col-md-6 finish -->
    
</div><!-- row no: 2 finish -->

<div class="row"><!-- row no: 3 begin -->
    <div class="col-lg-12"><!-- col-lg-8 begin -->
        <div class="panel panel-primary"><!-- panel panel-primary begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                    
                    <i class="fa fa-money fa-fw"></i> New Responses
                    
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-hover table-striped table-bordered"><!-- table table-hover table-striped table-bordered begin -->
                        
                        <thead><!-- thead begin -->
                          
                            <tr><!-- th begin -->
                           
                                <th>  NO: </th>
                                <th> Student Name: </th>
                                <th> Exam Name: </th>
                                <th> Question Title: </th> 
                                <th> Given Answers: </th>
                                <th> Correct Answer: </th>
                                <th> Correct/Wrong: </th>
                                <th> Check Status: </th>
                            
                            </tr><!-- th finish -->
                            
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                          
                        <?php 
          
                                $i=0;
                            
                                $get_response = "select * from reponse order by 1 DESC LIMIT 0,5";
                                
                                $run_response = mysqli_query($con,$get_response);
          
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
                                <td> <?php echo $i; ?> </td>
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
                                     
                                     <a href="index.php?correct=<?php echo $response_id; ?>" class=" mr15 btn"  style="background-color:<?php echo $right_color; ?>;border-color:<?php echo $border_color_r; ?>;color:#fff">
                                     
                                     <i class="fas fa-check-square"></i> Correct
                                    
                                     </a> 
                                     <a href="index.php?wrong=<?php echo $response_id; ?> "  class=" btn "  style="background-color:<?php echo $wrong_color; ?>;border-color:<?php echo $border_color_w; ?>;color:#fff">
                                     
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
                        
                    </table><!-- table table-hover table-striped table-bordered finish -->
                </div><!-- table-responsive finish -->
                
                <div class="text-right"><!-- text-right begin -->
                    
                    <a href="view_responses.php"><!-- a href begin -->
                        
                        View All Responses <i class="fa fa-arrow-circle-right"></i>
                        
                    </a><!-- a href finish -->
                    
                </div><!-- text-right finish -->
                
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-primary finish -->
    </div><!-- col-lg-8 finish -->
    
    
</div><!-- row no: 3 finish -->


    <?php   }  ?>