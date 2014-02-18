<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 *
 * @package		CodeIgniter
 * @subpackage	Models
 * @category	WebATS
 * @author		WebATS Manager Team
 * @link		http://webats.xtibia.com
 */		
class user_grupos extends DataMapper {
	var $table = "web_ats_grupos";

      function __construct()
      {
         parent::__construct();
      }

   	public function getAcess($system, $accountUserGroup)
   	{
   		$this->where('id', $accountUserGroup);
   		$this->get();

   		if(!$this->id)
   		{ 
   			return FALSE;
         }
         
			$grupo_acessos = new user_grupos_acess();
			$grupo_acessos->where('grupo_id', $userGrup);
			$grupo_acessos->where('access_system', $system);
			$explode = explode('/', $system);
         $grupo_acessos->or_where('grupo_id', $userGrup);
			$grupo_acessos->where('access_system', $explode[0]);
   		$grupo_acessos->get();
   		//$grupo_acessos->check_last_query();
         //echo $grupo_acessos->grupo_id;
   		if($grupo_acessos->grupo_id)
   		{
   			return TRUE;
   		}

   		return FALSE;
   	}
   	
 }

/* End of file player_model.php */
/* Location: ./application/modules/8.50/account/models/accounts.php */

?>