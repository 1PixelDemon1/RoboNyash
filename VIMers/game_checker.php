<?php
	session_start();
	if(isset($_POST["teacher"]) && isset($_POST["session_name"])){
		
		$phrase_2 = file_get_contents("sessions.txt");
		$finding = $_POST["teacher"];
		$first_pos_2 =  strpos($phrase_2,$finding);
		$second_pos_2 = strpos($phrase_2,"|", $first_pos_2+1);
		$third_pos_2 = strpos($phrase_2,"|", $second_pos_2+1);
		$replace = substr($phrase_2,$second_pos_2+1,$third_pos_2 - $second_pos_2-1);
		
		
		
		if($_POST["session_name"] == $replace){
			if(isset($_COOKIE["username"]))
			{
				file_put_contents("results/".$_COOKIE["username"].".txt"," ");
				
				}
			else{
				file_put_contents("results/".$_SESSION["username"].".txt"," ");
				
			}
			header("Location:game.php");
			$_SESSION['game'] = "true";
		} 
		else{
			header("Location:person.php?enter=false");
			
		}
			
		
	}
	else{
		header("Location:welcome_page.php");
			
		}
	
	
	?>