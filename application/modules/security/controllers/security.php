<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Security extends MX_Controller {

  function __construct() 
  {
    parent::__construct();
  }


  public function AuthenticPermissions($system, $group_access, $redirect = FALSE)
  {
    return $this->getAcess($system, $group_access);
  }

  function getAcess($system, $group_access) 
  {

    $session_security = $this->session->userdata('security_prev');

    /**
    * Verifica se a session de previlégios do usuário já expirou.
    */

    if( is_array($session_security) )
    {
      if( $session_security['time'] + 60 * config_item('time_session_security') <= time() )
      {
        $this->load->model('user_grupos')->returnAcess($group_access);
      }
    }
    else
    {
      $this->load->model('user_grupos')->returnAcess($group_access);
    }

    // die(var_dump($session_security));

    $explode = explode('/', $system);

    /**
    * Já existe previlégio para o sistema setado na session?
    */

    if( is_array($session_security) )
    {
      if( isset($session_security[$system]) and  $session_security[$system] == '1' )
      {
        return TRUE;
      }
      elseif(isset($session_security[$system]) and  $session_security[$system] == '0' )
      {
        return FALSE;
      }
      elseif( isset($session_security[$explode[0]]) and $session_security[$explode[0]] == '0')
      {
        return FALSE;
      }
      elseif( isset($session_security[$explode[0]]) and $session_security[$explode[0]] == '1')
      {
        return TRUE;
      }
      elseif( isset( $session_security['full_access'] ) and $session_security['full_access'] == '1')
      {
        return TRUE;
      }            

    }
    return FALSE;
  }
}


/* End of file security.php */
/* Location: ./application/modules/security/controllers/security.php */

