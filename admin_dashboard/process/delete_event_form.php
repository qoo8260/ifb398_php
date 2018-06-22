

<?php 
include 'config.php';
// define variables and set to empty values
$success = ""; 
$id="";
$selected="";


//form is submitted with POST method
if (isset($_POST['delete_button'])) {


    
        if(!$conn)
{
    echo "not connected to the server";
}
if(!mysqli_select_db($conn, $db))
 {
    echo "database not selected";
 }
    
    
    
    
    
    
    
    
    
    
    
        //$selected=$_POST['selected'];
        //$max=count($selected);
    
    
        //         echo "aaaaaaaaaaaaaa";

        if(!empty($_POST['selected']))

        {
            
                foreach ($_POST['selected'] as $selected) 
                {
                            //echo $selected."<br>";

                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    $sql_command = "SELECT * FROM ongoing_events WHERE id='$selected'";
                    $result_query = mysqli_query($conn, $sql_command);    

                    
                    while ($sql_row = $result_query->fetch_assoc()) 
                    {
                        
                                $_time=$sql_row['date'];
                        
                        


                              $sql = "DELETE FROM attendence WHERE time = '$_time'";    
                              if(!mysqli_query($conn,$sql))
                              {
                                      //echo "unsuccessful";
                              }
                              else
                              {
                                      //echo "successful";
                              }
                              

                              
                        
                    
                    }
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                          $sql = "DELETE FROM ongoing_events WHERE id='$selected'";    
                          if(!mysqli_query($conn,$sql))
                          {
                                  //$success="Unsucessful";
                          }
                          else
                          {
                                  //$success="successful";
                          }

                          mysqli_close($conn);
                }
            
            /*
            $i=0;
            for($i=0; $i <$max; $i++)
            {

                if(isset($selected[i]))
                {
                    
                    

                          $sql = "DELETE * FROM ongoing_events WHERE id='$selected[i]'";    
                          if(!mysqli_query($conn,$sql))
                          {
                                  //$success="Unsucessful";
                          }
                          else
                          {
                                  //$success="successful";
                          }

                          mysqli_close($conn);

                }
            }
            */
                    

        }

    
                 header("Location: ../admin_home.php");

                    
                    
  
}




function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>