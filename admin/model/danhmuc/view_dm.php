<?php if (!defined('IN_SITE')) die(header("location: index.php")); ?>

<div id="content" class="tbdm">
<table >
<tr>
    <th>Mã Danh Mục</th>
    <th>Tên Danh Mục</th>
    <th>Ghi Chú</th>
    <th>Action</th>
</tr>

    <?php
        $vdm = new danhmucsp;
        $data= $vdm->getall_cat();
        if($data !=0)
        {
            foreach($data as $item)
            {
                echo '<tr><td>'.$item['cat_id'].'</td>
                <td>'.$item['cat_name'].'</td>
                <td>'.$item['cat_mota'].'</td>
                <td><a href="?m=danhmuc&a=edit_dm&id='.$item['cat_id'].'" class="icon"><img src="widgets/images/icon_edit.png"/> </a><a href="?m=danhmuc&a=delete_dm&id='.$item['cat_id'].'" class="icon" ><img src="widgets/images/icon_delete.png" /> </a></td>
                </tr>';
            }    
        }
        else
        {
            echo '<tr><td colspan="4">Không có danh mục nào!</td></tr>';
        }
    ?>
    

<form action="<?php echo "?m=danhmuc&a=view_dm"?>" method="POST">
<tr>
    <td><input required="" type="text" class="ip" name="madm"/></td>
    <td><input required="" type="text" class="ip" name="name"/></td>
    <td><textarea class="ip" cols="20" rows="2" name="ghichu"></textarea></td>
    <td>
        <button name="add" class="icon">
            <img src="widgets/images/icon_add.png"/>
        </button>
    </td>
</tr>
</form>
<?php
    if(isset($_POST['add']))
    {
        $m=$_POST['madm'];
        $n=$_POST['name'];
        $g=$_POST['ghichu'];
        
        $dm = new danhmucsp;
        
        $dm->set_cat_id($m);
        $dm->set_cat_name($n);
        $dm->set_cat_mota($g);
        
        if($dm->check_cat()==2)
        {
            $dm->add_cat();
            echo '<tr><td colspan="4">add thanh cong!</td></tr>';
            
        }
        else
        {
            echo '<tr><td colspan="4">danh muc da ton tai!</td></tr>';
        }
    }
?>

</table>
</div>