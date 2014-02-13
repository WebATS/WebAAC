<?php
/**
 * Project:     WebATS Manager
 * File:        ConfigsValue.php
 * SVN:         $Id: $
 */
class ConfigsValue extends CI_Controller {
	protected $localConfigs;
	protected $_ci;
	
	public function __construct()
	{
		$this->_ci =& get_instance();
	}

	public function getConfig($Config=FALSE, $returnError=TRUE)
	{
		if($Config)
		{
			$query = $this->_ci->db->get_where('web_ats_configs',  array('config' => $Config), 1);
		}
		else
		{
			$query = $this->_ci->db->get('web_ats_configs');
		}
		
		if ($query->num_rows() > 0)
		{
			
			
			if($Config)
			{
			$this->localConfigs = $query->row_array();
			return $this->localConfigs['value'];
			}
			else
			{
				$this->localConfigs = $query->result_array();
				return $this->localConfigs;
			}
		}
		else
		{
			log_message('error', '[ Library Configs Value ] Query invсlid '.$Config.'');
			if($returnError){
				show_error('Foi necessitado uma configuraчуo ('.$Config.') que nуo estс indexada no banco de dados, verifique suas configuraчѕes internas!', 500, 'Erro: Invalid Config');
			}
			else
			{
				return FALSE;
			}
		}
	}
}

?>