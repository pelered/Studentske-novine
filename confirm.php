<?php
   include('config.php');
   
   $passkey = $_GET['passkey'];

   $sql = "UPDATE email SET conf_code=NULL WHERE conf_code='$passkey'";

   $result = mysqli_query($link,$sql) or die(mysqli_error($link));

   if($result)
   {
       echo '<div>Your account is now active. You may now <a href="index.php"> Log in </a></div>';
   }
   else
   {
       echo "Some error occur.";
   }
?>