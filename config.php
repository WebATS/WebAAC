<?PHP
	/*
	 * -------------------------------------------------------------------
	 *  DATABASE CONFIG VALUES
	 * -------------------------------------------------------------------
	 */
	 
	 $config['db_host'] = 'localhost';  // Database Host
	 $config['db_user'] = 'root';       // Database Username
	 $config['db_pass'] = '';           // Database Password
	 $config['db_data'] = '';     // Database Name
	
	/*
	 * -------------------------------------------------------------------
	 *  Configura��es de EMAIL
	 * -------------------------------------------------------------------
	 */
		/*
		 * -------------------------------------------------------------------
		 *  Qual protocolo ser� usado para enviar email?
		 *  Protocolos suportados:
		 * 	MAIL, SENDMAIL e SMTP
		 * 
		 * -------------------------------------------------------------------
		 */
			$assign_to_config['mail_type'] = 'smtp';
		/*
		 * -------------------------------------------------------------------
		 *  Qual porta ser� usada para se conectar no protocolo informado?
		 * -------------------------------------------------------------------
		 */
			$assign_to_config['mail_port'] = 465;
		/*
		 * -------------------------------------------------------------------
		 *  Em aual servidor ser� conectado usando protocolo/porta informado?
		 * -------------------------------------------------------------------
		 */
			$assign_to_config['mail_host'] = 'ssl://smtp.gmail.com';
		/*
		 * -------------------------------------------------------------------
		 *  Qual email/usu�rio ser� informado ao servidor do protocolo?
		 *
		 * Obs: mail_address: � usado para ser informados no campo FROM.
		 * A informa��o que ser� informada ao protocolo para poss�vel autentica��o
		 * ser� o mail_user.
		 * -------------------------------------------------------------------
		 */
			$assign_to_config['mail_address'] = '';
			$assign_to_config['mail_user'] = '';
			$assign_to_config['mail_pass'] = '';
	/*
	 * -------------------------------------------------------------------
	 *  Fim das Configura��es de EMAIL
	 * -------------------------------------------------------------------
	 */
	 
	/*
	 * -------------------------------------------------------------------
	 *  Configura��es da engine.
	 * -------------------------------------------------------------------
	 */
			$assign_to_config['time_active_login'] = '1400';
		/*
		 * -------------------------------------------------------------------
		 *  Nome do seu Servidor
		 * -------------------------------------------------------------------
		 */
		 
			$assign_to_config['server_name'] = 'WebAAC - Automatic Account Creater - OTServ Brasil';

		/*
		 * -------------------------------------------------------------------
		 *  Words
		 *  id_world => Nome_do_Mundo
		 *
		 *	Exemplo:
		 *	$assign_to_config['worlds'][ 1 ] = 'WebATS Manager';
		 *								/\ World ID  /\ World Name
		 *
		 * $assign_to_config['worlds'][0] = 'Servidor 1';
		 * $assign_to_config['worlds'][1] = 'Servidor 2';
		 *
		 * Servidor 1 - world_id = 0
		 * Servidor 2 - world_id = 1
		 * -------------------------------------------------------------------
		 */
		 	$assign_to_config['server'][ 0 ] = array('ip' => '', 'port' => '', 'time_refresh_cache' => '50');

			$assign_to_config['worlds'][ 0 ] = 'Servidor 1';
			$assign_to_config['worlds'][ 1 ] = 'Servidor 2';

			$assign_to_config['worlds_pass_type'][ 0 ] = 'plain';
			$assign_to_config['worlds_pass_type'][ 1 ] = 'plain';

			$assign_to_config['world_atived'][ 0 ] = TRUE;
			$assign_to_config['world_atived'][ 1 ] = FALSE;


		/*
		 * -------------------------------------------------------------------
		 *  Words config file
		 *  id_world => local path
		 *
		 *	Exemplo:
		 *	$assign_to_config['worlds_config_file'][ 0 ] = 'C:\Users\Public\Documents\Servidor 1\';
		 *	$assign_to_config['worlds_config_file'][ 1 ] = 'C:\Users\Public\Documents\Servidor 2\';
		 *											/\ World ID  /\ World path
		 *											
		 * -------------------------------------------------------------------
		 */
			$assign_to_config['worlds_config_file'][ 0 ] = '';
			$assign_to_config['worlds_config_file'][ 1 ] = '';
			$assign_to_config['world_default'] = '0';

		/*
		 * -------------------------------------------------------------------
		 *  Players Configs
		 * -------------------------------------------------------------------
		 */
			/*
			 * -------------------------------------------------------------------
			 * Voca��es novos players
			 *
			 * Exemplo:
			 * $assign_to_config['newPlayerVocations'][ 0 ][ 1 ] = 'Sorcerer Servidor 1';
			 * $assign_to_config['newPlayerVocations'][ 1 ][ 1 ] = 'Sorcerer Servidor 2';
			 * 
			 * Sorcerer Servidor 1 - world_id = 0, voca��o_id = 1			
			 * Sorcerer Servidor 2 - world_id = 1, voca��o_id = 1					      
			 * -------------------------------------------------------------------
			 */


				$assign_to_config['newPlayerVocations'][ 0 ][ 1 ] = 'Vocation 1';
				$assign_to_config['newPlayerVocations'][ 0 ][ 2 ] = 'Vocation 2';
				$assign_to_config['newPlayerVocations'][ 0 ][ 3 ] = 'Vocation 3';
				$assign_to_config['newPlayerVocations'][ 0 ][ 4 ] = 'Vocation 4';

				$assign_to_config['newPlayerVocations'][ 1 ][ 1 ] = 'Vocation 1';
				$assign_to_config['newPlayerVocations'][ 1 ][ 2 ] = 'Vocation 2';
				$assign_to_config['newPlayerVocations'][ 1 ][ 3 ] = 'Vocation 3';
				$assign_to_config['newPlayerVocations'][ 1 ][ 4 ] = 'Vocation 4';

			/*
			 * -------------------------------------------------------------------
			 * Sex novos players
			 *
			 * Exemplo:
			 * $assign_to_config['newPlayerSex'][ 0 ][ 0 ] = 'male';
			 * $assign_to_config['newPlayerSex'][ 1 ][ 0 ] = 'male';
			 * 
			 * male - world_id = 0, sex_id = 0			
			 * male - world_id = 1, sex_id = 0					      
			 * -------------------------------------------------------------------
			 */
				$assign_to_config['newPlayerSex'][ 0 ][ 1 ] = 'male';
				$assign_to_config['newPlayerSex'][ 0 ][ 0 ] = 'female';
				$assign_to_config['newPlayerSex'][ 1 ][ 1 ] = 'male';
				$assign_to_config['newPlayerSex'][ 1 ][ 0 ] = 'female';

				$assign_to_config['newPlayerSexLockType'][ 0 ][ 1 ] = '128';
				$assign_to_config['newPlayerSexLockType'][ 0 ][ 0 ] = '136';

				$assign_to_config['newPlayerSexLockType'][ 1 ][ 1 ] = '128';
				$assign_to_config['newPlayerSexLockType'][ 1 ][ 0 ] = '136';
			/*
			 * -------------------------------------------------------------------
			 * Towns novos players
			 *
			 * Exemplo:
			 * $assign_to_config['towns_list'][ 0 ][ 1 ] = 'Yalahar';
			 * $assign_to_config['towns_list'][ 1 ][ 1 ] = 'Yalahar';
			 * 
			 * Yalahar - world_id = 0, town_id = 1			
			 * Yalahar - world_id = 1, town_id = 1						      
			 * -------------------------------------------------------------------
			 */

				// Servidor 1
					$assign_to_config['towns_list'][ 0 ][ 1 ] = 'Cidade 1';
					$assign_to_config['town_posx'][ 0 ][ 1 ] = '559';
					$assign_to_config['town_posy'][ 0 ][ 1 ] = '358';
					$assign_to_config['town_posz'][ 0 ][ 1 ] = '10';

					$assign_to_config['towns_list'][ 1 ][ 1 ] = 'Cidade 2';
					$assign_to_config['town_posx'][ 1 ][ 1 ] = '559';
					$assign_to_config['town_posy'][ 1 ][ 1 ] = '358';
					$assign_to_config['town_posz'][ 1 ][ 1 ] = '10';

				// Servidor 1
				//$assign_to_config['TownsPremmy'][ 0 ] = array(1,7,3);


				$assign_to_config['newPlayerTowns'][ 0 ] = array(1);
				$assign_to_config['newPlayerTowns'][ 1 ] = array(1);


			/*
			 * -------------------------------------------------------------------
			 * Players Values					      
			 * -------------------------------------------------------------------
			 */
				$assign_to_config['newPlayerValue'][ 0 ][ 1 ]['level'] = '1';
				$assign_to_config['newPlayerValue'][ 0 ][ 1 ]['health'] = '300';
				$assign_to_config['newPlayerValue'][ 0 ][ 1 ]['mana'] = '100';
				$assign_to_config['newPlayerValue'][ 0 ][ 1 ]['experience'] = '0';
				$assign_to_config['newPlayerValue'][ 0 ][ 1 ]['maglevel'] = '10';
				$assign_to_config['newPlayerValue'][ 0 ][ 1 ]['soul'] = '100';
				$assign_to_config['newPlayerValue'][ 0 ][ 1 ]['cap'] = '1000';

				$assign_to_config['newPlayerValue'][ 0 ][ 2 ]['level'] = '1';
				$assign_to_config['newPlayerValue'][ 0 ][ 2 ]['health'] = '300';
				$assign_to_config['newPlayerValue'][ 0 ][ 2 ]['mana'] = '100';
				$assign_to_config['newPlayerValue'][ 0 ][ 2 ]['experience'] = '0';
				$assign_to_config['newPlayerValue'][ 0 ][ 2 ]['maglevel'] = '10';
				$assign_to_config['newPlayerValue'][ 0 ][ 2 ]['soul'] = '100';
				$assign_to_config['newPlayerValue'][ 0 ][ 2 ]['cap'] = '1000';

				$assign_to_config['newPlayerValue'][ 0 ][ 3 ]['level'] = '1';
				$assign_to_config['newPlayerValue'][ 0 ][ 3 ]['health'] = '300';
				$assign_to_config['newPlayerValue'][ 0 ][ 3 ]['mana'] = '100';
				$assign_to_config['newPlayerValue'][ 0 ][ 3 ]['experience'] = '0';
				$assign_to_config['newPlayerValue'][ 0 ][ 3 ]['maglevel'] = '10';
				$assign_to_config['newPlayerValue'][ 0 ][ 3 ]['soul'] = '100';
				$assign_to_config['newPlayerValue'][ 0 ][ 3 ]['cap'] = '1000';

				$assign_to_config['newPlayerValue'][ 0 ][ 4 ]['level'] = '1';
				$assign_to_config['newPlayerValue'][ 0 ][ 4 ]['health'] = '300';
				$assign_to_config['newPlayerValue'][ 0 ][ 4 ]['mana'] = '100';
				$assign_to_config['newPlayerValue'][ 0 ][ 4 ]['experience'] = '0';
				$assign_to_config['newPlayerValue'][ 0 ][ 4 ]['maglevel'] = '10';
				$assign_to_config['newPlayerValue'][ 0 ][ 4 ]['soul'] = '100';
				$assign_to_config['newPlayerValue'][ 0 ][ 4 ]['cap'] = '1000';


				$assign_to_config['newPlayerValue'][ 1 ][ 1 ]['level'] = '1';
				$assign_to_config['newPlayerValue'][ 1 ][ 1 ]['health'] = '300';
				$assign_to_config['newPlayerValue'][ 1 ][ 1 ]['mana'] = '100';
				$assign_to_config['newPlayerValue'][ 1 ][ 1 ]['experience'] = '0';
				$assign_to_config['newPlayerValue'][ 1 ][ 1 ]['maglevel'] = '10';
				$assign_to_config['newPlayerValue'][ 1 ][ 1 ]['soul'] = '100';
				$assign_to_config['newPlayerValue'][ 1 ][ 1 ]['cap'] = '1000';

				$assign_to_config['newPlayerValue'][ 1 ][ 2 ]['level'] = '1';
				$assign_to_config['newPlayerValue'][ 1 ][ 2 ]['health'] = '300';
				$assign_to_config['newPlayerValue'][ 1 ][ 2 ]['mana'] = '100';
				$assign_to_config['newPlayerValue'][ 1 ][ 2 ]['experience'] = '0';
				$assign_to_config['newPlayerValue'][ 1 ][ 2 ]['maglevel'] = '10';
				$assign_to_config['newPlayerValue'][ 1 ][ 2 ]['soul'] = '100';
				$assign_to_config['newPlayerValue'][ 1 ][ 2 ]['cap'] = '1000';

				$assign_to_config['newPlayerValue'][ 1 ][ 3 ]['level'] = '1';
				$assign_to_config['newPlayerValue'][ 1 ][ 3 ]['health'] = '300';
				$assign_to_config['newPlayerValue'][ 1 ][ 3 ]['mana'] = '100';
				$assign_to_config['newPlayerValue'][ 1 ][ 3 ]['experience'] = '0';
				$assign_to_config['newPlayerValue'][ 1 ][ 3 ]['maglevel'] = '10';
				$assign_to_config['newPlayerValue'][ 1 ][ 3 ]['soul'] = '100';
				$assign_to_config['newPlayerValue'][ 1 ][ 3 ]['cap'] = '1000';

				$assign_to_config['newPlayerValue'][ 1 ][ 4 ]['level'] = '1';
				$assign_to_config['newPlayerValue'][ 1 ][ 4 ]['health'] = '300';
				$assign_to_config['newPlayerValue'][ 1 ][ 4 ]['mana'] = '100';
				$assign_to_config['newPlayerValue'][ 1 ][ 4 ]['experience'] = '0';
				$assign_to_config['newPlayerValue'][ 1 ][ 4 ]['maglevel'] = '10';
				$assign_to_config['newPlayerValue'][ 1 ][ 4 ]['soul'] = '100';
				$assign_to_config['newPlayerValue'][ 1 ][ 4 ]['cap'] = '1000';

			/*
			 * -------------------------------------------------------------------
			 * New Players Itens					      
			 * -------------------------------------------------------------------
			 */
			
				//$assign_to_config['newPlayeritens'][ 0 ][ 4 ] = '2144';

		/*
		 * -------------------------------------------------------------------
		 *  Players Configs
		 * -------------------------------------------------------------------
		 */
			$assign_to_config['vocations_names'][0] = 
			array(
				0 => 'No Vocation',
				1 => 'Vocation 1', 
				2 => 'Vocation 2', 
				3 => 'Vocation 3', 
				4 => 'Vocation 4'
			);

			$assign_to_config['vocations_names'][1] = 
			array(
				1 => 'Vocation 1', 
				2 => 'Vocation 2', 
				3 => 'Vocation 3', 
				4 => 'Vocation 4'
			);
	/*
	 * -------------------------------------------------------------------
	 *  End Configs
	 * -------------------------------------------------------------------
	 */	
		/*
		 * -------------------------------------------------------------------
		 *  Check PHP Version
		 *
		 * O WebATS Manager necessita de uma vers�o m�nima para funcionar,
		 * a vers�o m�nima � 5.3, caso teu apache esteja em uma vers�o menor
		 * � altamente recomendav�l atualiza��o do mesmo.
		 * Mas caso esteje ciente dos erros caso queira desativar esta checagem
		 * basta alterar a v�riavel para FALSE.
		 * -------------------------------------------------------------------
		 */
		 
			$config['enable_check_php_version'] = TRUE; 
		
		/*
		 * -------------------------------------------------------------------
		 *  Protocolo do servidor ATS
		 * -------------------------------------------------------------------
		 */
		 
			$assign_to_config['server_protocol'] = 'tfs0.4';
		
		/*
		 * -------------------------------------------------------------------
		 *  P�gina padr�o.
		 * 
		 * S� altere aqui caso esteja ciente do que esteja fazendo.
		 * -------------------------------------------------------------------
		 */
		 
			$assign_to_config['default_page'] = 'news';
		
		/*
		 * -------------------------------------------------------------------
		 *  URL Padr�o da Aplica��o.
		 *
		 * J� esta configurado um modo para auto carregar URL padr�o.
		 * -------------------------------------------------------------------
		 */
		 
			$assign_to_config['base_url'] = 'http://'.$_SERVER['HTTP_HOST'] . '/'.trim(dirname($_SERVER['SCRIPT_NAME']), '/.\\');
		
		/*
		 * -------------------------------------------------------------------
		 *  Time Cache Language
		 *
		 * Aqui � configura��o em SEGUNDOS quanto tempo aplica��o ir� atualizar
		 * o cache do idioma do banco de dados, � recomendavel deixar em torno
		 * de 180 h� 300 segundos
		 * -------------------------------------------------------------------
		 */
		 
			$assign_to_config['cache_language'] = '60';
		
		/*
		 * -------------------------------------------------------------------
		 *  TEMPLATE CONFIG VALUES
		 * -------------------------------------------------------------------
		 */	
		 
		 /*
		 * -------------------------------------------------------------------
		 *  Template
		 *
		 * Escolha aqui qual template ser� carregado em sua aplica��o
		 * Os templates est�o de padr�o armazena na pasta "templates"
		 * -------------------------------------------------------------------
		 */
		 
		 	$assign_to_config['layout_admin'] = 'admin3';		 	
			$assign_to_config['layout'] = 'avatar';
			


		
		/*
		 * -------------------------------------------------------------------
		 *  Pseudo-Variaveis
		 *
		 * Configura��es dos brackets das pseudo-variaveis do keywords.php
		 *
		 * Exemplo: {website_url}
		 *
		 * S� altere se estiver ciente do que esta fazendo.
		 * -------------------------------------------------------------------
		 */
			 $assign_to_config['open_bracket'] = '{';
			 $assign_to_config['close_bracket'] = '}';
	 /*
	 * -------------------------------------------------------------------
	 *  Fim das configura��es da engine.
	 * -------------------------------------------------------------------
	 */
	 
	 /*
	 * -------------------------------------------------------------------
	 *  SEGURAN�A
	 * -------------------------------------------------------------------
	 */
	
/* End of file config.php */
/* Location: ./config.php */