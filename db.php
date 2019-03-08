<?php
    class db{
        private $db_host = "localhost";
        private $db_user = "root";
        private $db_passwd = "password";
        private $database = "questions";
        
        public function conect_mysql(){
           $con= mysqli_connect(this->db_host,this->db_user,this->db_passwd,this->database);
            mysqli_set_charset($con,'utf-8');
            if(mysql_connect_errno()){
                echo "Problema com conexão".mysqli_connect_erro();
            }
            return $con; 
        }
    }
?>