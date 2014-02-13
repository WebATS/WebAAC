<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class account_model extends DataMapper {
	var $table = "accounts";
	var $encryptionType = 'plain';
	var $validation = array(
		        'name' => array(
		            'label' => 'Account Name',
		            'rules' => array('required', 'trim', 'unique', 'alpha_numeric', 'min_length' => 5, 'max_length' => 12),
		        ),
				'password' => array(
		            'label' => 'Password',
		            'rules' => array('required', 'trim', 'alpha_numeric', 'min_length' => 5),
		        ),
				'email' => array(
		            'label' => 'Email',
		            'rules' => array('required', 'trim', 'unique', 'valid_email')
		        ),
				'coins' => array(
		            'label' => 'Coins',
		            'rules' => array('numeric')
		        ),
				'premdays' => array(
		            'label' => 'PremyDays',
		            'rules' => array('numeric')
		        )
			);
    function __construct()
  	{
		parent::__construct();
   	}
	
	function login()
    {

        $this->where('name', $this->name);
		$this->_encryptPassword();
		$this->where('password', $this->password);
		$this->get();
		/* $this->check_last_query(); */
        if (empty($this->id))
        {
            return FALSE;
        }
        else
        {
            // Login succeeded
            return TRUE;
        }
    }

	public function check_hash($hash_key)
	{
		$this->where('hash_key', $hash_key)->get();
			if ($this->id)
			{
				if(!$this->ativado)
				{
					$this->ativado = TRUE;
					if ($this->save())
					{
						return TRUE;
					}
					else
					{
						log_message('error', "[ ACCOUNT_MODEL::check_hash ] FATAL ERROR: ".$u->error->string."");
					}
					return FALSE;
				}
				else
				{
					return 'ACCATIVED';
				}
			}
		return FALSE;	
	}
	function _encryptHashKey()
	{
			if (empty($this->saltHaskKey))
			{
				$this->saltHaskKey = md5(uniqid(rand(), true));
			}
			return sha1($this->saltHaskKey);
	}
	
	function _encryptPassword($value=FALSE)
    {
		if(!$value){
			if (!empty($this->password))
			{
				if ($this->encryptionType == 'plain')
				{
					return;
				}
				return $this->password = hash($this->encryptionType, $this->password);
			}
		}
		else
		{
		if ($this->encryptionType == 'plain')
		{
			return $value;
		}
			return hash($this->encryptionType, $value);
		}
    }

    public function saveAccount($row, $value)
    {
    	
    	$this->where('name', modules::run('account/_needlogin')->name)->where('password', modules::run('account/_needlogin')->password)->get();
    	$this->$row = $value;
    	if($this->save())
    		return TRUE;
    	return FALSE;
    }
    public function saveAccountFromID($id, $row, $value)
    {
    	$u = new account_model();
    	$u->where('id', $id)->get();
    	$u->$row = $value;
    	if($u->save())
    		return TRUE;
    	return FALSE;
    }
    public function infoAccountFromID($id, $row)
    {
    	$u = new account_model();
    	$u->where('id', $id)->get();
    	return $u->$row;
    }
}

/* End of file accounts.php */
/* Location: ./application/models/accounts.php */