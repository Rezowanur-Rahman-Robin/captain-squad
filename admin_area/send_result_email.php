<?php

if(isset($_GET['send_result_email'])){

    $e_id=$_GET['send_result_email'];

    $get_exam="select * from exam where exam_id='$e_id'";

    $run_exam=mysqli_query($con,$get_exam);

  if($row_exam=mysqli_fetch_array($run_exam)){

     $exam_id=$row_exam['exam_id'];

     $exam_title=$row_exam['exam_title'];

     $exam_title=$row_exam['exam_title'];

     $exam_marks=$row_exam['exam_marks'];
}

require 'mail/PHPMailerAutoload.php';

$get_result = "select * from result where exam_id='$exam_id'";
                                
$run_result = mysqli_query($con,$get_result);

$p=0;$q=0;

while($row_result=mysqli_fetch_array($run_result)){
    
    $result_id = $row_result['result_id'];
    
    $examination_id = $row_result['exam_id'];
    
    $u_id = $row_result['u_id'];

    $total_marks = $row_result['total_marks'];

    $get_user = "select * from users where u_id='$u_id'";

    $run_user = mysqli_query($con,$get_user);

    if($row_user=mysqli_fetch_array($run_user)){

        $u_name=$row_user['u_name'];

        $u_college=$row_user['u_college'];

        $u_image=$row_user['u_image'];
        
        $u_phn=$row_user['u_phn'];

        $u_email=$row_user['u_email'];
        
    }


    
   $subject="Result Publish for the Exam($exam_title)";
   $body=  "<h1 align='center'>Dear $u_name,</h1>
   
   <h1 align='center'> Thank you so much for participating in $exam_title.</h1>
   <h2 align='center'> Result has been published.</h2>
   <h2 align='center'> Total Marks:  $exam_marks.</h2>
   <h2 align='center'> Your Marks:  $total_marks.</h2>
   <h1 align='center'> Wait for the next opportunity!</h1>";


   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 587; // or 465
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'tls';
 
   $mail ->Username = "captainsquad2000@gmail.com";
   $mail ->Password = "captainchamp2000gmail";

   $mail ->setFrom('captainsquad2000@gmail.com');
   $mail ->addAddress($u_email);
   $mail ->addReplyTo('captainsquad2000@gmail.com');


   $mail ->IsHTML(true);
   $mail ->Subject = $subject;
   $mail ->Body =$body;
  

   if(!$mail->send())
   {
       $q++;
   
   }
   else
   {
    $p++;
    
   }
          

        }

       
        
    
    if($p<$q){
        echo "<script>alert('Mail sending failed.')</script>";
        echo "<script> window.history.back();</script>";
    }
    else{
        echo "<script>alert('Mail has been sent.')</script>";
        echo "<script> window.history.back();</script>";
    }


}
?>