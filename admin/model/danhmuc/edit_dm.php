<div id="content" class="tbdm">

<?php
    if(isset($_POST['edit']))
    {
        $madm = $_POST['madm'];
        $name = $_POST['name'];
        $mota = $_POST['mota'];
        $dm = new danhmucsp;
        $id=$_GET['id'];
        $dm->set_cat_id($madm);
        $dm->set_cat_name($name);
        $dm->set_cat_mota($mota);
        
        $dm->update_cat($id);
        
        header("location: ?m=danhmuc&a=view_dm");
        
    }
?>
<table >
<tr>
    <th>Mã Danh Mục</th>
    <th>Tên Danh Mục</th>
    <th>Ghi Chú</th>
    <th>Action</th>
</tr>
<form action="<?php echo '?m=danhmuc&a=edit_dm&id='.$_GET['id'];?>" method="POST">
<?php
    $dm1= new danhmucsp;
    $dm1->set_cat_id($_GET['id']);
    $data1 = $dm1->get_cat();
    echo '<tr>
    <td><input required="" class="ip" type="text" name="madm" value="'.$data1['cat_id'].'"  /></td>
    <td><input required="" class="ip" type="text" name="name" value="'.$data1['cat_name'].'"  /></td>
    <td><input type="text" class="ip" name="mota" value="'.$data1['cat_mota'].'"  /></td>
    <td><button class="icon" name="edit"><img src="widgets/images/icon_edit.png"/> </button></td>
</tr>';
?>
</form>

</table>
</div>;