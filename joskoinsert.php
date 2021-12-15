<?php

include('config.php');

if(isset($_POST['action']) && $_POST['action'] == 'form22'){

    $naslov = $_POST['title'];

   $stmt = $link->prepare("insert into galerija (title,folder,putanjaprve) values(?,?,?)");
   
           $stmt->bind_param('sss',$naslov,$target_dir,$putanjaprve);
   
           $stmt->execute();

}

?>
