<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Questions
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Questions
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> Exam NO: </th>
                                <th> Exam Title: </th>
                                <th> Total Questions: </th>
                                <th> View All Questions: </th>
                                <th> Edit Questions: </th>
                                <th> Create Questions: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_exam = "select * from exam";
                                
                                $run_exam = mysqli_query($con,$get_exam);
          
                                while($row_exam=mysqli_fetch_array($run_exam)){
                                    
                                    $exam_id = $row_exam['exam_id'];
                                    
                                    $exam_title = $row_exam['exam_title'];
                                    
                                    $total_questions = $row_exam['total_questions'];
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $exam_title; ?> </td>
                                <td> <?php echo $total_questions; ?></td>
                                
                                <td> 
                                     
                                     <a href="index.php?view_exam_questions=<?php echo $exam_id; ?> " class="btn btn-warning">
                                     
                                     <i class="fa fa-fw fa-edit"></i> View Questions
                                    
                                     </a> 
                                     
                                </td>
                                <td> 
                                     
                                     <a href="index.php?edit_questions=<?php echo $exam_id; ?>" class="btn btn-info">
                                     
                                        <i class="fa fa-fw fa-edit"></i> Edit Questions
                                    
                                     </a> 
                                    
                                </td>
                                <td> 
                                     
                                     <a class="btn btn-success" href="index.php?create_questions=<?php echo $exam_id; ?>">
                                     
                                        <i class="fa fa-fw fa-edit"></i> Create Questions
                                    
                                     </a> 
                                    
                                </td>
                             
                            </tr><!-- tr finish -->
                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>