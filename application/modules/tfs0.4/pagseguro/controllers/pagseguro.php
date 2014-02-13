<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pagseguro extends MX_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->pagsegurotransacoes = new pagsegurotransacoes();
		$this->PagSeguroNpi = $this->load->library('PagSeguroNpi'); //Carrega a library
		
	}


	public function retorno_pagseguro()
	{
 
		if (count($_POST) > 0) {
			$result = $this->PagSeguroNpi->notificationPost();
			$transacaoID = isset($_POST['TransacaoID']) ? $_POST['TransacaoID'] : '';
			if ($result == "VERIFICADO") 
			{

				if(!count($this->pagsegurotransacoes->where('TransacaoID', $transacaoID)->get()->all))
				{
					$source = array('.', ',');
					$replace = array('', '.');
					$pagamento['TransacaoID'] = $_POST['TransacaoID'];
					$pagamento['VendedorEmail'] = $_POST['VendedorEmail'];
					$pagamento['Referencia'] = $_POST['Referencia'];
					$pagamento['TipoPagamento'] = $_POST['TipoPagamento'];
					$pagamento['StatusTransacao'] = $_POST['StatusTransacao'];
					$pagamento['ProdQuantidade'] = $_POST['ProdQuantidade_1'];
					$pagamento['ProdValor'] = $_POST['ProdValor_1'];
					$pagamento['CliNome'] = $_POST['CliNome'];
					$pagamento['CliEmail'] = $_POST['CliEmail'];
					$pagamento['CliEndereco'] = $_POST['CliEndereco'];
					$pagamento['CliNumero'] = $_POST['CliNumero'];
					$pagamento['CliComplemento'] = $_POST['CliComplemento'];
					$pagamento['CliBairro'] = $_POST['CliBairro'];
					$pagamento['CliCidade'] = $_POST['CliCidade'];
					$pagamento['CliEstado'] = $_POST['CliEstado'];
					$pagamento['CliCEP'] = $_POST['CliCEP'];
					$pagamento['CliTelefone'] = $_POST['CliTelefone'];

					//$pagamento['Anotacao'] = $_POST['Anotacao'];
					$pagamento['DataTransacao'] = $_POST['DataTransacao'];
					$this->pagsegurotransacoes->GravarRetorno($pagamento);
					
				}


				if($_POST['StatusTransacao'] == 'Devolvido') 
				{
					$array['status'] = 'Dinheiro Devolvido';
					$array['StatusTransacao'] = $_POST['StatusTransacao'];

					$this->pagsegurotransacoes->atualizaRetorno($array, $transacaoID);

					//mysql_query("UPDATE `pagsegurotransacoes` SET status = 'Dinheiro Devolvido' WHERE `TransacaoID` = '$transacaoID'");
				}
				elseif($_POST['StatusTransacao'] == 'Aprovado') 
				{						
					if($_POST['ProdValor_1'] == '1,00')
					{
							$acc_id = $_POST['Referencia'];
							$quantidade = $_POST['ProdQuantidade_1'];
							$valor_produto = $_POST['ProdValor_1'];
							$account = $this->load->model('account/account_model');

							$account->where('name', $acc_id)->get();
							if($_POST['ProdQuantidade_1'] >= '100')
							{
								$quantidade = $quantidade + 15;
							}
							elseif($_POST['ProdQuantidade_1'] >= '50')
							{
								$quantidade = $quantidade + 5;
							}
							$coins = $account->coins + $quantidade;
							$account->coins = $coins;
							$result = $this->pagsegurotransacoes->where('TransacaoID', $transacaoID)->where('status', 'Créditos Adicionados')->where('Referencia', $_POST['Referencia'])->get();
							if(!$result->TransacaoID)
							$account->save();

							$array['status'] = 'Créditos Adicionados';
							$array['StatusTransacao'] = $_POST['StatusTransacao'];
							$this->pagsegurotransacoes->atualizaRetorno($array, $transacaoID);
					}				
				}
				elseif($_POST['StatusTransacao'] == 'Aguardando Pagto') 
				{
					$array['status'] = 'Aguardando Pagamento';
					$array['StatusTransacao'] = $_POST['StatusTransacao'];
					$this->pagsegurotransacoes->atualizaRetorno($array, $transacaoID);
				}
				elseif($_POST['StatusTransacao'] == 'Em Analise') 
				{
					$array['status'] = 'Pagamento aprovado, em análise pelo PagSeguro';
					$array['StatusTransacao'] = $_POST['StatusTransacao'];
					$this->pagsegurotransacoes->atualizaRetorno($array, $transacaoID);
				}
				elseif($_POST['StatusTransacao'] == 'Cancelado') 
				{
					$array['status'] = 'Pagamento cancelado pelo PagSeguro';
					$array['StatusTransacao'] = $_POST['StatusTransacao'];
					$this->pagsegurotransacoes->atualizaRetorno($array, $transacaoID);
				}
			
			} 
			else if ($result == "FALSO") 
			{
				//O post não foi validado pelo PagSeguro.
			} 
			else 
			{
				//Erro na integração com o PagSeguro.
			}
			
		}
		else 
		{
			$data['transacao'] = FALSE;

			if($get = $this->input->get('id'))
			{
				$get = str_replace("-", "", $get);
				$retorno = $this->pagsegurotransacoes->where('TransacaoID', $get)->get();				

				if ($retorno->id) 
				{
					$data['transacao'] = $retorno;
				}
			}
			
			$this->load->view('confirm', $data);
		}
	}

}

/* End of file newsticker.php */
/* Location: ./application/modules/news/controllers/newsticker.php */

?>