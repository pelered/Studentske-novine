<?php 

    session_start();

    require ('login.php');

   include ('session.php');

   include ('neznam_kak.php');

   include ('pravo_logiranog.php');
   
    ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vijesti</title>
    <script type="text/javascript"
            src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="indexcss.css"/>
    <link rel="stylesheet" type="text/css" href="vjesticss.css"/>
    <link rel="stylesheet" type="text/css" href="searchbox.css"/>
    <link rel="stylesheet" type="text/css" href="login.css"/>
    <link rel="stylesheet" type="text/css" href="dom.css"/>

    <script type="text/javascript" src="searchbox.js"></script>
    <script type="text/javascript" src="login.js"></script>
    <script type="text/javascript" src="loginAjax.js"></script>



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
                        <a href="prikaz_posla.php">  POSLOVI </a><br/>
                        <a href="josko.php"> UNOS GALERIJE </a>
                        
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
                <li><a href="faks.php">FAKULTET</a></li>
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



    <div class="submainvijesti1">

    <div class="clanakdiv0" >

    <a href="clanak.php?id=<?php echo $clanak_id[0][0] ?>"><?php echo '<img src="'.$slika[0][0][0].'" class="slikavijest">'; ?>

        <p class="textclanka"><?php echo $clanak[0][0]; ?></p> </a>

    </div>

    <div class="maindiv2vijesti"> 

        <div class="clanakdiv11"><a href="clanak.php?id=<?php echo $clanak_id[0][1] ?>"><?php echo '<img src="'.$slika[0][1][0].'" class="pic1">'; ?> 

        <p class="textclanka1"><?php echo $clanak[0][1]; ?></p> </a> </div>

        <div class="clanakdiv22"><a href="clanak.php?id=<?php echo $clanak_id[0][2] ?>"><?php echo '<img src="'.$slika[0][2][0].'" class="pic1">'; ?> 

        <p class="textclanka1"><?php echo $clanak[0][2]; ?></p> </a> </div>

    </div>
    </div>

    <div class="submainvijesti">

        <div class="spliter"><p class="splitertext">Sport</p></div>

            <div class="clanakdivvijesti">

            <a href="clanak.php?id=<?php echo $clanak_id[1][0] ?>"><?php echo '<img src="'.$slika[1][0][0].'" class="pic1">'; ?>

            <p class="textclanka1"><?php echo $clanak[1][0]; ?></p> </a> </div>


            </div>

            <div class="submain2">

                <div class="clanakdiv1svijesti"><a href="clanak.php?id=<?php echo $clanak_id[1][1] ?>"><?php echo '<img src="'.$slika[1][1][0].'" class="pic1">'; ?>

                <p class="but2"><?php echo $clanak[1][1]; ?></p> </a> </div>

                <div class="clanakdiv1svijesti"><a href="clanak.php?id=<?php echo $clanak_id[1][2] ?>"><?php echo '<img src="'.$slika[1][2][0].'" class="pic1">'; ?>

                <p class="but2"><?php echo $clanak[1][2]; ?></p> </a> </div>

                <div class="clanakdiv1svijesti"><a href="clanak.php?id=<?php echo $clanak_id[1][3] ?>"><?php echo '<img src="'.$slika[1][3][0].'" class="pic1">'; ?>

                <p class="but2"><?php echo $clanak[1][3]; ?></p> </a> </div>

                <div class="clanakdiv1svijesti"><a href="clanak.php?id=<?php echo $clanak_id[1][4] ?>"><?php echo '<img src="'.$slika[1][4][0].'" class="pic1">'; ?>

                <p class="but2"><?php echo $clanak[1][4]; ?></p> </a> </div>



            </div>
    </div>
    <div class="submainvijesti">

    <div class="spliter"><p class="splitertext">Znanost</p></div>
     <div class="clanakdivvijesti">

     <a href="clanak.php?id=<?php echo $clanak_id[2][0] ?>"><?php echo '<img src="'.$slika[2][0][0].'" class="pic1">'; ?>
     
     <p class="textclanka1"><?php echo $clanak[2][0]; ?></p> </a> </div>
     

    </div>

    <div class="submain2">
    <div class="clanakdiv1svijesti"><a href="clanak.php?id=<?php echo $clanak_id[2][1] ?>"><?php echo '<img src="'.$slika[2][1][0].'" class="pic1">'; ?>
    
                    <p class="but2"><?php echo $clanak[2][1]; ?></p> </a> </div>
    
                    <div class="clanakdiv1svijesti"><a href="clanak.php?id=<?php echo $clanak_id[2][2] ?>"><?php echo '<img src="'.$slika[2][2][0].'" class="pic1">'; ?>
    
                    <p class="but2"><?php echo $clanak[2][2]; ?></p> </a> </div>
    
                    <div class="clanakdiv1svijesti"><a href="clanak.php?id=<?php echo $clanak_id[2][3] ?>"><?php echo '<img src="'.$slika[2][3][0].'" class="pic1">'; ?>
    
                    <p class="but2"><?php echo $clanak[2][3]; ?></p> </a> </div>
    
                    <div class="clanakdiv1svijesti"><a href="clanak.php?id=<?php echo $clanak_id[2][4] ?>"><?php echo '<img src="'.$slika[2][4][0].'" class="pic1">'; ?>
    
                    <p class="but2"><?php echo $clanak[2][4]; ?></p> </a> </div>


    </div>
    </div>
    <div class="submainvijesti">

