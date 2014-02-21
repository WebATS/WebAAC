<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * WebATS Manager HOOK Display Module Class
 *
 * Esta classe é responsável por organizar os módulos atravésdo hook
 * Os módulos são chamados e distribuidos dinamicamente através do template
 *
 *  
 * MIT License
 * ===========
 *
 * Copyright (c) 2012 Carlos Eduardo juniorb2ss@gmail.com
 *
 * Permission is hereby granted, free of charge, to any person obtaining a
 * copy of this software and associated documentation files (the "Software"),
 * to deal in the Software without restriction, including without limitation
 * the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the
 * Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 * 
 * @license MIT https://github.com/WebATS/WebAAC/blob/master/LICENSE
 *
 * @package		WebATS Manager
 * @category	Hook
 * @author		WebATS Manager Team
 * @link		https://github.com/WebATS/WebAAC
 */
class Modulos
{
	private $_ConfigsWebATS;
	private $_ci;
	private $_defaultMethod = 'use_url_method';

	/**
	 * __contruct
	 *
	 * @author Carlos Eduardo juniorb2ss@gmail.com
	 **/
	public function __construct()
	{
		/**
		 * call ci instace
		 * @var object
		 */		
			$this->_ci =& get_instance();

		/**
		 * load helpers
		 */		
			$this->_ci->load->helper('url');

		/**
		 * cache driver
		 */
			$this->_ci->load->driver( 'cache', array( 'adapter' => config_item('cache_type') ) );	

		/**
		 * load lang package
		 */
			$this->_ci->lang->load('Web_ATS', true);

		/**
		 * 
		 */
			$this->_ConfigsWebATS = $this->_ci->load->library('ConfigsValue');

		 /**
         * Definindo idioma 
         */
			if(! empty( $_GET['lang'] ) )
	        {
				$this->_ci->session->set_userdata( array( 'lang_select' => $this->_ci->input->get( 'lang', TRUE ) ) );
				redirect(uri_string(), 'refresh');
			}

		/**
         * Captura os parametros da URL, caso o usuário não tenha definido alguma requesição de página é retornado página padrão
         */        
			if( !$this->__getParam(1) and !$this->__getParam(2) )
			{
				$match = explode('/', $this->_ci->config->item('default_page'));
				$this->_class = $match[0];
	            (isset($match[1])) ? $this->_method = $match[1] : $this->_method = 'index';
			}
			else
			{
				$this->_class = $this->__getParam(1);
	            ($this->__getParam(2)) ? $this->_method = $this->__getParam(2) : $this->_method = 'index';
			}

		/**
		 * mount query
		 */
			$query = $this->_ci->db->where('nome', "$this->_class/$this->_method")->where('tipo', 'page')->or_where('nome', $this->_class)->where('tipo', 'page')->get('web_ats_protect_pages', '1');
		/**
		 * Verifica se a página requesitada é protegida
		 */
			if($query->num_rows())
			{
				$query = $query->result();
				modules::run('account/_needlogin', TRUE, $query[0]->nome);
			}
	}

	/**
	 * Função __getParam
	 * @param	int	
	 * 
	 * @access	public
	 * @author Carlos Eduardo juniorb2ss@gmail.com
	 * @return	URL segment
	 */
	public function __getParam($index)
	{
		/**
		 * parser url
		 * @var string
		 */
		$str = '/'.uri_string();
        $str = explode('/', $str);

        if( isset( $str[$index] ) )
        {
        	return addslashes( $str[$index] );
        }

        return FALSE;
	}

	/**
	 * MountCache
	 * @author Carlos Eduardo juniorb2ss@gmail.com
	 * @return String Cache
	 */
	public function MountCache()
	{
		if( !$cache = $this->_ci->cache->get('cachePageModulos') )
		{
			$cache = $this->_ci->load->model('webats/web_modulos')->get('web_modulos')->all_to_array(array('categoria', 'nome', 'variaveis', 'ativado', 'open_withclosed_aac'), 'id');
			$this->_ci->cache->save('cachePageModulos', $cache, config_item('time_cache_modulosapp'));
		}
		return $cache;
	}

	/**
	 * RecursiveCacheModulos
	 * @param String $system 
	 */
	public function RecursiveCacheModulos($system = FALSE)
	{
		$cache = $this->MountCache();
		if( $system == FALSE)
		{
			return $cache;
		}

		if($cache)
		{
			foreach ($cache as $key => $value) 
			{
				if( strripos($system, '/') )
				{
					if($value['categoria'].'/'.$value['nome'] == $system)
					{
						return $cache[$key];
					}
				}
				else
				{
					if($value['categoria'] == $system)
					{
						return $cache[$key];
					}
				}
				
			}

		}
	}

	/**
	 * Função checkModuleInstalation
	 * 
	 * @access	public
	 * @return	?
	 */
    public function checkModuleInstalation($content) 
    {
        // surprise
        return TRUE;
    }

	public function __Check()
	{
		if($this->_ConfigsWebATS->getConfig('closedAAC') and $this->_class.URLSLASH.$this->_method != 'account/login' and $this->_class.URLSLASH.$this->_method != 'account/logout' and $this->_class != 'admin' and modules::run('account/_needlogin', FALSE, 'closed_aac') == FALSE)
		{
			$this->_LocalVariaveis = $this->_ConfigsWebATS->getConfig('closedAACDefaultPage');
			$this->_LocalAtivado = 1;
			$this->__tratarModulo();
			log_message('debug', '[ hook ] WebACC fechado, página padrão definida retornada ao usuário.');
			
			return;
		}

		if(!$modulos = $this->RecursiveCacheModulos($this->_class.URLSLASH.$this->_method))
		{
			$modulos = $this->RecursiveCacheModulos($this->_class.URLSLASH.$this->_defaultMethod);
		}

		if( is_array( $modulos ) )
		{
			$this->_LocalVariaveis = $modulos['variaveis'];
			$this->_LocalAtivado = $modulos['ativado'];
			$this->__tratarModulo();
		}
		else
		{
			echo modules::run('error/displayError', 'ERROR_PAGE_INVALID', TRUE, 'ERROR_PAGE_INVALID_LABEL', 'error_page_invalid');
		}
	}

