<?php
session_start();
if(isset($_POST["name_teacher"])){
    $file = 'logs.txt';


    if($_POST['login'] !="" && $_POST['password'] !="" && $_POST['name_teacher'] !=""){
    if(strpos(file_get_contents('logs.txt'),$_POST["login"]) === FALSE){

    $current = file_get_contents($file);

    $current .= "(|";
    $current .= $_POST['login'];
    $current .= "|";
    $current .= $_POST['password'];
    $current .= '|';
    $current .= $_POST['name_teacher'];
    $current .= '|';
    $current .= 'Преподаватель';
    $current .= '|)';

    file_put_contents($file, $current);

    $phrase_2 = file_get_contents("sessions.txt");
    $phrase_2 .= "(|";
    $phrase_2 .= $_POST["login"];
    $phrase_2 .= "|";
    $phrase_2 .= "|)";
    file_put_contents("sessions.txt", $phrase_2);
    
    $_SESSION["username"] = $_POST['login'];
    
    setcookie("username", $_POST["login"], time() + 3600 * 24);
    header('Location:welcome_page.php');    
    
    
        }
	else{
		header('Location:reg_teach.php?reg=fail');
		}   
 
		}
}
else{
if(isset($_POST["login"])){
$file = 'logs.txt';


if($_POST['login'] !="" && $_POST['password'] !="" && $_POST['name'] !=""){
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
	header('Location:reg.php?reg=empty');
	
}
}
else{
	header('Location:welcome_page.php');
	
	
}}
?>