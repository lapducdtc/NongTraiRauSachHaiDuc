<?php if (!defined('IN_SITE')) die(header("location: index.php")); ?>
<?php
    $dm=new danhmucsp;
    $id=$_GET['id'];
    $dm->set_cat_id($id);
    if(isset($_POST['yes']))
    {
        $dm->Delete_cat();
        header("location: ?m=danhmuc&a=view_dm");
        
    }
    
    if(isset($_POST['no']))
    {
        header("location: ?m=danhmuc&a=view_dm");
    }
?>
<form method="POST" action="<?php echo '?m=danhmuc&a=delete_dm&id='.$_GET['id']; ?>">
    <table id="delete">
        <tr>
            <td colspan="2">Ban co thuc su muon xoa danh muc nay?</td>
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