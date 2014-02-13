<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 /**
  * 
  *
  * @package		CodeIgniter
  * @subpackage		Libraries
  * @category		MultWorlds
  * @author			WebATS Manager Team
  * @link			http://webats.xtibia.com
  */		
 class multworlds extends MX_Controller {
 
 	var $worlds;
 	var $default_world;
 	var $world_config_file = array();
 	var $newPlayerVocations = array();
 	var $newPlayerSex = array();
 	var $newPlayerTowns = array();

 	private $LocalError = FALSE;

 	public function __construct()
 	{
 		$this->ConfigsValue = $this->load->library('ConfigsValue');
 		if (is_array(config_item('worlds'))) 
 		{
 			foreach (config_item('worlds') as $key => $value) 
 			{
 				$world_atived = config_item('world_atived');
				if(array_key_exists($key, $world_atived)) 
				{
					if($world_atived[$key] == TRUE)
					{
						$this->worlds[$key] = $value;
					}
					elseif($world_atived[$key] == FALSE)
					{
						continue;
					}
				}
				else
				{
					$this->worlds[$key] = $value;
				}

 			}
 			//$this->worlds = config_item('worlds');
 		}
 		else
 		{
 			$this->error->displayError('FATAL_ERROR');
 			log_message('error',"worlds not is array");
 		}
 		
 		if (array_key_exists(config_item('world_default'), config_item('worlds')))
 		{
 			$world_id = config_item('world_default');
 			foreach ($this->worlds as $key => $value) 
			{
				$world_atived = config_item('world_atived');

				if(array_key_exists($world_id, $world_atived)) 
				{
					if($world_atived[$world_id] == FALSE)
					{
						$this->error->displayError('World Default Desatived, rand world is atived');
						foreach ($world_atived as $key => $value) 
						{
							if ($value == TRUE) 
							{
								$this->default_world = $key;
								log_message('error',"World Default Desatived, rand world[$key] is atived");
								break;
							}
						}
						break;
					}
					elseif($world_atived[$world_id] == TRUE)
					{
						$this->default_world = $world_id;
					}
				}
				else
				{
					$this->default_world = $world_id;
				}
			}
 			// $this->default_world = config_item('world_default');
 		}
 		else
 		{
 			$this->error->displayError('FATAL_ERROR');
 			log_message('error',"world_default[config_item('world_default')] param world invalid");
 		}

 		foreach ($this->worlds as $key => $value) 
 		{
 			$worlds_config_file = config_item('worlds_config_file');
 			if (isset($worlds_config_file[$key])) 
 			{
 				$this->world_config_file[$key] = $worlds_config_file[$key];
 			}
 			else
 			{
 				log_message('error',"World_config_file[$key] param world invalid");
 			}

 			$newPlayerVocations = config_item('newPlayerVocations');
 			if (@$newPlayerVocations[$key]) 
 			{
 				$this->newPlayerVocations[$key] = $newPlayerVocations[$key];
 			}
 			else
 			{
 				log_message('error',"newPlayerVocations[$key] param world invalid");
 			}

 			$newPlayerSex = config_item('newPlayerSex');
 			if (isset($newPlayerSex[$key])) 
 			{
 				$this->newPlayerSex[$key] = $newPlayerSex[$key];
 			}
 			else
 			{
 				$this->error->displayError('FATAL_ERROR');
 				log_message('error',"newPlayerSex[$key] param world invalid");
 			}
 		}

 		if ($this->input->post('world') !== FALSE) 
		{
			$this->setDefatulWorld($this->input->post('world'));
		}
 	}

 	public function checkValidWorldID($world_id)
 	{
 		if(!array_key_exists($world_id, $this->worlds)) 
			{
				//$this->error->displayError('World inválido!');
				log_message('error',"setDefatulWorld[$world_id] param world_id invalid");
			}
			else
			{
 				foreach ($this->worlds as $key => $value) 
 				{
 					$world_atived = config_item('world_atived');

 					if(array_key_exists($world_id, $world_atived)) 
 					{
 						if($world_atived[$world_id] == TRUE)
	 					{
	 						//$this->default_world = $world_id;
	 						$this->session->set_userdata('world_id_select', $world_id);
	 						return TRUE;
	 					}
	 					elseif($world_atived[$world_id] == FALSE)
	 					{
	 						//$this->default_world = config_item('world_default');
	 						return FALSE;
	 					}
 					}
 					else
 					{
 						//$this->default_world = $world_id;
 						return TRUE;
 					}
 				}
				//$this->default_world = $world_id;
			}
 	}

 	public function setDefatulWorld($world_id = false)
 	{
 		if($world_id !== FALSE)
 		{
			if($this->checkValidWorldID($world_id))
			{
				$this->default_world = $world_id;
			}
			else
			{
				$this->default_world = config_item('world_default');
			}
		}

		if($this->session->userdata('world_id_select') !== FALSE)
		{
			if($this->checkValidWorldID($this->session->userdata('world_id_select')))
			{
				$this->default_world = $this->session->userdata('world_id_select');
			}
			else
			{
				$this->default_world = config_item('world_default');
			}
		}
			
		return $this->default_world;
	}


	public function newCharSex($id = FALSE)
	{
		$newPlayerSex = config_item('newPlayerSex');
		if ($id) 
		{
			if(array_key_exists($id, $newPlayerSex[$this->default_world]))
			{
				return TRUE;
			}
			else
			{
				log_message('error',"newPlayerSex[$this->default_world]::[$id] param invalid");
				return FALSE;
			}
		}

		if(isset($newPlayerSex[$this->default_world]))
		{
			return $newPlayerSex[$this->default_world];
		}
		else
		{
			return array('invalid' => 'invalid');
		}
	}

	public function newCharVocations($id = FALSE)
	{
		$newPlayerVocations = config_item('newPlayerVocations');

		if ($id !== FALSE) 
		{
			if(!empty($newPlayerVocations[$this->default_world][$id]))
			{
				return TRUE;
			}
			else
			{
				log_message('error',"newPlayerVocations[$this->default_world]::[$id] param invalid");
				return FALSE;
			}
		}

		if(isset($newPlayerVocations[$this->default_world]))
		{
			return $newPlayerVocations[$this->default_world];
		}
		else
		{
			return array('invalid' => 'invalid');
		}
	}

	public function newCharWorld($id)
	{
		if(array_key_exists($id, $this->worlds))
		{
			return TRUE;
		}
		else
		{
			log_message('error',"newCharWorld[$this->default_world]::[$id] param invalid");
			return FALSE;
		}
	}

	public function newCharTowns($id = FALSE)
	{
		$newPlayerTowns = config_item('newPlayerTowns');
		if ($id !== FALSE) 
		{
			if(in_array($id, $newPlayerTowns[$this->default_world]))
			{
				return TRUE;
			}
			else
			{
				log_message('error',"newPlayerTowns[$this->default_world]::[$id] param invalid");
				return FALSE;
			}
		}
		
		if(isset($newPlayerTowns[$this->default_world]))
		{
			foreach ($newPlayerTowns[$this->default_world] as $key) {
				$towns_list = config_item('towns_list');
				if (array_key_exists($key, $towns_list[$this->default_world])) 
				{
					$this->newPlayerTowns[$key] = $towns_list[$this->default_world][$key];		
				}
				else
				{
					log_message('error',"newPlayerTowns[$key] param towns_list invalid");
				}
			}

			if ($this->newPlayerTowns) {
				return $this->newPlayerTowns;
			}
			return array('null' => 'null');
		}
		else
		{
			log_message('error',"newPlayerTowns[$this->default_world] param world_id invalid");
			return array('invalid' => 'invalid');
		}
	}

	public function newPlayer($town_id, $vocation_id, $world_id=FALSE)
	{
		$this->localNewPlayerTown_id = $town_id;
		$this->localNewPlayerVocation_id = $vocation_id;
		
		if($world_id !== FALSE)
		{
			$this->default_world = $world_id;
		}

	}

	public function getVocInfo($id, $info, $ret=0, $world_id=FALSE)
	{
		if (!$world_id) 
		{
			$world_id = $this->default_world;
		}

		$config_file = config_item('worlds_config_file');
		$config_file = $config_file[$world_id];
		if(file_exists($config_file.'\data\XML\vocations.xml'))
		{
			$xml = simplexml_load_file($config_file.'\data\XML\vocations.xml');
			$info = $ret == 0 ? (string) $xml->vocation[$id][$info] : (int) $xml->vocation[$id][$info];
			if ($info) return $info;
			return false;
		}
		return false;
	}

	public function newPlayerValue($value)
	{
		$town_id = $this->localNewPlayerTown_id;
		$town_posx = config_item('town_posx');
		$town_posy = config_item('town_posy');
		$town_posz = config_item('town_posz');

		$newPlayerValue = config_item('newPlayerValue');

		//town_posx
		if ($value == 'posx') {
			if(isset($town_posx[$this->default_world][$town_id]))
			{
				return $town_posx[$this->default_world][$town_id];
			}
			else
			{
				log_message('error',"newPlayer town_posx[".$this->default_world."][".$town_id."] invalid config");
				return $town_posx[config_item('world_default')][$town_id];
			}
		}

		//town_posy
		if ($value == 'posy') {
			if(isset($town_posy[$this->default_world][$town_id]))
			{
				return $town_posy[$this->default_world][$town_id];
			}
			else
			{
				log_message('error',"newPlayer town_posy[".$this->default_world."][".$town_id."] invalid config");
				return $town_posy[config_item('world_default')][$town_id];
			}
		}

		//town_posz
		if ($value == 'posz') {
			if(isset($town_posz[$this->default_world][$town_id]))
			{
				return $town_posz[$this->default_world][$town_id];
			}
			else
			{
				log_message('error',"newPlayer town_posz[".$this->default_world."][".$town_id."] invalid config");
				return $town_posz[config_item('world_default')][$town_id];
			}
		}

		/**
		 * [$this->AllConfigs Recupera todas configações do banco de dados]
		 * newPlayerValue[world_id][vocation_id][custom_value]
		 * @return valor config
		 */
		$this->AllConfigs = $this->ConfigsValue->getConfig();
		foreach ($this->AllConfigs as $key => $valueConfig) {
			foreach ($valueConfig as $key => $valueConfig) {
				if($key === 'config')
				{
					if($valueConfig == 'newPlayerValue['.$this->default_world.']['.$this->localNewPlayerVocation_id.']['.$value.']')
					{
						if($this->ConfigsValue->getConfig($valueConfig))
						{
							if ($this->ConfigsValue->getConfig($valueConfig)) 
							{
								return $this->ConfigsValue->getConfig($valueConfig);
							}
							break;
						}
					}
				}
			}
		}

		$newPlayerValue = config_item('newPlayerValue');
		/*if ($value == 'experience') 
		{
			$level = self::newPlayerValue('level');
			return $exp = (50 * $level * $level * $level) / 3 - 100 * $level * $level + (850 * $level) / 3 - 200;
		}

		if ($value == 'cap') 
		{
			$level = self::newPlayerValue('level');
			return $cap = ($level-8) * self::getVocInfo((int) $this->localNewPlayerVocation_id, 'gaincap', 1) + 400;
		}

		if ($value == 'health') 
		{
			$level = self::newPlayerValue('level');
			return $health = $level <= 8 ? 145 + $level * self::getVocInfo(0, 'gainhp', 1) : 145 + 8 * self::getVocInfo(0, 'gainhp', 1) + ($level - 8) * self::getVocInfo((int) $this->localNewPlayerVocation_id, 'gainhp', 1);
		}

		if ($value == 'mana') 
		{
			$level = self::newPlayerValue('level');
			return $mana = $level <= 8 ? -self::getVocInfo(0, 'gainmana', 1) + $level * self::getVocInfo(0, 'gainmana', 1) : -self::getVocInfo(0, 'gainmana', 1) + 8 * self::getVocInfo(0, 'gainmana', 1) + ($level - 8) * self::getVocInfo((int) $this->localNewPlayerVocation_id, 'gainmana', 1);
		}*/

		// Players Value level
		if(isset($newPlayerValue[$this->default_world][$this->localNewPlayerVocation_id][$value]))
		{
			return $newPlayerValue[$this->default_world][$this->localNewPlayerVocation_id][$value];
		}
		else
		{
			if (isset($newPlayerValue[config_item('world_default')][$this->localNewPlayerVocation_id][$value])) 
			{
				log_message('error',"Não foi encontrado a configuração \$assign_to_config['newPlayerValue'][ ".$this->default_world." ][ ".$this->localNewPlayerVocation_id." ]['$value']. Configuração World Default setada.");
				return $newPlayerValue[config_item('world_default')][$this->localNewPlayerVocation_id][$value];			
			}
			else
			{
				log_message('error',"Não foi encontrado a configuração \$assign_to_config['newPlayerValue'][ ".$this->default_world." ][ ".$this->localNewPlayerVocation_id." ]['$value']. E ao chamar configuração world default \$assign_to_config['newPlayerValue'][ ".config_item('world_default')." ][ ".$this->localNewPlayerVocation_id." ]['$value'] também não foi encontrada.");
				if (!$this->LocalError) 
				{
					$this->error->displayError('FATAL_ERROR');
					$this->LocalError = true;
				}
			}
		}

	}

	public function newPlayerValueLockType($sex)
	{
		$newPlayerSexLockType = config_item('newPlayerSexLockType');

		if(isset($newPlayerSexLockType[$this->default_world][$sex]))
		{
			return $newPlayerSexLockType[$this->default_world][$sex];
		}
		else
		{
			if (isset($newPlayerValue[config_item('world_default')][$sex])) 
			{
				log_message('error',"Não foi encontrado a configuração \$assign_to_config['newPlayerSexLockType'][ ".$this->default_world." ][ ".$sex." ]. Configuração World Default setada.");
				return $newPlayerSexLockType[config_item('world_default')][$sex];			
			}
			else
			{
				log_message('error',"Não foi encontrado a configuração \$assign_to_config['newPlayerValue'][ ".$this->default_world." ][ ".$sex." ]. E ao chamar configuração world default \$assign_to_config['newPlayerValue'][ ".config_item('world_default')." ]['$sex'] também não foi encontrada.");
				if (!$this->LocalError) 
				{
					$this->error->displayError('FATAL_ERROR');
					$this->LocalError = true;
				}
			}
		}
	}

 }
 
 /* End of file multWorlds.php */
 /* Location: ./application/libraries/multWorlds.php */

?>