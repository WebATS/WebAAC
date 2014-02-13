<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/
// Carregando library configurações do banco de dados.
$this->ConfigsValue = $this->load->library('ConfigsValue');
$config = array(
		'Account/Create' => array(
					array(
							'field' => 'accountName',
							'label' => 'Account Name',
							'rules' => 'required|min_length[5]|max_length[12]|is_unique[accounts.name]|alpha_numeric|callback__filter_account_name'
						 ),
					array(
							'field' => 'email',
							'label' => 'Email',
							'rules' => 'required|valid_email|is_unique[accounts.email]'
						 ),
					 array(
						'field' => 'recaptcha_response_field',
						'label' => 'reCaptca',
						'rules' => 'callback__checkCaptcha'
					 ),
					 array(
						'field' => 'accountPassword',
						'label' => 'Password',
						'rules' => 'required|min_length[5]|max_length[25]|matches[accountConfPassword]'
					 ),
					 array(
						'field' => 'accountConfPassword',
						'label' => 'Confirmação Password',
						'rules' => 'required|min_length[5]|max_length[25]'
					 ),
				array(
						'field' => 'agreeagreements',
						'label' => 'Account Name',
						'rules' => 'required'
					 ),
				array(
						'field' => 'accountPrivateKey',
						'label' => 'PrivateKey',
						'rules' => 'min_length[1]|alpha_numeric|callback__checkPrivateKey'
					 ),
				array(
						'field' => 'lang',
						'label' => 'Idioma',
						'rules' => 'required|min_length[1]|numeric|callback__filter_lang'
					 ),
					),
		'Account/Login' => array(
					array(
							'field' => 'name',
							'label' => 'Account Name',
							'rules' => 'required|min_length[5]'
						 ),
					array(
							'field' => 'password',
							'label' => 'Password',
							'rules' => 'required|min_length[5]'
						 )
			),
		'Account/RecoveryKey' => array(
					array(
							'field' => 'recoverykey',
							'label' => 'Recovery Key',
							'rules' => 'required|min_length[5]'
						 ),
			),
		'Account/NewLostPass' => array(
					array(
							'field' => 'conf_new_pass',
							'label' => 'Confirm Password',
							'rules' => 'min_length[5]|max_length[25]'
						 ),
					array(
							'field' => 'new_pass',
							'label' => 'Password',
							'rules' => 'required|min_length[5]|max_length[25]|matches[conf_new_pass]'
						 ),

			),
		'Account/NewPass' => array(
					array(
							'field' => 'old_pass',
							'label' => 'Old Password',
							'rules' => 'required|min_length[5]|max_length[25]|callback__check_account_pass'
						 ),
					array(
							'field' => 'conf_new_pass',
							'label' => 'Confirm Password',
							'rules' => 'required|min_length[5]|max_length[25]'
						 ),
					array(
							'field' => 'new_pass',
							'label' => 'Password',
							'rules' => 'required|min_length[5]|max_length[25]|matches[conf_new_pass]'
						 ),

			),
		'Account/RecoverKey' => array(
					array(
							'field' => 'password',
							'label' => 'Password',
							'rules' => 'required|min_length[5]|callback__check_account_pass'
						 ),
			),
		'Player/Edit' => array(
					array(
							'field' => 'player-comment',
							'label' => 'Comentário',
							'rules' => 'max_length['.$this->ConfigsValue->getConfig('limitCaractersPlayerComment').']'
						 ),
			),
		'Player/Create' => array(
					array(
							'field' => 'playerName',
							'label' => 'Nome Player',
							'rules' => 'required|min_length[3]|max_length[23]||is_unique[players.name]|callback__check_new_player'
						 ),
					array(
							'field' => 'playerSex',
							'label' => 'Sex',
							'rules' => 'required|is_numeric|callback__checkSex'
						 ),
					array(
							'field' => 'playerVocation',
							'label' => 'Vocation',
							'rules' => 'required|is_numeric|callback__checkVoc'
						 ),
					array(
							'field' => 'playerCity',
							'label' => 'City',
							'rules' => 'required|is_numeric|callback__checkCity'
						 ),					
			)
	);

/* End of file hooks.php */
/* Location: ./application/config/hooks.php */