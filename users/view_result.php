
<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / View Results
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-tags fa-fw"></i> View Results
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
            
                <?php 
                       $u_phone=$_SESSION['u_phn'];
    
                       $select_user="select * from users where u_phn='$u_phone'";
               
                       $run_user=mysqli_query($con,$select_user);
               
                      if($row_user=mysqli_fetch_array($run_user))
                      {
                          $u_id=$row_user['u_id'];
                          $u_name=$row_user['u_name'];
                          $u_image=$row_user['u_image'];
                      }

                    $get_reg_exam="select * from reg_exam where u_id=$u_id";
                    $run_reg_exam=mysqli_query($con,$get_reg_exam);
                    while($row_reg_exam=mysqli_fetch_array($run_reg_exam)){
                     $ex_id=$row_reg_exam['exam_id'];
                
                    $get_exams="select * from exam where exam_id=$ex_id";
        
                    $run_exams = mysqli_query($con,$get_exams);
        
                    while($row_exams=mysqli_fetch_array($run_exams)){
                        
                        $exam_id = $row_exams['exam_id'];
                        
                        $exam_title = $row_exams['exam_title'];

                        $exam_date = $row_exams['exam_date']; 
                        
                ?>
                
                <div class="col-lg-3 col-md-3"><!-- col-lg-3 col-md-3 begin -->
                    <div class="panel panel-primary"><!-- panel panel-primary begin -->
                        <div class="panel-heading"><!-- panel-heading begin -->
                            <h2 class="panel-title" align="center"><!-- panel-title begin -->
                            
                                <?php echo $exam_title; ?>
                                
                            </h2><!-- panel-title finish -->
                        </div><!-- panel-heading finish -->
                        
                        <div class="panel-body"><!-- panel-body begin -->
                            
                            <h4 class="text-center">Exam Time: <?php echo $exam_date;  ?></h4>
                            
                        </div><!-- panel-body finish -->
                        
                        <div class="panel-footer"><!-- panel-footer begin -->
                            <center><!-- center begin -->
                                
                                <a href="main.php?view_individual_result=<?php echo $exam_id; ?>" class="w-100"><!-- pull-right begin -->
                                
                                 <i class="fa fa-fw fa-book"></i> View_result
                                
                                </a><!-- pull-right finish -->
                        
                                <div class="clearfix"></div>
                                
                            </center><!-- center finish -->
                        </div><!-- panel-footer finish -->
                        
                    </div><!-- panel panel-primary finish -->
                </div><!-- col-lg-3 col-md-3 finish -->
                
                <?php } } ?>
            
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->


