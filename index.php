<?php
// Gostamos de bacon.
ob_start();
date_default_timezone_set('America/Sao_Paulo');
/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     testing
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 */
	define('ENVIRONMENT', 'development');
/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */
if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'development':
			error_reporting(E_ALL);
			ini_set('display_errors', '1');
		break;
	
		case 'testing':
		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}
}

/*
 *---------------------------------------------------------------
 * SYSTEM FOLDER NAME
 *---------------------------------------------------------------
 *
 * This variable must contain the name of your "system" folder.
 * Include the path if the folder is not in the same  directory
 * as this file.
 *
 */
	$system_path = 'system';

/*
 *---------------------------------------------------------------
 * APPLICATION FOLDER NAME
 *---------------------------------------------------------------
 *
 * If you want this front controller to use a different "application"
 * folder then the default one you can set its name here. The folder
 * can also be renamed or relocated anywhere on your server.  If
 * you do, use a full server path. For more info please see the user guide:
 * http://codeigniter.com/user_guide/general/managing_apps.html
 *
 * NO TRAILING SLASH!
 *
 */
	$application_folder = 'application';

/*
 * --------------------------------------------------------------------
 * DEFAULT CONTROLLER
 * --------------------------------------------------------------------
 *
 * Normally you will set your default controller in the routes.php file.
 * You can, however, force a custom routing by hard-coding a
 * specific controller class/function here.  For most applications, you
 * WILL NOT set your routing here, but it's an option for those
 * special instances where you might want to override the standard
 * routing in a specific front controller that shares a common CI installation.
 *
 * IMPORTANT:  If you set the routing here, NO OTHER controller will be
 * callable. In essence, this preference limits your application to ONE
 * specific controller.  Leave the function name blank if you need
 * to call functions dynamically via the URI.
 *
 * Un-comment the $routing array below to use this feature
 *
 */
	// The directory name, relative to the "controllers" folder.  Leave blank
	// if your controller is not in a sub-folder within the "controllers" folder
	// $routing['directory'] = '';

	// The controller class file name.  Example:  Mycontroller
	// $routing['controller'] = '';

	// The controller function you wish to be called.
	// $routing['function']	= '';


/*
 * -------------------------------------------------------------------
 *  CUSTOM CONFIG VALUES
 * -------------------------------------------------------------------
 *
 * The $assign_to_config array below will be passed dynamically to the
 * config class when initialized. This allows you to set custom config
 * items or override any default config values found in the config.php file.
 * This can be handy as it permits you to share one application between
 * multiple front controller files, with each file containing different
 * config values.
 *
 * Un-comment the $assign_to_config array below to use this feature
 *
 */
	include('config.php');


// --------------------------------------------------------------------
// END OF USER CONFIGURABLE SETTINGS.  DO NOT EDIT BELOW THIS LINE
// --------------------------------------------------------------------

/*
 * ---------------------------------------------------------------
 *  Resolve the system path for increased reliability
 * ---------------------------------------------------------------
 */

	// Set the current directory correctly for CLI requests
	if (defined('STDIN'))
	{
		chdir(dirname(__FILE__));
	}

	if (realpath($system_path) !== FALSE)
	{
		$system_path = realpath($system_path).'/';
	}

	// ensure there's a trailing slash
	$system_path = rtrim($system_path, '/').'/';

	// Is the system path correct?
	if ( ! is_dir($system_path))
	{
		exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this: ".pathinfo(__FILE__, PATHINFO_BASENAME));
	}

/*
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */
	// The name of THIS file
	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	// The PHP file extension
	// this global constant is deprecated.
	define('EXT', '.php');
	
	// The SmartyTemplate file extension
	define('EXTTPL', '.tpl');

	// Path to the system folder
	define('BASEPATH', str_replace("\\", "/", $system_path));

	// Path to the front controller (this file)
	define('FCPATH', str_replace(SELF, '', __FILE__));

	// Name of the "system folder"
	define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));
	
	// Path Template
	define('TPLDIR', 'templates/');

	// Path Template
	define('TPLLAYOUTDIR', TPLDIR.$assign_to_config['layout'].'/');
	
	// Path Modules Views Custom
	define('TPLDIR_MDCUSTOM', TPLDIR.$assign_to_config['layout'].'/views_custom/');

	// The path to the "application" folder
	if (is_dir($application_folder))
	{
		define('APPPATH', $application_folder.'/');
	}
	else
	{
		if ( ! is_dir(BASEPATH.$application_folder.'/'))
		{
			exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: ".SELF);
		}

		define('APPPATH', BASEPATH.$application_folder.'/');
	}
	
/* --------------------------------------------------------------------
 * LOAD THE DATAMAPPER BOOTSTRAP FILE
 * --------------------------------------------------------------------
 */
require_once APPPATH.'third_party/datamapper/bootstrap.php';


/*
 * --------------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * --------------------------------------------------------------------
 *
 * And away we go...
 *
 */
	require_once BASEPATH.'core/CodeIgniter.php';
