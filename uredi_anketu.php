
<html >
<head>
    <meta charset="UTF-8">
    <title>Uredi anketu</title>
    <?php
    error_reporting(1);
    session_start();
    include 'config.php';
     include 'login.php';
     include ('pravo_logiranog.php');

    $user= $_SESSION['login_user'] ;
    ?>

    <meta charset="UTF-8">

    <script type="text/javascript"
            src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="indexcss.css"/>
    <link rel="stylesheet" type="text/css" href="vjesticss.css"/>
    <link rel="stylesheet" type="text/css" href="searchbox.css"/>
    <link rel="stylesheet" type="text/css" href="login.css"/>
    <link rel="stylesheet" type="text/css" href="dom.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script type="text/javascript" src="searchbox.js"></script>
    <script type="text/javascript" src="login.js"></script>

    <link rel="stylesheet" type="text/css" href="indexcss.css"/>


    <script type="text/javascript" src="app1.js"></script>
    <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
    <style>
        .chart-container {
            width: 400px;
            height: auto;

        }
    </style>


</head>
<body>
<div class="maindiv" id="opop">

    <div class="naslovnidiv">
        <a href="index.php"> <img src="logo.png" class="naslov"/> </a>
        <div class="lists">
            <ul>
           <li> <?php
            if(!isset($_SESSION['login_user'])){
                echo '<a onClick="toggleLogin();" style="cursor:pointer;">LOGIN</a>';
            } 
            else echo $_SESSION['login_user']; ?></li>
         <li><?php if(isset($_SESSION['login_user'])) echo '<a href="logout.php" style="cursor:pointer;">LOGOUT</a>'; ?> </li>
                
                <li><a href="galerija.php">GALERIJA</a></li>
                <?php if(isset($_SESSION['login_user']) && $pravo[0] == 1 ){ ?>
                <li><div class="dropdown">
                        <button onclick="toggleDropdown()"  class="dropbtn">UREĐIVANJE STR.</button>
                        <div id="myDropdown" class="dropdown-content">
                        <a href="dodavanje_clanka.php"> DODAVANJE CLANKA</a>
                        <a href="dodavanje_admina.php">UNOS NOVINARA</a>
                        <a href="posao.php">UNOS POSLA</a><br/>
                        <a href="prikaz_posla.php">  POSLOVI </a>
                        
                        </div>
                    </div>
                </li> 
                <?php }?>
                <li><div class="dropdown">
                    <button onclick="toggleDropdown()" class="dropbtn">STUDENTSKI CENTAR</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="Studentski_dom.php">STUDENTSKI DOM</a>
                        <a href="Studentski_poslovi.php">STUDENTSKI POSLOVI</a>
                    </div>
                </div>
                </li>
                <li><a href="faks.php">FAKS</a></li>
                <li><a href="Vijesti.php"> VIJESTI </a> </li>
                <li><a href="index.php">NASLOVNICA </a></li>
            </ul>
        </div>
        <li> <div class="search-wrapper">
            <div class="input-holder">
                <input type="text" class="search-input" placeholder="Type to search" />
                <button class="search-icon" onmouseover="searchToggle(this, event);"><span></span></button>
            </div>
            <span class="close" onclick="searchToggle(this, event);"></span>
        </div>
        </li>

    </div>


<?php



if (isset($_SESSION['login_user'])) {
    include 'uredi_anketu_php.php';
    ?>

    <div style="margin-top: 15%; margin-left:5%;">

        <form action="" method="post">
            Odaberi pitanje za prikaz na stranici<br>
            <select name="radio">
                <?php while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {

                    ?>
                    <br>
                    <option value='<?php echo $row["pitanje"]; ?>'><?php echo $row["pitanje"]; ?></option>
                    <?php
                }

                ?>
            </select>
            <input type="hidden" name="action" value="form3">
            <br><input type="submit" value="submit" name="submit"><br>
        </form>

        <form action="" method="post">
            <br>Unesi novo pitanje: <br>
            <input name="unos" type="text">
            <input type="hidden" name="action" value="form4">
            <input type="submit" name="submit">
        </form>

        <?php
        $sqll = 'select pitanje from anketa';
        $resultt = mysqli_query($link, $sqll);
        ?>
        <form action="" method="post">
            <br> Odaberi pitanje za uneseni odgovor<br>

            <select name="q">
                <?php while ($row = mysqli_fetch_array($resultt, MYSQLI_BOTH)) {

                    ?>
                    <br>
                    <option value='<?php echo $row["pitanje"]; ?>'><?php echo $row["pitanje"]; ?></option>
                    <?php
                }

                ?>
            </select>
            <br>Unesi odgovor: <input name="odgovor" type="text">
            <input type="hidden" name="action" value="form5">
            <input type="submit" name="submit">
        </form>
        <?php
        $sqll = 'select * from anketa';
        $resultt = mysqli_query($link, $sqll);
        ?>
        <form action="" method="post">
            <br>Odaberi pitanje za brisanje<br>
            <select name="brisanje">
                <?php while ($row = mysqli_fetch_array($resultt, MYSQLI_BOTH)) {

                    ?>
                    <br>
                    <option value='<?php echo $row["anketa_id"]; ?>'><?php echo $row["pitanje"]; ?></option>
                    <?php
                }

                ?>
            </select>
            <input type="hidden" name="action" value="form10">
            <input type="submit" name="submit">
        </form>
        <?php
        $gr = 'select * from anketa';
        $grr = mysqli_query($link, $gr);
        ?>
        <div class="graf">
            <form action="" method="post">
                <br>Odaberi pitanje za prikaz grafa<br>
                <select name="graf">
                    <?php while ($row = mysqli_fetch_array($grr, MYSQLI_BOTH)) {

                        ?>
                        <br>
                        <option value='<?php echo $row["anketa_id"]; ?>'><?php echo $row["pitanje"]; ?></option>
                        <?php
                    }

                    ?>
                </select>
                <input type="hidden" name="action" value="form11">
                <input type="submit" name="submit">
            </form>
        </div>
        <br>

        <?php

        ?>
    </div>
    <div class="chart-container">
        <canvas id="myChart">

        </canvas>
    </div>
    <?php
}
    ?>
    <button onclick="window.location='index.php';">Vrati se</button>
</body>
</html>