<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class shop extends MX_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('text', 'array', 'date'));
		$this->load->library('multworlds');
	}
	
	
	public function index()
	{
		$produtos = new web_ats_shop();
		$produtos->where('world_id', $this->multworlds->setDefatulWorld());
		$produtos->where('ativado', '1');
		$produtos->order_by('produto_valor', 'ASC');
		$produtos->order_by('produto_valor2', 'ASC');
		$data['all_produtos'] = $produtos->get();
		$this->load->view('index', $data);
	}

	public function _popimg()
	{
		if($this->session->userdata('timepop') > time())
		{
			$this->load->view('popimg');
			$this->session->set_userdata('timepop', time()+60*20);
		}
		
	}

	public function _check_coins($coins)
	{
		if($coins <= modules::run('account/_needlogin')->coins)
		{
			return TRUE;
		}
		$this->form_validation->set_message('_check_coins', 'Você não possui esse valor de coins.');
		return FALSE;
	}

	public function transference()
	{

		$this->db->select('name');
		$this->db->order_by('level', 'DESC');
		$query = $this->db->get('players');
		$data['list_all_players'] = $query->result();

		if($this->input->post('playerName'))
		{
				$this->form_validation->set_rules('playerName', 'Nome Player', 'required|min_length[1]|callback__check_player_name_dst');		
				$this->form_validation->set_rules('coins', 'Coins', 'required|min_length[1]|is_natural_no_zero|callback__check_coins');			
				$this->form_validation->set_message('required', 'Campo <b>%s</b> fico em branco!');

				if($this->form_validation->run($this) == TRUE)
				{

					$a = modules::run('account/_needlogin');
					$a->coins = $a->coins - (int)$this->input->post('coins');
					if($a->save())
					{
						$player = $this->load->model('account/player_model');
						$account = $this->load->model('account/account_model');
						$player_accid = $player->getPlayerInfoFromName($this->input->post('playerName'), 'account_id');
						$account->where('id', $player_accid)->get();
						$account->coins = $account->coins + (int)$this->input->post('coins');
						if($account->save())
						{
							$historico = new web_ats_shop_historico();
							$historico->world_id = $this->multworlds->setDefatulWorld();
							$historico->produto_type = 'transference';
							$historico->valor = (int)$this->input->post('coins');

							$historico->account_buy = modules::run('account/_needlogin')->name;
							$historico->player_name = $player->getPlayerInfoFromName($this->input->post('playerName'));
							$historico->status = 'Transferido';
							$historico->time = time();
							$historico->save();

							$this->error->displayError('Coins transferidas com sucesso! Seu novo saldo é: '.modules::run('account/_needlogin')->coins, 'sucess');
						}

					}
				
				}
				else
				{
					echo $this->error->displayError(validation_errors());
				}

		}
		$this->load->view('transference', $data);
	}

	public function buy()
	{

		$get = (int)$this->uri->segment(3);
		$produto = new web_ats_shop();
		$account = modules::run('account/_needlogin');
		$cupom = new web_ats_shop_cupons();
		
		$produto->where('world_id', $this->multworlds->setDefatulWorld());
		$produto->where('id', $get);
		$produto->where('ativado', '1');

		$produto_info = $produto->get();
		
		if(!count($produto_info->all))
			redirect('shop/index');
		//print_r($this->session->userdata('cupons'));
		if($this->input->post('CupomDesconto'))
		{
				$this->form_validation->set_rules('CupomDesconto', 'Cupom Desconto', 'required|min_length[1]');				
				$this->form_validation->set_message('required', 'Campo <b>%s</b> fico em branco!');

				if($this->form_validation->run($this) == TRUE)
				{	
					if($desconto = $cupom->checkValidCupom($this->input->post('CupomDesconto'), $produto_info->id))
					{						

						if(is_array($this->session->userdata('cupons')))
						{
							foreach ($this->session->userdata('cupons') as $key => $value) 
							{
								if(in_array($this->input->post('CupomDesconto'), $value))
								{
									$this->session->unset_userdata('cupons');
								}
							}
						}

						if(is_array($this->session->userdata('cupons')))
						{
							if(!array_key_exists($produto_info->id, $this->session->userdata('cupons')))
							{
								$array = array(
										$produto_info->id => 
													array(
															'desconto' => $desconto, 
															'cupom' => $this->input->post('CupomDesconto')
														)
													);

								$array = $array + $this->session->userdata('cupons');
								
								$this->session->set_userdata('cupons', $array);
									
								$this->error->displayError('Cupom ativado com sucesso, confira novo valor do produto!', 'sucess');
							}
							else
							{
								$this->error->displayError('Já existe um cupom ativado para este produto!');
							}
								
							
						}
						else
						{
							$this->error->displayError('Cupom ativado com sucesso, confira novo valor do produto!', 'sucess');
							$this->session->set_userdata(
								array(
									'cupons' => array(
										$produto_info->id => 
														array(
																'desconto' => $desconto, 
																'cupom' => $this->input->post('CupomDesconto')
															)
														)
									)
							);
						}
						
					}
					else
					{
						$this->error->displayError('Cupom Inválido!');
					}
				}
				else
				{
					$this->error->displayError(validation_errors());
				}			
		}

		
		$data['cupom_atived'] = false;
		if($cupom = $cupom->checkCupomAtived($produto_info->id))
		{

			$percentual =  $cupom['desconto'] / 100;
			$valor_calc = $produto_info->produto_valor - ($percentual * $produto_info->produto_valor);
			$valor_calc = (int)$valor_calc;
			if($valor_calc < 1)
				$valor_calc = '1';

			$produto_info->produto_valor_desconto = $valor_calc;
			$data['cupom_atived'] = $cupom;
		}

		if($this->input->get('remove_cupom'))
		{
			if(is_array($this->session->userdata('cupons')))
			{
				if(array_key_exists($produto_info->id, $this->session->userdata('cupons')))
				{
					$array = $this->session->userdata('cupons');
					unset($array[$produto_info->id]);
					if(count($array))
					{
						$this->session->set_userdata(array('cupons' => $array));
					}
					else
					{
						$this->session->unset_userdata('cupons');
					}
					redirect('shop/buy/'.$this->uri->segment(3));
				}
			}
		}

		$data['produto'] = $produto_info;
		$players = $this->load->model('account/player_model');
		$players->select('name, account_id')->where('world_id',$this->multworlds->setDefatulWorld())->where('account_id', $account->id)->get();
		$data['player_list'] = $players;

		
		$this->load->view('buy', $data);

	}

	public function _check_player_name($name)
	{
		$player = $this->load->model('account/player_model');
		$player->clear();

		if(!count($player->select('name, account_id')->where('world_id',$this->multworlds->setDefatulWorld())->where('name', $name)->where('account_id', modules::run('account/_needlogin')->id)->get()->all))
		{
			//$player->check_last_query();
			$this->form_validation->set_message('_check_player_name', 'O player '.$name.' não pertence a sua conta.');
			return FALSE;
		}
			
		return TRUE;
	}

	public function _check_player_name_dst($name)
	{
		$player = $this->load->model('account/player_model');
		$player->clear();

		if(!count($player->select('name')->where('world_id',$this->multworlds->setDefatulWorld())->where('name', $name)->get()->all))
		{
			//$player->check_last_query();			
			$this->form_validation->set_message('_check_player_name_dst', 'O player '.$name.' não foi encontrado no mundo selecionado ou não existe.');
			return FALSE;
		}
		else
		{
			if(count($player->select('name, account_id')->where('name', $name)->where('account_id', modules::run('account/_needlogin')->id)->get()->all))
			{
				$this->form_validation->set_message('_check_player_name_dst', 'Você não pode se presentiar.');
				return FALSE;
			}
		}
			
		return TRUE;
	}

	public function confirm()
	{
		$account_info = modules::run('account/_needlogin');
		$get = (int)$this->uri->segment(3);
		$player = $this->load->model('account/player_model');
		$account = $this->load->model('account/account_model');
		$cupom = new web_ats_shop_cupons();
		$produto = new web_ats_shop();
		$produto->where('world_id', $this->multworlds->setDefatulWorld());
		$produto->where('ativado', '1');
		$produto->where('id', $get);
		$produto = $produto->get();
		
		if(!count($produto->all))
		{
			$this->error->displayError('Ocorreu um erro ao processar seu pedido, tente novamente.');
			self::buy();
			return;
		}


			if($this->input->post('name') and !$this->input->post('dstName'))
			{
				$this->form_validation->set_rules('name', 'Nome', 'required|min_length[1]|callback__check_player_name');				
				$this->form_validation->set_message('required', 'Campo <b>%s</b> fico em branco!');

				if($this->form_validation->run($this) != TRUE)
				{
					$this->error->displayError(validation_errors());
					self::buy();
					return;
				}

			}
			elseif($this->input->post('dstName') and $this->input->post('fromname') and $produto->permitir_presente)
			{
				$this->form_validation->set_rules('fromname', 'Nome', 'required|min_length[1]|callback__check_player_name');
				$this->form_validation->set_rules('dstName', 'Nome Destinatário', 'required|min_length[1]|callback__check_player_name_dst');
				
				$this->form_validation->set_message('required', 'Campo <b>%s</b> fico em branco!');

				if($this->form_validation->run($this) != TRUE)
				{
					$this->error->displayError(validation_errors());
					self::buy();
					return;
				}
			}
			else
			{
				$this->error->displayError('Escolha ou informe nome do player que sera enviado o produto!');
				self::buy();
				return;
			}

			$data['cupom_atived'] = false;

			if($cupom_info = $cupom->checkCupomAtived($produto->id))
			{

				$percentual =  $cupom_info['desconto'] / 100;
				$valor_calc = $produto->produto_valor - ($percentual * $produto->produto_valor);
				$valor_calc = (int)$valor_calc;
				if($valor_calc < 1)
					$valor_calc = '1';

				$produto->produto_valor_desconto = $valor_calc;
				$data['cupom_atived'] = $cupom_info;
			}

			if($this->input->post('confirm'))
			{
				if($this->input->post('typepay') != 'coin1')
				{
					if($this->input->post('typepay') != 'coin2')
					{
						$this->error->displayError('Escolha uma forma de pagamento!');
						$data['produto'] = $produto;
						$this->load->view('confirm', $data);
						return;		
					}								
				}


				if($this->input->post('typepay') == 'coin1')
				{					
					if($account_info->coins >= $produto->produto_valor)
					{
						$valor = $produto->produto_valor;
						if($produto->produto_valor_desconto)
						{
							$valor = $produto->produto_valor_desconto;
						}
							
						$account_info->saveAccount('coins', $account_info->coins - $valor);
					}
					else
					{
						$this->error->displayError('Você não possui essa quantidade de moedas para efetuar a compra, por favor escolha outra forma de pagamento.');
						$data['produto'] = $produto;
						$this->load->view('confirm', $data);
						return;
					}
				}
				elseif($this->input->post('typepay') == 'coin2' and $produto->produto_valor2)
				{
					if($account_info->coins2 >= $produto->produto_valor2)
					{
						$account_info->saveAccount('coins2', $account_info->coins2 - $produto->produto_valor2);
					}
					else
					{
						$this->error->displayError('Você não possui essa quantidade de moedas para efetuar a compra, por favor escolha outra forma de pagamento.');
						$data['produto'] = $produto;
						$this->load->view('confirm', $data);
						return;
					}
				}
				else
				{
					$this->error->displayError('Ocorreu um erro ao processar seu pedido, tente novamente.');
					self::buy();
					return;
				}


				$historico = new web_ats_shop_historico();


				if($produto->produto_type == 'pontos')
				{

					$historico->where('world_id', $this->multworlds->setDefatulWorld());
					$historico->where('produto_type', 'pontos');
					$historico->where('to_player', $player->getPlayerInfoFromName($this->input->post('name')));

					$historico->get();

					if($historico->id)
					{
						$this->error->displayError('Você já adquiriu um pacote de pontos, só é permitido um pacote por player.');
						self::buy();
						return;
					}
				}
				



				$historico->produto_id = $produto->id;
				$historico->world_id = $this->multworlds->setDefatulWorld();
				$historico->produto_type = $produto->produto_type;
				$historico->produto_subtype = $produto->produto_subtype;
				$historico->produto_quantidade = $produto->produto_quantidade;
				$historico->item_id = $produto->produto_item_id;

				if($this->input->post('dstName'))
					$historico->from_player = $player->getPlayerInfoFromName($this->input->post('fromname'));

				if($this->input->post('name'))
				{
					$historico->to_player = $player->getPlayerInfoFromName($this->input->post('name'));
				}
				elseif($this->input->post('dstName'))
				{
					$historico->to_player = $player->getPlayerInfoFromName($this->input->post('dstName'));
				}

				if($this->input->post('typepay') == 'coin1')
				{
					$historico->valor = $produto->produto_valor;

					if($produto->produto_valor_desconto)
					{
						$historico->valor = $produto->produto_valor_desconto;
					}
				}
				elseif($this->input->post('typepay') == 'coin2')
				{
					$historico->valor2 = $produto->produto_valor2;
				}

				$historico->cupom_key = 'null';											
				$historico->account_buy = $account_info->name;
				
				$historico->time = time();

				if($cupom_info = $cupom->checkCupomAtived($produto->id))
				{
					$cupom = $cupom->where('cupom_key', $cupom_info['cupom'])
			   		->where('time_expire >=', time())
			   		->where('time_used', FALSE)
			   		->get(1);

			   		

			   		if($cupom->acc_used)
			   		{
			   			$array = unserialize($cupom->acc_used);
			   			$cupom->acc_used = serialize(array_merge($array, array($account_info->name)));
			   		}
			   		else
			   		{
			   			$cupom->acc_used = serialize(array($account_info->name));
			   		}
			   		

			   		if($cupom->ativado == '1')
			   			$cupom->ativado = '0';

			   		$cupom->save();
			   		$historico->cupom_key = $cupom_info['cupom'];
				}
				
				$historico->status = 'aguardando';

				if($produto->produto_type == 'premmy')
				{	
					$historico->status = 'ativada';
					if($this->input->post('name'))
					{
						$account->saveAccount('premdays', $account_info->premdays + $produto->produto_quantidade);
						
					}
					elseif($this->input->post('dstName'))
					{																	;
						$playerid = $player->getPlayerInfoFromName($this->input->post('dstName'), 'account_id');
						$account->saveAccountFromID($playerid, 'premdays', $account->infoAccountFromID($playerid, 'premdays') + $produto->produto_quantidade);
					}
				}
				elseif($produto->produto_type == 'item')
				{
					$historico->status = 'aguardando';
				}



				$historico->save();
				
				$produto->quantidade_vendida = $produto->quantidade_vendida+1;
				$produto->save();
				//$produto->check_last_query();

				
				$this->session->set_flashdata('buy_success', TRUE);
				redirect('shop/success');
				return;
			}


		$data['produto'] = $produto;
		$this->load->view('confirm', $data);	

	}

	public function success()
	{
		if($this->session->flashdata('buy_success'))
		{
			$this->load->view('success');
			return;
		}
		redirect('shop');
	}
	
}

/* End of file statistic.php */
/* Location: ./modules/statistic/controllers/statistic.php */