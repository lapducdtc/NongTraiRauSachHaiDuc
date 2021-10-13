<?php
    session_start();
    include '../database/Database.php';
    include '../database/sanpham.php';
    include '../database/Lienhe.php';
    include '../database/user.php';
    include '../database/danhmucsp.php';
    include '../database/img.php';
    include 'widgets/header.php';
    
    
?>
<?php
    if(!isset($_SESSION['username']))
    {
        $m="user";
        $a="login";
        $path = "model/".$m."/".$a.".php";
        include $path;
    }
    else
    {
    include 'widgets/menu.php';
    define("IN_SITE", true);
    if(!isset($_GET['m'])and !isset($_GET['a'])){
        $m="Dashboard";
        $a="Dashboard";
        $path='model/'.$m.'/'.$a.'.php';
        include $path;
    }
    else
    {
        $m=$_GET['m'];
        $a=$_GET['a'];
        $path = 'model/'.$m.'/'.$a.'.php';
        if(file_exists($path)){
        include $path;
        }
        else
        {
            include '../libs/404.php';
        }
    }
    }
    
    
    
    
    
?>
<?php
    include 'widgets/footer.php';
?>