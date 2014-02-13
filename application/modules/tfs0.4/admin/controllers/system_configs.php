<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class system_configs extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('text');
		$this->load->helper('date');
	}

	public function index()
	{
		if ($this->input->post('submitEditConfig')) 
		{
			$this->form_validation->set_rules('configName', 'Configuração', 'required');
			$this->form_validation->set_rules('configValue', 'Valor', 'required');
			$this->form_validation->set_rules('configSistema', 'Sistema', 'required');
			$this->form_validation->set_message('required', 'Campo <b>%s</b> fico em branco!');
			if($this->form_validation->run($this) == TRUE)
			{
				$data = array(
	               'config' => $this->input->post('configName'),
	               'value' => $this->input->post('configValue'),
	               'time' => time(),
	               'coment' => $this->input->post('configComent'),
	               'sistema' => $this->input->post('configSistema')
            	);

				$this->db->where('id', $this->input->post('config_id'));
				$this->db->update('web_ats_configs', $data); 
				$this->error->displayError(array('body' => 'Sua configuração foi alterada com sucesso!', 'type' => 'sucess', 'template' => 'error_admin'));
			}
			else
			{
				$this->error->displayError('<p>'.validation_errors());
			}
		}
		if ($this->input->post('submitNewConfig')) 
		{
			$this->form_validation->set_rules('newConfigName', 'Configuração', 'required');
			$this->form_validation->set_rules('newConfigValue', 'Valor', 'required');
			$this->form_validation->set_rules('newConfigSistema', 'Sistema', 'required');
			$this->form_validation->set_message('required', 'Campo <b>%s</b> fico em branco!');
			if($this->form_validation->run($this) == TRUE)
			{
				$data = array(
	               'config' => $this->input->post('newConfigName'),
	               'value' => $this->input->post('newConfigValue'),
	               'time' => time(),
	               'coment' => $this->input->post('newConfigComent'),
	               'sistema' => $this->input->post('newConfigSistema')
            	);
				$this->db->insert('web_ats_configs', $data);
				$this->error->displayError(array('body' => 'Sua configuração foi alterada com sucesso!', 'type' => 'sucess', 'template' => 'error_admin'));
			}
			else
			{
				
			}
		}
		$query = $this->db->get('web_ats_configs');
		$data['list'] = $query->result(); 
		$data['datestring'] = "%d/%m/%Y - %h:%i %a";
		$this->load->view('system_configs', $data);
	}

	public function backup()
	{
		$u = new configs_cache();
		// Load the DB utility class
		$this->load->dbutil();
		if($this->input->post('tables'))
		{
			if(in_array('all', $this->input->post('tables')))
			{
				$array_tables = $this->db->list_tables();
			}
			else
			{
				$array_tables = $this->input->post('tables');
			}

			if ($this->input->post('optionsRadios') == 'backup') 
			{
				$u->get();
				$u->value1 = modules::run('account/_needlogin')->id;
				$u->value2 = 'backup_db';
				$u->value3 = time();
				$u->value4 = json_encode($array_tables);
				$u->save();

				$prefs = array(
	                'tables'      => $array_tables,  // Array of tables to backup.
	                'ignore'      => array(),           // List of tables to omit from the backup
	                'format'      => 'zip',             // gzip, zip, txt
	                'filename'    => 'mybackup.sql',    // File name - NEEDED ONLY WITH ZIP FILES
	                'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
	                'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
	                'newline'     => "\n"               // Newline character used in backup file
	          	);

				// Backup your entire database and assign it to a variable
				$backup =& $this->dbutil->backup($prefs); 

				// Load the file helper and write the file to your server
				$this->load->helper('file');
				write_file('application/cache/backups/backup_'.time().'.zip', $backup); 

				// Load the download helper and send the file to your desktop
				//$this->load->helper('download');
				//force_download('backup_'.time().'.zip', $backup);				
			
				$this->error->displayError(array('body' => 'Foi gerado o backup com sucesso!', 'type' => 'sucess', 'template' => 'error_admin'));
			}
			elseif($this->input->post('optionsRadios') == 'repair')
			{
				foreach ($array_tables as $key ) 
				{
					if ($this->dbutil->repair_table($key))
					{
					   $success = true;
					}
					else
					{
						$this->error->displayError(array('body' => 'Não foi possível reparar a tabela '.$key.'', 'template' => 'error_admin'));
					}
				}

				if($success)
				{
					$this->error->displayError(array('body' => 'Suas tabelas foram reparadas!', 'type' => 'sucess', 'template' => 'error_admin'));
				}
				
			}
			elseif($this->input->post('optionsRadios') == 'optimize')
			{
				foreach ($array_tables as $key ) 
				{
					if ($this->dbutil->optimize_table($key))
					{
					   $success = true;
					}
					else
					{
						$this->error->displayError(array('body' => 'Não foi possível reparar a tabela '.$key.'', 'template' => 'error_admin'));
					}
				}

				if($success)
				{
					$this->error->displayError(array('body' => 'Suas tabelas foram optmizadas!', 'type' => 'sucess', 'template' => 'error_admin'));
				}
			}
		}

		$u->where('value2', 'backup_db');
		$result = $u->get();

		$data['list_backups'] = $result;
		$data['datestring'] = "%d/%m/%Y - %h:%i %a";
		$this->load->view('system_configs_backup', $data);
	}
}