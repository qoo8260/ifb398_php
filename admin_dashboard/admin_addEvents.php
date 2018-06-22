

<html>
<body>
<?php 
    session_start();
if($_SESSION['login'] != "yes" || $_SESSION['admin']!=1)
{
         header("Location: ../login.php");
}

echo "admin add event : ".$_SESSION['login_user'];
    
    
    ?>
    
<?php include('process/add_event_form.php'); ?>
<link rel="stylesheet" href="../form_css/form.css" type="text/css">
<div class="container">  
  <form id="contact" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <h3>Create events</h3>
    <h4>add details</h4>
      

      
      
    <fieldset>
              <span class="timeshow">DateTime</span>

      <input placeholder="Eg. 2018-01-01 AM 01:00" type="datetime-local" name="time" tabindex="1" autofocus>
      <span class="error"><?= $time_error ?></span>
    </fieldset>
      
    <fieldset>
      <input placeholder="Available Places" type="text" name="place" tabindex="3">
      <span class="error"><?= $place_error ?></span>
    </fieldset>
      



    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="Completed Registration">Create</button>
        <div class="success"><?= $success ?></div>

    </fieldset>
      
      
      
  </form>
    
</div>
    
    


    
    
    
    
    <a href="admin_home.php">Go Back</a>
    <a href="../logoff.php">log off</a>

    </body>
</html>
