
<div id="lcenter">
<form action="index.php" method="POST">
    <fieldset id="login">
        <legend id="lelogin" style="text-align: center;">ĐĂNG NHẬP</legend>
        <?php
        
    if(!isset($_SESSION['username']))
            {
                if(isset($_POST['login']))
                {
                    $u = $_POST['user'];
                    $p = $_POST['pass'] ;
        
                    $user = new user;
                    $user->set_user_name($u);
                    $user->set_password($p);
                    if($user->check_uer()==1 )
                    {
                        $data = $user->get_user();
                        if($data['level']==1)
                        {
                            $_SESSION['username']=$u;
                            $_SESSION['level']=$data['level'];
                            header("location: index.php");
                        }
                        else
                        {
                            $_SESSION['username']=$u;
                            $_SESSION['level']=$data['level'];
                            header("location: index.php");
                            
                           
                        }
                        
                    }
                    else
                    {
                        echo '<center style ="color:red;">Sai tên đăng nhập hoặc password</center>';
                    }
         
                }
            }
            else
            {
                header("location: index.php");
            }
?>
        <table>
            <tr>
                <td>Username: </td>
                <td><input required="" type="text" size="25" name="user" /></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input required="" type="password" size="25" name="pass"/></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input id="slogin" type="submit" value="ĐĂNG NHẬP" name="login"/>
                </td>
            </tr>
        </table>
    </fieldset>
</form>

