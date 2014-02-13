<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class web_ats_shop_cupons extends DataMapper {
	var $table = "web_ats_shop_cupons";

   function __construct()
	{
	  parent::__construct();
     $this->load->helper('array');
     $this->session = $this->load->library('session');
	}

   	public function checkValidCupom($cupom, $produto)
   	{
   		$cupom = $this
   		->where('cupom_key', $cupom)
   		->where('time_expire >=', time())
   		->where('time_used', FALSE)
   		->where('ativado !=', '0')
   		->get(1);

   		if(!count($cupom->all))
   			return FALSE;

		if($cupom->required_acc)
			$cupom->required_acc = unserialize($cupom->required_acc);

		if($cupom->acc_used)
			$cupom->acc_used = unserialize($cupom->acc_used);

		if($cupom->required_produtos)
			$cupom->required_produtos = unserialize($cupom->required_produtos);


   		if($cupom->required_acc and !in_array(modules::run('account/_needlogin')->name, $cupom->required_acc))
   			return FALSE;

   		if($cupom->acc_used and in_array(modules::run('account/_needlogin')->name, $cupom->acc_used))
   			return FALSE;


   		if($cupom->required_produtos and !in_array($produto, $cupom->required_produtos))
   			return FALSE;	

         return $cupom->desconto;
   	}

      public function checkCupomAtived($produto)
      {
         if(is_array($this->session->userdata('cupons')))
         {
            if(array_key_exists($produto, $this->session->userdata('cupons')))
            {
               $array = element($produto, $this->session->userdata('cupons'));
               if($this->checkValidCupom($array['cupom'], $produto))
               {
                  return $array;
               }

               $this->session->unset_userdata('cupons');
               return FALSE;
            }
         }
      }
   	
 }

/* End of file player_model.php */
/* Location: ./application/modules/8.50/account/models/accounts.php */

?>