<?php

    include ('config.php');

    $dirname = $putanja[0];

    $id2 = $_GET['id'];

    if(isset($_POST['action']) && $_POST['action'] == "gal"){


        array_map('unlink', glob("$dirname/*.*"));

    if( rmdir($dirname) == TRUE){
        
    
        $stmt = $link->prepare("delete from galerija where galerija_id = ?");
        
                $stmt->bind_param('i', $id2);
        
                $stmt->execute();
        }

     else echo "Galerija nije izbrisana";
        
    }