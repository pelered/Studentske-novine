<?php

include ('config.php');

$ida = $_GET['id'];


if(isset($_POST['action']) && $_POST['action'] == 'ocjena'){

    $twoyear = (24*2592000) + time();

    setcookie($ida, ocjenjeno , $twoyear);

    $ocjena = $_POST['star'];

    $stmt = $link->prepare("update clanak set votesum = votesum + ? where clanak_id = ?");

    $stmt->bind_param('ii',$ocjena,$ida);

    $stmt->execute();


    $stmt2 = $link->prepare("update clanak set votecount = votecount + 1 where clanak_id = ?");
    
    $stmt2->bind_param('i',$ida);
    
    $stmt2->execute();    

}

$stmt = $link->prepare("select round(votesum/votecount,2) as prosjek from clanak where clanak_id = ?");

$stmt->bind_param('i',$ida);

$stmt->execute(); 

$tempprosjek = $stmt->get_result();

$prosjek = $tempprosjek->fetch_array();


?>