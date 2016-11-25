 <?php

class Autenticacao extends DAO{
    private $username, $token, $alg, $typ, $iss, $key;

    public function __construct($username = ""){
        parent::__construct();
        $this->username = $username;
        $this->alg = 'HS256';
        $this->key = 'trabalhodephp';
        $this->iss = 'fastdelivery-gmoraiz.c9users.io';
        $this->typ = 'JWT';
    }
    
    public function token(){
        $this->gerarToken();
        return $this->token;
    }
    
    private function gerarToken(){ 
        $header  = ['typ' => $this->typ, 'alg' => $this->alg];
        $payload = ['iss' => $this->iss, 'usertel' => $this->username];
        $header  = json_encode($header);
        $header  = base64_encode($header);
        $payload = json_encode($payload);
        $payload = base64_encode($payload);
        $signature = hash_hmac('sha256', "$header.$payload",$this->key, true);
        $signature = base64_encode($signature);
        $this->token = "$header.$payload.$signature";
    }
    
    public function verificarAcesso($token,$user){
        $stmt = $this->conn->prepare("SELECT l.cd_login FROM tb_".$user." AS u INNER JOIN tb_login AS l ON u.cd_login
                                      = l.cd_login WHERE l.cd_token LIKE ?") or die($this->error.$this->res400(1, "Erro interno"));
        $stmt->bind_param("s",$token) or die($this->res400(2, "Erro interno"));
        $stmt->execute() or die($this->res400(3, "Erro interno"));
        $stmt->bind_result($col0);
        if ($stmt->fetch() == 1){
            $id = $col0;
            $stmt->close();
            return $id;
        } else
            return false;
    }
}

 ?>