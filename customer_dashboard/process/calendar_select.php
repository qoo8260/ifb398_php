

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


                                $check_date=false;
                                $enter_date="";
                                $db_date="";



//form is submitted with POST method
if (isset($_POST['submit'])) {


    
    if(!$conn)
    {
        echo "not connected to the server";
    }
    if(!mysqli_select_db($conn, $db))
    {
        echo "database not selected";
    }
    
    
    
    
    
    


    
    


        if(!empty($_POST['date']))

        {
            

                    

                                            date_default_timezone_set('Australia/Brisbane');

                        
                        
                                            $sql_command = "SELECT date FROM ongoing_events";
                    $result_query = mysqli_query($conn,$sql_command);    


                    while ($sql_row = $result_query->fetch_assoc()) {


                        
                        
                        
                        

                                $enter_date=$_POST['date'];
                                $db_date=$sql_row['date'];
                                
                                $schedule_y=Datetime::createFromFormat('Y-m-d H:i:s', $db_date)->format('Y');
                                $schedule_m=Datetime::createFromFormat('Y-m-d H:i:s', $db_date)->format('m');
                                $schedule_d=Datetime::createFromFormat('Y-m-d H:i:s', $db_date)->format('d');
                        
                                $enter_y=Datetime::createFromFormat('Y-m-d', $enter_date)->format('Y');
                                $enter_m=Datetime::createFromFormat('Y-m-d', $enter_date)->format('m');
                                $enter_d=Datetime::createFromFormat('Y-m-d', $enter_date)->format('d');
                                
                        /*
                                echo "s year".$schedule_y."<br>";
                                echo "s month".$schedule_m."<br>";
                                echo "s date".$schedule_d."<br>";
                        
                                echo "e year".$enter_y."<br>";
                                echo "e month".$enter_m."<br>";
                                echo "e date".$enter_d."<br>";
                        */
                        
                                if($enter_y==$schedule_y && $enter_m==$schedule_m && $enter_d==$schedule_d)
                                {
                                    
                                    
                                    
                                    echo $sql_row['date']." date found";
                                    $check_date=true;
                                    
                                    
                                    
                                    
                                    
                                }

                        

                    }
                    if(!$check_date)
                    {
                        echo "date is not found";
                    }
    
                        




                                   

                            

                                
                                



                            
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        




                        

                        
            

                        
                        
                        
                        
                    
                    
    

        
       
                    
                    
                    

                    

            

    
                 //header("Location: ../admin_home.php");

                    
                    
  
        }//empty data
}//button




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