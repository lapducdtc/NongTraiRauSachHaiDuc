    <div id="center">
            <div id="nav">
                <div id="thongtin">
                    <span>Hello: </span><span><?php echo $_SESSION['username'];?></span>
                    <a href="<?php echo '?m=user&a=logout'?>">(logout)</a>   <br />
                    <span>Quyền:<?php 
                                if($_SESSION['level']==1)
                                {
                                    echo ' Admin';
                                }
                                else
                                {
                                    echo' Quản Trị Viên';
                                }
                                ?> </span> 
                </div>
                <ul>
                    <?php
                        if($_SESSION['level']==1){
                    ?>
                    <li><a id="<?php if($_GET['a']=="Dashboard"||$_GET['a']=="")echo "click";?>" href="<?php echo '?m=Dashboard&a=Dashboard' ?>">Dashboard</a></li>
                    <li><a id="<?php if($_GET['a']=="view_user"||$_GET['a']=="add_user"||$_GET['a']=="edit_user"||$_GET['a']=="delete_user") echo "click";?>" href="<?php echo '?m=user&a=view_user'?>">USER</a></li>
                    <li><a id="<?php if($_GET['a']=="view_dm"||$_GET['a']=="add_dm"||$_GET['a']=="edit_dm"||$_GET['a']=="delete_dm") echo "click";?>" href="<?php echo '?m=danhmuc&a=view_dm'?>">DANH MỤC</a></li>
                    <li><a id="<?php if($_GET['a']=="view_sp"||$_GET['a']=="add_sp"||$_GET['a']=="edit_sp"||$_GET['a']=="delete_sp") echo "click";?>" href="<?php echo '?m=sanpham&a=view_sp'?>">SẢN PHẨM</a></li>
                    <li><a id="<?php if($_GET['a']=="view_list"||$_GET['a']=="view_lienhe"||$_GET['a']=="delete_lienhe") echo "click";?>" href="<?php echo '?m=lienhe&a=view_list'?>">LIÊN HỆ</a></li>
                    <?php
                       }
                       else
                       {
                    ?>
                    <li><a id="<?php if($_GET['a']=="Dashboard"||$_GET['a']=="")echo "click";?>" href="<?php echo '?m=Dashboard&a=Dashboard' ?>">Dashboard</a></li>
                    <li><a id="<?php if($_GET['a']=="view_sp"||$_GET['a']=="add_sp"||$_GET['a']=="edit_sp"||$_GET['a']=="delete_sp") echo "click";?>" href="<?php echo '?m=sanpham&a=view_sp'?>">SẢN PHẨM</a></li>
                    <li><a id="<?php if($_GET['a']=="view_list"||$_GET['a']=="view_lienhe"||$_GET['a']=="delete_lienhe") echo "click";?>" href="<?php echo '?m=lienhe&a=view_list'?>">LIÊN HỆ</a></li>
                    <?php
                        }
                    ?>
                </ul>
                
            </div>