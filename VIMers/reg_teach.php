<?php
session_start();
if(isset($_COOKIE["username"]) && isset($_SESSION["username"])){
	header("Location:welcome_page.php");
}
	
	
	?>

<head>
    <meta charset = "utf-8">
    <title>Регистрация</title>
    <link href = "style.css" rel = "stylesheet">
    
</head>
<body>
<?php
if($_POST["reg"] != file_get_contents('password.txt')){
    
	if($_SESSION["reg"] == "fail"){
		if(isset($_SESSION["reg"])){
			if($_SESSION["reg"] == "fail"){
				echo '<p align = "center" style = "color:red; font-family:arial;">Это имя пользователя уже занято</p>';
	}}
    echo '<fieldset>
		<legend>Зарегестрируйтесь сейчас</legend>
		<form action = "reg-or.php" method = "POST">
			<p><input style = "width:30%;"type = "text" placeholder="Имя" name = "name_teacher" required></p>
			<p><input style = "width:30%;" type = "text" placeholder="Логин" name = "login" required></p>
			<p><input style = "width:30%;" type = "text" placeholder="Пароль" name = "password" required></p>
			<input type = "submit">
		</form>
	</fieldset>';

    
		
		
	}
	else{
	echo '
            <div class = "middle_center white_background_borders">
                <form align = "center" action = "reg_teach.php" method="post">
                    <input  required id = "long_line" type = "password" name = "reg" placeholder = "Введите пароль регестрации">
                    <input type = "submit" value = "Проверить">
                    </form>';
            if(isset($_POST["reg"])){
                if($_POST["reg"] != file_get_contents('password.txt')){
                    echo '<p align = "center" class = "red_text">Неверный пароль или устаревшие данные</p>
                    
                            ';
            
                echo '</div>';
                    
                }
                
            }
    
    }
	
				}
else{
    if(isset($_SESSION["reg"])){
			if($_SESSION["reg"] == "fail"){
				echo '<p align = "center" style = "color:red; font-family:arial;">Это имя пользователя уже занято</p>';
	}}
    echo '<fieldset>
		<legend>Зарегестрируйтесь сейчас</legend>
		<form action = "reg-or.php" method = "POST">
			<p><input style = "width:30%;"type = "text" placeholder="Имя" name = "name_teacher" required></p>
			<p><input style = "width:30%;" type = "text" placeholder="Логин" name = "login" required></p>
			<p><input style = "width:30%;" type = "text" placeholder="Пароль" name = "password" required></p>
			<input type = "submit">
		</form>
	</fieldset>';

        }

    ?>
</body>