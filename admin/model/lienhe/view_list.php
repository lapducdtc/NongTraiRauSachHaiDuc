<?php if (!defined('IN_SITE')) die(header("location: index.php")); ?>
            <div id="content">
				
				
				<table width="100%" cellpadding="0" cellspacing="0" border="0"
					id="table" class="tablesorter">
					<thead>
						<tr>
                            <th>Mã LHệ</th>
                            <th>Tiêu Đề</th>
                            <th>Người Gửi</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Trạng Thái</th>
                            <th>Action</th>
						</tr>
					</thead>
					<tbody>
                    <?php
                        $u = $_SESSION['username'];
                        $user = new user;
                        $user ->set_user_name($u);
                        $d = $user->get_user();
                        $l = $d['user_id'];
                        $lhe = new Lienhe;
                        if($l==1)
                        {
                            $data = $lhe->getall_lh();
                        }
                        else
                        {
                            $data = $lhe->get_uid($l);
                        }
                        if($data!=0)
                        {
                            foreach($data as $item)
                            {
                                echo '
                                    <tr>
                                        <td style="text-align: center;">'.$item['con_id'].'</td>
                                        <td>'.$item['con_title'].'</td>
                                        <td>'.$item['con_name'].'</td>
                                        <td>'.$item['con_email'].'</td>
                                        <td>'.$item['con_phone'].'</td>
                                        <td  style="text-align: center;">';
                                        if($item['con_live']==0)
                                        {
                                            echo '<img src="widgets/images/new.png" width="30" height="30" />';
                                        }
                                        else
                                        {
                                            echo 'đã xem';
                                        }
                                echo    '</td>
                                        <td style="text-align: center;"><a href="?m=lienhe&a=view_lienhe&id='.$item['con_id'].'" class="icon"><img src="widgets/images/mail.png" /> </a><a href="?m=lienhe&a=delete_lienhe&id='.$item['con_id'].'" class="icon"><img src="widgets/images/icon_delete.png" /> </a></td>
                                    </tr>
                                ';
                            }
                        }
                    ?>
                        
                    </tbody>
				</table>
                
                <div class="pager" style="margin-left: 600px;">
					
                    <img src="../site/widgets/images/previous.png" width="20" height="20" class="prev" />
                    <span class="pagedisplay"></span>
					<img src="../site/widgets/images/next.png" width="20" height="20" class="next" />
                    
                    <select class="pagesize" title="Select page size">
						<option selected="selected" value="10">10</option>
						<option value="20">20</option>
						<option value="50">50</option>
						<option value="100">100</option>
					</select><select class="gotoPage" title="Select page number"></select>
				</div>
		</div>
        </div>

                