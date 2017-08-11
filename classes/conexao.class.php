<?php
	#  CLASSE CONEXÃO
	// Inicia sessão, autoload, conexão com banco 
	class Conexao {

		public function __construct() {

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

			define('LOCAL', 'localhost');
			define('BANCO', '99helps');
			define('USER',  'root');
			define('PASS',  'usbw');

			$conexao = mysql_connect(LOCAL,USER,PASS) or die("Erro na conexao com o servidor...");
			$banco   = mysql_select_db(BANCO,$conexao) or die("Erro de selecao de banco...");

		}

	}

?>