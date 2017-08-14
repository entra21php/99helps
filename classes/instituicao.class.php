<?php
	#  MODULO INSTITUICAO
	// Desenvolvido por: João de Paula e Nilton Souza
	class Instituicao Extends Site {
		
		public function __construct() {		
			# Verifica a acao do momento (perfil_instituicao, add, del, edt)
			$this->addInstituicao();
		}

		public function addInstituicao() {
			# Reset das variaveis
			$msg_erro = "";
			$razaoSocial = "";
			$nomeFantasia = "";
			$logadrouro = "";
			$numero = "";
			$estado	= "";
			$causa_defendida = "";
			
			# Recebe informações do form da pagina e realiza insert
			if (isset($_POST['enviar'])) {
				$razaoSocial 	 = $_POST['razaoSocial'];
				$nomeFantasia 	 = $_POST['nomeFantasia'];
				$logadrouro 	 = $_POST['logadrouro'];
				$numero 		 = $_POST['numero'];
				$estado			 = $_POST['estado'];
				$causa_defendida = $_POST['causa_defendida'];

				// Verifica se existe campo vazio
				if ((empty($razaoSocial)) || (empty($nomeFantasia)) || (empty($logadrouro)) || (empty($numero)) || (empty($estado)) || (empty($causa_defendida))) {
					$msg_erro = "Preencha todos os campos! <br>";
				}

				// Exibe erro se ele existir
				if ((strlen($msg_erro))>0) {
					alert($msg_erro,"danger");
				} 

			}

			# Exibição do formulário
			// if ($exibe_form==true) {
				require_once("instituicao_form.php");
			// }
		}

		public function delInstituicao() {
			# Recebe informações do form da pagina e realiza del
		}

		public function edtInstituicao() {
			# Recebe informações do form da pagina e realiza edt
		}

		// exibicao bonita
		public function verInstituicao() {
			#  Select da instituicao e require do html da página (perfil_instituicao -> pagina da instituicao detalhada)
			// Aqui será a página bonita que exibe o perfil da instituição de acordo com o parametro id
			// perfil_instituicao -> terá 2 html, listagem do evento padrão e membros participantes desta instituicao puxando os usuários do banco... deverá ficar tudo em 1 arquivo com if do get. pag-ex: perfil do trello
		}

		//form editar e criar
		public function formInstituicao() {
			#  Select dos dados e require do html da página (form_instituicao -> add, edt, del)
			// Aqui os inputs virão preenchidos com as infos da instituicao de acordo com o select por id
			// verInstituicao -> terá 2 páginas, ver_perfil padrão e ver_membros puxando os usuários da n,n..
			// deverá ficar tudo em 1 arquivo com if do get. pag-ex: perfil do trello
			require_once("../instituicao_form.php");
		}

		// minhas instituicoes
		public function listInstituicoes() {
			# Select da listagem e require do html da página (listagem)
			// Neste list instituicao devera aparecer as instituicoes que o usuário esta participando
			// gerando links para ir direto a pagina da instituicao... (ai ele pode edt, del, ver)
			// Se ele não participa de nenhum ou mesmo se participa haverá um botao para criar nova instituicao
   			// $$$ - O acesso a este método será feito no menu do usuário na navbar Minhas Insituições
		}

		#  IMPLEMENTAÇÃO FUTURA DA CLASSE
		// se a pessoa ta no perfil da ong e ela nao é da ong, ela poderá enviar pedido para ser da ong
		// se a pessoa é da ong e tá na listagem de membros, haverá uma barra de busca para ela convidar pessoas

	}

?>
