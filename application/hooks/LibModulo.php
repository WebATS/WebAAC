<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * WebATS Manager HOOK Display Module Class
 *
 * Esta classe é responsável por organizar os módulos atravésdo hook
 * Os módulos são chamados e distribuidos dinamicamente através do template
 * É possível chamar VIEW ou CONTROLLER
 *
 * @package		WebATS Manager
 * @category	Hook
 * @author		WebATS Manager Team
 * @link		http://webats.com.br/guide/hook-class
 */
class Check_Modulo
{
	private $_ci;
	private $_class;
	private $_method;
	private $_LocalVariaveis;
	private $_LocalAtivado;
	private $_LocalTipo;
	private $_LastCall;
	private $_lastError;
	private $_LastController;
	private $_timeLoad;

	/**
	 * Inicializa o método mágico __construct
	 * @CI_Controller
	 * @Load Helper URL
	 * @Class __getParam
	 * @Method __getParam
	 * 
	 * @access	public
	 * @return	defined object value
	 */
	public function __construct()
	{
		$this->_ci =& get_instance();
		$this->_ci->load->helper('url');
		$this->_ci->lang->load('Web_ATS', true);
		if(!empty($_GET['lang'])){
			$this->_ci->session->set_userdata(array('lang_select' => $this->_ci->input->get('lang', TRUE)));
			log_message('debug', "[ HOOK Lang ] Language ".$this->_ci->input->get('lang', TRUE)." configured");
			redirect(uri_string(), 'refresh');
		}
		if(!$this->__getParam(1) and !$this->__getParam(2))
		{
			$match = explode('/', $this->_ci->config->item('default_page'));
			$this->_class = $match[0];
			if(isset($match[1]))
			{
				$this->_method = $match[1];
			}
			else
			{
				$this->_method = 'index';
			}
		}
		else
		{
			$this->_class = $this->__getParam(1);
			if($this->__getParam(2))
			{
				$this->_method = $this->__getParam(2);
			}
			else
			{
				$this->_method = 'index';
			}
		}
		$where = "nome = '$this->_class/$this->_method' AND tipo = 'page' OR nome = '$this->_class' AND tipo = 'page'";
		$query = $this->_ci->db->where($where);
		$query = $query->get('web_ats_protect_pages', '1');

		if($query->num_rows())
		{
			$row = $query->result_array();
			modules::run('account/_needlogin', TRUE, $row[0]['acess']);
		
		}
	}

	/**
	 * Função __getParam
	 * @param	int	
	 * 
	 * @access	public
	 * @return	URL segment
	 */
	public function __getParam($index) 
	{
        $str = '/'.uri_string();
        $str = explode('/', $str);
        if(isset($str[$index]))
        {
        	return addslashes($str[$index]);
        }
        return FALSE;
    }

