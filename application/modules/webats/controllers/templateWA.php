<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class templateWA extends MX_Controller {
	public function __construct(){
		parent::__construct();
	}
	
	public function getmenucategorias(){
		$this->load->model('getmenucategorias');
		$u = $this->getmenucategorias->getmenucategorias();
		$u->where("ativado", true);
		$u->order_by("position", "ASC");
		$a = $u->get();
		foreach ($a->all as $MenuCategoria)
		{

			if($MenuCategoria->acess > $this->session->userdata('login_acess')){
				continue;
			}
			
			// NOTA: Aqui será definido para um menu aparecer apenas para ADMIN, acess < session_acess do usuário logado
			if($MenuCategoria->acess < '99'){
				$categorias[] = array($MenuCategoria->id => array('categoria' => $this->lang->line($MenuCategoria->categoria), 'acess' => $MenuCategoria->acess, 'img_icon' => $MenuCategoria->img_icon));
			}
			
		}
		return $categorias;
	}
	
	public function getlangs(){
		$u = new getlangs();
		$u->where("ativado", true);
		$u->order_by("nome", "ASC");
		$a = $u->get();
			foreach ($a->all as $Lang)
			{
				$arr[] = array('lang_prefix' => $Lang->lang_prefix, 'lang_nome' => $Lang->nome);			
					
			}
		return $arr;
	}
	public function getmenu(){
		$this->load->model('getmenulinks');
		$u = new getmenulinks();
		$u->where("ativado", true);
		$u->order_by("position", "ASC");
		$a = $u->get();
		foreach ($a->all as $MenuLink)
		{
			$a->get_by_categoria($MenuLink->categoria);
			if($MenuLink->logged == '1')
			{
				if(!modules::run('account/_needlogin', FALSE))
				{
					continue;
				}
			}
			if($MenuLink->logged == '2')
			{
				if(modules::run('account/_needlogin', FALSE))
				{
					continue;
				}
			}
			if($MenuLink->acess > $this->session->userdata('login_acess')){
				continue;
			}
				if(isset($arr[$a->categoria]) and is_array($arr[$a->categoria]))
				{
					if(!strstr($MenuLink->link_href, 'http://')){
						$MenuLink->link_href = site_url($MenuLink->link_href);					
					}
					$arr[$a->categoria] = array_merge($arr[$a->categoria], array($MenuLink->id => array('link_href' => $MenuLink->link_href, 'link_title' => $this->lang->line($MenuLink->link_title), 'acess' => $MenuLink->acess, 'img_icon' => $MenuLink->img_icon)));
				}
				else
				{		
					if(!strstr($MenuLink->link_href, 'http://')){
						$MenuLink->link_href = site_url($MenuLink->link_href);					
					}
					$arr[$a->categoria] = array($MenuLink->id => array('link_href' => $MenuLink->link_href, 'link_title' => $this->lang->line($MenuLink->link_title), 'acess' => $MenuLink->acess, 'img_icon' => $MenuLink->img_icon));			
				}
				
		}
		return $arr;
	}
	
}

/* End of file templateWA.php */
/* Location: ./modules/statistic/controllers/templateWA.php */