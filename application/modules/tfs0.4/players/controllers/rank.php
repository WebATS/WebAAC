<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Rank extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->config('rank');
		$this->configs_rank = config_item('rank');
		$this->players = $this->load->model('account/player_model');
		$this->load->helper(array('url', 'date', 'html'));
		$this->load->library('multworlds');
	}
	
	public function players_rank2()
	{
		$data['multworlds'] = $this->multworlds;
		$this->players->where('world_id', $this->multworlds->setDefatulWorld());
		
		if($this->input->post('vocation') or $this->session->userdata('filter_rank_vocations'))
		{
			if($this->input->post('vocation'))
			{
				$this->session->set_userdata('filter_rank_vocations', $this->input->post('vocation'));
				$filtros = $this->session->userdata('filter_rank_vocations');
			}
			else
			{
				$filtros = $this->session->userdata('filter_rank_vocations');
			}

			$vocations_names = config_item('vocations_names');
			$i = 0;
			foreach ($filtros as $key => $value) 
			{
				if(isset($vocations_names[$this->multworlds->setDefatulWorld()][$value]))
				{

					if ($i == 0) 
					{
						$this->players->where('vocation', $value);
					}
					else
					{
						$this->players->or_where('vocation', $value);
						foreach ($this->configs_rank['ocultgrup'] as $key) 
						{
							$this->players->where('group_id !=', $key);
						}
					}
				}
				$i++;
			}
		}
		else
		{
			foreach ($this->configs_rank['ocultgrup'] as $key) 
			{
				$this->players->where('group_id !=', $key);
			}
		}
		$page = $this->uri->segment('3');
		$data['skill_rank'] = FALSE;
		if (is_string($this->input->post('skill'))) 
		{
			if (array_key_exists('players', $this->configs_rank['type'][$this->multworlds->setDefatulWorld()])) 
			{
				if(isset($this->configs_rank['type'][$this->multworlds->setDefatulWorld()]['players'][$this->input->post('skill')]['order_by']))
				{
					$this->players->order_by($this->input->post('skill'), $this->configs_rank['type'][$this->multworlds->setDefatulWorld()]['players'][$this->input->post('skill')]['order_by']);
				}			
			}
			$data['skill_rank'] = TRUE;
		}
		
		if(!$data['skill_rank'])
		{
			$this->players->order_by('level', 'DESC');
		}
		

		$data['list'] = $this->players->get_paged($page, $this->configs_rank['list_n']);	
		$data['config'] = $this->configs_rank;
		//$this->players->check_last_query();
		$this->load->view('players_rank', $data);
	}	

	public function players_rank()
	{
		$array = array();
		$page = $this->uri->segment('3');
		$vocations_names = config_item('vocations_names');

		if($this->session->userdata('filter_rank_vocations'))
		{
			foreach ($this->session->userdata('filter_rank_vocations') as $key => $value) 
			{
				if(!array_key_exists($key, $vocations_names[$this->multworlds->setDefatulWorld()]) or in_array($key, $this->configs_rank['ocultvoc']))
				{
					$this->session->set_userdata('filter_rank_vocations', $vocations_names[$this->multworlds->setDefatulWorld()]);
				}
			}
		}
		else
		{
			$this->session->set_userdata('filter_rank_vocations', $vocations_names[$this->multworlds->setDefatulWorld()]);
		}
		


		if($this->input->post('vocation'))
		{				
			foreach ($this->input->post('vocation') as $key) 
			{
				if(array_key_exists($key, $vocations_names[$this->multworlds->setDefatulWorld()]) and !in_array($key, $this->configs_rank['ocultvoc']))
				{
					$array[$key] = null;
				}				
			}

			if(count($array))
			{
				$this->session->set_userdata('filter_rank_vocations', $array);
			}
		}
			

		$filtros = $this->session->userdata('filter_rank_vocations');
		
		$player_skills = (new Skill)->include_related('player', array('name', 'level', 'experience', 'maglevel', 'vocation', 'online', 'world_id'))
		->where_not_in('group_id', $this->configs_rank['ocultgrup'])
		->where('world_id', $this->multworlds->setDefatulWorld())
		->where_in('vocation', array_keys($filtros));
		$player_skills->where('skillid', 4);
		$player_skills->order_by('level', 'DESC');
		$player_skills->get_paged($page, '20');
		//$player_skills->check_last_query();

		$data['all_players'] = $player_skills;
		$this->load->view('players_rank', $data);

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */