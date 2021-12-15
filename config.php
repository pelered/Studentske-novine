<?php
$servername = "localhost";
$usernamee = "root";
$passwordd = "";
$dbname = "stu";

$link = new Mysqli($servername, $usernamee, $passwordd, $dbname);

if($link->connect_error){

    die( "Something went wrong...".$link->connect_error);

}
?>