	public function __tratarModulo()
	{
		if ($this->_LocalAtivado == 0) 
        {
        	echo modules::run('error/displayError', 'HOOK_MODULO_DESATIVADO');
        	return;
       	}

       	if (!$this->_LocalVariaveis)
		{
			echo modules::run('error/displayError', 'HOOK_INVALID_VARIAVEIS');	
			return;
		}

		$search = array( "#$this->_defaultMethod#" );
      	$replace = array( $this->_method );
        $content = preg_replace($search, $replace, $this->_LocalVariaveis);

		if (preg_match_all('#{load (.*?) (.*?)}#', $content, $matches))
		{
			for($i = 0; $i < (count($matches, COUNT_RECURSIVE) - count($matches))/count($matches); $i++)
			{
				if(isset($matches[2][$i]))
				{
					$mod = $matches[2][$i];
				}

				$controller = explode("/", $mod);
				$this->_ci->benchmark->mark($controller[0].'_start');

				if(isset($matches[1][$i]) and $matches[1][$i] == 'modulo') 
                {
					$this->_LastController = $controller[0];					
					$MX_Router = new MX_Router();
					$controller_1 = false;
					if (isset($controller[1])) 
					{
						$controller_1 = $controller[1];
					}
					
					if ($MX_Router->locate(array(@$controller[0], $controller_1, true))) 
					{
						$this->_LastCall .= $mod;
						$this->_ci->db->where('nome', $mod);
				        $this->_ci->db->where('tipo', 'modulo');
				        $this->_ci->db->or_where('nome', $controller[0]);
				        $this->_ci->db->where('tipo', 'modulo');
						$query = $this->_ci->db->get('web_ats_protect_pages', '1');


						if($query->num_rows())
						{
							$row = $query->result_array();

							if(modules::run('account/_needlogin', FALSE, $row[0]['nome'] ) )
							{
								if (modules::checkRun($mod)) 
								{
									if ($this->checkModuleInstalation($mod) == true)
									{
										echo modules::run($mod);

									}
									else
									{
										echo modules::run('error/displayError', $this->_lastError);
									}

								}
								else
								{
									echo modules::run('error/displayError', 'HOOK_INVALID_METHOD', 'error', 'ATT', 'error', array($mod));	
								}
							}
							else
							{
								echo modules::run('error/displayError', 'ERROR_LABEL_NEED_LOGIN', 'alert');															
							}
						
						}
						else
						{													
							if (modules::checkRun($mod)) 
							{
								if ($this->checkModuleInstalation($mod) == true) 
								{													
									echo modules::run($mod);		
								}
								else
								{				
									echo modules::run('error/displayError', $this->_lastError);
								}	
								
							}														
							else
							{
								echo modules::run('error/displayError', 'HOOK_INVALID_METHOD', 'error', 'ATT', 'error', array($mod));	
								echo modules::run('error/displayError', 'ERROR_PAGE_INVALID', TRUE, 'ERROR_PAGE_INVALID_LABEL', 'error_page_invalid');														
							}		
						}
						log_message('debug', '[ hook ] Carregado Modulo Controller: '.$mod);

					}
					else
					{
						echo modules::run('error/displayError', 'CONTROLLER_NOT_FOUND', 'error', 'ATT', 'error', array($controller[0]));										
					}
				} 
				elseif(@$matches[1][$i] == 'view')
				{
					$this->_LastCall .= $mod;
					$this->_ci->db->where('nome', $mod);
			        $this->_ci->db->where('tipo', 'modulo');
					$query = $this->_ci->db->get('web_ats_protect_pages', '1');

					if($query->num_rows())
					{
						$row = $query->result_array();
						if(modules::run('account/_needlogin', FALSE, $row[0]['nome'] ) )
						{
							if($this->_ci->load->Check_View($mod))
							{
								$this->_ci->load->view($mod);	
								log_message('debug', '[ hook ] Carregado View Controller: '.$mod);
							}
							else
							{
								echo modules::run('error/displayError', 'HOOK_VIEW_NOT_FOUND', 'error', 'ATT', 'error', array($mod));	
							}		
						}
						else
						{
							echo modules::run('error/displayError', 'ERROR_LABEL_NEED_LOGIN', 'alert', 'ATT');										
						}
					
					}
					else
					{
						if($this->_ci->load->Check_View($mod))
						{
							$this->_ci->load->view($mod);	
							log_message('debug', '[ hook ] Carregado View Controller: '.$mod);
						}
						else
						{
							echo modules::run('error/displayError', 'HOOK_VIEW_NOT_FOUND', 'error', 'ATT', 'error', array($mod));	
						}
					}								
				} 
				
				$this->_ci->benchmark->mark($controller[0].'_end');
				$this->_timeLoad = $this->_ci->benchmark->elapsed_time($controller[0].'_start', $controller[0].'_end');
			}
		}

		return TRUE;
	}

	public function DisplayModulos()
	{			
			ob_start();
			
			$this->__Check();		
			$out1 = ob_get_clean();
           	$out1 = $out1;
			$this->_ci->output->set_output($out1);
			log_message('debug', '[ hook ] Buffer Output tratado e enviado ao browser');
  	}

}

/* End of file Modulos.php */
/* Location: ./application/hooks/Modulos.php */