<?php
include ('config.php');

$mail_id = $_GET['id'];

$email = $_GET['email'];


if($stmt = $link->prepare("select email_id from email where email = ? ")){
    
                    $stmt->bind_param('s',$email);
    
                    $stmt->execute();
    
                    $fakerus = $stmt->get_result();
    
                    $rus = $fakerus->fetch_array();
                }

 $email_id = $rus[0];


if($email_id == $mail_id){
 
    if(isset($_POST['action']) && $_POST['action'] == 'form44'){

        $newpass = md5($_POST["newPassword"]);


        mysqli_query($link,"UPDATE email set lozinka='".$newpass."' WHERE email_id ='".$email_id."'");

        $message = "Lozinka promijenjena";

      

    }
}
?>