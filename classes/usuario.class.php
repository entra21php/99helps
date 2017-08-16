<?php
	#  MODULO USUÁRIO
	// Desenvolvido por: Douglas e Jefferson
class Usuario Extends Site {

		public $nome 			= "";
		public $sobrenome 		= "";
		public $sexo 			= "";
		public $datanascimento 	= "";
		public $imagem_perfil 		= "";
		public $estado 			= "";
		public $fk_cidade 		= "";
		public $email 			= "";
		public $senha 			= "";
		public $ativo			= "";

	public function __construct() {		
		# Verifica a acao do momento (perfil_usuario, del, edt, add)
		if (isset($_GET['edit'])) {

			// se é edição
			$this->editCadastro();

		} elseif (isset($_GET['editCadastro'])) {

			// se é cadastro
			$this->insertForm('edit',$_GET['editCadastro']);

		} elseif (isset($_GET['add'])) {

			// se é cadastro
			$this->addCadastro();
			$this->formCadastro();

		} elseif (isset($_GET['addCadastro'])) {

			// se é cadastro
			$this->insertForm('add',0);

		} elseif (isset($_GET['del'])) {

			// se é delete
			$this->delCadastro($_GET['del']);

		} else {

			// senao, é listagem
			$this->formCadastro();
		}

	} // fim __construct

	public function addCadastro() {

		# Recebe informações do conteudo da pagina e realiza insert
		if(isset($_POST['enviar'])) {

			$this->nome 			=$_POST['nome'];
			$this->sobrenome 		=$_POST['sobrenome'];
			$this->sexo 			=$_POST['sexo'];
			$this->datanascimento 	    	=$_POST['datanascimento'];
			$this->imagem_perfil 	    	=$_POST['imagem_perfil'];
			$this->estado 		    	=$_POST['estado'];
			$this->fk_cidade 		=$_POST['fk_cidade'];
			$this->email 			=$_POST['email'];
			$this->email_confere		=$_POST['email_confere']; 	
			$this->senha 		    	=$_POST['senha'];
			$this->senha_confere	   	=$_POST['senha_confere'];
			$this->interesses		=$_POST['interesses'];
			// $ativo			    =$_POST['ativo'];
			$this->exibe_form 		    = true;

			#VERIFICACAO DE ERROS

			// Verifica se existe campo vazio
			if ((empty($this->nome))  ||  (empty($this->sobrenome)) || (empty($this->sexo)) || (empty($this->datanascimento)) || (empty($this->imagem_perfil)) || (empty($this->interesses)) || (empty($this->estado))  || (empty($this->fk_cidade)) || (empty($this->email)) || (empty($this->email_confere)) || (empty($this->senha))  ||  (empty($this->senha_confere))  ) {
				$this->msg_erro = "Preencha todos os campos! <br>";
			}

			// Exibe erro se ele existir
			if ((strlen($this->msg_erro))>0) {
				alert($this->msg_erro,"danger");
			} 

			//confere se os email são iguais
			if ($this->email != $this->email_confere) {
				$this->msg_erro = "Os email não são iguais";
			}

			// conferir se as senhas são iguais
			if ($this->senha != $this->senha_confere) {
				$this->msg_erro = "As senhas devem ser iguais"; 
			}

			// e ter pelo menos 8 caracteres
			if (strlen($this->senha) < 8) {
				$this->erro = true;
				$this->msg_erro = "A senha deve ter pelo menos 8 caracteres!!";
			}

			# criptografar senha
			$this->senha_crypt = hash('sha512',$this->senha);
			
			// cadastrar caso nao tenha erro
			if ($this->erro == false) {

				$sql = "INSERT INTO  usuarios_fisico (
				nome,
				sobrenome,
				sexo,
				datanascimento,
				imagem_perfil,
				estado,
				fk_cidade,
				email,
				senha,
				ativo
				)
				VALUES
				(
				'$this->nome',
				'$this->sobrenome',
				'$this->sexo',
				$this->datanascimento,
				'$this->imagemperfil',
				'$this->estado',
				$this->fk_cidade,
				'$this->email',
				'$this->senha_crypt',
				$this->ativo
				)";

							// se foi possivel cadastrar
				if (mysql_query($sql)) {

					echo '<div class="alert alert-success" role="alert">Cadastrado com sucesso</div>';

				// se cadastra, oculta form
					$exibe_form = false;

				} else {

				// se deu erro no cadastro
					echo '<div class="alert alert-danger" role="alert">deu erro no cadastro <br> $sql </div>';

				}
			}
		}
	}

	public function delCadastro() {
		# Recebe informações do form da pagina e realiza del
		$delete = "DELETE FROM usuarios_fisico WHERE id = " .$id;

		if (mysql_query($delete)) {
			echo '<p> Excluido com sucesso!</p>';
		} else {
			echo '<p>Não foi possível excluir</>';
		}
	}

	public function edtCadastro() {
		# Recebe informações do form da pagina e realiza edt
		$this->nome 			= $_POST['nome'];
		$this->sobrenome 		= $_POST['sobrenome'];
		$this->sexo 			= $_POST['sexo'];
		$this->datanascimento 		= $_POST['datanascimento'];
		$this->imagem_perfil 		= $_POST ['imagem_perfil'];
		$this->estado 			= $_POST['estado'];
		$this->fk_cidade 		=$_POST['fk_cidade'];
		$this->email 			=$_POST['email'];
		$this->senha 			=$_POST['senha'];
		$this->ativo			=$_POST['ativo'];

		//atualizar no banco de dados
		$sql = "UPDATE usuarios_fisico SET  	nome 			='$nome',
							sobrenome		='$this->sobrenome',
							sexo 			='$this->sexo',
							datanascimento 	='$this->datanascimento',
							imagem_perfil		='$this->imagem_perfil',
							estado 			='$this->estado',
							fk_cidade 		='$this->fk_cidade',
							email 			='$this->email',
							senha			='$this->senha',
							ativo			='$this->ativo'
							WHERE id 		=" . $this->id;

		if (mysql_query($sql)) {
			echo '<p>Editado com sucesso</p>';
		} else {
			echo '<p>Problemas na edição!</p>';
		}
	}

	public function verCadastro() {
			#  Select do usuario e require do html da página (perfil_usuario -> pagina do perfil detalhado)
			// Aqui será a página bonita que exibe o perfil do usuário de acordo com o parametro id
	}

	public function formCadastro() {
			# Select dos dados e require do html da página (form_usuario -> pagina do perfil detalhado)
			// Aqui os inputs virão preenchidos com as infos do perfil de acordo com o select por id

			require_once("/usuario_form.php");
	}
}
?>
