<?php
session_start();



if((!isset($_COOKIE["username"]) && !isset($_SESSION["username"])) || $_SESSION['game'] == "false"){
	header("Location:welcome_page.php");
}

if(isset($_COOKIE['username'])){
	
	$results = "results/".$_COOKIE['username'].".txt";
	
}
else{
	
	$results = "results/".$_SESSION['username'].".txt";
	
}


$user_results = file_get_contents($results);


$_first = rand(0,9);
$_second = rand(0, 9);
$_symb = rand(0,2);
$_cur_state = true;

if($_symb == 0){
    

    $_answer = $_first + $_second;
}
if($_symb == 1){
    

$_answer = $_first - $_second;    
}	
if($_symb == 2){ 
    

$_answer = $_first * $_second;

}



	if(isset($_POST["ans"])){
		$user_results .=   " Ваш ответ: ".$_POST['answer'];

		if($_POST["ans"] == $_POST["answer"]){
		$_cur_state = true;
		$user_results .= " Верно \n";
		
	}
	else{
		$_cur_state = false;
		$user_results .= " Неверно \n";
	}

	
	}
	else{
		if(strpos($user_results, "=") != FALSE){
			$user_results .=   " Ваш ответ: Нет \n";
			}
	}
		?>
<head>
	<title>Race</title>
	<meta charset="utf-8">
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
	
	<div id = "center_game"style = "
			background-color: <?php      
				if($_cur_state == true){
					echo 'lightgreen';
				}
				elseif($_cur_state == false){
					echo 'red';
				}
				else{
					
					echo "transparent";
				}
					
				?>;"
				>
		<p>
			<?php
			
			if($_symb == 0){
				echo $_first." + ".$_second." =";
				$user_results .=  $_first." + ".$_second." = ";
				$user_results .=  $_first+ $_second;
				
			}
			if($_symb == 1){
				echo $_first." - ".$_second." =";
				$user_results .=  $_first." - ".$_second." = ";
				$user_results .=  $_first- $_second;
			}	
			if($_symb == 2){ 
				echo $_first." * ".$_second." =";
				$user_results .=   $_first." * ".$_second." = ";
				$user_results .=   $_first * $_second;
			}

			
			file_put_contents($results, $user_results);
			
			?>
		</p>
	</div>
	<div class = "header">
        <div class = "img_logo_a"><a class ="img_logo_a" href = "game.php?quit=true"><div  class = "img_logo"><img src = "images/logo_1.png"></div></a></div>
         
    </div>
	<div id = "center_form">
		<form action = "game.php" method = "POST">
			<input  name = "ans" type = "number" style = "width:20%;height:10%;font-size:100%;" autofocus required placeholder="Ответ:">
			<input type = "text" placeholder="SEND" name = "answer" value = "<?php
				echo $_answer;
				?>" style = "visibility:hidden;">
			<p><input type = "submit" value = "SEND" style = "width:10%;height:5%; border-radius:5px;"></p>
		</form>
	</div>
	<?php
		if(isset($_GET["quit"])){
			echo '
				<div style = "position:absolute;background-color:white;border-radius:30px;width:50%;height:40%;left:25%;padding:30px;top:31%;">
					<fieldset>
						<legend align = "center">Вы действительно хотите выйти?</legend>
						<form align = "center" method = "post" action = "person.php"><input type = "submit" value = "Да" name = "No"></form>
						<form align = "center" method = "post" action = "game.php"><input type = "submit" value = "Нет"></form>
						

					</fieldset>


				</div>



				';
			
		}
		
		?>
	
</body>
	