<?php
    $id=$_GET['id'];
    
    $lhe = new Lienhe;
    if(isset($_POST['yes']))
    {
        $lhe->delete_lh($id);
        header("location: ?m=lienhe&a=view_list");
    }
    
    if(isset($_POST['no']))
    {
        header("location: ?m=lienhe&a=view_list");
    }
?>
<form method="POST" action="<?php echo '?m=lienhe&a=delete_lienhe&id='.$_GET['id']; ?>">
    <table id="delete">
        <tr>
            <td colspan="2">Ban co thuc su muon xoa lien he nay?</td>
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