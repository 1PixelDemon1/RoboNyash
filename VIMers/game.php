<head>
    <title>Race</title>
    <meta charset="utf-8">
    <link rel = "stylesheet" href = 'style.css'>
</head>
<?php
$_first = rand(0,99);
$_second = rand(1, 15);
$_symb = rand(0,3);
if($_symb == 0){
    echo $_first."+".$_second."=";
    echo $_first + $_second;
    
}
if($_symb == 1){
    echo $_first."-".$_second."=";
echo $_first - $_second;
    
}
if($_symb == 2){
    echo $_first."*".$_second."=";
echo $_first * $_second;
    
}
if($_symb == 3){
    echo $_first."/".$_second."=";
    echo $_first / $_second;
    
}

?>
<body>
    <form action = "game.php">
        <input type = "submit">
        
    </form>
    
</body>