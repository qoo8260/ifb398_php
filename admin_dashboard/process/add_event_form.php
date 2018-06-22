

<?php 
include 'config.php';
// define variables and set to empty values
$time="";
$time_error="";
$place="";
$place_error="";
$success = ""; 

if($_SESSION['login'] != "yes" || $_SESSION['admin']!=1)
{
         header("Location: ../login.php");
}


//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//if (isset($_POST["submit"])) {
  
    
  if (empty($_POST["time"])) {
    $time_error = "Time is required";
  } else {
    $time = test_input($_POST["time"]);
    // check if name only contains letters and whitespace

  }
    
    
    if (empty($_POST["place"])) {
    $place_error = "Availability is required";
  } else {
    $place = test_input($_POST["place"]);
    if(!ctype_digit(strval($place)))
    {
            $place_error = "enter a number";
    }

  }
    


  
  if ($time_error=='' and $place_error==''){
      unset($_POST['submit']);
      
      

            if(!$conn)
            {
                echo "not connected to the server";
            }
            if(!mysqli_select_db($conn, $db))
             {
                echo "database not selected";
             }
      

      
      
            $sql = "INSERT INTO ongoing_events (date, availability)
            VALUES ('$time', '$place')";
      
              if(!mysqli_query($conn,$sql))
              {
                      $success="Please Check it again";
              }
              else
              {
                      $success.='Added Event: '.$time.'<br>Places: '.$place;
              }
      
              mysqli_close($conn);
      


      
      
      
      
      
      
      
      
      
      
      
      
    }
    
    
    
    
    else
    {
              $success="unsuccessful";

    }

  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>