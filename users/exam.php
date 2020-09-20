<?php

session_start();
include("includes/bangladb.php");

?>



<?php 
    
    if(!isset($_SESSION['u_phn'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
?>

<?php 

if(isset($_GET['exam_id'],$_GET['u_id'])){

                  $exam_id=$_GET['exam_id'];
                  $u_id=$_GET['u_id'];



                  $get_exam="select * from exam where exam_id='$exam_id'";
                  $run_exam=mysqli_query($con,$get_exam)  or die( mysqli_error($con));
                  if($row_exam=mysqli_fetch_array($run_exam));
                  {
                    $exam_id=$row_exam['exam_id'];
                    $exam_finish=$row_exam['exam_finish'];
                    $total_questions=$row_exam['total_questions'];
                    $exam_date=$row_exam['exam_date'];
                  }
                 
}   



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Panel</title>
    <link rel="shortcut icon" type="image/jpg" href="../images/LOGO.jpg">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome/css/all.css">
    <link rel="stylesheet" href="styles/style.css">
  
</head>


<body>





   <div class="container">
   
       <div class="row">
       <p id="demo"></p>

  <script>
// Set the date we're counting down to
var countDownDate = new Date("<?php  echo $exam_finish; ?>").getTime();
var nw =new Date().getTime();
var dis=  countDownDate-nw;
if(dis<0){
  location.replace("finish.php");
}
function countDown() {
	
    // Get today's date and time
    var now = new Date().getTime();
    
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
      
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);


    if(hours==0 && days==0){
  document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s ";
  }
  else if(days==0)
  {
    document.getElementById("demo").innerHTML = hours + "h "
  + minutes + "m " + seconds + "s ";
  }
  else{
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
  }
	if(distance <=0 ) {
		clearTimeout(timer);
	  document.getElementById("demo").innerHTML = "Time Up!!!";
    document.getElementById("exam_finish").click();
	}
	var timer = setTimeout('countDown()',1000);
}
countDown();

//confirm box


</script>
           </div>
           </div>
       </div>

  </div>
       <hr> 

 <div class="container">

 <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
             

<?php

$get_questions="select * from questions where exam_id='$exam_id'";
$run_questions=mysqli_query($con,$get_questions)  or die( mysqli_error($con));
$i=0;
while($row_questions=mysqli_fetch_array($run_questions)){

            $q_id=$row_questions['q_id'];

            $q_title=$row_questions['q_title'];

            $q_mark=$row_questions['q_mark'];
            $i++;
           



?>



          <div class='form-group'><!-- form-group Begin -->
                       
            <div class='panel panel-default'>

     
                    <div class='panel-heading'>      
                      <div class='row'>
                        <div class='col-xs-9'>
                          <h2 style='display:inline-block;'><?php echo"$i"; ?>.</h2> <h2 style='display:inline-block;'><?php echo"$q_title"; ?></h2>
                       </div>
                        <div class='col-xs-3'>
                              <h3>Marks: <?php echo"$q_mark"; ?> </h3>
                        </div>
                    </div>

                 </div>
                 <div class='panel-body'>
                 <input name="ans[<?php echo $i; ?>]" type='text' class='form-control'  value=''>
                
                </div>
           </div>
                       
       </div><!-- form-group Finish -->

       <?php } ?>
                   

                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="finish" id="exam_finish" value="Finish" type="submit" class="btn btn-lg btn-primary form-control" style="margin-bottom: 20%;">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->

    
       
   

 </div>

 <?php 
   if(isset($_POST['finish'])){




    
    $ans=$_POST['ans'];
    date_default_timezone_set('Asia/Dhaka'); 
    $dateTime = date("h:i:sa");

    $check_resubmission="select * from reponse where u_id='$u_id' and exam_id='$exam_id'";
    $run_check=mysqli_query($con,$check_resubmission) or die( mysqli_error($con));
    $re_sub_number=mysqli_num_rows($run_check);


      if($re_sub_number+$total_questions<=$total_questions){

     

    $get_questions="select * from questions where exam_id='$exam_id'";
    $run_questions=mysqli_query($con,$get_questions)  or die( mysqli_error($con));

       

      $i=1;
      while($row_questions=mysqli_fetch_array($run_questions)){

        $question_id=$row_questions['q_id'];

      
    
       $insert_response="insert into reponse (u_id,exam_id,q_id,ans,response_time) values('$u_id','$exam_id','$question_id','$ans[$i]','$dateTime')";
       $run_insert=mysqli_query($con,$insert_response) or die( mysqli_error($con));
       if($run_insert){
           $i++;

           echo "<script>alert('Finish exam Successfully')</script>"; 
        
           echo "<script>window.open('finish.php','_self')</script>";
       } 
       else{
           $i++;
       }
    }
  }
  else{
    echo "<script>alert('You have already submitted your answers.')</script>"; 
        
    echo "<script>window.open('main.php?dashboard','_self')</script>";
  }

 
}
 
 
 
 
 ?>



 <script src="js/jquery-331.min.js"></script>
 
    <script src="js/bootstrap-337.min.js"></script>
    
</body>
</html>




<?php } ?>
