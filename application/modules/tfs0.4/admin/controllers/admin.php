<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		modules::run('account/_needlogin', TRUE, '1');
		//$this->load->model('privateskeys');
	}

	public function Index()
	{
		// imprimindo mensagem
		if ($this->session->flashdata('displayMessageAdmin')) 
		{
			if (is_array($this->session->flashdata('displayMessageAdmin'))) 
			{
				$this->error->displayError($this->session->flashdata('displayMessageAdmin'));
			}
			else
			{
				$this->error->displayError(array('body' => $this->session->flashdata('displayMessageAdmin'), 'template' => 'error_admin'));
			}
			
		}
		$this->load->view('index');
	}

	public function system()
	{
		$grupos = new user_grupos();
		if(!$this->uri->segment(4))
		{
			$function = '/index';
		}
		else
		{
			$function = '/'.$function = $this->uri->segment(4);
		}

		if ($this->uri->segment(3) and $function) 
		{			
			if($grupos->getAcess($this->uri->segment(3).$function))
			{
			
				if (modules::checkRun('admin/system_'.$this->uri->segment(3).$function)) 
				{
					echo modules::run('admin/system_'.$this->uri->segment(3).$function);
				}
				else
				{
					if($this->load->Check_View('admin/'.$this->uri->segment(3)))
					{
						$this->load->view('admin/'.$this->uri->segment(3));
					}
					else
					{
						$this->error->displayError(array('body' => 'Sistema inválido admin/system_'.$this->uri->segment(3).$function.'', 'template' => 'error_admin'));
					}
				}
			}
			else
			{
				$this->session->set_flashdata('displayMessageAdmin', 'Você não tem permissões suficiente para acessar o sistema '.$this->uri->segment(3).$function);
				redirect('admin');
			}
		}
		else
		{
			redirect('admin/index');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */