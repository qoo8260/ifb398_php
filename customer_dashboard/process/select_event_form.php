

<?php 
include 'config.php';
// define variables and set to empty values
$success = ""; 
$id="";
$selected="";
$_date="";
$_first="";
$_last="";
$_email="";
$_bool=false;


//form is submitted with POST method
if (isset($_POST['select_button'])) {


    
    if(!$conn)
    {
        echo "not connected to the server";
    }
    if(!mysqli_select_db($conn, $db))
    {
        echo "database not selected";
    }
    
    
    
    
    
    

    
    
    


        if(!empty($_POST['selected']))

        {
            
                foreach ($_POST['selected'] as $selected) 
                {
                    

                        
                        
                        
                                            $sql_command = "SELECT * FROM ongoing_events WHERE id = '$selected'";
                    $result_query = mysqli_query($conn,$sql_command);    


                    $left_place="";
                    while ($sql_row = $result_query->fetch_assoc()) {


                        
                        
                        
                        
                                $_first=$_POST['first'];
                                $_last=$_POST['last'];
                                $_email=$_POST['email'];
                                $_date=$sql_row['date'];


                        
                        


                                $left_place=$sql_row['availability'];


                    }
                    if($left_place>0)
                    {
                        



                            



                        

                        
                        
                        
                            $test_query = mysqli_query($conn,"SELECT time FROM attendence WHERE email = '$_email'");    
                            

                            while($test_row = $test_query->fetch_assoc()) {
                                
                                



                                if($test_row['time']==$_date)
                                {
                                    $_bool=true;
                                }
                                    
                            }
                            if($_bool)
                            {
                             echo "you have already registered this session. - ".$_date."<br>"; 

                            }
                            else
                            {
                                   

                            

                                
                                
                              $sql = "INSERT INTO attendence (first, last, email, time) VALUES ('$_first', '$_last', '$_email', '$_date')";

                              if(!mysqli_query($conn,$sql))
                              {
                                                                        //echo " error occured";


                              }
                              else
                              {
                                      


                                  
                                  
                                  $left_place--;

                                  $sql = "UPDATE ongoing_events SET availability = '$left_place' WHERE id = '$selected'";

                                  if(!mysqli_query($conn,$sql))
                                  {
                                      echo "error occured";

                                  }
                                  else
                                  {
                                      
                                  echo "successfully added"."<br>";
                                  echo "number of left_places ".$left_place."<br>";
                                          //$success="successful. Press Log In";
                                  }   

                                  
                                  
                                  
                                  
                              }      
                                
                                
                            
                                
                                mysqli_close($conn);  
                                //header("Location: ../admin_home.php");
                        
                        
                            }

                            
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        




                        

                        
                    }
                    else
                    {
                        
                        echo "no more place left";
                    }
                        
                        
                        
                        
                    
                    
    

        
       
                    
                    
                    

                    

            }

    
                 //header("Location: ../admin_home.php");

                    
                    
  
        }
}




function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<html>
<body>
        <a href="../customer_home.php">Go back</a>

    
    </body>
</html>