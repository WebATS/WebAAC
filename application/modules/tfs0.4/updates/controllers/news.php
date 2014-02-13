<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News extends MX_Controller {

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
		$this->load->config('tumblr_configs');
		$this->load->helper('avatar/parse_post', 'date');
	}
	public function Index()
	{
		error_reporting(0);
		$username = $this->config->item('user_tumblr');
		$feed_filename = $this->config->item('folder_cache')."/$username.rss";

		$use_cache = true;

		if ($this->config->item('use_cache') && file_exists($feed_filename) && (time() - filemtime($feed_filename) < $this->config->item('time_expiration_cache'))) 
		{
		  $tumblr_data = file_get_contents($feed_filename);
		} 
		else 
		{
		  # stop anyone else from trying to update this right now
		  # but only if they would get an outdated feed in return
		  # (rather than a blank file)
		  if (file_exists($feed_filename)) touch($feed_filename);
		  
		  $domain = "http://$username.tumblr.com";
		  $api_url = '/api/read/json?num=30&debug=true';
		  
		  $fhandle = fopen("{$domain}{$api_url}", 'rb');
		  fread($fhandle, 1);
		   $tumblr_data = '{'; 
		  
		  while (!feof($fhandle)) 
		  {
		    $tumblr_data .= fread($fhandle, 8192);
		  }

		 fclose($fhandle);
		 file_put_contents($feed_filename, $tumblr_data);  
		}

		 $tumblr_data = json_decode($tumblr_data);
		 $data['news'] = $tumblr_data->posts;
		 $this->load->view('news_page', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */