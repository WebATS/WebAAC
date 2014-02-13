<?php
/**
 * Project:     WebATS Manager
 * File:        Template.class.php
 * SVN:         $Id: $
 */
class email_send extends CI_Controller {

	protected $_ci;
	public $mail_type;
	private $_types_accept = array('mail', 'sendmail', 'smtp');
	public $mail_port;
	public $mail_host;
	public $smtp_timeout;
	
	public $mail_address;
	public $mail_user;
	public $mail_pass;
	protected $_localError = FALSE;
	
	public function __construct() 
	{
		$this->_ci =& get_instance();
		$this->_ci->load->helper('email');
		$this->configDB = $this->_ci->load->library('ConfigsValue');
		$this->set = $this->_ci->load->library('email');
	}

	public function setConfigs()
	{
		// Lendo configura��o do arquivo config.php
		// Caso a configura��o n�o exista ou esteja sem valor
		// � buscado a mesma configura��o no banco de dados
		// Caso seja encontrado essa configura��o no banco de dados � setada
		// Caso n�o � retornado erro, e o email n�o � enviado.
		if(empty($this->mail_type))
		{
			$this->mail_type = $this->_ci->config->item('mail_type');
		}
		if(empty($this->mail_type))
		{
			// Busca no tabela a configura��o mail_address
			if($this->configDB->getConfig('mail_type', FALSE) === FALSE)
			{
				// Caso a configura��o n�o seja encontrado no arquivo config.php
				// ou no banco de dados, � mostrado um erro e o email n�o � enviado.
				
				//show_error('config::mail_type n�o configurada');
				$this->_localError = TRUE;
				$this->_ci->error->displayError('ERROR_EMAIL_SEND_INVALID_CONFIG', 'error', 'ATT', 'error', array('mail_type'));
				log_message('error', "[ Library Email Send ] FATAL ERROR: Configura��o mail_type n�o encontrada.");
			}
			else
			{
				// Caso a configura��o seja encontrada no banco de dados, o valor � armazenado.
				$this->mail_type = $this->configDB->getConfig('mail_port');
			}
		}
		// Verifica se o protocolo configurado pelo administrador � correto
		// conforme a lista pr� definida no $this->_types_accept
		if (!in_array($this->mail_type, $this->_types_accept) and !$this->_localError) 
		{ 
				$this->_localError = TRUE;	
				$this->_ci->error->displayError('ERROR_EMAIL_SEND_INVALID_CONFIG', 'error', 'ATT', 'error', array('mail_type'));
				log_message('error', "[ Library Email Send ] FATAL ERROR: Configura��o mail_type inv�lida.");
		}	
				
		
		// Captura configura��es do arquivo config.php
		// Caso a configura��o n�o exista ou esteja sem valor
		// � buscado a mesma configura��o no banco de dados
		// Caso seja encontrado essa configura��o no banco de dados � setada
		// Caso n�o � retornado erro, e o email n�o � enviado.
		if(empty($this->mail_port))
		{
			$this->mail_port = $this->_ci->config->item('mail_port');
		}
		if(empty($this->mail_port))
		{
			if($this->configDB->getConfig('mail_port', FALSE) === FALSE)
			{
				// Caso a configura��o n�o seja encontrado no arquivo config.php
				// ou no banco de dados, � mostrado um erro e o email n�o � enviado.
				
				//show_error('config::mail_type n�o configurada');
				$this->_localError = TRUE;
				$this->_ci->error->displayError('ERROR_EMAIL_SEND_INVALID_CONFIG', 'error', 'ATT', 'error', array('mail_port'));
				log_message('error', "[ Library Email Send ] FATAL ERROR: Configura��o mail_port n�o encontrada.");
			}
			else
			{
				// Caso a configura��o seja encontrada no banco de dados, o valor � armazenado.
				$this->mail_port = $this->configDB->getConfig('mail_port');
			}
		}
		
		// Lendo configura��o do arquivo config.php
		// Caso a configura��o n�o exista ou esteja sem valor
		// � buscado a mesma configura��o no banco de dados
		// Caso seja encontrado essa configura��o no banco de dados � setada
		// Caso n�o � retornado erro, e o email n�o � enviado.
		if(empty($this->mail_host))
		{
			$this->mail_host = $this->_ci->config->item('mail_host');
		}
		if(empty($this->mail_host))
		{
			if($this->configDB->getConfig('mail_host', FALSE) === FALSE)
			{
				// Caso a configura��o n�o seja encontrado no arquivo config.php
				// ou no banco de dados, � mostrado um erro e o email n�o � enviado.
				
				//show_error('config::mail_type n�o configurada');
				$this->_localError = TRUE;
				$this->_ci->error->displayError('ERROR_EMAIL_SEND_INVALID_CONFIG', 'error', 'ATT', 'error', array('mail_host'));
				log_message('error', "[ Library Email Send ] FATAL ERROR: Configura��o mail_host n�o encontrada.");
			}
			else
			{
				// Caso a configura��o seja encontrada no banco de dados, o valor � armazenado.
				$this->mail_host = $this->configDB->getConfig('mail_port');
			}
		}
		
		// Lendo configura��o do arquivo config.php
		// Caso a configura��o n�o exista ou esteja sem valor
		// � buscado a mesma configura��o no banco de dados
		// Caso seja encontrado essa configura��o no banco de dados � setada
		// Caso n�o � retornado erro, e o email n�o � enviado.
		if(empty($this->mail_address))
		{
			$this->mail_address = $this->_ci->config->item('mail_address');
		}
		if(empty($this->mail_address))
		{
			// Busca no tabela a configura��o mail_address
			if($this->configDB->getConfig('mail_address', FALSE) === FALSE)
			{
				// Caso a configura��o n�o seja encontrado no arquivo config.php
				// ou no banco de dados, � mostrado um erro e o email n�o � enviado.
				
				//show_error('config::mail_type n�o configurada');
				$this->_localError = TRUE;
				$this->_ci->error->displayError('ERROR_EMAIL_SEND_INVALID_CONFIG', 'error', 'ATT', 'error', array('mail_address'));
				log_message('error', "[ Library Email Send ] FATAL ERROR: Configura��o mail_address n�o encontrada.");
			}
			else
			{
				// Caso a configura��o seja encontrada no banco de dados, o valor � armazenado.
				$this->mail_address = $this->configDB->getConfig('mail_address');
			}
		}
		
		if(!valid_email($this->mail_address))
		{
			$this->_localError = TRUE;
			$this->_ci->error->displayError('ERROR_EMAIL_SEND_INVALID_CONFIG', 'error', 'ATT', 'error', array('mail_address'));
			log_message('error', "[ Library Email Send ] FATAL ERROR: mail_address inv�lido.");
		}
		
		if(empty($this->mail_user))
		{
			$this->mail_user = $this->_ci->config->item('mail_user');
		}
		if(empty($this->mail_user)){
			// Busca no tabela a configura��o mail_address
			if($this->configDB->getConfig('mail_user', FALSE) === FALSE)
			{
				// Caso a configura��o n�o seja encontrado no arquivo config.php
				// ou no banco de dados, � mostrado um erro e o email n�o � enviado.
				
				//show_error('config::mail_type n�o configurada');
				$this->_localError = TRUE;
				$this->_ci->error->displayError('ERROR_EMAIL_SEND_INVALID_CONFIG', 'error', 'ATT', 'error', array('mail_user'));
				log_message('error', "[ Library Email Send ] FATAL ERROR: Configura��o mail_user n�o encontrada.");
			}
			else
			{
				// Caso a configura��o seja encontrada no banco de dados, o valor � armazenado.
				$this->mail_address = $this->configDB->getConfig('mail_user');
			}
		}
		
		if(empty($this->mail_pass))
		{
			$this->mail_pass = $this->_ci->config->item('mail_pass');
		}
		if(empty($this->mail_pass)){
			// Busca no tabela a configura��o mail_address
			if($this->configDB->getConfig('mail_pass', FALSE) === FALSE)
			{
				// Caso a configura��o n�o seja encontrado no arquivo config.php
				// ou no banco de dados, � mostrado um erro e o email n�o � enviado.
				
				//show_error('config::mail_type n�o configurada');
				$this->_localError = TRUE;
				$this->_ci->error->displayError('ERROR_EMAIL_SEND_INVALID_CONFIG', 'error', 'ATT', 'error', array('mail_pass'));
				log_message('error', "[ Library Email Send ] FATAL ERROR: Configura��o mail_pass n�o encontrada.");
			}
			else
			{
				// Caso a configura��o seja encontrada no banco de dados, o valor � armazenado.
				$this->mail_address = $this->configDB->getConfig('mail_pass');
			}
		}
		
		if($this->_localError === FALSE)
		{
			// Definindo configura��es personalizadas pelo usu�rio
			$config['protocol'] = $this->mail_type;
			$config['priority'] = '1';
			$config['mailtype'] = 'html';
			$config['charset'] = 'utf-8';
			if($this->mail_type == 'smtp')
			{
				$config['smtp_host'] = $this->mail_host;
				$config['smtp_port'] = $this->mail_port;
				$config['smtp_user'] = $this->mail_user;
				$config['smtp_pass'] = $this->mail_pass;
				if(!empty($this->smtp_timeout))
					$config['smtp_timeout'] = $this->smtp_timeout;
			}
			
			// Repassando essas configura��es para Email library do CodeIgniter
			$this->set->initialize($config);
		}
	
	}
	public function newEmail()
	{
		// Chamando as configura��es e caso alguma configura��o seja inv�lida
		// ser� retornado um erro e o script barrado
		self::setConfigs();
	}
	
