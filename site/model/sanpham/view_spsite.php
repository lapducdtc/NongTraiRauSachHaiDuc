<div class="cl"></div>
<div id="content">
<div id="leftsp">
    <?php
        include 'site/widgets/menu1.php';
    ?>
</div>
<div id="rigthsp">
    <div class="title">
        Sản Phẩm
    </div>
    <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 0;
        $p = max(1,$page);
        
        $ip = 6;
        
        $sp = new sanpham;
        
        
        $pp = $p-1;
        $np = $p+1;
        if(!isset($_GET['cid']))
        {
            $l= "";
            $noi = $sp->cout_sp($l);
        
            $nop = ceil($noi/$ip);
            $data= $sp->get_splimit($p,$ip);
            
        }
        else
        {
            $cid = $_GET['cid'];
            $t = "where cat_id = '$cid'";
            
            $noi = $sp->cout_sp($t);
            
            $l="and sanpham.cat_id = '$cid' LIMIT ".($p-1)*$ip.",$ip";
            $data = $sp->get_spdm($l);
        
            $nop = ceil($noi/$ip);
        }
        
    ?>
    <div class="list1" id="allsp">
     
        <ul>
            <?php
                if($data!=0)
                {
                    foreach($data as $item)
                    {
                    echo '<li>
                            <img src="admin/widgets/upload/'.$item['url'].'"/>
                            <div class="thongtin">
                                <span>'.$item['sp_name'].'</span><br />
                                <span>'.$item['sp_gia'].'/1kg</span><br/>
                                <span>Trạng thái:  ';
                                    if($item['sp_trangthai']==1)
                                    {
                                        echo '<span style="color = #00BB00;">còn hàng</span>';
                                    }
                                    if($item['sp_trangthai']==0)
                                    {
                                        echo '<span style="color = red;">hết hảng</span>';
                                    }
                                echo '</span>
                            </div>
                            <div class="btchitiet">
                                <a href="?m=sanpham&a=chitiet_sp&id='.$item['sp_id'].'">xem chi tiet</a>
                            </div>
                            <div class="boderbt"></div>
                        </li>';
                    }
                }
                        
            ?>
        </ul>
    </div>
    <div class="cl"></div>
    <div class="page">
    Trang:
        <?php
        if(!isset($_GET['cid']))
        {
            if($p>1) echo '<a href="?m=sanpham&a=view_spsite&page='.$pp.'"><img src="site/widgets/images/previous.png" width="15" height="15" /> </a>';
            for($i=1;$i<=$nop;$i++)
            {
                if($i==$p)
                {
                    echo '<strong>'.$i.'</strong>';
                }
                else
                {
                    echo '<a href="?m=sanpham&a=view_spsite&page='.$i.'">.'.$i.'.</a>';
                }
            }
        if($p<$nop) echo '<a href="?m=sanpham&a=view_spsite&page='.$np.'"><img src="site/widgets/images/next.png" width="15" height="15" /></a>';
        }
        else
        {
            $cid = $_GET['cid'];
            if($p>1) echo '<a href="?m=sanpham&a=view_spsite&cid='.$cid.'&page='.$pp.'"><img src="site/widgets/images/previous.png" width="15" height="15" /></a>';
            for($i=1;$i<=$nop;$i++)
            {
                if($i==$p)
                {
                    echo '<strong>'.$i.'</strong>';
                }
                else
                {
                    echo '<a href="?m=sanpham&a=view_spsite&cid='.$cid.'&page='.$i.'">.'.$i.'.</a>';
                }
            }
        if($p<$nop) echo '<a href="?m=sanpham&a=view_spsite&cid='.$cid.'&page='.$np.'"><img src="site/widgets/images/next.png" width="15" height="15" /></a>';
        }
        ?>
    </div>
    
</div>
<div class="cl"></div>
</div>
