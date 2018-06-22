

<html>
<body>



    
    
<?php 

    include 'process/config.php';
    //include 'process/delete_event_form.php';

    session_start();
if($_SESSION['login'] != "yes" || $_SESSION['admin']!=1)
{
         header("Location: ../login.php");
}

echo "admin welcome : ".$_SESSION['login_user'];
    
    if(!$conn)
{
    echo "not connected to the server";
}
if(!mysqli_select_db($conn, $db))
 {
    echo "database not selected";
 }
        
$sql = "SELECT * FROM ongoing_events ORDER BY date ASC";
    
   
    
    if($result = mysqli_query($conn, $sql)){
        
     
    $cnt=1;
    if(mysqli_num_rows($result) > 0){
        



    
        
        
        echo "<table width='70%'>";
                    echo "<th>".'Tick'."</th>";
                    echo "<th>".'Number'."</th>";
                    echo "<th>".'Date'."</th>";
                    echo "<th>".'Places'."</th>";
        while($row = mysqli_fetch_array($result)){
            
            
            
            
               echo "<form action='process/delete_event_form.php' method='post'>";        
  
                
            echo "<tr>";
            
            //======================================================================================checkbox
            //$checkboxes = "<input type='checkbox' name='selected[]' value='{$row['id']}'>";
            //echo "<td>".$checkboxes."</td>";
            $checkboxes="<input type=\"checkbox\" name=\"selected[]\" value=\"{$row['id']}\">";
            echo "<td>".$checkboxes."</td>";


            
                //echo "<td>" . $row['id']. "</td>";
                            echo "<td>" . $cnt. "</td>";

                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['availability'] . "</td>";
            echo "</tr>";
            $cnt++;
        }
        
                    $delete_button="<input type='button' name='delete_button' value='delete'>";
                    echo "<td>" . $delete_button . "</td>";
        echo "</table>";
        
        //===========================================delete button
        //$delete_button="<input type='button' name='submit' value='submit' />";
        //echo $delete_button;


        
        
        

                        echo "</form>";
        

        
    
        
        
        
        
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
   
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
} 
    
// Close connection
mysqli_close($conn);
    


?>



        <?php echo $success ?>

        

    

    
    
    <br>
        <br>
        <br>
    <a href="admin_addEvents.php">Add Events</a>
    <a href="../logoff.php">log off</a>

    
    
    
    </body>
</html>
