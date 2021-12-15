<?php

include('config.php');


if(isset($_POST['action']) && $_POST['action'] == 'form1') {

        $username = $_POST['username'];
        $password = md5($_POST['password']);



   if(!empty($username) || !empty($password)) {    

    
       $stmt = $link->prepare("select username,lozinka,conf_code from korisnik,email where korisnik.email_fk = email.email_id and username = ?");

        $stmt->bind_param('s',$username);

        $stmt->execute();

        $result = $stmt->get_result();

        $realresult = $result->fetch_array();

            if($username == $realresult[0] & $password == $realresult[1]){

                if($realresult[2] == NULL){

            $_SESSION['login_user'] = $username;


           $variable = ' ';
            
                }

                if(!$realresult[2] == NULL){

               $variable =  'Molimo verificirajte email(click here)'; 
                }     
        }
        
        else{

          $variable = "Username ili lozinka ne odgovaraju";
        }
    }
        
     else{

     $variable = "Molim popunite sva polja!" ;

     }

     echo $variable;
    
    }

?>