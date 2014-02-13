<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class count_info extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function widget()
	{
		$accounts = new accounts();
		$u = new configs_cache();
		$u->where('value1', modules::run('account/_needlogin')->id)->where('value2', 'last_view_admin_page')->get();

		if(!$u->value3)
		{
			$u->value1 = modules::run('account/_needlogin')->id;
			$u->value2 = 'last_view_admin_page';
			$u->value3 = time();
			$u->save();

		}	
		$data['totalAccount'] = $accounts->count();
		$data['totalNewAccount'] = $accounts->where('create_date >', $u->value3)->count();
		$data['totalPremmyAccount'] = $accounts->where('premdays >', '1')->count();

		// ERRO ?
		$u->update('value3', time());
		
		
		$this->load->view('widgets/count_info', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */