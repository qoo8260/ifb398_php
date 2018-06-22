

<html>
<body>
    
    
    
    
    
    
    
    
<?php 
        //include 'process/config.php';
    session_start();
if($_SESSION['login'] != "yes")
{
         header("Location: ../login.php");
}
echo "Select date : ".$_SESSION['login_user'];

    
    
/*



    
    if(!$conn)
{
    echo "not connected to the server";
}
if(!mysqli_select_db($conn, $db))
 {
    echo "database not selected";
 }
        


 */   
    
    
    
    

    
    
    
    
    
    
    



    
    
    
?>
        <link rel="stylesheet" href="../form_css/form.css" type="text/css">
<div class="container">  
  <form id="contact" action="process/calendar_select.php" method="post">
    <h3>Booking by date</h3>
    <h4>select date</h4>
      

      
      
   
      
     
      

      
          <fieldset>
      <input placeholder="select date" type="date" name="date" tabindex="1" autofocus>
    </fieldset>
      
      
      
      



    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="Completed Registration">Find</button>
    </fieldset>
      
      
      
  </form>
    
</div>
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <br>
    <a href="../logoff.php">log off</a>
    <a href="customer_home.php">home</a>

    </body>
</html>
