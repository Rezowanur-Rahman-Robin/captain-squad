<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_question'])){
        
        $delete_q_id = $_GET['delete_question'];
        
        $delete_q = "delete from questions where q_id='$delete_q_id'";
        
        $run_delete = mysqli_query($con,$delete_q);
        
        if($run_delete){
            
            echo "<script>alert('One of Your Question Has Been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_questions','_self')</script>";
            
        }
        else{
             echo "<script>alert('Question Deletion Failed!')</script>";
            }
        
    }

?>




<?php } ?>