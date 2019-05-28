<?php
session_start();
if (!isset($_COOKIE["username"]) && !isset($_SESSION["username"])) {
    header("Location:welcome_page.php");
}


$_SESSION['game'] = "false";
$phrase = file_get_contents("logs.txt");
if (isset($_COOKIE['username'])) {
    $finding = $_COOKIE["username"];
} else {

    $finding = $_SESSION["username"];
}



$complete = FALSE;


$names = array();
$password = array();
$names_c = array();
$statuses = array();



$first_pos = strpos($phrase, '|', 0) + 1;
$second_pos = strpos($phrase, "|", $first_pos + 1);
$third_pos = strpos($phrase, "|", $second_pos + 1);
$fourth_pos = strpos($phrase, "|", $third_pos + 1);
$fivth_pos = strpos($phrase, "|", $fourth_pos + 1);

$i = 0;
$name = substr($phrase, $first_pos, $second_pos - $first_pos);
$status = substr($phrase, $fourth_pos + 1, $fivth_pos - $fourth_pos - 1);
$name_c = substr($phrase, $third_pos + 1, $fourth_pos - $third_pos - 1);


$statuses[0] = $status;
$names[0] = $name;
$names_c[0] = $name_c;



while (strpos($phrase, "|", $fivth_pos + 1) != FALSE) {
    $first_pos = strpos($phrase, '|', $fivth_pos + 1) + 1;
    $second_pos = strpos($phrase, "|", $first_pos + 1);
    $third_pos = strpos($phrase, "|", $second_pos + 1);
    $fourth_pos = strpos($phrase, "|", $third_pos + 1);
    $fivth_pos = strpos($phrase, "|", $fourth_pos + 1);


    $status = substr($phrase, $fourth_pos + 1, $fivth_pos - $fourth_pos - 1);

    $name_c = substr($phrase, $third_pos + 1, $fourth_pos - $third_pos - 1);

    $name = substr($phrase, $first_pos, $second_pos - $first_pos);

    $i += 1;

    $statuses[$i] = $status;
    $names[$i] = $name;
    $names_c[$i] = $name_c;
}


for ($f = 0; $f < count($names); $f ++) {
    if ($names[$f] == $finding) {
        $number = $f;
    }
}



if (isset($_POST["No"])) {
    if (isset($_COOKIE["username"])) {
        file_put_contents('results/' . $_COOKIE['username'] . '.txt', file_get_contents('results/' . $_COOKIE['username'] . '.txt') . " Ваш ответ: Нет \n");
        $i = 0;
        $number_of_right = 0;
        $number_of_wrong = 0;
        $text = file("results/" . $_COOKIE["username"] . ".txt");

        while (strpos($text[$i], "Нет") == FALSE) {
            $result_text .= $text[$i];
            $i += 1;
        }
        while (strpos($result_text, "Неверно", $last_pos) != False) {
            $last_pos = strpos($result_text, "Неверно", $last_pos) + 1;
            $number_of_wrong += 1;
        }

        $last_pos = 0;
        while (strpos($result_text, "Верно", $last_pos) != False) {
            $last_pos = strpos($result_text, "Верно", $last_pos) + 1;
            $number_of_right += 1;
        }
        if ($number_of_right + $number_of_wrong != 0) {
            $chart = file_get_contents("charts.txt");
            $chart .= "(|" . $_COOKIE["username"] . "|" . round($number_of_right / ($number_of_right + $number_of_wrong) * 100, 0) . "|" . date("d") . "|)";
            file_put_contents("charts.txt", $chart);
        }
    } else {
        file_put_contents('results/' . $_SESSION['username'] . '.txt', file_get_contents('results/' . $_SESSION['username'] . '.txt') . " Ваш ответ: Нет \n");
        $i = 0;
        $number_of_right = 0;
        $number_of_wrong = 0;
        $text = file("results/" . $_COOKIE["username"] . ".txt");

        while (strpos($text[$i], "Нет") == FALSE) {
            $result_text .= $text[$i];
            $i += 1;
        }
        while (strpos($result_text, "Неверно", $last_pos) != False) {
            $last_pos = strpos($result_text, "Неверно", $last_pos) + 1;
            $number_of_wrong += 1;
        }

        $last_pos = 0;
        while (strpos($result_text, "Верно", $last_pos) != False) {
            $last_pos = strpos($result_text, "Верно", $last_pos) + 1;
            $number_of_right += 1;
        }
        if ($number_of_right + $number_of_wrong != 0) {
            $chart = file_get_contents("charts.txt");
            $chart .= "(|" . $_SESSION["username"] . round($number_of_right / ($number_of_right + $number_of_wrong) * 100, 0) . date("d");
            file_put_contents("charts.txt", $chart);
        }
    }
}
?>

<head>
    <title>Профиль</title>
    <meta charset = "utf-8">
    <link href = "style.css" rel = "stylesheet">
    <style>						
        .img_logo{
            position:relative;
            left:50px;
            width:169px;
            background-image: url(images/logo_2.png);

        }
        .img_logo:hover img{
            visibility: hidden;

        }
        .img_logo_a{

            width:169px;

        }
    </style>
