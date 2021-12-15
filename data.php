<?php
include 'config.php';
include 'uredi_anketu_php.php';
header('Content-Type: application/json');
$query = sprintf("select odgovor,broj from anketa,odgovori where prikaz='1' and anketa_id=br_ankete_fk");

//execute query
$result = $link->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
    $data[] = $row;
}
$result->close();

//close connection
$link->close();
print json_encode($data);