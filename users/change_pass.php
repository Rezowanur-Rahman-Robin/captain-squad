<h1 align="center"  style="color: #ffba65;"> Change Password </h1><hr>


<form action="" method="post" style="background-color: #b7b7fc;;padding: 20px;"><!-- form Begin -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Your Old Password: </label>
        
        <input type="text" name="old_pass" class="form-control" required>
        
    </div><!-- form-group Finish -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Your New Password: </label>
        
        <input type="text" name="new_pass" class="form-control" required>
        
    </div><!-- form-group Finish -->
    
    <div class="form-group"><!-- form-group Begin -->
        
        <label> Confirm Your New Password: </label>
        
        <input type="text" name="new_pass_again" class="form-control" required>
        
    </div><!-- form-group Finish -->
    
    <div class="text-center"><!-- text-center Begin -->
        
        <button type="submit" name="submit" class="btn btn-primary"><!-- btn btn-primary Begin -->
            
            <i class="fa fa-user-md"></i> Update Now
            
        </button><!-- btn btn-primary inish -->
        
    </div><!-- text-center Finish -->
    
</form><!-- form Finish -->


<?php 

if(isset($_POST['submit'])){
    
    $u_phn = $_SESSION['u_phn'];
    
    $u_old_pass = $_POST['old_pass'];
    
    $u_new_pass = $_POST['new_pass'];
    
    $u_new_pass_again = $_POST['new_pass_again'];
    
    $sel_u_old_pass = "select * from users where u_pass='$u_old_pass'";
    
    $run_u_old_pass = mysqli_query($con,$sel_u_old_pass);
    
    $check_u_old_pass = mysqli_fetch_array($run_u_old_pass);
    
    if($check_u_old_pass==0){
        
        echo "<script>alert('Sorry, your current password did not match. Please try again')</script>";
        
        exit();
        
    }
    
    if($u_new_pass!=$u_new_pass_again){
        
        echo "<script>alert('Sorry, your new password did not match')</script>";
        
        exit();
        
    }
    
    $update_u_pass = "update users set u_pass='$u_new_pass' where u_phn='$u_phn'";
    
    $run_u_pass = mysqli_query($con,$update_u_pass);
    
    if($run_u_pass){
        
        echo "<script>alert('Your password has been updated')</script>";
        
        echo "<script>window.open('main.php?change_pass','_self')</script>";
        
    }
    
}

?>