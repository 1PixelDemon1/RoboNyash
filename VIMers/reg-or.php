<?php
session_start();

$names = array();
	
	$complete = False;
	
	$phrase = file_get_contents("logs.txt");
		
	$first_pos =  strpos($phrase,'|', 0) + 1;
	$second_pos = strpos($phrase,"|", $first_pos+1);
	$third_pos = strpos($phrase,"|", $second_pos+1);				
	$fourth_pos = strpos($phrase,"|", $third_pos+1);
	$fivth_pos = strpos($phrase,"|", $fourth_pos+1);		
	
	$i = 0;
	$name = substr($phrase, $first_pos, $second_pos - $first_pos);
	$names[0] = $name;						
	
	
	while(strpos($phrase,"|", $fivth_pos + 1) != FALSE){	
		
		$first_pos =  strpos($phrase,'|', $fivth_pos+ 1) + 1; 
		$second_pos = strpos($phrase,"|", $first_pos+1);
		$third_pos = strpos($phrase,"|", $second_pos+1);				
		$fourth_pos = strpos($phrase,"|", $third_pos+1);
		$fivth_pos = strpos($phrase,"|", $fourth_pos+1);
		
		$name = substr($phrase, $first_pos, $second_pos - $first_pos);
		$i+=1;
		$names[$i] = $name;						
				
	}
	


if(isset($_POST["name_teacher"])){
    $file = 'logs.txt';
	$complete = False;
	for($h = 0; $h < count($names); $h ++){
		if($_POST["login"] == $names[$h]){
			$complete = True;
			
		}		
		
	}
    if($complete == FALSE){

    $current = file_get_contents($file);

    $current .= "(|";
    $current .= $_POST['login'];
    $current .= "|";
    $current .= $_POST['password'];
    $current .= '|';
    $current .= $_POST['name_teacher'];
    $current .= '|';
    $current .= 'Преподаватель';
    $current .= "|)\n";

    file_put_contents($file, $current);
	if(isset($_SESSION["reg"])){
		session_destroy();
		
	}
    $phrase_2 = file_get_contents("sessions.txt");
    $phrase_2 .= "(|";
    $phrase_2 .= $_POST["login"];
    $phrase_2 .= "|";
    $phrase_2 .= "|) \n";
    file_put_contents("sessions.txt", $phrase_2);
    
    $_SESSION["username"] = $_POST['login'];
    
    setcookie("username", $_POST["login"], time() + 3600 * 24);
    header('Location:welcome_page.php');        
        }
	else{
		$_SESSION['reg'] = "fail";
		header('Location:reg_teach.php');
		}   
 
	
	

	
}
else{
if(isset($_POST["login"])){
$file = 'logs.txt';


$complete = False;
	for($h = 0; $h < count($names); $h ++){
		if($_POST["login"] == $names[$h]){
			$complete = True;
			
		}		
		
	}
if($complete == FALSE){
$current = file_get_contents($file);

$current .= "(|";
$current .= $_POST['login'];
$current .= "|";
$current .= $_POST['password'];
$current .= '|';
$current .= $_POST['name'];
$current .= '|';
$current .= 'Пользователь';
$current .= "|)\n";

file_put_contents($file, $current);


fopen("results/".$_POST['login'].".txt",w);


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
	
	
}}
?>