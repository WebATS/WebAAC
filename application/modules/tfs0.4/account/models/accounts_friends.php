<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class accounts_friends extends DataMapper {
	var $table = "accounts_friends";

    function __construct()
  	{
		parent::__construct();
   	}

   	public function newRef($account_id, $account_ref)
   	{
   		$this->account_name = $account_id;
   		$this->account_ref = $account_ref;
   		$this->time = time();
   		$this->save();
   	}

    public function activeRef($account_name)
    {
      $this->where('account_name', $account_name);
      $this->where('ativado_time', FALSE);
      $this->limit(1);
      $this->get();
      if($this->id)
      {
        $this->ativado_time = time();
        if($this->save())
        {
          return TRUE;
        }
      }
      return FALSE;
    }
	
}

/* End of file accounts.php */
/* Location: ./application/models/accounts.php */