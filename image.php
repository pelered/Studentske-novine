<?php

include 'config.php';
 
$target_dir = "Images/";
$target_file = $target_dir .basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $error2 = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $error2 = "File is not an image.";
        $uploadOk = 0;
    }
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000000) {
    $error2= "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $error2 = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $error2 = "The file  has been uploaded.";

        // mysqli_query($link,"insert into slika (naslov,putanja) values('".$_FILES["fileToUpload"]["name"]."','".$target_file."')");

        $stmt = $link->prepare("insert into slika (naslov,putanja) values(?,?)");

        $stmt->bind_param('ss',$_FILES["fileToUpload"]["name"],$target_file);

        $stmt->execute();

        
    } else {
        $error2 =  "Sorry, there was an error uploading your file.";
    }
    
   
}


?>