<?php
	#  MODULO USUÁRIO
	// Desenvolvido por: Douglas e Jefferson
class Usuario Extends Site {

	public $id 			= "";
	public $nome 			= "";
	public $sobrenome 		= "";
	public $sexo 			= "";
	public $datanascimento 	= "";
	public $imagem_perfil 	= "";
	public $estado 			= "";
	public $fk_cidades 		= "";
	public $email 			= "";
	public $email_confere	= "";
	public $senha 			= "";
	public $descricao		= "";
	public $ativo			= "";
	public $erro 			=false;


	public function __construct() {		
		# Verifica a acao do momento (perfil_usuario, del, edt, add)
		if (isset($_GET['edit'])) {

			// se esta salvando edição
			if (isset($_POST['enviar'])) {

				$this->editCadastro();

			// senao, esta exibindo form com os dados
			} else {

				$this->id=$_GET['edit'];
				// se é edição
				// $this->editCadastro($this->id);
				 $this->verCadastro($this->id);

				$this->formCadastro($this->id);
			 }

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

		} elseif ((isset($_GET['ver'])) && (isset($_GET['acao'])) ) {

			// VER usuario
			$this->verCadastro($_GET['ver']);

		}elseif (isset($_GET['del'])) {

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
			$this->datanascimento 	=$_POST['datanascimento'];
			$this->estado 		    =$_POST['estado'];
			$this->fk_cidades 		=$_POST['fk_cidades'];
			$this->email 			=$_POST['email'];
			$this->email_confere	=$_POST['email_confere']; 	
			$this->senha 		    =$_POST['senha'];
			$this->senha_confere	=$_POST['senha_confere'];
			$this->interesses		=$_POST['interesses'];
			$this->descricao		=$_POST['descricao'];
			$this->exibe_form 		    = true;

			# receber imagem

			// diretorio pra salvar
			$target_dir = "uploads/";

			# novo nome aleatorio da imagem
			$this->imagem_perfil = rand(100000000,999999999);
			# nome completo
			$nome_novo =  $target_dir . $this->imagem_perfil .'.'. pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION);

			// verifica se o arquivo ja existe no diretorio
			if (file_exists($nome_novo)) {
				$erro = true;
			}

			// retorna nome do arquivo (basename)
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			// caminho completo com extensao
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// verifica se a imagem é real
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

	   		// se a imagem é real, exibe msg
			if($check === false) {
				$erro = true;
			}


			// verifica o tamanho
			if ($_FILES["fileToUpload"]["size"] > 500000) {
				$erro = true;
			}

			// verifica o formato da imagem
			if(	$imageFileType != "jpg" && 
				$imageFileType != "png" && 
				$imageFileType != "jpeg" && 
				$imageFileType != "gif" ) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$erro = true;
		}


			#VERIFICACAO DE ERROS

			// Verifica se existe campo vazio
		if ((empty($this->nome))  ||  (empty($this->sobrenome)) || (empty($this->sexo)) || (empty($this->datanascimento)) || (empty($this->interesses)) || (empty($this->estado))  || (empty($this->fk_cidades)) || (empty($this->email)) || (empty($this->email_confere)) || (empty($this->senha))  ||  (empty($this->senha_confere))  ) {
			$erro = true;
			echo '<div class="alert alert-danger" role="alert">Preencha todos os campos </div>';
		}
			//confere se os email são iguais
		if ($this->email != $this->email_confere) {
			$this->erro = true;
			echo '<strong>Erro!</strong> Os email não são iguais';
		}
			// conferir se as senhas são iguais
		if ($this->senha != $this->senha_confere) {
			$this->erro = true;
			echo '<strong>Erro!</strong> As senhas devem ser iguais'; 
		}
			// e ter pelo menos 8 caracteres
		if (strlen($this->senha) < 8) {
			$this->erro = true;
			echo '<strong>Erro!</strong> A senha deve ter pelo menos 8 caracteres!!';
		}
			# criptografar senha
		$this->senha_crypt = hash('sha512',$this->senha);

