<?php session_start();?>
<!DOCTYPE html>


<head>
    <meta charset="utf-8">
    <title>Авторизация</title>
    <link href = "style.css" rel = "stylesheet">
    
</head>
<body>
    <div class = "header">
        <img id = "img_logo" src = "images/logo_1.png">
    </div>
    <fieldset style = "position: absolute; width:30%; left:35%;top:40%;">        
        <legend align = "center" style = "color:black;">Авторизуйтесь</legend>
        <form action = "auth_checker.php" method = "post" autocomplete="on">
            <div style = "position:relative;left:35%;">
                <input  type = "text" style = "width: 30%; " name = "login" placeholder="Логин" required>
                <br>
                <input  type = "password" style = "width: 30%;" name = "password" placeholder="Пароль" required>
                <br>
                <input type = "submit" value = "Log-In">
            </div>
        </form>		
    </fieldset>
	<a href = "reg.php"><div id = "middle_down">
		<p style = "color:red;">Зарегестрируйтесь</p>
			</div></a>
    <div class = "backimg"><a href = "welcome_page.php"><img src = "images/back_arrow.png" width = "150px"></a></div>
    
    
</body>