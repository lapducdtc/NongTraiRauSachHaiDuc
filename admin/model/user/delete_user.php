<?php if (!defined('IN_SITE')) die(header("location: index.php")); ?>
<?php
    $user = new user;
    $id=$_GET['id'];
    if(isset($_POST['yes']))
    {
        $user->delete_user($id);
        header("location: ?m=user&a=view_user");
        
    }
    
    if(isset($_POST['no']))
    {
        header("location: ?m=user&a=view_user");
    }
?>
<form method="POST" action="<?php echo '?m=user&a=delete_user&id='.$_GET['id']; ?>">
    <table id="delete">
        <tr>
            <td colspan="2">Ban co thuc su muon xoa nguoi nay?</td>
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