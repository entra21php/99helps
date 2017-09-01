<?php
	# ID = VARIAVEL DA SESSAO DO USUARIO PARA TESTES
$id = 32;
?>	
<section class="container">
	<p>
		<ol class="breadcrumb text-center">
			<li class="breadcrumb-item"><a href="index.php">Pagina Inicial</a></li>
			<li class="breadcrumb-item active">Meus eventos</li>
		</ol>
	</p>

	<div class="card">
		<h6 class="card-header">Meus eventos</h6>
		<div class="card-block">
			<?php
					// MELHORAR ESSE SELECT DE ACORDO COM O INSERT DA IMG E DESCRIÇÃO
					// O WHERE DESSE SELECT SERÁ REFERENTE AO ID DA SESSAO LOGADA NA PLATAFORMA
			$sql = "SELECT fk_evento FROM evento_usuarios WHERE fk_usuario =" . $id;	
			$consulta = mysql_query($sql);
			while ($res = mysql_fetch_array($consulta)) {
				$sqlEvento = "SELECT * FROM evento WHERE id =" . $res['fk_evento'];
				$consultaEvento = mysql_query($sqlEvento);
				$rs = mysql_fetch_array($consultaEvento);

				?>
				<div class="card">
					<div class="card-block">
						<div class="row">
							<div class="col-12 col-md-4">
								<img src="images/<?=$rs['foto_capa']?>" class="img-fluid img-thumbnail">
							</div>
							<div class="col-12 col-md-8">
								<p>
									<h4 class="card-title top8"><?=$rs['titulo']?></h4>
									<?php 
									function limitarTexto($texto, $limite){
										$contador = strlen($texto);
										if ( $contador >= $limite ) {      
											$texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
											return $texto;
										}
										else{
											return $texto;
										}
									} 

									print(limitarTexto($rs['descricao'], $limite = 25));
									?>
								</p>
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
					<a href="?add" class="btn btn-success top8">Cadastrar meu evento  <i class="fa fa-angle-right" aria-hidden="true"></i></a>	
				</div>
			</div><br>
		</div>
	</div><br>
</section>
