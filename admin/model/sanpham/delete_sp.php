<?php if (!defined('IN_SITE')) die(header("location: index.php")); ?>
<?php
    $id=$_GET['id'];
    $sp = new sanpham;
    $img = new img;
    $img->set_sp_id($id);
    if(isset($_POST['yes']))
    {
        $sp->Delete($id);
        $img->delete_img();
        header("location: ?m=sanpham&a=view_sp");
        
    }
    
    if(isset($_POST['no']))
    {
        header("location: ?m=sanpham&a=view_sp");
    }
?>

<form method="POST" action="<?php echo '?m=sanpham&a=delete_sp&id='.$_GET['id']; ?>">
    <table id="delete">
        <tr>
            <td colspan="2">Ban co thuc su muon xoa san pham nay?</td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="yes" value="YES" />
            </td>
            <td>
                <input type="submit" name="no" value="NO"/>
            </td>
        </tr>
    </table>
</form>