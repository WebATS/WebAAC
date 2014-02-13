<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class multworld extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('multworlds');
	}
	
	public function form()
	{
		$data['multworlds'] = $this->multworlds;
		$this->load->view('form_mult_world', $data);
	}	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */