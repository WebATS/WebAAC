<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * MY_Form_validation
 *
 * @package     CodeIgniter
 * @subpackage  Libraries
 * @category    Libraries
 * @author      Muhammad Mahbubur Rahman
 * @link        http://www.mahbubblog.com/php/form-validation-callbacks-in-hmvc-in-codeigniter/
 */
 
class MY_Form_validation extends CI_Form_Validation {
 
    function run($module='', $group='')
    {
        (is_object($module)) AND $this->CI =& $module;
        return parent::run($group);
    }
 
}
 
/* End of file MY_Form_Validation.php */
/* Location: ./application/libraries/MY_Form_Validation.php */