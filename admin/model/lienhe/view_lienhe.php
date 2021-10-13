<div id="content">
<fieldset>
    <legend style="text-align: left; padding:5px; margin-left: 30px;">Liên Hệ</legend>

    <table>
    <?php
        $id = $_GET['id'];
        if(isset($_POST['home']))
        {
            header("location: ?m=lienhe&a=view_list");
        }
        $lhe= new Lienhe;
        $lhe->update_con($id);
        $data = $lhe->getid_lh($id);
        if($data !=0)
        {
            foreach($data as $item)
            {
                
            
    ?>
        <tr>
            <th>Tiêu đề: </th>
            <td><?php echo $item['con_title'];?></td>
        </tr>
        
        <tr>
            <th>Người gửi: </th>
            <td><?php echo $item['con_name'];?></td>
        </tr>
        
        <tr>
            <th>Email: </th>
            <td><?php echo $item['con_email'];?></td>
        </tr>
        
        <tr>
            <th>Phone: </th>
            <td><?php echo $item['con_phone'];?></td>
        </tr>
        <tr>
            <th>Ađress: </th>
            <td><?php echo $item['con_address'];?></td>
        </tr>
        <tr>
            <th>Ngày gửi: </th>
            <td><?php echo $item['con_date'];?></td>
        </tr>
        
        <tr>
            <th>Người nhận: </th>
            <td><?php echo $item['user_id'];?></td>
        </tr>
        
        <tr>
            <th>Nội dung: </th>
            <td><?php echo $item['con_content'];?></td>
        </tr>
        
        <tr>
            <td></td>
            <td>
                <form action="<?php echo '?m=Lienhe&a=view_lienhe';?>" method="POST">
                    <td><input type="submit" class="buttom" value="Quay lại" name="home"/></td>
                </form>
            </td>
        </tr>
    <?php
        }
        }
    ?>
    </table>
</fieldset>
</div>