<div class="cl"></div>
<div id="content">
<div id="leftsp">
    <?php
        include 'site/widgets/menu1.php';
    ?>
</div>
<div id="rigthsp">
    <div class="title">
        Chi Tiết Sản Phẩm: 
        <?php 
            $id = $_GET['id'];
            $l = "and sanpham.sp_id = '$id'";
            $sp = new sanpham;
            
            $data = $sp->get_spdm($l);
            if($data !=0)
            {
                foreach($data as $item)
                {
                    echo $item['sp_name'];
                
            
        ?>
    </div>
    <div id="v_content">
        <img src="admin/widgets/upload/<?php echo $item['url']; ?>" />
        <div id="ndung">
            <h2><?php echo $item['sp_name']; ?></h2>
            <span>Giá Bán:<?php echo $item['sp_gia'] ?> VND/1KG</span>
            <br />
            <span>Trạng Thái:
                <?php
                    if($item['sp_trangthai']==1)
                        echo 'còn hàng';
                    else
                        echo 'hết hàng';
                ?>
            </span><br />
            <span>Mọi chi tiết vui lòng Liên hệ:<a href="?m=lienhe&a=lienhe">Tại đây</a></span><br />
            <span><?php echo $item['sp_name'];?> Trồng Theo Tiêu Chuẩn VietGap</span>
        </div>
        <div class="cl"></div>
        <div id="mota">
            <div id="tdmota">Giới Thiệu: </div>
            <div id="ndgt"><br />
                <span>
                <?php
                    echo $item['sp_mota'];
                ?>
                </span>
            </div>
        </div>
    </div>
    

</div>
<div class="cl"></div>
<div id="spkhac">
        <div class="title" >
            <?php
                $cat_id = $item['cat_id'];
                
                $cat = new danhmucsp;
                
                $cat->set_cat_id($cat_id);
                
                $data1 = $cat->get_cat();
                
                echo 'Sản Phẩm '.$data1['cat_name'].' Khác';
            ?>
        </div>
        <div class="list1">
     
        <ul>
            <?php
                $l="and sanpham.cat_id = '$cat_id'";
                $data2 = $sp->get_spdm($l);
                if($data2!=0)
                {
                    foreach($data2 as $it)
                    {
                    echo '<li>
                            <img src="admin/widgets/upload/'.$it['url'].'"/>
                            <div class="thongtin">
                                <span>'.$it['sp_name'].'</span><br />
                                <span>'.$it['sp_gia'].'/1kg</span><br/>
                                <span>Trạng thái:  ';
                                    if($it['sp_trangthai']==1)
                                    {
                                        echo '<span style="color = #00BB00;">còn hàng</span>';
                                    }
                                    if($it['sp_trangthai']==0)
                                    {
                                        echo '<span style="color = red;">hết hảng</span>';
                                    }
                                echo '</span>
                            </div>
                            <div class="btchitiet">
                                <a href="?m=sanpham&a=chitiet_sp&id='.$it['sp_id'].'">xem chi tiet</a>
                            </div>
                            <div class="boderbt"></div>
                        </li>';
                    }
                }
                        
            ?>
        </ul>
    </div>
    </div>
        
    <?php
    }
                
    }
    ?>
<div class="cl"></div>
</div>