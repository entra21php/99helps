<?php

	#  CLASSE PRINCIPAL
	class Site {

		public function __construct($hef) {

			session_start();

			/* AUTOLOAD
			*  metodo mágico que vai carregar os arquivos 
			*  das classes automaticamente com base no nome 
			*  da classe. O nome do arquivo php deve ter o
			*  mesmo nome da classe.
			*/

			function __autoload($class_name) {

				$class_name = strtolower($class_name);
				$path = "classes/$class_name.class.php";

				if (file_exists($path)) {
					require_once($path);
				} else {
					die("Arquivo nao encontrado no servidor!");
				}
			}

			require_once("include/config.php");

			if ($hef == true) {
				require_once("include/header.php");
			}

		}

		public function __destruct() {
			require_once("include/footer.php");			
		}

		public function Conexao() {
			define('LOCAL', 'localhost');
			define('BANCO', '99helps');
			define('USER',  'root');
			define('PASS',  'admin');

			$conexao = mysql_connect(LOCAL,USER,PASS) or die ("Erro na conexao com o servidor...");
			$banco   = mysql_select_db(BANCO,$conexao) or die("Erro de selecao de banco...");
		}
	}

?>