	public function useTemplateToMessage($template, $param)
	{
		// Caso o usuario queira enviar um email usando um template
		// basta ele chamar useTemplateToMessage('nomedaview', $parametros)
		//
		// Obs: Todas views para email devem terminar com _email_template em seu nome
		// mas para chama-la atrav�s do useTemplateToMessage n�o precisa colocar _email_template
		//
		// ...useTemplateToMessage('templatewa/create_acc', $param);
		// file: templatewa/create_acc_email_template.php
		$template = $template.'_email_template';
		if($this->_ci->load->Check_View($template)){
			$this->set->message($this->_ci->load->view($template, $param, TRUE));	
		}
		else
		{
			// Caso o template que usu�rio definiu para enviar email n�o seja encontrado
			// � retornado um erro e barrado envio do email!
			$this->_ci->error->displayError('ERROR_EMAIL_SEND_INVALID_TEMPLATE', 'error', 'ATT', 'error', array($template));
			$this->_localError = TRUE;
		}
	}
	
	public function send()
	{
		if($this->_localError === FALSE)
		{
			$send = $this->set->send();
			if($send){
				return TRUE;
			}
			log_message('error', "[ Library Email Send ] FATAL ERROR: N�o foi poss�vel estabelecer uma conex�o com seu provedor de email.");
			return FALSE;
		}
	}
}

?>