<?php

include ('config.php');

$id = $_GET['id'];

$stmt = $link->prepare("select folder,title from galerija where galerija_id = ?");

        $stmt->bind_param('i',$id);

        $stmt->execute();

        $tempputanja = $stmt->get_result();

        $putanja = $tempputanja->fetch_array();


        ?>



