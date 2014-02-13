<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class featuredarticle extends MX_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'date', 'html'));
		$this->ConfigsValue = $this->load->library('ConfigsValue');
	}


	public function _index()
	{
		if($this->uri->segment(1) == 'news' or $this->uri->segment(1) == '')
		{
			$this->load->view('featuredarticle');
		}
	}

}

/* End of file newsticker.php */
/* Location: ./application/modules/news/controllers/newsticker.php */

?>