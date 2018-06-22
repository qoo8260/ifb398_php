<html>
 <head>
  <title>Registration</title>
 </head>
 <body>

<?php include('form_php\login_process.php'); ?>
<link rel="stylesheet" href="form_css/form.css" type="text/css">
<div class="container">  
  <form id="contact" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <h3>Log In</h3><br>
      

      
      
    <fieldset>
      <input placeholder="Your Email Address" type="email" name="email" tabindex="2">
    </fieldset>
      
        <fieldset>
      <input placeholder="Please enter new password" type="password" name="password" tabindex="1" autofocus>
    </fieldset>
      

    <a href="registration.php">register</a>


    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="Completed Registration">Log In</button>
        <div class="success"><?= $success ?></div>

    </fieldset>
      
      
      
  </form>
    
</div>
     

 </body>
</html>

