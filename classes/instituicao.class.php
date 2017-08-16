<?php
	#  MODULO INSTITUICAO
	// Desenvolvido por: João de Paula e Nilton Souza
	class Instituicao Extends Site {
		
		public function __construct() {		
			# Verifica a acao do momento (perfil_instituicao, add, del, edt)
			if (isset($_GET['edt'])) {
				// EDIÇÃO
				$this->edtInstituicao($_GET['edt']);
			} elseif (isset($_GET['add'])) {
				// ADD
				$this->addInstituicao();
			} elseif (isset($_GET['ver'])) {
				// VER INSTITUIÇÃO
				$this->verInstituicao();
			} else {
				$this->listInstituicoes();
			}
		}

		public function addInstituicao() {
			# Reset das variaveis
			$msg_erro = "";
			$razaoSocial = "";
			$nomeFantasia = "";
			$logadrouro = "";
			$numero = "";
			$estado	= "";
			$cidade	= "";
			$causa_defendida = "";
			$exibe_form = true;
			
			# Recebe informações do form da pagina e realiza insert
			if (isset($_POST['enviar'])) {
				$razaoSocial 	 = $_POST['razaoSocial'];
				$nomeFantasia 	 = $_POST['nomeFantasia'];
				$logadrouro 	 = $_POST['logadrouro'];
				$numero 		 = $_POST['numero'];
				$estado			 = $_POST['estado'];
				$cidade			 = $_POST['cidade'];
				$causa_defendida = $_POST['causa_defendida'];

				// Verifica se existe campo vazio
				if ((empty($razaoSocial)) || (empty($nomeFantasia)) || (empty($logadrouro)) || (empty($numero)) || (empty($estado)) || (empty($cidade)) || (empty($causa_defendida))) {
					$msg_erro = "<strong>Erro!</strong> Por gentileza, preencha todos os campos! <br>";
				}

				// Exibe erro se ele existir
				if ((strlen($msg_erro))>0) {
					alert($msg_erro,"danger");
				} else {
					$exibe_form = false;
					// Senão existe erro cadastra no banco
					$sql = "INSERT INTO instituicoes(razao_social,
													 nome_fantasia,
													 logradouro,
													 numero,
													 estado,
													 fk_cidade,
													 causa_defendida)
											 VALUES ('$razaoSocial',
											 		 '$nomeFantasia',
											 		 '$logadrouro',
											 		 $numero,
											 		 '$estado',
											 		 $cidade,
											 		 $causa_defendida)";

					if (mysql_query($sql)) {
					 	alert("<strong>" . $razaoSocial . "</strong> cadastrado com sucesso :)","success");
					 	// HEADER QUE VAI PRA LIST_INSTITICAO COM O PARAMETRO DA MSG SUCESSO
					 	// SE FOR IMPLEMENTADO RETIRAR O $EXIBE_FORM;
					} else {
						alert("<strong>" . $razaoSocial . "</strong> não foi cadastrada no banco devido a um erro, contate um administrador do sistema!","danger");
					}
				}
			}
			# Exibição do formulário
			if ($exibe_form==true) {
				require_once("instituicao_form.php");
			}
		}

		public function delInstituicao() {
			# Recebe informações do form da pagina e realiza del
		}

		public function edtInstituicao($id) {
			# Recebe informações do form da pagina e realiza edt
			// Select dos dados da instituicao que quer editar
			$sql = "SELECT * FROM instituicoes WHERE id=".$id;
			$consulta = mysql_query($sql);
			$rs = mysql_fetch_array($consulta);

			// Set das variaveis
			$msg_erro = "";
			$razaoSocial = $rs['razao_social'];
			$nomeFantasia = $rs['nome_fantasia'];
			$logadrouro = $rs['logradouro'];
			$numero = $rs['numero'];
			$estado	= $rs['nome_fantasia'];
			$cidade	= $rs['nome_fantasia'];
			$causa_defendida = $rs['nome_fantasia'];
			$exibe_form = true;
			
			# Recebe informações do form da pagina
			if (isset($_POST['enviar'])) {
				$razaoSocial 	 = $_POST['razaoSocial'];
				$nomeFantasia 	 = $_POST['nomeFantasia'];
				$logadrouro 	 = $_POST['logadrouro'];
				$numero 		 = $_POST['numero'];
				$estado			 = $_POST['estado'];
				$cidade			 = $_POST['cidade'];
				$causa_defendida = $_POST['causa_defendida'];

				// Verifica se existe campo vazio
				if ((empty($razaoSocial)) || (empty($nomeFantasia)) || (empty($logadrouro)) || (empty($numero)) || (empty($estado)) || (empty($cidade)) || (empty($causa_defendida))) {
					$msg_erro = "<strong>Erro!</strong> Por gentileza, preencha todos os campos! <br>";
				}

				// Exibe erro se ele existir
				if ((strlen($msg_erro))>0) {
					alert($msg_erro,"danger");
				} else {
					$exibe_form = false;
					// Senão existe erro update no banco
					$sql = "UPDATE instituicoes SET razao_social = '$razaoSocial',
													nome_fantasia = '$nomeFantasia',
													logradouro = '$logadrouro',
													numero = $numero,
													estado = '$estado',
													fk_cidade = $cidade,
													causa_defendida = $causa_defendida
												WHERE id=".$id;

					if (mysql_query($sql)) {
					 	alert("<strong>" . $razaoSocial . "</strong> editado com sucesso :)","success");
					 	// HEADER QUE VAI PRA LIST_INSTITICAO COM O PARAMETRO DA MSG SUCESSO
					 	// SE FOR IMPLEMENTADO RETIRAR O $EXIBE_FORM;
					} else {
						alert("<strong>" . $razaoSocial . "</strong> não foi alterada no banco devido a um erro, contate um administrador do sistema!","warning");
					}
				}
			}
			# Exibição do formulário
			if ($exibe_form==true) {
				require_once("instituicao_form.php");
			}			
		}

		public function verInstituicao() {
			#  Select da instituicao e require do html da página (perfil_instituicao -> pagina da instituicao detalhada)
			// Aqui será a página bonita que exibe o perfil da instituição de acordo com o parametro id
			// perfil_instituicao -> terá 2 html, listagem do evento padrão e membros participantes desta instituicao puxando os usuários do banco... deverá ficar tudo em 1 arquivo com if do get. pag-ex: perfil do trello
		}

		public function formInstituicao() {
			#  Select dos dados e require do html da página (form_instituicao -> add, edt, del)
			// Aqui os inputs virão preenchidos com as infos da instituicao de acordo com o select por id
			// verInstituicao -> terá 2 páginas, ver_perfil padrão e ver_membros puxando os usuários da n,n..
			// deverá ficar tudo em 1 arquivo com if do get. pag-ex: perfil do trello
			require_once("../instituicao_form.php");
		}

		public function listInstituicoes() {
			# Select da listagem e require do html da página (listagem)
			// Neste list instituicao devera aparecer as instituicoes que o usuário esta participando
			// gerando links para ir direto a pagina da instituicao... (ai ele pode edt, del, ver)
			// Se ele não participa de nenhum ou mesmo se participa haverá um botao para criar nova instituicao
   			// $$$ - O acesso a este método será feito no menu do usuário na navbar Minhas Insituições
			require_once("instituicao_list.php");
		}

		#  IMPLEMENTAÇÃO FUTURA DA CLASSE
		// se a pessoa ta no perfil da ong e ela nao é da ong, ela poderá enviar pedido para ser da ong
		// se a pessoa é da ong e tá na listagem de membros, haverá uma barra de busca para ela convidar pessoas

	}

?>
