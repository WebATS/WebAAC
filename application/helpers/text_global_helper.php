<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function text_global ($text, $font=FALSE)
{	
	if (!$font) 
	{
		return print base_url().TPLLAYOUTDIR.'text_global.php?text='.$text.'';
	}
	else
	{
		return print base_url().TPLLAYOUTDIR.'text_global.php?text='.$text.'&font=true';
	}
}

/* End of file text_global.php */
/* Location: ./application/helpers/text_global.php */