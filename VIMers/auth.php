<?php session_start();?>
<!DOCTYPE html>
<style>
    body{
        background-image: url(images/background_1.jpg);
        
        
        
    }
    
</style>


<head>
    <meta charset="utf-8">
    <title>Авторизация</title>
    <link href = "style.css" rel = "stylesheet">
    
</head>
<body>
    <fieldset style = "position: absolute; width:50%; left:25%;top:40%;">        
        <legend align = "center" style = "color:white;">Авторизуйтесь</legend>
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
    <div id = "backimg"><a href = "welcome_page.php"><img src = "images/back_arrow.png" width = "150px"></a></div>
    
    
</body>