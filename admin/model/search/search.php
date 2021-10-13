<?php
    
  
?>
<?php if (!defined('IN_SITE')) die(header("location: index.php")); ?>
            <div id="content">
				<div class="filter" style="margin-bottom: 5px;">
					<a style=" float: left; margin-right: 150px;" href="<?php echo '?m=sanpham&a=add_sp'?>">Add sản phẩm</a>
                    <div style="float: left;" id="search">
                        <form class="searchform" action="?m=search&a=search" method="POST">
                            <input class="s" name="search" onfocus="if (this.value == 'nhập tên sản phẩm..') {this.value = '';}" onblur="if (this.value == '') {this.value = 'nhập tên sản phẩm..';}" type="text" name="s" value="nhập tên sản phẩm.." />
                            <input class="searchsubmit" type="submit" value="Tìm kiếm" />
                        </form>
                    </div>
				</div>
				
				<table width="100%" cellpadding="0" cellspacing="0" border="0"
					id="table" class="tablesorter">
					<thead>
						<tr>
                            <th><h4>Hình ảnh</h4></th>  
							<th><h4>Mã sp</h4></th>
							<th><h4>Tên sản phẩm</h4></th>
							<th><h4>Danh mục</h4></th>
							<th><h4>Giá sp</h4></th>
							<th><h4>Mô tả</h4></th>
							<th><h4>Trạng thái</h4></th>
							<th><h4>Người đăng</h4></th>
							<th><h4>Action</h4></th>
						</tr>
					</thead>
					
					<tbody>
                    <?php
                        $search = $_POST["search"];
                        $sp = new sanpham;
                        
                        $data = $sp->search_sp($search);

                        
                        if($data!=0)
                        {
                            foreach($data as $item)
                            {
				                echo '<tr>
                                    <td><img src="widgets/upload/'.$item['url'].'" style="width: 50px; height: 50px;" /></td>
                                    <td>'.$item['sp_id'].'</td>
                                    <td>'.$item['sp_name'].'</td>
                                    <td>'.$item['cat_name'].'</td>
                                    <td>'.$item['sp_gia'].'</td>
                                    <td>'.$item['sp_mota'].'</td>
                                    <td>';
                                    if($item['sp_trangthai']==1)
                                    {
                                        echo "còn hàng";
                                    }
                                    if($item['sp_trangthai']==0)
                                    {
                                        echo "hết hảng";
                                    }
                                    echo '</td>
                                    <td>'.$item['user_name'].'</td>
                                    <td style=""><a href="?m=sanpham&a=edit_sp&id='.$item['sp_id'].'" class="icon"><img src="widgets/images/icon_edit.png"/></a><a href="?m=sanpham&a=delete_sp&id='.$item['sp_id'].'" class="icon"><img src="widgets/images/icon_delete.png" /> </a></td>
                        
                                </tr> ';                              
                            }
                        }
                        else
                        {
                            echo '<tr>
                                <td colspan="9" style="text-align: center; color:red;font-size: 15px;" >không tồn tại sản phẩm nào phù hợp với từ khóa.</td>
                            </tr>';
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
