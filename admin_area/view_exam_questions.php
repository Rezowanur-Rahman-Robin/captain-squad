

<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
?>

<?php 

if(isset($_GET['view_exam_questions'])){

                  $exam_id=$_GET['view_exam_questions'];

                  $get_exam="select * from exam where exam_id='$exam_id'";
                  $run_exam=mysqli_query($con,$get_exam)  or die( mysqli_error($con));
                  if($row_exam=mysqli_fetch_array($run_exam));
                  {
                    $exam_id=$row_exam['exam_id'];
                    $exam_title=$row_exam['exam_title'];
                   
                  }
                 
}             

?>





 <div class="container">
     <h1 class="titled text-center"><?php echo $exam_title ;?></h1><hr>

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
                        <div class='col-sm-7'>
                          <h2 class="question" style='display:inline-block;'><?php echo"$i"; ?>.</h2> <h2 class="question" style='display:inline-block;'><?php echo"$q_title"; ?></h2>
                       </div>
                        <div class='col-sm-3'>
                              <h3 class="question">Mark: <?php echo"$q_mark"; ?> </h3>
                        </div>
                        <div class='col-sm-2'>
                              <a href="index.php?delete_question=<?php echo "$q_id"; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                        </div>
                    </div>

                 </div>
                
           </div>
                       
       </div><!-- form-group Finish -->

       <?php } ?>
                   

                 
                   
               </form><!-- form-horizontal Finish -->

    
       
   

 </div>





<?php } ?>
