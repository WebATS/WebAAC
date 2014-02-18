<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Account extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url', 'date', 'html'));
		$this->ConfigsValue = $this->load->library('ConfigsValue');
		$this->load->config('langs_server');
		$this->load->library('recaptchalib');
		$this->load->library('email_send');
		$this->load->library('multworlds');
	}
	
	public function index()
	{		
		// Verifica se o usuário tem sessão ativa, caso contrário é redirecionado para login.
		$this->_needlogin();	

		// Mostrando mensagem de notificação do sistema para usuário.
		if ($this->session->flashdata('displayMessage'))
		{
			$this->error->displayError($this->session->flashdata('displayMessage'));
		}

		if($this->input->post('lang'))
		{
			if($this->_filter_lang($this->input->post('lang')))
			{
				$this->account->lang_server = $this->input->post('lang');
				$this->account->save();
			}
		}
	
		// Usuário tem sessão ativa, é armazenado os valores da account para serem passados para view
		$data['create_date'] =  mdate('%d/%m/%Y - %h:%i %a', $this->account->create_date);
		$data['premy_date'] =  mdate('%d/%m/%Y', time()+60*60*24*$this->account->premdays);
		$data['account'] = $this->account;
		$data['last_login'] = $this->account->last_login;
		$data['premdays'] = $this->account->premdays;
		$data['email'] = $this->account->email;
		$data['group_access'] = $this->account->group_access;
		$data['coins'] = $this->account->coins;
		$data['recoverkey'] = $this->account->recoverkey;

		$this->load->view('account_home', $data);
	}
	public function logout($customessage=FALSE)
	{
		// Verifica se o usuário tem sessão ativa
		if($this->_needlogin(FALSE))
		{		
			$this->session->unset_userdata('login');
			$this->session->unset_userdata('accountID');
			$this->session->unset_userdata('accountName');
			$this->session->unset_userdata('accountPassword');
			$this->session->unset_userdata('security_prev');
			
			$this->session->set_flashdata('logout', array('body'=> 'SUCESS_LOGOUT', 'type' => 'info'));
			if (is_array($customessage)) 
			{	
				$this->session->set_flashdata('logout', $customessage);
			}
			elseif($customessage)
			{
				$this->session->set_flashdata('logout', array('body'=> $customessage, 'type' => 'info'));
			}
			redirect('account/login', 'location');
		}
		// Caso contrário é redirecionado para login apenas.
		else
		{
			redirect('account/login', 'location');
		}
	}
		
		function _checkCaptcha($word) 
		{
			// Se conforme as configurações o reCaptcha esta ativado.
			if($this->ConfigsValue->getConfig('newAccountCheckCaptcha'))
			{
					$resp = $this->load->recaptchalib->recaptcha_check_answer (
							$this->ConfigsValue->getConfig('RecaptchaPrivateKey'),
							$this->input->server('REMOTE_ADDR'),
							$this->input->post('recaptcha_challenge_field'),
							$this->input->post('recaptcha_response_field')
					);

					if ($resp->is_valid) {
							return TRUE;
					} 
					else 
					{
							// Caso reCaptcha retorne erro é criado uma session data
							// onde é gravado o erro, e este erro é capturado pela view account_create
							$this->session->set_userdata(array('recaptchaError' => $resp->error));
							return FALSE;
					}
			}
			else
			{
				return TRUE;
			}
		}

	public function _checkPrivateKey($key)
	{
		if($this->ConfigsValue->getConfig('newAccountCheckPrivateKey'))
		{
			if(!$key)
			{
				$this->form_validation->set_message('_checkPrivateKey', 'Digite sua Private KEY');
				return FALSE;
			}

			$query = $this->db->get_where('avatar_privates_keys', array('key' => $key, 'atived' => '0'), '1');

			if($query->result())
			{
				return TRUE;
			}
			else
			{
				$this->form_validation->set_message('_checkPrivateKey', 'Key Inválida!');
				return FALSE;
			}

			return FALSE;
		}
		return TRUE;
	}
	public function _filter_lang($key)
	{
		$array = $this->config->item('langs_server');
		if (array_key_exists($key, $array)) 
		{
			return TRUE;
		}
		$this->form_validation->set_message('_filter_lang', 'Idioma Inválido!');
		return FALSE;
	}

	public function Create()
	{
		if($this->_needlogin(FALSE) == TRUE)
		{
			redirect('account');
		}


		$this->form_validation->set_message('required', 'Este campo fico em branco!');
		$this->form_validation->set_message('min_length', 'Você informou um dado com poucos caracteres!');
		$this->form_validation->set_message('max_length', 'Você informou um dado com muitos caracteres!');
		$this->form_validation->set_message('is_unique', 'Informe outro dado!');
		$this->form_validation->set_message('alpha_numeric', 'Você informou um dado com caracteres inválidos!');
		$this->form_validation->set_message('matches', 'Confirme seu password!');
		$this->form_validation->set_message('valid_email', 'Informe um email válido!');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');	
			
		// Filtrando os dados informados pelo usuário.
		//
		// Obs: Este filtros para o form_validation se encontra no arquivo de configuração
		// configs/form_validation.php
		// Os filtros usados aqui são refente a key Account/Create da array das configurações
		// contidas naquele arquivo.
		if($this->form_validation->run($this, 'Account/Create') === FALSE) 
		{
			$data['accountNameClassDiv'] = null;
			$data['emailClassDiv'] = null;
			$data['accountPasswordClassDiv'] = null;
			$data['accountConfPasswordClassDiv'] = null;
				if(form_error('accountName')){
					$data['accountNameClassDiv'] = 'warning';
				}
				elseif(set_value('accountName'))
				{
					$data['accountNameClassDiv'] = 'success';
				}
				
				if(form_error('email')){
					$data['emailClassDiv'] = 'warning';
				}
				elseif(set_value('email'))
				{
					$data['emailClassDiv'] = 'success';
				}
				
				if(form_error('accountPassword')){
					$data['accountPasswordClassDiv'] = 'warning';
				}
				elseif(set_value('accountPassword'))
				{
					$data['accountPasswordClassDiv'] = 'success';
				}
				
				if(form_error('accountConfPassword')){
					$data['accountConfPasswordClassDiv'] = 'warning';
				}
				elseif(set_value('accountConfPassword'))
				{
					$data['accountConfPasswordClassDiv'] = 'success';
				}
			$this->load->view('account_create', $data);
			$this->session->unset_userdata('recaptchaError');
		}
		// Foi feito todos os filtros e tudo está ok.
		// O script prossegue.
		//
		// Aqui é criado account do usuário, caso esteja configurado
		// para ser confirmada por email é carregado a função self:confirm();
		// caso a mesma configuração esteja desativado o usuário é redirecionado
		// para página de login onde é informado uma mensagem.
		else
		{
			$u = new account_model();
			$u->name = $this->input->post('accountName');
			$u->password = $this->input->post('accountPassword');
			$u->email = $this->input->post('email');
			$u->create_date = time();
			$u->last_email_send = time();
			$u->lang_server = $this->input->post('lang');
			
			// Configuração qual criptografia o model irá usar para criptografiar o password, hash($u->encryptionType, $u->password)
			// Se a configuração for PLAIN o model retorna o password que o usuário digito sem criptografia
			
			$u->_encryptPassword();

			// Caso configuração de confirmação de novas contas esteja ativada
			// É gerado uma hash_key e campo ativado = 0, gravado no banco de dados e enviado um email
			// ao usuário para confirmar sua nova conta.
			if($this->ConfigsValue->getConfig('newAccountCheckEmail'))
			{
				$u->hash_key = $u->_encryptHashKey();
				$u->ativado = FALSE;
			}
				
			// Configurações dinamicas
			// Caso administrador deseja adicionar alguma informação em novas accounts
			// ele poderá utilizar a tabela de configurações dinamicas.
			// Exemplo:
			// Caso o administrador queria que em casa conta novas seja adicionado 50 dias de premmy.
			// Ele irá adicionar a configuração newAccount_premdays = 50
			// 'newAccount_' prefixo reservado
			// 'premdays' nome do row na tabela accounts.
			$this->AllConfigs = $this->ConfigsValue->getConfig();

			foreach ($this->AllConfigs as $key => $value) {
				foreach ($value as $key => $value) {
					if($key === 'config')
					{
						$domain = stristr($value, '_');
						if($domain)
						{
							$domain = str_replace('_', "", $domain);
							if($this->ConfigsValue->getConfig($value))
							{
								$u->$domain = $this->ConfigsValue->getConfig($value);
							}
						}
					}
				}
			}

			if ($u->save())
			{

				// Friend Ref
				$ref = new accounts_friends();
				if($this->session->userdata('link_ref'))
				{
					
					$ref->newRef($this->input->post('accountName'), $u->where('id', $this->session->userdata('link_ref'))->get()->name);
					$this->session->unset_userdata('link_ref');
				}
				else
				{
					$ref->newRef($this->input->post('accountName'), $u->where('id', '203')->get()->name);
				}
				
				if($this->ConfigsValue->getConfig('newAccountCheckEmail'))
				{
					$this->session->set_userdata(array('boxConfirm' => TRUE));
					// É enviado um email para o usuário com o link para confirmação
					
					// Aqui será carregado todas as configurações do usuário
					$this->email_send->newEmail();
					$this->email_send->set->set_newline("\r\n");
					$this->email_send->set->from($this->config->item('mail_address'), $this->config->item('server_name'));
					$this->email_send->set->to($u->email); 
					$this->email_send->set->subject('Nova Conta - '.$this->config->item('server_name').'');

					// Será enviado BODY usando uma view existente
					// o parametro passado é a HASH_KEY, onde será usada na view.
					$param['hash_key'] = $u->hash_key;
					$this->email_send->useTemplateToMessage('templatewa/confirm_acc', $param);	
				
					// Alterado header para a função confirm()
					// Onde é mostrado a view informando que é necessario confirmar a conta
					if($this->email_send->send())
					{					
						self::confirm();
					}
					else
					{
						self::confirm(FALSE);
					}

				}
				else
				{
					// Caso a configuração de checar account por email esteja desativado
					// o usuário é redirecionado para página de login, onde será exibido
					// uma mensagem avisando que a conta foi criada com sucesso.
					$this->session->set_flashdata('SucessCreateAccount', true);
					redirect('account/login');
				}
			}
			else
			{
				// Caso o DATAMAPPER retorne algum erro é barado a criação da account
				// e criado uma mensagem em flash para ser exibida para o usuário.
				$this->session->set_flashdata('erroFatal', 'FATAL_ERROR');
				foreach ($u->error->all as $error)
				{
					// O erro do datamapper não é retornado ao usuário
					// como trata-se de um erro dificilmente de acontecer, é apenas
					// criado um log de error para informar o administrador da aplicação.
					log_message('error', "[ ACCOUNT_CREATE ] FATAL ERROR: $error");
				}
				
				// Recarrega a página de cadastro mostrando a mensagem de erro, pedindo que ele
				// tente novamente fazer o cadastro.
				redirect(current_url());

			}
		}
	}
	/**
	* Função para gerar senhas aleatórias
	*
	* @author    Thiago Belem <contato@thiagobelem.net>
	*
	* @param integer $tamanho Tamanho da senha a ser gerada
	* @param boolean $maiusculas Se terá letras maiúsculas
	* @param boolean $numeros Se terá números
	* @param boolean $simbolos Se terá símbolos
	*
	* @return string A senha gerada
	*/
	function _gerarSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)
	{
		$lmin = 'abcdefghijklmnopqrstuvwxyz';
		$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$num = '1234567890';
		$simb = '!@#$%*-';
		$retorno = '';
		$caracteres = '';

		$caracteres .= $lmin;
		if ($maiusculas) $caracteres .= $lmai;
		if ($numeros) $caracteres .= $num;
		if ($simbolos) $caracteres .= $simb;

		$len = strlen($caracteres);
		for ($n = 1; $n <= $tamanho; $n++) 
		{
			$rand = mt_rand(1, $len);
			$retorno .= $caracteres[$rand-1];
		}
			return $retorno;
	}

	public function lost($redirect=TRUE, $acess=FALSE)
	{
		$data['lost'] = null;
		if($this->uri->segment(3) == 'acc')
		{
 			$data['lost'] = 'acc';
		}
		elseif ($this->uri->segment(3) == 'password') 
		{
			$data['lost'] = 'password';
		}
		$this->form_validation->set_message('required', 'Este campo fico em branco!');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if($this->form_validation->run($this, 'Account/RecoveryKey')) 
		{
			 $this->account = new account_model();
			 $this->account->like('recoverkey', $this->input->post('recoverykey'));
			 $recoverykey = $this->account->get();
			 /*$this->account->check_last_query();*/
	        if (empty($recoverykey->id))
	        {
	            if(valid_email($this->input->post('recoverykey')))
	            {
					$this->account->where('email', $this->input->post('recoverykey'));
					$email = $this->account->get();
					/*$this->account->check_last_query();*/
					if ($email->id)
					{
						$calc = $this->ConfigsValue->getConfig('newAccountTimeToResendEmailConfirm') / 60;
						if($email->last_email_send <= time() - $this->ConfigsValue->getConfig('TimeToSendEmailLost'))
						{
							$email->last_email_send = time();
							$email->save();
							if($this->uri->segment(3) == 'acc')
							{
								// Enviar Email de acc
								$this->email_send->newEmail();
								$this->email_send->set->set_newline("\r\n");
								$this->email_send->set->from($this->config->item('mail_address'), $this->config->item('server_name'));
								$this->email_send->set->to($email->email); 
								$this->email_send->set->subject('Sua Account - '.$this->config->item('server_name').'');
								$param['account'] = $email->name;
								$this->email_send->useTemplateToMessage('templatewa/lost_acc', $param);	
								if($this->email_send->send())
								{					
									$this->error->displayError('LOST_ACC_SEND_EMAIL_ACC', 'sucess');
								}
								else
								{
									$this->error->displayError('FATAL_ERROR');
								}
							}
							elseif ($this->uri->segment(3) == 'password') 
							{
								$password = $this->_gerarSenha('10');
								$email->password = $password;
								$email->_encryptPassword();
								$email->save();

								// Enviar Email de acc
								$this->email_send->newEmail();
								$this->email_send->set->set_newline("\r\n");
								$this->email_send->set->from($this->config->item('mail_address'), $this->config->item('server_name'));
								$this->email_send->set->to($email->email); 
								$this->email_send->set->subject('Seu Password - '.$this->config->item('server_name').'');
								$param['password'] = $password;
								$this->email_send->useTemplateToMessage('templatewa/lost_pass', $param);	
								if($this->email_send->send())
								{					
									$this->error->displayError('LOST_ACC_SEND_EMAIL_PASS', 'sucess');
								}
								else
								{
									$this->error->displayError('FATAL_ERROR');
								}
							}
						}
						else
						{
							$this->error->displayError('LOST_ACC_ERROR_TIME_TO_SEND_EMAIL', 'alert', 'ATT', 'error', array($calc));
						}
					}
					else
					{
						$this->error->displayError('LOST_ACC_ERROR_INVALID_EMAIL');
					}

	            }
	            else
	            {
	            	$this->error->displayError('LOST_ACC_ERROR_INVALID_EMAIL');
	            }
	        }
	        else
	        {
	           if($this->uri->segment(3) == 'acc')
				{
					$data['lost'] = 'show_acc';
					$data['account'] = $recoverykey->name;
				}
				elseif ($this->uri->segment(3) == 'password') 
		        {
		        	$this->session->set_userdata(array('form_pass_account_id' => $recoverykey->id));
		        	/**
		        	 *  Redirecionando usuário para formulário de trocar password da conta
		        	 *  definindo 1 minuto para usuário trocar o password
		        	 *  caso contrário será preciso repetir todo processo novamente.
		        	 */
		        	$this->session->set_userdata('time_form', time()+60);;
		        	redirect('account/newpassword');
		        }
	        }

		}
		$this->load->view('lostacc', $data);
	}

	public function _check_account_pass($pass)
	{
		$u = new account_model();			

		if (modules::run('account/_needlogin')->password == $u->_encryptPassword($pass)) 
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('_check_account_pass', 'Password errado.');
			return FALSE;
		}
	}
	public function newpassword($redirect=TRUE, $acess=FALSE)
	{
			// Formulário trocar password
			if($this->session->userdata('form_pass_account_id') and $this->session->userdata('time_form') > time()){
				$this->form_validation->set_message('required', 'Este campo fico em branco!');
				$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				if($this->form_validation->run($this, 'Account/NewLostPass')) 
				{
					$this->account = new account_model();
				    $this->account->like('id', $this->session->userdata('form_pass_account_id'));
				    $newPass = $this->account->get();
				    $newPass->password = $this->input->post('new_pass');
				    $newPass->_encryptPassword();
				    $newPass->save();
					$this->session->unset_userdata('form_pass_account_id');
					$this->error->displayError('PASS_SUCESS_CHANGED', 'sucess');

					// Enviar Email novo password
					$this->email_send->newEmail();
					$this->email_send->set->set_newline("\r\n");
					$this->email_send->set->from($this->config->item('mail_address'), $this->config->item('server_name'));
					$this->email_send->set->to($newPass->email); 
					$this->email_send->set->subject('Seu Password - '.$this->config->item('server_name').'');
					$param['password'] = $this->input->post('new_pass');
					$this->email_send->useTemplateToMessage('templatewa/lost_pass', $param);	
					$this->email_send->send();
				}
				$data['lost'] = 'form_pass';
				$this->load->view('lostacc', $data);
			}
			else
			{
				$this->session->unset_userdata('form_pass_account_id');
				$this->session->unset_userdata('time_form');
				self::_needlogin();

				if($this->form_validation->run($this, 'Account/NewPass')) 
				{
					$u = new account_model();
					$u->where('id', $this->session->userdata('accountID'));
					$u->where('name', $this->session->userdata('accountName'));
					$u->get();

					$u->password = $this->input->post('new_pass');
					$u->_encryptPassword();

					if ($u->save()) 
					{
						$this->error->displayError('Seu password foi trocado com sucesso!', 'sucess');
					}
					else
					{
						$this->error->displayError('FATAL_ERRO', 'error');
					}

				}

				$this->load->view('newpassword');
			}
	}

	public function _needlogin($redirect = TRUE, $system_access = FALSE)
	{
		$this->account = new account_model();
		if($this->session->userdata('login'))
		{			
			$this->account->name = $this->session->userdata('accountName');
			$this->account->password = $this->session->userdata('accountPassword');
			if(!$this->account->login())
			{
				if($redirect)
				{
					$this->session->set_flashdata('required', TRUE);
					redirect('account/login?locate='.uri_string().'', 'location');	
				}
				else
				{
					return FALSE;
				}
			}

			$this->session->set_userdata(
							array(
								'login' => TRUE,
								'accountID' => $this->account->id,
								'accountName' => $this->account->name, 
								'group_access' => $this->account->group_access
								)
						);

			if($system_access)
			{		
				if(modules::run('Security/AuthenticPermissions', $system_access, $this->account->group_access))
				{
					return $this->account;
				}
				else
				{
					if($redirect)
					{
						redirect('account', 'location', 301);	
					}
					else
					{
						return FALSE;
					}
				
				}
			}
			else
			{
				/**
				 * Caso o administrador querer forçar o usuário a re-fazer o login
				 */
				if( $this->account->reforce_login == '1' )
				{
					$this->account->reforce_login = 0;
					$this->account->save();
					self::logout(array('body' => 'LOGIN_TIME_EXPECTED', 'type' => 'alert', 'sprintf' => array( config_item( 'time_active_login' ) ) ) );

				}

				// Verifica se o usuário fico inativo na página pelo tempo configurado.
				if ($this->session->userdata('active_time')) 
				{
					// Caso o tempo configurado de inatividade seja atingido é feito logout forçado
					// e retornado uma mensagem ao usuário pedindo que o mesmo re-faça o login.
					if ($this->session->userdata('active_time') < time()) 
					{
						// Limpa session do active_time
						$this->session->unset_userdata('active_time');
						// É chamado o logout
						// e setado uma mensagem dinámica.
						self::logout(array('body' => 'LOGIN_TIME_EXPECTED', 'type' => 'alert', 'sprintf' => array(config_item('time_active_login'))));
					}
				}

				// Armazenando session com o tempo configurado para inatividade
				$this->session->set_userdata('active_time', time()+config_item('time_active_login'));

				// retorna a instancia da account com os valores
				return $this->account;
			}
		}
		else
		{
			if($redirect)
			{
				$this->session->set_flashdata('required', TRUE);
				redirect('account/login?locate='.uri_string().'', 'location');		
			}
			else
			{
				return FALSE;
			}
		}
	}
	
	public function login()
	{
		// Caso o usuário já esteja logado, redireciona ele.
		if($this->_needlogin(FALSE))
		{
			redirect('account');
		}

		if($message = $this->session->flashdata('logout'))
		{
			$this->error->displayError($message);
		}

		if($this->session->flashdata('required'))
		{
			$this->error->displayError('NEED_LOGIN', 'alert');
		}
		// Caso o usuário tenha acabado de criar a conta e sido redirecionado para o login
		// a mensagem TRADUZIDA com variavel SUCESS_CREATE_ACC é mostrado ao usuário
		if($this->session->flashdata('SucessCreateAccount'))
		{
			$this->error->displayError('SUCESS_CREATE_ACC', 'sucess');
		}
		if($this->input->get('locate', TRUE))
		{
			$this->session->set_flashdata('locateHeader', $this->input->get('locate', TRUE));
		}

		$this->session->unset_userdata('active_time');
		$this->form_validation->set_message('required', 'Este campo fico em branco!');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if($this->form_validation->run($this, 'Account/Login') === TRUE) 
		{
			
			$u = new account_model();
			
			$u->name = $this->input->post('name');
			$u->password = $this->input->post('password');
			if($u->login())
			{
				if($u->ativado)
				{
					$this->session->set_userdata(
						array(
							'login' => TRUE,
							'accountID' => $u->id,
							'accountName' => $this->input->post('name'), 
							'accountPassword' => $this->input->post('password'),
							'group_access' => $u->group_access, 
							)
					);
					if($this->session->flashdata('locateHeader'))
					{	
						redirect(str_replace(config_item('url_suffix'), "", $this->session->flashdata('locateHeader')), 'locate');
					}
					
					redirect('account');
				}
				else
				{
					$this->session->set_flashdata('accResend', $u->id);
					$this->error->displayError('ACC_NEED_CONFIRM', 'alert');
				}
			}
			else
			{
				$this->error->displayError('INVALID_LOGIN');
			}
		
		}
		
		$this->load->view('login');
	}

	public function confirm($sucess=TRUE)
	{
		if($this->_needlogin(FALSE))
		{	
			redirect('account', 'location');
		}
		
		$segment = $this->uri->segment(3);
		
		// Caso o usuário tenha digitado uma hash_key na URL
		if(!empty($segment) and $segment != 'resend')
		{
			$u = new account_model();
			$local = $u->check_hash($segment);
			if($local === TRUE)
			{
				// HASH_KEY valida, conta confirmada e retornado uma mensagem de sucesso.
				$this->error->displayError('CONFIRM_ACC_TRUE', 'sucess', 'ATT');
			}
			elseif($local === 'ACCATIVED')
			{
				
				$this->error->displayError('ACC_ALREADY_CONFIRMED', 'alert');
			}
			elseif($local === FALSE)
			{
				// Caso a HASH_KEY seja inválida ou ocorreu algum erro
				// na execução do DATAMAPPER é retornado esse erro.
				$this->error->displayError();
			}
			
			self::login();
			
		}
		// Caso o usuário peça um novo envio de email de confirmação.
		elseif($segment == 'resend')
		{
			if($this->session->flashdata('accResend'))
			{
				$u = new account_model();
				$u->where('id', $this->session->flashdata('accResend'))->get();
				
				// Email de confirmação só pode ser requerido de x em x tempo, essa configuração é através
				// do banco de dados, value newAccountTimeToResendEmailConfirm
				$calc = $this->ConfigsValue->getConfig('newAccountTimeToResendEmailConfirm') / 60;
				if($u->last_email_send <= time() - $this->ConfigsValue->getConfig('newAccountTimeToResendEmailConfirm'))
				{
					$u->hash_key = $u->_encryptHashKey();
					$u->last_email_send = time();
					$u->save();
					
					// Aqui será carregado todas as configurações do usuário
					$this->email_send->newEmail();
					$this->email_send->set->set_newline("\r\n");
					$this->email_send->set->from($this->config->item('mail_address'), $this->config->item('server_name'));
					$this->email_send->set->to($u->email); 
					$this->email_send->set->subject('Nova Conta - '.$this->config->item('server_name').'');

					// Será enviado BODY usando uma view existente
					// o parametro passado é a HASH_KEY, onde será usada na view.
					$param['hash_key'] = $u->hash_key;
					$this->email_send->useTemplateToMessage('templatewa/confirm_acc', $param);	
				
					// Alterado header para a função confirm()
					// Onde é mostrado a view informando que é necessario confirmar a conta
					if($this->email_send->send())
					{					
						$this->error->displayError('RESEND_EMAIL_CONFIRM_ACC', 'sucess');
					}
					else
					{
						$this->error->displayError('FATAL_ERROR');
					}
				}
				else
				{
					$this->error->displayError('NOT_RESEND_EMAIL_CONFIRM', 'error', 'ATT', 'error', array(''.$calc.' minutos'));
				}
			}
			self::login();
		}
		// Caso não tenha hash_key na URL é apenas carregado
		// a view que informa que é preciso confirmar account
		else
		{
			if($this->session->userdata('boxConfirm'))
			{
				$this->session->unset_userdata('boxConfirm');
				// Caso tenha ocorrido um erro no envio do email ao usuário
				// será informado na view que não foi possível enviar o email
				$this->load->view('check-acc', array('sucess' => $sucess));
			}
			self::login();
		}
	}

	public function _genRecoverKey()
	{
		$acceptedChars = 'ABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
		$max = strlen($acceptedChars) - 1;
		$new_rec_key = null;
		for ($i = 0; $i < 12; $i++) {
			$cnum[$i] = $acceptedChars{mt_rand(0, $max)};
			$new_rec_key .= $cnum[$i];
		}
		return $new_rec_key;
	}

	public function recoverkey()
	{	
		$data['type'] = null;
		$data['page'] = null;
		$this->account = modules::run('account/_needlogin');

		if (!$this->account->recoverkey ) 
		{
			$data['page'] = 'form';
			if($this->form_validation->run($this, 'Account/RecoverKey')) 
			{
				$data['page'] = 'show';
				$recoverkey = $this->_genRecoverKey();

				if($this->ConfigsValue->getConfig('generateRecoverkeyEmail'))
				{
					$data['type'] = 'email';
					/* New Email
					 *
					 * using template view
					 */		
					$this->email_send->newEmail();
					$this->email_send->set->set_newline("\r\n");
					$this->email_send->set->from($this->config->item('mail_address'), $this->config->item('server_name'));
					$this->email_send->set->to($this->account->email); 
					$this->email_send->set->subject('Recover Key - '.$this->config->item('server_name').'');	
				
					$this->email_send->set->message($this->lang->line('RECOVERKEY_TEXT_EMAIL_TEMPLATE', array($recoverkey, config_item('server_name'))));	
					$this->account->recoverkey = $recoverkey;
					if($this->email_send->send())
					{
						if($this->account->save())
						{
							$data['recoverkey'] = $this->account->recoverkey;
						}
						else
						{
							$this->error->displayError('FATAL_ERROR');
						}	

						$this->error->displayError('SUCESS_GENERAT_RECOVERKEY', 'sucess');
					}
					else
					{
						$this->error->displayError('FATAL_ERROR');
					}
				}
				else
				{
					$data['type'] = 'show';
					
					$this->account->recoverkey = $recoverkey;

					if($this->account->save())
					{
						$data['recoverkey'] = $this->account->recoverkey;
					}
					else
					{
						$this->error->displayError('FATAL_ERROR');
					}	
				}
			}
		}
		$this->load->view('account_recoverkey', $data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */