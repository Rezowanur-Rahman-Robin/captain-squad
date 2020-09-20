<?php

$font1 = dirname(__FILE__) . "/font/BRUSHSCI.ttf";
$font2 = dirname(__FILE__) . "/font/AGENCYR.ttf";
	$image=imagecreatefromjpeg("certificate.jpg");
	$color=imagecolorallocate($image,19,21,22);
	$name="Vishal Gupta";
	imagettftext($image,50,0,365,420,$color,$font1,$name);
	$date="6th may 2020";
	imagettftext($image,20,0,450,595,$color,$font2,$date);
	$file=time();
	$file_path="certificate/".$file.".jpg";
	$file_path_pdf="certificate/".$file.".pdf";
	imagejpeg($image,$file_path);
	imagedestroy($image);

	require('fpdf.php');
	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->Image($file_path,0,0,210,150);
	$pdf->Output($file_path_pdf,"F");

	include('smtp/PHPMailerAutoload.php');
    
   $subject="Result Publish for the Exam(Captain's of math)";
   $body=  "<h1 align='center'>Dear Robin,</h1>
   
   <h1 align='center'> Thank you so much for participating in Captain's of math</h1>
   <h2 align='center'> The certificate is attached with the email.</h2>
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
   $mail ->addAddress('robincuetcse@gmail.com');
   $mail ->addReplyTo('captainsquad2000@gmail.com');


   $mail ->IsHTML(true);
   $mail ->Subject = $subject;
   $mail ->Body =$body;
	$mail->addAttachment($file_path_pdf);
	$mail->SMTPOptions=array("ssl"=>array(
		"verify_peer"=>false,
		"verify_peer_name"=>false,
		"allow_self_signed"=>false,
	));
	if($mail->send()){
        echo "<script>alert('Mail has been sent.')</script>";
	}else{
        echo "<script>alert('Mail sending failed.')</script>";
	}

?>
