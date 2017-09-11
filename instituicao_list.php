<?php
	#  NESTA PAGINA FICARA O HTML DA EXIBIÇÃO BONITA (NILTON)
	// Exibir a página html da listagem de todos as instituições separadas por usuário...
	// o select estará sendo feito na classe que chama este arquivo..
	// Será usando o php aqui somente para indexar os resultados e exibições
	// mas somente de maneira resumida, ex:
	// <?=$res['resultado_mysql']?_>

	// As verificações em php serão feitas na metódo da classe que chama este arquivo
	
	#  A identação está organizada para exibir bonitinho no inspecionar elemento
	// aqui ela tá feia mesmo...
?>	
	<section class="container">
		<p>
			<ol class="breadcrumb text-center">
			  <li class="breadcrumb-item"><a href="index.php">Pagina Inicial</a></li>
			  <li class="breadcrumb-item active">Minhas Instituições</li>
			</ol>
		</p>

		<div class="card">
			<h6 class="card-header">Minhas instituições</h6>
			<div class="card-block">
				<?php
					$sql = "SELECT instituicoes.id,instituicoes.nome_fantasia,instituicoes.descricao,nivel_acesso FROM usuarios_instituicoes
							LEFT JOIN instituicoes ON id=fk_instituicao 
							WHERE fk_usuario = ".$_SESSION["id_usuario"]." AND ativo=1 ORDER BY 3 DESC";	
					$consulta = mysql_query($sql);
					while ($rs = mysql_fetch_array($consulta)) {
				?>
				<div class="card">
					<div class="card-block">
						<div class="row">
							<div class="col-12 col-md-4">
								<img src="images/evento1.jpg" class="img-fluid img-thumbnail">
							</div>
							<div class="col-12 col-md-8">
								<h4 class="card-title top8"><?=$rs['nome_fantasia']?></h4>
								<?php 
									if ($rs['nivel_acesso']=="Membro") {
										echo '<h6><span class="badge badge-default">Sou Membro</span></h6>';
									} else {
										echo '<h6><span class="badge badge-warning">Sou Administrador</span></h6>';
									}
								?>
								<p class="card-text"><?=substr($rs['descricao'],0,250)?></p>
								<a href="?ver=<?=$rs['id']?>&acao=informacoes" class="btn btn-primary top8">Detalhes <i class="fa fa-angle-right" aria-hidden="true"></i></a>	
							</div>
						</div>
					</div>
				</div><br>
				<?php 
					}
					if (mysql_num_rows($consulta)==0) {
				?>
				<div class="card">
					<div class="card-block text-center">
						<h4 class="card-title">Você não participa de nenhuma instituição =(</h4>
						<p class="card-text">Parece que você não tem muita intimidade com nossa plataforma ainda. Procure por eventos e solicite para participar das instituições que você desejaria ser membro, ou então veja como criar uma instituição abaixo.</p>
						<a href="?add" class="btn btn-secondary top8">Procurar eventos <i class="fa fa-angle-right" aria-hidden="true"></i></a>	
					</div>
				</div><br>
				<?php 
					}
				?>
				<div class="card">
					<div class="card-block text-center">
						<h4 class="card-title">Cadastre sua instituição</h4>
						<p class="card-text">Se você é representante legal de alguma instituição, fundação, entidade ou organização não governamental você pode se cadastrar em nossa plataforma para divulgar seus eventos e ações, atraindo novos colaboradores e membros para seus projetos. <mark> Cadastro requer o envio de documentos oficiais que comprovem a real existencia da instituição e está sujeito a aprovação no sistema. </mark></p>
						<a href="?add" class="btn btn-success top8">Cadastrar minha instituição <i class="fa fa-angle-right" aria-hidden="true"></i></a>	
					</div>
				</div><br>
			</div>
		</div><br>
	</section>