    /**
	 * Função __Check
	 * Função resposável pela obtenção de informações ao banco de dados
	 * É feito uma query onde é obtido a listagem de quais módulos serão ligados dinamicamente no template
	 * 
	 * @access	public
	 * @return	__tratarString function or error
	 */
     function checkModulo($content) {
        // Busca parÃ¢metros de checagem dentro do modulo chamado
        if (preg_match_all('#<!-- CHECK: (.*?) -->#', $content, $matches)) {
            foreach ($matches[1] as $check) {
                $variavel = $check;
            }
            // ParÃ¢metro <!-- CHECK: TRUE -->
            if ($check == 'TRUE') {
                if (preg_match_all('#<!-- MODULO NAME: (.*?) -->#', $content, $matches)) {
                    foreach ($matches[1] as $check2) {
                        $this->last_modulo_name = $check2;
                    }
                }
           		if (preg_match_all('#<!-- CHECK EXIST DB: (.*?) -->#', $content, $matches)) {
                    foreach ($matches[1] as $table) {
                        $query = mysql_query("SELECT * from $table ");
							if (!$query) {
								$this->_lastError = 'Tabela Banco De Dados: '.$table.' não encontrado.<p>';
								return false;
							}
						}
				}

				if (preg_match_all('#<!-- CHECK EXIST DB: (.*?) -->#', $content, $matches)) {
                    foreach ($matches[1] as $table) {
                        $query = mysql_query("SELECT * from $table ");
							if (!$query) {
								$this->_lastError = 'Tabela Banco De Dados: '.$table.' não encontrado.';
								return false;
							}
						}
				}
                //ParÃ¢metro: <!-- CHECK DB: id, name FROM logs --> executa a query, e confere se todas tables e rows do módulos são existentes.
                if (preg_match_all('#<!-- CHECK DB: (.*?) -->#', $content, $matches)) {
                    foreach ($matches[1] as $table) {
                        $query = mysql_query("SELECT $table ");
                        if (!mysql_num_rows($query)) {

                            if (preg_match_all('#<!-- INSERT NEW LANG: (.*?)/(.*?)/(.*?) -->#', $content, $matches)) {
                                $setCache->DeleteCache('' . $WEBATS['folder']['layouts'] . '/' . $this->loadLayout() . '/' . $WEBATS['folder']['cache'] . '/');
                                foreach ($matches[1] as $lang) {
                                    $lang = $lang;
                                }
                                foreach ($matches[2] as $titulo) {
                                    $titulo = $titulo;
                                }
                                foreach ($matches[3] as $imgDir) {
                                    $imgDir = $imgDir;
                                }
                                $query = mysql_query("SELECT * FROM " . $this->tableName('web_ats_langs') . " WHERE lang = '$lang' ");
                                if (!mysql_num_rows($query)) {

                                    if (file_exists('' . $WEBATS['folder']['modulos'] . '/' . $this->last_modulo_dir . '/imagens/' . $imgDir . '')) {
                                        $imgDir = '' . $WEBATS['folder']['modulos'] . '/' . $this->last_modulo_dir . '/imagens/' . $imgDir . '';
                                        $data = array(
                                            'lang' => '' . $lang . '',
                                            'nome' => '' . $titulo . '',
                                            'img' => '' . $imgDir . ''
                                        );
                                        $this->_ci->db->insert('web_ats_langs', $data);;
                                    }
                                }
                            }
                            if (preg_match_all('#<!-- UPDATE DB LANG: (.*?) -->#', $content, $matches)) {                               
                                foreach ($matches[1] as $lang) {
                                    if (file_exists("".APPPATH."modules/$this->_LastController/install/$lang".EXT."")) {
                                        include ("".APPPATH."modules/$this->_LastController/install/$lang".EXT."");

                                        foreach ($setLang as $n => $b) {
                                            $data = array(
                                                'lang' => '' . $lang . '',
                                                'variavel' => '' . $n . '',
                                                'tradu' => '' . $b . '',
                                                'sistema' => '' . $this->_LastController . ''
                                            );
                                            $this->_ci->db->insert('web_ats_traducoes', $data);
                                        }
                                    } else {
                                        $this->_lastError = "UPDATE DB: Arquivo ".APPPATH."modules/$this->_LastController/install/$lang".EXT." inexistente.";
                                        return false;
                                    }
                                }
                            } 
                            else 
                            {
                                $this->_lastError = 'CHECK DB: ' . $table . ' inexistentes.';
                                return false;
                            }
                        }
                    }
                }
            }
        }
        return true;
    }
	public function __Check()
	{	
			$ConfigsValue = $this->_ci->load->library('ConfigsValue');
            
			if($ConfigsValue->getConfig('closedAAC') and !modules::run('account/_needlogin', FALSE, 6) and $this->_class.'/'.$this->_method != 'account/login' and $this->_class.'/'.$this->_method != 'account/logout' and $this->_class != 'admin')
			{
				$this->_LocalVariaveis = $ConfigsValue->getConfig('closedAACDefaultPage');
				$this->_LocalAtivado = '1';
				$this->__tratarString();
				log_message('debug', '[ hook ] WebACC fechado, página padrão definida retornada ao usuário.');
				return;
			}
			
				$query = $this->_ci->db->get_where('web_modulos', array('categoria' => $this->_class, 'nome' => $this->_method), 1);

				if (!$query->num_rows()) 
				{
					$query = $this->_ci->db->get_where('web_modulos', array('categoria' => $this->_class, 'nome' => 'use_url_method'), 1);
				}

				if ($query->num_rows()) 
				{
					foreach ($query->result() as $row)
					{
						$this->_LocalVariaveis = $row->variaveis;
						$this->_LocalAtivado = $row->ativado;
					} 
					$this->__tratarString();
				}
				else
				{
					echo modules::run('error/displayError', 'ERROR_PAGE_INVALID', true, 'ERROR_PAGE_INVALID_LABEL', 'error_page_invalid');
				}	
			
		
	}

