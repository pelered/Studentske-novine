<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset ($_POST['action']) &&  $_POST['action']=='form3') {
if(!isset($_POST['radio'])){
echo 'Nisi odabrao pitanje.Ponovi';
}else {
$pit = $_POST['radio'];
$sql = "update anketa set prikaz=1 where pitanje='" . $pit . "'";
mysqli_query($link, $sql);
$sql = "update anketa set prikaz=0 where NOT pitanje='" . $pit . "'";
mysqli_query($link, $sql);
// problem ce biti sto ako se postavi isto pitanje za godinu dana,ovo ce updatat onda oba pitanja
}

}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset ($_POST['action']) &&  $_POST['action']=='form4') {
if(!isset($_POST['unos']) or $_POST['unos']==''){
echo 'Nisi unio pitanje.Ponovi';
}else {
$novinar = "select distinct novinar_id from korisnik,email,novinar where korisnik.username='$user' and email_fk=email_id and username_id=username_id_fk";
$result = mysqli_query($link, $novinar);
$realresult = mysqli_fetch_array($result, MYSQLI_BOTH);
$novinar = $realresult['novinar_id'];
$pita = $_POST['unos'];
$stmt = $link->prepare("insert into anketa (pitanje,novinar_id_fk) VALUES (?,?)");

$stmt->bind_param('si',$pita,$novinar);

$stmt->execute();
}
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset ($_POST['action']) &&  $_POST['action']=='form5') {
if(!isset($_POST['q']) ){
echo "Nisi odabrao pitanje. Ponovi.";
}elseif (!isset($_POST['odgovor'])or $_POST['odgovor']==''){
echo 'Odgovor nije postavljen.';

}else {
$qu = $_POST['q'];
$o = $_POST['odgovor'];
$sql = "select anketa_id from anketa where pitanje='$qu'";
$result = mysqli_query($link, $sql);
$realres = mysqli_fetch_array($result, MYSQLI_BOTH);
$realres = $realres['anketa_id'];

$stmt = $link->prepare("insert into odgovori(odgovor,br_ankete_fk,broj) VALUES (?,?,?)");
$broj=0;
$stmt->bind_param('ssi',$o,$realres,$broj);
$stmt->execute();



}
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset ($_POST['action']) &&  $_POST['action']=='form10') {
if(!isset($_POST['brisanje']) ){
echo "Nisi odabrao pitanje. Ponovi.";
}else {
$id_an = $_POST['brisanje'];
echo $id_an;
$sql="delete from odgovori where br_ankete_fk='$id_an'";
if (!mysqli_query($link,$sql))
{
echo("Error description: " . mysqli_error($link));
}
$sql="delete from anketa where anketa_id='$id_an'";
if (!mysqli_query($link,$sql))
{
echo("Error description: " . mysqli_error($link));
}
}
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset ($_POST['action']) &&  $_POST['action']=='form11') {
    if(!isset($_POST['graf']) ){
        echo "Nisi odabrao pitanje. Prikaz graf koji je trenutno na početnoj stranici.";
    }else {
        //echo $_POST['graf'];
        $id=$_POST['graf'];
        $_SESSION['graf']=$id;
        //echo $_SESSION['graf'];
        $query = sprintf("select odgovor,broj from anketa,odgovori where anketa_id='$id' and anketa_id=br_ankete_fk");
       //echo 'usao sam'.$id;
        //echo $query;

    }
}

$sql = 'select * from anketa';
$result = mysqli_query($link, $sql);