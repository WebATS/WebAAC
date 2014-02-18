<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class page extends MX_Controller
{
	function __construct()
	{
		parent::__construct();
	}


	public function view()
	{
		$page = $this->uri->segment(3);

		if($this->load->Check_View($page))
		{
			$this->load->view($page);
		}
		elseif($page)
		{
			$this->error->displayError(array('template' => 'error_page_invalid'));
		}
	}

}

/* End of file newsticker.php */
/* Location: ./application/modules/news/controllers/newsticker.php */

?>