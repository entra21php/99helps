<?php
	#  NESTA PAGINA FICARA O HTML DA EXIBIÇÃO BONITA
	// Exibir a página html do perfil da instituição, com paragrafo h1, tudo bonito...
	// Será usando o php aqui somente para indexar os resultados e exibições
	// mas somente de maneira resumida, ex:

	$sql = "SELECT * ,cidades.cidadenome FROM instituicoes LEFT JOIN cidades ON cidades.id=instituicoes.fk_cidade WHERE instituicoes.id = " . $id;
	$consulta = mysql_query($sql);	
	$rs = mysql_fetch_array($consulta);

	// 
	// ((mysql_num_rows($rs['img_perfil']))==1) ? "tem foto" : "nao tem foto"
?>

		<section class="row">
			<div class="col-12 destaque">
				<div class="row container perfil_instituicao destaque">
					<div class="col-12 col-md-4 text-right">
						<!-- DEIXAR IMAGEM NO CENTRO DA BOX NA VERTICAL -->
						<p><img src="images/foto_padrao.png" class="rounded" style="max-height: 150px;"></p>
					</div>
					<div class="col-12 col-md-8">
						<h3><?=$rs['nome_fantasia']?></h3>
						<p><?=$rs['descricao']?></p>
						<div class="btn-group top8" role="group">
							<a href="#"><button type="button" class="btn btn-secundary">Editar perfil</button></a>&nbsp;
							<a href="#"><button type="button" class="btn btn-outline-danger">Excluir perfil</button></a>
						</div>					
					</div>			
				</div>	
			</div>
		</section>

		<section class="row bg-primary">
			<div class="container">
				<div class="btn-group perfil_instituicao" role="group">
					<a href="#"><button type="button" class="btn btn-secundary text-primary">Informações</button></a>&nbsp;
					<a href="#"><button type="button" class="btn btn-link text-white">Eventos</button></a>&nbsp;
					<a href="#"><button type="button" class="btn btn-link text-white">Membros</button></a>
				</div>
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
					<h3>Localização</h3>
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
					<h3>Eventos</h3>
					<p><?=$rs['logradouro']?>, <?=$rs['numero']?> - <?=$rs['cidadenome']?>/<?=$rs['estado']?></p>
					<p>AKI VAI O GOOGLE MAPS COM O MAPA</p>
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
				<div class="col-12 perfil_instituicao">
					<h3>Membros</h3>
					
				</div>		
			</div>
		</section>
		<?php 
			}
		?>
