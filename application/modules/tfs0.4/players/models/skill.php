<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Skill extends DataMapper
{	var $table = 'player_skills';

    var $has_one = array('player');

    function __construct($id = null)
    {
        parent::__construct($id);
    }
}





/* End of file player_model.php */
/* Location: ./application/modules/8.50/account/models/player_model.php */

?>