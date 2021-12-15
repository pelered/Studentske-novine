<?php
session_start();
include 'session.php';
include 'config.php';
?>
<h1>Search page</h1>
<form action="" method="post">
    <input name='search' type="text" class="search-input" placeholder="Type to search" />
    <input type="submit" name="submit" id="submit" />

</form>
<div>
    <?php
    if (isset($_POST['search']) && $_POST['search']!="" && $_SERVER['REQUEST_METHOD'] == 'POST' ){
        $search=mysqli_real_escape_string($link,$_POST['search']);
        $sql="select * from clanak where naslov LIKE '%$search%' or opis LIKE '%$search%' or datum_vrijeme_objave LIKE '%$search%' or sadrzaj LIKE '%$search%'";
        $result=mysqli_query($link,$sql);
        $queryResult=mysqli_num_rows($result);
        echo "Nađeno je: ".$queryResult." rezultata";
        if($queryResult>0){
            while($row=mysqli_fetch_array($result)){
                ?>
                <div>
                    <?php
                echo "<a href='clanak.php?id=" . $row['clanak_id'] . "'>
                <h3>" . $row['naslov'] . "</h3>;
            </a><br>";
                $id=$row['clanak_id'];
                $slika="select putanja from slika,clanak_slika,clanak where clanak_id='".$id."' and clanak_id_fk=clanak_id and slika_id_fk=slika_id";
                $odrediste=mysqli_query($link,$slika);
                $ispis=mysqli_fetch_array($odrediste);
                ?>
                <img src="<?php echo $ispis['putanja']; ?>" width="50%" height="50%">
                </div>

    <?php
            }
        }else{
            echo "Nema rezultata";
        }
    }
    ?>
</div>