<?php

error_reporting(1);
include 'config.php';

$user_check = $_SESSION['login_user'];

//$ses_sql = mysqli_query($link,"select username from korisnik,email where korisnik.email = email.email and username = '".$user_check."'");

//$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

if($stmt = $link->prepare("SELECT username from korisnik,email where korisnik.email = email.email and username = ?")){

    $stmt->bind_param('s',$user_check);

    $stmt->execute();

    $dumblogin = $stmt->get_result();

    $row = $dumblogin->fetch_array();

}

$login_user = $row['username'];

?>