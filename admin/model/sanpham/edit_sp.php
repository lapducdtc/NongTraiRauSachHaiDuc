<?php if (!defined('IN_SITE')) die(header("location: index.php")); ?>
<div id="content">
<?php
    if(isset($_POST['edit']))
    {
        $id= $_GET['id'];
        $t = $_POST['tensp'];
        $g = $_POST['giasp'];
        $m = $_POST['mota'];
        if($_POST['trangthai']=="còn hàng")
        {
            $th =1;
        }
        if($_POST['trangthai']=="hết hảng")
        {
            $th =0;
        }
        
        $dm= new danhmucsp;
        $dm->set_cat_name($_POST['danhmuc']);
        $d = $dm->get_cat();
        
        
        $user = new user;
        $user->set_user_name($_SESSION['username']);
        
        $u = $user->get_user();
        $i=$u['user_id'];
        
        $sp = new sanpham;
        
        $sp->set_cat_id($d['cat_id']);
        $sp->set_sp_name($t);
        $sp->set_sp_gia($g);
        $sp->set_sp_mota($m);
        $sp->set_sp_trangthai($th);
        $sp->set_user_id($i);
        
        $sp->update_sp($id);
            
            $name = $_FILES['img']['name'];
            $type = $_FILES['img']['type'];
            $temp = $_FILES['img']['tmp_name'];
            if($name != NULL)
            { 
                if($type == "image/jpeg" || $type == "image/png" || $type == "image/gif")
                { 
                    $path = "widgets/upload/";
                    move_uploaded_file($temp,$path.$name);
                    $img = new img;
                    $img->set_url($name);
                    $img->update_img($id);
                }
                else
                {
                echo "Kieu file không hop le";
                }
            }
        
            echo '<center style="color:#06F606;">edit thanh cong</center>';
        
            }
            
    if(isset($_POST['exit']))
    {
        header("location: ?m=sanpham&a=view_sp");
    }
    
?>
    <form action="<?php echo '?m=sanpham&a=edit_sp&id='.$_GET['id'];?>" method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend style="text-align: left; padding:5px; margin-left: 30px;">Exit Sản Phẩm: </legend>
        <table >
            <?php
                $i = $_GET['id'];
                $sp = new sanpham;
                $dm = new danhmucsp;
                $img = new img;
                $l = "and sanpham.sp_id = $i";
                
                $data = $sp->get_spdm($l);
                
                if($data!=0)
                {
                foreach($data as $item){
                
            ?>
            <tr >
            
                <td>Tên Sản Phẩm: </td>
                <td><input type="text" size="25" name="tensp" value="<?php echo $item['sp_name'];?>" /></td>
            </tr>
            <tr>
                <td>Giá Sản Phẩm: </td>
                <td><input type="text" size="25" name="giasp" value="<?php echo $item['sp_gia'];?>" /></td>
            </tr>
            <tr>
                <td>Mô Tả: </td>
                <td><textarea rows="5" name="mota" cols="70"><?php echo $item['sp_mota'];?></textarea></td>
            </tr>
            <tr>
                <td>Trạng Thái: </td>
                <td>
                    <select name="trangthai">
                    <?php
                        if($item['sp_trangthai']==1)
                        {
                            echo "
                            <option>còn hàng</option>
                            <option>hết hảng</option>";
                        }
                        if($item['sp_trangthai']==0)
                        {
                            echo "
                            <option>hết hảng</option>
                            <option>còn hàng</option>";
                        }
                    ?>
                        
                    </select>
                </td>
            </tr>
            <tr>
                <td>Danh Mục: </td>
                <td>
                    <select name="danhmuc">
                        <?php
                        $dm = new danhmucsp;
                        
                        $data1 = $dm->getall_cat();
                        
                        if($data1!=0)
                        {
                            foreach($data1 as $it)
                            {
                                echo "<option>".$it["cat_name"]."</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh: <img style="width: 50; height: 50;" src="widgets/upload/<?php echo $item['url'];?>" /></td>
                <td><input type="file" name="img" /></td>
            </tr>
            
            <tr>
                <td></td>
                <td>
                    <input class="buttom" type="submit" value="Sửa" name="edit" />
                    <input class="buttom" type="submit" value="Thoát" name="exit"/>
                </td>
            </tr>
        <?php
        }
                }
        ?>
        </table>
    </fieldset>
    </form>
</div>