<?php
session_start();
?>

<head>
    <title>Профиль</title>
    <meta charset = "utf-8">
    <link href = "style.css" rel = "stylesheet">
</head>
<body>
    <div class = "header_personal">
        <a href = "welcome_page.php"><img id = "img_logo" src = "images/logo_1.png"></a>       
        <div class = "img_icon"><a class = "icon_login" href = "auth_checker.php?quit=true"><img src = "images/log-out.png" width = "100px"></a></div>
    <div class = "main_info">
        
        <div class = "description_in_profile">
            <div class = "header_profile_small">
                <p>Имя</p>
            </div>
                <p>Имя</p>
        </div>
        
        <div class = "description_in_profile">
             <div class = "header_profile_small">
                <p>Статус</p>
             </div>
                <p>Админ</p>
        </div>
        
        <div class = "description_in_profile">
             <div class = "header_profile_small">
                <p>Логин</p>
             </div>
                <p><?php echo $_COOKIE['username'];?></p>
        </div>
        
        
    </div>
    </div>
    
</body>