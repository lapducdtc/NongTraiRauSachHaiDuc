<?php
    class user extends Database
    {
        private $user_name;
        private $password;
        private $phone;
        private $fullname;
        private $address;
        private $email;
        private $sex;
        private $age;
        private $level;
        
        public function set_user_name($user_name)
        {
            $this ->user_name =$user_name;
        }
        public function get_user_name()
        {
            return $this->user_name;
        }
        
        public function set_password($password)
        {
            $this ->password = base64_encode($password);
        }
        public function get_password()
        {
            return base64_decode($this->password);
        }
        
        public function set_phone($phone)
        {
            $this ->phone =$phone;
        }
        public function get_phone()
        {
            return $this->phone;
        }
        
        
        public function set_fullname($fullname)
        {
            $this ->fullname =$fullname;
        }
        public function get_fullname()
        {
            return $this->fullname;
        }
        
        public function set_address($address)
        {
            $this ->address =$address;
        }
        public function get_address()
        {
            return $this->address;
        }
        
        public function set_email($email)
        {
            $this ->email =$email;
        }
        public function get_email()
        {
            return $this->email;
        }
        
        public function set_age($age)
        {
            $this ->age =$age;
        }
        public function get_age()
        {
            return $this->age;
        }
        
        public function set_level($level)
        {
            $this ->level =$level;
        }
        public function get_level()
        {
            return $this->level;
        }
        public function set_sex($sex)
        {
            $this ->sex =$sex;
        }
        public function get_sex()
        {
            return $this->sex;
        }
        
        public function get_userid($id)
        {
            $sql = "select * from user where user_id = '$id'";
            $this->query($sql);
            return $this->fetch();
        }
        
        public function get_userlv($lv)
        {
            $sql = "select * from user where level = $lv";
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
        public function getall_user()
        {
            $sql = "SELECT * FROM `user` ORDER BY `user`.`user_id` ASC";
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
        public function get_user()
        {
            $sql = "select * from user where user_name = '$this->user_name'";
            $this->query($sql);
            return $this->fetch();
        }
        
        public function check_uer()
        {
            $sql = "select * from user where user_name = '$this->user_name'and password = '$this->password' ";
            $this->query($sql);
            if($this->num_rows() == 1)
            {
                return 1;
            }else
            {
                return 2;
            }
        }
        
        public function add_user()
        {
            $sql="INSERT INTO `user`(`user_name`, `password`, `phone`, `fullname`, `address`, `email`, `sex`, `age`, `level`) 
            VALUES ('$this->user_name','$this->password','$this->phone','$this->fullname','$this->address','$this->email','$this->sex','$this->age','$this->level')";
            $this->query($sql);
        }
        
        public function update_user($id)
        {
            $sql="UPDATE `user` SET `user_name`='$this->user_name',`password`='$this->password',`phone`='$this->phone',`fullname`='$this->fullname',`address`='$this->address',`email`='$this->email',`sex`='$this->sex',`age`='$this->age',`level`='$this->level' WHERE user_id=$id";
            $this->query($sql);
        }
        
        public function delete_user($id)
        {
            $sql="DELETE FROM `user` WHERE user_id=$id";
            $this->query($sql);
        }
    }
?>