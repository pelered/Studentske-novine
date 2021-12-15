<?php 
include('config.php');

$kategorija_id = $_POST['izbornik'];


if($stmt = $link->prepare("select clanak_id from clanak where naslov = ?")){
    
    $stmt->bind_param('s',$naslov);

    $stmt->execute();

    $dumbclanak_id = $stmt->get_result();

    $clanak_id = $dumbclanak_id->fetch_assoc();


}

//$dumbslika_id = mysqli_query($link,"select slika_id from slika where putanja = '".$target_file."'");

//$slika_id = mysqli_fetch_array($dumbslika_id);

if($stmt = $link->prepare("select slika_id from slika where putanja = ?")){
    
    $stmt->bind_param('s',$target_file);

    $stmt->execute();

    $dumbslika_id = $stmt->get_result();

    $slika_id = $dumbslika_id->fetch_array();


}

//mysqli_query($link,"INSERT INTO `clanak_slika` (`clanak_id_fk`, `slika_id_fk`) VALUES ('".$clanak_id['clanak_id']."', '".$slika_id[0]."')");

if($stmt = $link->prepare("INSERT INTO `clanak_slika` (`clanak_id_fk`, `slika_id_fk`) VALUES (?,?)")){

    $stmt->bind_param('ii',$clanak_id['clanak_id'],$slika_id[0]);

    $stmt->execute();

}


if($stmt = $link->prepare("INSERT INTO `clanak_kategorija` (`clanak_id_fk`, `kategorija_id_fk`) VALUES (?,?)")){
    
        $stmt->bind_param('ii',$clanak_id['clanak_id'],$kategorija_id);
    
        $stmt->execute();
    
    }


?>