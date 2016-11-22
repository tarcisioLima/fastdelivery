<?php
 require_once '../../configs/autoloading.php';

 class MotoristaDAO{
     
    private $conn, $nome, $email, $sexo, $telefone, $endereco, $cidade, $bairro, $estado,
            $cep, $nascimento, $imagem, $latitude, $longitude, $cpf, $login, $senha, $idVeiculo;
    
    public function __construct($conn, $nome, $email, $sexo, $telefone, $endereco, $cidade,
                                $bairro, $estado,$cep, $nascimento, $imagem, $latitude, $longitude, 
                                $cpf, $login, $senha, $idVeiculo){
                                    
        $this->conn       = DataBase::getConn();
        $this->nome       = $nome;
        $this->email      = $email;
        $this->sexo       = $sexo;
        $this->telefone   = $telefone;
        $this->endereco   = $endereco;
        $this->cidade     = $cidade;
        $this->bairro     = $bairro;
        $this->estado     = $estado;
        $this->cep        = $cep;
        $this->nascimento = $nascimento;
        $this->imagem     = null;
        $this->latitude   = null;
        $this->longitude  = null;
        $this->cpf        = $cpf;
        $this->login      = $login;
        $this->senha      = $senha;
        $this->idVeiculo  = $idVeiculo;
    }
    
    
    
 }
 
new MotoristaDAO();

?>