			// Exibe erro se ele existir
		if ($this->erro == false) {
			$sql = "INSERT INTO  usuarios_fisico (
			nome,
			sobrenome,
			sexo,
			datanascimento,
			imagem_perfil,
			estado,
			fk_cidades,
			email,
			senha,
			descricao

			)
			VALUES
			(
			'$this->nome',
			'$this->sobrenome',
			'$this->sexo',
			$this->datanascimento,
			$this->imagem_perfil,
			'$this->estado',
			$this->fk_cidades,
			'$this->email',
			'$this->senha_crypt',
			'$this->descricao'

			)";

				// se foi possivel cadastrar
			if (mysql_query($sql)) {
				# salva o arquivo no diretorio upload
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $nome_novo)) {
					echo "Arquivo cadastrado: ". basename( $_FILES["fileToUpload"]["name"]). "  <br>";
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
				echo '<div class="alert alert-success" role="alert">Cadastrado com sucesso</div>';
			} else {

				// se deu erro no cadastro
				echo '<div class="alert alert-danger" role="alert">deu erro no cadastro <br> </div>';
				echo $sql;
			}
		}
	}

}
public function delCadastro($id) {
		# Recebe informações do form da pagina e realiza del
	$delete = "UPDATE usuarios_fisico SET ativo = 0 WHERE id =".$id;
	if (mysql_query($delete)) {
		echo '<p> Excluido com sucesso!</p>';
	} else {
		echo '<p>Não foi possível excluir</>';
	}
}

public function editCadastro() {

		
		# Recebe informações do conteudo da pagina e realiza insert
		if(isset($_POST['enviar'])) {


			$this->id 				= $_POST['id'];
			$this->nome 			= $_POST['nome'];
			$this->sobrenome 		= $_POST['sobrenome'];
			$this->sexo 			= $_POST['sexo'];
			$this->datanascimento 	= $_POST['datanascimento'];
			$this->estado 			= $_POST['estado'];
			$this->fk_cidades 		= $_POST['fk_cidades'];	
			$this->descricao 		= $_POST['descricao'];



			


			#VERIFICACAO DE ERROS

			// Verifica se existe campo vazio
		if ((empty($this->nome))  ||  (empty($this->sobrenome)) || (empty($this->sexo)) || (empty($this->datanascimento)) || (empty($this->interesses)) || (empty($this->estado))  || (empty($this->fk_cidades)) ) {
			$erro = true;
			echo '<div class="alert alert-danger" role="alert">Preencha todos os campos </div>';
		}
			

			// Exibe erro se ele existir
		if ($this->erro == false) {

						$sql = "UPDATE usuarios_fisico SET  	
			nome 			='$this->nome',
			sobrenome		='$this->sobrenome',
			sexo 			='$this->sexo',
			datanascimento 	='$this->datanascimento',
			estado 			='$this->estado',
			fk_cidades 		='$this->fk_cidades',
			descricao 		='$this->descricao'
			WHERE id 		=" . $this->id;
			if (mysql_query($sql)) {
				echo '<p>Editado com sucesso</p>';
			} else {
				echo '<p>Problemas na edição!</p>';
			}
		}

}
}
public function verCadastro($id) {
		// Consulta

			$sql = "SELECT * FROM usuarios_fisico WHERE id=".$id;
			$consulta = mysql_query($sql);
			$rsvar = mysql_fetch_array($consulta);

			$this->nome 			= $rsvar['nome'];
			$this->sobrenome 		= $rsvar['sobrenome'];
			$this->sexo 			= $rsvar['sexo'];
			$this->datanascimento 	= $rsvar['datanascimento'];
			$this->imagem_perfil 	= $rsvar['imagem_perfil'];
			$this->estado 			= $rsvar['estado'];
			$this->fk_cidades 		= $rsvar['fk_cidades'];
			$this->descricao 		= $rsvar['descricao'];
			$this->ativo			= $rsvar['ativo'];

			#  Select do usuario e require do html da página (perfil_usuario -> pagina do perfil detalhado)
			// Aqui será a página bonita que exibe o perfil do usuário de acordo com o parametro id
		
					require_once("usuario_perfil.php");
			
			}
			
			
	

public function formCadastro($id = 0) {
			# Select dos dados e require do html da página (form_usuario -> pagina do perfil detalhado)
			// Aqui os inputs virão preenchidos com as infos do perfil de acordo com o select por id

			require_once("/usuario_form.php");
}
}
?>
