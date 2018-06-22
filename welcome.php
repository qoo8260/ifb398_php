

<html>
<body>
<?php 
    session_start();
if($_SESSION['login'] != "yes")
{
         header("Location: login.php");
}
if($_SESSION['admin'] ==1)
{
         header("Location: admin_dashboard/admin_home.php");
}
else
{
             header("Location: customer_dashboard/customer_home.php");

}

?>

    </body>
</html>
