<?php

include 'config.php';
$tempresult = array();

// najnovije
$tempresult[0] = mysqli_query($link,"select naslov,clanak_id,preview from clanak order by datum_vrijeme_objave desc limit 3"); 

$k = 1;

while($k <= 5){ // za svaku kategoriju novi upit

$tempresult[$k] = mysqli_query($link,"select naslov,clanak_id,preview from clanak,clanak_kategorija where clanak_id = clanak_id_fk and kategorija_id_fk = '".$k."' order by datum_vrijeme_objave desc limit 5");

$k++;
}

// upis svega potrebnoga u 2d polje koje se onda ispisuje u vijestima
for($i = 0; $i < 6; $i++){

$j = 0;

$h = 0;

    while($result = mysqli_fetch_assoc($tempresult[$i])){//prolazi kroz svaki upit
    
        $clanak[$i][$j] = $result['naslov']; //ispis naslova

        $clanak_id[$i][$j] = $result['clanak_id']; //ispis id, kojeg korisnimo za prikaz clanka

        //uzimamo sliku iz baze preko clanak id a
        $tempslika[$i][$j] = mysqli_query($link,"select putanja from slika,clanak_slika,clanak where clanak_id ='".$clanak_id[$i][$j]."' and slika_id = slika_id_fk and clanak_id = clanak_id_fk");

        $slika[$i][$j] = mysqli_fetch_array($tempslika[$i][$j]);

        $h++;

        $j++;
    }

    

}  


?>