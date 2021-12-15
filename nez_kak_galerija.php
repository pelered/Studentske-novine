<?php

include 'config.php';

// najnovije
$tempresult1 = mysqli_query($link,"select title,galerija_id,putanjaprve from galerija order by datum_vrijeme_objave desc limit 6"); 

$i=0;

while($result = mysqli_fetch_array($tempresult1)){

    $title[$i] = $result['title'];

    $gal_id[$i] = $result['galerija_id'];

    $putanjaprve[$i] = $result['putanjaprve'];

}

?>