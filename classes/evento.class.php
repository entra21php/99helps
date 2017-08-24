<?php
	#  MODULO EVENTO
	// Desenvolvido por: Julia Goedert e Allan Ranieri
	class Evento Extends Site {

		public $titulo;
		public $descricao;
		public $data;
		public $foto_capa;
		public $fk_instituicao;
		public $logradouro;
		public $numero;
		public $estado;
		public $cidade;
		
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
				$this->verEvento($_GET['ver']);
			} else {
				// LISTAR EVENTO
				$this->listEvento();
				$this->formEvento();
			}

		}

		public function setVariaveis($zera,$id) {
			#  Verifica se é para zerar as variaveis ou se Ã© para consultar no banco
			// e preencher os forms com os dados para uma possivel ediÃ§Ã£o
			if ($zera==true) {
				// Set
				$this->titulo 			= null;
				$this->descricao 		= null;
				$this->data 			= null;
				$this->foto_capa 		= "";
				$this->fk_instituicao   = null;
				$this->logradouro 		= null;
				$this->numero 			= null;
				$this->estado 			= null;
				$this->cidade 			= null;
			} else {
				// Consulta
				$sql = "SELECT * FROM evento WHERE id= ". $id;
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
				$this->logradouro 		= $rsvar['logradouro'];
				$this->numero 			= $rsvar['numero'];
				$this->estado 			= $rsvar['estado'];
				$this->cidade 			= $rsvar['fk_cidade'];
				return $existe;
			}
		}

		public function getVariaveis() {
			# Recebe os valores do formulÃ¡rio e atribui as variaveis
			$this->titulo 			= $_POST['titulo'];
			$this->descricao 		= $_POST['descricao'];
			$this->data 			= $_POST['data'];
			$this->foto_capa 		= $_POST['foto_capa'];
			$this->fk_instituicao 	= $_POST['fk_instituicao'];
			$this->logradouro 		= $_POST['logradouro'];
			$this->numero 			= $_POST['numero'];
			$this->estado 			= $_POST['estado'];
			$this->cidade 			= $_POST['cidade'];
		}

		public function getVerificacao() {
			# Set da variavel de erro
			$msg_erro = null;
			# Verifica se existe campo vazio
			if ((empty($this->titulo)) || (empty($this->descricao)) || (empty($this->data)) || (empty($this->fk_instituicao)) || (empty($this->logradouro)) || (empty($this->numero)) || (empty($this->estado)) || (empty($this->cidade))) {
					// Seta mensagem de erro
				$msg_erro = "<strong>Erro!</strong> Por gentileza, preencha todos os campos! <br>";
			}
			return $msg_erro;
		}

		public function addEvento() {
			# Chamando o set de variaveis
			$this->setVariaveis(true,0);	
			# Verifica se houve clique no formulÃ¡rio e executa verificaÃ§Ãµes, posteriormente insert
			if (isset($_POST['cadastra'])) {
				// Recebe as variaveis do formulÃ¡rio
				$this->getVariaveis();

				// O IF chama a verificaÃ§Ã£o de dados do formulÃ¡rio
				// se houver erro exibe o erro, senÃ£o executa o insert
				if ((strlen($this->getVerificacao()))>0) {
					alert($this->getVerificacao(),"danger");
				} else {
					$sql = "INSERT INTO evento(titulo,descricao,data,foto_capa,fk_instituicao,logradouro,numero,estado,fk_cidade) VALUES ('$this->titulo','$this->descricao','$this->data','$this->foto_capa','$this->fk_instituicao','$this->logradouro', '$this->numero', '$this->estado', '$this->cidade')";
					echo $this->descricao;
					# Se cadastrado com sucesso exibe mensagem sucesso, senão, exibe erro
					if (mysql_query($sql)) {
						alert("<strong>" . $this->titulo . "</strong> cadastrado com sucesso :)","success");
						// HEADER QUE VAI PRA LIST_INSTITICAO COM O PARAMETRO DA MSG SUCESSO
					} else {
						alert("<strong>" . $this->titulo . "</strong> não foi cadastrado no banco devido a um erro, contate um administrador do sistema! <a href='index.php'>Voltar</a>","danger");
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
				alert("<strong>OPA!</strong> Parece que o evento pelo qual você procura não se encontra em nosso banco de dados. Contate um administrador do sistema! <a href='evento.php'>Voltar</a>","danger");
			}
			
			# Verifica se houve clique no formulário e executa verificações, posteriormente update
			if ((isset($_POST['cadastra'])) ) {
				// Recebe as variaveis do formulário

				$this->getVariaveis();
				// O IF chama a verificação de dados do formulário
				// se houver erro exibe o erro, senão executa o insert
				if ((strlen($this->getVerificacao()))>0) {
					alert($this->getVerificacao(),"danger");
				} else {
					$sql = "UPDATE evento SET titulo='$this->titulo', descricao='$this->descricao', data='$this->data', foto_capa='$this->foto_capa', fk_instituicao=$this->fk_instituicao, logradouro='$this->logradouro', numero=$this->numero, estado='$this->estado', fk_cidade=$this->cidade WHERE id=".$id;

					echo $sql;
					# Se cadastrado com sucesso exibe mensagem sucesso, senão, exibe erro
					if (mysql_query($sql)) {
						alert("<strong>" . $this->titulo . "</strong> editado com sucesso :)","success");
					 	// HEADER QUE VAI PRA LIST_INSTITICAO COM O PARAMETRO DA MSG SUCESSO
					} else {
						alert("<strong>" . $this->titulo . "</strong> não foi editado no banco devido a um erro, contate um administrador do sistema! <a href='index.php'>Voltar</a>","danger");
					}
				}
			}
				# Chamando o formulário para exibição
			if ($erro_id==false) {
				$this->formEvento();
			}
		}

		public function delEvento($id,$nome) {
			$sql = "UPDATE evento SET ativo=0 WHERE id=".$id;
				# Se desativado com sucesso exibe mensagem sucesso, senão, exibe erro
			if (mysql_query($sql)) {
				header("Location: evento.php?msg=<strong>" . $nome . "</strong> deletado com sucesso :) <br> Se você deseja reativar esta insituição futuramente entre em contato conosco! <a href='contato.php'>Contato</a>&alert=success");
			} else {
				echo $id . 'eae';
				header("Location: evento.php?msg=<strong>" . $nome . "</strong> não pode ser deletado com sucesso :(<a href='contato.php'>Contato</a>&alert=danger");
			}
		}

		public function verEvento($id) {
			$sql=" SELECT * FROM evento";
			require_once('evento_perfil.php');
		}
		
		public function formEvento() {
				# Setando parametros (se o form Ã© edição ou adição)
			if (isset($_GET['edt'])) {
				$btn_name = "Salvar";
				$page_title = "Alteração do cadastro de " 		. $this->titulo;
				$breadcrumb_title = "Alteração de cadastro de " . $this->titulo;
			} else {
				$btn_name = "Cadastrar";
				$page_title = "Cadastro de novo evento";
				$breadcrumb_title = "Novo Evento";
			}
			# Array com todos os estados do brasil para exibir no form
			$estado = array("AC","AL","AP","AM","BA","CE","DF","ES","GO","MA","MT","MS","MG","PA","PB","PR","PE","PI","RJ","RN","RS","RO","RR","SC","SP","SE","TO");
			
			require_once("evento_form.php");
		}
		public function listEvento() {
				# Select da listagem e require do html da página (listagem)
				// Neste list Evento devera aparecer as instituicoes que o usuÃ¡rio esta participando
				// gerando links para ir direto a pagina da Evento... (ai ele pode edt, del, ver)
				// Se ele nÃ£o participa de nenhum ou mesmo se participa haverÃ¡ um botao para criar nova Evento
	   			// $$$ - O acesso a este mÃ©todo serÃ¡ feito no menu do usuÃ¡rio na navbar Minhas InsituiÃ§Ãµes
			require_once("evento_list.php");
		}
			#  IMPLEMENTAÃ‡ÃƒO FUTURA DA CLASSE
			// se a pessoa ta no perfil da ong e ela nao Ã© da ong, ela poderÃ¡ enviar pedido para ser da ong
			// se a pessoa Ã© da ong e tÃ¡ na listagem de membros, haverÃ¡ uma barra de busca para ela convidar pessoas
	}
?>



