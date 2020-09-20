<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Create Questions </title>
   

</head>
<body>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Create Questions
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Create Questions
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                  
                   <?php  
                      
                      if(isset($_GET['create_questions'])){

                        $e_id=$_GET['create_questions'];

                        $get_exam="select * from exam where exam_id='$e_id'";

                        $run_exam=mysqli_query($con,$get_exam);

                        if($row_exam=mysqli_fetch_array($run_exam)){

                            $exam_id=$row_exam['exam_id'];

                            $exam_marks=$row_exam['exam_marks'];

                            $total_questions=$row_exam['total_questions'];

                        }
                    }

                    $i=1;

                    while($i<=$total_questions)
                    {

                   
                   
                   ?>
                  
                   <h2 class="text-center">
                    
                    Question NO:<?php echo $i; ?>
                   
                   </h2>
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Question Title </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="q_title[<?php echo $i; ?>]" type="text" class="form-control" required></textarea>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Correct Answer </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input  name="q_ans[<?php echo $i; ?>]" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Mark </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="q_mark[<?php echo $i; ?>]" type="number" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <?php
                    $i++;
                } ?>
                 
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="submit" value="Submit Questions" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
   
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>


<?php 

if(isset($_POST['submit'])){
    
    $q_title=$_POST['q_title'];

    $q_title =str_replace("'","\'",$q_title);

    $q_ans=$_POST['q_ans'];

    $q_mark=$_POST['q_mark'];
                    
     $get_already_created_no="select COUNT(q_id) as NO from questions where exam_id='$exam_id'";

      $run_already=mysqli_query($con,$get_already_created_no);

      if($row_already=mysqli_fetch_array($run_already)){

          $number=$row_already['NO'];
      }


 

  

    if($number<$total_questions){
 
   



    $i=1;
   while($i<=$total_questions ){
    $insert_questions = "insert into questions (exam_id,q_title,q_mark,q_ans)
     values ('$exam_id','$q_title[$i]','$q_mark[$i]','$q_ans[$i]')";
    
    $run_questions = mysqli_query($con,$insert_questions);
    
    if($run_questions){
        
        echo "<script>alert('All the Questions Has Been Created Sucessfully')</script>";
        echo "<script>window.open('index.php?view_exams','_self')</script>";
        
    }
    else{
        echo "<script>alert('Question Insertion Failed!')</script>";
       }
     $i++;
    }

}     
else{
    echo "<script>alert('You have exided the question limit!Please increase the total question number and try again.')</script>";
    echo "<script>window.open('index.php?view_questions','_self')</script>";
}

    
}

?>


<?php } ?>
