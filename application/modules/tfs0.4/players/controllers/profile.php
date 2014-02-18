<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->players = $this->load->model('account/player_model');
		$this->account = modules::run('account/_needlogin', FALSE);
		$this->cache = new cache_model();
		$this->load->helper(array('url', 'date', 'html', 'download'));
		$this->load->library('multworlds');
	}	

	public function profile()
	{
		$data['multworlds'] = $this->multworlds;
		$data['profile'] = 0;
		$data['valid'] = 0;
		$data['datestring'] = "%d/%m/%Y - %h:%i %a";
		$this->db->select('name');
		$this->db->order_by('level', 'DESC');
		$query = $this->db->get('players');
		$data['list_all_players'] = $query->result();
		if ($this->input->get('clean') == 'list_visited') 
		{
			if($this->account)
			{
				$this->db->where('value1', $this->account->id)
				->where('value2', 'lasts_profile_visit')
				->delete('web_ats_configs_cache');
				redirect('players/search');
			}
		}
		if ($this->input->post('playerName') or $this->uri->segment('3')) 
		{
			if($this->input->post('playerName'))
			{
			 $playerName = ucfirst($this->input->post('playerName'));
			}
			elseif ($this->uri->segment('3'))
			{
				$playerName = ucfirst($this->uri->segment('3'));
				$playerName = str_replace('+', ' ', $playerName);
			}

			$this->players->where('name', $playerName);
			$result = $this->players->get();
			if ($this->players->name) 
			{

				if($this->account)
				{
					$this->cache->where('value1', $this->account->id);
					$this->cache->where('value2', 'lasts_profile_visit');
					$result_profiles = $this->cache->get();
					if ($result_profiles->value1) 
					{
						if($array = json_decode($result_profiles->value3))
						{
						 	if(!in_array($playerName, $array))
						 	{
						 		$array[] = $playerName;
						 		$this->cache->where('value1', $this->account->id)
							 		->where('value2', 'lasts_profile_visit')
							 		->update('value3', json_encode($array));
						 	}
						}
					}
					else
					{
						$result_profiles->value1 = $this->account->id;
						$result_profiles->value2 = 'lasts_profile_visit';
						$result_profiles->value3 = json_encode(array($playerName));
						$result_profiles->save();
					}
				}
						$data['profile'] = $result;
			}
			else
			{
				$data['profile'] = FALSE;
			}
		}
		$data['list_profiles_visited'] = FALSE;
		if($this->account)
		{
			$this->cache->where('value1', $this->account->id);
			$this->cache->where('value2', 'lasts_profile_visit');
			$result_profiles = $this->cache->get();
			if ($result_profiles->value3) 
			{
				$array = json_decode($result_profiles->value3);
				$data['list_profiles_visited'] = FALSE;
				if( is_array( $array ) )
				{
					krsort($array);
					$data['list_profiles_visited'] = $array;
				}
				
				
			}
		}
		
		$this->load->view('player_profile', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */