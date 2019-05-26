<?php
session_start();


	$complete = FALSE;
	$names = array();
	
	$files = scandir("results",1);
	
	$phrase = file_get_contents("logs.txt");
		
	$first_pos =  strpos($phrase,'|', 0) + 1;
	$second_pos = strpos($phrase,"|", $first_pos+1);
	$third_pos = strpos($phrase,"|", $second_pos+1);				
	$fourth_pos = strpos($phrase,"|", $third_pos+1);
	$fivth_pos = strpos($phrase,"|", $fourth_pos+1);		
	
	$i = 0;
	$name = substr($phrase, $first_pos, $second_pos - $first_pos);
	$names[0] = $name;						
	$password = array();
	$password[0] = substr($phrase, $second_pos+1,$third_pos - $second_pos-1);
	
	while(strpos($phrase,"|", $fivth_pos + 1) != FALSE){			
		$first_pos =  strpos($phrase,'|', $fivth_pos+ 1) + 1; 
		$second_pos = strpos($phrase,"|", $first_pos+1);
		$third_pos = strpos($phrase,"|", $second_pos+1);				
		$fourth_pos = strpos($phrase,"|", $third_pos+1);
		$fivth_pos = strpos($phrase,"|", $fourth_pos+1);
		
		$name = substr($phrase, $first_pos, $second_pos - $first_pos);
		$i+=1;
		$names[$i] = $name;						
		$password[$i] = substr($phrase, $second_pos+1,$third_pos - $second_pos-1);								
	}
	

	$names_pass = array_combine($names, $password);
	
	
    if(isset($_POST["login"]) && $_POST["login"] != ""  && $_POST["password"] != ""){
    if(isset($names_pass[$_POST["login"]]) && $names_pass[$_POST["login"]] == $_POST["password"]){
        
	setcookie("username", $_POST["login"], time() + 3600 * 24);
         $_SESSION["username"] = $_POST["login"];
         header('Location:/data_delete.php');
    
	    }
		else{
			
			header('Location:/auth.php');
		}
	
  
}
else{
    if($_GET['quit'] == "true"){
        header('Location:/data_delete.php');
        unset($_COOKIE['username']);
        
        setcookie('username', null, -1, '/');
        session_destroy();
        
    }
     else{header('Location:/auth.php');}
}

?>