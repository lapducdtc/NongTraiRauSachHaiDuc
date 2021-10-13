<?php
    $search = $_POST["search"];
    $sp = new sanpham;
    
    $data = $sp->search_sp($search);
                                
    if($data!=0){
  
?>
<div id="content">
<div class="cl"></div>
        <div id="list">
            <div class="danhmuc">
                
                <div class="tieude" style="color: white;">Sản phẩm được tìm kiếm với từ khóa: "<?php echo $search;?>"</div>
                <div class="list1">
                    <ul>
                        <?php
                                    foreach($data as $it)
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
                        }
                        else
                        {
                            echo '<div id="content"><div class="tieude" style="color: white;">không có Sản phẩm nào phù hợp với từ khóa: "<?php echo $search;?>"</div></div>';
                        }
                        ?>
                    </ul>
                </div>
                
                <?php
                echo '<div class="cl"></div>
            <div class="boderbt"></div>';
                
                ?>
            </div>
        </div>
        </div>
<?php
    include 'site/widgets/slide2.php';
?>