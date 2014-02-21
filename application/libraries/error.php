<?php
/**
 * Project:     WebATS Manager
 * File:        Template.class.php
 * SVN:         $Id: $
 */
class Error extends MX_Controller {
	

	function _printf_array($format, $arr) 
	{ 
	    return call_user_func_array('sprintf', array_merge((array)$format, $arr)); 
	} 
	public function displayError($mensagem='DEFAULT_MSG_ERROR', $type='error', $title_label='ATT', $template='error', $sprintf=FALSE, $system=FALSE)
	{		

		if(!$system)
		{
			$system = $this->uri->segment(1);
			if ($this->uri->segment(2)) 
			{
				$system .=  '/'.$this->uri->segment(2);
			}
		}
		if (is_array($mensagem)) 
		{
			
			if(isset($mensagem['type']))
			{
				$type = $mensagem['type'];
			}

			if(isset($mensagem['label']))
			{
				$title_label = $mensagem['label'];
			}

			if(isset($mensagem['template']))
			{
				$template = $mensagem['template'];
			}

			if(isset($mensagem['sprintf']))
			{
				$sprintf = $mensagem['sprintf'];
			}

			if(isset($mensagem['system']))
			{
				$system = $mensagem['system'];
			}

			if(isset($mensagem['body']))
			{
				$mensagem = $mensagem['body'];
			}
			else
			{
				$mensagem='DEFAULT_MSG_ERROR';
			}
		}
		switch ($type){
			case 'error':
			break;
			case 'alert':
			break;
			case 'info':
			break;
			case 'sucess':
			break;
			default:
				$type = 'error';
			break;
		}

		if($sprintf)
		{
			$this->localMensagem = $this->_printf_array($this->lang->line($mensagem), $sprintf); 
		}
		else
		{
			$this->localMensagem = $this->lang->line($mensagem);
		}

		$data = array(
				'title_label' => $this->lang->line($title_label),	
				'mensagem' => $this->localMensagem,
				'type' => $type,
				'system' => $system
				);	
		if($this->load->Check_View('webats/'.$template))
		{
			$this->load->view('webats/'.$template, $data);
		}
		else
		{
			if($this->load->Check_View('webats/error')){
				self::displayError('Erro ao localizar arquivo view de erro: '.$template.'.php');
			}
			else
			{
				echo 'Erro ao localizar arquivo view de erro: '.$template.'.php';
			}
		}
	}
}

?>