<?php
session_start();
if(isset($_COOKIE["username"]) && isset($_SESSION["username"])){
	header("Location:welcome_page.php");
}
	
	
	?>
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
		}
		?>
	<fieldset>
		<legend>Зарегестрируйтесь сейчас</legend>
		<form action = "reg-or.php" method = "POST">
			<p><input required style = "width:30%;"type = "text" placeholder="Имя" name = "name"></p>
			<p><input required style = "width:30%;" type = "text" placeholder="Логин" name = "login"></p>
			<p><input required style = "width:30%;" type = "text" placeholder="Пароль" name = "password"></p>
			<input type = "submit">
		</form>
	</fieldset>
	<div id = "backimg"><a href = "welcome_page.php"><img src = "images/back_arrow.png" width = "150px"></a></div>
        <div id = "reg_teach"><a style="text-decoration:none;" href = "reg_teach.php"><p style = "color:red;">Регистрация учителя</p></a></div>

</body>
