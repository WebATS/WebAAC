<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Downloads extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->downloads = new downloads_model();
		$this->load->helper(array('url', 'date', 'html', 'download'));
		$this->ConfigsValue = $this->load->library('ConfigsValue');
	}
	
	public function get()
	{
		if ($this->uri->segment('3')) 
		{
			
				$this->downloads->where('id', $this->uri->segment('3'));
				$this->downloads->where('ativado', TRUE);
				$file = $this->downloads->get();
				if($file->id)
				{
					if($this->session->userdata('last_down') < time())
					{
						$file->count = $file->count+1;
						$file->save();
						if(!$file->link_href)
						{
							$this->session->set_userdata('last_down', time()+60);
							$name_file = $file->file_name;
							$image_path = APPPATH.'cache/files/'.$name_file;
							header('Content-Type: application/octet-stream');
							header("Content-Disposition: attachment; filename=$name_file");
							ob_clean();
							flush();
							readfile($image_path);
						}
						else
						{
							redirect($file->link_href);
						}			
					}
					else
					{
						$this->error->displayError('Aguarde 60 segundos para efetuar novamente o download!', 'info');
						self::index();
					}
				}
				else
				{
					$this->error->displayError('Download não encontrado em nosso banco de dados!');
					self::index();
				}			
		}
	}	
	public function index()
	{
		$this->downloads->where('ativado', TRUE);
		$data['list'] = $this->downloads->get();
		$this->load->view('downloads_index', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */