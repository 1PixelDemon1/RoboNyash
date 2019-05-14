<?php
session_start();
$logs = array(
    "Denis_It_Master" => "coding",
    "Arsen" => "cppthebest",
    "lol" => "lol"
    
);



    if(isset($_POST["login"]) && $_POST["login"] != ""  && $_POST["password"] != ""){
    
    if($logs[$_POST["login"]] == $_POST["password"]){
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

?>