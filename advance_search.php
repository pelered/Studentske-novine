<?php
if (isset($_POST['search']) && $_POST['search']!="" && $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    //opceniti search
    $search = mysqli_real_escape_string($link, $_POST['search']);
    $sql = "select * from clanak where naslov LIKE '%$search%' or opis LIKE '%$search%' or datum_vrijeme_objave LIKE '%$search%' or sadrzaj LIKE '%$search%'";
    //dodali smo novinara
    if ($_POST['novinar'] != 0) {
        $gId = $_POST['novinar'];
        $i = 0;//prvojera za datum
        $j = 0;//provjera za kategoriju

        $sql = "select * from clanak where (naslov LIKE '%$search%' or opis LIKE '%$search%' or datum_vrijeme_objave LIKE '%$search%' or sadrzaj LIKE '%$search%') and '$gId'=novinar_id_fk";
        if ($_POST['kategorija'] != 0) {
            $j = 1;
            $kat = $_POST['kategorija'];
            $sql = "select distinct clanak_id,naslov from kategorija,clanak,clanak_kategorija where (naslov LIKE '%$search%' or opis LIKE '%$search%' or datum_vrijeme_objave LIKE '%$search%' or sadrzaj LIKE '%$search%') and kategorija_id=kategorija_id_fk and clanak_id=clanak_id_fk and kategorija_id='$kat' and novinar_id_fk='$gId'";
            if (isset($_POST['date3']) && isset($_POST['date4'])) {
                $date1 = $_POST['date3'];
                $date2 = $_POST['date4'];
                $sql = "select distinct clanak_id,naslov from kategorija,clanak,clanak_kategorija where (naslov LIKE '%$search%' or opis LIKE '%$search%' or sadrzaj LIKE '%$search%')and DATE(datum_vrijeme_objave) BETWEEN '$date1' and '$date2' and kategorija_id=kategorija_id_fk and clanak_id=clanak_id_fk and kategorija_id='$kat' and novinar_id_fk='$gId'";
                $i = 1;

            }
        }
    }
         if(isset($_POST['date3']) && isset($_POST['date4']) && $i==0){
             $date1=$_POST['date3'];
             $date2=$_POST['date4'];
             $sql = "select * from clanak where (naslov LIKE '%$search%' or opis LIKE '%$search%' or sadrzaj LIKE '%$search%') and DATE(datum_vrijeme_objave) BETWEEN '$date1' and '$date2'";
             if ($_POST['kategorija'] != 0 && $j==0) {
                 $j=1;
                 $kat = $_POST['kategorija'];
                 $sql = "select distinct clanak_id,naslov from kategorija,clanak,clanak_kategorija where (naslov LIKE '%$search%' or opis LIKE '%$search%' or sadrzaj LIKE '%$search%') and kategorija_id=kategorija_id_fk and clanak_id=clanak_id_fk and kategorija_id='$kat' and DATE(datum_vrijeme_objave) BETWEEN '$date1' and '$date2'";

             }

         }
        if ($_POST['kategorija'] != 0 && $j==0) {
            $kat = $_POST['kategorija'];
            $sql = "select distinct clanak_id,naslov from kategorija,clanak,clanak_kategorija where (naslov LIKE '%$search%' or opis LIKE '%$search%' or datum_vrijeme_objave LIKE '%$search%' or sadrzaj LIKE '%$search%') and kategorija_id=kategorija_id_fk and clanak_id=clanak_id_fk and kategorija_id='$kat'";

        }


// slanje sql upita


    $result = mysqli_query($link, $sql);
    if (!$result) {
        die('Invalid query: ' . mysqli_error());
    }

    $queryResult = mysqli_num_rows($result);
}/*
if ($_POST['novinar']!=0) {
    //trazenje clanka
    $novinar =  $_POST['novinar'];
    $getId="select novinar_id from novinar where novinar_id='$novinar'";
//'%$novinar%'
    if (!$result = mysqli_query($link, $getId)) {
        die('Invalid query: ' . mysqli_error());
    }
    $gId=mysqli_fetch_array($result);
    $gId=$gId['novinar_id'];
    echo $gId;
    $i=0;
    $sql="select distinct clanak_id,naslov from novinar,clanak where '$gId'=novinar_id_fk";
    if($_POST['kategorija']!=0){
        $kat=mysqli_real_escape_string($link,$_POST['kategorija']);
        $sql="select distinct clanak_id,naslov from novinar,kategorija,clanak,clanak_kategorija where kategorija_id=kategorija_id_fk and clanak_id=clanak_id_fk and naziv_kategorija LIKE '%$kat%' and novinar_id='$gId'";
        if(isset($_POST['date3']) && isset($_POST['date4'])){
            $date1=$_POST['date3'];
            $date2=$_POST['date4'];
            $sql="select distinct clanak_id,naslov from novinar,kategorija,clanak,clanak_kategorija where kategorija_id=kategorija_id_fk and clanak_id=clanak_id_fk and naziv_kategorija LIKE '%$kat%' and novinar_id='$gId' and DATE(datum_vrijeme_objave) BETWEEN '$date1' and '$date2'";
            $i=1;

        }
    }
    if(isset($_POST['date3']) && isset($_POST['date4']) && $i==0){
        $date1=$_POST['date3'];
        $date2=$_POST['date4'];
        $sql="select distinct clanak_id,naslov from novinar,clanak WHERE novinar_id='$gId' and DATE(datum_vrijeme_objave) BETWEEN '$date1' and '$date2'";
    }


    $result = mysqli_query($link, $sql);
    if (!$result) {
        die('Invalid query: ' . mysqli_error());
    }

    $queryResult = mysqli_num_rows($result);
    //$id=$row['clanak_id'];
    //trazenje slike

}
if (isset($_POST['Trazi']) && $_POST['kategorija']!="" && isset($_POST['kategorija'])) {
    $kat=mysqli_real_escape_string($link,$_POST['kategorija']);
    echo $kat;
    $sql="select distinct clanak_id,naslov from novinar,kategorija,clanak,clanak_kategorija where kategorija_id=kategorija_id_fk and clanak_id=clanak_id_fk and naziv_kategorija LIKE '%$kat%'";


    if(isset($_POST['date3']) && isset($_POST['date4'])){
        $date1=$_POST['date3'];
        $date2=$_POST['date4'];
        $sql="select distinct clanak_id,naslov from novinar,kategorija,clanak,clanak_kategorija where kategorija_id=kategorija_id_fk and clanak_id=clanak_id_fk and naziv_kategorija LIKE '%$kat%' and DATE(datum_vrijeme_objave) BETWEEN '$date1' and '$date2'";
    }
    if (!$result = mysqli_query($link, $sql)) {
        die('Invalid query: ' . mysqli_error());
    }
    $queryResult = mysqli_num_rows($result);

}

if (isset($_POST['Trazi']) && isset($_POST['date3']) && isset($_POST['date4'])) {
    $date1=$_POST['date3'];
    $date2=$_POST['date4'];
    $sql="select * from clanak where DATE(datum_vrijeme_objave) BETWEEN '$date1' and '$date2'";
    if (!$result = mysqli_query($link, $sql)) {
        die('Invalid query: ' . mysqli_error());
    }
    $queryResult = mysqli_num_rows($result);

}*/