<?php 
    
    if(!isset($_SESSION['u_phn'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>
<?php 

if(isset($_GET['view_individual_result'])){

                  $exam_id=$_GET['view_individual_result'];
                  $u_phone=$_SESSION['u_phn'];
    
            $select_user="select * from users where u_phn='$u_phone'";
    
            $run_user=mysqli_query($con,$select_user);
    
           if($row_user=mysqli_fetch_array($run_user))
           {
               $u_id=$row_user['u_id'];
               $u_name=$row_user['u_name'];
           }



                  $get_exam="select * from exam where exam_id='$exam_id'";
                  $run_exam=mysqli_query($con,$get_exam)  or die( mysqli_error($con));
                  if($row_exam=mysqli_fetch_array($run_exam));
                  {
                    $exam_id=$row_exam['exam_id'];
                    $exam_title=$row_exam['exam_title'];
                    $exam_finish=$row_exam['exam_finish'];
                    $total_questions=$row_exam['total_questions'];
                    $exam_date=$row_exam['exam_date'];
                    $exam_marks=$row_exam['exam_marks'];
                  }



                  $get_result = "select * from result where exam_id='$exam_id' AND u_id='$u_id'";
                                
                  $run_result = mysqli_query($con,$get_result);

                  if($row_result=mysqli_fetch_array($run_result)){
                     
                      $total_marks = $row_result['total_marks'];

                  }
                  else{
                    $total_marks ='Not Published!';
                  }


                 
}   

?>

     <?php
     
     
     ?>                          
		    <h3 style="font-size: 30px;text-align: center;color: #00fff3;font-weight: 700;"><?php echo $u_name; ?></h3><hr>			



                    <div class="description text-center">

                   <h3>Exam Name:</h3>
                   <h3 style="color:#08539f;font-weight: 500;">  <?php echo $exam_title; ?> </h3><br> 
                   <h3>Exam Date:</h3>
                   <h3 style="color:#08539f;font-weight: 500;">   <?php echo $exam_date; ?> </h3><br> 
                   <h3>Total Questions:</h3> 
                   <h3 style="color:#08539f;font-weight: 500;">  <?php echo $total_questions; ?> </h3><br> 
                   <h3>Total Marks:</h3>
                   <h3 style="color:#08539f;font-weight: 500;">  <?php echo $exam_marks; ?> </h3><br> 
                   <h3>Your Marks:</h3> 
                   <h3 style="color:#08539f;font-weight: 500;"> <?php echo $total_marks; ?> </h3>
                   
                  </div>

<?php } ?>