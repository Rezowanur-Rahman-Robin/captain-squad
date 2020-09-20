<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Results
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
        
    </div><!-- col-lg-12 finish -->
   
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Results
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
  
            
            <div class="panel-body"><!-- panel-body begin -->

                 <?php  
                    if(isset($_GET['view_individual_result'])){

                     $e_id=$_GET['view_individual_result'];

                     $get_exam="select * from exam where exam_id='$e_id'";

                     $run_exam=mysqli_query($con,$get_exam);

                   if($row_exam=mysqli_fetch_array($run_exam)){

                      $exam_id=$row_exam['exam_id'];

                      $exam_title=$row_exam['exam_title'];

                      $exam_title=$row_exam['exam_title'];

                      $exam_marks=$row_exam['exam_marks'];


                    }
                 }

                ?>
                <div class="row">
               <div class="col-md-7">
                 
                 <div class="h3 text-center"><?php echo $exam_title; ?></div>
                 </div>
                <div class="col-md-2">
                <a class="btn btn-info"  href="index.php?send_result_email=<?php echo $exam_id; ?>">Send Result By Mail</a>
                </div>
                
                <div class="col-md-3">
                <a class="btn btn-success"  href="index.php?send_certificate_email=<?php echo $exam_id; ?>">Send Certificates By Mail</a>
                </div>
                </div><hr>
               
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> NO: </th>
                                <th> Participant Picture: </th>
                                <th> Participant Name: </th>
                                <th> Participant College: </th>
                                <th> Participant Contact: </th>
                                <th> Participant Marks: </th>
                                <th> Total Marks: </th>
							 <th> Submission Time: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_result = "select result.result_id,result.u_id,result.exam_id,result.total_marks,reponse.response_time from result INNER JOIN reponse ON result.u_id=reponse.u_id where result.exam_id='$exam_id' GROUP BY reponse.u_id order by result.total_marks DESC,reponse.response_time ASC ";
                                
                                $run_result = mysqli_query($con,$get_result);
          
                                while($row_result=mysqli_fetch_array($run_result)){
                                    
                                    $result_id = $row_result['result_id'];
                                    
                                    $examination_id = $row_result['exam_id'];
                                    
                                    $u_id = $row_result['u_id'];

                                    $total_marks = $row_result['total_marks'];
									
								   $res_time=$row_result['response_time'];

                                    $get_user = "select * from users where u_id='$u_id'";
                                
                                    $run_user = mysqli_query($con,$get_user);

                                    if($row_user=mysqli_fetch_array($run_user)){

                                        $u_name=$row_user['u_name'];

                                        $u_college=$row_user['u_college'];

                                        $u_image=$row_user['u_image'];
                                        
                                        $u_phn=$row_user['u_phn'];
                                        
                                    }
                                     $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <img  src="../users/images/<?php echo $u_image; ?>" alt="<?php echo $u_name; ?> "width="90" height="90"> </td>
                                <td> <?php echo $u_name; ?></td>
                                <td> <?php echo $u_college; ?></td>
                                <td> <?php echo $u_phn; ?></td>
                                <td> <?php echo $total_marks; ?></td>
                                <td> <?php echo $exam_marks; ?></td>
							<td> <?php echo $res_time; ?></td>
                                
                               
                             
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