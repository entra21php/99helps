<?php
	#  MODULO INSTITUICAO
	// Desenvolvido por: João de Paula e Nilton Souza
	class Instituicao Extends Site {

	public $razaoSocial;
	public $nomeFantasia;
	public $logradouro;
	public $numero;
	public $estado;
	public $cidade;
	public $causa_defendida;
	public $descricao;

	public function __construct() {		

		# Verifica se está sendo passado parametro de alert
		if ((isset($_GET['msg'])) || (isset($_GET['alert']))) {
			alert($_GET['msg'],$_GET['alert']);
		}

		# Verifica a acao do momento
		if (isset($_GET['edt'])) {
			// EDIÇÃO
			$this->edtInstituicao($_GET['edt']);
		} elseif (isset($_GET['add'])) {
			// ADD
			$this->addInstituicao();
		} elseif (isset($_GET['ver'])) {
			// VER INSTITUIÇÃO
			$this->verInstituicao($_GET['ver']);
		} else {
			// LISTAR INSTITUICOES
			$this->listInstituicoes();
		}

	}

	public function setVariaveis($zera,$id) {
		#  Verifica se é para zerar as variaveis ou se é para consultar no banco
		// e preencher os forms com os dados para uma possivel edição
		if ($zera==true) {
			// Set
			$this->razaoSocial 		= null;
			$this->nomeFantasia 	= null;
			$this->logradouro 		= null;
			$this->numero 			= null;
			$this->estado 			= null;
			$this->cidade 			= null;
			$this->causa_defendida 	= null;
			$this->descricao 		= null;
		} else {
			// Consulta
			$sql = "SELECT * FROM instituicoes WHERE id=".$id;
			$consulta = mysql_query($sql);
			$rsvar = mysql_fetch_array($consulta);

			// Verifica se houve retorno, ou seja, se existe o id no banco
			if (mysql_num_rows($consulta)==1) {
				$existe = true;
			} else {
				$existe = false;
			}

			// Set
			$this->razaoSocial 		= $rsvar['razao_social'];
			$this->nomeFantasia 	= $rsvar['nome_fantasia'];
			$this->logradouro 		= $rsvar['logradouro'];
			$this->numero 			= $rsvar['numero'];
			$this->estado 			= $rsvar['estado'];
			$this->cidade 			= $rsvar['fk_cidade'];
			$this->causa_defendida 	= $rsvar['causa_defendida'];
			$this->descricao	 	= $rsvar['descricao'];

			return $existe;
		}
	}

	public function getVariaveis() {
		# Recebe os valores do formulário e atribui as variaveis
		$this->razaoSocial 		= $_POST['razaoSocial'];
		$this->nomeFantasia 	= $_POST['nomeFantasia'];
		$this->logradouro 		= $_POST['logradouro'];
		$this->numero 			= $_POST['numero'];
		$this->estado 			= $_POST['estado'];
		$this->cidade 			= $_POST['cidade'];
		$this->causa_defendida 	= $_POST['causa_defendida'];
		$this->descricao	 	= $_POST['descricao'];
	}

	public function getVerificacao() {
		# Set da variavel de erro
		$msg_erro = null;

		# Verifica se existe campo vazio
		if ((empty($this->razaoSocial)) || (empty($this->nomeFantasia)) || (empty($this->logradouro)) || (empty($this->numero)) || (empty($this->estado)) || (empty($this->cidade)) || (empty($this->causa_defendida)) || (empty($this->descricao))) {
			// Seta mensagem de erro
			$msg_erro = "<strong>Erro!</strong> Por gentileza, preencha todos os campos! <br>";
		}

		return $msg_erro;
	}

	public function addInstituicao() {
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
				$sql = "INSERT INTO instituicoes(razao_social,nome_fantasia,logradouro,numero,estado,fk_cidade,causa_defendida,descricao) VALUES ('$this->razaoSocial','$this->nomeFantasia','$this->logradouro',$this->numero,'$this->estado',$this->cidade,$this->causa_defendida,'$this->descricao')";

				# Se cadastrado com sucesso exibe mensagem sucesso, senão, exibe erro
				if (mysql_query($sql)) {
					header("Location: instituicao.php?msg=<strong>" . $this->nomeFantasia . "</strong> cadastrado com sucesso :)&alert=success");
				} else {
					mysql_query($sql) or die(mysql_error());
					header("Location: instituicao.php?msg=<strong>" . $this->nomeFantasia . "</strong> não foi cadastrada no banco devido a um erro, contate um administrador do sistema! <a href='index.php'>contato</a>&alert=danger");
				}
			}
		}

		# Chamando o formulário para exibição
		$this->formInstituicao();

	}

	public function edtInstituicao($id) {
		# Chamando o set de variaveis e verificando se existe o id no banco
		if ($this->setVariaveis(false,$id)) {
			// Setando variavel de erro para prosseguir o update
			$erro_id = false;
		} else {
			// Setando variavel de erro para interromper a execução
			$erro_id = true;
			// Exibindo mensagem de erro
			alert("<strong>OPA!</strong> Parece que a instituição pelo qual você procura não se encontra em nosso banco de dados. Contate um administrador do sistema! <a href='contato.php'>Contato</a>","danger");
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
				$sql = "UPDATE instituicoes SET razao_social='$this->razaoSocial', nome_fantasia='$this->nomeFantasia', logradouro='$this->logradouro', numero=$this->numero, estado='$this->estado', fk_cidade=$this->cidade, causa_defendida=$this->causa_defendida, descricao='$this->descricao' WHERE id=".$id;

				# Se cadastrado com sucesso exibe mensagem sucesso, senão, exibe erro
				if (mysql_query($sql)) {
					header("Location: instituicao.php?msg=<strong>" . $this->nomeFantasia . "</strong> editado com sucesso :)&alert=success");
				} else {
					header("Location: instituicao.php?msg=<strong>" . $this->nomeFantasia . "</strong> não pode ser editado com sucesso :( <a href='contato.php'>Contato</a>&alert=danger");
				}
			}
		}

		# Chamando o formulário para exibição
		if ($erro_id==false) {
			$this->formInstituicao();
		}

	}

	public function delInstituicao() {
		# Recebe informações do form da pagina e realiza del
	}

	public function verInstituicao($id) {
		#  Select da instituicao e require do html da página (perfil_instituicao -> pagina da instituicao detalhada)
		// Aqui será a página bonita que exibe o perfil da instituição de acordo com o parametro id
		// perfil_instituicao -> terá 2 html, listagem do evento padrão e membros participantes desta instituicao puxando os usuários do banco... deverá ficar tudo em 1 arquivo com if do get. pag-ex: perfil do trello
		require_once("instituicao_perfil.php");
	}

	public function formInstituicao() {
		# Setando parametros (se o form é edição ou adição)
		if (isset($_GET['edt'])) {
			$btn_name = "Salvar";
			$page_title = "Alteração do cadastro de " . $this->nomeFantasia;
			$breadcrumb_title = "Alteração de cadastro de " . $this->nomeFantasia;
		} else {
			$btn_name = "Cadastrar";
			$page_title = "Cadastro de nova instituição";
			$breadcrumb_title = "Nova Instituição";
		}

		# Array com todos os estados do brasil para exibir no form
		$estado = array("AC","AL","AP","AM","BA","CE","DF","ES","GO","MA","MT","MS","MG","PA","PB","PR","PE","PI","RJ","RN","RS","RO","RR","SC","SP","SE","TO");

		# Include do formulário
		require_once("instituicao_form.php");
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
