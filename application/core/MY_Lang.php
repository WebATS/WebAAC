<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// ------------------------------------------------------------------------

/**
 * Language Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Language
 * @author		WebATS Manager
 * @link		http://webats.com.br/guide/language-class
 */
class MY_Lang extends CI_Lang {

	/**
	 * List of translations
	 *
	 * @var array
	 */
	var $language	= array();
	/**
	 * List of loaded language files
	 *
	 * @var array
	 */
	var $is_loaded	= array();

	/**
	 * Constructor
	 *
	 * @access	public
	 */
	function __construct()
	{
		log_message('debug', "[ Core MY Lang ] Language Class Initialized");
	}
	
	// --------------------------------------------------------------------

	/**
	 * Load a language file
	 *
	 * @access	public
	 * @param	mixed	the name of the language file to be loaded. Can be an array
	 * @param	string	the language (english, etc.)
	 * @param	bool	return loaded array of translations
	 * @param 	bool	add suffix to $langfile
	 * @param 	string	alternative path to look for language file
	 * @return	mixed
	 */
	function load($langfile = '', $idiom = '', $return = FALSE, $add_suffix = TRUE, $alt_path = '')
	{
		$langfile = str_replace('.php', '', $langfile);

		if ($add_suffix == TRUE)
		{
			$langfile = str_replace('_lang.', '', $langfile).'_lang';
		}

		$langfile .= '.php';

		if (in_array($langfile, $this->is_loaded, TRUE))
		{
			return;
		}

		$config =& get_config();
		
		$CI = &get_instance();
		if($idiom){
			$CI->load->library('session');
			$OpSession = $CI->session->userdata('lang_select');
			if(!$OpSession)
			{
				$OpSession = $config['language'];
			}
			$query = $CI->db->get_where('web_ats_langs', array('lang_prefix'=> $OpSession));
			$row = $query->result_array();
			if($query->num_rows())
			{
				$idiom = $row[0]['lang_prefix'];
				if(time() >= $row[0]['cache_time'] or !file_exists(APPPATH.$alt_path.'language/'.$idiom.'/'.$langfile))
				{
					$query = $CI->db->get_where('web_ats_traducoes', array('lang'=> $idiom));	
					if($query->num_rows())
					{
						$content = "<?php \n";
						foreach($query->result_array() as $row)
						{
								$content .= "\$lang['$row[variavel]']	= '$row[tradu]'; \n";
						}
						$content .= '?>';
						if(!is_dir(APPPATH.$alt_path.'language/'.$idiom.''))
						{
							mkdir(APPPATH.$alt_path.'language/'.$idiom.'', DIR_WRITE_MODE, true);
						}
						if(!write_file(APPPATH.$alt_path.'language/'.$idiom.'/'.$langfile, $content, FOPEN_WRITE_CREATE_DESTRUCTIVE))
						{
							log_message('error', "[ CORE MY_Lang ] Não foi possível atualizar arquivo de language $idiom/$langfile");
							show_error("Não foi possível atualizar arquivo de language $idiom/$langfile.");
						}
						else
						{
							log_message('debug', "[ CORE MY_Lang ] Arquivo language $idiom/$langfile atualizado.");
							$data = array(
								'cache_time' => time()+$config['cache_language']
							);
							 $CI->db->where('lang_prefix', $idiom);
							 $CI->db->update('web_ats_langs', $data); 
						 }
					}
				}
			}
			else
			{
				$deft_lang = $config['language'];
				$idiom = ($deft_lang == '') ? 'english' : $deft_lang;
			}
		}
		else
		{
			$deft_lang = $config['language'];
			$idiom = (!$deft_lang) ? 'english' : $deft_lang;
		}
		// Determine where the language file is and load it
		if ($alt_path != '' && file_exists($alt_path.'language/'.$idiom.'/'.$langfile))
		{
			include($alt_path.'language/'.$idiom.'/'.$langfile);
		}
		else
		{
			$found = FALSE;

			foreach (get_instance()->load->get_package_paths(TRUE) as $package_path)
			{
				if (file_exists($package_path.'language/'.$idiom.'/'.$langfile))
				{
					include($package_path.'language/'.$idiom.'/'.$langfile);
					$found = TRUE;
					break;
				}
			}

			if ($found !== TRUE)
			{
				show_error('Unable to load the requested language file: language/'.$idiom.'/'.$langfile);
			}
		}


		if ( ! isset($lang))
		{
			log_message('error', '[ Core Lang ] Language file contains no data: language/'.$idiom.'/'.$langfile);
			return;
		}

		if ($return == TRUE)
		{
			return $lang;
		}
		
		$this->is_loaded[] = $langfile;
		$this->language = array_merge($this->language, $lang);
		unset($lang);

		log_message('debug', '[ Core Lang ] Language file loaded: language/'.$idiom.'/'.$langfile);
		return TRUE;
	}
	function printf_array($format, $arr) 
	{ 
	    return call_user_func_array('sprintf', array_merge((array)$format, $arr)); 
	} 
	function line($line = '', $sprintf=FALSE)
	{

		$value = ($line == '' OR ! isset($this->language[$line])) ? FALSE : $this->language[$line];
		
		// Because killer robots like unicorns!
		if ($value === FALSE)
		{
			$value = $line;
			log_message('info', '[ Core Lang ] Could not find the language line "'.$line.'"');
		}

		if($sprintf)
		{
			return $this->printf_array($value, $sprintf);
		}
		
		return $value;
	}

}
// END Language Class

/* End of file MY_Lang.php */
/* Location: ./system/core/MY_Lang.php */
