<?php
    class img extends Database
    {
        private $sp_id;
        private $url;
        
        public function set_sp_id($sp_id)
        {
            $this->sp_id=$sp_id;
        }
        public function get_sp_id()
        {
            return $this->sp_id;
        }
        
        public function set_url($url)
        {
            $this->url=$url;
        }
        public function get_url()
        {
            return $this->url;
        }
        
        public function add_img()
        {
            $sql = "INSERT INTO `image` (`img_id`, `sp_id`, `url`) VALUES (NULL, '$this->sp_id', '$this->url');";
            
            $this->query($sql);
        }
        
        public function delete_img()
        {
            $sql="DELETE FROM `image` WHERE `sp_id` = $this->sp_id";
            $this->query($sql);
        }
        
        public function update_img($i)
        {
            $sql ="UPDATE `image` SET `url`='$this->url' WHERE sp_id = $i";
            $this->query($sql);
        }
    }
?>