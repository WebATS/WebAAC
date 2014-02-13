<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Migration_UpTables extends CI_Migration {

    public function up() {
       if (! $this->db->field_exists('ativado', 'web_ats_langs')) 
	   {
            $this->load->dbforge();
            $campos = array(
                'ativado' => array(
                    'type'      => 'int',
					 'constraint' => 1, 
                     'default'   => '1'
                )
            );
            $this->dbforge->add_column('web_ats_langs', $campos);
        }
		if (! $this->db->field_exists('id', 'web_ats_langs')) 
		{
            $this->load->dbforge();
            $campos = array(
                'id' => array(
                    'type'      => 'int',
                      'auto_increment' => TRUE
                )
            );
            $this->dbforge->add_column('web_ats_langs', $campos);
			
        }
		 if ($this->db->field_exists('lang', 'web_ats_langs')) 
		 {
			$fields = array(
			'lang' => array('name' => 'lang_prefix'),
			);
			$this->dbforge->modify_column('web_ats_langs', $fields);
		}
    }
	
	public function down() {
	
	}
}
