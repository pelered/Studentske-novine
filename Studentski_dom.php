
<?php 

session_start();

require ('login.php');
include ('session.php');
include ('pravo_logiranog.php');

    ?>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Studentski dom</title>
   <script type="text/javascript"
            src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="searchbox.js"></script>
    
    <script type="text/javascript" src="login.js"></script>
    <script type="text/javascript" src="loginAjax.js"></script>

    <link rel="stylesheet" type="text/css" href="indexcss.css"/>
    <link rel="stylesheet" type="text/css" href="vjesticss.css"/>
    <link rel="stylesheet" type="text/css" href="searchbox.css"/>
    <link rel="stylesheet" type="text/css" href="dom.css"/>
    <link rel="stylesheet" type="text/css" href="login.css"/>

</head>


<body>

<div class="maindiv">

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


<div class="maindiv1dom">

 <div class="clanakdivdom1">

     <img src="dom.jpg" class="slikadom" />

 </div>
</div>
<div class="maindiv2dom">

	<div class="tekstdiv">
		<h1> Studentski dom</h1>
		<p>Tekst o studentskom domu. Nesto opcenito o njemu da studenti znaju sto da rade kad dodu u dom, mozemo i nesto za brucose stavit da se upoznaju s domom. I jos svašta o domu.</p>
	</div>
</div>

	<div class="spliter"><p class="splitertext">Novosti o studentskom centru</p></div>

<div class="domdiv">
	<div class="clanakdivdom"><p class="but2">1.Članak</p>
	</div>

	<div class="clanakdivdom"><p class="but2" >2. Članak</p>

	</div>

	<div class="clanakdivdom"><p class="but2">3.Članak</p>
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
