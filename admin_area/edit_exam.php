<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_exam'])){
        
        $edit_exam_id = $_GET['edit_exam'];
        
        $edit_examinations = "select * from exam where exam_id='$edit_exam_id'";
        
        $run_edit = mysqli_query($con,$edit_examinations);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $exam_id = $row_edit['exam_id'];
                                    
        $exam_title = $row_edit['exam_title'];
		
        
        $total_questions = $row_edit['total_questions'];

        $exam_marks = $row_edit['exam_marks'];
        
        $start_time = $row_edit['exam_date'];
        
        $end_time = $row_edit['exam_finish'];
        
    }

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Edit Exam
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-pencil fa-fw"></i> Edit Exam
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                             Exam Title 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value=" <?php echo $exam_title; ?> " name="exam_title" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Total Questions
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                         <input value='<?php echo "$total_questions"; ?>'  name="total_questions" type="number" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->


                    <div class="form-group"><!-- form-group begin -->
                    
                    <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                    
                        Total Marks
                    
                    </label><!-- control-label col-md-3 finish --> 
                    
                    <div class="col-md-6"><!-- col-md-6 begin -->
                    
                    <input value='<?php echo "$exam_marks"; ?>' name="exam_marks" type="number" class="form-control">
                    
                    </div><!-- col-md-6 finish -->
                
                </div><!-- form-group finish -->


                <div class="form-group"><!-- form-group begin -->
                    
                    <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                    
                        Start Time
                    
                    </label><!-- control-label col-md-3 finish --> 
                    
                    <div class="col-md-6"><!-- col-md-6 begin -->
                    
                    <input value="<?php echo $start_time; ?>" name="start_time" type="datetime-local" class="form-control" >                    </div><!-- col-md-6 finish -->
                
                </div><!-- form-group finish -->

                <div class="form-group"><!-- form-group begin -->
                    
                    <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                    
                        End Time
                    
                    </label><!-- control-label col-md-3 finish --> 
                    
                    <div class="col-md-6"><!-- col-md-6 begin -->
                    
                    <input value="<?php echo $end_time; ?>" name="end_time" type="datetime-local" class="form-control" >                    </div><!-- col-md-6 finish -->
                
                </div><!-- form-group finish -->

                    <div class="form-group"><!-- form-group begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                             
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input value="Update" name="update" type="submit" class="form-control btn btn-primary">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  

          if(isset($_POST['update'])){
              
              $exam_title = $_POST['exam_title'];
			  
			  
	         $exam_title =str_replace("'","\'",$exam_title);
              
              $total_questions = $_POST['total_questions'];
              
              $exam_marks = $_POST['exam_marks'];

              $start_time = $_POST['start_time'];

              $end_time = $_POST['end_time'];


              $update_exam = "update exam set exam_title='$exam_title',total_questions='$total_questions',exam_marks='$exam_marks',exam_date='$start_time',exam_finish='$end_time' where exam_id='$exam_id'";
              
              $run_exam = mysqli_query($con,$update_exam);
              
              if($run_exam){
                  
                  echo "<script>alert('Your Exam Has Been Updated')</script>";
                  
                  echo "<script>window.open('index.php?view_exams','_self')</script>";
                  
              }
              else{
                echo "<script>alert('Exam Updating Failed!')</script>";
               }
              
          }

?>



<?php } ?> 