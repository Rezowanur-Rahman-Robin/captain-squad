<?php

session_start();
include("includes/db.php");

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
                    
                      $exam_finish=$row_exam['exam_finish'];
            
                      $exam_date=$row_exam['exam_date'];


                      date_default_timezone_set('Asia/Dhaka');

                        
                        $date = date('Y-m-d H:i:s');
                        $dateTimestamp_date = strtotime($date); 
                        $dateTimestamp_exam_date = strtotime($exam_date);
                        $dateTimestamp_exam_finish = strtotime($exam_finish);
                        if($dateTimestamp_date>=$dateTimestamp_exam_date AND $dateTimestamp_date <=$dateTimestamp_exam_finish){
                  
                            $type="block";
                            
                  
                        }
                        else{
                         
                            $type="none";
                          
                       
                        }
        

                       
                        
                     

                    

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
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="TimeCircles/TimeCircles.js"></script>
    <link rel="stylesheet" type="text/css" href="TimeCircles/TimeCircles.css">
</head>


<body >
<div class="timer" >
<div data-date="<?php echo $exam_date;?>" id="count-down" style="color: #fff;text-align: center;"></div>
</div>


<div class="started"></div>




<div id="start-bg" style="width:40%; margin:0 auto">
      

     
     
       <a href="exam.php?u_id=<?php echo"$u_id";?>&&exam_id=<?php echo"$exam_id";?>" class="btn btn-primary btn-lg center-block start-exam" id="#demo" style="display:<?php echo $type ?>">Start Now</a>
   


 </div>


    <script src="js/bootstrap-337.min.js"></script>

    
</body>
</html>
<script>
    var i=0;
    $(function () {
        $("#count-down").TimeCircles();
        $("#count-down").TimeCircles({ time: {
        Days: { color: "#ea00ea;" },
        Hours: { color: "#00ead4" },
        Minutes: { color: "#ff9303" },
        Seconds: { color: "#ff03d4" }
    }});

        $("#count-down").TimeCircles({count_past_zero: false}).addListener(countdownComplete);
	
    function countdownComplete(unit, value, total){
        if(total<=0){
            $(this).fadeOut('slow').replaceWith("Exam Has Started!!!!");
            window.location.replace("exam.php?u_id=<?php echo"$u_id";?>&&exam_id=<?php echo"$exam_id";?>");
          
           
        }
    }
   
    });
</script>

<script>
        

        var now = new Date().getTime();

       if(now><?php echo"$exam_date";?>){
            window.location.replace("exam.php?u_id=<?php echo"$u_id";?>&&exam_id=<?php echo"$exam_id";?>");
        }


</script>

<?php } ?>


