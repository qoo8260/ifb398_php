

<?php 
include 'config.php';
// define variables and set to empty values
$password="";
$password_error="";

$email ="";
$email_password="";

$success = ""; 

      

if(!$conn)
{
    echo "not connected to the server";
}
if(!mysqli_select_db($conn, $db))
 {
    echo "database not selected";
 }
//=================================mysql connection end

session_start();
if(isset($_SESSION['login']))
{
         header("Location: ../welcome.php");
}
//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//if (isset($_POST["submit"])) {


          $email = mysqli_real_escape_string($conn,$_POST['email']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 

    
      $pass_sql = "SELECT * FROM paint_users WHERE email = '$email'";
      $pass_result = mysqli_query($conn,$pass_sql);    


    while ($pass_row = $pass_result->fetch_assoc()) {
       

    if(password_verify($password, $pass_row['password']))
      {
        
         $_SESSION['login_user'] = $pass_row['first']." ".$pass_row['last'];
         $_SESSION['login'] = "yes";
         $_SESSION['first'] = $pass_row['first'];
         $_SESSION['last'] = $pass_row['last'];
         $_SESSION['email'] = $pass_row['email'];
         $_SESSION['mobile'] = $pass_row['mobile'];
         $_SESSION['admin'] = $pass_row['admin'];
         $_SESSION['disability'] = $pass_row['disability'];
         
        
              mysqli_close($conn);

        
         header("Location: ../welcome.php");
        
        
        
        
      }//password
 
        
        
        
    }//row
    
                 $success = "Your Login Name or Password is invalid";

    
    
}//post




function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}