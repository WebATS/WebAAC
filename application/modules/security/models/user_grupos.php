<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*
* @package		CodeIgniter
* @subpackage	Models
* @category	  WebATS
* @author		  WebATS Manager Team
* @link		    http://webats.github.io/WebAAC/
*/		
class user_grupos extends DataMapper {
  var $table = "web_ats_grupos";
  private $_ci;

  function __construct()
  {
    parent::__construct();
    $this->_ci =& get_instance();
  }

  public function returnAcess($accountUserGroup)
  {
    $this->where('id', $accountUserGroup);
    $this->get();

    if(!$this->id)
    { 
      return FALSE;
    }

    /**
    * Query
    */
    $grupo_acessos = new user_grupos_acess();
    $grupo_acessos->where('grupo_id', $accountUserGroup);
    $grupo_acessos->get();
    //$grupo_acessos->check_last_query();

    /**
    * Verifica se o usuário não tem permissão para acessar este sistema.
    * Armazena em cache o resultado.
    */
    $array = array();

    foreach ($grupo_acessos as $key ) 
    {  
      $array[$key->access_system] = $key->enable_access;
    }

    $array['time'] = time();
    $this->_ci->session->set_userdata('security_prev', $array);

    return FALSE;
  }

}

/* End of file player_model.php */
/* Location: ./application/modules/8.50/account/models/accounts.php */

?>