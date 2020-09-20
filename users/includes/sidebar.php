
<?php 
    
    if(!isset($_SESSION['u_phn'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

       $u_phn=$_SESSION['u_phn'];

        $get_user = "select * from users where  u_phn='$u_phn'";
                                
        $run_user = mysqli_query($con,$get_user);
              
        if($row_user=mysqli_fetch_array($run_user)){
                                        
            $u_id = $row_user['u_id'];
                                        
            $u_name = $row_user['u_name'];
          }
       
?>

<nav class="navbar navbar-inverse navbar-fixed-top"><!-- navbar navbar-inverse navbar-fixed-top begin -->
    <div class="navbar-header"><!-- navbar-header begin -->
        
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><!-- navbar-toggle begin -->
            
            <span class="sr-only">Toggle Navigation</span>
            
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            
        </button><!-- navbar-toggle finish -->
        
        <a href="main.php?dashboard" class="navbar-brand">Student Panel</a>
        
    </div><!-- navbar-header finish -->
    
    <ul class="nav navbar-right top-nav"><!-- nav navbar-right top-nav begin -->
        
        <li class="dropdown"><!-- dropdown begin -->
            
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><!-- dropdown-toggle begin -->
                
            <?php echo $u_name; ?>  <i class="fa fa-user"></i><b class="caret"></b>
                
            </a><!-- dropdown-toggle finish -->
            
            <ul class="dropdown-menu"><!-- dropdown-menu begin -->

               <li><!-- li begin -->
                    <a href="main.php?dashboard"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-dashboard"></i> Dashboard
                        
                        <span class="badge"></span>
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
               
                <li><!-- li begin -->
                    <a href="main.php?view_exams"><!-- a href begin -->
                        
                        <i class="fa fa-list-alt"></i> Exams
                        
                        <span class="badge"></span>
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
                <li><!-- li begin -->
                    <a href="main.php?view_result"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-users"></i> Result
                        
                        <span class="badge"></span>
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->

                <li><!-- li begin -->
                    <a href="main.php?contact"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-envelope"></i> Contact
                        
                        <span class="badge"></span>
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
                <li class="divider"></li>
                
                <li><!-- li begin -->
                    <a href="logout.php"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-power-off"></i> Log Out
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
            </ul><!-- dropdown-menu finish -->
            
        </li><!-- dropdown finish -->
        
    </ul><!-- nav navbar-right top-nav finish -->
    
    <div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse begin -->
        <ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav begin -->
            <li><!-- li begin -->
                <a href="main.php?dashboard"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-dashboard"></i> Dashboard
                        
                </a><!-- a href finish -->
                
            </li><!-- li finish -->

            <li><!-- li begin -->
                <a href="main.php?view_exams"><!-- a href begin -->
                        
                        <i class="fa fa-list-alt"></i>  All Exam List
                        
                </a><!-- a href finish -->
                
            </li><!-- li finish -->

            <li><!-- li begin -->
                <a href="main.php?view_reg_exams"><!-- a href begin -->
                        
                        <i class="fa fa-list"></i> Registered Exam List
                        
                </a><!-- a href finish -->
                
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#profile"><!-- a href begin -->
                        
                        <i class="fa fa-user"></i> Profile
                        <i class="fa fa-fw fa-caret-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="profile" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="main.php?view_profile"> View Profile </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="main.php?change_pass"> Change Password </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="main.php?view_result"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-tags"></i> Result
                        
                </a><!-- a href finish -->
                
            </li><!-- li finish -->

            <li><!-- li begin -->
                <a href="main.php?contact"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-envelope"></i> Contact Us
                        
                </a><!-- a href finish -->
                
            </li><!-- li finish -->
           

      

            
        </ul><!-- nav navbar-nav side-nav finish -->
    </div><!-- collapse navbar-collapse navbar-ex1-collapse finish -->
    
</nav><!-- navbar navbar-inverse navbar-fixed-top finish -->


    <?php  }  ?>