	public function __tratarString()
	{
		if ($this->_LocalAtivado) 
        {
				if ($this->_LocalVariaveis)
				{

					$search = array( '#use_method#' );
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

							if(@$matches[1][$i] == 'modulo') 
                            {
								$this->_LastController = $controller[0];
									/*if (file_exists("".APPPATH."/modules/$this->_LastController/controllers/$this->_LastController".EXT."")) */
									$MX_Router = new MX_Router();
									$controller_1 = false;
									if (isset($controller[1])) 
									{
										$controller_1 = $controller[1];
									}
									
									if ($MX_Router->locate(array(@$controller[0], $controller_1, true))) 
									{
										$this->_LastCall .= $mod;
												$where = "nome = '$mod' AND tipo = 'modulo' or nome = '$controller[0]' AND tipo = 'modulo'";
												$query = $this->_ci->db->where($where);
												$query = $query->get('web_ats_protect_pages', '1');
												if($query->num_rows())
												{
													$row = $query->result_array();
													if(modules::run('account/_needlogin', FALSE, $row[0]['acess']))
													{
														if (modules::checkRun($mod)) 
														{
															if ($this->checkModulo($mod) == true)
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
														if(!$row[0]['acess']){
															echo modules::run('error/displayError', 'ERROR_LABEL_NEED_LOGIN', 'alert');	
														}
													}
												
												}
												else
												{
													
													if (modules::checkRun($mod)) 
														{
															if ($this->checkModulo($mod) == true) 
															{													
																echo modules::run($mod);		
															}else
															{				
																echo modules::run('error/displayError', $this->_lastError);
															}	
															
														}														
														else
														{
															echo modules::run('error/displayError', 'HOOK_INVALID_METHOD', 'error', 'ATT', 'error', array($mod));															
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
		
									$where = "nome = '$mod' AND tipo = 'modulo'";
									$query = $this->_ci->db->where($where);
									$query = $query->get('web_ats_protect_pages', '1');
									if($query->num_rows())
									{
										$row = $query->result_array();
										if(modules::run('account/_needlogin', FALSE, $row[0]['acess']))
										{
											if($this->_ci->load->Check_View($mod)){
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
											if(!$row[0]['acess']){
												echo modules::run('error/displayError', 'ERROR_LABEL_NEED_LOGIN', 'alert', 'ATT');
											}
										}
									
									}
									else
									{
										if($this->_ci->load->Check_View($mod)){
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
					else
					{
						echo modules::run('error/displayError', 'HOOK_INVALID_VARIAVEIS');	
						//echo modules::run($this->_ci->config->item('default_page'));
					}					
				}
				else
				{
					echo modules::run('error/displayError', 'HOOK_INVALID_VARIAVEIS');	
					//echo modules::run($this->_ci->config->item('default_page'));
				}		
		}
		else
		{	
			echo modules::run('error/displayError', 'HOOK_MODULO_DESATIVADO');
			//echo modules::run($this->_ci->config->item('default_page'));
		}		
	}

	public function returnLang($param)
    {
		return $this->_ci->lang->line($param);
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

/* End of file LibModulo.php */
/* Location: ./modules/hooks/LibModulo.php */