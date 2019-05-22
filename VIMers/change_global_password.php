<?php
	if(isset($_POST["new_password_teacher"])){		
		file_put_contents("password.txt", $_POST["new_password_teacher"]);		
		header("Location:person.php");		
	}
	else{		
		header("Location:person.php");
	}	
	?>