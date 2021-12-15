<?php
include ('config.php');

if(isset($_SESSION['login_user'])){


$user = $_SESSION['login_user'];

if($stmt = $link->prepare("select email_fk from korisnik where username = ? ")){
    
                    $stmt->bind_param('s',$user);
    
                    $stmt->execute();
    
                    $fakerus = $stmt->get_result();
    
                    $rus = $fakerus->fetch_array();
                }

 $email_id = $rus[0];

 if($stmt = $link->prepare("select lozinka from email where email_id = ? ")){
    
                    $stmt->bind_param('s',$email_id);
    
                    $stmt->execute();
    
                    $fakekey = $stmt->get_result();
    
                    $key = $fakekey->fetch_array();
                }
 
 
if(isset($_POST['action']) && $_POST['action'] == 'form44'){

   $newpass = md5($_POST["newPassword"]);

    if(md5($_POST["currentPassword"]) == $key[0]) {

    mysqli_query($link,"UPDATE email set lozinka='".$newpass."' WHERE email_id ='".$email_id."'");

    $message = "Lozinka promijenjena";

} 

else $message = "Trenutna lozinka je pogrešna.";

}
}
?>