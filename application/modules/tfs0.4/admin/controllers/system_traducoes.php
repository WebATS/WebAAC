<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class system_traducoes extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->account = modules::run('account/_needlogin', TRUE, '1');
		$this->load->helper(array('date', 'text'));
	}

	
	public function _check_password($password)
	{
		if(modules::run('account/_check_account_pass', $password))
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('_check_password', 'Senha incorreta!');
			return FALSE;
		}
	}
	public function index()
	{
		$langs = new langs();
				

		if ($this->input->post('submitNewTradu')) 
		{
			$this->form_validation->set_rules('newTraduVariavel', 'newTraduVariavel', 'required');
			$this->form_validation->set_rules('newTraduSistema', 'newTraduSistema', 'required');
			if ($this->form_validation->run($this)) 
			{
				$query = $this->db->get('web_ats_langs');
				foreach ($query->result() as $key) 
				{
					if ($this->input->post('newTraduTradu'.$key->lang_prefix.'')) 
					{
						$data = array(
						   'lang' => $key->lang_prefix,
						   'variavel' => $this->input->post('newTraduVariavel'),
						   'sistema' => $this->input->post('newTraduSistema'),
						   'tradu' => $this->input->post('newTraduTradu'.$key->lang_prefix.'')
						);
						$this->db->insert('web_ats_traducoes', $data);
					}	
				}

				$this->error->displayError(array('body' => 'Tradução adicionada com sucesso', 'type' => 'sucess', 'template' => 'error_admin'));
			}
			else
			{
				$this->error->displayError(array('body' => '<p>'.validation_errors(), 'template' => 'error_admin'));
			}
		}

		if($this->input->post('submitDeleteTradu'))
		{
			$this->form_validation->set_rules('lang_variavel', 'lang_variavel', 'required');
			$this->form_validation->set_rules('ConfirmPassword', 'password', 'required|callback__check_password');
			if ($this->form_validation->run($this)) 
			{
				if (!in_array('all', $this->input->post('selectd_lang'))) 
				{
					foreach ($this->input->post('selectd_lang') as $key) 
					{
						$this->db->delete('web_ats_traducoes', array('variavel' => $this->input->post('lang_variavel'), 'lang' => $key)); 
					}
					$this->error->displayError(array('body' => 'Tradução selecionada foi deletada com sucesso!', 'type' => 'sucess', 'template' => 'error_admin'));
				}
				else
				{
					$this->db->delete('web_ats_traducoes', array('variavel' => $this->input->post('lang_variavel')));
					$this->error->displayError(array('body' => 'Tradução selecionada foi deletada com sucesso!', 'type' => 'sucess', 'template' => 'error_admin'));

				}
				
			}
		}

		$query = $this->db->query(
			"SELECT DISTINCT sistema FROM(
				( SELECT sistema FROM web_ats_traducoes )

				union (SELECT CONCAT(categoria,'/',nome) AS sistema FROM web_modulos)
				 
				union (SELECT CONCAT(link_href) AS sistema FROM web_ats_menu_links)

				union (SELECT CONCAT(nome) AS sistema FROM web_ats_protect_pages)
			) AS tabela"
		);
		$data['all_sistemas'] = $query->result();

		if($this->input->post('submitDeleteLang'))
		{
			$this->form_validation->set_rules('lang_id', 'lang_id', 'required|numeric');
			$this->form_validation->set_rules('ConfirmPassword', 'password', 'required|callback__check_password');
			if ($this->form_validation->run($this)) 
			{
				$langs->where('id', $this->input->post('lang_id'))->get();
				if($langs->delete())
				{
					$this->error->displayError(array('body' => 'Idioma deletado com sucesso!', 'type' => 'sucess', 'template' => 'error_admin'));
				}
				else
				{				
					$this->error->displayError(array('body' => 'Ocorreu um erro ao processar sua solicitação, tente novamente.', 'template' => 'error_admin'));
				}
				
			}
		}
		if($this->input->get('reload_id'))
		{
			$langs->where('id', $this->input->get('reload_id'));
			$langs->get();
			$langs->cache_time = FALSE;
			$langs->save();
			redirect('admin/system/traducoes');
		}
		if($this->input->get('desative_id'))
		{
			$langs->where('id', $this->input->get('desative_id'));
			$langs->get();
			$langs->ativado = FALSE;
			$langs->save();
			redirect('admin/system/traducoes');
		}
		if($this->input->get('ative_id'))
		{
			$langs->where('id', $this->input->get('ative_id'));
			$langs->get();
			$langs->ativado = TRUE;
			$langs->save();
			redirect('admin/system/traducoes');
		}
		if ($this->input->post('submitEditLang')) 
		{
			$langs->where('id', $this->input->post('lang_id'));
			$result = $langs->get();
			if ($result->id) 
			{
				$result->nome = $this->input->post('editLangIdioma');
				$result->lang_prefix = $this->input->post('editLangPrefix');
				if (!$result->save()) 
				{
					$this->error->displayError(array('body' => 'Erro ao salvar!', 'template' => 'error_admin'));

				}
			}
			else
			{
				$this->error->displayError(array('body' => 'Erro ao salvar!', 'template' => 'error_admin'));
			}
		}

		if ($this->input->post('submitNewLang')) 
		{
			$this->form_validation->set_rules('NewLangIdioma', 'Idioma', 'required');
			$this->form_validation->set_rules('NewLangPrefix', 'Prefix', 'required');
			if ($this->form_validation->run($this)) 
			{
				$langs->nome = $this->input->post('NewLangIdioma');
				$langs->lang_prefix = $this->input->post('NewLangPrefix');
				$langs->ativado = FALSE;
				if ($langs->save()) 
				{
					$this->error->displayError(array('body' => 'Novo idioma foi salvo!', 'type' => 'sucess', 'template' => 'error_admin'));
				}
				else
				{
					$this->error->displayError(array('body' => 'Ocorreu um erro ao processar sua solicitação, tente novamente.', 'template' => 'error_admin'));
				}
			}
			else
			{
				$this->error->displayError(array('body' => 'Ocorreu um erro ao processar sua solicitação, tente novamente.', 'template' => 'error_admin'));
			}
		}

		$result_count = $langs->get();

		foreach ($result_count as $key) 
		{
			$count_traducoes = $this->db->where('lang', $key->lang_prefix)->count_all_results('web_ats_traducoes');
			$data['count'][$key->lang_prefix] = $count_traducoes;
		}

		$data['datestring'] = "%h:%i:%s";
		if($this->input->get('list_lang'))
		{
			$this->db->where('lang', $this->input->get('list_lang'));
		}
		$result = $langs->get();
		$data['list'] = $result;
		$query = $this->db->get('web_ats_traducoes');
		$data['list_traducoes'] = $query->result(); ;
		$this->load->view('system_traducoes', $data);
	}
}