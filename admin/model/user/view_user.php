<?php if (!defined('IN_SITE')) die(header("location: index.php")); ?>

<div id="content" class="tbdm">
<div id="addsp"><a href="<?php echo '?m=user&a=add_user';?>">Add User</a></div>
<table>
    <tr>
        <th>User_id</th>
        <th>Username</th>
        <th>Password</th>
        <th>Full name</th>
        <th>Sex</th>
        <th>Age</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Level</th>
        <th>Action</th>  
    </tr>
    <?php
        $user = new user;
        
        $data = $user->getall_user();
        
        if($data!=0)
        {
            foreach($data as $item)
            {
                echo '
                    <tr>
                        <td>'.$item['user_id'].'</td>
                        <td>'.$item['user_name'].'</td>
                        <td>'.$item['password'].'</td>
                        <td>'.$item['fullname'].'</td>';
                        if($item['sex']==1)
                        {
                            echo '<td>Nam</td>';
                        }
                        if($item['sex']==0)
                        {
                            echo '<td>Nữ</td>';
                        }
                        echo '<td>'.$item['age'].'</td>
                        <td>'.$item['email'].'</td>
                        <td>'.$item['phone'].'</td>
                        <td>'.$item['address'].'</td>';
                        if($item['level']==1)
                        {
                            echo '<td>Admin</td>';
                        }
                        else
                        {
                            echo '<td>Quản Trị Viên</td>';
                        }
                        echo '<td>
                            <a href="?m=user&a=edit_user&id='.$item['user_id'].'" class="icon"><img src="widgets/images/icon_edit.png"/> </a><br/>';
                            if($item['user_id']==1)
                            {
                                echo "";
                            }
                            else
                                echo'<a href="?m=user&a=delete_user&id='.$item['user_id'].'" class="icon" ><img src="widgets/images/icon_delete.png" /> </a>
                        </td>
                    </tr>
                ';
            }
        }
    ?>
</table>
</div>