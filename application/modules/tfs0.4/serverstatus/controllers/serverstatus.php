<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class serverstatus extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function _status()
	{
		$servers = config_item('server');
		foreach ($servers as $key => $value) 
		{
			if(isset($value['time_refresh_cache']))
			{
				$statustimeout = $value['time_refresh_cache'];
			}
			else
			{
				$statustimeout = '30';
			}
			fopen ("application/cache/DONT_EDIT_serverstatus[$key].txt", 'a+');
			$config['status'][$key] = parse_ini_file('application/cache/DONT_EDIT_serverstatus['.$key.'].txt');
			$config['status'][$key]['time'] = $config['status'][$key]['serverStatus_lastCheck']+$statustimeout;
			if($config['status'][$key]['time'] < time())
			{
				$config['status'][$key]['serverStatus_checkInterval'] = $statustimeout+3;
				$config['status'][$key]['serverStatus_lastCheck'] = time();

				$array1 = array($value['ip'], $value['port'], 1);
				$statusInfo[$key] = new connect();
				$statusInfo[$key]->setConfig($array1);
				echo $statusInfo[$key]->ip;
				if($statusInfo[$key]->isOnline())
				{
					$config['status'][$key]['serverStatus_online'] = 1;
					$config['status'][$key]['serverStatus_players'] = $statusInfo[$key]->getPlayersCount();
					$config['status'][$key]['serverStatus_playersMax'] = $statusInfo[$key]->getPlayersMaxCount();
					$h = floor($statusInfo[$key]->getUptime() / 3600);
					$m = floor(($statusInfo[$key]->getUptime() - $h*3600) / 60);
					$config['status'][$key]['serverStatus_uptime'] = $h.'h '.$m.'m';
					$config['status'][$key]['serverStatus_monsters'] = $statusInfo[$key]->getMonsters();
				}
				else
				{
					$config['status'][$key]['serverStatus_online'] = 0;
					$config['status'][$key]['serverStatus_players'] = 0;
					$config['status'][$key]['serverStatus_playersMax'] = 0;
				}
				$file = fopen("application/cache/DONT_EDIT_serverstatus[$key].txt", "w");
				$file_data = '';
				foreach($config['status'][$key] as $param => $data)
				{
			$file_data .= $param.' = "'.str_replace('"', '', $data).'"
			';
				}
				rewind($file);
				fwrite($file, $file_data);
				fclose($file);
			}
		}

		return $config;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */