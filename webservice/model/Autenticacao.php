 <?php

class Autenticacao extends DAO{
    private $username, $password, $token;
    define ('alg'    , 'HS256');
    define ('typ'   , 'JWT');
    define ('iss' , 'fastdelivery-gmoraiz.c9users.io');
    define ('key'    , 'trabalhodephp');
    
    public static function token($username, $password){
        $this->username = $username;
        $this->password = $password;
        $this->gerarToken();
        return $this->token;
    }
    
    private function gerarToken(){ 
        $header  = ['typ' => $this->typ, 'alg' => $this->alg];
        $payload = ['iss' => $this->iss, 'username' => $this->username, 'password' => $this->password];
        $header  = json_encode($header);
        $header  = base64_encode($header);
        $payload = json_encode($payload);
        $payload = base64_encode($payload);
        $signature = hash_hmac('sha256', "$header.$payload",$this->key, true);
        $signature = base64_encode($signature);
        $this->token = "$header.$payload.$signature";
    }
    
    public static function verificarAcesso($token,$user){
        $stmt = $this->conn->prepare("SELECT u.cd_".$user." FROM tb_".$user." AS u INNER JOIN tb_login AS l ON u.cd_login
                                      = l.cd_login WHERE L.cd_token LIKE ?") or die($this->res400(1, "Erro interno"));
        $stmt->bind_param("s",$token) or die($this->res400(2, "Erro interno"));
        $stmt->execute() or die($this->res400(3, "Erro interno"));
        if ($stmt->affected_rows == 1){
            $stmt->bind_result($id);
            $this->id = $id;
            return true;
        } else {
            return false;
        }
    }
}

 ?>