<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounts extends DataMapper {
	var $table = "accounts";
    function __construct()
  	{
     parent::__construct();
   	}

    function Accounts()
    {
        parent::DataMapper();
    }
    public function getAllAccounts()
    {
    	$a = new Accounts();
    	return $a->get();
    }
}

/* End of file accounts.php */
/* Location: ./application/models/accouunts.php */