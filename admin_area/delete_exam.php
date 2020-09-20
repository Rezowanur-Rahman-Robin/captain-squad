<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_exam'])){
        
        $delete_exam_id = $_GET['delete_exam'];
        
        $delete_exam = "delete from exam where exam_id='$delete_exam_id'";
        
        $run_delete = mysqli_query($con,$delete_exam);
		
		$delete_question="delete from questions where exam_id='$delete_exam_id'";
		
		$run_delete_q=mysqli_query($con,$delete_question);
		
		$delete_reg_exam="delete from reg_exam where exam_id='$delete_exam_id'";
		
		$run_delete_reg=mysqli_query($con,$delete_reg_exam);
		
		$delete_reponse="delete from reponse where exam_id='$delete_exam_id'";
		
		$run_delete_reponse=mysqli_query($con,$delete_reponse);
		
		$delete_result="delete from result where exam_id='$delete_exam_id'";
		
		$run_delete_result=mysqli_query($con,$delete_result);
		
		
		
		
        
        
        if($run_delete){
            
            echo "<script>alert('One of Your Exam Has Been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_exams','_self')</script>";
            
        }
        else{
             echo "<script>alert('Exam Deletion Failed')</script>";
            }
        
    }

?>




<?php } ?>