<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * 
 *
 * @package		CodeIgniter
 * @subpackage	Models
 * @category	WebATS
 * @author		WebATS Manager Team
 * @link		http://webats.xtibia.com
 */		
class player_model extends DataMapper {
	var $table = "players";
	var $validation = array(
		        'name' => array(
		            'label' => 'Player Name',
		            'rules' => array('unique', 'min_length' => 3, 'max_length' => 20),
		        ),
		        'world_id' => array(
		            'label' => 'World ID',
		            'rules' => array('numeric'),
		        ),
		        'account_id' => array(
		            'label' => 'Account ID',
		            'rules' => array('numeric'),
		        ),
		        'level' => array(
		            'label' => 'level',
		            'rules' => array('numeric'),
		        ),
		        'vocation' => array(
		            'label' => 'vocation',
		            'rules' => array('numeric'),
		        ),
		        'health' => array(
		            'label' => 'health',
		            'rules' => array('numeric'),
		        ),
		        'healthmax' => array(
		            'label' => 'healthmax',
		            'rules' => array('numeric'),
		        ),
		        'experience' => array(
		            'label' => 'experience',
		            'rules' => array('numeric'),
		        ),
		        'locktype' => array(
		            'label' => 'experience',
		            'rules' => array('numeric'),
		        ),
		        'maglevel' => array(
		            'label' => 'experience',
		            'rules' => array('numeric'),
		        ),
		        'mana' => array(
		            'label' => 'mana',
		            'rules' => array('numeric'),
		        ),
		        'manamax' => array(
		            'label' => 'manamax',
		            'rules' => array('numeric'),
		        ),
		        'soul' => array(
		            'label' => 'soul',
		            'rules' => array('numeric'),
		        ),
		        'town_id' => array(
		            'label' => 'town_id',
		            'rules' => array('numeric'),
		        ),
		        'posx' => array(
		            'label' => 'posx',
		            'rules' => array('numeric'),
		        ),
		        'posy' => array(
		            'label' => 'posy',
		            'rules' => array('numeric'),
		        ),
		        'posz' => array(
		            'label' => 'posz',
		            'rules' => array('numeric'),
		        ),
		        'cap' => array(
		            'label' => 'cap',
		            'rules' => array('numeric'),
		        ),

		        'sex' => array(
		            'label' => 'sex',
		            'rules' => array('numeric'),
		        ),
		        'promotion' => array(
		            'label' => 'promotion',
		            'rules' => array('numeric'),
		        ),
			);

    function __construct()
  	{
		parent::__construct();
   	}
   	
   	public function getlist($account_id)
   	{

   		$this->order_by('level', 'DESC');
		$this->where('account_id', $account_id)->get();

		if ($this->id) 
		{
			return $this;
		}
		else
		{
			return FALSE;
		}
   	}
   	public function getPlayerInfoFromName($name, $row='id')
   	{
   		return $this->select($row)->where('name', $name)->get()->$row;
   	}
 }





/* End of file player_model.php */
/* Location: ./application/modules/8.50/account/models/player_model.php */

?>