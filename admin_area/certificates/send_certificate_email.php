<?php

if(isset($_GET['send_certificate_email'])){

    $e_id=$_GET['send_certificate_email'];

    $get_exam="select * from exam where exam_id='$e_id'";

    $run_exam=mysqli_query($con,$get_exam);

  if($row_exam=mysqli_fetch_array($run_exam)){

     $exam_id=$row_exam['exam_id'];

     $exam_title=$row_exam['exam_title'];

     $exam_title=$row_exam['exam_title'];

     $exam_marks=$row_exam['exam_marks'];
}

require 'smtp/PHPMailerAutoload.php';

$get_result = "select result.result_id,result.u_id,result.exam_id,result.total_marks,reponse.response_time from result INNER JOIN reponse ON result.u_id=reponse.u_id where result.exam_id='$exam_id' GROUP BY reponse.u_id order by result.total_marks DESC,reponse.response_time ASC";
                                
$run_result = mysqli_query($con,$get_result);

$p=0;$q=0;$i=0;


while($row_result=mysqli_fetch_array($run_result)){
    $i++;
    
    $result_id = $row_result['result_id'];
    
    $examination_id = $row_result['exam_id'];
    
    $u_id = $row_result['u_id'];

    $total_marks = $row_result['total_marks'];

    $get_user = "select * from users where u_id='$u_id'";

    $run_user = mysqli_query($con,$get_user);

    if($row_user=mysqli_fetch_array($run_user)){

        $u_name=$row_user['u_name'];

        $u_college=$row_user['u_college'];

        $u_email=$row_user['u_email'];
        
    }


    $font1 = dirname(__FILE__) . "/font/BRUSHSCI.ttf";
    $font2 = dirname(__FILE__) . "/font/AGENCYR.ttf";
	$image=imagecreatefromjpeg( dirname(__FILE__) . "/img/ce.jpg");
	$color=imagecolorallocate($image,19,21,22);
	$name=$u_name;
    imagettftext($image,30,0,350,355,$color,$font1,$name);
    
    $batch="2020";
    imagettftext($image,15,0,281,407,$color,$font1,$batch);
    

	$college=$u_college;
    imagettftext($image,20,0,400,405,$color,$font2,$college);

    
	$file=time();
	$file_path= dirname(__FILE__) . "/certificate/".$file.".jpg";
	$file_path_pdf= dirname(__FILE__) . "/certificate/".$file.".pdf";
	imagejpeg($image,$file_path);
    imagedestroy($image);
    


    require_once('pdf/fpdf.php');

    

	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->Image($file_path,0,0,210,150);
	$pdf->Output($file_path_pdf,"F");


    
   $subject="Participation Certificate For '$exam_title'";
   $body=  "<h1 align='center'>Dear $u_name,</h1>
   
   <h1 align='center'> Thank you so much for participating in $exam_title.</h1>
   <h2 align='center'> The certificate is attached with the email.</h2>
   <h1 align='center'> Wait for the next opportunity!</h1>";


   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 587; // or 465
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'tls';

   $mail->addAttachment($file_path_pdf);
 
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