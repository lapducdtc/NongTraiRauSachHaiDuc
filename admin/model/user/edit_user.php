<div id="content">
<?php
    if(isset($_POST['edit']))
    {
        $id=$_GET['id'];
        $u = $_POST['username'];
        if($_POST['pass']==$_POST['pass1'])
        {
            $p=$_POST['pass'];
        }
        else
        {
            echo "xac nhan lai pass word!";
        }
        $f = $_POST['fname'];
        $e = $_POST['email'];
        
        if($_POST['sex']=="nam")
        {
            $s = 1;
        }
        if($_POST['sex']=="nu")
        {
            $s=0;
        }
        $a = $_POST['age'];
        $ph = $_POST['phone'];
        $ad = $_POST['address'];
        if($_POST['level']=="Admin")
        {
            $l=1;
        }
        if($_POST['level']=="Quản Trị Viên")
        {
            $l=2;
        }
        
        $user = new user;
        
        $user->set_user_name($u);
        $user->set_password($p);
        $user->set_fullname($f);
        $user->set_email($e);
        $user->set_sex($s);
        $user->set_age($a);
        $user->set_phone($ph);
        $user->set_address($ad);
        $user->set_level($l);
        
        $user->update_user($id);
        
        echo '<center style="color:#06F606;">edit thanh cong</center>';
    }
    
    if(isset($_POST['exit']))
    {
        header("location: ?m=user&a=view_user");
    }
?>
<form action="<?php echo '?m=user&a=edit_user&id='.$_GET['id'];?>" method="POST">
<?php
    $user = new user;
    $data =$user->get_userid($_GET['id']);
    
?>
    <fieldset>
        <legend style="text-align: left; padding:5px; margin-left: 30px;">Edit User</legend>
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" size="25" name="username" value="<?php echo $data['user_name'];?>" /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" size="25" name="pass" value="<?php echo base64_decode($data['password']);?>" /></td>
            </tr>
            <tr>
                <td>Confirm password</td>
                <td><input type="password" size="25" name="pass1" value="<?php echo base64_decode($data['password']);?>"/></td>
            </tr>
            <tr>
                <td>Full name</td>
                <td><input type="text" size="25" name="fname" value="<?php echo $data['fullname']?>"/></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" size="25" name="email" value="<?php echo $data['email']?>" /></td>
            </tr>
            <tr>
                <td>Sex</td>
                <td>
                <?php
                    if($data['sex']==1)
                    {
                        echo '<input type="radio" name="sex" value="nam" checked/>Nam<input type="radio" name="sex" value="nu" />Nữ';
                    }
                    if($data['sex']==0)
                    {
                        echo '<input type="radio" name="sex" value="nam" />Nam<input type="radio" name="sex" value="nu"  checked/>Nữ';
                    }
                ?>
                </td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="text" size="25" name="age" value="<?php echo $data['age']?>"/></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" size="25" name="phone" value="<?php echo $data['phone']?>"/></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" size="25" name="address" value="<?php echo $data['address']?>"/></td>
            </tr>
            <tr>
                <td>Level</td>
                <td>
                    <select name="level">
                    <?php
                        if($data['level']==1)
                        {
                            echo '<option>Admin</option>
                            <option>Quản Trị Viên</option>';
                        }
                        if($data['level']==2)
                        {
                            echo '<option>Quản Trị Viên</option>
                            <option>Admin</option>';
                        }
                    ?>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td></td>
                <td><input class="buttom" type="submit" value="Edit" name="edit" /><input class="buttom" type="submit" value="Thoát" name="exit" /></td>
            </tr>
        </table>
    </fieldset>
</form>
</div>