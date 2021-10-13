<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href=""/>
    <link rel="stylesheet" type="text/css" href="site/widgets/style.css"/>
    <script type="text/javascript" src="site/widgets/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="site/widgets/js/slide1.js"></script>
    <script type="text/javascript" src="site/widgets/js/custom.js"></script>
	<title>Nong trai rau sach hai duc</title>
</head>

<body>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=1482191455392648";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <div id="header">
        <div class="wapper">
            <div id="banner">
                <a href="index.php">
                    <img src="site/widgets/images/logo.png"/>
                </a>
                
            </div>
            <div class="cl"></div>
            <div id="nav">
                <ul>
                    <li><a id="onlink" href="index.php">TRANG CHỦ</a></li>
                    <li><a id="<?php if($_GET['a']=="gioithieu"){echo "onlink";}?>" href="<?php echo '?m=gioithieu&a=gioithieu';?>">GIỚI THIỆU</a></li>
                    <li><a id="<?php if($_GET['a']=="view_spsite"){echo "onlink";}?>"  href="<?php echo '?m=sanpham&a=view_spsite';?>">SẢN PHẨM</a></li>
                    <li><a id="<?php if($_GET['a']=="lienhe"){echo "onlink";}?>"  href="<?php echo '?m=lienhe&a=lienhe';?>">LIÊN HỆ</a></li>
                </ul>
                <div id="search">
                    <form class="searchform" action="?m=search&a=search" method="POST">
                        <input class="s" name="search" onfocus="if (this.value == 'nhập tên sản phẩm..') {this.value = '';}" onblur="if (this.value == '') {this.value = 'nhập tên sản phẩm..';}" type="text" name="s" value="nhập tên sản phẩm.." />
                        <input class="searchsubmit" type="submit" value="Tìm kiếm" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    