<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

        if(isset($_GET['page'])){

            $page=$_GET['page'];
        }

?>



<!DOCTYPE html>  
<html>  
  
<head>  
    <title>Admin Panel</title>  
    <meta http-equiv="refresh"
        content="0; url = view_responses.php?page=<?php echo $page ?>" />  
</head>  
  
<body>  
    
<?php 

    if(isset($_GET['wrong'])){
        
        $response_id = $_GET['wrong'];

        $get_response = "select * from reponse where response_id='$response_id'";
                                
        $run_response = mysqli_query($con,$get_response);
   
        if($row_response=mysqli_fetch_array($run_response)){
                                    

               $check_answer = $row_response['check_answer'];

               if($check_answer!="checked"){

                $update_response = "update reponse set check_answer='checked',wrong_click='yes' where response_id='$response_id'";
                                
                $run_update = mysqli_query($con,$update_response);

                if($run_update){
                     
                  $i="ok";
                    }

                   

                }

            }
              
      
        
        }


?>

</body>  
  
</html>

<?php } ?> 