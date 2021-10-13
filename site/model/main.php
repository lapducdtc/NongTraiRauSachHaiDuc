<?php
    include 'site/widgets/slide1.php';
?>
<div class="cl"></div>
        <div id="list">
            <div class="danhmuc">
                <?php
                $danhmuc = new danhmucsp;
                $data = $danhmuc->getall_cat();
                $sp = new sanpham;
                
                if($data!=0){
                foreach($data as $item){
                ?>
                <div class="tieude"><a href="<?php echo '?m=sanpham&a=view_spsite&cid='.$item['cat_id'];?>"><?php echo $item['cat_name']?></a></div>
                <div class="list1">
                    <ul>
                        <?php
                               $cat = $item['cat_id'];
                               $l="and sanpham.cat_id ='$cat' ORDER BY sanpham.sp_id DESC LIMIT 5";
                               $datasp = $sp->get_spdm($l);
                                
                                if($datasp!=0){
                                    foreach($datasp as $it)
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
                            
                        </li>';
                        }
                        }?>
                    </ul>
                </div>
                
                <?php
                echo '<div class="cl"></div>
            <div class="boderbt"></div>';
                }
                }
                ?>
            </div>
        </div>
<?php
    include 'site/widgets/slide2.php';
?>
        
        
        