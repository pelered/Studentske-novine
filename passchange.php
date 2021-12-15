
<?php

session_start();

require ('login.php');
include ('session.php');
include ('pravo_logiranog.php');
include ('submitpasschange.php');

?>

<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script type="text/javascript"
            src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="searchbox.js"></script>
    <script type="text/javascript" src="login.js"></script>
    <script type="text/javascript" src="loginAjax.js"></script>
    <script type="text/javascript" src="passchange.js"></script>


    <link rel="stylesheet" type="text/css" href="indexcss.css"/>
    <link rel="stylesheet" type="text/css" href="vjesticss.css"/>
    <link rel="stylesheet" type="text/css" href="searchbox.css"/>
    <link rel="stylesheet" type="text/css" href="login.css"/>
    <link rel="stylesheet" type="text/css" href="dom.css"/>
    <link rel="stylesheet" type="text/css" href="styles.css" />


    </head>
    <body>




    <div id="opop" class="maindiv">
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

   <?php if(isset($_SESSION['login_user'])){ ?>

    <div class="divstoljeca">

    <form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
        <div style="width:500px;">
        <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
        <table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
        <tr class="tableheader">
            <td colspan="2">Change Password</td>
        </tr>
        <tr>
        <td width="40%"><label>Current Password</label></td>
            <td width="60%"><input type="password" name="currentPassword" class="txtField"/><span id="currentPassword"  class="required"></span></td>
        </tr>
        <tr>
        <td><label>New Password</label></td>
            <td><input type="password" name="newPassword" class="txtField"/><span id="newPassword" class="required"></span></td>
        </tr>
        <td><label>Confirm Password</label></td>
        <td><input type="password" name="confirmPassword" class="txtField"/><span id="confirmPassword" class="required"></span></td>
        </tr>
        <tr>
        <td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
        </tr>
        <input type="hidden" name="action" value="form44" />
        </table>
    </div>
</form>

</div>

   <?php } ?>

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