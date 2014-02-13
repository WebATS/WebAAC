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
				show_error('Sua versгo do PHP ('.PHP_VERSION.') й inferior a versгo (5.3) mнnima requesitada pela aplicaзгo, atualize seu apache!', 500, 'Versгo PHP Invбlida');
			}
		}
	}
}

/* End of file MY_Config.php */
/* Location: ./application/core/MY_Config.php */
