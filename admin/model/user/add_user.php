<div id="content">
<?php
    if(isset($_POST['add']))
    {
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
        
        $user->add_user();
        echo '<center style="color=red;">Add thành công!</center>';
    }
?>
<form action="<?php echo '?m=user&a=add_user';?>" method="POST">
    <fieldset>
        <legend style="text-align: left; padding:5px; margin-left: 30px;">Add User</legend>
        <table>
            <tr>
                <td>Username</td>
                <td><input required="" type="text" size="25" name="username" /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input required="" type="password" size="25" name="pass" /></td>
            </tr>
            <tr>
                <td>Confirm password</td>
                <td><input required=""  type="password" size="25" name="pass1" /></td>
            </tr>
            <tr>
                <td>Full name</td>
                <td><input required="" type="text" size="25" name="fname" /></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input required="" type="email" size="25" name="email" /></td>
            </tr>
            <tr>
                <td>Sex</td>
                <td><input required="" type="radio" name="sex" value="nam" />Nam<input type="radio" name="sex" value="nu" />Nữ</td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="text" size="25" name="age" /></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input required="" type="text" size="25" name="phone" /></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" size="25" name="address" /></td>
            </tr>
            <tr>
                <td>Level</td>
                <td>
                    <select name="level">
                        <option>Admin</option>
                        <option>Quản Trị Viên</option>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td></td>
                <td><input class="buttom" type="submit" value="Thêm" name="add" /></td>
            </tr>
        </table>
    </fieldset>
</form>
</div>