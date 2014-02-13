<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Player extends MX_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'date', 'html'));
		$this->load->config('names_blocked');
		$this->names_blocked = $this->config->item('names_blocked');
		$this->load->config('referral');
		$this->level_to_ativ_referral = $this->config->item('level_to_active_referral');
		$this->ConfigsValue = $this->load->library('ConfigsValue');
		$this->load->library('multworlds');
		$this->player = new player_model();
		$this->account = modules::run('account/_needlogin');
	}

	function _encrypt($string)
	{
	   $result = '';
	   for($i=0; $i<strlen($string); $i++) {
	      $char = substr($string, $i, 1);
	      $keychar = substr($this->session->userdata('session_id'), ($i % strlen($this->session->userdata('session_id')))-1, 1);
	      $char = chr(ord($char)+ord($keychar));
	      $result.=$char;
	   }
	   return base64_encode($result);
	}

	function _decrypt($string)
	{
	   $result = '';
	   $string = base64_decode($string);
	   for($i=0; $i<strlen($string); $i++) {
	      $char = substr($string, $i, 1);
	      $keychar = substr($this->session->userdata('session_id'), ($i % strlen($this->session->userdata('session_id')))-1, 1);
	      $char = chr(ord($char)-ord($keychar));
	      $result.=$char;
	   }
	   return $result;
	}

	public function _list($result=false)
	{
		$data['players'] = FALSE;
		$this->player = new player_model();
		self::edit();

		if ($this->player = $this->player->getlist($this->session->userdata('accountID')))
		{
			foreach ($this->player as $key) 
			{
				if($key->level >= $this->level_to_ativ_referral)
				{
					$u = new accounts_friends();
					$saveAccountRef = $u->activeRef(modules::run('account/_needlogin')->name);
				}
			}
			$data['players'] = $this->player;
		}

		$this->load->view('player_list', $data);
	}

	function _checkDelay() 
	{
		if ($this->session->userdata('time_create_player') > time())  
		{
			return FALSE;
		}

		return TRUE;
	}

	function _checkSex($id) 
	{
		if ($this->multworlds->newCharSex($id)) 
		{
			return TRUE;
		}
		
		$this->form_validation->set_message('_checkSex', 'Sex Inválido!');
		return FALSE;
	}

	function _checkVoc($id) 
	{
		if ($this->multworlds->newCharVocations($id)) 
		{
			return TRUE;
		}

		$this->form_validation->set_message('_checkVoc', 'Vocação desconhecida!');
		return FALSE;
	}

	function _checkWorld($id) 
	{
		if ($this->multworlds->newCharWorld($id)) 
		{
			return TRUE;
		}

		return FALSE;
	}

	
	function _checkCity($id) 
	{
		if ($this->multworlds->newCharTowns($id)) 
		{
			return TRUE;
		}

		$this->form_validation->set_message('_checkCity', 'Cidade desconhecida');
		return FALSE;
	}
	// Function which make the player more real by tatu hunter
	// Eg: elder'Druid = Elder'Druid
	//	   elder'druid = Elder'druid
	//     druid theMaster = Druid themaster
	function _strFirst($name) {
		$name = explode(' ', trim($name));
		for($i=0, $t = sizeof($name); $i<$t; ++$i)
			for($j=0, $l=strlen($name[$i]); $j<$l; ++$j)
				!$j ? 
				($name[$i][$j] = !$i ? ($name[$i][$j] == strtoupper($name[$i][$j]) ? $name[$i][$j] : strtoupper($name[$i][$j])): $name[$i][$j])  : 
				($name[$i][$j] = ($name[$i][$j-1] == '\'' ? $name[$i][$j] : 
				strtolower($name[$i][$j])));
	
		$ret = '';
		foreach($name as $k)
			$ret .= $k . ' ';
	
		return trim($ret);
	}

	public function _check_new_player($name)
	{
		$name = trim($name);

		// Nomes válidos com apenas caracteres aA-zZ- '
		$temp = strspn("$name", "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM '");
		if ($temp != strlen($name))
		{
			$this->form_validation->set_message('_check_new_player', 'Nome só pode conter caracteres aA-zZ');
			return false;
		}

		// Nomes apenas com máximo dois espaços
		// Exemplo:
		// Teste === TRUE
		// Teste Teste === TRUE
		// Teste Teste Teste === FALSE
		$subname = explode(' ', $name);
		if (count($subname) > 2) 
		{
			$this->form_validation->set_message('_check_new_player', 'Nome só pode conter 1 (um) espaço!');
			return FALSE;
		}

		// Nome esta presente na lista de nomes bloquiados?
		foreach ($subname as $namef) 
		{	
			if(is_array($this->names_blocked))
			{
				foreach ($this->names_blocked as $key) 
				{
					if($namef == $key)
					{
						// Nome = ADM
						// @return FALSE
						$this->form_validation->set_message('_check_new_player', 'Nome Inválido!');
						return FALSE;
					}

					// Nome = ADM'S
					// @return FALSE;
					if(strpos($name, $key) === FALSE)
					{
						// true
					}
					else
					{
						$this->form_validation->set_message('_check_new_player', 'Nome Inválido!');
						return FALSE;
					}
				}
			}

		}

		return TRUE;	
	}

	public function create()
	{
		$this->player->getlist($this->session->userdata('accountID'));
		$data['multworlds'] = $this->multworlds;
		$data['world_vocs'] = $this->multworlds->setDefatulWorld();
		if ($this->input->post('submitCreatePlayer')) 
		{
			$this->form_validation->set_message('required', 'Este campo fico em branco!');
			$this->form_validation->set_message('min_length', 'Você informou um dado com poucos caracteres!');
			$this->form_validation->set_message('max_length', 'Você informou um dado com muitos caracteres!');
			$this->form_validation->set_message('alpha', 'Nome inválido!');
			$this->form_validation->set_message('is_unique', 'Já existe player com este nome!');
			$this->form_validation->set_message('alpha_numeric', 'Você informou um dado com caracteres inválidos!');

			if($this->form_validation->run($this, 'Player/Create') == TRUE)
			{
				if ($this->_checkDelay()) 
				{
					$qt = 10;
					if ($this->account->premdays and $this->ConfigsValue->getConfig('playerLimitCreate_premmy', FALSE)) 
					{
						$qt = $this->ConfigsValue->getConfig('playerLimitCreate_premmy', FALSE);
					}
					elseif(!modules::run('account/_needlogin')->premdays and $this->ConfigsValue->getConfig('playerLimitCreate_free', FALSE))
					{
						$qt = $this->ConfigsValue->getConfig('playerLimitCreate_free');
					}

					if (count($this->player->all) <= $qt) 
					{
						$this->newPlayer = new player_model();
						$this->multworlds->newPlayer($this->input->post('playerCity'), $this->input->post('playerVocation'));

						$this->newPlayer->name = ucwords(strtolower($this->input->post('playerName')));
						$this->newPlayer->world_id = $this->multworlds->setDefatulWorld();
						//$this->newPlayer->group_id = '0';
						$this->newPlayer->account_id = $this->account->id;
						$this->newPlayer->level = $this->multworlds->newPlayerValue('level');
						$this->newPlayer->vocation = $this->input->post('playerVocation');
						$this->newPlayer->health = $this->multworlds->newPlayerValue('health');
						$this->newPlayer->healthmax = $this->multworlds->newPlayerValue('health');
						$this->newPlayer->experience = $this->multworlds->newPlayerValue('experience');
						$this->newPlayer->locktype = $this->multworlds->newPlayerValueLockType($this->input->post('playerSex'));
						$this->newPlayer->maglevel = $this->multworlds->newPlayerValue('maglevel');
						$this->newPlayer->mana = $this->multworlds->newPlayerValue('mana');
						$this->newPlayer->manamax = $this->multworlds->newPlayerValue('mana');
						$this->newPlayer->soul = $this->multworlds->newPlayerValue('soul');
						$this->newPlayer->town_id = $this->input->post('playerCity');
						$this->newPlayer->posx = $this->multworlds->newPlayerValue('posx');
						$this->newPlayer->posy = $this->multworlds->newPlayerValue('posy');
						$this->newPlayer->posz = $this->multworlds->newPlayerValue('posz');
						$this->newPlayer->cap = $this->multworlds->newPlayerValue('cap');
						$this->newPlayer->sex = $this->input->post('playerSex');
						//$this->newPlayer->promotion = '0';


						if($this->newPlayer->save())
						{
							$this->session->set_userdata('time_create_player', time()+300);
							//$this->error->displayError('Player Criado!', 'sucess');
							$this->session->set_flashdata('displayMessage', array('body' => 'SUCESS_CREATE_PLAYER', 'type' => 'sucess'));
							redirect('account');
						}
						else
						{
							$this->error->displayError('FATAL_ERROR');
						}
					}
					else
					{
						$this->error->displayError('Só é permitido '.$qt.' players na conta');
					}
				}
				else
				{
					$this->load->helper('date');

					$post_date = $this->session->userdata('time_create_player');
					$now = time();

					$this->error->displayError('Só é possível criar um characater a cada '.timespan($now, $post_date).'');
				}
			}
			
		}

		$this->load->view('player_create', $data);
	}


	public function edit()
	{
		$this->player_update = new player_model();

		if ($this->input->post('submitEditPlayer')) 
		{
			$this->form_validation->set_message('max_length', $this->lang->line('PLAYER_EDIT_COMENTS_MAX_LENGTH', array($this->ConfigsValue->getConfig('limitCaractersPlayerComment'))));
			if($this->form_validation->run($this, 'Player/Edit'))
			{
				$this->player_update
				->where('id', $this->_decrypt($this->input->post('private_id', TRUE)))
				->where('account_id', $this->account->id)
				->get();
				$this->player_update->comment = htmlentities($this->input->post('player-comment', TRUE));
				if($this->player_update->save())
				{
					$this->error->displayError('COMMENT_SAVED', 'sucess');
				}
				else
				{
					// Caso tente editar o valor de um player que não exista ou não pertença account logada
					// é criado um log de erro com o ID do Player, Account_ID e Session_ID
					// para analise do administrador.
					if($this->player_update->error->all)
		            {
		            	print_r($this->player_update->error->all);
		            	$player_id = $this->_decrypt($this->input->post('private_id', TRUE));
		            	log_message('error', "Player/Edit::Invalid update player[$player_id], account_id[".$this->account->id."], session_id[".$this->session->userdata('session_id')."]");
		            }

		            $this->error->displayError('FATAL_ERROR');
				}
			}
		}
	}

}

/* End of file players.php */
/* Location: ./application/modules/8.50/account/controllers/players.php */

?>