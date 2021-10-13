<?php if (!defined('IN_SITE')) die(header("location: index.php")); ?>
<div id="content">
    <div class="tk">
    <?php
        $lhe = new Lienhe;
        $u = $_SESSION['username'];
        
        $user = new user;
        $user->set_user_name($u);
        
        $id = $user->get_user();
        if($id['user_id']==1)
        {
            $coutlh = $lhe->getall_coutlhe();
        }
        else
        {
            $coutlh = $lhe->getuid_coutlhe($id['user_id']);
        }
        
    ?>
       <div class="texttk"><?php echo $coutlh;?></div>
       <div class="tde">Liên Hệ Mới</div> 
    </div>
    <div class="tk">
    <?php
        $sp = new sanpham;
        $l="";
        $cout = $sp->cout_sp($l);
    ?>
        <div class="texttk"><?php echo $cout;?></div>
        <div class="tde">Sản Phẩm</div> 
    </div>
</div>