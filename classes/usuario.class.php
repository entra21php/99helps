<?php
	#  MODULO USUÁRIO
	// Desenvolvido por: Aluno1 e Aluno2
	class Usuario Extends Site {

		public function __construct() {		
			# Verifica a acao do momento (perfil_usuario, del, edt, add)
		}

		public function addCadastro() {
			# Recebe informações do conteudo da pagina e realiza insert
		}

		public function delCadastro() {
			# Recebe informações do form da pagina e realiza del
		}
		
		public function edtCadastro() {
			# Recebe informações do form da pagina e realiza edt
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