<div class="cl"></div>
<div id="content">
    <fieldset style="width: 600px; margin: auto; padding-bottom: 20px; border-radius: 5px;">
        <legend style="text-align: left; padding:5px; margin:auto; font-size: 20px; color: green;">Liên Hệ: </legend>
        <?php
            if(isset($_POST['send']))
            {
                $n = $_POST['name'];
                $e = $_POST['email'];
                $p = $_POST['phone'];
                $ad = $_POST['add'];
                $t = $_POST['title'];
                $c = $_POST['content'];
                
                $user = new user;
                $user->set_user_name($_POST['user']);
                $data = $user->get_user();
                $u =$data['user_id'];
                
                $lhe = new Lienhe;
                
                $lhe->set_con_name($n);
                $lhe->set_con_email($e);
                $lhe->set_con_phone($p);
                $lhe->set_con_address($ad);
                $lhe->set_con_title($t);
                $lhe->set_con_content($c);
                $lhe->set_con_user($u);
                
                $lhe->add_lh();
                echo '<center style="color:red;">Gửi thành công!</center>';
            }
        ?>
        <div id="tlhe"><span>Liên hệ với chúng tôi!</span><br />

Mời quý khách điền thông tin liên hệ với chúng tôi, chúng tôi sẽ trả lời ngay sau khi nhận được thông tin từ quý khách</div>
        <form action="<?php echo '?m=lienhe&a=lienhe';?>" method="POST">
            <table style="margin: auto; line-height: 30px;">
                <tr>
                    <td>Họ tên: </td>
                    <td><input required="" type="text" size="25" name="name" /></td>
                </tr>
                <tr>
                    <td>Emai: </td>
                    <td><input required="" type="email" size="30" name="email" /></td>
                </tr>
                <tr>
                    <td>Phone: </td>
                    <td><input required="" type="text" size="20" name="phone" /></td>
                </tr>
                <tr>
                    <td>Địa chỉ: </td>
                    <td><textarea required="" name="add" cols="30" rows="3"></textarea></td>
                </tr>
                <tr>
                    <td>Tiêu Đề: </td>
                    <td><input required="" type="text" size="20" name="title" /></td>
                </tr>
                <tr>
                    <td>Nội dung: </td>
                    <td><textarea required="" name="content" cols="50" rows="5"></textarea></td>
                </tr>
                <tr>
                    <td>Người nhận:  </td>
                    <td>
                        <select name="user">
                        <?php
                            $user = new user;
                            $data = $user->get_userlv(2);
                            
                            if($data!=0)
                            {
                                foreach($data as $item)
                                {
                                    echo '<option>'.$item['user_name'].'</option>';
                                }
                            }
                        ?>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td><input class="buttom" type="submit" value="Gửi đi" name="send" /></td>
                </tr>
            </table>
        </form>
    </fieldset>
</div>