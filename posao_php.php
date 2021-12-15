<?php
include "config.php";
if(isset($_SESSION['login_user']) && $pravo[0] == 1 ) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset ($_POST['action']) && $_POST['action'] == 'posao') {

        if (!isset($_POST['naslov']) && $_POST['naslov']=='') {
            echo 'Nisi unio naziv posla.';
        }  elseif (!isset($_POST['kratko'])) {
            echo 'Nisi unio kratki opis posla.';
        } elseif (!isset($_POST['opisposla'])) {
            echo 'Nisi unio opis posla.Ponovi';
        } else {
            echo "usao sam";

            $tiposla = $_POST['naslov'];
            $kratko=$_POST['kratko'];
            $opisposla = $_POST['opisposla'];
            $linkk = $_POST['linkk'];

            $stmt = $link->prepare("insert into poslovi(tip_posla,kratko,opis_posla,link) VALUES (?,?,?,?)");

            $stmt->bind_param('ssss', $tiposla,$kratko, $opisposla, $linkk);
            $stmt->execute();
/*
            $stmt = $link->prepare("select poslovi_id from poslovi where tip_posla=? and opis_posla=?");

            $stmt->bind_param('ss', $tiposla, $opisposla);
            $stmt->execute();

            $result = $stmt->get_result();

            $realresult = $result->fetch_array(MYSQLI_BOTH);
            $realres = $realresult['poslovi_id'];
            echo $realres;
            $stmt = $link->prepare("insert into poslodavac (poslodavac,kontakt,poslovi_id_fk) VALUES (?,?,?)");

            $stmt->bind_param('sss', $poslodavac, $kontakt, $realres);
            $stmt->execute();

*/
        }
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset ($_POST['action']) && $_POST['action'] == 'form9') {
        if (!isset($_POST['poslic'])) {
            echo 'Nisi odabrao posao za brisanje';
        } else {
            $id = $_POST['poslic'];
/*
            $sql = "delete from poslodavac where poslovi_id_fk='$id'";
            if (!mysqli_query($link, $sql)) {
                echo("Error description: " . mysqli_error($link));
            }*/
            $sql = "delete from poslovi where poslovi_id='$id'";
            if (!mysqli_query($link, $sql)) {
                echo("Error description: " . mysqli_error($link));
            }
        }
    }
}