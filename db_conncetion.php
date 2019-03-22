<?php
<<<<<<< HEAD:db_conncetion.php
    class db{
        private $db_host = "localhost";
        private $db_user = "root";
        private $db_passwd = "";
        private $database = "questions";
        
        public function conect_mysql(){
           $con= mysqli_connect($this->db_host,$this->db_user,$this->db_passwd,$this->database);
            mysqli_set_charset($con,'utf-8');
            if(mysqli_connect_errno()){
                echo "Problema com conexão".mysqli_connect_erro();
            }else{
                echo "Pra ter certeza que deu certo";                
            }
            return $con; 
=======
class db
{
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_passwd = "password";
    private $database = "questions";

    public function conect_mysql()
    {
        $con = mysqli_connect($this->db_host, $this->db_user, $this->db_passwd, $this->database);
        mysqli_set_charset($con, 'utf-8');
        if (mysqli_connect_errno()) {
            echo "Problema com conexão" . mysqli_connect_erro();
        } else {
            echo "Pra ter certeza que deu certo";
>>>>>>> a4fb1992de93522f6eecd832e2bd2c1172e26211:db.php
        }
        return $con;
    }
}
 