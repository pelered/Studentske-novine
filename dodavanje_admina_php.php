<?php   

    include('config.php');


    $tempusr = mysqli_query($link,"SELECT `username`,`email_fk` FROM `korisnik`,`email` WHERE `ovlasti`!=1 and `email_id`= `email_fk`");

    
    if(isset($_POST['action']) && $_POST['action'] == 'formm'){

    $imeadmina =$_POST['ime'];

    $prezimeadmina =$_POST['prezime'];

    $biografija =$_POST['biografija'];


    $email_fk = $_POST['admin'];


    //mysqli_query($link,"UPDATE `email` SET `ovlasti` = '1' WHERE `email`.`email_id` = '".$email_fk."'");

    if($stmt = $link->prepare("UPDATE `email` SET `ovlasti` = '1' WHERE `email`.`email_id` = ?")){

      $stmt->bind_param('i',$email_fk);

      $stmt->execute();

    }


    //$tempusername_id_fk1 = mysqli_query($link,"SELECT `username_id` FROM `korisnik` WHERE `email_fk` = '".$email_fk."'");

    //$username_id_fk1 = mysqli_fetch_array($tempusername_id_fk1);

    if($stmt = $link->prepare("SELECT `username_id` FROM `korisnik` WHERE `email_fk` = ? ")){

      $stmt->bind_param('i',$email_fk);

      $stmt->execute();

      $tempusername_id_fk1 = $stmt->get_result();
      
      $username_id_fk1 = $tempusername_id_fk1->fetch_array();
    }



    //mysqli_query($link,"INSERT INTO novinar (`ime`,`prezime`,`biografija`,`username_id_fk`)VALUES('".$imeadmina."','".$prezimeadmina."','".$biografija."','".$username_id_fk1[0]."')");


    if($stmt = $link->prepare("INSERT INTO novinar (`ime`,`prezime`,`biografija`,`username_id_fk`)VALUES(?,?,?,?)")){

      $stmt->bind_param('sssi',$imeadmina,$prezimeadmina,$biografija,$username_id_fk1[0]);

      $stmt->execute();


    }

  }
  ?>