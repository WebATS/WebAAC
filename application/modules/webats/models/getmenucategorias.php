<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class getmenucategorias extends DataMapper {
	var $table = "web_ats_menu_categorias";
	function __construct()
  	{
     parent::__construct();
   	}
    function getmenucategorias()
    {
       $this->object = new DataMapper();
	   return $this;
    }
}

/* End of file accounts.php */
/* Location: ./application/models/accouunts.php */