/*
 * --------------------------------------------------------------------
 * LOAD THE COMPOSER AUTOLOAD FILE
 * --------------------------------------------------------------------
 *
 */
	//require_once $application_folder . '/libraries/composer/autoload.php';
/* --------------------------------------------------------------------
 * LOAD THE TEMPLATE ENGINE
 * --------------------------------------------------------------------
 */
	// Path Template
	define('BASE_URL', base_url());
	
require_once(APPPATH.'/libraries/SmartyBC.class.php');
try{
	$smarty = new SmartyBC();
	
	$CI =& get_instance();
	$CI->load->helper("url");
	$controller = $CI->uri->segment(1);
	$method = $CI->uri->segment(2);
	
	$template = $CI->config->item('layout');
	
	if(file_exists(TPLDIR.$template.'/alters/'.$controller.'_'.$method.'/template.tpl'))
		$smarty->template_dir = TPLDIR.$template.'/alters/'.$controller.'_'.$method;
	else if(file_exists(TPLDIR.$template.'/alters/'.$controller.'/template.tpl'))
		$smarty->template_dir = TPLDIR.$template.'/alters/'.$controller;
	else
		$smarty->template_dir = TPLDIR.$template;

	if($controller == 'admin')
	{
		if(file_exists(TPLDIR.config_item('layout_admin').'/template.tpl'))
		{
			$smarty->template_dir = TPLDIR.config_item('layout_admin').'';
		}
	}
	
	$smarty->compile_dir = APPPATH.'/compile';
	$smarty->cache_dir = APPPATH.'/cache';
	$smarty->config_dir = APPPATH.'/config';
	 
	 /* --------------------------------------------------------------------
	 * ASSING CSRF FUNCTIONS TO TEMPLATE
	 * use: <input type="hidden" name="{$get_csrf_token_name}" value="{$get_csrf_hash}" >
	 * --------------------------------------------------------------------
	 */
	 $smarty->assign('get_csrf_token_name', $CI->security->get_csrf_token_name());	
	 $smarty->assign('get_csrf_hash', $CI->security->get_csrf_hash());
	 /* --------------------------------------------------------------------
	 * LOAD THE CONTROLLER TEMPLATE
	 * ----------------------------------------F----------------------------
	 */
	if(modules::checkRun('templatewa/templatewa/getmenucategorias'))
	{
		$var_array = modules::run('templatewa/templatewa/getmenucategorias');
		if(is_array($var_array))
		{
				$smarty->assign('menuCategorias', $var_array);
		}
		else
		{
			$smarty->assign('menuCategorias', false);
		}
		
	}
	else
	{
		$smarty->assign('menuCategorias', false);
	}

	if(modules::checkRun('templatewa/templatewa/getlangs'))
	{
		$var_array = modules::run('templatewa/templatewa/getlangs');
		if(is_array($var_array))
		{
				$smarty->assign('langs', $var_array);
		}
		else
		{
			$smarty->assign('langs', false);
		}
	}
	else
	{
		$smarty->assign('langs', false);
	}

	if(modules::checkRun('templatewa/templatewa/getmenu'))
	{
		$var_array = modules::run('templatewa/templatewa/getmenu');
		if(is_array($var_array)){
				$smarty->assign('menuLeft', $var_array);
		}
		else
		{
			$smarty->assign('menuLeft', false);
		}
	}
	else
	{
		$smarty->assign('menuLeft', false);
	}

	$content = ob_get_contents();
			   ob_end_clean();
	$head = '
	<link type="text/css" href="'.base_url().'/templates/public/css/bootstrap.css" rel="stylesheet" />
	<link type="text/css" href="'.base_url().'/templates/public/css/bootstrap-responsive.css" rel="stylesheet" />
	<script type="text/javascript" src="'.base_url().'/templates/public/js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="'.base_url().'/templates/public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="'.base_url().'/templates/public/js/jquery.validate.js"></script>
	<script type="text/javascript" src="'.base_url().'/templates/public/js/script.js"></script>
	';
	$smarty->assign('head', $head);

	$smarty->assign('title', $CI->config->item('server_name'));
	$smarty->assign('logged', modules::run('account/_needlogin', FALSE));
	$smarty->assign('servers', config_item('server'));
	$smarty->assign('servers_status', modules::run('serverstatus/_status'));
	$smarty->assign('serverOnline', false);

	$totaltime = round((microtime(true) - time()), 4);
	$smarty->assign('path', base_url());
	$smarty->assign('uri_string', $CI->uri->segment(1));
	$smarty->assign('template_path', base_url(TPLDIR.$template));
	$smarty->assign('template_path_admin', base_url(TPLDIR.config_item('layout_admin')).'/');
	$smarty->assign('website_url', base_url());
	$smarty->assign('server_name', $CI->config->item('server_name'));


	$smarty->assign('renderTime', $totaltime);
	$smarty->assign('memory_usage', $CI->benchmark->memory_usage());
	$smarty->assign('controller', strtolower($controller));
	$smarty->assign('method', strtolower($method));
	$smarty->assign('content', $content);
	$smarty->display('template.tpl');
} catch (SmartyException $e) {
    show_error($e->getmessage());
}

/* End of file index.php */
/* Location: ./index.php */