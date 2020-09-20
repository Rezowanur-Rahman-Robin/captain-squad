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
           $u_email=$row_user['u_email'];
           
       }


?>
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                 
                   <li>
                       Contact Us
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
          
           <div class="col-md-12"><!-- col-md-9 Begin -->
               
               <div class="box"><!-- box Begin -->
                   
                   <div class="box-header"><!-- box-header Begin -->
                       
                       <center><!-- center Begin -->
                           
                           <h2 style="color: #ffba65;"> Feel free to Contact Us</h2>
                           
                           <p class="text-muted" style="    color: #c8c8ff;"><!-- text-muted Begin -->
                               
                               If you have any questions, feel free to contact us. <strong>We will try to reply you as fast as we can.</strong>
                               
                           </p><!-- text-muted Finish --><hr>
                           
                       </center><!-- center Finish -->
                       
                       <form action="" method="post" style="background-color: #75ffe3;padding: 20px;"><!-- form Begin -->
                           
                    
	                            <h3 class="title"  style="text-align:center;">Admins</h3>
							



                    <div class="description text-center">
                   <h3>Nazmul Hasan Nahid:</h3>
                   <h3 style="color:#08539f;font-weight: 500;">  01764272430 </h3><br>
                   <h3>Mohammad Iqbal Hossain :</h3>
                   <h3 style="color:#08539f;font-weight: 500;"> 01616516395  </h3><br>
                   <h3>Tashriful Huda Toushi:</h3> 
                   <h3 style="color:#08539f;font-weight: 500;"> 01924724673</h3><br>
                   <h3>Md Rimon Azad :</h3>
                   <h3 style="color:#08539f;font-weight: 500;"> 01643174068</h3><br> 
                 
                   </div>


                           <h3 class="title"  style="text-align:center;">Social Contact</h3>
							



                            <div class="description text-center">
                          
                           <h3>Facebook Page Link :</h3> 
                           <a href="https://www.facebook.com/CaptainsSquad2020"><h3 style="color:#08539f;font-weight: 900;">  Captains' Squade</h3></a>
                           
                           </div>
                          

                           <h3 class="title"  style="text-align:center;">Email Contact</h3>
							



                            <div class="description text-center">
                          
                           <h3>Our Email :</h3> 
                          <h3 style="color:#08539f;font-weight: 500;"> captainsquad2000@gmail.com </h3>
                           
                           </div>
                           
                       </form><!-- form Finish -->
                       
           
                       
                   </div><!-- box-header Finish -->
                   
               </div><!-- box Finish -->
               
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
 
    
   
<?php } ?>