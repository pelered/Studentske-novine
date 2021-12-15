<?php

    include ('config.php');


	if(isset($_POST['active']) && $_POST['active'] == "forgot"){
		
        $sql = "Select * from email where email = '".$_POST['useremail']."'";
        
        $result = mysqli_query($link,$sql);
        
		$user = mysqli_fetch_array($result);
		
		if(!empty($user)) {

        require ('recoverymail.php');
            
		} else {

			$error_message = 'No User Found';
		}
	}
?>