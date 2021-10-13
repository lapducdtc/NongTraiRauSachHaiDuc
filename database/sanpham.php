<?php
    class sanpham extends Database
    {
        private $cat_id;
        private $user_id;
        private $sp_name;
        private $sp_gia;
        private $sp_mota;
        private $sp_trangthai;
        
        public function set_cat_id($cat_id)
        {
            $this->cat_id = $cat_id;
        }
        
        public function get_cat_id()
        {
            return $this->cat_id;
        }
        public function set_user_id($user_id)
        {
            $this->user_id = $user_id;
        }
        
        public function get_user_id()
        {
            return $this->user_id;
        }
        
        public function set_sp_name($sp_name)
        {
            $this->sp_name = $sp_name;
        }
        
        public function get_sp_name()
        {
            return $this->sp_name;
        }
        
        public function set_sp_gia($sp_gia)
        {
            $this->sp_gia = $sp_gia;
        }
        
        public function get_sp_gia()
        {
            return $this->sp_gia;
        }
        
        public function set_sp_mota($sp_mota)
        {
            $this->sp_mota = $sp_mota;
        }
        
        public function get_sp_mota()
        {
            return $this->sp_mota;
        }
        
        public function set_sp_trangthai($sp_trangthai)
        {
            $this->sp_trangthai = $sp_trangthai;
        }
        
        public function get_sp_trangthai()
        {
            return $this->sp_trangthai;
        }
        
        public function cout_sp($l)
        {
            $sql="select * from sanpham $l";
            $this->query($sql);
            
            return $this->num_rows();
        }
        
        public function search_sp($search)
        {
            $sql = "select sanpham.*,danhmucsp.cat_name,image.url,user.user_name from sanpham,danhmucsp,image,user where danhmucsp.cat_id=sanpham.cat_id and image.sp_id = sanpham.sp_id and user.user_id = sanpham.user_id  and sanpham.sp_name LIKE '%$search%'";
            $this->query($sql);
            if($this->num_rows()==0)
            {
                $data=0;
            }
            else
            {
                while($row=$this->fetch())
                {
                    $data[] = $row;
                }
            }
            return $data;
        }
        
        public function get_splimit($p,$i)
        {
            $sql = "select sanpham.*,danhmucsp.cat_name,image.url,user.user_name from sanpham,danhmucsp,image,user where danhmucsp.cat_id=sanpham.cat_id and image.sp_id = sanpham.sp_id and user.user_id = sanpham.user_id LIMIT ".($p-1)*$i.",$i";
            $this->query($sql);
            if($this->num_rows()==0)
            {
                $data=0;
            }
            else
            {
                while($row=$this->fetch())
                {
                    $data[] = $row;
                }
            }
            return $data;
        }
        public function getall_sp($l)
        {
            $sql="select * from sanpham $l";
            $this->query($sql);
            if($this->num_rows()==0)
            {
                $data=0;
            }
            else
            {
                while($row=$this->fetch())
                {
                    $data[] = $row;
                }
            }
            return $data;
        }
        public function get_spdm($l)
        {
            $sql = "select sanpham.*,danhmucsp.cat_name,image.url,user.user_name from sanpham,danhmucsp,image,user where danhmucsp.cat_id=sanpham.cat_id and image.sp_id = sanpham.sp_id and user.user_id = sanpham.user_id $l";
            $this->query($sql);
            if($this->num_rows()==0)
            {
                $data=0;
            }
            else
            {
                while($row=$this->fetch())
                {
                    $data[] = $row;
                }
            }
            return $data;
        }
        
        
        
        public function check_sp()
        {
            $sql = "select * from sanpham where sp_name = '$this->sp_name' ";
            $this->query($sql);
            if($this->num_rows() == 1)
            {
                return 1;
            }else
            {
                return 2;
            }
        }
        
        public function add_sp()
        {
            $sql="INSERT INTO `sanpham` (`sp_id`, `cat_id`, `user_id`, `sp_name`, `sp_gia`, `sp_mota`, `sp_trangthai`) 
            VALUES (NULL, '$this->cat_id', '$this->user_id', '$this->sp_name', '$this->sp_gia', '$this->sp_mota', '$this->sp_trangthai');";
            $this->query($sql);
        }
        
        
        public function update_sp($i)
        {
            
            $sql="UPDATE `sanpham` SET `cat_id`='$this->cat_id',`user_id`='$this->user_id',`sp_name`='$this->sp_name',`sp_gia`='$this->sp_gia',`sp_mota`='$this->sp_mota',`sp_trangthai`='$this->sp_trangthai' WHERE sp_id = $i";
            $this->query($sql);
        }
        
        public function Delete($id)
        {
            $sql ="DELETE FROM `sanpham` WHERE `sanpham`.`sp_id` = $id";
            $this->query($sql);
        }
        
        
        
        
        
    }
?>