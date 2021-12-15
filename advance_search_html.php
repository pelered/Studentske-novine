<?php
session_start();
include 'session.php';
include 'config.php';
include 'advance_search.php'
?>
<head>
    <meta charset="utf-8" />
    <title>Search</title>
    <script language="javascript" src="calendar/calendar.js"></script>
</head>
<h1>Search page</h1>
<div class="search-wrapper">
    <form action="" method="post">
        <input name='search' type="text" class="search-input" placeholder="Type to search" size="70">
        <button type="submit" name="Trazi">Traži</button>
<br><br>
        Novinar&ensp;&ensp;&ensp;&ensp;&ensp;
        Kategorija&ensp;&ensp;&ensp;
        Od&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
        Do&ensp;
        <br>
        <select name="novinar"> <br/>
            <option selected value="0">Odaberi</option>

            <?php
            $sql="select * from novinar";
            $res=mysqli_query($link,$sql);
            while($row=mysqli_fetch_array($res)) {
                ?>
                <option value="<?php echo $row['novinar_id'] ?>"><?php echo $row['ime'].' '.$row['prezime']; ?></option> <br/>
                <?php
            }
            ?>
        </select>
        <select name="kategorija"> <br/>
            <option selected value="0">Odaberi</option>
            <?php
            $sql="select * from kategorija";
            $res=mysqli_query($link,$sql);
            while($row=mysqli_fetch_array($res)) {
                ?>
                <option value="<?php echo $row['kategorija_id'] ?>"><?php echo $row['naziv_kategorija']; ?></option> <br/>
                <?php
            }
            ?>
        </select>
        <?php
        require_once('calendar/classes/tc_calendar.php');

        $date3_default = "2005-01-01";
        $date4_default =date("Y-m-d");


        $myCalendar = new tc_calendar("date3", true, false);
        $myCalendar->setIcon("calendar/images/iconCalendar.gif");
        $myCalendar->setDate(date('d', strtotime($date3_default))
            , date('m', strtotime($date3_default))
            , date('Y', strtotime($date3_default)));
        $myCalendar->setPath("calendar/");
        $myCalendar->setYearInterval(2000, 2050);
        $myCalendar->setAlignment('left', 'bottom');
        $myCalendar->setDatePair('date3', 'date4', $date4_default);
        $myCalendar->writeScript();
        echo '     ';
        $myCalendar = new tc_calendar("date4", true, false);
        $myCalendar->setIcon("calendar/images/iconCalendar.gif");
        $myCalendar->setDate(date('d', strtotime($date4_default))
            , date('m', strtotime($date4_default))
            , date('Y', strtotime($date4_default)));
        $myCalendar->setPath("calendar/");
        $myCalendar->setYearInterval(2000, 2050);
        $myCalendar->setAlignment('left', 'bottom');
        $myCalendar->setDatePair('date3', 'date4', $date3_default);
        $myCalendar->writeScript();
        ?>
        <br>


    </form>


</div>
<div>
    <?php
    if($queryResult>0){
        echo "Nađeno je: ".$queryResult." rezultata";    }
        if($queryResult>0){
            while($row=mysqli_fetch_array($result)){
                ?>
                <div>
                    <?php
                   $id= $row['clanak_id'];

                    echo "<a href='clanak.php?id=" . $row['clanak_id'] . "'>
                <h3>" . $row['naslov'] . "</h3>              
            </a>";
                    $slika="select * from slika,clanak_slika,clanak where clanak_id='".$id."' and clanak_id_fk=clanak_id and slika_id_fk=slika_id";
                    $odrediste=mysqli_query($link,$slika);
                    $ispis=mysqli_fetch_array($odrediste);
                    ?>
                    <img src="<?php echo $ispis['putanja']; ?>" height="50%" width="50%">
                    <p><?php echo $row['opis'];?></p>
                </div>
                <?php
            }
        }else{
            echo "Nema rezultata";
        }

    ?>
</div>