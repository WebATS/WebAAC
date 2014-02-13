<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Online extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->config('grupos');
		$this->players = $this->load->model('account/player_model');
		$this->load->helper(array('url', 'date', 'html', 'download'));
		$this->load->library('multworlds');
	}
	
	public function list_online()
	{
		$data['multworlds'] = $this->multworlds;
		$data['server_status'] = modules::run('serverStatus/_status');
		$this->players->where('online', TRUE);
		
		$this->players->where('world_id', $this->multworlds->setDefatulWorld());
		
		if($this->input->get('order') == 'name_desc')
		{
			$this->players->order_by('name', 'DESC');
		}
		elseif($this->input->get('order') == 'name_asc')
		{
			$this->players->order_by('name', 'ASC');
		}
		elseif($this->input->get('order') == 'level_desc')
		{
			$this->players->order_by('level', 'DESC');
		}
		elseif($this->input->get('order') == 'level_asc')
		{
			$this->players->order_by('level', 'ASC');
		}
		else
		{
			$this->players->order_by('level', 'DESC');
		}
		$page = $this->uri->segment('3');
		$data['list'] = $this->players->get();
		$this->load->view('players_online', $data);
	}	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */