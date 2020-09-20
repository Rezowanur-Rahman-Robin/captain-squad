<?php


session_start();


include("includes/db.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captains' Squad</title>
    <link rel="shortcut icon" type="image/jpg" href="images/LOGO.jpg">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/fonts.css">
    <link rel="stylesheet" href="font-awesome/css/all.css">
    <link rel="stylesheet" href="styles/style.css">
 
 
</head>


<body>
<div class="all">
 <div class="bg">
  


 <div class="row">
     <div class="col-md-10">
         <h1 class="float-left colony-heading">
         Captains' Squad
         </h1>
     </div>

 </div>

 <div class="row body-box">
     <div class="col-md-6" id="einstein">
        <img src="images/tutor-help-or-solve-physics-problems.jpg" alt="Albert Einstain" class=" img-responsive Albert">
        <p class="quotes">
        "Imagination is more important than knowledge. 
        Knowledge is limited. 
        Imagination encircles the world."

        </p>
     
    </div>
     <div class="col-md-6 reg-box">
     <div class="box"><!-- box Begin -->
                   
                   <div class="box-header"><!-- box-header Begin -->
                       
                       <center><!-- center Begin -->
                           
                           <h2 class="reg"> Create a new account </h2>
                           
                       </center><!-- center Finish -->
                       
                       <form action="index.php" method="post" enctype="multipart/form-data"><!-- form Begin -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Name</label>
                               
                               <input type="text" class="form-control" name="u_name" required>
                               
                           </div><!-- form-group Finish -->
                           

                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Phone Number</label>
                               
                               <input type="number" class="form-control" name="u_phn" required>
                               
                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Email</label>
                               
                               <input type="email" class="form-control" name="u_email" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Password</label>
                               
                               <input type="password" class="form-control" name="u_pass" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your College Name</label>
                               
                               <input type="text" class="form-control" name="u_college">
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your College ID Card Picture</label>
                               
                               <input type="file" class="form-control form-height-custom" name="u_id_image" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Address</label>
                               
                               <input type="text" class="form-control" name="u_city">
                               
                           </div><!-- form-group Finish -->
                        
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Profile Picture</label>
                               
                               <input type="file" class="form-control form-height-custom" name="u_image" required>
                               
                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Facebook ID Link(<i>Optional</i>)</label>
                               
                               <input type="url" class="form-control" name="u_fb">
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="text-center sin-reg"><!-- text-center Begin -->
                               
                               <button type="submit" name="register" class="btn btn-primary">
                               
                               <i class="fa fa-user-md"></i> Create
                               
                               </button>
                                <a href="users/login.php" class="btn btn-primary" style="    margin-right: 10%;width: 30%;">
                               
                                    <i class="fa fa-user-md"></i> Sign In 
                               
                               </a>
                               
                           </div><!-- text-center Finish -->
                          
                           
                       </form><!-- form Finish -->
                       
                   </div><!-- box-header Finish -->
                   
               </div><!-- box Finish -->
     </div>
 </div>






 </div>

</div>


 <footer>
 
 <!--Footer start-->

  <!-- Button to Open the Modal -->
  <div class="color-footer">
  <div class="container">
  <div class="row">
      <div class="col-sm-3">
  <button type="button" style="width: 100%;background-color: #fc6300;border-color: #fc6300;margin-bottom: 2%; margin-top: 2%;" class="btn btn-primary" data-toggle="modal" data-target="#myModal-1">
   About Us
  </button>
  </div>
  <div class="col-sm-3">
  <button type="button" style="width: 100%;background-color: #fc6300;border-color: #fc6300;margin-bottom: 2%; margin-top: 2%;" class="btn btn-primary" data-toggle="modal" data-target="#myModal-2">
   About Developer
  </button>
  </div>
  <div class="col-sm-3">
  <button type="button" style="width: 100%;background-color: #fc6300;border-color: #fc6300;margin-bottom: 2%; margin-top: 2%;" class="btn btn-primary" data-toggle="modal" data-target="#myModal-3">
    About Admins
  </button>
  </div>
  <div class="col-sm-3">
  <button type="button" style="width: 100%;background-color: #fc6300;border-color: #fc6300;margin-bottom: 2%; margin-top: 2%;" class="btn btn-primary" data-toggle="modal" data-target="#myModal-4">
    Contacts
  </button>
  </div>
  </div>
  </div>
  </div>


  <!-- The Modal -->
  <div class="modal" id="myModal-1">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">About Us</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        Hi, Students!<hr>
       How do you all doing?
       This is an online Olympiad to all of our beloved  College level students where an exam will be taken. This exam is totally free of cost exam and organized by Captains' Squad to relate you with some basic and tricky question so that you can judge yourself how much you are prepared.Moreover in this quarantine days this experience will also help HSC candidates to familiarise with admission type question and also 2nd and 1st year students can also take this as a chance to compte with their seniors. No need to fear because there will given some basic questions so that you can enrich your knowledge. Most importantly winner one will be Awarded.<br><br>

       So, what are you waiting for? Register now.<br>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">

        <button type="button" class="btn btn-success" data-dismiss="modal">Register</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  

  <div class="modal fade" id="myModal-2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" style="font-family:'typo' "><span style="color:orange">Developer</span></h4>
      </div>
	  
      <div class="modal-body">
        <p>
		<div class="row">
		<div class="col-md-4">
		 <img src="users/images/IMG20180210181157 (2).jpg" width=100 height=100 alt="Rezowanur Rahman Robin" class="img-rounded">
		 </div>
		 <div class="col-md-5">
		<a href="http://facebook.com/akaskh.rahmanrobin" style="color:#202020; font-family:'typo' ; font-size:18px" title="Find on Facebook">Rezowanur Rahman Robin</a>
		<h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">01795371964</h4>
		<h4 style="font-family:'typo' ">robincuetcse@gmail.com</h4>
    <h4 style="font-family:'typo' ">Department Of CSE</h4>
        <h4 style="font-family:'typo' ">Chittagong University of Engineering And Technology(CUET)</h4></div></div>
        <h4><a href="http://www.robin.rtgblog.com">Visit My Portfolio Site.</a></h4>
		</p>
      </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


  <!-- The Modal -->
  <div class="modal" id="myModal-3">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">About Admins</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <div class="row">
		<div class="col-md-4">
		 <img src="users/images/nahid.jpg" width=100 height=100 alt="Md Nazmul Hasan Nahid " class="img-rounded">
		 </div>
		 <div class="col-md-5">
		<b href="" style="color:#202020; font-family:'typo' ; font-size:18px" title="Find on Facebook">MD. Nazmul Hasan Nahid </b>
		<h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">01764272430</h4>
		<h4 style="font-family:'typo' ">nahidmsnndc1257@gmail.com</h4>
    <h4 style="font-family:'typo' ">Department Of EEE</h4>
        <h4 style="font-family:'typo' ">Chittagong University of Engineering And Technology(CUET)</h4></div>
        </div><hr>


        <div class="row">
		<div class="col-md-4">
		 <img src="users/images/Iqbal.jpg" width=100 height=100 alt="Mohammad Iqbal Hossain  " class="img-rounded">
		 </div>
		 <div class="col-md-5">
		<b href="" style="color:#202020; font-family:'typo' ; font-size:18px" title="Find on Facebook">Mohammad Iqbal Hossain  </b>
		<h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">01616516395</h4>
		<h4 style="font-family:'typo' ">iqbal196.mih@gmail.com</h4>
    <h4 style="font-family:'typo' ">Department Of ME</h4>
        <h4 style="font-family:'typo' ">Chittagong University of Engineering And Technology(CUET)</h4></div>
        </div><hr>

        <div class="row">
		<div class="col-md-4">
		 <img src="users/images/tousi.jpg" width=100 height=100 alt="Tashriful Huda Toushi " class="img-rounded">
		 </div>
		 <div class="col-md-5">
		<b href="" style="color:#202020; font-family:'typo' ; font-size:18px" title="Find on Facebook">Tashriful Huda Toushi</b>
		<h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">01924724673</h4>
		<h4 style="font-family:'typo' ">tashrifulhudataushi@gmail.com</h4>
    <h4 style="font-family:'typo' ">Department Of ME</h4>
        <h4 style="font-family:'typo' ">Chittagong University of Engineering And Technology(CUET)</h4></div>
        </div><hr>

        <div class="row">
		<div class="col-md-4">
		 <img src="users/images/rimon.jpg" width=100 height=100 alt="Md Rimon Azad" class="img-rounded">
		 </div>
		 <div class="col-md-5">
		<b href="" style="color:#202020; font-family:'typo' ; font-size:18px" title="Find on Facebook">Md Rimon Azad</b>
		<h4 style="color:#202020; font-family:'typo' ;font-size:16px" class="title1">01643174068</h4>
		<h4 style="font-family:'typo' ">azadrimon24@gmail. com</h4>
    <h4 style="font-family:'typo' ">Department Of WRE</h4>
        <h4 style="font-family:'typo' ">Chittagong University of Engineering And Technology(CUET)</h4></div>
        </div>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

  <div class="modal" id="myModal-4">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Contacts</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <div class="row">
       
        <div class="col-lg-12">
        <b href="" style="color:#202020; font-family:'typo' ; font-size:18px" >MD. Nazmul Hasan Nahid : 01764272430</b>
        </div>
        <div class="col-lg-12">
        <b href="" style="color:#202020; font-family:'typo' ; font-size:18px" >Mohammad Iqbal Hossain : 01616516395</b>
        </div>
        <div class="col-lg-12">
        <b href="" style="color:#202020; font-family:'typo' ; font-size:18px" >Tashriful Huda Toushi : 01924724673</b>
        </div>
        <div class="col-lg-12">
        <b href="" style="color:#202020; font-family:'typo' ; font-size:18px" >Md Rimon Azad : 01643174068</b>
        </div>
        <div class="col-lg-12">
        <b href="" style="color:#202020; font-family:'typo' ; font-size:18px" >Mohammad Iqbal Hossain  : 01616516395</b>
        </div>
        </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">

          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
 
 </footer>

<div class="copyright text-center">
    <b>&copy;Captains' Squad-2020</b>
</div>



 <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
  
 
  
    
</body>
</html>


<?php 

if(isset($_POST['register'])){
    
    $u_name = $_POST['u_name'];

    $u_name =str_replace("'","\'",$u_name);

    $u_phn = $_POST['u_phn'];

    $u_email = $_POST['u_email'];
    
    $u_pass = $_POST['u_pass'];

    $u_pass =str_replace("'","\'",$u_pass);

    $u_fb = $_POST['u_fb'];

    $u_fb =str_replace("'","\'",$u_fb);


    date_default_timezone_set('Asia/Dhaka'); 
    $Time = date("Y-m-d H:i:s");
    
    
 

    $get_user ="select * from users where u_phn='$u_phn'";

    $run_user=mysqli_query($con,$get_user);

    $count=mysqli_num_rows($run_user);

    if($count>0){
            
      
        
        echo "<script>alert('You have already been Registered.')</script>";
        
        echo "<script>window.open('index.php','_self')</script>";
        
    }
    else{
        $u_college = $_POST['u_college'];

        $u_college =str_replace("'","\'",$u_college);

        $u_city = $_POST['u_city'];

        $u_id_image = $_FILES['u_id_image']['name'];
        
        $u_id_image_tmp = $_FILES['u_id_image']['tmp_name'];
        
        move_uploaded_file($u_id_image_tmp,"users/images/$u_id_image");
    
        $u_image = $_FILES['u_image']['name'];
        
        $u_image_tmp = $_FILES['u_image']['tmp_name'];
        
        move_uploaded_file($u_image_tmp,"users/images/$u_image");

    $insert_user="insert into users (u_name,u_phn,u_email,u_pass,u_college,u_id_img,u_city,u_image,u_fb,reg_time) values('$u_name','$u_phn','$u_email','$u_pass','$u_college','$u_id_image','$u_city','$u_image','$u_fb','$Time')";

    $run_insert_user=mysqli_query($con,$insert_user);

    if($run_insert_user){

        $_SESSION['u_phn']=$u_phn;
        
        echo "<script>alert('You have been Registered Sucessfully')</script>";
        
        echo "<script>window.open('users/main.php?dashboard','_self')</script>";
        
    }

}
    

    
}





?>