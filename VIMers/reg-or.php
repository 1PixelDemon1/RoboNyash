<?php
session_start();
if(isset($_POST["login"])){
$file = 'logs.txt';



if(strpos(file_get_contents('logs.txt'),$_POST["login"]) === FALSE){

$current = file_get_contents($file);

$current .= "(|";
$current .= $_POST['login'];
$current .= "|";
$current .= $_POST['password'];
$current .= '|';
$current .= $_POST['name'];
$current .= '|';
$current .= 'Пользователь';
$current .= '|)';

file_put_contents($file, $current);
	
$_SESSION["username"] = $_POST['login'];
setcookie("username", $_POST["login"], time() + 3600 * 24);
header('Location:welcome_page.php');


}
else{
	header('Location:reg.php?reg=fail');
}
}
else{
	header('Location:welcome_page.php');
	
	
}
?>