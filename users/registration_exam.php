<?php

include("includes/db.php");

?>



<?php 

if(isset($_GET['exam_id'],$_GET['u_id'])){
                  $exam_id=$_GET['exam_id'];
                  $u_id=$_GET['u_id'];

                  $check_reg="select * from reg_exam where u_id='$u_id' and exam_id='$exam_id'";
                  $run_check=mysqli_query($con,$check_reg) or die( mysqli_error($con));
                  $re_reg_number=mysqli_num_rows($run_check);

                  if($re_reg_number<1){


              
                  $get_exam="select * from exam where exam_id='$exam_id'";
                  $run_exam=mysqli_query($con,$get_exam)  or die( mysqli_error($con));
                  if($row_exam=mysqli_fetch_array($run_exam));
                  {
                    
                      $exam_finish=$row_exam['exam_finish'];
            
                      $exam_date=$row_exam['exam_date'];


                      date_default_timezone_set('Asia/Dhaka');

                        
                        $date = date('Y-m-d H:i:s');
                        $dateTimestamp_date = strtotime($date); 
                        $dateTimestamp_exam_date = strtotime($exam_date);
                      
                        if($dateTimestamp_date<$dateTimestamp_exam_date)
                        {
                            $insert_exam = "insert into reg_exam (exam_id,u_id,reg_time)
                            values ('$exam_id','$u_id','$date')";
                           
                           $run_exam = mysqli_query($con,$insert_exam);
                           
                           if($run_exam){
                               
                               echo "<script>alert('You have successfully Registered for the exam.')</script>";
                               echo "<script> window.history.back();</script>";
                           
                               
                           }
                           else{
                               echo "<script>alert('Exam Registration Failed.')</script>";
                               echo "<script> window.history.back();</script>";
                              }
                        }
                        
                        else
                       {
                         echo "<script>alert('This Exam Is Already Taken.Try Another One.')</script>";
                         echo "<script> window.history.back();</script>";
                       }

                        
                     

                    

                  }

              }
              else{
                echo "<script>alert('You have already registered for this exam.')</script>";
                 echo "<script> window.history.back();</script>";
              }
              

                         
}

?>



