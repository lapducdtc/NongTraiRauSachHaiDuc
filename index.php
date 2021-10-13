<?php
    include 'database/Database.php';
    include 'database/sanpham.php';
    include 'database/danhmucsp.php';
    include 'database/Lienhe.php';
    include 'database/user.php';
    include 'site/widgets/header.php';
    
    if(!isset($_GET['m'])and !isset($_GET['a']))
    {
        include 'site/model/main.php';
    }
    else
    {
        $m = $_GET['m'];
        $a = $_GET['a'];
        $path = 'site/model/'.$m.'/'.$a.'.php';
        if(file_exists($path)){
        include $path;
        }
        else
        {
            include 'libs/404.php';
        }
    }
    include 'site/widgets/footer.php';
?>