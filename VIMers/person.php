<?php
session_start();
$name = "";
$status = "";
$phrase = file_get_contents("logs.txt");
				
				$finding = $_COOKIE["username"];
				
				$first_pos =  strpos($phrase,$finding);
				$second_pos = strpos($phrase,"|", $first_pos+1);
				$third_pos = strpos($phrase,"|", $second_pos+1);
				$fourth_pos = strpos($phrase,'|', $second_pos+1);
				$fivth_pos = strpos($phrase,"|", $fourth_pos+1);
				$sixth_pos = strpos($phrase,"|", $fivth_pos+1);
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
			echo substr( $phrase, $fourth_pos+1 ,$fivth_pos - $fourth_pos-1);              	 
		?></p>
        </div>
        
        <div class = "description_in_profile">
             <div class = "header_profile_small">
                <p>Статус</p>
             </div>
                <p><?php															
			echo substr( $phrase, $fivth_pos+1,$sixth_pos - $fivth_pos-1);              	 
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
    
</body>