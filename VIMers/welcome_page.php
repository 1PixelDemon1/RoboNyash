<!DOCTYPE HTML>

<head>
    <meta charset = "utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Домашняя Страница</title>
    
</head>
<body>
    <div class = "header">
        <img id = "img_logo" src = "images/logo_1.png">
        <?php
            echo $_COOKIE["username"];
            if( !( isset($_COOKIE["username"]) || isset($_SESSION["username"])) ){
                
                echo  '<div class = "img_icon"><a class = "icon_login" href = "auth.php"><img src = "images/log-in_1.png" width = "100px"></a></div> ';
           
            }
            else{
                echo '<div class = "img_icon"><a class = "icon_login" href = "person.php"><img src = "images/person.png" width = "100px"></a></div>';
                
            }
                //file get contents
                ?>
        <div class = "panel_header">
        
    </div>
    </div>
    <div class = 'footer'>
        <p>VimersGroup(c) Made Specially For Kvantorium</p>
    </div>
</body>

<?php

?>