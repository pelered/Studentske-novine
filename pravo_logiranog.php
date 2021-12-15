<?php

    include('config.php');

    if($stmt = $link->prepare("select ovlasti from korisnik,email where email_fk = email_id  and username = ? ")){

       $stmt->bind_param('s',$_SESSION['login_user']);
       
       $stmt->execute();

       $temppravo = $stmt->get_result();

       $pravo = $temppravo->fetch_array();

    }

    
    ?>
