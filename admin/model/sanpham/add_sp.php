
<div id="content">

<?php

    if(isset($_POST['add']))
    {
        $t=$_POST['tensp'];
        $g=$_POST['giasp'];
        $m=$_POST['motasp'];
        
        if($_POST['trangthai']=="còn hàng")
        {
            $th=1;
        }
        if($_POST['trangthai']=="hết hảng")
        {
            $th=0;
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
        if($sp->check_sp()==1)
        {
            echo '<center style="color:red;">san pham da ton tai!</center>';
        }
        else
        {
            $sp->add_sp();
            
            $name = $_FILES['img']['name'];
            $type = $_FILES['img']['type'];
            $temp = $_FILES['img']['tmp_name'];
            if($name != NULL)
            { 
                if($type == "image/jpeg" || $type == "image/png" || $type == "image/gif")
                { 
                    $path = "widgets/upload/";
                    move_uploaded_file($temp,$path.$name);
                }
                else
                {
                
                echo "Kieu file không hop le";
                }
            }
        
            $i = $name;
        
        
            $l ="Where sanpham.sp_name = '$t';";
            $data = $sp->getall_sp($l);
            if($data!=0)
            {
                foreach($data as $item)
                {
                    $img = new img;
                    $img->set_url($i);
                    $img->set_sp_id($item['sp_id']);
                    $img->add_img();
                }
            }
            echo '<center style="color:#06F606;">add thanh cong</center>';
        }
        
        
        
        
        

 
    }
    
?>
    <form action="<?php echo '?m=sanpham&a=add_sp'?>" method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend style="text-align: left; padding:5px; margin-left: 30px;">Add Sản Phẩm: </legend>
        <table >
            <tr >
                <td>Tên Sản Phẩm: </td>
                <td><input required="" type="text" size="25" name="tensp" /></td>
            </tr>
            <tr>
                <td>Giá Sản Phẩm: </td>
                <td><input required="" type="text" size="25" name="giasp" /></td>
            </tr>
            <tr>
                <td>Mô Tả: </td>
                <td><textarea required="" rows="5" cols="70" name="motasp"></textarea></td>
            </tr>
            <tr>
                <td>Trạng Thái: </td>
                <td>
                    <select name="trangthai">
                        <option>còn hàng</option>
                        <option>hết hảng</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Danh Mục: </td>
                <td>
                    <select name="danhmuc">
                    <?php
                        $dm = new danhmucsp;
                        
                        $data = $dm->getall_cat();
                        
                        if($data!=0)
                        {
                            foreach($data as $item)
                            {
                                echo "<option>".$item["cat_name"]."</option>";
                            }
                        }
                    ?>
                    
                       
                    </select>
                </td>
            </tr>
            
            <tr>
                <td>Hình ảnh: </td>
                <td>
                    <input type="file" name="img"/>
                </td>
            </tr>
            
            <tr>
                <td></td>
                <td>
                    <input class="buttom" type="submit" value="Thêm" name="add" />
                </td>
            </tr>
        </table>
    </fieldset>
    </form>
</div>