<?php

include('config.php');

if(isset($_POST['action']) && $_POST['action'] == 'form2'){

    $naslov = $_POST['title'];
    $opis = $_POST['koc'];
    $sadrzaj =  $_POST['textclanka'];

   // mysqli_query($link,"insert into clanak (naslov,opis,sadrzaj,novinar_id_fk) values('".$naslov."','".$opis."','".$sadrzaj."',1)");

   $stmt = $link->prepare("insert into clanak (naslov,opis,sadrzaj,novinar_id_fk) values(?,?,?,1)");//dodano votesum i count
   
           $stmt->bind_param('sss',$naslov,$opis,$sadrzaj);
   
           $stmt->execute();

}

?>

