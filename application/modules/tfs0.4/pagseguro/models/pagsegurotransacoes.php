<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pagsegurotransacoes extends DataMapper {
	var $table = "pagsegurotransacoes";

    function __construct()
  	{
		  parent::__construct();
   	}

   	public function GravarRetorno($array)
   	{
   		$this->TransacaoID = $array['TransacaoID'];
         $this->VendedorEmail = $array['VendedorEmail'];
   		$this->Referencia = $array['Referencia'];
   		$this->TipoPagamento = $array['TipoPagamento'];
   		$this->StatusTransacao = $array['StatusTransacao'];
         $this->ProdQuantidade = $array['ProdQuantidade'];
         $this->CliNome = $array['CliNome'];
         $this->CliEmail = $array['CliEmail'];
         $this->CliEndereco = $array['CliEndereco'];
         $this->CliNumero = $array['CliNumero'];
         $this->CliComplemento = $array['CliComplemento'];
         $this->CliBairro = $array['CliBairro'];
         $this->CliCidade = $array['CliCidade'];
         $this->CliEstado = $array['CliEstado'];
         $this->CliCEP = $array['CliCEP'];
   		//$this->Anotacao = $array['Anotacao'];
   		$this->Data = $array['DataTransacao'];
   		$this->ProdValor = $array['ProdValor'];
   		$this->save();
   	}

      public function atualizaRetorno($values, $where)
      {
         $this->where('TransacaoID', $where)->get();

         foreach ($values as $key => $value) 
         {
           $this->$key = $value;
         }
         
         $this->save();
      }
   	
 }

/* End of file player_model.php */
/* Location: ./application/modules/8.50/account/models/accounts.php */

?>