<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Students
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Students
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> Student Name: </th>
                                <th> Student Image: </th>
                                <th> Contact: </th>
                                <th> Email: </th>
                                <th> Facebook ID: </th>
                                <th> Registration Time: </th>
                                <th> College: </th>
                                <th> College ID Photo: </th>
                                <th> Address: </th>
                                <th> No of Exam Particitation</th>
                                <th> Delete: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                            
                                $get_users = "select * from users";
                                
                                $run_users = mysqli_query($con,$get_users);
          
                                while($row_users=mysqli_fetch_array($run_users)){
                                    
                                    $u_id = $row_users['u_id'];
                                    
                                    $u_name = $row_users['u_name'];
                                    
                                    $u_phn = $row_users['u_phn'];
                                    
                                    $u_email = $row_users['u_email'];
                                    
                                    $u_college = $row_users['u_college'];

                                    $u_id_img = $row_users['u_id_img'];
                                    
                                    $u_city = $row_users['u_city'];
                                    
                                    $u_image = $row_users['u_image'];

                                    $u_fb = $row_users['u_fb'];

                                    $reg_time = $row_users['reg_time'];
                                    
                                    


                                   $check="select * from reponse where u_id='$u_id'";
                                   $run_check=mysqli_query($con,$check);
                                   $num_check=mysqli_num_rows($run_check);
                                   if($num_check==0){
                                       $no="0";
                                   }
                                   else{

                                    $get_no_questions="select COUNT(DISTINCT exam_id) as No from reponse where u_id='$u_id' GROUP BY u_id";
                                     
                                    $run_get_questions=mysqli_query($con,$get_no_questions);

                                    if($row_questions=mysqli_fetch_array($run_get_questions))
                                    {
                                       $no=$row_questions['No'];
                                    }
                                }
                                    
                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $u_name; ?> </td>
                                <td> <img src="../users/images/<?php echo $u_image; ?>" width="60" height="60"></td>
                                <td> <?php echo $u_phn; ?> </td>
                                <td> <?php echo $u_email; ?> </td>
                                <td> <a href="<?php echo $u_fb; ?>"> FB Link </a></td>
                                <td> <?php echo $reg_time; ?> </td>
                                <td> <?php echo $u_college; ?></td>
                                <td> <img src="../users/images/<?php echo $u_id_img; ?>" width="60" height="60"></td>
                                <td> <?php echo $u_city; ?> </td>
                                <td> <?php echo"$no";?> </td>
                                <td> 
                                     
                                     <a href="index.php?delete_user=<?php echo $u_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
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