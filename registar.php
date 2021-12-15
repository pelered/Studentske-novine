<?php

error_reporting(1);// izbacuje notice a zadrzava errore
include 'config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
            $username = $_POST['usrname'];
            $password = md5($_POST['pass']);
            $email = $_POST['email'];
            $repeatpass =md5($_POST['repeatpass']);
            $code = md5(uniqid(rand()));

     if((!empty($username)) && (!empty($password)) && (!empty($email)) && (!empty($repeatpass)) ){ // provjerava dali su sva polja popunjena 
        
         if (strlen($_POST['pass']) > 5){

            if($password == $repeatpass) {   // ponovljeni pasword mora biti jednak paswordu


            if($stmt = $link->prepare("select count(username) from korisnik where username = ? and username in ( select username from korisnik)")){

                $stmt->bind_param('s',$username);

                $stmt->execute();

                $dumbres = $stmt->get_result();

                $result1 = $dumbres->fetch_array();
            }
            if($stmt = $link->prepare("select count(email) from email where email = ? and email in ( select email from email)")){
                
                                $stmt->bind_param('s',$email);
                
                                $stmt->execute();
                
                                $dumbres1 = $stmt->get_result();
                
                                $result12= $dumbres1->fetch_array();
                            }

           
           if($result1[0] != 0){ // provjerava dali korisnik sa tim userom postoji u bazi(preko count funkcije koja broji redke)

               $error =  "Username vec postoji";
           }

           if($result12[0] != 0){ //provjerava postoji li mail u bazi

            $error = "Email već postoji";

           }
           else{ // ako ne postoji i sve ostalo je ispunjeno upisuje korisnika u bazu

               //mysqli_query($link, "insert into email (email,lozinka,ovlasti) values('$email','$password','2')");

               if($stmt = $link->prepare("insert into email (email,lozinka,ovlasti,conf_code) values(?,?,2,?)")){

                $stmt->bind_param('sss',$email,$password,$code);

                $stmt->execute();

               }

              // $nabavi="select email_id from email where email.email='$email'";

              // $res=mysqli_query($link,$nabavi);

               //$nabavi=mysqli_fetch_array($res);

            if($stmt = $link->prepare("select email_id from email where email.email=? ")){

                $stmt->bind_param('s',$email);

                $stmt->execute();

                $res = $stmt->get_result();

                $nabavi = $res->fetch_array();//

            }


               $nabavi1=$nabavi['email_id'];

            if($stmt = $link->prepare("insert into korisnik(username,email_fk) values(?,?)")) {

                $stmt->bind_param('si',$username,$nabavi1);

                $stmt->execute();
        

             }
           $error = "Uspjesna registracija";

           //$to = $email;
           $subject = "Confirmation from Studentke novine to $username";
           //$header = "Studentske: Confirmation from Studentske novine";
           $message = "Please click the link below to verify and activate your account.";
           $message .= "http://127.0.0.1/studentske/confirm.php?passkey=$code";
           
           $mail = new PHPMailer();
           $mail->IsSMTP();
           $mail->SMTPDebug = 0;
           $mail->SMTPAuth = TRUE;
           $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
           $mail->SMTPSecure = "tls";
           $mail->Port     = 587;  
           $mail->Username = "indexpressupravitelj@gmail.com";
           $mail->Password = "indexpressklc";
           $mail->Host     = "smtp.gmail.com";
           $mail->Mailer   = "smtp";
           $mail->SetFrom("indexpressupravitelj@gmail.com", "Admin");
           $mail->AddAddress($email);
           $mail->Subject = $subject;
           $mail->WordWrap   = 80;
           $mail->MsgHTML($message);
           $mail->IsHTML(true);
           if(!$mail->Send()) 
           echo "Problem sending email.";
           else 
           echo "email sent.";
        }

    

    }

           else $error = "Lozinke se ne podudaraju"; 

}

        else  $error = "Password mora imati najmanje 6 znakova";

}

        else $error = "Niste popunili sva polja";

    }
        
 ?>