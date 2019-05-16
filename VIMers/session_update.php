<?php
	
	if(isset($_POST["name_session"])){
		$phrase_2 = file_get_contents("sessions.txt");
		$finding = $_COOKIE["username"];
		$first_pos_2 =  strpos($phrase_2,$finding);
		$second_pos_2 = strpos($phrase_2,"|", $first_pos_2+1);
		$third_pos_2 = strpos($phrase_2,"|", $second_pos_2+1);
		$replace = substr($phrase_2,$first_pos_2-2,$third_pos_2+2);
		
		
		
		file_put_contents("sessions.txt", str_replace($replace,"(|".$_COOKIE['username']."|".$_POST["name_session"]."|)",$phrase_2));
		header("Location:person.php");
		
	}
	else{
		header("Location:person.php");
		
		
	}
	?>