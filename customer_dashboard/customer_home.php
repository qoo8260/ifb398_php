

<html>
<body>
<?php 
        include 'process/config.php';
    session_start();
if($_SESSION['login'] != "yes")
{
         header("Location: ../login.php");
}
echo "Customer welcome : ".$_SESSION['login_user'];

    
    




    
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
            
            
            
            
               echo "<form action='process/select_event_form.php' method='post'>";        
  
                
            echo "<tr>";
            
            //======================================================================================checkbox
            //$checkboxes = "<input type='checkbox' name='selected[]' value='{$row['id']}'>";
            //echo "<td>".$checkboxes."</td>";
            $checkboxes="<input type='checkbox' name='selected[]' value='{$row['id']}'>";
            echo "<td>".$checkboxes."</td>";


            
                //echo "<td>" . $row['id']. "</td>";
                            echo "<td>" . $cnt. "</td>";

                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['availability'] . "</td>";
            echo "</tr>";
            $cnt++;
        }
        
                    
        
                    $select_button="<button type='submit' name='select_button' value='select'>";
                    echo "<td>".$select_button."Select"."</button>"."</td>";

        echo "</table>";
        
        //===========================================delete button
        //$delete_button="<input type='button' name='submit' value='submit' />";
        //echo $delete_button;
                            $_first=$_SESSION['first'];
                            $_last=$_SESSION['last'];
                            $_email=$_SESSION['email'];

                echo"<input type='hidden' name='first' value='$_first'>";
                echo"<input type='hidden' name='last' value='$_last'>";
                echo"<input type='hidden' name='email' value='$_email'>";




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

    <a href="../logoff.php">log off</a>
    <a href="customer_calendar.php">customer_select</a>

    </body>
</html>
