<?php

include 'session.php';

$mode = $_POST['mode'];
$vote = $_POST['vote'];
//Name of our cookie
$cookie = "Voted";
$user= $_SESSION['login_user'] ;


         if(isset($_SESSION['login_user']) && $pravo[0] == 1 ){ ?>

            <button onclick="window.location='uredi_anketu.php';">Uredi anketu</button><br>
        <?php }


    //makes sure they haven't already voted
    if(isset($_COOKIE[$cookie]))
    {
        echo "Sorry You have already voted this month<br>";
    }
    //sets a cookie
    else{
        // adds their vote to the database
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset ($_POST['mode']) &&  $_POST['mode']=='voted' && isset($_POST['radio'])) {

            $month = 2592000 + time();
            setcookie(Voted, Voted, $month);
            $_COOKIE['Voted']=Voted;

            //var_dump($_COOKIE);
            echo "<span>You have selected :<b> " . $_POST['radio'] . "</b></span>";
            $odgovor = $_POST['radio'];
            $stmt = $link->prepare("update odgovori set broj=broj+1 where odgovori.odgovor=?");
            $stmt->bind_param('s', $odgovor);
            $stmt->execute();


        }else {echo "<span>Please choose any radio button.</span>";
            }


    }




if(isset($_COOKIE[$cookie])){
    include 'result.php';
?>

    <script type="text/javascript" src="app.js"></script>
    <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <?php


}else{// ide forma ovdje


    ?>
    <fieldset >

        

        <?php


        $prikaz="select pitanje from anketa where prikaz=1";
        $result = mysqli_query($link,$prikaz);
        $realresult = mysqli_fetch_array($result,MYSQLI_BOTH);
        $pitanje=$realresult['pitanje'];

        ?>
        <legend class="textankete"><?php echo $pitanje  ?></legend>
        <form  id="form1" name="vote" method="post" action="" >

            <?php
            $pitanje="select odgovor from odgovori where odgovori.br_ankete_fk=(select anketa_id from anketa where prikaz=1)";
            $result = mysqli_query($link,$pitanje);
            while($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
                ?>
                <input type='radio' name="radio" value='<?php echo $row["odgovor"];?>'> <?php echo $row["odgovor"]; ?> <br>
                <?php
            }

            ?>

            <input type=hidden name=mode value=voted>
            <input type="submit" name="submit" id="submit" value="Vote" />


        </form>
        <button id="myButton" value="Rezultat" onclick="myFunction()">Rezulta</button>
    </fieldset>


<?php
}
?>

