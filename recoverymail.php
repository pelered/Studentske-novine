<?php 


  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';

           $email = $_POST['useremail'];

            $id = $user['email_id'];

           $subject = "Forgotten password from Studentke novine ";
           //$header = "Studentske: Confirmation from Studentske novine";
           $message = "Please click the link below to change your password.";
           $message .= "http://127.0.0.1/studentske/retrivepass.php?email=$email&id=$id";

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
           $error_message = "Problem sending email.";
           else 
           $error_message = "email sent.";
        
        
?>