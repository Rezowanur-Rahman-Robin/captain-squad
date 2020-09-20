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
    <title> Edit Questions </title>
   

</head>
<body>
    
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- active Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Questions
                
            </li><!-- active Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fa fa-money fa-fw"></i> Edit Questions
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                  
                   <?php  
                      
                      if(isset($_GET['edit_questions'])){

                        $e_id=$_GET['edit_questions'];

                        $get_exam="select * from exam where exam_id='$e_id'";

                        $run_exam=mysqli_query($con,$get_exam);

                        if($row_exam=mysqli_fetch_array($run_exam)){

                            $exam_id=$row_exam['exam_id'];

                            $exam_marks=$row_exam['exam_marks'];

                            $get_total_questions="select COUNT(q_id) as num from questions where exam_id='$exam_id'";
                            $run_total_questions=mysqli_query($con,$get_total_questions)  or die( mysqli_error($con));
                           
                            if($row_total_questions=mysqli_fetch_array($run_total_questions)){
        
                            $total_questions=$row_total_questions['num'];

                            }
                            

                        }
                    }

                    $get_questions="select * from questions where exam_id='$exam_id'";
                    $run_questions=mysqli_query($con,$get_questions)  or die( mysqli_error($con));

                    $i=1;

                    while($i<=$total_questions AND $row_questions=mysqli_fetch_array($run_questions))
                    {

                        $q_id=$row_questions['q_id'];

                        $q_title=$row_questions['q_title'];

                        $q_mark=$row_questions['q_mark'];

                        $q_ans=$row_questions['q_ans'];
 
                   
                   
                   ?>
                  
                   <h2 class="text-center">
                    
                    Question NO:<?php echo $i; ?>
                   
                   </h2>
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Question Title </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="q_title[<?php echo $i; ?>]" type="text" class="form-control" ><?php echo"$q_title"; ?></textarea>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Correct Answer </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input  name="q_ans[<?php echo $i; ?>]" type="text" class="form-control" value='<?php echo"$q_ans";?>'>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Mark </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="q_mark[<?php echo $i; ?>]" type="number" class="form-control" value='<?php echo"$q_mark";?>'>
                          <input name="q_id[<?php echo $i; ?>]" type="hidden"  value="<?php echo $q_id;?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->

                   <?php
                    $i++;
                } ?>
                 
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Update Questions" type="submit" class="btn btn-primary form-control">
                         
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

if(isset($_POST['update'])){
    
   
    $q_title=$_POST['q_title'];
    
    $q_title =str_replace("'","\'",$q_title);

    $q_ans=$_POST['q_ans'];
    
    $q_ans =str_replace("'","\'",$q_ans);

    $q_mark=$_POST['q_mark'];
                    
    $q_id=$_POST['q_id'];
    
    

    $i=1;
   while($i<=$total_questions ){
    $update_questions = "update questions set exam_id='$exam_id',q_title='$q_title[$i]',q_mark='$q_mark[$i]',q_ans='$q_ans[$i]' where q_id='$q_id[$i]'";
    $run_update_questions = mysqli_query($con,$update_questions);
    
    if($run_update_questions){
        
        echo "<script>alert('All the Questions Has Been Updated Sucessfully')</script>";
        echo "<script>window.open('index.php?view_questions','_self')</script>";
        
    }
    else{
        echo "<script>alert('Question Editing Failed!')</script>";
       }
     $i++;
    }

   

    
}

?>


<?php } ?>
