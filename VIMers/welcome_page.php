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

            if( !( isset($_COOKIE["username"]) || isset($_SESSION["username"])) ){
                
                echo  '<div class = "img_icon"><a class = "icon_login" href = "auth.php"><img src = "images/log-in_1.png" width = "100px"></a></div> ';
           
            }
            else{
                //echo '<div class = "img_icon"><a class = "icon_login" href = "auth.php"><img src = "images/log-in_1.png" width = "100px"></a></div>';
                
            }

                ?>
        <div class = "panel_header">
        
    </div>
    </div>

</body>

<?php

?>