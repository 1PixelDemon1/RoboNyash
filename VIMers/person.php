<?php
session_start();
if(!isset($_COOKIE["username"]) && !isset($_SESSION["username"])){
	header("Location:welcome_page.php");
}

$phrase = file_get_contents("logs.txt");
				
				$finding = $_COOKIE["username"];
				
				$first_pos =  strpos($phrase,$finding);
				$second_pos = strpos($phrase,"|", $first_pos+1);
				$third_pos = strpos($phrase,"|", $second_pos+1);				
				$fourth_pos = strpos($phrase,"|", $third_pos+1);
				$fivth_pos = strpos($phrase,"|", $fourth_pos+1);
?>

<head>
    <title>Профиль</title>
    <meta charset = "utf-8">
    <link href = "style.css" rel = "stylesheet">
</head>
<body>
    <div class = "header_personal">
        <a href = "welcome_page.php"><img id = "img_logo" src = "images/logo_1.png"></a>       
        <div class = "img_icon"><a class = "icon_login" href = "auth_checker.php?quit=true"><img src = "images/log-out.png" width = "100px"></a></div>
    <div class = "main_info">
        
        <div class = "description_in_profile">
            <div class = "header_profile_small">
                <p>Имя</p>
            </div>
                <p><?php															
			echo substr( $phrase, $third_pos+1 ,$fourth_pos - $third_pos-1);              	 
		?></p>
        </div>
        
        <div class = "description_in_profile">
             <div class = "header_profile_small">
                <p>Статус</p>
             </div>
                <p><?php															
			echo substr( $phrase, $fourth_pos+1,$fivth_pos - $fourth_pos-1);              	 
		?></p>
        </div>
        
        <div class = "description_in_profile">
             <div class = "header_profile_small">
                <p>Логин</p>
             </div>
                <p><?php echo $_COOKIE['username'];?></p>
        </div>
        
			
			
			
    </div>
		
    </div>
	
    <?php
				if(substr( $phrase, $fourth_pos+1,$fivth_pos - $fourth_pos-1) == "Преподаватель" || substr( $phrase, $fourth_pos+1,$fivth_pos - $fourth_pos-1) == "Админ"){
					$phrase_2 = file_get_contents("sessions.txt");
					$finding = $_COOKIE["username"];

					$first_pos_2 =  strpos($phrase_2,$finding);
					$second_pos_2 = strpos($phrase_2,"|", $first_pos_2+1);
					$third_pos_2 = strpos($phrase_2,"|", $second_pos_2+1);
					$fourth_pos_2 = strpos($phrase,'|', $second_pos_2+1);
						echo '<div style = "position: absolute;
							right:5%;
							bottom:5%;
							border-width: 3px;
							border-color:blue;
							border-style:solid none solid none;
							">';
						echo "<p>Введите номер сессии</p>";
						echo '<form action = "session_update.php" method = "POST"><input type = "number" pattern="[0-9]{3}" required name = "name_session" style = "font-size:150%;"placeholder = "';
						echo substr($phrase_2, $second_pos_2 + 1, $third_pos_2 - $second_pos_2 - 1);
						echo '"></form>';
						echo '</div>';
				}
				if(substr( $phrase, $fourth_pos+1,$fivth_pos - $fourth_pos-1) == "Пользователь"){																																		
					echo '<div style = "position: absolute;
							right:5%;
							bottom:5%;
							border-width: 3px;
							border-color:blue;
							border-style:solid none solid none;">
							<form action="game_checker.php" method="post">';
						echo '<p><select size="1" name="teacher">';
							echo '<option disabled>Выберите вашего учителя</option>';

							$file = file_get_contents('sessions.txt');
							$pos = 0;

							while(strpos($file, "|",$pos+1) != FALSE){		

								$first_pos_3 =  strpos($file,"|",$third_pos_3+1);
								$second_pos_3 = strpos($file,"|", $first_pos_3+1);
								$third_pos_3 = strpos($file,"|", $second_pos_3+1);				
								echo '<option value="';
								echo substr($file,$first_pos_3 + 1, $second_pos_3 - $first_pos_3-1); 
								echo '">';
								echo substr($file,$first_pos_3 + 1, $second_pos_3 - $first_pos_3-1); 
								echo '</option>';
								$pos = $third_pos_3 = strpos($file,"|", $second_pos_3+1);

							}	

						echo '</select></p>';
						echo '<p><input type="text"  placeholder = "Номер сессии" name = "session_name" required></p>';
						echo '<p><input type="submit" value = "Начало"></p>';
						echo '</form>';
						if(isset($_GET["enter"])){
							echo '<p style = "color:red;font-family:arial;">Неверный номер сессии или устаревшие данные</p>';
							
						}						
						echo '</div>';
						



					}
				?>
</body>

