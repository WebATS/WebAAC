<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class breadcrumb extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function widget()
	{
		$this->load->view('widgets/breadcrumb');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */