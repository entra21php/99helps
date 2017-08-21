<?php
require_once("include/header.php");
	#  NESTA PAGINA FICARA O HTML DA EXIBIÇÃO BONITA
	// Exibir a página html do perfil do evento, com paragrafo h1, tudo bonito...
	// Será usando o php aqui somente para indexar os resultados e exibições
	// mas somente de maneira resumida, ex:
	$sql = "SELECT * ,titulo.descrição, data FROM eventos LEFT JOIN titulo ON titulo.id=eventos.fk_cidade WHERE eventos.id = " . $id;
	$consulta = mysql_query($sql);	
	$rs = mysql_fetch_array($consulta);
	// 
	// ((mysql_num_rows($rs['img_perfil']))==1) ? "tem foto" : "nao tem foto"
?>
		<section class="row destaque perfil_evento">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-3 top8">
						<p><img src="images/foto_padrao.png" class="rounded mx-auto d-block" style="max-height: 150px;"></p>
					</div>
					<div class="col-12 col-md-8 top8">
						<h3><?=$rs['titulo']?></h3>
						<p class="text-justify"><?=$rs['descricao']?></p>
						<!-- SÓ EXIBE ESSE BOTÃO SE O ID DA SESSÃO TIVER PERMISSÃO -->
						<div class="btn-group top8" role="group">
							<a href="evento.php?edt=<?=$id?>"><button type="button" class="btn btn-secundary">Editar evento</button></a>&nbsp;
							<a href="evento.php?del=<?=$id?>&titulo=<?=$rs['titulo']?>"><button type="button" class="btn btn-outline-danger">Excluir evento</button></a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="row bg-primary">
			<div class="container" style="padding: 10px 0 0 0;">
				<ul class="nav nav-tabs" style="margin-bottom: -1px; line-height: 35px;">
					<li class="nav-item" style="padding-left: 5px;">
						<a class="nav-link <?=($_GET['acao']=='informacoes')?"active":"text-white"?>" href="evento.php?ver=<?=$id?>&acao=informacoes">Informações</a>
					</li>
					<li class="nav-item" style="padding-left: 5px;">
						<a class="nav-link <?=($_GET['acao']=='eventos')?"active":"text-white"?>" href="evento.php?ver=<?=$id?>&acao=eventos">Eventos</a>
					</li>
					<li class="nav-item" style="padding-left: 5px;">
						<a class="nav-link <?=($_GET['acao']=='membros')?"active":"text-white"?>" href="evento.php?ver=<?=$id?>&acao=membros">Membros</a>
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
				<div class="col-12 perfil_evento">
					<h3>Localização</h3>
					<p><?=$rs['logradouro']?>, <?=$rs['numero']?> - <?=$rs['descrição, data']?>/<?=$rs['estado']?></p>
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
				<div class="col-12 perfil_evento">
					<div class="row">
						<?php 
							// AQUI VAI O SELECT DOS EVENTOS DA ONG
							$sql = "".$id;	
							$consulta = mysql_query($sql);
							while ($rs = mysql_fetch_array($consulta)) {
						?>
							<div class="col-12 col-md-3">
								<div class="card">
									<img class="card-img-top img-fluid" src="images/evento1.jpg">
									<div class="card-block">
										<h4 class="card-title">Reforma carroça do seu zé</h4>
										<!-- IMPLANTAR VERIFICAO SE O EVENTO ESTA FINALIZADO OU IRÁ OCORRER EM BREVE... -->
										<small class="card-text">
											<i class="fa fa-calendar fa-lg"></i> 02/08/17 às 07:00 <span class="badge badge-default">Finalizado</span><br>
										</small>
										<a href="#" class="btn btn-sm btn-primary top8">Ver detalhes <i class="fa fa-angle-right" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
						<?php
							}
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
						// SELECT QUE PUXA SOMENTE OS USUARIOS DA ONG QUE ESTA ACESSANDO
						$sql = "SELECT usuarios_fisico.nome,usuarios_fisico.sobrenome,usuarios_eventos.nivel_acesso FROM usuarios_eventos
								LEFT JOIN usuarios_fisico ON usuarios_fisico.id=usuarios_eventos.fk_usuario WHERE fk_evento=".$id;	
						$consulta = mysql_query($sql);
						while ($rs = mysql_fetch_array($consulta)) {
					?>
						<div class="col-12 col-md-3" style="margin-top: 30px;">
							<div class="card">
								<img class="card-img-top img-fluid" src="images/evento1.jpg">
								<div class="card-block text-center">
									<h4 class="card-title" style="margin-bottom: 8px !important;">João de Paula</h4>
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
