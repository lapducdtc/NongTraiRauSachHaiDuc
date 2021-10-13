<?php
    class danhmucsp extends Database
    {
        private $cat_id;
        private $cat_name;
        private $cat_mota;
        
        public function set_cat_id($cat_id)
        {
            $this->cat_id=$cat_id;
        }
        
        public function get_cat_id()
        {
            return $this->cat_id;
        }
        
        public function set_cat_name($cat_name)
        {
            $this->cat_name = $cat_name;
        }
        
        public function get_cat_name()
        {
            return $this->cat_name;
        }
        
        public function set_cat_mota($cat_mota)
        {
            $this->cat_mota = $cat_mota;    
        }
        
        public function get_cat_mota()
        {
            return $this->cat_mota;
        }
        
        public function get_cat()
        {
            $sql = "select * from danhmucsp where cat_id = '$this->cat_id' or cat_name = '$this->cat_name'";
            $this->query($sql);
            return $this->fetch();
        }
        public function getall_cat()
        {
            $sql = "select * from danhmucsp ORDER BY cat_id ASC";
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
        
        public function check_cat()
        {
            $sql = "select * from danhmucsp where cat_id = '$this->cat_id' ";
            $this->query($sql);
            if($this->num_rows() == 1)
            {
                return 1;
            }else
            {
                return 2;
            }
        }
        public function add_cat()
        {
            $sql = "INSERT INTO `danhmucsp`(`cat_id`, `cat_name`, `cat_mota`) VALUES ('$this->cat_id','$this->cat_name','$this->cat_mota')";
            $this->query($sql);
        }
        
        public function update_cat($id)
        {
            $sql ="UPDATE danhmucsp SET `cat_id`='$this->cat_id',`cat_name`='$this->cat_name',`cat_mota`='$this->cat_mota' WHERE cat_id ='$id'";
            $this->query($sql); 
        }
        
        public function Delete_cat()
        {
            $sql ="DELETE FROM danhmucsp WHERE danhmucsp.cat_id = '$this->cat_id'";
            $this->query($sql);
        }
        
    }
?>