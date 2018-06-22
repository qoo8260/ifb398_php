

<?php 
include 'config.php';
// define variables and set to empty values
$name_error=""; $pass1_error =""; $pass2_error=""; $email_error =""; $phone_error =""; $url_error = ""; $lastname_error="";
$name =""; $pass1 =""; $pass2 =""; $email =""; $phone =""; $message =""; $success = ""; $lastname="";



session_start();
if(isset($_SESSION['login']))
{
         header("Location: ../welcome.php");
}


//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//if (isset($_POST["submit"])) {
  
    if (empty($_POST["name"])) {
    $name_error = "First Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $name_error = "Only letters and white space allowed"; 
    }
  }

    
        if (empty($_POST["lastname"])) {
    $lastname_error = "Last Name is required";
  } else {
    $lastname = test_input($_POST["lastname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
      $lastname_error = "Only letters and white space allowed"; 
    }
  }
    
    if (empty($_POST["pass1"])) {
    $pass1_error = "Password is required";
  } else {
    $pass1 = test_input($_POST["pass1"]);
    // check if e-mail address is well-formed
    if (strlen((string)$pass1)<6) {
      $pass1_error = "at least 6 characters are required"; 
    }
  }
    
if (empty($_POST["pass2"])) {
    $pass2_error = "Password is required";
  } else {
    $pass2 = test_input($_POST["pass2"]);
    // check if e-mail address is well-formed
    if (strlen((string)$pass2)<6) {
      $pass2_error = "at least 6 characters are required"; 
    }
    else if($pass1!=$pass2)
    {
        $pass2_error="Password does not match";
    }
  }
    
    
  if (empty($_POST["email"])) {
    $email_error = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_error = "Invalid email format"; 
    }
  }
    

  
  if (empty($_POST["phone"])) {
    $phone_error = "Phone is required";
  } else {
    $phone = test_input($_POST["phone"]);
    // check if e-mail address is well-formed
    if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$phone)) {
      $phone_error = "Invalid phone number"; 
    }
  }

  
  if ($name_error == '' and $email_error == '' and $phone_error == '' and $pass1_error == '' and $pass2_error == ''
     and $lastname_error==''){
      unset($_POST['submit']);
            
      $success="successful";
      
      

if(!$conn)
{
    echo "not connected to the server";
}
if(!mysqli_select_db($conn, $db))
 {
    echo "database not selected";
 }
      
      $hashed_password = password_hash($pass2, PASSWORD_DEFAULT);
      
      $da = (isset($_POST['disability'])) ? 1 : 0;

      

      
      
            $sql = "INSERT INTO paint_users (first, last, password, email, mobile, disability)
VALUES ('$name', '$lastname', '$hashed_password', '$email', '$phone', '$da')";
      
      if(!mysqli_query($conn,$sql))
      {
              $success="Use the other email.";
      }
      else
      {
              $success="successful. Press Log In";
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