<?php 
    require_once 'configs/autoloading.php';
    
    class LoginDAO{
        private $conn, $login, $senha;
        
        public function __construct($login, $senha){
            $this->conn  = DataBase::getConn();
            $this->login = $login;
            $this->senha = $senha;
        }
        
        public function login(){
            $query = "SELECT cd_adm FROM tb_admin WHERE nm_adm LIKE ? AND nm_senha LIKE ?";
            $stmt = $this->conn->prepare($query) or die ($conn->error);
            $stmt->bind_param("ss", $this->login, $this->senha) or die ($stmt->error);
            $stmt->execute() or die($stmt->error);
            $stmt->store_result();
            $line = $stmt->num_rows;
            $stmt->close();
            return $line > 0 ? true : false;
        }
        
    }

?>