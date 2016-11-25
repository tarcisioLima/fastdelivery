<?php
include('../database/conexaoSGBD.php');

class Pedido extends DAO{
    // AIzaSyD1IUo6qHNPlgL6z-WCb1egrJGsztm8Z0w
    public function __construct(){parent::__construct();}
    
    public function buscar($obj,$id){
        
    }
    
    private function distancia($p1LA,$p1LO,$p2LA,$p2LO){
        $r = 6371.0;
        $p1LA = $p1LA * pi() / 180.0;
        $p1LO = $p1LO * pi() / 180.0;
        $p2LA = $p2LA * pi() / 180.0;
        $p2LO = $p2LO * pi() / 180.0;
        $dLat = $p2LA + ($p1LA * -1);
        $dLong = $p2LO + ($p1LO * -1);
        $a = sin($dLat / 2) * sin($dLat / 2) + cos($p1LA) * cos($p2LA) * sin($dLong / 2) * sin($dLong / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 + ($a*-1)));
        return $r * $c * 1000; 
    }
    
    private function
    
	$nome = $_POST('nome');
	$telefone = $_POST('telefone');
	$enderecoRetirada = $_POST('endereco_retirada');
	$enderecoEntrega = $_POST('endereco_entrega');
	$latitude = -24.5505199;
	$longitude = -42.6333094;
	$login = '13991538252';	
	//$login = $_POST('login');
	include 'calcula.php';
		$retorno = calculaProximo($latitude, $longitude, $login);
		$resposta = explode(';',$retorno);
		$motorista = $resposta[0];
		$tempo = $reposta[1];

		$q = mysql_query("select cd_cliente from tb_cliente inner join tb_login
  on tb_cliente.cd_login = tb_login.cd_login
    where ds_login like '1334644035'");
		while($prks = mysql_fetch_array($q)){
			$qt = $prks[0];
		}
		$update = ("update tb_servico as s inner join tb_prestador_servico as ps on s.cd_prestador_servico = ps.cd_prestador_servico
inner join tb_login as l on ps.cd_login = l.cd_login set cd_cliente = '$qt', ds_servico = 'Gabriel;1334644035;Rua
alves do bugre 579, São vicente, São paulo;Rua carijos 1088, são vicente, são paulo',
ds_tempo_estimado = '$tempo' where ds_login like '$motorista'");
?>



<?php
	include('../database/conexaoSGBD.php');
?>
<?php
	include 'getDistancia.php';
	function calculaProximo($lati,$long)
	{
		$motoperto = "";
		$motodis = 989898912213;
		$pk = mysql_query('select cd_prestador_servico,ds_latitude,ds_longitude from tb_localizacao where ic_disponivel = true');
		while($prk = mysql_fetch_array($pk)){
			$chave = $prk[0];
		}		
		$q = mysql_query('select count(cd_prestador_servico) from tb_localizacao where ic_disponivel = true');
		$qt = (int)mysql_fetch_array($q);
		$m = 0;
		$x = 0;
		while ($selectMoto = mysql_fetch_array($pk))
		{
			$codigomotoboy[$m] = $selectMoto['cd_prestador_servico'];
			$dslat[$m] = $selectMoto['ds_latitude'];
			$dslong[$m]=$selectMoto['ds_longitude'];
			$m++;
		}
		for($x = 0;$x < $qt ;$x++)
		{
			if(getDistancia($lati,$long,$dslat[$x],$dslong[$x]) < $motodis)
			{
				$motoperto  = $codigomotoboy[$x];
				$motodis = getDistancia($lati,$long,$dslat[$x],$dslong[$x]);
			}
		}
		return $motoperto;
	}
	function mostraDistanciaProximo($lati,$long){
		$motoperto = "";
		$motodis = 989898912213;
		$pk = mysql_query('select cd_prestador_servico,ds_latitude,ds_longitude from tb_localizacao where ic_disponivel = true');
		$q = mysql_query('select count(cd_prestador_servico) from tb_localizacao where ic_disponivel = true');
		$qt = (int)mysql_fetch_array($q);
		$m = 0;
		$x = 0;
		while ($selectMoto = mysql_fetch_array($pk))
		{
			$codigomotoboy[$m] = $selectMoto['cd_prestador_servico'];
			$dslat[$m] = $selectMoto['ds_latitude'];
			$dslong[$m]=$selectMoto['ds_longitude'];
			$m++;
		}
		for($x = 0;$x < $qt ;$x++)
		{
			if(getDistancia($lati,$long,$dslat[$x],$dslong[$x]) < $motodis)
			{
				$motoperto  = $codigomotoboy[$x];
				$motodis = getDistancia($lati,$long,$dslat[$x],$dslong[$x]);
			}
		}
		return $motodis;
	}
	function calculaTempo($dist){
	$tempo = ($dist/50)*60;
	return round($tempo);
	}
?>

<?php
include 'getDistancia.php';	
 function calculaTempo($distancia,$velocidade){
	$tempo = $motodis/60;
	return $tempo;
}
}
?>