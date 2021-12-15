<?php

include('config.php');

if(isset($_POST['action']) && $_POST['action'] == 'form2') {

   $komentar = $_POST['komentar'];

 // $tempuser = mysqli_query($link,"select username_id from korisnik where username = '".$_SESSION['login_user']."'");
 
//  $user_id = mysqli_fetch_array($tempuser);

  if($stmt = $link->prepare("SELECT username_id from korisnik where username = ? ")){
    
           $stmt->bind_param('s',$_SESSION['login_user']);
           
           $stmt->execute();
    
           $tempuser = $stmt->get_result();
    
           $user_id = $tempuser->fetch_array();
    
        }



//mysqli_query($link,"insert into komentar (sadrzaj,clanak_id_fk,username_id_fk)values('".$komentar."','".$id."','".$user_id[0]."')");

if($stmt = $link->prepare("INSERT INTO komentar (sadrzaj,clanak_id_fk,username_id_fk)values(?,?,?)")){

    $stmt->bind_param('sii',$komentar,$id,$user_id[0]);

    $stmt->execute();

}



}

$tempcomment = mysqli_query($link,"select sadrzaj,username_id_fk,datum_vrijeme_objave from komentar where clanak_id_fk ='".$id."' order by datum_vrijeme_objave");



$tempbrcoment = mysqli_query($link,"select count(komentar_id)from komentar where clanak_id_fk ='".$id."'");

$brcoment = mysqli_fetch_array($tempbrcoment);


$z = 0;

while($comment = mysqli_fetch_array($tempcomment)){;

$zkomentar[$z] = $comment['sadrzaj'];

$zuser_id[$z] = $comment['username_id_fk'];

    $vrijemedatum[$z] = $comment['datum_vrijeme_objave'];

    $tempnameofuser[$z] = mysqli_query($link,"select username from korisnik where username_id = '".$zuser_id[$z]."'");

    $nameofuser[$z] = mysqli_fetch_array($tempnameofuser[$z]);
    
$z++;

}


?>