<div class="spliter"><p class="splitertext">Kultura</p></div>
    <div class="clanakdivvijesti">

    <a href="clanak.php?id=<?php echo $clanak_id[3][0] ?>"><?php echo '<img src="'.$slika[3][0][0].'" class="pic1">'; ?>
    
    <p class="textclanka1"><?php echo $clanak[3][0]; ?></p> </a> </div>
    
</div>

<div class="submain2">
<div class="clanakdiv1svijesti"><a href="clanak.php?id=<?php echo $clanak_id[3][1] ?>"><?php echo '<img src="'.$slika[3][1][0].'" class="pic1">'; ?>

                <p class="but2"><?php echo $clanak[3][1]; ?></p> </a> </div>

                <div class="clanakdiv1svijesti"><a href="clanak.php?id=<?php echo $clanak_id[3][2] ?>"><?php echo '<img src="'.$slika[3][2][0].'" class="pic1">'; ?>

                <p class="but2"><?php echo $clanak[3][2]; ?></p> </a> </div>

                <div class="clanakdiv1svijesti"><a href="clanak.php?id=<?php echo $clanak_id[3][3] ?>"><?php echo '<img src="'.$slika[3][3][0].'" class="pic1">'; ?>

                <p class="but2"><?php echo $clanak[3][3]; ?></p> </a> </div>

                <div class="clanakdiv1svijesti"><a href="clanak.php?id=<?php echo $clanak_id[3][4] ?>"><?php echo '<img src="'.$slika[3][4][0].'" class="pic1">'; ?>

                <p class="but2"><?php echo $clanak[3][4]; ?></p> </a> </div>

