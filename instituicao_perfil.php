<?php
	#  NESTA PAGINA FICARA O HTML DA EXIBIÇÃO BONITA
	// Exibir a página html do perfil da instituição, com paragrafo h1, tudo bonito...
	// Será usando o php aqui somente para indexar os resultados e exibições
	// mas somente de maneira resumida, ex:

	$sql = "SELECT * ,cidades.cidadenome FROM instituicoes LEFT JOIN cidades ON cidades.id=instituicoes.fk_cidade WHERE instituicoes.id = " . $id;
	$consulta = mysql_query($sql);	
	$rs = mysql_fetch_array($consulta);
?>
		<section class="row destaque perfil_instituicao">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-3 top8 text-center">
						<?=(($rs['img_perfil'])!=null) ? '<p><img src="uploads/'.$rs['img_perfil'].'" class="rounded img-fluid" style="max-height: 150px;"></p>' : '<p><img src="images/foto_padrao.png" class="rounded img-fluid" style="max-height: 150px;"></p>';?>
					</div>
					<div class="col-12 col-md-8 top8">
						<h3><?=$rs['nome_fantasia']?></h3>
						<p class="text-justify"><?=$rs['descricao']?></p>
						<!-- SÓ EXIBE ESSE BOTÃO SE O ID DA SESSÃO TIVER PERMISSÃO -->
						<div class="btn-group top8" role="group">
							<a href="instituicao.php?edt=<?=$id?>"><button type="button" class="btn btn-secundary">Editar perfil</button></a>&nbsp;
							<a href="instituicao.php?del=<?=$id?>&nome_fantasia=<?=$rs['nome_fantasia']?>"><button type="button" class="btn btn-outline-danger">Excluir instituição</button></a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="row bg-primary">
			<div class="container" style="padding: 10px 0 0 0;">
				<ul class="nav nav-tabs" style="margin-bottom: -1px; line-height: 35px;">
					<li class="nav-item" style="padding-left: 5px;">
						<a class="nav-link <?=($_GET['acao']=='informacoes')?"active":"text-white"?>" href="instituicao.php?ver=<?=$id?>&acao=informacoes">Informações</a>
					</li>
					<li class="nav-item" style="padding-left: 5px;">
						<a class="nav-link <?=($_GET['acao']=='eventos')?"active":"text-white"?>" href="instituicao.php?ver=<?=$id?>&acao=eventos">Eventos</a>
					</li>
					<li class="nav-item" style="padding-left: 5px;">
						<a class="nav-link <?=($_GET['acao']=='membros')?"active":"text-white"?>" href="instituicao.php?ver=<?=$id?>&acao=membros">Membros</a>
					</li>
				</ul>
			</div>		
		</section>		
		<?php
			# Exibir a página de infomações
			if ((isset($_GET['acao'])) && (($_GET['acao'])=="informacoes")) {
		?>
		<!-- PÁGINA DE INFORMAÇÕES -->
		<!-- IMPLEMENTAR ESTATITICAS -->
		<section class="row">
			<div class="container">
				<div class="col-12 perfil_instituicao">
					<h3>Estatísticas</h3>
					<div class="row">
						<div class="col-12 col-md-6" style="margin-top: 15px;">
							<div class="card">
								<div class="card-block">
									<h5 class="card-title" style="margin-bottom: 8px !important;">Frequência da Instituição<small> últimos 30 dias</small></h5>
									<!-- IMPLANTAR VERIFICAO SE O EVENTO ESTA FINALIZADO OU IRÁ OCORRER EM BREVE... -->
									<small class="card-text">
										02/08/17 às 07:00
									</small>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6" style="margin-top: 15px;">
							<div class="card">
								<div class="card-block">
									<h5 class="card-title" style="margin-bottom: 8px !important;">Quantidade de eventos<small> últimos 30 dias</small></h5>
									<!-- IMPLANTAR VERIFICAO SE O EVENTO ESTA FINALIZADO OU IRÁ OCORRER EM BREVE... -->
									<small class="card-text">
										02/08/17 às 07:00
									</small>
								</div>
							</div>
						</div>	
						<div class="col-12 col-md-6" style="margin-top: 30px;">
							<div class="card">
								<div class="card-block">
									<h5 class="card-title" style="margin-bottom: 8px !important;">Adesão de membros<small> últimos 30 dias</small></h5>
									<!-- IMPLANTAR VERIFICAO SE O EVENTO ESTA FINALIZADO OU IRÁ OCORRER EM BREVE... -->
									<small class="card-text">
										02/08/17 às 07:00
									</small>
								</div>
							</div>
						</div>		
					</div>

					<h3 style="margin-top: 30px;">Localização</h3>
					<p><?=$rs['logradouro']?>, <?=$rs['numero']?> - <?=$rs['cidadenome']?>/<?=$rs['estado']?></p>
					<p>AKI VAI O GOOGLE MAPS COM O MAPA</p>
				</div>
			</div>		
		</section>	
		<?php 
			}
			if ((isset($_GET['acao'])) && (($_GET['acao'])=="eventos")) {
		?>
		<!-- PÁGINA EVENTOS -->
		<section class="row">
			<div class="container">
				<div class="col-12 perfil_instituicao">
					<div class="row">
						<?php
							$sql = "".$id;	
							$consulta = mysql_query($sql);
							// while ($rs = mysql_fetch_array($consulta)) {
						?>
							<div class="col-12 col-md-3" style="margin-top: 30px;">
								<div class="card">
									<img class="card-img-top img-fluid" src="images/evento1.jpg">
									<div class="card-block">
										<h4 class="card-title" style="margin-bottom: 8px !important;">Reforma carroça do seu zé</h4>
										<!-- IMPLANTAR VERIFICAO SE O EVENTO ESTA FINALIZADO OU IRÁ OCORRER EM BREVE... -->
										<small class="card-text">
											<i class="fa fa-calendar fa-lg"></i> 02/08/17 às 07:00 <span class="badge badge-default">Finalizado</span><br>
										</small>
										<a href="#" class="btn btn-sm btn-primary top8">Ver detalhes <i class="fa fa-angle-right" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
						<?php
							// }
						?>
					</div>
				</div>
			</div>		
		</section>		
		<?php 
			}
			if ((isset($_GET['acao'])) && (($_GET['acao'])=="membros")) {
		?>
		<!-- PÁGINA MEMBROS -->
		<section class="row">
			<div class="container">
				<div class="row">
					<?php
						$sql = "SELECT usuarios_fisico.nome,usuarios_fisico.sobrenome,usuarios_fisico.imagem_perfil,usuarios_instituicoes.nivel_acesso FROM usuarios_instituicoes LEFT JOIN usuarios_fisico ON usuarios_fisico.id=usuarios_instituicoes.fk_usuario WHERE fk_instituicao=".$id;	
						$consulta = mysql_query($sql);
						while ($rs = mysql_fetch_array($consulta)) {
					?>
						<div class="col-12 col-md-3" style="margin-top: 30px;">
							<div class="card">
								<?=(($rs['imagem_perfil'])!=null) ? '<img src="uploads/'.$rs['imagem_perfil'].'" class="card-img-top img-fluid">' : '<img src="images/foto_padrao.png" class="card-img-top img-fluid">';?>
								<div class="card-block text-center">
									<h4 class="card-title" style="margin-bottom: 8px !important;"><?=$rs['nome']?></h4>
									<p class="card-text">
										<?php 
											if ($rs['nivel_acesso']=="Membro") {
												echo '<span class="badge badge-default">Membro</span>';
											} else {
												echo '<span class="badge badge-warning">Administrador</span>';
											}
										?>
									</p>
									<!-- PASSAR PARAMETRO PARA IR PARA O PERFIL DO USUÁRIO -->
									<a href="#" class="btn btn-sm btn-primary top8">Ver perfil <i class="fa fa-angle-right" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
					<?php
						}
					?>
				</div>
				<br>		
			</div>
		</section>
		<?php 
			}
		?>
