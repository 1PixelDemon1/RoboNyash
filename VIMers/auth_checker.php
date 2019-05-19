<?php
session_start();
$phrase = file_get_contents("logs.txt");
				
				$finding = $_POST["login"];
				
				$first_pos =  strpos($phrase,$finding);
				$second_pos = strpos($phrase,"|", $first_pos+1);
				$third_pos = strpos($phrase,"|", $second_pos+1);
				$fourth_pos = strpos($phrase,'|', $second_pos+1);
				$fivth_pos = strpos($phrase,"|", $fourth_pos+1);
				$sixth_pos = strpos($phrase,"|", $fivth_pos+1);
				
				
    if(isset($_POST["login"]) && $_POST["login"] != ""  && $_POST["password"] != ""){
    if(strpos($phrase,$_POST["login"]) != FALSE){
    if(substr( $phrase, $second_pos+1 ,$third_pos - $second_pos-1) == $_POST["password"]){
        setcookie("username", $_POST["login"], time() + 3600 * 24);
        $_SESSION["username"] = $_POST["password"];

        header('Location:/welcome_page.php');
    
	    }
		else{
			
			header('Location:/auth.php');
		}
	
	}
    else{
        header('Location:/auth.php');
        
    }
    
}
else{
    if($_GET['quit'] == "true"){
        header('Location:/welcome_page.php');
        unset($_COOKIE['username']);
        
        setcookie('username', null, -1, '/');
        session_destroy();
        
    }
     else{header('Location:/auth.php');}
}

?>