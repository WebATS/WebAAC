<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Statistic extends MX_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function __getParam($index) 
	{
        $str = '/'.uri_string();
        $str = explode('/', $str);
        if(isset($str[$index]))
        return addslashes($str[$index]);
    }
	
	public function setAnalystic()
	{
		
		$CI =& get_instance();

		$data = array();
		$data['account_id'] = $CI->session->userdata('account_id');

		if($this->__getParam(1) and $this->__getParam(2)){
			$data['section'] = $this->__getParam(1);
			$data['action'] = $this->__getParam(2);
		}else{
			$match = explode('/', $CI->config->item('default_page'));
			$data['section'] = $match[0];
			if(isset($match[1]))
			{
				$data['action'] = $match[1];
			}
			else
			{
				$data['action'] = 'index';
			}
		}
		

		$data['when'] = time();
		
		//NOTA: Verificar se é possível invasão através do HTTP_REFERER
		
		$data['ant_uri'] = $CI->input->server('HTTP_REFERER', TRUE);
		$data['uri'] = uri_string();

		self::checkLinkRef();


		// And write it to the database
		$CI->db->insert('statistics', $data);
		
	}

	public function checkLinkRef()
	{
		if ($this->input->get('ref')) 
		{
			$account = $this->load->model('account/account_model');
			$account->where('id', $this->input->get('ref'));
			//$account->where('recoverkey !=', FALSE);
			$account->where('ativado', TRUE)->get();

			if(count($account->all))
			{
				$this->session->set_userdata('link_ref', $this->input->get('ref'));	
				redirect('account/create');			
			}
		}
		
	}
}

/* End of file statistic.php */
/* Location: ./modules/statistic/controllers/statistic.php */