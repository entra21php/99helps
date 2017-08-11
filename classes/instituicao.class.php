<?php
	#  MODULO INSTITUICAO
	// Desenvolvido por: Aluno1 e Aluno2
	class Instituicao Extends Site {

		public function __construct() {		
			# Verifica a acao do momento (perfil_instituicao, add, del, edt)
		}

		public function addInstituicao() {
			# Recebe informações do form da pagina e realiza insert
		}

		public function delInstituicao() {
			# Recebe informações do form da pagina e realiza del
		}

		public function edtInstituicao() {
			# Recebe informações do form da pagina e realiza edt
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
		}

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