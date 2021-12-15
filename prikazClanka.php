<?php 

include('config.php');


$id = $_GET['id'];


//$tempresult = mysqli_query($link,"select naslov,opis,sadrzaj from clanak where clanak_id ='".$id."'");

//$result = mysqli_fetch_array($tempresult);

if($stmt = $link->prepare("select naslov,opis,sadrzaj from clanak where clanak_id = ? ")){

   $stmt->bind_param('i',$id);
   
   $stmt->execute();

   $tempresult = $stmt->get_result();

   $result = $tempresult->fetch_array();

}


//$tempslika = mysqli_query($link,"select putanja from slika,clanak_slika,clanak where clanak_id ='".$id."' and slika_id = slika_id_fk and clanak_id = clanak_id_fk");

//$slika = mysqli_fetch_array($tempslika);

if($stmt = $link->prepare("select putanja from slika,clanak_slika,clanak where clanak_id = ? and slika_id = slika_id_fk and clanak_id = clanak_id_fk")){
    
       $stmt->bind_param('i',$id);
       
       $stmt->execute();
    
       $tempslika = $stmt->get_result();
    
       $slika = $tempslika->fetch_array();
    
    }
    

?>