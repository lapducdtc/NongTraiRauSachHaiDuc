<?php
    class Lienhe extends Database
    {
        private $con_name;
        private $con_email;
        private $con_phone;
        private $con_address;
        private $con_title;
        private $con_content;
        private $con_user;
        private $con_live;
        
        public function set_con_live($con_live)
        {
            $this->con_live=$con_live;
        }
        
        public function get_con_live()
        {
            return $this->con_live;
        }
        public function set_con_user($con_name)
        {
            $this->con_user=$con_name;
        }
        
        public function get_con_user()
        {
            return $this->con_user;
        }
        
        public function set_con_name($con_name)
        {
            $this->con_name=$con_name;
        }
        
        public function get_con_name()
        {
            return $this->con_name;
        }
        
        
        public function set_con_email($con_email)
        {
            $this->con_email=$con_email;
        }
        
        public function get_con_email()
        {
            return $this->con_email;
        }
        
        public function set_con_phone($con_phone)
        {
            $this->con_phone=$con_phone;
        }
        
        public function get_con_phone()
        {
            return $this->con_phone;
        }
        
        public function set_con_address($con_address)
        {
            $this->con_address=$con_address;
        }
        
        public function get_con_address()
        {
            return $this->con_address;
        }
        
        public function set_con_title($con_title)
        {
            $this->con_title=$con_title;
        }
        
        public function get_con_title()
        {
            return $this->con_title;
        }
        
        public function set_con_content($con_content)
        {
            $this->con_content=$con_content;
        }
        
        public function get_con_content()
        {
            return $this->con_content;
        }
        
        public function getall_coutlhe()
        {
            $sql = "select * from lienhe where con_live=0";
            $this->query($sql);
            return $this->num_rows();
        }
        
        public function getuid_coutlhe($id)
        {
            $sql = "select * from lienhe where user_id='$id' and con_live=0";
            $this->query($sql);
            return $this->num_rows();
        }
        
        public function getid_lh($id)
        {
            $sql = "select * from lienhe Where con_id = $id";
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
        public function getall_lh()
        {
            $sql = "select * from lienhe ORDER BY con_date DESC";
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
        public function get_uid($l)
        {
            $sql = "select * from lienhe Where user_id = '$l' ORDER BY con_date DESC";
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
        public function add_lh()
        {
            $sql="INSERT INTO `lienhe`(`con_name`, `con_email`, `con_phone`, `con_content`, `user_id`, `con_title`, `con_address`, `con_live`) 
            VALUES ('$this->con_name','$this->con_email','$this->con_phone','$this->con_content','$this->con_user','$this->con_title','$this->con_address','$this->con_live')";
            
            $this->query($sql);
        }
        
        public function update_con($id)
        {
            $sql ="UPDATE `lienhe` SET `con_live` = '1' WHERE `lienhe`.`con_id` = $id;";
            $this->query($sql);
        }
        
        public function delete_lh($con_id)
        {
            $sql="DELETE FROM `lienhe` WHERE con_id=$con_id";
            $this->query($sql);
        } 
    }
?>