</div>
    </div>
    <div class="submainvijesti">

        <div class="spliter"><p class="splitertext">Lifestyle</p></div>
        <div class="clanakdivvijesti">

        <a href="clanak.php?id=<?php echo $clanak_id[4][0] ?>"><?php echo '<img src="'.$slika[4][0][0].'" class="pic1">'; ?>

        <p class="textclanka1"><?php echo $clanak[4][0]; ?></p> </a> </div>

        </div>

        <div class="submain2">

        <div class="clanakdiv1svijesti"><a href="clanak.php?id=<?php echo $clanak_id[4][1] ?>"><?php echo '<img src="'.$slika[4][1][0].'" class="pic1">'; ?>

                <p class="but2"><?php echo $clanak[4][1]; ?></p> </a> </div>

                <div class="clanakdiv1svijesti"><a href="clanak.php?id=<?php echo $clanak_id[4][2] ?>"><?php echo '<img src="'.$slika[4][2][0].'" class="pic1">'; ?>

                <p class="but2"><?php echo $clanak[4][2]; ?></p> </a> </div>

                <div class="clanakdiv1svijesti"><a href="clanak.php?id=<?php echo $clanak_id[4][3] ?>"><?php echo '<img src="'.$slika[4][3][0].'" class="pic1">'; ?>

                <p class="but2"><?php echo $clanak[4][3]; ?></p> </a> </div>

                <div class="clanakdiv1svijesti"><a href="clanak.php?id=<?php echo $clanak_id[4][4] ?>"><?php echo '<img src="'.$slika[4][4][0].'" class="pic1">'; ?>

                <p class="but2"><?php echo $clanak[4][4]; ?></p> </a> </div>

        </div>

    </div>


    <div class="submainvijesti">

    <div class="spliter"><p class="splitertext">Kolumne</p></div>
    <div class="clanakdivvijesti">

    <a href="clanak.php?id=<?php echo $clanak_id[5][0] ?>"><?php echo '<img src="'.$slika[5][0][0].'" class="pic1">'; ?>

    <p class="textclanka1"><?php echo $clanak[5][0]; ?></p> </a> </div>


    </div>

    <div class="submain2">

    <div class="clanakdiv1svijesti"><a href="clanak.php?id=<?php echo $clanak_id[5][1] ?>"><?php echo '<img src="'.$slika[5][1][0].'" class="pic1">'; ?>
    
                    <p class="but2"><?php echo $clanak[5][1]; ?></p> </a> </div>
    
                    <div class="clanakdiv1svijesti"><a href="clanak.php?id=<?php echo $clanak_id[5][2] ?>"><?php echo '<img src="'.$slika[5][2][0].'" class="pic1">'; ?>
    
                    <p class="but2"><?php echo $clanak[5][2]; ?></p> </a> </div>
    
                    <div class="clanakdiv1svijesti"><a href="clanak.php?id=<?php echo $clanak_id[5][3] ?>"><?php echo '<img src="'.$slika[5][3][0].'" class="pic1">'; ?>
    
                    <p class="but2"><?php echo $clanak[5][3]; ?></p> </a> </div>
    
                    <div class="clanakdiv1svijesti"><a href="clanak.php?id=<?php echo $clanak_id[5][4] ?>"><?php echo '<img src="'.$slika[5][4][0].'" class="pic1">'; ?>
    
                    <p class="but2"><?php echo $clanak[5][4]; ?></p> </a> </div>

    </div>

    </div>


    <div class="footer">
        <p class="footertext">© Copyright RWA-2017/18</p>
        <p class="footertext">Antonio Franović, Ivan Gojak, Petra Hrelić</p>

    </div>



</div>

<form action = "" method ="post" id="ovomitreba" >
    <div  id="tote" class="login">
        <div class="closelogin" onclick="toggleLogin()"> <img class="closeloginpic" src="closebtn.jpg"/></div>
        <div> <img class="avatarimg" src="avatar.png" ></div>
        <div><input class="username" type="text" name="username" placeholder="Username..."></div>
        <div> <input class="username" type="password" name="password" placeholder="Insert password" ></div>
        <input type="hidden" name="action" value="form1">
        <div > <input class="submitbutton" type="submit" value ="Log in" name="submitbutton" id="submit12" /> </div>
        <div><a href="registracija.php"><p class="registertext">Nemate račun? Registrirajte se!</p> </a>
        <div><a href="forgotpassword.php"><p class="registertext">Zaboravljena lozinka?</p> </a>
        <a href="resendverification.php"> <span class="loginerrortext" id="error_message"></span></a>   
            
            </div>
</form>


</body>

</html>
