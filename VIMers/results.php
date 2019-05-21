<?php
session_start();
$i = 0;
$number_of_wrong = 0;
$number_of_right = 0;
$last_pos = 0;
$result_text = "";
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
                if(strpos($text[$i],"Неверно") != FALSE){
                    print(str_replace("Неверно", "",$text[$i]));
                    echo '<span style="color: red">'."Неверно".'</span>';                    
                }
                if(strpos($text[$i],"Верно") != FALSE){
                    print(str_replace("Верно", "",$text[$i]));
                    echo '<span style="color: green">'."Верно".'</span>';                    
                }
                echo "<br><br>";
                $result_text.= $text[$i];
                $i+=1;
                }
                while(strpos($result_text,"Неверно",$last_pos) != False){
                    $last_pos = strpos($result_text,"Неверно",$last_pos)+1;
                    $number_of_wrong +=1;
                }
                
                $last_pos = 0;
                while(strpos($result_text,"Верно",$last_pos) != False){
                    $last_pos = strpos($result_text,"Верно",$last_pos)+1;
                    $number_of_right +=1;
                }
                echo '<br><br>';
                echo "Грамотность:".($number_of_right/($number_of_right + $number_of_wrong)*100)."%";
                
                ?>
        </p>        
    </div>    
    <div class = "backimg">
        <a href = "person.php"><img src = "images/back_arrow.png" width = "50px"></a>
        
    </div>
</body>
    