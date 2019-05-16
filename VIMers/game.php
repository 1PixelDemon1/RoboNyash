<?php

	

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


		if($_POST["ans"] == $_POST["answer"]){
		$_cur_state = true;
		
		
	}
	else{
		$_cur_state = false;
	}

	
	}

		?>
<head>
	<title>Race</title>
	<meta charset="utf-8">
	<link href = "style.css" rel = "stylesheet">
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
			}
			if($_symb == 1){
				echo $_first." - ".$_second." =";
			}	
			if($_symb == 2){ 
				echo $_first." * ".$_second." =";
			}
			?>
		</p>
	</div>
	<div class = "header">
        <img id = "img_logo" src = "images/logo_1.png">
         
    </div>
	<div id = "center_form">
		<form action = "game.php" method = "POST">
			<input  name = "ans" type = "number" style = "width:20%;height:10%;font-size:100%;" autofocus placeholder="Ответ:">
			<input type = "text" placeholder="SEND" name = "answer" value = "<?php
				echo $_answer;
				?>" style = "visibility:hidden;">
			<p><input type = "submit" value = "SEND" style = "width:10%;height:5%; border-radius:5px;"></p>
		</form>
	</div>
</body>
	