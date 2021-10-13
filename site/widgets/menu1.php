<div class="cl"></div>
<div id="menu1">
    <ul>
        <div id="td">Sản Phẩm</div>
        <?php
            $cat = new danhmucsp;
            
            $data = $cat->getall_cat();
            
            if($data!=0)
            {
               foreach($data as $item)
               {
                
               
        ?>
        <li><a id="<?php if($_GET['a']=="view_spsite" && $_GET['cid']==$item['cat_id']) echo 'onlink2';?>" href="?m=sanpham&a=view_spsite&cid=<?php echo $item['cat_id'];?>"><?php echo $item['cat_name'];?></a></li>
        <?php
            }
            }
        ?>
        <div class="fb-page" data-href="https://www.facebook.com/rausachhaiduc/" data-tabs="email" data-width="250px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
            <div class="fb-xfbml-parse-ignore">
                <blockquote cite="https://www.facebook.com/rausachhaiduc/">
                    <a href="https://www.facebook.com/rausachhaiduc/">Nông Trạ Rau Sạch Hải Đức</a>
                </blockquote>
            </div>
        </div>
    </ul>
</div>
<div class="cl"></div>