</head>
<body>
    <div class = "header_personal">
        <div class = "img_logo_a"><a href = "welcome_page.php"><div class = "img_logo"><img  src = "images/logo_1.png"></div></a></div>      
        <div class = "img_icon"><a class = "icon_login" href = "person.php?quit=true"><img src = "images/log-out.png" width = "100px"></a></div>		
        <div class = "main_info">

            <div class = "description_in_profile">
                <div class = "header_profile_small">
                    <p>Имя</p>
                </div>
                <p><?php
                    echo $names_c[$number];
                    ?></p>
            </div>

            <div class = "description_in_profile">
                <div class = "header_profile_small">
                    <p>Статус</p>
                </div>
                <p><?php
                    echo $statuses[$number];
                    ?></p>
            </div>

            <div class = "description_in_profile">
                <div class = "header_profile_small">
                    <p>Логин</p>
                </div>
                <p><?php
                    if (isset($_COOKIE["username"])) {
                        echo $_COOKIE['username'];
                    } else {
                        echo $_SESSION['username'];
                    }
                    ?>
                </p>
            </div>

            <div class = "description_in_profile">
                <div class = "header_profile_small">
                    <p>Сменить пароль</p>
                </div>
                <p><form action = "change_password.php" method = "post"><input type = "text" placeholder="Новый пароль" style = 'width:70%;' name ="new_password" pattern = "^[A-Za-zА-Яа-яЁё0-9]+$"><input type = "submit" style = 'width:25%;' value = "OK"></form></p>
            </div>




        </div>


    </div>
    <?php
    if (isset($_GET["quit"])) {
        echo '
				<div style = "position:absolute; border-color:black; border-style: solid; background-color:white;border-radius:30px;width:50%;height:40%;left:25%;padding:30px;top:30%;">
					<fieldset>
						<legend align = "center">Вы действительно хотите выйти?</legend>
						<form align = "center" method = "post" action = "auth_checker.php?quit=true"><input type = "submit" value = "Да"></form>
						<form align = "center" method = "post" action = "person.php"><input type = "submit" value = "Нет"></form>
						

					</fieldset>


				</div>



				';
    }
    ?>
    <?php
    if ($statuses[$number] == "Преподаватель") {
        $phrase_2 = file_get_contents("sessions.txt");
        if (isset($_COOKIE['username'])) {
            $finding = $_COOKIE["username"];
        } else {
            $finding = $_SESSION["username"];
        }
        $first_pos_2 = strpos($phrase_2, $finding);
        $second_pos_2 = strpos($phrase_2, "|", $first_pos_2 + 1);
        $third_pos_2 = strpos($phrase_2, "|", $second_pos_2 + 1);
        $fourth_pos_2 = strpos($phrase, '|', $second_pos_2 + 1);

        echo '<div class = "bottom_left_border">
							<h4>Пароль регистрации учителя</h4>
							<p>';
        echo file_get_contents("password.txt");

        echo '</p>
								</div>';
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
    if ($statuses[$number] == "Админ") {
        echo '<div class = "bottom_left_border">
							<h4>Сменить пароль регистрации</h4>
							<form action = "change_global_password.php" method = "post"><input type = "text" name = "new_password_teacher" placeholder =';
        echo file_get_contents("password.txt");
        echo '>';
        echo '</form>
								</div>';
    }
    if ($statuses[$number] == "Пользователь") {
        if (isset($_COOKIE['username'])) {
            if (file_get_contents("results/" . $_COOKIE["username"] . ".txt") != "" && (strpos(file_get_contents("results/" . $_COOKIE["username"] . ".txt"), "В") != FALSE || strpos(file_get_contents("results/" . $_COOKIE["username"] . ".txt"), "Н") != FALSE)) {
                header("Location:person.php");
                echo '<div class = "bottom_left">
							<a href = "results.php" style = "text-decoration: none;"><p style = "color: black;">Посмотреть результаты</p></a>                        
							</div>';
            }
        } else {
            if (file_get_contents("results/" . $_SESSION["username"] . ".txt") != "" && (strpos(file_get_contents("results/" . $_SESSION["username"] . ".txt"), "В") != FALSE || strpos(file_get_contents("results/" . $_SESSION["username"] . ".txt"), "Н") != FALSE)) {
                echo '<div class = "bottom_left">
							<a href = "results.php" style = "text-decoration: none;"><p style = "color: black;">Посмотреть результаты</p></a>                        
							</div>';
            }
        }



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

        while (strpos($file, "|", $pos + 1) != FALSE) {

            $first_pos_3 = strpos($file, "|", $third_pos_3 + 1);
            $second_pos_3 = strpos($file, "|", $first_pos_3 + 1);
            $third_pos_3 = strpos($file, "|", $second_pos_3 + 1);
            $fourth_pos_3 = strpos($phrase, "|", $third_pos_3 + 1);
            if (substr($file, $second_pos_3 + 1, $third_pos_3 - $second_pos_3 - 1) != "") {
                echo '<option value="';
                echo substr($file, $first_pos_3 + 1, $second_pos_3 - $first_pos_3 - 1);
                echo '">';
                echo substr($file, $first_pos_3 + 1, $second_pos_3 - $first_pos_3 - 1);
                echo '</option>';
            }
            $pos = $third_pos_3 = strpos($file, "|", $second_pos_3 + 1);
        }

        echo '</select></p>';
        echo '<p><input type="text"  placeholder = "Номер сессии" name = "session_name" required></p>';
        echo '<p><input type="submit" value = "Начало"></p>';
        echo '</form>';
        if (isset($_GET["enter"])) {
            echo '<p style = "color:red;font-family:arial;">Неверный номер сессии или устаревшие данные</p>';
        }
        echo '</div>';
    }
    ?>



</body>

