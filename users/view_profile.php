
<?php 
    
    if(!isset($_SESSION['u_phn'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
            $u_phone=$_SESSION['u_phn'];
    
            $select_user="select * from users where u_phn='$u_phone'";
    
            $run_user=mysqli_query($con,$select_user);
    
           if($row_user=mysqli_fetch_array($run_user))
           {
               $u_id=$row_user['u_id'];
               $u_name=$row_user['u_name'];
               $u_image=$row_user['u_image'];
               $u_phn=$row_user['u_phn'];
               $u_email=$row_user['u_email'];
               $u_college=$row_user['u_college'];
               $u_city=$row_user['u_city'];
               $reg_time=$row_user['reg_time'];
               
               
           }


?> 

<div class="profile-page">
   
                       
	        
	                            <img src="images/<?php echo $u_image; ?>" alt="Profile Image" class="pro-img img-responsive">
	                        
	          <div class="name">
	                            <h3 class="title"><?php echo $u_name; ?></h3>
								<h4 class="student">   Student   </h4>



                    <div class="description text-center">
                   <h3>College:</h3>
                   <h3 style="color:#08539f;font-weight: 500;">  <?php echo $u_college; ?> </h3><br> <br>
                   <h3>Contact:</h3>
                   <h3 style="color:#08539f;font-weight: 500;">   <?php echo $u_phn; ?> </h3><br> <br>
                   <h3>Email:</h3> 
                   <h3 style="color:#08539f;font-weight: 500;">  <?php echo $u_email; ?> </h3><br> <br>
                   <h3>Address:</h3>
                   <h3 style="color:#08539f;font-weight: 500;">  <?php echo $u_city; ?> </h3><br> <br>
                   <h3>Registration Time:</h3> 
                   <h3 style="color:#08539f;font-weight: 500;"> <?php echo $reg_time; ?> </h3>
                   
                   </div>
								
	          </div>
	                   
               
			
        
       
  
</div>


<?php   }  ?>
