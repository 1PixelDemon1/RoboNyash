<head>
	<meta charset="utf-8">
	<title>Регистрация</title>
	<link href = "style.css" rel = "stylesheet">
</head>
<body>
	<?php
		if(isset($_GET["reg"])){
			if($_GET["reg"] == "fail"){
				echo '<p align = "center" style = "color:red; font-family:arial;">Это имя пользователя уже занято</p>';
			}
			if($_GET["reg"] == "empty"){
				echo '<p align = "center" style = "color:red; font-family:arial;">Поля не должны быть пустыми</p>';
			}
		}
		?>
	<fieldset>
		<legend>Зарегестрируйтесь сейчас</legend>
		<form action = "reg-or.php" method = "POST">
			<p><input style = "width:30%;"type = "text" placeholder="Имя" name = "name"></p>
			<p><input style = "width:30%;" type = "text" placeholder="Логин" name = "login"></p>
			<p><input style = "width:30%;" type = "text" placeholder="Пароль" name = "password"></p>
			<input type = "submit">
		</form>
	</fieldset>
	<div id = "backimg"><a href = "welcome_page.php"><img src = "images/back_arrow.png" width = "150px"></a></div>
</body>
