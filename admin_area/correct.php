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
        content="0; url =view_responses.php?page=<?php echo $page ?>" />  
</head>  
  
<body>  
    
<?php 

    if(isset($_GET['correct'])){
        
        $response_id = $_GET['correct'];

        $get_response = "select * from reponse where response_id='$response_id'";
                                
        $run_response = mysqli_query($con,$get_response);
   
        if($row_response=mysqli_fetch_array($run_response)){
                                    

               $check_answer = $row_response['check_answer'];

               $exam_id = $row_response['exam_id'];

               $u_id = $row_response['u_id'];

               $q_id = $row_response['q_id'];

           
               $get_question = "select * from questions where q_id='$q_id'";
                                
               $run_question = mysqli_query($con,$get_question);
              
               if($row_question=mysqli_fetch_array($run_question)){
                                        
                    $q_mark = $row_question['q_mark'];      
                    
                   


               if($check_answer!="checked"){




                $update_response = "update reponse set check_answer='checked',right_click='yes' where response_id='$response_id'";
                                
                $run_update = mysqli_query($con,$update_response);

                if($run_update){
                     
                    $get_result = "select * from result where exam_id='$exam_id' AND u_id='$u_id'";
                                
                    $run_result = mysqli_query($con,$get_result);



                    if(mysqli_num_rows($run_result)>0 AND $row_result=mysqli_fetch_array($run_result)){

                        $total_marks=$row_result['total_marks'];


                        $total_marks=$total_marks+$q_mark;

                        $update_result = "update result set total_marks='$total_marks' where exam_id='$exam_id' AND u_id='$u_id'";
    
                        $run_update_result=mysqli_query($con,$update_result);
    
                        if($run_update_result)
                        {
                            $i="ok";
                        }
                      
                        }
                   
                    else{
                        $total_marks=0;

                        $total_marks=$total_marks+$q_mark;

                        $insert_result = "insert into result(exam_id,u_id,total_marks) 
                                          values('$exam_id','$u_id','$total_marks')";
    
                        $run_insert_result=mysqli_query($con,$insert_result);

                        if($run_insert_result)
                        {
                            $i="ok";
                        }

                    }

                }


                   

              }

                    
            }

        }




                
        
        
     }
    

?>

</body>  
  
</html>




<?php } ?> 