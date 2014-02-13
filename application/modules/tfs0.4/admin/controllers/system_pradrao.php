<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class system_privatekeys extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->account = modules::run('account/_needlogin', TRUE, '1');
		$this->load->helper('date');
	}

	

	public function index()
	{
		$this->load->view('system_privateskeys', $data);
	}
}