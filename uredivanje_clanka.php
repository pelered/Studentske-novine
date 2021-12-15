<?php

    include('config.php');


    if(isset($_POST['action']) && $_POST['action'] == 'form3'){


   // $sql = "UPDATE `clanak` SET `naslov` = '$naslov1' WHERE `clanak_id`= '$id'";

   // mysqli_query($link,$sql); without prepared statments

    $stmt = $link->prepare("UPDATE clanak SET naslov = ? WHERE clanak_id = ? "); // using prepared statments

        if ($stmt === false) {

        trigger_error($link->error, E_USER_ERROR);

        return; }

        $naslov1 = $_POST['naslov1'];
        
        $stmt->bind_param('si', $naslov1, $id);

        $status = $stmt->execute();

        if ($status === false) {

         trigger_error($stmt->error, E_USER_ERROR);

        }


    }

    if(isset($_POST['action']) && $_POST['action'] == 'form4'){
        

    $stmt = $link->prepare("UPDATE clanak SET opis = ? WHERE clanak_id = ? ");
          
        if ($stmt === false) {
          
        trigger_error($link->error, E_USER_ERROR);
          
        return; }
          
        $opis1 = $_POST['opis1'];
                  
        $stmt->bind_param('si', $opis1, $id);
          
        $status = $stmt->execute();
          
        if ($status === false) {
          
        trigger_error($stmt->error, E_USER_ERROR);
        
            
        }
  
}

    if(isset($_POST['action']) && $_POST['action'] == 'form5'){

    $stmt = $link->prepare("UPDATE clanak SET sadrzaj = ? WHERE clanak_id = ? ");
             
        if ($stmt === false) {
             
        trigger_error($link->error, E_USER_ERROR);
             
        return; }
             
        $sadrzaj1 = $_POST['sadrzaj1'];
                     
        $stmt->bind_param('si', $sadrzaj1, $id);
             
        $status = $stmt->execute();
             
        if ($status === false) {
             
        trigger_error($stmt->error, E_USER_ERROR);
             
            }
                   
        } 


        
        if(isset($_POST['action']) && $_POST['action'] == 'form6'){

        $stmt  = $link->prepare("DELETE FROM clanak WHERE clanak.clanak_id = ?");
        
                if($stmt === false){

                         trigger_error($link->error,E_USER_ERROR);   
                 }

        $stmt->bind_param('i',$id);

        $status = $stmt->execute();

                if($status === false) {

                trigger_error($stmt->error,E_USER_ERROR);

                }


        }

        if(isset($_POST['action']) && $_POST['action'] == 'form7'){
            

        $stmt  = $link->prepare("DELETE FROM komentar WHERE komentar.sadrzaj = ?");
                        
                 if($stmt === false){
                
                        trigger_error($link->error,E_USER_ERROR); 

                        }

        $gg  = $_POST['action1']; // govori nam koji je komentar odabran       
        

        $stmt->bind_param('s',$zkomentar[$gg]);
                
        $status = $stmt->execute();
                
                 if($status === false) {
                
                        trigger_error($stmt->error,E_USER_ERROR);
                
                                }     

            
                    }
                   
        ?>

