<?php
	if(isset($_POST["teacher"]) && isset($_POST["session_name"])){
		$phrase_2 = file_get_contents("sessions.txt");
		$finding = $_POST["teacher"];
		$first_pos_2 =  strpos($phrase_2,$finding);
		$second_pos_2 = strpos($phrase_2,"|", $first_pos_2+1);
		$third_pos_2 = strpos($phrase_2,"|", $second_pos_2+1);
		$replace = substr($phrase_2,$second_pos_2+1,$third_pos_2 - $second_pos_2-1);
		if($_POST["session_name"] == $replace){
			header("Location:game.php");
			
		} 
		else{
			header("Location:person.php?enter=false");
			
		}
			
		
	}
	else{
		header("Location:welcome_page.php");
			
		}
	
	
	?>