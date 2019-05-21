

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
                
                ?>
        <div style = "
		position:absolute;
		width:100%;
		left:0;
		top:200px;
		text-align:center;
		border-radius:23px 23px 0 0;
		background-color: darkgray;
		height:auto;">
			<a href = "about_us.php"><div class = "description_in_profile"><p style = "font-size:75%; color: black; font-family: Fantasy;">О нас</p></div></a>
			<a href = ""><div class = "description_in_profile"><p style = "font-size:75%; color: black; font-family: Fantasy;">Вк создателя</p></div></a>
			<a href = ""><div class = "description_in_profile"><p style = "font-size:75%; color: black; font-family: Fantasy;">Описание</p></div></a>
    </div>
    </div>
    <div class = 'footer'>
        <p>VimersGroup(c) Made Specially For Kvantorium</p>
    </div>
</body>

<?php

?>