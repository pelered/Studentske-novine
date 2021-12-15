<?php
session_start();
include 'config.php';
include 'uredi_anketu_php.php';
header('Content-Type: application/json');
$query = sprintf("select odgovor,broj from anketa,odgovori where prikaz='1' and anketa_id=br_ankete_fk");

    if(isset($_SESSION['graf']) ){


        //echo $_POST['graf'];
        $id=$_SESSION['graf'];
        $query = sprintf("select odgovor,broj from anketa,odgovori where anketa_id='$id' and anketa_id=br_ankete_fk");


    }




//execute query
$resullt = $link->query($query);

//loop through the returned data
$data = array();
foreach ($resullt as $row) {
    $data[] = $row;
}

print json_encode($data);