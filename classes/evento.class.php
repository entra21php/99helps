<?php
	#  MODULO EVENTO
	// Desenvolvido por:
	class Evento {
		public $titulo;
		public $descricao;
		public $data;
		public $foto_capa;
		public $fk_instituicao;
		public $lat;
		public $lng;
		
		public function __construct() {		
			# Verifica a acao do momento
			if (isset($_GET['edt'])) {
				// EDIÇÃO
				$this->edtEvento($_GET['edt']);
			} elseif (isset($_GET['add'])) {
				// ADD
				$this->addEvento();
			} elseif (isset($_GET['ver'])) {
				// VER EVENTO
				$this->verEvento();
			} else {
				// LISTAR EVENTO
				$this->listIEvento();
			}
		}
		public function setVariaveis($zera,$id) {
			#  Verifica se é para zerar as variaveis ou se é para consultar no banco
			// e preencher os forms com os dados para uma possivel edição
			if ($zera==true) {
				// Set
				$this->titulo 			= null;
				$this->descricao 		= null;
				$this->data 			= null;
				$this->foto_capa 		= "";
				$this->fk_instituicao   = null;
				$this->lat 				= null;
				$this->lng 				= null;
			} else {
				// Consulta
				$sql = "SELECT * FROM evento WHERE id=".$id;
				$consulta = mysql_query($sql);
				$rsvar = mysql_fetch_array($consulta);
				// Verifica se houve retorno, ou seja, se existe o id no banco
				if (mysql_num_rows($consulta)==1) {
					$existe = true;
				} else {
					$existe = false;
				}
				// Set
				$this->titulo 			= $rsvar['titulo'];
				$this->descricao 		= $rsvar['descricao'];
				$this->data 			= $rsvar['data'];
				$this->foto_capa 		= $rsvar['foto_capa'];
				$this->fk_instituicao 	= $rsvar['fk_instituicao'];
				$this->lat 				= $rsvar['lat'];
				$this->lng 				= $rsvar['lng'];
				return $existe;
			}
		}
		public function getVariaveis() {
			# Recebe os valores do formulário e atribui as variaveis
			$this->titulo 			= $_POST['titulo'];
			$this->descricao 		= $_POST['descricao'];
			$this->data 			= $_POST['data'];
			$this->foto_capa 		= $_POST['foto_capa'];
			$this->fk_instituicao 	= $_POST['fk_instituicao'];
			$this->lat 				= $_POST['lat'];
			$this->lng 				= $_POST['lng'];	
		}
		public function getVerificacao() {
			# Set da variavel de erro
			$msg_erro = null;
			# Verifica se existe campo vazio
			if ((empty($this->titulo)) || (empty($this->descricao)) || (empty($this->data))  || (empty($this->fk_instituicao)) || (empty($this->lat)) || (empty($this->lng))) {
				// Seta mensagem de erro
				$msg_erro = "<strong>Erro!</strong> Por gentileza, preencha todos os campos! <br>";
			}
			return $msg_erro;
		}
		public function addEvento() {
			# Chamando o set de variaveis
			$this->setVariaveis(true,0);	
			# Verifica se houve clique no formulário e executa verificações, posteriormente insert
			if (isset($_POST['enviar'])) {
				// Recebe as variaveis do formulário
				$this->getVariaveis();
				// O IF chama a verificação de dados do formulário
				// se houver erro exibe o erro, senão executa o insert
				if ((strlen($this->getVerificacao()))>0) {
					alert($this->getVerificacao(),"danger");
				} else {
					$sql = "INSERT INTO evento(titulo,descricao,data,foto_capa,fk_instituicao,lat,lng) VALUES ('$this->titulo','$this->descricao',$this->data,	'$this->foto_capa','$this->fk_instituicao',$this->lat,$this->lng)";
					# Se cadastrado com sucesso exibe mensagem sucesso, senão, exibe erro
					if (mysql_query($sql)) {
					 	alert("<strong>" . $this->descricao . "</strong> cadastrado com sucesso :)","success");
					 	// HEADER QUE VAI PRA LIST_INSTITICAO COM O PARAMETRO DA MSG SUCESSO
					} else {
						alert("<strong>" . $this->descricao . "</strong> não foi cadastrado no banco devido a um erro, contate um administrador do sistema! <a href='index.php'>Voltar</a>","danger");
					}
				}
			}
			# Chamando o formulário para exibição
			$this->formEvento();
		}
		public function edtEvento($id) {
			# Chamando o set de variaveis e verificando se existe o id no banco
			if ($this->setVariaveis(false,$id)) {
				// Setando variavel de erro para prosseguir o update
				$erro_id = false;
			} else {
				// Setando variavel de erro para interromper a execução
				$erro_id = true;
				// Exibindo mensagem de erro
				alert("<strong>OPA!</strong> Parece que evento pelo qual você procura não se encontra em nosso banco de dados. Contate um administrador do sistema! <a href='index.php'>Voltar</a>","danger");
			}
				
			# Verifica se houve clique no formulário e executa verificações, posteriormente update
			if ((isset($_POST['enviar'])) ) {
				// Recebe as variaveis do formulário
				$this->getVariaveis();
				// O IF chama a verificação de dados do formulário
				// se houver erro exibe o erro, senão executa o insert
				if ((strlen($this->getVerificacao()))>0) {
					alert($this->getVerificacao(),"danger");
				} else {
					$sql = "UPDATE evento SET titulo='$this->titulo', descricao='$this->descricao', data=$this->data, foto_capa='$this->foto_capa', fk_instituicao=$this->fk_instituicao, lat=$this->lat, lng=$this->lng WHERE id=".$id;
					# Se cadastrado com sucesso exibe mensagem sucesso, senão, exibe erro
					if (mysql_query($sql)) {
					 	alert("<strong>" . $this->descricao . "</strong> editado com sucesso :)","success");
					 	// HEADER QUE VAI PRA LIST_INSTITICAO COM O PARAMETRO DA MSG SUCESSO
					} else {
						alert("<strong>" . $this->descricao . "</strong> não foi editado no banco devido a um erro, contate um administrador do sistema! <a href='index.php'>Voltar</a>","danger");
					}
				}
			}
			# Chamando o formulário para exibição
			if ($erro_id==false) {
				$this->formEvento();
			}
		}
		public function delEvento() {
			# Recebe informações do form da pagina e realiza del
		}
		public function verEvento($id) {
			#  Select da Evento e require do html da página (Evento -> pagina da Evento detalhada)
			// Aqui será a página bonita que exibe o perfil do evento de acordo com o parametro id
			// perfil_Evento -> terá 2 html, listagem do evento padrão e membros participantes desta Evento puxando os usuários do banco... deverá ficar tudo em 1 arquivo com if do get. pag-ex: perfil do trello
		}
		public function formEvento() {
			# Setando parametros (se o form é edição ou adição)
			if (isset($_GET['edt'])) {
				$btn_name = "Salvar";
				$page_title = "Alteração do cadastro de " . $this->descricao;
				$breadcrumb_title = "Alteração de cadastro de " . $this->descricao;
			} else {
				$btn_name = "Cadastrar";
				$page_title = "Cadastro de novo evento";
				$breadcrumb_title = "Novo Evento";
			}
			
			require_once("evento_form.php");
		}
		public function listEvento() {
			# Select da listagem e require do html da página (listagem)
			// Neste list Evento devera aparecer as instituicoes que o usuário esta participando
			// gerando links para ir direto a pagina da Evento... (ai ele pode edt, del, ver)
			// Se ele não participa de nenhum ou mesmo se participa haverá um botao para criar nova Evento
   			// $$$ - O acesso a este método será feito no menu do usuário na navbar Minhas Insituições
			require_once("evento_list.php");
		}
		#  IMPLEMENTAÇÃO FUTURA DA CLASSE
		// se a pessoa ta no perfil da ong e ela nao é da ong, ela poderá enviar pedido para ser da ong
		// se a pessoa é da ong e tá na listagem de membros, haverá uma barra de busca para ela convidar pessoas
	}
?>
