<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Config extends CI_Config {
	
	/*
	 * ------------------------------------------------------
	 *  Check PHP Version
	 * ------------------------------------------------------
	 */
	 function __construct()
	 {
		parent::__construct();
		if(parent::item('enable_check_php_version')){
			if (!is_php('5.3'))
			{
				show_error('Sua vers�o do PHP ('.PHP_VERSION.') � inferior a vers�o (5.3) m�nima requesitada pela aplica��o, atualize seu apache!', 500, 'Vers�o PHP Inv�lida');
			}
		}
	}
}

/* End of file MY_Config.php */
/* Location: ./application/core/MY_Config.php */
