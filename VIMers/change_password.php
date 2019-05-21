<?php
    
    if(isset($_POST["new_password"])){
        $phrase = file_get_contents("logs.txt");
				
        $finding = $_COOKIE["username"];

        $first_pos =  strpos($phrase,$finding);
        $second_pos = strpos($phrase,"|", $first_pos+1);
        $third_pos = strpos($phrase,"|", $second_pos+1);				
        $fourth_pos = strpos($phrase,"|", $third_pos+1);
        $fivth_pos = strpos($phrase,"|", $fourth_pos+1);

        $old_password = substr( $phrase, $second_pos+1 ,$third_pos - $second_pos-1);
        
        $text = file_get_contents("logs.txt");
        file_put_contents("logs.txt", str_replace($old_password, $_POST["new_password"], $text));
        header("Location:person.php");
    }else{
        header("Location:welcome_page.php");
        
        
    }




    ?>