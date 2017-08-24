<?php
	#  NESTA PAGINA FICARA O HTML DA EXIBIÇÃO BONITA (NILTON)
	// Exibir a página html da listagem de todos as instituições separadas por usuário...
	// o select estará sendo feito na classe que chama este arquivo..
	// Será usando o php aqui somente para indexar os resultados e exibições
	// mas somente de maneira resumida, ex:
	// <?=$res['resultado_mysql']?_>

	// As verificações em php serão feitas na metódo da classe que chama este arquivo
	
	#  A identação está organizada para exibir bonitinho no inspecionar elemento


require_once("include/header.php");	


?>	


<br><br><br>

	<section class="container">
		<p>
			<ol class="breadcrumb text-center">
			  <li class="breadcrumb-item"><a href="index.php">Pagina Inicial</a></li>
			  <li class="breadcrumb-item active">Meus Eventos</li>
			</ol>
		</p>

		<div class="card">
			<h6 class="card-header">Meus Eventos</h6>
			<div class="card-block">
				<?php
					// MELHORAR ESSE SELECT DE ACORDO COM O INSERT DA IMG E DESCRIÇÃO
					// O WHERE DESSE SELECT SERÁ REFERENTE AO ID DA SESSAO LOGADA NA PLATAFORMA

					//SELECIONAR EVENTOS DE CADA USU
					$sql = "SELECT evento.titulo, evento.data FROM evento
							JOIN evento_usuarios ON id=fk_usuario
							
							";	
					$consulta = mysql_query($sql);
					while ($rs = mysql_fetch_array($consulta)) {
				?>
				<br>
				
				<?php 
					}
					if (mysql_num_rows($consulta)==0) {
				?>
				<div class="card">
					<div class="card-block text-center">
						<h4 class="card-title">Você não participa de nenhum evento =(</h4>
						<p class="card-text">Parece que você não tem muita intimidade com nossa plataforma ainda. Procure por eventos e solicite para participar dos eventos, ou então veja como criar um evento abaixo.</p>
						<a href="?add" class="btn btn-secondary top8">Procurar eventos <i class="fa fa-angle-right" aria-hidden="true"></i></a>	
					</div>
				</div><br>
				<?php 
					}
				?>
				<div class="card">
					<div class="card-block text-center">
						<h4 class="card-title">Cadastre novo evento</h4>
						<p class="card-text"></p>
						<a href="?add" class="btn btn-success top8">Cadastrar meu evento <i class="fa fa-angle-right" aria-hidden="true"></i></a>	
					</div>
				</div><br>
			</div>
		</div><br>
	</section>
