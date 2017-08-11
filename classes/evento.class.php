<?php
	#  MODULO EVENTO
	// Desenvolvido por: Aluno1 e Aluno2
	class Evento Extends Site {

		public function __construct() {		
			# Verifica a acao do momento (listagem, perfil_evento, add, del, edt)
		}

		public function addEvento() {
			# Recebe informações do form da pagina e realiza insert
		}

		public function delEvento() {
			# Recebe informações do form da pagina e realiza del
		}

		public function edtEvento() {
			# Recebe informações do form da pagina e realiza edt
		}

		public function verEvento() {
			#  Select do evento e require da página html perfil_evento (perfil_evento -> pagina do evento detalhado)
			// Aqui será a página bonita que exibe o perfil do evento de acordo com o parametro id
			// perfil_evento -> terá 2 html, listagem do evento padrão e voluntarios participantes puxando os usuários da n,n que demonstraram interesse e confirmaram... deverá ficar tudo em 1 arquivo com if do get. pag-ex: perfil do trello
		}

		public function listEvento() {
			#  Select da listagem e require do html da página (listagem)
			// Página que exibe todos os eventos, aonde terá a barra de busca
		}

		public function formEvento() {
			# Select dos dados e require do html da página (form_evento -> add, edt, del)
			// Aqui os inputs virão preenchidos com as infos do perfil de acordo com o select por id
		}

		public function listCalendario() {
			# Select da listagem e require do html da página (listagem)
			// Método listCalendario -> neste list calendario devera aparecer os eventos que o usuário esta participando, demonstrou interesse, gerando links para ir direto a pagina do evento, nada de mais, simples...
			// Link direto no menu do usuario...
		}

	}

?>