 <?php
 session_start();
 
    require ('login.php');
 
    include ('session.php');
 
    include ('prikazClanka.php');

    include ('post_komentara.php');

    include ('pravo_logiranog.php');

    include ('uredivanje_clanka.php');

    include ('insertocjene.php');

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
     <link rel="stylesheet" type="text/css" href="ocjenjivanje.css"/>
     <link rel="stylesheet" type="text/css" href="font.css"/>
 
     <script type="text/javascript" src="searchbox.js"></script>
     <script type="text/javascript" src="login.js"></script>
     <script type="text/javascript" src="loginAjax.js"></script>
 
 
    <script type="text/javascript" src="nicEdit.js"></script>

    <script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
    </script>
 
 
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
             else echo $login_user ; ?></li>
          <li><?php if(isset($_SESSION['login_user'])) echo '<a href="logout.php" style="cursor:pointer;">LOGOUT</a>'; ?> </li>
                 <li><a href="galerija.php">GALERIJA</a></li>
                 <li>STUDENTI</li>
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
     
<div class = "maindiv" style="margin-top:16%">

<head><title><?php echo $result[0]; ?></title></head>

<body>

<?php

if($pravo[0] != 1){ ?>

<p><?php echo $result[0]; ?></p>


<p><?php echo $result[1]; ?></p>

<p><?php 

echo '<img src="'.$slika[0].'" width=1205 height=700 >';

?></p>
<p><?php echo $result[2]; ?></p>

<?php } 

else if($pravo[0] == 1){ ?>

    <form action="" method=post target=votar>
    <input type="hidden" name="action" value="form3">
    <p><textarea name=naslov1 cols=170><?php echo $result[0]; ?></textarea></p>
    <input type=submit value=Promjeni />
    </form>

    <form action="" method=post target=votar>
    <input type="hidden" name="action" value="form4">
    <p><textarea name=opis1 cols=170><?php echo $result[1]; ?></textarea></p>
    <input type=submit value=Promjeni />
    </form>

    <p><?php 

    echo '<img src="'.$slika[0].'" width=1205 height=700 >';

    ?></p>

   
<form action="" method=post target=votar>
    <input type="hidden" name="action" value="form5">
    <p><textarea name=sadrzaj1 cols=170><?php echo $result[2]; ?></textarea></p>
    <input type=submit value=Promjeni />
    </form>

<form action="" method=post target=votar>
    <input type="hidden" name="action" value="form6">
    <input type=submit value="Izbrisi clanak" />
    </form>




<?php } ?>



<iframe name="votar" style="display:none;"></iframe>

<?php if(isset($_SESSION['login_user']) && !isset($_COOKIE[$ida])) { ?>
 
    Ocjeni članak : 

<div class="ocjenjivanje"> 
    <form id="ratingsForm" action="" method="post">
    <div class="stars">
        <input type="radio" name="star" class="star-1" value=1 id="star-1"  />
        <label class="star-1" for="star-1">1</label>
        <input type="radio" name="star" class="star-2" value=2 id="star-2"  />
        <label class="star-2" for="star-2">2</label>
        <input type="radio" name="star" class="star-3" value=3 id="star-3"  />
        <label class="star-3" for="star-3">3</label>
        <input type="radio" name="star" class="star-4" value=4 id="star-4"  />
        <label class="star-4" for="star-4">4</label>
        <input type="radio" name="star" class="star-5" value=5 id="star-5"  />
        <label class="star-5" for="star-5">5</label>
        <span></span>
    </div>
    <input type="submit" value="ocjeni" />
    <input type="hidden" name="action" value="ocjena" />
</form>
</div>

<?php } ?>

<?php if(isset($prosjek[0])){ ?>

<div > <?php echo "Ocjena clanka: ".$prosjek[0]; ?> </div> <br/><br/>

<?php } ?>

<?php if(isset($_SESSION['login_user'])){


    echo $_SESSION['login_user']."<br/>";

    echo '<form action="" method = "post" >

    <input type="hidden" name="action" value="form2" />

    <textarea name="komentar" cols=150 row=10></textarea>

    <input type="submit" value="Komentiraj" />

    </form>';

}
?>

<p>Prikaz Komentara</p><br/><br/>

<?php for($g = 0; $g < $brcoment[0]; $g++){ 

echo '<b>'.$nameofuser[$g][0].'  '.$vrijemedatum[$g].';  </b><br/><br/>

<p>'.$zkomentar[$g].' </p>';

if($pravo[0]==1){

 echo'  <form action="" method=post target=votar>
        <input type="hidden" name="action" value="form7">
        <input type="hidden" name="action1" value="'.$g.'">
        <input type=submit value="Izbrisi komentar" />
        </form>';
    }

}

?>

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
    
    










