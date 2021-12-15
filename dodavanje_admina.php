<?php
 session_start();
 
    require ('login.php');
 
    include ('session.php');
 
    include ('pravo_logiranog.php');

    include ('dodavanje_admina_php.php');

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
     <link rel="stylesheet" type="text/css" href="clanak.css"/>
 
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
<div style="margin-top: 20%; margin-left:5%;">

                    <form action="" method=post>
    Odabir admina :
                     <select name="admin" style="width:20%;"> <br/>

                    <?php while($usr = mysqli_fetch_array($tempusr)) {
        
                    ?>
                     <option  value='<?php echo $usr["email_fk"]; ?>'> <?php echo $usr["username"]; ?> </option>
                   
                   <?php
                          } ?>
                    
                    </select><br/><br/>

                   Ime: <input type=text name=ime /><br/><br/>

                   Prezime: <input type=text name=prezime /><br/><br/>

                   Biografija: <textarea name="biografija"> </textarea>

                          <input type=hidden name=action value=formm  />

                          <input type=submit name=sumbit value=Ucitaj />

                        </form>      
                          
                        </div>

                        </body> 
                        
                        
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


           </html>             
                      
