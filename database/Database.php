<?php
    class Database
    {
        private $Host_name = 'localhost';
        private $Host_user = 'root';
        private $Host_pass = '';
        private $DB_name   = 'farm';
        private $conn = NULL;
        private $result = NULL;
        
        public function __construct(){
        $this->conn = mysql_connect($this->Host_name, $this->Host_user, $this->Host_pass);
		mysql_select_db($this->DB_name);
        mysql_query('SET NAMES "UTF8"');
        }
        
        public function query($sql)
        {
            $this->result = mysql_query($sql);
        }
        
        public function fetch()
        {
            if($this->result)
            {
                $data = mysql_fetch_assoc($this->result);
            }
            else
            {
                $data = 0;
            }
            return $data;
        }
        
        //kiem ra so dong
        public function num_rows()
        {
            if ($this->result)
            {
                $row = mysql_num_rows($this->result);
            }
            else
            {
                return $row = 0;
            }
            return $row;
        }
    }
?>