<?php
session_start();
$i = 0;
if(!isset($_COOKIE["username"]) && !isset($_SESSION["username"])){
	header("Location:welcome_page.php");
}
if(isset($_COOKIE['username'])){
    $text = file("results/".$_COOKIE["username"].".txt");        
}
else{
    $text = file("results/".$_SESSION["username"].".txt");            
}

?>
<head>
    <meta charset = "utf-8">
    <title>Результаты прошлой игры</title>
    <link href = "style.css" rel = "stylesheet">
</head>
<body>
    <div class = "block_of_text">
        <p>            
            <?php 
            while(strpos($text[$i],"Нет") == FALSE){
                print($text[i]);
                $i+=1;
                }
                ?>
        </p>        
    </div>    
</body>
    