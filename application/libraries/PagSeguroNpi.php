<?php
 
header('Content-Type: text/html; charset=ISO-8859-1');
 
define('TOKEN', '');
 
class PagSeguroNpi {
 
	private $timeout = 20; // Timeout em segundo
 
	public function notificationPost() 
	{
		$postdata = 'Comando=validar&Token='.TOKEN;
		foreach ($_POST as $key =>$value) {
		$valued = $this->clearStr($value);
		$postdata .= "&$key=$valued";
		}
		return $this->verify($postdata);
	}
 
	private function clearStr($str) 
	{
		if (!get_magic_quotes_gpc()) {
		$str = addslashes($str);
		}
		return $str;
	}
 
	private function verify($data) 
	{
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, "https://pagseguro.uol.com.br/pagseguro-ws/checkout/NPI.jhtml");
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_TIMEOUT, $this->timeout);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		$result = trim(curl_exec($curl));
		curl_close($curl);
		return $result;
	}

	function verificar($valor) 
	{
        $pontos = ',';
        $virgula = '0';
        $result = str_replace($pontos, "", $valor);
        $result2 = str_replace($virgula, "", $result);
        return $result2;
	}

	 
}
 
?>