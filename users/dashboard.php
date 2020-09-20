<?php 
    
    if(!isset($_SESSION['u_phn'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        $get_exam = "select COUNT(exam_id) as exam_number from exam ";
                                
        $run_exam = mysqli_query($con,$get_exam);

        if($row_exam=mysqli_fetch_array($run_exam)){
            
            $exam_number = $row_exam['exam_number'];
          
        }
              
    
            $u_phone=$_SESSION['u_phn'];
    
            $select_user="select * from users where u_phn='$u_phone'";
    
            $run_user=mysqli_query($con,$select_user);
    
           if($row_user=mysqli_fetch_array($run_user))
           {
               $u_id=$row_user['u_id'];
               $u_name=$row_user['u_name'];
               $u_image=$row_user['u_image'];
           }


           $get_reg_exam = "select COUNT(exam_id) as exam_number from reg_exam where u_id=$u_id";
                                
          $run_reg_exam = mysqli_query($con,$get_reg_exam);

        if($row_reg_exam=mysqli_fetch_array($run_reg_exam)){
            
            $reg_exam_number = $row_reg_exam['exam_number'];
          
        }


?> 


<div id="home-bg">

<div class="row">

   <div class="ml-5 col-xs-8 welcome">

       <img src="images/<?php echo"$u_image"; ?>" alt="Student Profile Picture" class="img-responsive col-sm-4">
       
       <h3>Welcome</h3> <h4><?php  echo" $u_name";?></h4>
    </div>
  

</div>




<div class="row"><!-- row no: 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <h1 class="page-header headpage"> Dashboard </h1>
        
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
            
                <i class="fa fa-dashboard"></i> Dashboard
            
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
        
    </div><!-- col-lg-12 finish -->
</div><!-- row no: 1 finish -->

<div class="row"><!-- row no: 2 begin -->
   
    <div class="col-md-6"><!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-primary"><!-- panel panel-primary begin -->
            
            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                    <div class="col-xs-3"><!-- col-xs-3 begin -->
                       
                        <i class="fa fa-tasks fa-5x"></i>
                        
                    </div><!-- col-xs-3 finish -->
                    
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <div class="huge"> <?php  echo $exam_number; ?>  </div>
                           
                        <div  class="huge2"> Total Exams </div>
                        
                    </div><!-- col-xs-9 text-right finish -->
                    
                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->
            
            <a href="main.php?view_exams"><!-- a href begin -->
                <div class="panel-footer"><!-- panel-footer begin -->
                   
                    <span class="pull-left"><!-- pull-left begin -->
                        View Details 
                    </span><!-- pull-left finish -->
                    
                    <span class="pull-right"><!-- pull-right begin --> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span><!-- pull-right finish --> 
                    
                    <div class="clearfix"></div>
                    
                </div><!-- panel-footer finish -->
            </a><!-- a href finish -->
            
        </div><!-- panel panel-primary finish -->
    </div><!-- col-lg-3 col-md-6 finish -->

    <div class="col-md-6"><!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-primary"><!-- panel panel-primary begin -->
            
            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                    <div class="col-xs-3"><!-- col-xs-3 begin -->
                       
                        <i class="fa fa-tasks fa-5x"></i>
                        
                    </div><!-- col-xs-3 finish -->
                    
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <div class="huge"> <?php  echo $reg_exam_number; ?>  </div>
                           
                        <div  class="huge2"> Total Registered Exams </div>
                        
                    </div><!-- col-xs-9 text-right finish -->
                    
                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->
            
            <a href="main.php?view_reg_exams"><!-- a href begin -->
                <div class="panel-footer"><!-- panel-footer begin -->
                   
                    <span class="pull-left"><!-- pull-left begin -->
                        View Details 
                    </span><!-- pull-left finish -->
                    
                    <span class="pull-right"><!-- pull-right begin --> 
                        <i class="fa fa-arrow-circle-right"></i> 
                    </span><!-- pull-right finish --> 
                    
                    <div class="clearfix"></div>
                    
                </div><!-- panel-footer finish -->
            </a><!-- a href finish -->
            
        </div><!-- panel panel-primary finish -->
    </div><!-- col-lg-3 col-md-6 finish -->
   
    
</div><!-- row no: 2 finish -->


<div class="heading"><h1>All Examinations List</h1><hr></div>
<div class="container"><!-- container begin -->

   <div class="row">
   <?php

$get_exam="select * from exam";
$run_exam=mysqli_query($con,$get_exam);
while($row_exam=mysqli_fetch_array($run_exam)){
          
      $exam_id=$row_exam['exam_id'];

      $exam_title=$row_exam['exam_title'];

      $total_questions=$row_exam['total_questions'];

      $exam_marks=$row_exam['exam_marks'];

      $exam_date=$row_exam['exam_date'];

      $exam_finish=$row_exam['exam_finish'];
     
      $duration=strtotime($exam_finish)-strtotime($exam_date);

      $min_duration=$duration/60;

?>
        <div class="col-sm-6">
              <div class="panel panel-default panel-primary">
                  <div class="panel-heading"><h2><?php echo"$exam_title";  ?></h2></div>
                  <div class="panel-body">

                        <div class="row">
                        <div class="col-sm-6 grad">
                        <span>   
                        <i class="fas fa-graduation-cap"></i>
                        
                        </div>
                        </span> 
                        <div class="col-sm-6 desc" >


                            <h3>Totat Questions: <?php echo"$total_questions";  ?></h3>
                            <h3>Total Marks: <?php echo"$exam_marks";  ?></h3>
                            <h3>Start Time: <?php   echo date('h:i:s A d/m/Y', strtotime($exam_date));  ?></h3>
                            <h3>Duration: <?php echo"$min_duration";  ?> Minutes</h3>

                         
                        </div>
                        </div>

                  </div>
                  <div class="panel-footer">
                  <a href="registration_exam.php?u_id=<?php echo"$u_id";?>&&exam_id=<?php echo"$exam_id";?>" class="btn btn-primary" style="width: 100%;">Register Now</a>
                  </div>
              </div>
        </div>


        

<?php   }  ?>

   </div>

   </div><!-- container finish -->



</div>




<?php   }  ?>


