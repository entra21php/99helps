<?php
	#  INCLUSAO DA CONEXAO
	require_once("classes/conexao.class.php");
	
	#  CLASSE PRINCIPAL
	// Header, footer
	class Site Extends Conexao {

		//parent::__construct();

		public function __construct() {
			require_once("include/config.php");
			require_once("include/header.php");
		}

		public function __destruct() {
			require_once("include/footer.php");			
		}
	}

?>