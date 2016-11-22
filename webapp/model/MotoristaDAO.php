<?php
 require_once '../../configs/autoloading.php';

 class MotoristaDAO{
     
    private $conn, $nome, $email, $sexo, $telefone, $endereco, $cidade, $bairro, $estado,
            $cep, $nascimento, $imagem, $latitude, $longitude, $cpf, $login, $senha, $idVeiculo;
    
    public function __construct($conn, $nome, $email, $sexo, $telefone, $endereco, $cidade,
                                $bairro, $estado,$cep, $nascimento, $imagem, $latitude, $longitude, 
                                $cpf, $login, $senha, $idVeiculo){
                                    
        $this->conn = DataBase::getConn();
        $this->nome = $nome;
    }  
    
 }
 
new MotoristaDAO();

?>