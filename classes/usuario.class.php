<?php
	#  MODULO USUÁRIO
	// Desenvolvido por: Douglas e Jefferson
class Usuario Extends Site {

	public function __construct() {		
		# Verifica a acao do momento (perfil_usuario, del, edt, add)
		if (isset($_POST['edit'])) {

			// se é edição
			$this->editCadastro();

		} elseif (isset($_GET['editCadastro'])) {

			// se é cadastro
			$this->insertForm('edit',$_GET['editCadastro']);

		} elseif (isset($_POST['add'])) {

			// se é cadastro
			$this->addCadastro();

		} elseif (isset($_GET['addCadastro'])) {

			// se é cadastro
			$this->insertForm('add',0);

		} elseif (isset($_GET['del'])) {

			// se é delete
			$this->delCadastro($_GET['del']);

		} else {

			// senao, é listagem
			$this->verCadastro();

		}

	} // fim __construct


public function addCadastro() {
		# Recebe informações do conteudo da pagina e realiza insert
		$nome 			=$_POST['nome'];
		$sobrenome 		=$_POST['sobrenome'];
		$sexo 			=$_POST['sexo'];
		$datanascimento 	=$_POST['datanascimento'];
		$imagem_perfil 	=$_POST['imagem_perfil'];
		$estado 		=$_POST['estado'];
		$fk_cidade 		=$_POST['fk_cidade'];
		$email 			=$_POST['email'];
		$senha 		=$_POST['senha'];
		$senha_confere	=$_POST['senha_confere'];
		$ativo			=$_POST['ativo'];


		// verificar erros
		
		// campos nao podem estar vazios
		if ((empty($nome))  ||  (empty($sobrenome)) || (empty($sexo)) || (empty($datanascimento)) || (empty($imagem_perfil)) || (empty($estado))  || (empty($fk_cidade)) || (empty($email)) || 
		   (empty($senha))  ||  (empty($senha_confere))  ) {
		$erro = true;
		echo '<div class="alert alert-danger" role="alert">Preencha todos os campos </div>';
	}
		// conferir se as senhas são iguais
		if ($senha != $senha_confere) {
		$erro = true;
		echo '<div class="alert alert-danger" role="alert">As senhas devem ser iguais! </div>';
	}
		// e ter pelo menos 8 caracteres
		if (strlen($senha) < 8) {
		$erro = true;
		echo '<div class="alert alert-danger" role="alert">As senhas devem ter pelo menos 8 caracteres! </div>';
	}
		# criptografar senha
		$senha_crypt = hash('sha512',$senha);

		// cadastrar caso nao tenha erro
		if ($erro == false) {


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
							'$nome',
							'$sobrenome',
							'$sexo',
							$datanascimento,
							'$imagemperfil',
							'$estado',
							$fk_cidade,
							'$email',
							'$senha_crypt',
							$ativo
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
		$nome 			= $_POST['nome'];
		$sobrenome 		= $_POST['sobrenome'];
		$sexo 			= $_POST['sexo'];
		$datanascimento 	= $_POST['datanascimento'];
		$imagem_perfil 	= $_POST ['imagem_perfil'];
		$estado 		= $_POST['estado'];
		$fk_cidade 		=$_POST['fk_cidade'];
		$email 			=$_POST['email'];
		$senha 		=$_POST['senha'];
		$ativo			=$_POST['ativo'];

		//atualizar no banco de dados
		$sql = "UPDATE usuarios_fisico SET  	nome 			='$nome',
							sobrenome		='$sobrenome',
							sexo 			='$sexo',
							datanascimento 	='$datanascimento',
							imagem_perfil		='$imagem_perfil',
							estado 			='$estado',
							fk_cidade 		='$fk_cidade',
							email 			='$email',
							senha			='$senha',
							ativo			='$ativo'
							WHERE id 		=" . $id;

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
		
}
}
?>
