<?php

require_once 'configs/autoloading.php';

class MotoristaDAO{

    private $conn, $nome, $email, $sexo, $telefone, $endereco, $cidade, $bairro, $estado,
            $cep, $nascimento, $imagem, $latitude, $longitude, $cpf, $login, $senha, $idVeiculo;

    public function __construct($nome, $email, $sexo, $telefone, $endereco, $cidade,
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

    public function cadastrar(){

      if(!$this->existente($this->login)){
        $stmtL = $this->conn->prepare("INSERT INTO tb_login (ds_celular, ds_senha, cd_token) VALUES (?,?,?)")
                                      or die("2".$conn->error);
        $mempty = null;                 
        $stmtL->bind_param("sss", $this->login, $this->senha, $mempty) or die("3".$stmtL->error);
        $stmtL->execute() or die($stmtL->error);
        $idL   = $stmtL->insert_id;
        
        $query  =  "INSERT INTO tb_motorista (nm_motorista, ds_email, ds_sexo, ds_telefone, 
                    nm_endereco, nm_cidade, nm_bairro, sg_uf, ds_cep, dt_nascimento, ds_imagem,
                    vl_latitude, vl_longitude, cd_cpf, cd_login, cd_veiculo) 
                    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      
        $stmt  = $this->conn->prepare($query) or die("ERRO1 ".$conn->error);
        $stmt->bind_param("ssssssssssssssii", $this->nome,  $this->email,  $this->sexo,
                                            $this->telefone, $this->endereco, $this->cidade,
                                            $this->bairro, $this->estado, $this->cep,
                                            $this->nascimento, $this->imagem, $this->latitude,
                                            $this->longitude, $this->cpf, $idL, 
                                            $this->idVeiculo) or die("ERRO2 ".$stmt->error);
                                            
        $stmt->execute() or die($stmt->error);
        $this->vincularVeiculo($this->idVeiculo);
        $stmtL->close();
        $stmt->close();
        
        echo json_encode(["ok" => true, "resp" => "Motorista " . $this->nome . " cadastrado com sucesso" ]);
        
      }else{ 
        echo json_encode(["ok" => false, "resp" => "Motorista já cadastrado!"]);
      }
    }
    public function checarStatus(){}
    
    private function vincularVeiculo($idv){
        $st = $this->conn->prepare("UPDATE tb_veiculo SET ic_ocupado = TRUE WHERE cd_veiculo= ?") or die("10".$conn->error);
        $st->bind_param("i", $idv) or die("10".$st->error);
        $st->execute() or die("10".$st->error);
        $st->close();
    }
    private function existente($l){
      $consta = $this->conn->prepare("SELECT cd_login FROM tb_login WHERE ds_celular LIKE ?") or die($conn->error);
      $consta->bind_param("s", $l) or die($consta->error);
      $consta->execute() or die($consta->error);
      $consta->store_result();
      $linhas = $consta->num_rows;
      $consta->close();
      return $linhas > 0 ?  true : false;
    }
    
}

?>