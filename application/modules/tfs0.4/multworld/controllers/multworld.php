<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class multworld extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('multworlds');
	}
	
	public function form()
	{
		/**
		 * Mostrando formulário apenas quando tiver mais de um mundo ativado.
		 */
		
		if( count( $this->multworlds->worlds )  >= 2 )
		{
			$data['multworlds'] = $this->multworlds;
			$this->load->view('form_mult_world', $data);
		}
	}	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */