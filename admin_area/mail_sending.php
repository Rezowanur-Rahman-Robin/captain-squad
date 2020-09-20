<?php

if(isset($_GET['mail_sending'])){

    $e_id=$_GET['mail_sending'];

    $get_exam="select * from reg_exam where exam_id='$e_id'";

    $run_exam=mysqli_query($con,$get_exam);



    require 'mail/PHPMailerAutoload.php';
    

    while($row_exam=mysqli_fetch_array($run_exam)){

        $u_id=$row_exam['u_id'];
        $exam_id=$row_exam['exam_id'];
        
        $get_p_exam="select * from exam where exam_id='$exam_id'";

        $run_p_exam=mysqli_query($con,$get_p_exam);

        if($row_p_exam=mysqli_fetch_array($run_p_exam)){
        $exam_title=$row_p_exam['exam_title'];
        $exam_date=$row_p_exam['exam_date'];
        $exam_date=date('h:i:s A d/m/Y', strtotime($exam_date)); 

        }
        
        

        
        $get_user = "select * from users where u_id='$u_id'";
                                
        $run_user = mysqli_query($con,$get_user);

        $p=0;
        $q=0;

        while($row_user=mysqli_fetch_array($run_user)){
           
             $u_id =$row_user['u_id'];
             $u_name =$row_user['u_name'];
             $u_email =$row_user['u_email'];


    
   $subject="Prepared for the Exam($exam_title)";
   $body=  "<h1 align='center'>Dear $u_name,</h1>
   <h1 align='center'> Thank you so much for getting yourself registered for $exam_title.</h1>
   
   <h2 align='center'> The exam will start at  $exam_date.So,get yourself prepared. </h2>
   <h1 align='center'> Do no miss the great opportunity!</h1>";


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